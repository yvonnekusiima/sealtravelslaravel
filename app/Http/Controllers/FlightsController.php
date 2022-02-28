<?php

namespace App\Http\Controllers;

use App\FlightsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class FlightsController extends Controller
{
    // View Oneway Flights
    public function onewayrecordsa($id = 0)
    {
        $flights['data'] = FlightsModel::onewayrecords();

        return view('Flights/OnewayRecordsViewA')->with("flights", $flights);
    }
    public function onewayrecordsu($id = 0)
    {
        $flights['data'] = FlightsModel::onewayrecords();

        return view('Flights/OnewayRecordsViewU')->with("flights", $flights);
    }

    // View Roundtrip Flights
    public function roundtriprecordsa($id = 0)
    {
        $flights['data'] = FlightsModel::roundtriprecords();

        return view('Flights/RoundtripRecordsViewA')->with("flights", $flights);
    }
    public function roundtriprecordsu($id = 0)
    {
        $flights['data'] = FlightsModel::roundtriprecords();

        return view('Flights/RoundtripRecordsViewU')->with("flights", $flights);
    }

    // View Flight Payments
    public function flightpaymentrecordsa($id = 0)
    {
        $flightpayments['data'] = FlightsModel::flightpaymentrecords();

        return view('Flights/FlightPaymentRecordsViewA')->with("flightpayments", $flightpayments);
    }
    public function flightpaymentrecordsu($id = 0)
    {
        $flightpayments['data'] = FlightsModel::flightpaymentrecords();

        return view('Flights/FlightPaymentRecordsViewU')->with("flightpayments", $flightpayments);
    }

    // Book Oneway Flight
    public function onewaybookinga(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $contact = $request->input('contact');
        $triptype = $request->input('triptype');
        $leavingfrom = $request->input('leavingfrom');
        $goingto = $request->input('goingto');
        $departing = $request->input('departing');
        $adults = $request->input('adults');
        $children = $request->input('children');
        $flighttype = $request->input('flighttype');
        $airline = $request->input('airline');
        $travelclass = $request->input('travelclass');
        $amount = $request->input('amount');

        if ($name != '' && $email != '' && $contact != '' && $triptype != '' && $leavingfrom != '' && $goingto != '' && $departing != '' && $adults != '' && $children != '' && $flighttype != '' && $airline != '' && $travelclass != '' && $amount != '')
        {
            $data = array('name' => $name, "email" => $email, "contact" => $contact, "triptype" => $triptype, "leavingfrom" => $leavingfrom, "goingto" => $goingto, "departing" => $departing, "adults" => $adults, "children" => $children, "flighttype" => $flighttype, "airline" => $airline, "travelclass" => $travelclass, "amount" => $amount);
            $value = FlightsModel::onewaybooking($data);

            if ($value)
            {
                echo "<script type='text/javascript'>alert('Flight has been booked');</script>";

                Mail::send([], [], function ($message) {
                    $name = ($_POST['name']);
                    $email = ($_POST['email']);
                    $contact = ($_POST['contact']);
                    $triptype = ($_POST['triptype']);
                    $leavingfrom = ($_POST['leavingfrom']);
                    $goingto = ($_POST['goingto']);
                    $departing = ($_POST['departing']);
                    $adults = ($_POST['adults']);
                    $children = ($_POST['children']);
                    $flighttype = ($_POST['flighttype']);
                    $airline = ($_POST['airline']);
                    $travelclass = ($_POST['travelclass']);
                    $amount = ($_POST['amount']);
                    $message->from("vonworkug@gmail.com", "VONWORK UG");
                    $message->to("$email");
                    $message->subject("Flight Booking");
                    $message->setBody("Hello <b>$name</b>, Your flight booking has been recieved. <br> <br> <b>BOOKING DETAILS</b> <br><br> Name - $name <br> Contact - $contact <br> Trip Type - $triptype <br> Leaving From - $leavingfrom <br> Going To - $goingto <br> Departing - $departing <br> Adults - $adults <br> Children - $children <br> Flight Type - $flighttype <br> Travel Class - $travelclass <br> Airline - $airline <br> Amount - <b>$amount</b>", "text/html");
                    echo "<script type='text/javascript'>alert('Flight Booking details sent');</script>";
                });
            }
            else
            {
                echo "<script type='text/javascript'>alert('Flight has already been booked');</script>";
                return view('Flights/OnewayBookingViewA');
            }
        }
        return redirect()->action('FlightsController@onewayrecordsa');
    }
    public function onewaybookingu(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $contact = $request->input('contact');
        $triptype = $request->input('triptype');
        $leavingfrom = $request->input('leavingfrom');
        $goingto = $request->input('goingto');
        $departing = $request->input('departing');
        $adults = $request->input('adults');
        $children = $request->input('children');
        $flighttype = $request->input('flighttype');
        $airline = $request->input('airline');
        $travelclass = $request->input('travelclass');
        $amount = $request->input('amount');

        if ($name != '' && $email != '' && $contact != '' && $triptype != '' && $leavingfrom != '' && $goingto != '' && $departing != '' && $adults != '' && $children != '' && $flighttype != '' && $airline != '' && $travelclass != '' && $amount != '')
        {
            $data = array('name' => $name, "email" => $email, "contact" => $contact, "triptype" => $triptype, "leavingfrom" => $leavingfrom, "goingto" => $goingto, "departing" => $departing, "adults" => $adults, "children" => $children, "flighttype" => $flighttype, "airline" => $airline, "travelclass" => $travelclass, "amount" => $amount);
            $value = FlightsModel::onewaybooking($data);

            if ($value)
            {
                echo "<script type='text/javascript'>alert('Flight has been booked');</script>";

                Mail::send([], [], function ($message) {
                    $name = ($_POST['name']);
                    $email = ($_POST['email']);
                    $contact = ($_POST['contact']);
                    $triptype = ($_POST['triptype']);
                    $leavingfrom = ($_POST['leavingfrom']);
                    $goingto = ($_POST['goingto']);
                    $departing = ($_POST['departing']);
                    $adults = ($_POST['adults']);
                    $children = ($_POST['children']);
                    $flighttype = ($_POST['flighttype']);
                    $airline = ($_POST['airline']);
                    $travelclass = ($_POST['travelclass']);
                    $amount = ($_POST['amount']);
                    $message->from("vonworkug@gmail.com", "VONWORK UG");
                    $message->to("$email");
                    $message->subject("Flight Booking");
                    $message->setBody("Hello <b>$name</b>, Your flight booking has been recieved. <br> <br> <b>BOOKING DETAILS</b> <br><br> Name - $name <br> Contact - $contact <br> Trip Type - $triptype <br> Leaving From - $leavingfrom <br> Going To - $goingto <br> Departing - $departing <br> Adults - $adults <br> Children - $children <br> Flight Type - $flighttype <br> Travel Class - $travelclass <br> Airline - $airline <br> Amount - <b>$amount</b>", "text/html");
                    echo "<script type='text/javascript'>alert('Flight Booking details sent');</script>";
                });
            }
            else
            {
                echo "<script type='text/javascript'>alert('Flight has already been booked');</script>";
                return view('Flights/OnewayBookingViewU');
            }
        }
        return redirect()->action('FlightsController@onewayrecordsu');
    }

    // Book Roundtrip Flight
    public function roundtripbookinga(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $contact = $request->input('contact');
        $triptype = $request->input('triptype');
        $leavingfrom = $request->input('leavingfrom');
        $goingto = $request->input('goingto');
        $departing = $request->input('departing');
        $returning = $request->input('returning');
        $adults = $request->input('adults');
        $children = $request->input('children');
        $flighttype = $request->input('flighttype');
        $airline = $request->input('airline');
        $travelclass = $request->input('travelclass');
        $amount = $request->input('amount');

        if ($name != '' && $email != '' && $contact != '' && $triptype != '' && $leavingfrom != '' && $goingto != '' && $departing != '' && $returning != '' && $adults != '' && $children != '' && $flighttype != '' && $airline != '' && $travelclass != '' && $amount != '')
        {
            $data = array('name' => $name, "email" => $email, "triptype" => $triptype, "leavingfrom" => $leavingfrom, "goingto" => $goingto, "departing" => $departing, "returning" => $returning, "adults" => $adults, "children" => $children, "flighttype" => $flighttype, "airline" => $airline, "travelclass" => $travelclass, "amount" => $amount);
            $value = FlightsModel::roundtripbooking($data);

            if ($value)
            {
                echo "<script type='text/javascript'>alert('Flight has been booked');</script>";

                Mail::send([], [], function ($message) {
                    $name = ($_POST['name']);
                    $email = ($_POST['email']);
                    $contact = ($_POST['contact']);
                    $triptype = ($_POST['triptype']);
                    $leavingfrom = ($_POST['leavingfrom']);
                    $goingto = ($_POST['goingto']);
                    $departing = ($_POST['departing']);
                    $returning = ($_POST['returning']);
                    $adults = ($_POST['adults']);
                    $children = ($_POST['children']);
                    $flighttype = ($_POST['flighttype']);
                    $airline = ($_POST['airline']);
                    $travelclass = ($_POST['travelclass']);
                    $amount = ($_POST['amount']);
                    $message->from("vonworkug@gmail.com", "VONWORK UG");
                    $message->to("$email");
                    $message->subject("Flight Booking");
                    $message->setBody("Hello <b>$name</b>, Your flight booking has been recieved. <br> <br> <b>BOOKING DETAILS</b> <br><br> Name - $name <br> Contact - $contact <br> Trip Type - $triptype <br> Leaving From - $leavingfrom <br> Going To - $goingto <br> Departing - $departing <br> Returning - $returning <br> Adults - $adults <br> Children - $children <br> Flight Type - $flighttype <br> Travel Class - $travelclass <br> Airline - $airline <br> Amount - <b>$amount</b>", "text/html");
                    echo "<script type='text/javascript'>alert('Flight Booking details sent');</script>";
                });
            }
            else
            {
                echo "<script type='text/javascript'>alert('Flight has already been booked');</script>";
                return view('Flights/RoundtripBookingViewA');
            }
        }
        return redirect()->action('FlightsController@roundtriprecordsa');
    }
    public function roundtripbookingu(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $contact = $request->input('contact');
        $triptype = $request->input('triptype');
        $leavingfrom = $request->input('leavingfrom');
        $goingto = $request->input('goingto');
        $departing = $request->input('departing');
        $returning = $request->input('returning');
        $adults = $request->input('adults');
        $children = $request->input('children');
        $flighttype = $request->input('flighttype');
        $airline = $request->input('airline');
        $travelclass = $request->input('travelclass');
        $amount = $request->input('amount');

        if ($name != '' && $email != '' && $contact != '' && $triptype != '' && $leavingfrom != '' && $goingto != '' && $departing != '' && $returning != '' && $adults != '' && $children != '' && $flighttype != '' && $airline != '' && $travelclass != '' && $amount != '')
        {
            $data = array('name' => $name, "email" => $email, "triptype" => $triptype, "leavingfrom" => $leavingfrom, "goingto" => $goingto, "departing" => $departing, "returning" => $returning, "adults" => $adults, "children" => $children, "flighttype" => $flighttype, "airline" => $airline, "travelclass" => $travelclass, "amount" => $amount);
            $value = FlightsModel::roundtripbooking($data);

            if ($value)
            {
                echo "<script type='text/javascript'>alert('Flight has been booked');</script>";

                Mail::send([], [], function ($message) {
                    $name = ($_POST['name']);
                    $email = ($_POST['email']);
                    $contact = ($_POST['contact']);
                    $triptype = ($_POST['triptype']);
                    $leavingfrom = ($_POST['leavingfrom']);
                    $goingto = ($_POST['goingto']);
                    $departing = ($_POST['departing']);
                    $returning = ($_POST['returning']);
                    $adults = ($_POST['adults']);
                    $children = ($_POST['children']);
                    $flighttype = ($_POST['flighttype']);
                    $airline = ($_POST['airline']);
                    $travelclass = ($_POST['travelclass']);
                    $amount = ($_POST['amount']);
                    $message->from("vonworkug@gmail.com", "VONWORK UG");
                    $message->to("$email");
                    $message->subject("Flight Booking");
                    $message->setBody("Hello <b>$name</b>, Your flight booking has been recieved. <br> <br> <b>BOOKING DETAILS</b> <br><br> Name - $name <br> Contact - $contact <br> Trip Type - $triptype <br> Leaving From - $leavingfrom <br> Going To - $goingto <br> Departing - $departing <br> Returning - $returning <br> Adults - $adults <br> Children - $children <br> Flight Type - $flighttype <br> Travel Class - $travelclass <br> Airline - $airline <br> Amount - <b>$amount</b>", "text/html");
                    echo "<script type='text/javascript'>alert('Flight Booking details sent');</script>";
                });
            }
            else
            {
                echo "<script type='text/javascript'>alert('Flight has already been booked');</script>";
                return view('Flights/RoundtripBookingViewU');
            }
        }
        return redirect()->action('FlightsController@roundtriprecordsu');
    }

    //Flight Payment
    public function flightpayment(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $paymentmethod = $request->input('paymentmethod');
        $cardnumber = Hash::make($request->input('cardnumber'));
        $cvv = Hash::make($request->input('cvv'));
        $expirydate = $request->input('expirydate');
        $amount = $request->input('amount');

        if ($name != '' && $email != '' && $paymentmethod != '' && $cardnumber != '' && $cvv != '' && $expirydate != '' && $amount != '')
        {
            $data = array('name' => $name, "email" => $email, "paymentmethod" => $paymentmethod, "cardnumber" => $cardnumber, "cvv" => $cvv, "expirydate" => $expirydate, "amount" => $amount);
            $value = FlightsModel::flightpayment($data);

            if ($value)
            {
                echo "<script type='text/javascript'>alert('Your payment has been submitted');</script>";

                Mail::send([], [], function ($message) {
                    $name = ($_POST['name']);
                    $email = ($_POST['email']);
                    $paymentmethod = ($_POST['paymentmethod']);
                    $amount = ($_POST['amount']);
                    $message->from("vonworkug@gmail.com", "VONWORK UG");
                    $message->to("$email");
                    $message->subject("Hotel Booking");
                    $message->setBody("Hello <b>$name</b>, Your flight payment has been recieved. <br> <br> <b>FLIGHT PAYMENT DETAILS</b> <br><br> Name - $name <br> Payment Method - $paymentmethod <br> Amount - <b>$amount</b>", "text/html");
                    echo "<script type='text/javascript'>alert('Flight Payment details sent');</script>";
                });
            }
            else
            {
                echo "<script type='text/javascript'>alert('Payment has already been submitted');</script>";
                return view('Flights/FlightPaymentView');
            }
        }
        return redirect()->action('FlightsController@flightpaymentrecordsu');
    }

    //Edit Oneway Flight
    public function editonewaybookinga(Request $request)
    {
        if ($request->input('editonewaybooking') != null )
        {
            if ($request->input('id') != null)
            {
                $id = $request->input('id');
                $name = $request->input('name');
                $email = $request->input('email');
                $contact = $request->input('contact');
                $triptype = $request->input('triptype');
                $leavingfrom = $request->input('leavingfrom');
                $goingto = $request->input('goingto');
                $departing = $request->input('departing');
                $adults = $request->input('adults');
                $children = $request->input('children');
                $flighttype = $request->input('flighttype');
                $airline = $request->input('airline');
                $travelclass = $request->input('travelclass');
                $amount = $request->input('amount');

                if ($name != '' && $email != '' && $contact != '' && $triptype != '' && $leavingfrom != '' && $goingto != '' && $departing != '' && $adults != '' && $children != '' && $flighttype != '' && $airline != '' && $travelclass!= '' && $amount != '')
                {
                    $data = array('name' => $name, "email" => $email, "contact" => $contact, "triptype" => $triptype, "leavingfrom" => $leavingfrom, "goingto" => $goingto, "departing" => $departing, "adults" => $adults, "children" => $children, "flighttype" => $flighttype, "airline" => $airline, "travelclass" => $travelclass, "amount" => $amount);
                    FlightsModel::editonewaybooking($id, $data);

                    echo "<script type='text/javascript'>alert('Changes saved');</script>";

                    Mail::send([], [], function ($message) {
                        $name = ($_POST['name']);
                        $email = ($_POST['email']);
                        $contact = ($_POST['contact']);
                        $triptype = ($_POST['triptype']);
                        $leavingfrom = ($_POST['leavingfrom']);
                        $goingto = ($_POST['goingto']);
                        $departing = ($_POST['departing']);
                        $adults = ($_POST['adults']);
                        $children = ($_POST['children']);
                        $flighttype = ($_POST['flighttype']);
                        $airline = ($_POST['airline']);
                        $travelclass = ($_POST['travelclass']);
                        $amount = ($_POST['amount']);
                        $message->from("vonworkug@gmail.com", "VONWORK UG");
                        $message->to("$email");
                        $message->subject("Flight Booking");
                        $message->setBody("Hello <b>$name</b>, Your flight booking has been updated. <br> <br> <b>BOOKING DETAILS</b> <br><br> Name - $name <br> Contact -  $contact <br> Trip Type - $triptype <br> Leaving From - $leavingfrom <br> Going To - $goingto <br> Departing - $departing <br> Adults - $adults <br> Children - $children <br> Flight Type - $flighttype <br> Travel Class - $travelclass <br> Airline - $airline <br> Amount - <b>$amount</b>", "text/html");
                        echo "<script type='text/javascript'>alert('Updated flight booking details sent');</script>";
                    });
                }
            }
        }
        return redirect()->action('FlightsController@onewayrecordsa');
    }
    public function editonewaybookingu(Request $request)
    {
        if ($request->input('editonewaybooking') != null )
        {
            if ($request->input('id') != null)
            {
                $id = $request->input('id');
                $name = $request->input('name');
                $email = $request->input('email');
                $contact = $request->input('contact');
                $triptype = $request->input('triptype');
                $leavingfrom = $request->input('leavingfrom');
                $goingto = $request->input('goingto');
                $departing = $request->input('departing');
                $adults = $request->input('adults');
                $children = $request->input('children');
                $flighttype = $request->input('flighttype');
                $airline = $request->input('airline');
                $travelclass = $request->input('travelclass');
                $amount = $request->input('amount');

                if ($name != '' && $email != '' && $contact != '' && $triptype != '' && $leavingfrom != '' && $goingto != '' && $departing != '' && $adults != '' && $children != '' && $flighttype != '' && $airline != '' && $travelclass!= '' && $amount != '')
                {
                    $data = array('name' => $name, "email" => $email, "contact" => $contact, "triptype" => $triptype, "leavingfrom" => $leavingfrom, "goingto" => $goingto, "departing" => $departing, "adults" => $adults, "children" => $children, "flighttype" => $flighttype, "airline" => $airline, "travelclass" => $travelclass, "amount" => $amount);
                    FlightsModel::editonewaybooking($id, $data);

                    echo "<script type='text/javascript'>alert('Changes saved');</script>";

                    Mail::send([], [], function ($message) {
                        $name = ($_POST['name']);
                        $email = ($_POST['email']);
                        $contact = ($_POST['contact']);
                        $triptype = ($_POST['triptype']);
                        $leavingfrom = ($_POST['leavingfrom']);
                        $goingto = ($_POST['goingto']);
                        $departing = ($_POST['departing']);
                        $adults = ($_POST['adults']);
                        $children = ($_POST['children']);
                        $flighttype = ($_POST['flighttype']);
                        $airline = ($_POST['airline']);
                        $travelclass = ($_POST['travelclass']);
                        $amount = ($_POST['amount']);
                        $message->from("vonworkug@gmail.com", "VONWORK UG");
                        $message->to("$email");
                        $message->subject("Flight Booking");
                        $message->setBody("Hello <b>$name</b>, Your flight booking has been updated. <br> <br> <b>BOOKING DETAILS</b> <br><br> Name - $name <br> Contact -  $contact <br> Trip Type - $triptype <br> Leaving From - $leavingfrom <br> Going To - $goingto <br> Departing - $departing <br> Adults - $adults <br> Children - $children <br> Flight Type - $flighttype <br> Travel Class - $travelclass <br> Airline - $airline <br> Amount - <b>$amount</b>", "text/html");
                        echo "<script type='text/javascript'>alert('Updated flight booking details sent');</script>";
                    });
                }
            }
        }
        return redirect()->action('FlightsController@onewayrecordsu');
    }

    //Edit Roundtrip Flight
    public function editroundtripbookinga(Request $request)
    {
        if ($request->input('editroundtripbooking') != null )
        {
            if ($request->input('id') != null)
            {
                $id = $request->input('id');
                $name = $request->input('name');
                $email = $request->input('email');
                $contact = $request->input('contact');
                $triptype = $request->input('triptype');
                $leavingfrom = $request->input('leavingfrom');
                $goingto = $request->input('goingto');
                $departing = $request->input('departing');
                $returning = $request->input('returning');
                $adults = $request->input('adults');
                $children = $request->input('children');
                $flighttype = $request->input('flighttype');
                $airline = $request->input('airline');
                $travelclass = $request->input('travelclass');
                $amount = $request->input('amount');

                if ($name != '' && $email != '' && $contact != '' && $triptype != '' && $leavingfrom != '' && $goingto != '' && $departing != '' && $returning != '' && $adults != '' && $children != '' && $flighttype != '' && $airline != '' && $travelclass != '' && $amount != '')
                {
                    $data = array('name' => $name, "email" => $email, "contact" => $contact, "triptype" => $triptype, "leavingfrom" => $leavingfrom, "goingto" => $goingto, "departing" => $departing, "returning" => $returning, "adults" => $adults, "children" => $children, "flighttype" => $flighttype, "airline" => $airline, "travelclass" => $travelclass, "amount" => $amount);
                    FlightsModel::editroundtripbooking($id, $data);

                    echo "<script type='text/javascript'>alert('Changes saved');</script>";

                    Mail::send([], [], function ($message) {
                        $name = ($_POST['name']);
                        $email = ($_POST['email']);
                        $contact = ($_POST['contact']);
                        $triptype = ($_POST['triptype']);
                        $leavingfrom = ($_POST['leavingfrom']);
                        $goingto = ($_POST['goingto']);
                        $departing = ($_POST['departing']);
                        $returning = ($_POST['returning']);
                        $adults = ($_POST['adults']);
                        $children = ($_POST['children']);
                        $flighttype = ($_POST['flighttype']);
                        $airline = ($_POST['airline']);
                        $travelclass = ($_POST['travelclass']);
                        $amount = ($_POST['amount']);
                        $message->from("vonworkug@gmail.com", "VONWORK UG");
                        $message->to("$email");
                        $message->subject("Flight Booking Update");
                        $message->setBody("Hello <b>$name</b>, Your flight booking has been updated. <br> <br> <b>NEW BOOKING DETAILS</b> <br><br> Name - $name <br> Contact - $contact <br> Trip Type - $triptype <br> Leaving From - $leavingfrom <br> Going To - $goingto <br> Departing - $departing <br> Returning - $returning <br> Adults - $adults <br> Children - $children <br> Flight Type - $flighttype <br> Travel Class - $travelclass <br> Airline - $airline <br> Amount - <b>$amount</b>", "text/html");
                        echo "<script type='text/javascript'>alert('Updated flight booking details sent');</script>";
                    });
                }
            }
        }
        return redirect()->action('FlightsController@roundtriprecordsa');
    }

    public function editroundtripbookingu(Request $request)
    {
        if ($request->input('editroundtripbooking') != null )
        {
            if ($request->input('id') != null)
            {
                $id = $request->input('id');
                $name = $request->input('name');
                $email = $request->input('email');
                $contact = $request->input('contact');
                $triptype = $request->input('triptype');
                $leavingfrom = $request->input('leavingfrom');
                $goingto = $request->input('goingto');
                $departing = $request->input('departing');
                $returning = $request->input('returning');
                $adults = $request->input('adults');
                $children = $request->input('children');
                $flighttype = $request->input('flighttype');
                $airline = $request->input('airline');
                $travelclass = $request->input('travelclass');
                $amount = $request->input('amount');

                if ($name != '' && $email != '' && $contact != '' && $triptype != '' && $leavingfrom != '' && $goingto != '' && $departing != '' && $returning != '' && $adults != '' && $children != '' && $flighttype != '' && $airline != '' && $travelclass != '' && $amount != '')
                {
                    $data = array('name' => $name, "email" => $email, "contact" => $contact, "triptype" => $triptype, "leavingfrom" => $leavingfrom, "goingto" => $goingto, "departing" => $departing, "returning" => $returning, "adults" => $adults, "children" => $children, "flighttype" => $flighttype, "airline" => $airline, "travelclass" => $travelclass, "amount" => $amount);
                    FlightsModel::editroundtripbooking($id, $data);

                    echo "<script type='text/javascript'>alert('Changes saved');</script>";

                    Mail::send([], [], function ($message) {
                        $name = ($_POST['name']);
                        $email = ($_POST['email']);
                        $contact = ($_POST['contact']);
                        $triptype = ($_POST['triptype']);
                        $leavingfrom = ($_POST['leavingfrom']);
                        $goingto = ($_POST['goingto']);
                        $departing = ($_POST['departing']);
                        $returning = ($_POST['returning']);
                        $adults = ($_POST['adults']);
                        $children = ($_POST['children']);
                        $flighttype = ($_POST['flighttype']);
                        $airline = ($_POST['airline']);
                        $travelclass = ($_POST['travelclass']);
                        $amount = ($_POST['amount']);
                        $message->from("vonworkug@gmail.com", "VONWORK UG");
                        $message->to("$email");
                        $message->subject("Flight Booking Update");
                        $message->setBody("Hello <b>$name</b>, Your flight booking has been updated. <br> <br> <b>NEW BOOKING DETAILS</b> <br><br> Name - $name <br> Contact - $contact <br> Trip Type - $triptype <br> Leaving From - $leavingfrom <br> Going To - $goingto <br> Departing - $departing <br> Returning - $returning <br> Adults - $adults <br> Children - $children <br> Flight Type - $flighttype <br> Travel Class - $travelclass <br> Airline - $airline <br> Amount - <b>$amount</b>", "text/html");
                        echo "<script type='text/javascript'>alert('Updated flight booking details sent');</script>";
                    });
                }
            }
        }
        return redirect()->action('FlightsController@roundtriprecordsu');
    }

    //Edit Flight Payment
    public function editflightpaymenta(Request $request)
    {
        if ($request->input('editflightpayment') != null )
        {
            if ($request->input('email') != null)
            {
                $name = $request->input('name');
                $email = $request->input('email');
                $paymentmethod = $request->input('paymentmethod');
                $cardnumber = Hash::make($request->input('cardnumber'));
                $cvv = Hash::make($request->input('cvv'));
                $expirydate = $request->input('expirydate');
                $amount = $request->input('amount');

                if ($name != '' && $email != '' && $paymentmethod != '' && $cardnumber != '' && $cvv != '' && $expirydate != '' && $amount != '')
                {
                    $data = array('name' => $name, "email" => $email, "paymentmethod" => $paymentmethod, "cardnumber" => $cardnumber, "cvv" => $cvv, "expirydate" => $expirydate, "amount" => $amount);
                    FlightsModel::editflightpayment($email, $data);

                    echo "<script type='text/javascript'>alert('Changes saved');</script>";
                }
            }
        }
        return redirect()->action('FlightsController@flightpaymentrecordsa');
    }
    public function editflightpaymentu(Request $request)
    {
        if ($request->input('editflightpayment') != null )
        {
            if ($request->input('email') != null)
            {
                $name = $request->input('name');
                $email = $request->input('email');
                $paymentmethod = $request->input('paymentmethod');
                $cardnumber = Hash::make($request->input('cardnumber'));
                $cvv = Hash::make($request->input('cvv'));
                $expirydate = $request->input('expirydate');
                $amount = $request->input('amount');

                if ($name != '' && $email != '' && $paymentmethod != '' && $cardnumber != '' && $cvv != '' && $expirydate != '' && $amount != '')
                {
                    $data = array('name' => $name, "email" => $email, "paymentmethod" => $paymentmethod, "cardnumber" => $cardnumber, "cvv" => $cvv, "expirydate" => $expirydate, "amount" => $amount);
                    FlightsModel::editflightpayment($email, $data);

                    echo "<script type='text/javascript'>alert('Changes saved');</script>";
                }
            }
        }
        return redirect()->action('FlightsController@flightpaymentrecordsu');
    }

    //Delete Oneway Flight
    public function deleteonewaybookinga($id = 0)
    {
        if ($id != 0)
        {
            FlightsModel::deleteonewaybooking($id);
        }
        echo "<script type='text/javascript'>alert('Flight Booking Deleted');</script>";

        return redirect()->action('FlightsController@onewayrecordsa', ['Id' => 0]);
    }
    public function deleteonewaybookingu($id = 0)
    {
        if ($id != 0)
        {
            FlightsModel::deleteonewaybooking($id);
        }
        echo "<script type='text/javascript'>alert('Flight Booking Deleted');</script>";

        return redirect()->action('FlightsController@onewayrecordsu', ['Id' => 0]);
    }

    //Delete Roundtrip Flight
    public function deleteroundtripbookinga($id = 0)
    {
        if ($id != 0)
        {
            FlightsModel::deleteroundtripbooking($id);
        }
        echo "<script type='text/javascript'>alert('Flight Booking Deleted');</script>";

        return redirect()->action('FlightsController@roundtriprecordsa', ['Id' => 0]);
    }

    public function deleteroundtripbookingu($id = 0)
    {
        if ($id != 0)
        {
            FlightsModel::deleteroundtripbooking($id);
        }
        echo "<script type='text/javascript'>alert('Flight Booking Deleted');</script>";

        return redirect()->action('FlightsController@roundtriprecordsu', ['Id' => 0]);
    }

    //Delete Flight Payment
    public function deleteflightpaymenta($id = 0)
    {
        if ($id != 0)
        {
            FlightsModel::deleteflightpayment($id);
        }
        echo "<script type='text/javascript'>alert('Flight Payment Deleted');</script>";

        return redirect()->action('FlightsController@flightpaymentrecordsa', ['Id' => 0]);
    }
    public function deleteflightpaymentu($id = 0)
    {
        if ($id != 0)
        {
            FlightsModel::deleteflightpayment($id);
        }
        echo "<script type='text/javascript'>alert('Flight Payment Deleted');</script>";

        return redirect()->action('FlightsController@flightpaymentrecordsu', ['Id' => 0]);
    }
}
