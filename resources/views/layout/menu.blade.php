<link rel="stylesheet" type="text/css" href="{{ asset('css/menu_2.css')}}">
<!-- header -->
<header class="site-header mo-left header fullwidth">
   <!-- main header -->
   <div class="sticky-header main-bar-wraper navbar-expand-lg">
      <div class="main-bar clearfix">
         <div class="container clearfix">
            <!-- website logo -->
            <div class="logo-header mostion hidden-sm-down">
               <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" class="logo" alt=""></a>
            </div>

            <div class="wrap hidden-md-up">

               <form class="search-form" action="{{ url('search/people') }}" method="GET" style="margin: 10px">
                  <input type="text" placeholder="Search People" name="keyword">
                  <button>Search</button>
               </form>
             </div>

            <!-- nav toggle button -->
            <!-- nav toggle button -->
            <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
            </button>
            <!-- extra nav -->
            <div class="extra-nav">
               <div class="extra-cell">
                  @if (Auth::check())
                  <a href="{{ route('logout') }}" class="site-button"><i class="fa fa-user"></i> Logout</a>
                  @else
                  <a href="{{ route('register') }}" class="site-button"><i class="fa fa-user"></i> Sign Up</a>
                  <a href="{{ route('login') }}" class="site-button"><i class="fa fa-lock"></i> login</a>
                  @endIf
               </div>
            </div>
            <!-- Quik search -->
            <div class="dez-quik-search bg-primary">
               <form action="#">
                  <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                  <span id="quik-search-remove"><i class="flaticon-close"></i></span>
               </form>
            </div>
            <div class="header-nav navbar-collapse collapse justify-content-start" id="navbarNavDropdown">
               <!-- main nav -->                    
               <ul class="nav navbar-nav">
                  <li>
                     <a href="#">For Candidates <i class="fa fa-chevron-down"></i></a>
                     <ul class="sub-menu">
                        <li><a href="{{ url('job/all') }}" class="dez-page">Lihat Lowongan</a></li>
                        <!-- <li><a href="companies.html" class="dez-page">companies</a></li> -->
                        <!-- <li><a href="job-detail.html" class="dez-page">Job Detail</a></li> -->
                     </ul>
                  </li>
                  @if (Auth::check())
                  <li>
                     <a href="#">For Employers <i class="fa fa-chevron-down"></i></a>
                     <ul class="sub-menu">
                        <li><a href="{{ url('job/create') }}" class="dez-page">Posting Lowongan</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="{{ url('profile/user') }}">Profile <i class="fa"></i></a>
                  </li>
                  @else
                  <li><a href="{{ route('register') }}">Sign Up <i class="fa"></i></a></li>
                  <li><a href="{{ route('login') }}">Login <i class="fa"></i></a></li>
                  @endIf
               </ul>
            </div>
         </div>         
      </div>
   </div>
   <!-- main header END -->
</header>
<!-- header END -->
@section('js')
<script type="text/javascript">
   jQuery(document).ready(function() {
       jQuery('.toggle-nav').click(function(e) {
           jQuery(this).toggleClass('active');
           jQuery('.menu ul').toggleClass('active');
   
           e.preventDefault();
       });
   });
</script>
@endsection