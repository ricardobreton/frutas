<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserPersonaRequest;
use App\Http\Requests\UserPersonaUpdateRequest;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    function __construct()
    {
        $this->middleware('can:admin.user.index')->only('index');
        $this->middleware('can:admin.user.create')->only('create','store');
        $this->middleware('can:admin.user.edit')->only('edit','update');
        $this->middleware('can:admin.user.destroy')->only('destroy');
        $this->middleware('can:admin.user.habilitar')->only('habilitarUser');
    }

    /** metodos para actualizar perfil del usuario */
    public function profile()
    {
        $user_logeado = User::findOrFail(Auth::id());
        $persona = $user_logeado->persona;
        return view('user.profile')->with(compact('user_logeado','persona'));
    }

    public function avatarUpdate(Request $request)
    {
        $validator = $request->validate([
            'avatar' => 'required|image',
        ]);
        $nombreAvatar = $request->file('avatar')->getClientOriginalName();
        $imgExtencion = substr($nombreAvatar, strlen($nombreAvatar)-4);
        $newFileName = Auth::id().'_'.rand(100,999).'_'.$imgExtencion;
        $request->file('avatar')->storeAs('public/avatar', $newFileName);
        $user_logeado = User::findOrFail(Auth::id());
        if($user_logeado->avatar != 'default.png')
        {
            Storage::delete('public/avatar/'.$user_logeado->avatar);
        }
        $user_logeado->avatar = $newFileName;
        $user_logeado->save();
        session(['mensaje'=>"El avatar se actualizo correctamente!"]);
        return redirect()->route('user.profile');
    }

    public function updatePassword(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        $input = $request->all();
        $validador = Validator::make($input, [
            'current_password' => ['required', 'string'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ])->after(function ($validator) use ($user, $input) {
            if (! isset($input['current_password']) || ! Hash::check($input['current_password'], $user->password)) {
                $validator->errors()->add('current_password', __('The provided password does not match your current password.'));
            }
        });
        if($validador->fails()){
            return redirect()->route('user.profile')->withErrors($validador)
                        ->withInput();
        }

        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
        return redirect()->route('user.profile')->with('msjpassword', 'La contraseña se acutalizó correctamente');
    }

    public function index()
    {
        $usuarios = DB::table('users')
                        ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                        ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                        ->where('roles.name', '<>', 'Cliente')
                        ->select('users.id')
                        ->get()->toArray();
        foreach ($usuarios as $key => $value) {
            $ids[] = $value->id;
        }
        $usuarios = User::whereIn('id', $ids)->get();
        return view('admin.usuario.index')->with(compact('usuarios'));
    }

    public function create()
    {
        $comboRoles = [''=>'Rol'] + Role::select('name')->get()->pluck('name','name')->toArray();
        return view('admin.usuario.create')->with(compact('comboRoles'));
    }

    public function store(UserPersonaRequest $request)
    {
        /*guarda el usuario*/
        $userNew = User::create($request->only(['name','email','password']));
        $userNew->assignRole($request->get('rol'));
        if ($request->hasFile('avatar')) {
            $nombreAvatar = $request->file('avatar')->getClientOriginalName();
            $imgExtencion = substr($nombreAvatar, strlen($nombreAvatar)-4);
            $newFileName = Auth::id().'_'.rand(100,999).'_'.$imgExtencion;
            $request->file('avatar')->storeAs('public/avatar', $newFileName);
            $userNew->avatar = $newFileName;
            $userNew->save();
        }
        /**guardar Persona */
        $persona = Persona::create($request->except(['name','email','password','avatar']));
        $userNew->persona_id = $persona->id;
        $userNew->save();
        return redirect()->route('admin.user.index');
    }


    public function edit(User $usuario)
    {
        $comboRoles = [''=>'Rol'] + Role::select('name')->get()->pluck('name','name')->toArray();
        $persona =  Persona::find($usuario->persona_id);
        return view('admin.usuario.editar')->with(compact('usuario', 'comboRoles', 'persona'));
    }

    public function guardarAvatar($avatar, $usuario)
    {
        $nombreAvatar = $avatar->getClientOriginalName();
        $imgExtencion = substr($nombreAvatar, strlen($nombreAvatar)-4);
        $newFileName = $usuario->id.'_'.rand(100,999).'_'.$imgExtencion;
        $avatar->storeAs('public/avatar', $newFileName);
        if($usuario->avatar != 'default.png')
        {
            Storage::delete('public/avatar/'.$usuario->avatar);
        }
        $usuario->avatar = $newFileName;
        $usuario->save();
    }

    public function update(UserPersonaUpdateRequest $request, User $usuario)
    {
        // dd($request->all());
        /**actualizar avatar */
        if ($request->hasFile('avatar')) {
            $this->guardarAvatar($request->file('avatar'), $usuario);
        }
        /** actualizar usuario */
        $datosUser = $request->only(['name','email']);
        $usuario->update($datosUser);
        if ($request->get('password')<>'') {
            $usuario->password = $request->get('password');
            $usuario->save();
        }
        /** actualizar persona */
        $persona = Persona::find($usuario->persona_id);
        $datosPersona = $request->only(['nombres','apellidos','ci_nit','telefonos','direccion']);
        $persona->update($datosPersona);
        /** actualizar Rol */
        $usuario->syncRoles($request->get('rol'));
        session(['msj-success'=>'Los datos se actualizaron correctamente']);
        return redirect()->route('admin.user.edit',[$usuario]);
    }

    public function destroy($user)
    {
        $usuario = User::FindOrFail($user);
        $usuario->activo='0';
        $usuario->save();
        session(['msj-success' => 'Usuario inhabilitado.']);
        return redirect()->route('admin.user.index');
    }
    public function habilitarUser(Request $request, User $user)
    {
        $user->activo='1';
        $user->save();
        session(['msj-success' => 'Usuario habilitado.']);
        return redirect()->route('admin.user.index');
    }
}
