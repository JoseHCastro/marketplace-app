<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    public function index(Request $request)
    {      
        $users = User::all();
        return view('users.index',compact('users'));
    }

    public function create()
    {    
        $users = User::all();
        return view('users.create', compact('users'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);

        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Usuarios')->log('Registró')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $user->id;
        $lastActivity->save();
    
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Usuarios')->log('Editó')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $user->id;
        $lastActivity->save();
    
        return view('users.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Usuarios')->log('Eliminó')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $user->id;
        $lastActivity->save();

        $user->delete();

        return redirect()->route('users.index');
    }
}
