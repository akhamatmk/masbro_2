@extends('layout.app')
@section('title', 'Login Page Masbro')
@section('content')

<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
}

.container-user{
	box-shadow: 0 0 10px 0 rgba(0,24,128,0.1);
	margin: 5px;
    padding: 10px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<!-- contact area -->
<div class="content-block">
    <!-- Submit Resume -->
    <div class="section-full bg-white submit-resume content-inner-2" style="padding-top: 35px; padding-bottom: 20px;">
        <div class="container" style="min-height: 600px">
            <div class="row">
            	@foreach($users as $key => $user)
	            	<div class="column" >
	            		<div class="container-user">
	            			<p><strong>{{ $user->name }}</strong></p>
							<p><img style="height: 100px; width: -webkit-fill-available;"  src="{{ asset('images/profile-picture-user/'.$user->profile_image) }}"></p>	
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
	            		</div>		
					</div>
				@endForeach
            </div>
        </div>
    </div>
    <!-- Submit Resume END -->
</div>
<!-- Content END-->
@endsection