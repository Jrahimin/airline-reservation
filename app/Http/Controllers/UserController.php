<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Enumeration\RoleType;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function all() {
        $users = User::orderBy('name')->paginate(10);
        return view('user.all', compact('users'));
    }

    public function add() {
        $roles = Role::all();
    	return view('user.add', compact('roles'));
    }

    public function addPost(Request $request) {
    	$rules = [
    			'name' => 'required|max:255',
	            'email' => 'required|email|max:255|unique:users',
	            'password' => 'required|min:6|confirmed',
	            'role' => 'required'
    		];

    	$this->validate($request, $rules);

    	$user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->assignRole($request->role);

        return redirect()->route('view_all_user');
    }

    public function edit(User $user) {
        $roles = Role::all();
    	return view('user.edit', compact('user', 'roles'));
    }

    public function editPost(Request $request, User $user) {
    	$rules = [
    			'name' => 'required|max:255',
	            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
	            'role' => 'required'
    		];

    	$this->validate($request, $rules);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

       $presentRole = $user->getRoleNames()->first();
        if($presentRole == $request->role)
            return redirect()->route('view_all_user');

        if(!empty($presentRole))
            $user->removeRole($presentRole);
        $user->assignRole($request->role);

        return redirect()->route('view_all_user');
    }

    public function delete(Request $request) {
        $user = User::find($request->id);

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found.']);
        }

        $user->delete();
        return response()->json(['success' => true, 'message' => 'Successfully Deleted.']);
    }
}
