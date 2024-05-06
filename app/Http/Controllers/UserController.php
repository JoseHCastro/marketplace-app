<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bitacora;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8192',
        ]);

        $url_profile_photo = $request->file('profile_photo') ? $request->file('profile_photo')->store('public/images') : null;

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'profile_photo_path' => $url_profile_photo ? Storage::url($url_profile_photo) : null,
        ]);

        date_default_timezone_set("America/La_Paz");
        $bitacora = new Bitacora();
        $bitacora->usuario = Auth::user()->name;
        $bitacora->hora = now();
        $bitacora->usuario_afectado = $user->name;
        $bitacora->evento = 'Crear';
        $bitacora->contexto = 'Usuario';
        $bitacora->descripcion = 'Creó el usuario ' . $user->name . ' ' . $user->email;
        $bitacora->origen = 'Web';
        $bitacora->ip = $request->ip();
        $bitacora->save();

        return redirect()->route('users.index')->with('success', 'El usuario se ha creado correctamente.');
    }




    public function edit($id)
    {
        $user = User::find($id);
        date_default_timezone_set("America/La_Paz");


        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $userAux = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'required|same:confirm-password',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8192',
        ]);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->has('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('profile_photo')) {
            $profilePhotoPath = $request->file('profile_photo')->store('public/images');
            $userData['profile_photo_path'] = Storage::url($profilePhotoPath);
        }

        $user->update($userData);

        date_default_timezone_set("America/La_Paz");
        $bitacora = new Bitacora();
        $bitacora->usuario = Auth::user()->name;
        $bitacora->hora = now();
        $bitacora->usuario_afectado = $user->name;
        $bitacora->evento = 'Actualizar';
        $bitacora->contexto = 'Usuario';
        $bitacora->descripcion = 'Actualizó el usuario ' . $userAux->name . ' ' . $userAux->email . 'a ' . $user->name . ' ' . $user->email;
        $bitacora->origen = 'Web';
        $bitacora->ip = $request->ip();
        $bitacora->save();

        return redirect()->route('users.index')->with('success', 'El usuario se ha actualizado correctamente.');
    }

    public function destroy($id, Request $request)
    {
        $user = User::find($id);

        date_default_timezone_set("America/La_Paz");
        $bitacora = new Bitacora();
        $bitacora->usuario = Auth::user()->name;
        $bitacora->hora = now();
        $bitacora->usuario_afectado = $user->name;
        $bitacora->evento = 'Eliminar';
        $bitacora->contexto = 'Usuario';
        $bitacora->descripcion = 'Eliminó el usuario ' . $user->name . ' ' . $user->email;
        $bitacora->origen = 'Web';
        $bitacora->ip = $request->ip();
        $bitacora->save();

        $user->delete();

        return redirect()->route('users.index');
    }

    public function show($id, Request $request)
    {
        $user = User::find($id);

        date_default_timezone_set("America/La_Paz");
        $bitacora = new Bitacora();
        $bitacora->usuario = Auth::user()->name;
        $bitacora->hora = now();
        $bitacora->usuario_afectado = $user->name;
        $bitacora->evento = 'Mostrar';
        $bitacora->contexto = 'Usuario';
        $bitacora->descripcion = 'Visualizó el usuario ' . $user->name;
        $bitacora->origen = 'Web';
        $bitacora->ip = $request->ip();
        $bitacora->save();

        return view('users.show', compact('user'));
    }
}
