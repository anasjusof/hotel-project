@extends('layouts.master')
@section('head')

@stop
@section('title')
    Booking Information
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
    	<div class="portlet box red-flamingo">
            <div class="portlet-title">
                <div class="caption">
                    </i>Booking Info</div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-group has-success">
                            <label class="col-md-4 control-label">Name</label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    <input disabled type="text" class="form-control" value="{{ $booking->contact_name }}"> </div>
                            </div>
                        </div>
                        <div class="form-group has-success">
                            <label class="col-md-4 control-label">Book From</label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    
                                    <input disabled type="text" class="form-control" value="{{ date('d-m-Y', strtotime($booking->from)) }}"> </div>
                            </div>
                        </div>
                        <div class="form-group has-success">
                            <label class="col-md-4 control-label">Book To</label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    
                                    <input disabled type="text" class="form-control" value="{{ date('d-m-Y', strtotime($booking->to)) }}"> </div>
                            </div>
                        </div>
                        <div class="form-group has-success">
                            <label class="col-md-4 control-label">Room Type</label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    
                                    <input disabled type="text" class="form-control" value="{{ $booking->type }}"> </div>
                            </div>
                        </div>
                        <div class="form-group has-success">
                            <label class="col-md-4 control-label">Booking Status</label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    
                                    <input disabled type="text" class="form-control" value="{{ $booking->status }}"> </div>
                            </div>
                        </div>
                        <div class="form-group has-success">
                            <label class="col-md-4 control-label">Contact Number</label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    
                                    <input disabled type="text" class="form-control" value="{{ $booking->contact_number }}"> </div>
                            </div>
                        </div>
                        <div class="form-group has-success">
                            <label class="col-md-4 control-label">Contact Email</label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    
                                    <input disabled type="text" class="form-control" value="{{ $booking->contact_email }}"> </div>
                            </div>
                        </div>
                        <div class="form-group has-success">
                            <label class="col-md-4 control-label">Remarks</label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    
                                    <input disabled type="text" class="form-control" value="{{ $booking->remarks }}"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-4 col-md-8">
                                <button type="submit" class="btn blue" {{ (count($booked_rooms) > 0) ? 'disabled' : '' }}  >Approve Booking</button>
                                <button type="button" class="btn btn-danger">Reject Booking</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="portlet box red-flamingo">
            <div class="portlet-title">
                <div class="caption">
                    </i>Clash Date with Booking</div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="">
                            <tr>
                                <th scope="col">  </th>
                                <th scope="col"> Room Type </th>
                                <th scope="col"> Status </th>
                                <th scope="col"> From </th>
                                <th scope="col"> To </th>
                                <th scope="col"> Book By </th>
                                <th scope="col"> Phone No. </th>
                                <th scope="col"> Email </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($booked_rooms as $booked_room)
                            <tr>
                                <td> <i style="color:red;" class="fa fa-exclamation tooltips" data-original-title="Check From and To date" data-container="body"> </td>
                                <td> {{ $booked_room->type }} </td>
                                <td> {{ $booked_room->status }} </td>
                                <td> {{ date('d-m-Y', strtotime($booked_room->from)) }} </td>
                                <td> {{ date('d-m-Y', strtotime($booked_room->to)) }} </td>
                                <td> {{ $booked_room->contact_name }} </td>
                                <td> {{ $booked_room->contact_number }} </td>
                                <td> {{ $booked_room->contact_email }} </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



@stop

@section('script')

@stop