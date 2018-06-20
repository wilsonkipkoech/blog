@extends('main')

@section('title','|Register')
@section('content')

   <div class="row">
   	<div class="col-md-6 col-md-offset-3">
   		{{Form::label('name',"Name:") }}
   		{{ Form::text('name',null,['class'=>'form-control']) }}

   		{{Form:label('email','Email:') }}
   		{{ Form:email('email',null,['class'=>'form-control']) }}

   		{{  }}
   	</div>
   </div>

@endsection