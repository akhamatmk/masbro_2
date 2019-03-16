@foreach($users as $key => $user)
	<div class="column" >
		<div class="container-user">
			<a style="cursor: pointer;" class="click" data-id="{{ $user->id }}">
                <p><strong>{{ $user->first_name }} {{ $user->last_name }}</strong></p>
                <p style="text-align: center;"><img style="height: 150px;"  src="{{ asset('images/profile-picture-user/'.$user->profile_image) }}"></p>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </a>
		</div>		
	</div>
@endForeach