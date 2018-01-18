<?php

namespace App\Http\Controllers;
use App\Model\Group;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Http\Request;;

class RoleController extends Controller
{
    public function createRoles()
    {
        $groups = Group::all();
        $permissions=Permission::all();
        return view('roles.create',compact('permissions', 'groups')) ;
    }


    public function storeRoles(Request $request)
    {
        $countPermission = Permission::all()->count();

        $input['name']=$request->name;
        $role=Role::create($input);

        for($i=0; $i<$countPermission; $i++)
        {
            if(!empty($request->permissions[$i]))
                $role->givePermissionTo($request->permissions[$i]);
        }

        return redirect()->route('view_all_roles');
    }
    public function viewRoles()
    {
        $roles=Role::paginate(10);
        return view('roles.allRoles',compact('roles'));
    }

    public function assignRoles()
    {
        $users=User::all();
        $roles=Role::all();
        return view('roles.assign_role',compact('users','roles'));
    }

    public function storeAssignedRoles(Request $request)
    {
        $user=User::find($request->user);
        $user->assignRole($request->role);
    }

    public function deleteRole(Request $request)
    {
        $role=Role::find($request->id);
        $users = User::role($role->name)->get();
        $permissions=Role::findByName($role->name)->permissions;
        foreach ($users as $user)
        {
            $user->removeRole($role->name);
        }
        foreach ($permissions as $permission)
        {
            $role->revokePermissionTo($permission->name);
        }

        $role->delete();
    }

    public function viewRoleDetails($id)
    {
        $role=Role::find($id);
        $users = User::role($role->name)->get();
        $permissions=Role::findByName($role->name)->permissions;
        return view('roles.role_details',compact('users','permissions'));
    }

    public function editRole($id)
    {
        $groups = Group::all();
        $role=Role::find($id);
        $permissionsOfRole=Role::findByName($role->name)->permissions;
        $allPermissions=Permission::all();
        return view('roles.role_edit',compact('allPermissions','role','permissionsOfRole','users', 'groups'));
    }

    public function editRoleStore(Request $request,Role $role)
    {
      $role=Role::findById($role->id);
      $countPermission = Permission::all()->count();
      $permissionsOfRole=Role::findByName($role->name)->permissions;
      foreach ($permissionsOfRole as $permission)
      {
          $role->revokePermissionTo($permission);
      }

        for($i=0;$i<$countPermission;$i++)
        {
            if(!empty($request->permissions[$i]))
            {
                    $role->givePermissionTo($request->permissions[$i]);
            }
        }
        $role->name=$request->name;
        $role->save();

        $role->name=$request->name;
        $role->save();
        return redirect()->route('view_all_roles');
    }

    public function removeUser(Request $request,Role $role)
    {
        $userId=$request->user;
        $user=User::find($userId);
        $user->removeRole($role->name);
    }

}
