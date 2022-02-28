<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HotelsModel extends Model
{
    //View Hotel Bookings
    public static function hotelrecords($id=0)
    {
        if($id==0)
        {
            $value=DB::table('hotelbooking')->orderBy('Id', 'asc')->get();
        }
        else
        {
            $value=DB::table('hotelbooking')->where('Id', $id)->first();
        }
        return $value;
    }

    //Book a Hotel
    public static function hotelbooking($data)
    {
        $value=DB::table('hotelbooking')->where('HotelName', $data['hotelname'])->get();
        if($value->count() == 0)
        {
            DB::table('hotelbooking')->insert($data);
            return 1;
        }
        else
        {
            return 0;
        }
    }

    //Edit HotelBooking
    public static function edithotelbooking($id, $data)
    {
        DB::table('onewayflights')->where('Id', $id)->update($data);
    }

    //Delete Hotel Booking
    public static function deletehotelbooking($id)
    {
        DB::table('hotelbooking')->where('Id', '=', $id)->delete();
    }
}
