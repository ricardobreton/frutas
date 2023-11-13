<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Persona;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        /** asignar rol al usuario creado por la web, siempre sera cliente */
        $user->assignRole('Cliente');
        event(new Registered($user));
        Auth::login($user);
        /** crear persona */
        $persona = Persona::create([
            'nombres' => $request->get('name'),
        ]);
        $user->persona_id = $persona->id;
        $user->save();

        return redirect(RouteServiceProvider::HOME);
    }

    public function registrarUsuario(Request $request)
    {
        try {
            DB::beginTransaction();
            $request['name'] = $request->get('nombres');
            $request->validate([
                'nombres' => ['required', 'string', 'max:255'],
                'apellidos' => ['required', 'string', 'max:255'],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            /** asignar rol al usuario creado por la web, siempre sera cliente */
            $user->assignRole('Cliente');
            event(new Registered($user));
            Auth::login($user);
            /** crear persona */
            $persona = Persona::create([
                'nombres' => $request->get('name'),
                'apellidos' => $request->get('apellidos'),
                'telefono' => $request->get('telefono'),
                'whatsapp' => $request->get('whatsapp'),

            ]);
            $user->persona_id = $persona->id;
            $user->save();
            DB::commit();
            return redirect(RouteServiceProvider::HOME);
        } catch (\Exception $e) {
            //throw $th;
            DB::rollback();
            return back()->with('error', 'Hubo un error al guardar los datos');
        }
    }
}
