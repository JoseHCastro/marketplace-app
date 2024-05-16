<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        return view('profile.index', compact('user'));
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8192',
        ]);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // Verificar si se proporcionó una nueva contraseña
        if ($request->filled('password')) {
            // Validar que la contraseña coincida con la confirmación
            $request->validate([
                'password' => 'required|string|min:8|confirmed',
            ]);

            // Actualizar la contraseña
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
        $bitacora->usuario_afectado = Auth::user()->name;
        $bitacora->evento = 'Actualizar';
        $bitacora->contexto = 'Perfil';
        $bitacora->descripcion = 'Actualizó su perfil';
        $bitacora->origen = 'Web';
        $bitacora->ip = $request->ip();
        $bitacora->save();

        return redirect()->route('profiles.index')->with('success', 'El usuario se ha actualizado correctamente.');
    }


    public function destroy(string $id)
    {
        //
    }
}
