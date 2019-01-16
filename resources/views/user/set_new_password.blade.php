@extends('layout.app')
@section('title', 'Login Page Masbro')
@section('content')
<!-- contact area -->
<style type="text/css">
	.footer-bottom {
		margin-top: 100px;
	}
</style>
<div class="section-full content-inner-2 shop-account"  style="padding-top: 50px">
   <!-- Product -->
   <div class="container">
      <div>
         <div class="max-w500 m-auto m-b30" style="background: #fff; box-shadow: 0 0 10px 0 rgba(0,24,128,0.1); border: none;">
            <div class="p-a30 seth">
               <div class="tab-content nav">
                  <form  method="post" class="tab-pane active col-12 p-a0 ">
                     @csrf
                     <h4 class="font-weight-700">Set New Password </h4>
                     <p>Untuk Default Password anda adalah <b>admin123</b></p>
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
                        <label class="font-weight-700">PASSWORD *</label>
                        <input name="password" required="" class="form-control " placeholder="Type Password" type="password">
                     </div>
                     <div class="text-left">
                        <button class="site-button m-r5 button-lg">Simpan</button>
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