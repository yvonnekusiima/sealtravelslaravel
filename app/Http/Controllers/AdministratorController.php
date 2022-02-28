<?php

namespace App\Http\Controllers;

use App\AdministratorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class AdministratorController extends Controller
{
    //Administrator Login
    public function administratorlogin(Request $request)
    {

    }

    // View Administrator Activity Log
    public function administratoractivitylog($id = 0)
    {
        $administratoractivitylog['data'] = AdministratorModel::viewadministratoractivitylog();

        return view('Administrator/AdministratorActivityLogView')->with("administratoractivitylog", $administratoractivitylog);
    }

    // View User Activity Log
    public function useractivityloga($id = 0)
    {
        $useractivitylog['data'] = AdministratorModel::viewuseractivitylog();

        return view('Administrator/UserActivityLogViewA')->with("useractivitylog", $useractivitylog);
    }

    //Change Password
    public function changepassworda(Request $request)
    {
        if ($request->input('changepassworda') != null )
        {
            if ($request->input('administratorid') != null)
            {
                $administratorid = $request->input('administratorid');
                $newpassword = $request->input('newpassword');

                if ($administratorid != '' && $newpassword != '')
                {
                    $data = array('administratorid' => $administratorid, "newpassword" => $newpassword);
                    AdministratorModel::changepassword($administratorid, $data);

                    echo "<script type='text/javascript'>alert('Changes saved');</script>";
                }
            }
        }
    }

    // Add user
    public function adduser()
    {
        try
        {
            Mail::send([], [], function ($message) {
                $email = ($_POST['email']);
                $username = ($_POST['username']);
                $password = str::random(5);
                $dateadded = ($_POST['dateadded']);
                $hashedpassword = $password;

                if ($email != '' && $username != '' && $hashedpassword != '' && $dateadded != '')
                {
                    $data = array('email' => $email, "username" => $username, "password" => $hashedpassword, "dateadded" => $dateadded);
                    $value = AdministratorModel::adduser($data);
                }
                if ($value)
                {
                    echo "<script type='text/javascript'>alert('User Added');</script>";

                    $message->from("vonworkug@gmail.com", "VONWORK UG");
                    $message->to("$email");
                    $message->subject("Seal Travels Login Details");
                    $message->setBody("Your username is <b>$username</b> <br> Your password is <b>$password</b>", "text/html");
                    echo "<script type='text/javascript'>alert('Login Credentials sent');</script>";
                }
                else
                {
                    echo "<script type='text/javascript'>alert('User already exists');</script>";
                    return view('Administrator/AddUserView');
                }
            });
            return redirect()->action('AdministratorController@userrecords');
        }
        catch (\Exception $ex)
        {
            $errormessage =  $ex->getMessage();
            echo "<script type='text/javascript'>alert('ERROR: $errormessage');</script>";
            return view('Administrator/AddUserView');
        }
    }

    // View Users
    public function userrecords($id = 0)
    {
        $users['data'] = AdministratorModel::userrecords();
        return view('Administrator/UserRecordsView')->with("users", $users);
    }

    //User Details
    public function userdetails(Request $request)
    {
        $id = $request->input('id');
        $userdetails = DB::select("select * from users where Id=$id");
        return view('Administrator/ViewUserDetails')->with("userdetails", $userdetails);
    }

    //Edit User
    public function edituser(Request $request)
    {
        if ($request->input('edituser') != null )
        {
            if ($request->input('username') != null)
            {
                $email = $request->input('email');
                $username = $request->input('username');

                if ($email != '' && $username != '')
                {
                    $data = array('email' => $email, "username" => $username);
                    AdministratorModel::edituser($username, $data);

                    Mail::send([], [], function ($message) {
                        $email = ($_POST['email']);
                        $username = ($_POST['username']);
                        $message->from("vonworkug@gmail.com", "VONWORK UG");
                        $message->to("$email");
                        $message->subject("Email Change");
                        $message->setBody("Hello <b>$username</b>, your email has been changed.", "text/html");
                        echo "<script type='text/javascript'>alert('Email sent');</script>";
                    });
                    echo "<script type='text/javascript'>alert('Changes saved');</script>";
                    return redirect()->action('AdministratorController@userrecords');
                    return view('Administrator/UserRecordsView');
                }
            }
        }
    }

    //Delete User
    public function deleteuser($id = 0)
    {
        if ($id != 0)
        {
            AdministratorModel::deleteuser($id);
        }
        echo "<script type='text/javascript'>alert('User Deleted');</script>";
        return redirect()->action('AdministratorController@userrecords', ['Id' => 0]);
        return view('Administrator/UserRecordsView');
    }
}
