@extends('layout.app')
@section('title', 'Login Page Masbro')
@section('content')
<!-- contact area -->

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

<div class="section-full content-inner-2 shop-account"  style="padding-top: 30px">
   <!-- Product -->
   <div class="container">
      <div>
         <div class="max-w500 m-auto m-b30" style="background: #fff; box-shadow: 0 0 10px 0 rgba(0,24,128,0.1); border: none;">
            <div class="p-a30 seth">
               <div class="tab-content nav">
                  <form id="login" method="post" class="tab-pane active col-12 p-a0 ">
                     @csrf
                     <h4 class="font-weight-700">LOGIN</h4>
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
                        <label class="font-weight-700">E-MAIL Atau No telepon</label>
                        <input name="email" required="" class="form-control" >
                     </div>
                     <div class="form-group">
                        <label class="font-weight-700">PASSWORD *</label>
                        <input name="password" required="" class="form-control " placeholder="Type Password" type="password">
                     </div>
                     <div class="text-left">
                        <button class="site-button m-r5 button-lg">login</button>
                        <a data-toggle="tab" href="#forgot-password" class="m-l5"><i class="fa fa-unlock-alt"></i> Forgot Password</a> 
                     </div>

                      <div style="margin-top: 35px">
                        <div id="gSignInWrapper">
                          <div id="customBtn" class="customGPlusSignIn">
                            <span class="icon"></span>
                            <a href="{{ url('auth/google') }}"><span class="buttonText">Login with Google</span></a>
                          </div>
                        </div>
                      </div>

                  </form>
                  <form method="post" action="{{ url('forgot-password') }}" id="forgot-password" class="tab-pane fade  col-12 p-a0">
                     @csrf
                     <h4 class="font-weight-700">FORGET PASSWORD ?</h4>
                     <p class="font-weight-600">We will send you an email to reset your password. </p>
                     <div class="form-group">
                        <label class="font-weight-700">E-MAIL *</label>
                        <input name="email" type="email" required="" class="form-control" placeholder="Your Email Id" >
                     </div>
                     <div class="text-left"> 
                        <a class="site-button outline gray button-lg" data-toggle="tab" href="#login">Back</a>
                        <button class="site-button pull-right button-lg">Submit</button>
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