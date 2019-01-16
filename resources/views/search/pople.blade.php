@extends('layout.app')
@section('title', 'Login Page Masbro')
@section('content')
<style type="text/css">
   .dropify-wrapper {
   border : 0px;
   }
   .dropify-clear{
   display: none;
   }
   .main-section{
   box-shadow: 0 0 0 1px rgba(0,0,0,.15), 0 2px 3px rgba(0,0,0,.2);
   background-color: #fff;
   }
   .profile-header{
   background-color: #17a2b8;
   height:120px;
   }
   .user-detail{
   margin:-80px 0px 30px 0px;
   }
   .user-detail img{
   height: 152px;
   width: 152px;
   }
   .user-detail h5{
   margin:15px 0px 5px 0px;
   }
   p{
   margin : 0;
   }
   .icon {
   float: right;
   color: #fff;
   }

   .t-16 {
    font-size: 1.0rem;
    line-height: 1.5;
}

.t-bold {
    font-weight: 600;
}

.t-black {
    color: rgba(0,0,0,.9);
}

.pv-entity__secondary-title {
    font-weight: 400;
    color: rgba(0,0,0,.9);
}

.svg-icon-wrap {
    display: inline-block;
}

.btn:not(:disabled):not(.disabled) {
    cursor: pointer;
    margin-top: 10px;
}

</style>
<link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css')}}">
<div class="container" style="margin-bottom: 20px;  margin-top: 10px ; min-height: 460px">
   <div class="row">
      <div class="col-sm-8 col-12 main-section">        
         <div class="clearfix visible-xs"></div><br/>

        
        <ul style="list-style: none;">
           @foreach($users as $user)
            <li>
            	<a style="text-decoration: none" href="{{ url('user/profile/'.$user->id) }}">
	            	<div class="row" style="margin: 0 20px 0 20px">
	            		<div style="width: 20%">
	            			<img src="{{ asset('images/profile-picture-user/'.$user->profile_image) }}" class="rounded-circle img-thumbnail text-centre" style="height: 75px">
	            		</div>
	            		<div style="width: 70%;margin: 10px" >
	            			<span><b>{{ $user->name }}</b></span><br/>
	            			@if(isset($user->profession))
	            				<span style="font-size: 12px;">{{ $user->profession }}</span><br/>
	            			@endIf
	            			<span style="font-size: 12px;"><i class="fa fa-map-marker" aria-hidden="true"></i>{{ isset($user->regency->name) ? " ".$user->regency->name." , " : " " }}  {{ isset($user->province->name) ? $user->province->name." , " : "" }} Indonesia.</span><br/>
	            		</div>
	            	</div>
            	</a>
            </li>
            <hr/>
           @endForeach
        </ul>

      </div>
   </div>
</div>
@endsection