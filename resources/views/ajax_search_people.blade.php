@foreach($users as $key => $user)
	<div class="column" >
		<div class="container-user">
			<p><strong>{{ $user->first_name }} {{ $user->last_name }}</strong></p>
			<p><img style="height: 100px; width: -webkit-fill-available;"  src="{{ asset('images/profile-picture-user/'.$user->profile_image) }}"></p>	
			<span class="fa fa-star"></span>
			<span class="fa fa-star"></span>
			<span class="fa fa-star"></span>
			<span class="fa fa-star"></span>
			<span class="fa fa-star"></span>
		</div>		
	</div>
@endForeach