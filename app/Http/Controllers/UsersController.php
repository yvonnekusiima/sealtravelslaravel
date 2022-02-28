<?php

namespace App\Http\Controllers;

use App\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Validator;

class UsersController extends Controller
{
    //User Login
    public function userlogin(Request $request)
    {
        $this->validate($request, ['username', 'password']);
        $data = array('username' => $request->input('username'), 'password' => $request->input('password'), 'captcha' => 'required|captcha');

        if (Auth::attempt($data))
        {
            return view('Users/UserPageView');
        }
        else
        {
            echo "<script type='text/javascript'>alert('Invalid username or password');</script>";

            return view('Users/UserLoginView');
        }
    }

    //Change Password
    public function changepasswordu(Request $request)
    {
        if ($request->input('changepasswordu') != null )
        {
            if ($request->input('username') != null)
            {
                $username = $request->input('username');
                $newpassword = Hash::make($request->input('newpassword'));

                if ($username != '' && $newpassword != '')
                {
                    $data = array('username' => $username, "newpassword" => $newpassword);
                    UsersModel::changepassword($username, $data);

                    Mail::send([], [], function ($message) {
                        $username = ($_POST['username']);
                        $email = ($_POST['email']);
                        $message->from("vonworkug@gmail.com", "VONWORK UG");
                        $message->to("$email", "$username");
                        $message->subject("Password Changed");
                        $message->setBody("Hello <b>$username</b>, Your have changed your password.", "text/html");
                        echo "<script type='text/javascript'>alert('Password Change notification sent');</script>";
                    });

                    echo "<script type='text/javascript'>alert('Changes saved');</script>";
                }
            }
        }
        return view('Users/ChangePasswordViewU');
    }

    // View User Activity Log
    public function useractivitylogu($id = 0)
    {
        $useractivitylog['data'] = UsersModel::viewuseractivitylog();

        return view('Users/UserActivityLogViewU')->with("useractivitylog", $useractivitylog);
    }
}
