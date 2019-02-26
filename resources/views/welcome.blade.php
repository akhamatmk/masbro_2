@extends('layout.app')

@section('title', 'Profile')

@section('content')

<style type="text/css">
    .job-categories-new { 
        background: #f9f8f8;
        overflow: hidden; 
        text-align: center;
        margin-bottom: 10px;
    }

    .job-categories-new span{
        width: 30%;
        margin-left: 10px;
    }
    
    .job-categories-new span .btm-link-category {
        display:table;
        font-size: 12px;
        margin:0 auto;        
        padding: 10px;
    }
</style>

<div id="loading-area"></div>
<!-- Content -->
    <div class="page-content">
        @include('form_search_job')
        <!-- About Us -->
        <div class="section-full job-categories content-inner-2 bg-white">
            <div class="container">
                <div class="section-head d-flex head-counter hidden-sm-down clearfix">
                    <div class="mr-auto">
                        <h2 class="m-b5">Popular Categories</h2>
                        <h6 class="fw3">20+ Catetories work wating for you</h6>
                    </div>
                    <div class="head-counter-bx">
                        <h2 class="m-b5 counter">1800</h2>
                        <h6 class="fw3">Jobs Posted</h6>
                    </div>
                    <div class="head-counter-bx">
                        <h2 class="m-b5 counter">4500</h2>
                        <h6 class="fw3">Tasks Posted</h6>
                    </div>
                    <div class="head-counter-bx">
                        <h2 class="m-b5 counter">1500</h2>
                        <h6 class="fw3">Freelancers</h6>
                    </div>
                </div>

                <div class="row job-categories-new hidden-md-up" style="margin-top: -30px; padding-top: 20px; padding-bottom: 20px">
                    <div class="row" style="width: 100%">
                        <h3 style="padding: 20px; margin-left: 20px">Job Category</h3>
                    </div>
                    <span>
                        <a href="{{ url('job/all')."?category=Coorperate eksekutif Chef" }}">
                            <img src="https://www.justchefs.com/wp-content/themes/just-chefs-v3/images/callout-icon-chefs.png">
                        </a>
                        <a class="btm-link-category" href="{{ url('job/all')."?category=Coorperate eksekutif Chef" }}" >Coorperate eksekutif Chef</a>                        
                    </span>

                    <span>
                        <img src="https://www.justchefs.com/wp-content/themes/just-chefs-v3/images/callout-icon-clients-2.png">
                        <a class="btm-link-category" href="{{ url('job/all')."?category=Coorperate eksekutif Chef" }}" >Regional eksekutif Chef</a>
                    </span>

                    <span>
                        <a class="btm-link-category" href="{{ url('job/all')."?category=Kepala Juru Masak" }}" >
                            <img src="https://www.justchefs.com/wp-content/themes/just-chefs-v3/images/callout-icon-register.png">
                        </a>
                        <a class="btm-link-category" href="{{ url('job/all')."?category=Kepala Juru Masak" }}" >Kepala Juru Masak</a>
                    </span>

                    <span>
                        <a class="btm-link-category" href="{{ url('job/all')."?category=Traine" }}" >
                            <img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/trainee-768616.png">
                        </a>
                        <a class="btm-link-category" href="{{ url('job/all')."?category=Traine" }}" >Traine</a>
                    </span>

                    <span>
                        <a class="btm-link-category" href="{{ url('job/all')."?category=Penulis Kuliner" }}" >
                            <img style="height: 92px" height="112px" src="https://cdn3.iconfinder.com/data/icons/content-8/112/16_-content_writer-female-african-american-512.png">
                        </a>
                        <a class="btm-link-category" href="{{ url('job/all')."?category=Penulis Kuliner" }}" >Penulis Kuliner</a>
                    </span>

                    <span>
                        <a class="btm-link-category" href="{{ url('job/all')."?category=Drafter" }}" >
                            <img src="https://icon2.kisspng.com/20181113/ssg/kisspng-logo-product-design-brand-font-5beaf3f6816d49.0785906515421245345301.jpg">
                        </a>
                        <a class="btm-link-category" href="{{ url('job/all')."?category=Drafter" }}" >Drafter</a>
                    </span>

                </div>

                <div class="row sp20 hidden-sm-down">
                    @foreach($categorys as $category)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="icon-bx-wraper">
                            <div class="icon-content">
                                <div class="icon-md text-primary m-b20"><i class="ti-cloud-up"></i></div>
                                <a href="{{ url('job/all')."?category=".$category->name }}" class="dez-tilte">{{ $category->name }}</a>
                                <div class="rotate-icon"><i class="ti-location-pin"></i></div> 
                            </div>
                        </div>              
                    </div>
                    @endForeach
                    <div class="col-lg-12 text-center m-t30">
                        <a href="{{ url('job/all') }}"><button class="site-button radius-xl">All Categories</button></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Us END -->
        <!-- Call To Action -->
        <div class="section-full content-inner bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 section-head text-center">
                        <h2 class="m-b5">Featured Cities</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($regencys as $regency)
                    <div class="col-lg-3 col-sm-6 col-md-6 m-b30">
                        <div class="city-bx align-items-end  d-flex" style="background-image:url({{ asset('images/city/pic1.jpg')}} )">
                            <div class="city-info">
                                <h5>{{ $regency->name }}</h5>
                            </div>
                        </div>
                    </div>
                    @endForeach                    
                </div>
            </div>
        </div>
        <!-- Call To Action END -->
        <!-- Our Job -->
        <div class="section-full bg-white content-inner-2">
            <div class="container">
                <div class="d-flex job-title-bx section-head">
                    <div class="mr-auto">
                        <h2 class="m-b5">Recent Jobs</h2>
                        <h6 class="fw4 m-b0">20+ Recently Added Jobs</h5>
                    </div>
                    <div class="align-self-end">
                        <a href="{{ URL('job/all') }}" class="site-button button-sm">Browse All Jobs <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <ul class="post-job-bx">
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
                        </ul>
                        <div class="m-t30">
                            <div class="d-flex">
                                <a class="site-button button-sm mr-auto" href="#"><i class="ti-arrow-left"></i> Prev</a>
                                <a class="site-button button-sm" href="#">Next <i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="sticky-top">
                            <div class="candidates-are-sys m-b30">
                                <div class="candidates-bx">
                                    <div class="testimonial-pic radius"><img src="{{ asset('images/testimonials/pic3.jpg') }}" alt="" width="100" height="100"></div>
                                    <div class="testimonial-text">
                                        <p>I just got a job that I applied for via careerfy! I used the site all the time during my job hunt.</p>
                                    </div>
                                    <div class="testimonial-detail"> <strong class="testimonial-name">Richard Anderson</strong> <span class="testimonial-position">Nevada, USA</span> </div>
                                </div>
                            </div>
                            <div class="quote-bx">
                                <div class="quote-info">
                                    <h4>Make a Difference with Your Online Resume!</h4>
                                    <p>Your resume in minutes with JobBoard resume assistant is ready!</p>
                                    <a href="#" class="site-button">Create an Account</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Job END -->    
        <!-- Call To Action -->
        <div class="section-full p-tb70 overlay-black-dark text-white text-center bg-img-fix" 
        style="background-image: url({{ asset('images/background/bg2.jpg')}});">
            <div class="container">
                <div class="section-head text-center text-white">
                    <h2 class="m-b5">Testimonials</h2>
                    <h5 class="fw4">Few words from candidates</h5>
                </div>
                <div class="blog-carousel-center owl-carousel owl-none">
                    <div class="item">
                        <div class="testimonial-5">
                            <div class="testimonial-text">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry...</p>
                            </div>
                            <div class="testimonial-detail clearfix">
                                <div class="testimonial-pic radius shadow">
                                    <img src="{{ asset('images/testimonials/pic1.jpg') }}" width="100" height="100" alt="">
                                </div>
                                <strong class="testimonial-name">David Matin</strong> 
                                <span class="testimonial-position">Student</span> 
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-5">
                            <div class="testimonial-text">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry...</p>
                            </div>
                            <div class="testimonial-detail clearfix">
                                <div class="testimonial-pic radius shadow">
                                    <img src="{{ asset('images/testimonials/pic2.jpg') }}" width="100" height="100" alt="">
                                </div>
                                <strong class="testimonial-name">David Matin</strong> 
                                <span class="testimonial-position">Student</span> 
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-5">
                            <div class="testimonial-text">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry...</p>
                            </div>
                            <div class="testimonial-detail clearfix">
                                <div class="testimonial-pic radius shadow">
                                    <img src="{{ asset('images/testimonials/pic3.jpg') }}" width="100" height="100" alt="">
                                </div>
                                <strong class="testimonial-name">David Matin</strong> 
                                <span class="testimonial-position">Student</span> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call To Action END -->       
    </div>
@endsection