<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Enumeration\RoleType;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function all() {
        $users = User::orderBy('name')->paginate(10);
        return view('user.all', compact('users'));
    }

    public function add() {
    	return view('user.add');
    }

    public function addPost(Request $request) {
    	$rules = [
    			'name' => 'required|max:255',
	            'email' => 'required|email|max:255|unique:users',
	            'password' => 'required|min:6|confirmed',
	            'role' => 'required'
    		];

    	$this->validate($request, $rules);

    	User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('view_all_user');
    }

    public function edit(User $user) {
    	return view('user.edit', compact('user'));
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
        $user->role = $request->role;

        $user->save();
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
