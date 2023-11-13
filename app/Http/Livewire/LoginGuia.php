<?php

namespace App\Http\Livewire;


use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

use Livewire\Component;

class LoginGuia extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $ver_modal = 'hidden-modal';
    public $email, $password;

    public function render()
    {
        return view('livewire.login-guia');
    }
    public function verModal()
    {
        if($this->ver_modal == 'hidden-modal')
        {
            $this->ver_modal = '';
        }else
        {
            $this->ver_modal = 'hidden-modal';
        }
        $this->resetFields();
    }

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    protected $messages = [
        'email.required' => 'El campo email es requerido',
        'email.email' => 'Debe ingresar un email valido',
        'password.required' => 'Debe ingresar un password',
    ];

    public function resetFields()
    {
        $this->reset(['email', 'password']);
    }
    public function autenticarcion()
    {
        $this->validate();
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $this->ver_modal = 'hidden-modal';
            return redirect()->route('guia_alimentaria');
        }else{
            $this->addError('no-autorizado', 'Email o contraseña incorrectos');
        }
    }
}
