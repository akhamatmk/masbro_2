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
   <div class="container" style="min-height: 422px">
      <div>
         <div class="max-w500 m-auto m-b30" style="background: #fff; box-shadow: 0 0 10px 0 rgba(0,24,128,0.1); border: none;">
            <div class="p-a30 seth">
               <div class="tab-content nav">                  
                  <form method="post" action="{{ url('reset/password') }}" id="forgot-password">
                     @csrf
                     <h4 class="font-weight-700">FORGET PASSWORD ?</h4>
                     <div class="form-group">
                        <label class="font-weight-700">Set Your New Password *</label>
                        <input name="password" type="password" required="" class="form-control" placeholder="password" >
                        <input name="token" type="hidden" value="{{ $user->remember_token }}">
                        <input name="email" type="hidden" value="{{ $user->email }}">
                     </div>
                     <div class="text-left"> 
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