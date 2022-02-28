<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FlightsModel extends Model
{
    //View Oneway Flights
    public static function onewayrecords($id=0)
    {
        if($id==0)
        {
            $value=DB::table('onewayflights')->orderBy('Id', 'asc')->get();
        }
        else
        {
            $value=DB::table('onewayflights')->where('Id', $id)->first();
        }
        return $value;
    }

    //View Roundtrip Flights
    public static function roundtriprecords($id=0)
    {
        if($id==0)
        {
            $value=DB::table('roundtripflights')->orderBy('Id', 'asc')->get();
        }
        else
        {
            $value=DB::table('roundtripflights')->where('Id', $id)->first();
        }
        return $value;
    }

    //View Flight Payments
    public static function flightpaymentrecords($id=0)
    {
        if($id==0)
        {
            $value=DB::table('flightpayments')->orderBy('Id', 'asc')->get();
        }
        else
        {
            $value=DB::table('flightpayments')->where('Id', $id)->first();
        }
        return $value;
    }

    //Book Oneway Flight
    public static function onewaybooking($data)
    {
        $value=DB::table('onewayflights')->where('Name', $data['name'])->get();
        if($value->count() == 0)
        {
            DB::table('onewayflights')->insert($data);
            return 1;
        }
        else
        {
            return 0;
        }
    }

    //Book Roundtrip Flight
    public static function roundtripbooking($data)
    {
        $value=DB::table('roundtripflights')->where('Name', $data['name'])->get();
        if($value->count() == 0)
        {
            DB::table('roundtripflights')->insert($data);
            return 1;
        }
        else
        {
            return 0;
        }
    }

    //Flight Payments
    public static function flightpayment($data)
    {
        $value=DB::table('flightpayments')->where('Name', $data['name'])->get();
        if($value->count() == 0)
        {
            DB::table('flightpayments')->insert($data);
            return 1;
        }
        else
        {
            return 0;
        }
    }

    //Edit Oneway Flight
    public static function editonewaybooking($id, $data)
    {
        DB::table('onewayflights')->where('Id', $id)->update($data);
    }

    //Edit Roundtrip Flight
    public static function editroundtripbooking($id, $data)
    {
        DB::table('roundtripflights')->where('Id', $id)->update($data);
    }

    //Edit Flight Payments
    public static function editflightpayment($id, $data)
    {
        DB::table('flightpayments')->where('Id', $id)->update($data);
    }

    //Delete Oneway Flight
    public static function deleteonewaybooking($id)
    {
        DB::table('onewayflights')->where('Id', '=', $id)->delete();
    }

    //Delete Roundtrip Flight
    public static function deleteroundtripbooking($id)
    {
        DB::table('roundtripflights')->where('Id', '=', $id)->delete();
    }

    //Delete Flight Payment
    public static function deleteflightpayment($id)
    {
        DB::table('flightpayments')->where('Id', '=', $id)->delete();
    }
}
