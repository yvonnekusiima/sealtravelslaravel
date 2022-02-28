<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdministratorModel extends Model
{
    //Administrator Login
    public static function administratorlogin()
    {

    }

    //Administrator Activity Log
    public static function administratoractivitylog($data)
    {
        $value=DB::table('administratoractivitylog')->where('AdministratorId', $data['administratorid'])->get();
        if($value->count() == 0)
        {
            DB::table('administratoractivitylog')->insert($data);
            return 1;
        }
        else
        {
            return 0;
        }
    }

    //View Administrator Activity Log
    public static function viewadministratoractivitylog($administratorid=0)
    {
        if($administratorid==0)
        {
            $value=DB::table('administratoractivitylog')->orderBy('AdministratorId', 'asc')->get();
        }
        else
        {
            $value=DB::table('administratoractivitylog')->where('AdministratorId', $administratorid)->first();
        }
        return $value;
    }

    //View User Activity Log
    public static function viewuseractivitylog($username=0)
    {
        if($username==0)
        {
            $value=DB::table('useractivitylog')->orderBy('Username', 'asc')->get();
        }
        else
        {
            $value=DB::table('useractivitylog')->where('Username', $username)->first();
        }
        return $value;
    }

    //Change Password
    public static function changepassword($username, $data)
    {
        DB::table('administrator')->where('AdministratorId', $data['administratorid'])->update($data);
    }

    //View Users
    public static function userrecords($id=0)
    {
        if($id==0)
        {
            $value=DB::table('users')->orderBy('Id', 'asc')->get();
        }
        else
        {
            $value=DB::table('users')->where('Id', $id)->first();
        }
        return $value;
    }

    //Add User
    public static function adduser($data)
    {
        $value=DB::table('users')->where('Email', $data['email'])->get();
        if($value->count() == 0)
        {
            DB::table('users')->insert($data);
            return 1;
        }
        else
        {
            return 0;
        }
    }

    //Edit User
    public static function edituser($username, $data)
    {
        DB::table('users')->where('Username', $username)->update($data);
    }

    //Delete User
    public static function deleteuser($id)
    {
        DB::table('users')->where('Id', '=', $id)->delete();
    }
}
