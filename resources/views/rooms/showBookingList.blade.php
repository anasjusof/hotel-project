@extends('layouts.master')
@section('head')

@stop
@section('title')
    Book Room
@stop

@section('content')
<div class="row">
	<div class="portlet box purple">
        <div class="portlet-title">
            <div class="caption">
                </i>Booking List</div>
        </div>
        <div class="portlet-body">
            <div class="table-scrollable">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="cream-purple">
                        <tr>
                            <th scope="col"> No. </th>
                            <th scope="col"> Room Type </th>
                            <th scope="col"> Booking Status </th>
                            <th scope="col"> From </th>
                            <th scope="col"> To </th>
                            <th scope="col"> Book By </th>
                            <th scope="col"> Phone No. </th>
                            <th scope="col"> Email </th>
                            <th scope="col"> Remarks </th>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php $count = 1 ?>
                    	<?php $currentPageTotalNumber = ($bookings->currentPage() - 1) * $bookings->perPage(); ?>
                    	@foreach($bookings as $booking)
                        <tr>
                        	<td> {{ $count + $currentPageTotalNumber}} </td>
                            <td> {{ $booking->type }} </td>
                            <td> {{ $booking->status }} </td>
                            <td> {{ $booking->from }} </td>
                            <td> {{ $booking->to }} </td>
                            <td> {{ $booking->contact_name }} </td>
                            <td> {{ $booking->contact_number }} </td>
                            <td> {{ $booking->contact_email }} </td>
                            <td> {{ $booking->remarks }} </td>
                            <td> <a href="{{route('room.viewBookBeforeProcess', $booking->id)}}" class="btn yellow-gold"><i class="fa fa-search"></i></a></td>

                        </tr>
                        <?php $count++ ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-sm-12 pull-right">
        <div class="pull-right"> 
            {{$bookings->render()}}
        </div>
    </div>
</div>



@stop

@section('script')

@stop