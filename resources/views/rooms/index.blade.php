@extends('layouts.master')
@section('head')

@stop
@section('title')
    Book Room
@stop

@section('content')
<div class="row">
	{!! Form::open(['method'=>'POST', 'action' => 'RoomController@store']) !!}
		<div class="portlet box blue col-md-4 col-md-offset-4">
			<div class="portlet-title"><div class="caption">Choose your date</div></div>
			<div class="portlet-body form">
				<div class="row">
					<div class="col-md-12 padding-top-bottom-20px">
						<div class="form-group">
							<div class="col-md-12 ">
								<div class="input-group input-large date-picker input-daterange margin-0-auto" data-date="10/11/2012" data-date-format="dd-mm-yyyy">
									<input type="text" class="form-control" name="from" value="{{ old('from') }}">
									<span class="input-group-addon">
									to </span>
									<input type="text" class="form-control" name="to" value="{{ old('to') }}">
								</div>
							</div>
							<div class="col-md-12 text-center">
								Select date range
							</div>
						</div>
			        </div>
			    </div>
			</div>
		</div>

		<div class="portlet box red col-md-4 col-md-offset-4">
			<div class="portlet-title text-center"><div class="caption">Choose your room</div></div>
			<div class="portlet-body form">
				<div class="row text-center">
					@foreach($rooms_type as $room_type)
					<div class="col-md-6 padding-top-bottom-20px">
						<p><b>{{ $room_type->type }}</b></p>
						<p>{{ $room_type->description }}</p>
						<p>MYR {{ $room_type->price }} / Day</p>
						<div id="uniform-inlineCheckbox21"><span class=""><input type="checkbox" name="room_type[]" value="{{ $room_type->id }}"></span></div>
			        </div>
			        @endforeach

			    </div>
			</div>
		</div>

		<div class="portlet box purple col-md-4 col-md-offset-4">
			<div class="portlet-title text-center"><div class="caption">Contact Details</div></div>
			<div class="portlet-body form">
				<div class="">
					<div class="input-group col-md-12 padding-top-20px">
						<input type="text" class="form-control" placeholder="Name" name="contact_name" value="{{ old('contact_name') }}">
					</div>

					<div class="input-group col-md-12 padding-top-20px">
						<input type="text" class="form-control" placeholder="Contact Number" name="contact_number" value="{{ old('contact_number') }}">
					</div>

					<div class="input-group col-md-12 padding-top-20px">
						<input type="text" class="form-control" placeholder="Contact Email" name="contact_email" value="{{ old('contact_email') }}">
					</div>

					<div class="input-group col-md-12 padding-top-20px padding-bottom-20px" name="remarks">
						<textarea name="remarks" rows="4" class="form-control" placeholder="Message / Remark" value="{{ old('remarks') }}"></textarea>
					</div>
			    </div>
			</div>
		</div>

		<div class="col-md-4 col-md-offset-4 text-center">
			<input type="submit" value="Book Now!" class="btn green">
		</div>
	{!! Form::close() !!}
</div>



@stop

@section('script')

@include('errors.validation-error')

@stop