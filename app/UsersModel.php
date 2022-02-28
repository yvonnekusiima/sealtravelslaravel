<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class UsersModel extends Model
{
    //Change Password
    public static function changepassword($username, $data)
    {
        DB::table('users')->where('Username', $data['username'])->update($data);
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
}
