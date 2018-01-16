<?php

namespace App\Http\Controllers;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Http\Request;;

class RoleController extends Controller
{
    public function createRoles()
    {
        $permissions=Permission::all();
        return view('roles.create',compact('permissions')) ;
    }


    public function storeRoles(Request $request)
    {
        $input['name']=$request->name;
        $role=Role::create($input);

        for($i=0;$i<37;$i++)
        {
            if(!empty($request->permission[$i]))
                $role->givePermissionTo($request->permission[$i]);
        }

    }
    public function viewRoles()
    {
        $roles=Role::all();
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

    public function deleteRole($id)
    {
        $role=Role::find($id);
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
        $role=Role::find($id);
        $users = User::role($role->name)->get();
        $permissionsOfRole=Role::findByName($role->name)->permissions;
        $allPermissions=Permission::all();
        return view('roles.role_edit',compact('allPermissions','role','permissionsOfRole','users'));
    }

    public function editRoleStore(Request $request,Role $role)
    {
      $role=Role::findById($role->id);
      $role->name=$request->name;
      $permissionsOfRole=Role::findByName($role->name)->permissions;
      foreach ($permissionsOfRole as $permission)
      {
          $role->revokePermissionTo($permission);
      }
      $role->save();
        for($i=0;$i<37;$i++)
        {
            if(!empty($request->permission[$i]))
            {
                $hasPermission=$role->hasPermissionTo($request->permission[$i]);
                if($hasPermission==false)
                    $role->givePermissionTo($request->permission[$i]);
            }
        }

    }

    public function removeUser(Request $request,Role $role)
    {
        $userId=$request->user;
        $user=User::find($userId);
        $user->removeRole($role->name);
    }

}
