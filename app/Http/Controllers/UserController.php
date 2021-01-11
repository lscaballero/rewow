<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        return view('user.profile');
    }

    /**
     * Actualiza los datos del usuario
     *
     * @param $request recibe el método http
     * @return redirect a profile una vez guardados los datos
     */
    public function update(Request $request)
    {
        //traer usuario
        $user = \Auth::user();
        $id = $user->id;
        //validación de datos
        $validate = $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
        ]);
        //traer los datos del formulario
        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        //Asignar los datos al usuario

        $user->name = $name;
        $user->surname = $surname;
        $user->email = $email;

        $user->update();

        return redirect()->route('profile')->with((['message'=>'usuario actualziado correctamente']));
    }
}
