<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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

        return redirect()->route('profiles.index')->with('success', 'El usuario se ha actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        //
    }
}
