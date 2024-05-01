<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

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
        activity()->useLog('Usuarios')->log('Registró')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $user->id;
        $lastActivity->save();

        return redirect()->route('users.index')->with('success', 'El usuario se ha creado correctamente.');
    }




    public function edit($id)
    {
        $user = User::find($id);
        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Usuarios')->log('Editó')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $user->id;
        $lastActivity->save();

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

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

        return redirect()->route('users.index')->with('success', 'El usuario se ha actualizado correctamente.');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Usuarios')->log('Eliminó')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $user->id;
        $lastActivity->save();

        $user->delete();

        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }
}
