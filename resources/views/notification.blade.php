@extends('layout.app')
@section('title', 'Login Page Masbro')
@section('content')
<style type="text/css">
	a{
		text-decoration: none
	}
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css')}}">
<div class="container" style="margin-bottom: 20px;  margin-top: 10px ; min-height: 460px; background: #fff">
   <div class="row">
      <div class="col-sm-8 col-12 main-section">        
         <div class="clearfix visible-xs"></div><br/>

        
        <ul style="list-style: none;">
           @foreach($notifications as $notification)
            <li>
            	<div class="row" style="margin: 0 10px 0 20px">        		
	        		<div style="width: 20%">
	        			<img src="{{ asset('images/profile-picture-user/'.$notification->userT->profile_image) }}" class="rounded-circle img-thumbnail text-centre" style="height: 75px">
	        		</div>
	            	@if($notification->type == 1)	            		
		        		<div style="width: 70%;margin: 10px" >
		        			<a href="confirm/connect/{{ $notification->id }}">
		        				<b>{{ isset($notification->userF) ? $notification->userT->name : "" }}</b> Ingin Menambahkan anda ke jaringanya	
		        			</a>
		        		</div>		        		
		        	@elseif($notification->type == 2)
		        		<div style="width: 70%;margin: 10px" >
		        			<b>{{ isset($notification->userF) ? $notification->userT->name : "" }}</b> Memulai mengikuti anda	
		        		</div>
		        	@elseif($notification->type == 3)
		        		<div style="width: 70%;margin: 10px" >
		        			<b>{{ isset($notification->userF) ? $notification->userT->name : "" }}</b> Menerima permintaan anda untuk menambah ke jaringannya	
		        		</div>
	            	@endIf
            	</div>
            </li>
            <hr/>
           @endForeach
        </ul>

      </div>
   </div>
</div>
@endsection