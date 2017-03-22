<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\BookingRequest;

use App\RoomType;
use App\BookingHistory;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms_type = RoomType::all();

        return view('rooms.index', compact('rooms_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {
        
        foreach($request->room_type as $room_type){

            $time_from = strtotime($request->from);
            $from = date('Y-m-d',$time_from);

            $time_to = strtotime($request->to);
            $to = date('Y-m-d',$time_to);



            $input['from'] = $from;
            $input['to'] = $to;
            $input['room_id'] = $room_type;
            $input['contact_name'] = $request->contact_name;
            $input['contact_number'] = $request->contact_number;
            $input['status_id'] = 2;
            $input['contact_email'] = $request->contact_email;
            $input['remarks'] = $request->remarks;

            BookingHistory::create($input);

        }

        return redirect('/showBookingList');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showBookingList(){

        $bookings = BookingHistory::select('booking_histories.*', 'room_types.type', 'statuses.status')
                                    ->join('room_types', 'room_id', '=', 'room_types.id')
                                    ->join('statuses', 'status_id', '=', 'statuses.id')
                                    ->orderBy('booking_histories.id', 'DESC')
                                    ->paginate(5);

        return view('rooms.showBookingList', compact('bookings'));
    }

    public function viewBookBeforeProcess($booking_id){

        /*Return as SQL*/ 
        // $booked_rooms = BookingHistory::select('*')
        //                                 ->where(function ($query){
        //                                     $query ->where('id', '!=', 19);
        //                                 })
        //                                 ->where(function ($query){
        //                                     $query->where(function($subquery){
        //                                         $subquery ->whereBetween('from', ['2017-03-21', '2017-03-23']);
        //                                     })
        //                                     ->orWhere(function($subquery){
        //                                         $subquery ->whereBetween('to', ['2017-03-21', '2017-03-23']);
        //                                     });                                                                    
        //                                 })
        //                                 ->toSql();

        // dd($booked_rooms);
        $booking = BookingHistory::select('booking_histories.*', 'room_types.type', 'statuses.status')
                                    ->join('room_types', 'room_id', '=', 'room_types.id')
                                    ->join('statuses', 'status_id', '=', 'statuses.id')
                                    ->where('booking_histories.id', '=', $booking_id)
                                    ->orderBy('booking_histories.id', 'DESC')
                                    ->first();

        $booked_rooms = BookingHistory::select('booking_histories.*', 'room_types.type', 'statuses.status')
                                        ->where(function ($query) use($booking_id){
                                            $query ->where('booking_histories.id', '!=', $booking_id);
                                        })
                                        ->where(function ($query) use($booking){
                                            $query->where(function($subquery) use($booking){
                                                $subquery ->whereBetween('booking_histories.from', [$booking->from, $booking->to]);
                                            })
                                            ->orWhere(function($subquery) use($booking){
                                                $subquery ->whereBetween('booking_histories.to', [$booking->from, $booking->to]);
                                            });                                                                    
                                        })
                                        ->join('room_types', 'room_id', '=', 'room_types.id')
                                        ->join('statuses', 'status_id', '=', 'statuses.id')
                                        ->orderBy('booking_histories.id', 'ASC')
                                        ->get();


        

        return view('rooms.viewBookBeforeProcess', compact('booked_rooms', 'booking'));
    }
}
