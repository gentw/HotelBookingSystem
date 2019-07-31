<?php

namespace App\Http\Controllers\Admin;

use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use DB;

class FindRoomsController extends Controller
{
    public function index(Request $request)
    {
        if (!Gate::allows('find_room_access')) {
            return abort(401);
        }
        $time_from = $request->input('time_from');
        $time_to = $request->input('time_to');

        if ($request->isMethod('POST')) {
            /*$rooms = Room::with('booking')->whereHas('booking', function ($q) use ($time_from, $time_to) {
                $q->where(function ($q2) use ($time_from, $time_to) {
                    $q2->whereDate('time_from', '<', $time_to)
                       ->whereDate('time_to', '>', $time_from);
                });
            })->orWhereDoesntHave('booking')->get();*/

            $rooms = DB::table('rooms as r')
                            ->select('*') 
                            ->whereRaw("
                                    id 
                                    NOT IN (
                                         select room_id from bookings where (time_from <= '{$time_to}' and time_to >= '{$time_from}') 
                                    ) 

                            ")->get();


           

            /*
                select * from `rooms` where (exists (select * from `bookings` where `rooms`.`id` = `bookings`.`room_id` and (`time_from` >= ? or `time_to` <= ?)) or not exists (select * from `bookings` where `rooms`.`id` = `bookings`.`room_id`))
            */

             
        } else {
            $rooms = null;
        }
        return view('admin.find_rooms.index', compact('rooms', 'time_from', 'time_to'));
    }
}
