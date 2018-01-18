<?php

use App\Model\Group;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //plane,flight,order,passenger,City,ticket,user,role
        $group1=Group::create(['name'=>'Plane']);
        $group2=Group::create(['name'=>'Flight']);
        $group3=Group::create(['name'=>'Order']);
        $group4=Group::create(['name'=>'Passenger']);
        $group5=Group::create(['name'=>'City']);
        $group6=Group::create(['name'=>'Ticket']);
        $group7=Group::create(['name'=>'User']);
        $group8=Group::create(['name'=>'Role']);
        $group9=Group::create(['name'=>'Settings']);


        $permission1 = Permission::create(['name' => 'view all planes' ,'group_id'=>'1']);
        $permission2=Permission::create(['name' => 'add planes','group_id'=>'1']);
        $permission3 = Permission::create(['name' => 'edit planes','group_id'=>'1']);
        $permission4=Permission::create(['name' => 'delete planes','group_id'=>'1']);
        $permission5 = Permission::create(['name' => 'search available flights','group_id'=>'2']);
        $permission6=Permission::create(['name' => 'view order','group_id'=>'3']);
        $permission8=Permission::create(['name' => 'delete order','group_id'=>'3']);
        $permission10=Permission::create(['name' => 'view all passenger types','group_id'=>'4']);
        $permission11= Permission::create(['name' => 'add passenger types','group_id'=>'4']);
        $permission12=Permission::create(['name' => 'edit passenger types','group_id'=>'4']);
        $permission13= Permission::create(['name' => 'delete passenger types','group_id'=>'4']);
        $permission14=Permission::create(['name' => 'view all cities','group_id'=>'5']);
        $permission15= Permission::create(['name' => 'add cities','group_id'=>'5']);
        $permission16=Permission::create(['name' => 'edit cities','group_id'=>'5']);
        $permission17= Permission::create(['name' => 'delete cities','group_id'=>'5']);
        $permission19=Permission::create(['name' => 'store ticket','group_id'=>'6']);
        $permission20= Permission::create(['name' => 'print ticket','group_id'=>'6']);
        $permission21=Permission::create(['name' => 'view all tickets','group_id'=>'6']);
        $permission22= Permission::create(['name' => 'delete tickets','group_id'=>'6']);
        $permission23=Permission::create(['name' => 'view all flights','group_id'=>'2']);
        $permission24= Permission::create(['name' => 'add flights','group_id'=>'2']);
        $permission25=Permission::create(['name' => 'edit flights','group_id'=>'2']);
        $permission26= Permission::create(['name' => 'delete flights','group_id'=>'2']);
        $permission27=Permission::create(['name' => 'view all user','group_id'=>'7']);
        $permission28= Permission::create(['name' => 'add user','group_id'=>'7']);
        $permission29=Permission::create(['name' => 'edit user','group_id'=>'7']);
        $permission30= Permission::create(['name' => 'delete user','group_id'=>'7']);
        $permission31=Permission::create(['name' => 'create roles','group_id'=>'8']);
        $permission32= Permission::create(['name' => 'delete roles','group_id'=>'8']);
        $permission33=Permission::create(['name' => 'edit roles','group_id'=>'8']);
        $permission34= Permission::create(['name' => 'assign roles','group_id'=>'8']);
        $permission35=Permission::create(['name' => 'revoke roles','group_id'=>'8']);
        $permission36=Permission::create(['name' => 'view all roles','group_id'=>'8']);
        $permission37=Permission::create(['name'=>'save settings','group_id'=>'9']);
    }
}
