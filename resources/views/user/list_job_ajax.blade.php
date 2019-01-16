@if(count($jobs) > 0)	
	@foreach($jobs as $job)
	<li>
		<a href="{{ url('job/detail/'.$job->id) }}">
			<div class="d-flex m-b30">
				<div class="job-post-company">
					<span><img src="{{ asset('images/profile-picture-user/'.$job->user->profile_image) }}"></span>
				</div>
				<div class="job-post-info">
					<h4>{{ $job->title }}</h4>
					<ul>
						<li><i class="fa fa-map-marker"></i> {{ $job->regency->name ? $job->regency->name : "" }}, {{ $job->provincy->name ? $job->provincy->name : "" }}</li>
						<li><i class="fa fa-bookmark-o"></i> 
							{{ $type[$job->type_jobs] ? $type[$job->type_jobs] : "" }}
						</li>
						<li><i class="fa fa-clock-o"></i> Published {{ k99_relative_time($job->created_at) }}</li>
					</ul>
				</div>
			</div>
			<div class="d-flex">
				<div class="job-time mr-auto">
					<span>Full Time</span>
				</div>
				<div class="salary-bx">
					<span>{{ $job->sallary }}</span>
				</div>
			</div>
			<span class="post-like fa fa-heart-o"></span>
		</a>
	</li>
	@endForeach
@else
<li>
	<div class="d-flex m-b30" style="justify-content: center; height: 200px">
		<h2>Data tidak ada</h2>
	</div>
</li>
@endIf