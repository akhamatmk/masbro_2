@extends('layout.app')
@section('title', 'Login Page Masbro')
@section('content')

<!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle" style=");">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Browse Jobs</h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="#">Home</a></li>
							<li>Browse Jobs</li>
						</ul>
					</div>
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->
        <div class="content-block">
			<!-- Browse Jobs -->
			<div class="section-full bg-white browse-job content-inner-2">
				<div class="container">
					<div class="row">
						<div class="col-xl-9 col-lg-8">
							<h5 class="widget-title font-weight-700 text-uppercase">Recent Jobs</h5>
							
							<div class="row" style="margin-bottom: 10px">
								<div class="col-md-12">
									Cari berdasarkan Tempat
								</div>

								<div class="col-md-5" style="margin-top: 10px">
									<select name="province" id="province">
										<option value="all">-All-</option>
										@foreach($provinces as $province)
										<option data-id="{{ $province->id }}" value="{{ $province->name }}">{{ $province->name }}</option>
										@endForeach
									</select>
								</div>

								<div class="col-md-5" style="margin-top: 10px">
									<select name="regency" id="regency">
										<option value="all">-All-</option>
									</select>
								</div>

								<div class="col-md-2" style="margin-top: 10px">
									<button class="btn btn-primary" id="search">Search</button>
								</div>

							</div>

							<div class="row" id="loading" style="justify-content: center; display: none !important; height: 200px">
								<img src="https://s3.ap-south-1.amazonaws.com/dzon-html/job-board/xhtml/images/loading.svg">
							</div>

							<ul class="post-job-bx">

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
									
								<!-- <div class="pagination-bx m-t30">
									<ul class="pagination">
										<li class="previous"><a href="#"><i class="ti-arrow-left"></i> Prev</a></li>
										<li class="active"><a href="#">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li class="next"><a href="#">Next <i class="ti-arrow-right"></i></a></li>
									</ul>
								</div> -->
							@else
							<li>
								<div class="d-flex m-b30" style="justify-content: center; height: 200px">
									<h2>Data tidak ada</h2>
								</div>
							</li>
							@endIf
						</div>
					</div>
				</div>
			</div>
            <!-- Browse Jobs END -->
		</div>
    </div>
    <!-- Content END-->

@endsection

@section('js')
<script type="text/javascript">
	$(function() {
		$("#province").change(function(){
			$.ajax({
				type: "GET",
				url: '{{ URL::to("place/regencyAjax") }}/'+$(this).find(':selected').data('id'),
				dataType: 'json',
				success: function(data){
					$("#regency").html("<option value='all'> ALL </option>");
					$.each( data.data, function( key, value ) {
						var type = "Kota";
						if(value.type == 1)
							var type = "Kabupaten";

						$("#regency").append("<option value='"+value.name+"'>"+type+" "+value.name+"</option>");
					});
					$('#regency').selectpicker('refresh');
				}
			});
		});

		$("#search").click(function(){
			$(".post-job-bx").html("");
			$("#loading").show();
			$.ajax({
				type: "GET",
				url: '{{ URL::to("job/list/ajax") }}',
				data :{
					province : $("#province").find(':selected').val(),
					regency : $("#regency").find(':selected').val()
				},
				dataType: 'json',
				success: function(data){
					$("#loading").hide();
					$(".post-job-bx").html(data.job_content);
				}
			});
		});
	});
    	
</script>

@endsection