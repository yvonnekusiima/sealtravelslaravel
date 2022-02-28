<?php

namespace App\Http\Controllers;

use App\HotelsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HotelsController extends Controller
{
    // View Hotel Records
    public function hotelrecordsa($id = 0)
    {
        $hotels['data'] = HotelsModel::hotelrecords();

        return view('Hotels/HotelRecordsViewA')->with("hotels", $hotels);
    }
    public function hotelrecordsu($id = 0)
    {
        $hotels['data'] = HotelsModel::hotelrecords();

        return view('Hotels/HotelRecordsViewU')->with("hotels", $hotels);
    }

    // Book a Hotel
    public function hotelbookinga(Request $request)
    {
        $hotelname = $request->input('hotelname');
        $name = $request->input('name');
        $email = $request->input('email');
        $travelers = $request->input('travelers');
        $rooms = $request->input('rooms');
        $roomtype = $request->input('roomtype');
        $checkin = $request->input('checkin');
        $checkout = $request->input('checkout');
        $amount = $request->input('amount');

        if ($hotelname != '' && $name != '' && $email != '' && $travelers != '' && $rooms != '' && $roomtype != '' && $checkin != '' && $checkout != '' && $amount != '')
        {
            $data = array('hotelname' => $hotelname, "name" => $name, "email" => $email, "travelers" => $travelers, "rooms" => $rooms, "roomtype" => $roomtype, "checkin" => $checkin, "checkout" => $checkout, "amount" => $amount);
            $value = HotelsModel::hotelbooking($data);

            if ($value)
            {
                echo "<script type='text/javascript'>alert('Booked');</script>";

                Mail::send([], [], function ($message) {
                    $hotelname = ($_POST['hotelname']);
                    $name = ($_POST['name']);
                    $email = ($_POST['email']);
                    $travelers = ($_POST['travelers']);
                    $rooms = ($_POST['rooms']);
                    $roomtype = ($_POST['roomtype']);
                    $checkin = ($_POST['checkin']);
                    $checkout = ($_POST['checkout']);
                    $amount = ($_POST['amount']);
                    $message->from("vonworkug@gmail.com", "VONWORK UG");
                    $message->to("$email");
                    $message->subject("Hotel Booking");
                    $message->setBody("Hello <b>$name</b>, Your hotel booking at <b>$hotelname</b> has been recieved. <br> <br> <b>BOOKING DETAILS</b> <br> Name - $name <br> Travelers - $travelers <br> Rooms - $rooms <br> Room Type - $roomtype <br> Check-in - $checkin <br> Check-out - $checkout <br> Amount - <b>$amount</b>", "text/html");
                    echo "<script type='text/javascript'>alert('Hotel Booking details sent');</script>";
                });
            }
            else
            {
                echo "<script type='text/javascript'>alert('Booking has already been made');</script>";
                return view('Hotels/HotelBookingViewA');
            }
        }
        return redirect()->action('HotelsController@hotelrecordsa');
    }

    public function hotelbookingu(Request $request)
    {
        $hotelname = $request->input('hotelname');
        $name = $request->input('name');
        $email = $request->input('email');
        $travelers = $request->input('travelers');
        $rooms = $request->input('rooms');
        $roomtype = $request->input('roomtype');
        $checkin = $request->input('checkin');
        $checkout = $request->input('checkout');
        $amount = $request->input('amount');

        if ($hotelname != '' && $name != '' && $email != '' && $travelers != '' && $rooms != '' && $roomtype != '' && $checkin != '' && $checkout != '' && $amount != '')
        {
            $data = array('hotelname' => $hotelname, "name" => $name, "email" => $email, "travelers" => $travelers, "rooms" => $rooms, "roomtype" => $roomtype, "checkin" => $checkin, "checkout" => $checkout, "amount" => $amount);
            $value = HotelsModel::hotelbooking($data);

            if ($value)
            {
                echo "<script type='text/javascript'>alert('Hotel has been booked');</script>";
                return redirect()->action('HotelsController@hotelrecordsu');
            }
            else
            {
                echo "<script type='text/javascript'>alert('Hotel has already been booked');</script>";
                return view('Hotels/HotelBookingViewU');
            }
        }
    }

    //Edit Hotel Booking
    public function edithotelbookinga(Request $request)
    {
        if ($request->input('edithotelbooking') != null )
        {
            if ($request->input('id') != null)
            {
                $id = $request->input('id');
                $hotelname = $request->input('hotelname');
                $name = $request->input('name');
                $email = $request->input('email');
                $travelers = $request->input('travelers');
                $rooms = $request->input('rooms');
                $roomtype = $request->input('roomtype');
                $checkin = $request->input('checkin');
                $checkout = $request->input('checkout');
                $amount = $request->input('amount');

                if ($hotelname != '' && $name != '' && $email != '' && $travelers != '' && $rooms != '' && $roomtype != '' && $checkin != '' && $checkout != '' && $amount != '')
                {
                    $data = array('hotelname' => $hotelname, "name" => $name, "email" => $email, "travelers" => $travelers, "rooms" => $rooms, "roomtype" => $roomtype, "checkin" => $checkin, "checkout" => $checkout, "amount" => $amount);
                    HotelsModel::edithotelbooking($id, $data);

                    echo "<script type='text/javascript'>alert('Changes saved');</script>";
                    return redirect()->action('HotelsController@hotelrecordsa');
                }
            }
        }
    }

    public function edithotelbookingu(Request $request)
    {
        if ($request->input('edithotelbooking') != null )
        {
            if ($request->input('id') != null)
            {
                $id = $request->input('id');
                $hotelname = $request->input('hotelname');
                $name = $request->input('name');
                $email = $request->input('email');
                $travelers = $request->input('travelers');
                $rooms = $request->input('rooms');
                $roomtype = $request->input('roomtype');
                $checkin = $request->input('checkin');
                $checkout = $request->input('checkout');
                $amount = $request->input('amount');

                if ($hotelname != '' && $name != '' && $email != '' && $travelers != '' && $rooms != '' && $roomtype != '' && $checkin != '' && $checkout != '' && $amount != '')
                {
                    $data = array('hotelname' => $hotelname, "name" => $name, "email" => $email, "travelers" => $travelers, "rooms" => $rooms, "roomtype" => $roomtype, "checkin" => $checkin, "checkout" => $checkout, "amount" => $amount);
                    HotelsModel::edithotelbooking($id, $data);

                    echo "<script type='text/javascript'>alert('Changes saved');</script>";
                    return redirect()->action('HotelsController@hotelrecordsu');
                }
            }
        }
    }

    //Delete Hotel Booking
    public function deletehotelbookinga($id = 0)
    {
        if ($id != 0)
        {
            HotelsModel::deletehotelbooking($id);
        }
        echo "<script type='text/javascript'>alert('Hotel Booking Deleted');</script>";

        return redirect()->action('HotelsController@hotelrecordsa', ['Id' => 0]);
    }
    public function deletehotelbookingu($id = 0)
    {
        if ($id != 0)
        {
            HotelsModel::deletehotelbooking($id);
        }
        echo "<script type='text/javascript'>alert('Hotel Booking Deleted');</script>";

        return redirect()->action('HotelsController@hotelrecordsu', ['Id' => 0]);
    }

}
