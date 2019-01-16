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
            <li>
            	<div class="row" style="margin: 0 10px 0 20px">        		
	        		<div style="width: 20%">
	        			<img src="{{ asset('images/profile-picture-user/'.$notification->userT->profile_image) }}" class="rounded-circle img-thumbnail text-centre" style="height: 75px">
	        		</div>           		
	        		<div style="width: 70%;margin: 10px" >
	        			<b>{{ isset($notification->userF) ? $notification->userT->name : "" }}</b> Ingin Menambahkan anda ke jaringanya
	        			<br/>
	        			<form method="POST" id="form">
	        				@csrf
	        				<input type="hidden" id="type" name="type">
	        				<button type="button" style="cursor: pointer;" data-id="1" class="btn btn-info btnSubmit">accept</button>
	        				<button type="button" style="cursor: pointer;" data-id="0" class="btn btn-danger btnSubmit">decline</button>
	        			</form>
	        		</div>
            	</div>
            </li>
            <hr/>
        </ul>

      </div>
   </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
	$(function() {
		$(".btnSubmit").click(function(){
			let type = $(this).data('id');
			$("#type").val(type);
			$("#form").submit();
		});
	});
</script>
@endsection