@extends('layout.app')
@section('title', 'Login Page Masbro')
@section('content')
<!-- contact area -->
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">

 <style type="text/css">
    #customBtn {
      display: inline-block;
      background: white;
      color: #444;
      width: 100%;
      border-radius: 5px;
      border: thin solid #888;
      box-shadow: 1px 1px 1px grey;
      white-space: nowrap;
    }
    #customBtn:hover {
      cursor: pointer;
      background: #ced1ce;
    }
    span.label {
      font-family: serif;
      font-weight: normal;
    }
    span.icon {
      background: url('/images/g-normal.png') transparent 5px 50% no-repeat;
      display: inline-block;
      vertical-align: middle;
      width: 42px;
      height: 42px;
    }
    span.buttonText {
      display: inline-block;
      vertical-align: middle;
      padding-left: 5px;
      padding-right: 15px;
      font-size: 18px;
      font-weight: bold;
      /* Use the Roboto font that is loaded in the <head> */
      font-family: 'Roboto', sans-serif;
    }
  </style>

<div class="section-full content-inner shop-account" style="padding-top: 30px">
            <!-- Product -->
            <div class="container">
                <div class="row">
					<div class="col-md-12 m-b30">
						<div class="p-a30 border-1  max-w500 m-auto" style="background: #fff; box-shadow: 0 0 10px 0 rgba(0,24,128,0.1); border: none;">
							<div class="tab-content">
								<form id="login" method="post" class="tab-pane active">
									@csrf
									<h4 class="font-weight-700">Create An Account</h4>
									<p class="font-weight-600">If you have an account with us, please log in.</p>

									@if ($errors->any())
									    <div class="alert alert-danger">
									        <ul>
									            @foreach ($errors->all() as $error)
									                <li>{{ $error }}</li>
									            @endforeach
									        </ul>
									    </div>
									@endif

									@if(Session::has('message'))
				                        <div class="alert alert-danger">
				                             <ul>                                
				                                 <li>{{ Session::get('message') }}</li>
				                             </ul>
				                         </div>
				                     @endif

									<div class="form-group">
										<label class="font-weight-700">First Name *</label>
										<input name="first_name" required="" class="form-control" placeholder="First Name" type="text">
									</div>
									<div class="form-group">
										<label class="font-weight-700">Last Name *</label>
										<input name="last_name" required="" class="form-control" placeholder="Last Name" type="text">
									</div>

									<!-- <div class="form-group">
										<label class="font-weight-700">UserId *</label>
										<input name="user_id" required="" class="form-control" placeholder="UserID" type="text">
									</div>

									<div class="form-group">
										<label class="font-weight-700">Full Name *</label>
										<input name="name" required="" class="form-control" placeholder="Full Name" type="text">
									</div> -->

									<div class="form-group">
										<label class="font-weight-700">E-MAIL *</label>
										<input name="email" required="" class="form-control" placeholder="Your Email" type="email">
									</div>

									<div class="form-group">
										<label class="font-weight-700">PASSWORD *</label>
										<input name="password" required="" class="form-control " placeholder="Type Password" type="password">
									</div>
									<div class="text-right">
										<button class="site-button button-lg outline outline-2">CREATE</button>
									</div>

									<div style="margin-top: 15px">
										<div id="gSignInWrapper">
											<div id="customBtn" class="customGPlusSignIn">
											  <span class="icon"></span>
											  <a href="{{ url('auth/google?authFor=register') }}"><span class="buttonText">Register with Google</span></a>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
            <!-- Product END -->
		</div>
<!-- contact area  END -->
</div>
@endsection