@extends('layout.app')
@section('title', 'Login Page Masbro')
@section('content')

<!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Job Detail</h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="{{ url('home') }}">Home</a></li>
							<li>Job Detail</li>
						</ul>
					</div>
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->
        <div class="content-block">
            <!-- Job Detail -->
			<div class="section-full content-inner-1">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="sticky-top">
								<div class="row">
									<div class="col-lg-12 col-md-6">
										<div class="m-b30">
											<img src="{{ asset('images/profile-picture-user/'.$job->user->profile_image) }}" style="height: 170px;">
										</div>
									</div>
									<div class="col-lg-12 col-md-6">
										<div class="widget bg-white p-lr20 p-t20  widget_getintuch radius-sm">
											<h4 class="text-black font-weight-700 p-t10 m-b15">Job Details</h4>
											<ul>
												<li><i class="ti-location-pin"></i><strong class="font-weight-700 text-black">Address</strong><span class="text-black-light"> {{ $job->detail_address }} </span></li>
												<li><i class="ti-money"></i><strong class="font-weight-700 text-black">Salary</strong> {{ $job->sallary }}</li>
												<li><i class="ti-shield"></i><strong class="font-weight-700 text-black">Experience</strong>{{ $job->experience }}</li>
											</ul>
										</div>
									</div>
								</div>
                            </div>
						</div>
						<div class="col-lg-8">
							<div class="job-info-box">
								<h3 class="m-t0 m-b10 font-weight-700 title-head">
									<a href="#" class="text-secondry m-r30">{{ $job->title }}</a>
								</h3>
								<ul class="job-info">
									<li><strong>Deadline:</strong> {{ date('d M Y', strtotime($job->deadline_jobs)) }}</li>
									<li><i class="ti-location-pin text-black m-r5"></i> {{ $job->regency->name ? $job->regency->name : "" }}, {{ $job->provincy->name ? $job->provincy->name : "" }} </li>
								</ul>								
								<h5 class="font-weight-600">Job Description</h5>
								<div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
								<p>{{ $job->job_description }} </p>
								<h5 class="font-weight-600">How to Apply</h5>
								<div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
								<p>{{ $job->how_to_apply }}</p>
								<h5 class="font-weight-600">Job Requirements</h5>
								<div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
								<p>{{ $job->job_requirements }}</p>
								<a href="#" class="site-button">Apply This Job</a>
							</div>
						</div>
					</div>
				</div>
			</div>
            <!-- Job Detail -->
			<!-- Our Jobs -->
			<div class="section-full content-inner">
				<div class="container">
					<div class="row">
						
					</div>
				</div>
			</div>
			<!-- Our Jobs END -->
		</div>
    </div>
    <!-- Content END-->

@endsection

@section('js')
<script type="text/javascript">
	$(function() {

	});    	
</script>

@endsection