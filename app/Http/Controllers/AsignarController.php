<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class AsignarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('users.sistema.listUser', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        $roles = Role::all();
        return view('users.sistema.userRol', compact('user','roles'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->roles()->sync($request->roles);


        return redirect()->route('asignar.edit', $user);
    }
    public function destroy(string $id)
    {
        //
    }
}
