@extends('layout.app')
@section('title', 'Login Page Masbro')
@section('content')
<style type="text/css">
   .dropify-wrapper {
   border : 0px;
   }
   .dropify-clear{
   display: none;
   }
   .main-section{
   box-shadow: 0 0 0 1px rgba(0,0,0,.15), 0 2px 3px rgba(0,0,0,.2);
   background-color: #fff;
   }
   .profile-header{
   background-color: #17a2b8;
   height:120px;
   }
   .user-detail{
   margin:-80px 0px 30px 0px;
   }
   .user-detail img{
   height: 152px;
   width: 152px;
   }
   .user-detail h5{
   margin:15px 0px 5px 0px;
   }
   p{
   margin : 0;
   }
   .icon {
   float: right;
   color: #fff;
   }

   .t-16 {
    font-size: 1.0rem;
    line-height: 1.5;
}

.t-bold {
    font-weight: 600;
}

.t-black {
    color: rgba(0,0,0,.9);
}

.pv-entity__secondary-title {
    font-weight: 400;
    color: rgba(0,0,0,.9);
}

.svg-icon-wrap {
    display: inline-block;
}

.btn:not(:disabled):not(.disabled) {
    cursor: pointer;
    margin-top: 10px;
}

</style>
<link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css')}}">
<div class="container" style="margin-bottom: 20px;  margin-top: 10px ; min-height: 460px">
   <div class="row">
      <div class="col-sm-8 col-12 main-section">
         <div class="row">
            <div class="col-lg-12 col-sm-12 col-12 profile-header"></div>
         </div>
         <div class="row user-detail text-center">
            <div class="col-lg-12 col-sm-12 col-12">
               <img src="{{ asset('images/profile-picture-user/'.$user->profile_image) }}" class="rounded-circle img-thumbnail text-centre">
               <a id="self-profile-settings-gear" style="cursor: pointer;" class="icon settings-icon" href="{{ url('profile/user/edit') }}">
                  <li-icon type="gear-icon" aria-hidden="true">
                  </li-icon>
               </a>
               <h5>{{ $user->name }}</h5>
               <p>{{ $user->profession }}</p>
               <p><i class="fa fa-map-marker" aria-hidden="true"></i>{{ isset($user->regency->name) ? " ".$user->regency->name." , " : " " }}  {{ isset($user->province->name) ? $user->province->name." , " : "" }} Indonesia.</p>

               @if(isset($userLogin))
                  @if($connect == 0)
                     <a href="#" id="connect" data-id="{{ $user->id }}" class="btn btn-success btn-sm">Connect</a>
                  @endIf
                  @if($follow == 0)
                     <a href="#" id="follow" data-id="{{ $user->id }}" class="btn btn-info btn-sm">Follow</a>
                  @elseif($follow == 1)
                     <a href="#" id="follow" data-id="{{ $user->id }}" class="btn btn-danger btn-sm">unFollow</a>
                  @endIf
               @endIf
            </div>
         </div>
      </div>
   </div>
   <div class="row" style="margin-top: 10px">
      <div class="col-sm-8 col-12 main-section">
         <div class="row" style="padding: 24px 24px 0; margin-bottom: -10px">           
            <div style="width: 70%; float: left;"><h3 class="col-md-10" style="    margin: -10px;"> Education </h3></div> 
         </div>
         <div class="clearfix visible-xs"></div><br/>
        
        <ul style="list-style: none;">
           @foreach($educations as $education)
            <li>
               <h3 class="pv-entity__school-name t-16 t-black t-bold" style="margin-bottom: -5px;">{{ $education->school }}</h3>
               <p class="pv-entity__secondary-title pv-entity__degree-name pv-entity__secondary-title t-14 t-black t-normal">
                 <span class="visually-hidden">{{ $education->degree }} , </span>
                 <span class="pv-entity__comma-item">{{ $education->field_of_study }}</span>
               </p>
               <p class="pv-entity__secondary-title pv-entity__degree-name pv-entity__secondary-title t-14 t-black t-normal">
                 <span class="visually-hidden">{{ $education->from }} - {{ $education->until }}</span>
               </p>
            </li>
            <hr/>
           @endForeach
        </ul>
      </div>
   </div>
   <div class="row">
      <div class="col-sm-8 col-12 main-section">
         <div class="row" style="padding: 24px 24px 0; margin-bottom: -10px">           
            <div style="width: 70%; float: left;"><h3 class="col-md-10" style="    margin: -10px;"> Experience </h3></div>
         </div>
         <div class="clearfix visible-xs"></div><br/>

        
        <ul style="list-style: none;">
           @foreach($experiences as $experience)
            <li>
               <h3 class="pv-entity__school-name t-16 t-black t-bold" style="margin-bottom: -5px;">{{ $experience->title }}</h3>
               <p class="pv-entity__secondary-title pv-entity__degree-name pv-entity__secondary-title t-14 t-black t-normal">
                 <span class="visually-hidden">{{ $experience->company }}</span>
               </p>
               <p class="pv-entity__secondary-title pv-entity__degree-name pv-entity__secondary-title t-14 t-black t-normal">
                 <span class="visually-hidden">{{ isset($experience->regency) ? $experience->regency->name." , ": "" }}  </span>
                 <span class="visually-hidden">{{ isset($experience->province) ? $experience->province->name: "" }}  </span>
               </p>

               <p class="pv-entity__secondary-title pv-entity__degree-name pv-entity__secondary-title t-14 t-black t-normal">
                 <span class="visually-hidden"> {{ $month[$experience->from_month] }} {{ $experience->from_year }} </span>
                 <span class="visually-hidden"> - 
                  @if($experience->currently == 1)
                    Present
                  @else
                    {{ $month[$experience->from_month] }} {{ $experience->from_year }}
                  @endIf
                   </span>
               </p>
            </li>
            <hr/>
           @endForeach
        </ul>
      </div>
   </div>
   <div class="row">
      <div class="col-sm-8 col-12 main-section">
         <div class="row" style="padding: 24px 24px 0; margin-bottom: -10px">           
            <div style="width: 70%; float: left;"><h3 class="col-md-10" style="    margin: -10px;"> Document </h3></div>
         </div>
         <div class="clearfix visible-xs"></div><br/>

        
        <ul style="list-style: none;">
           @foreach($userDocuments as $userDocument)
            <li>               
               <p class="pv-entity__secondary-title pv-entity__degree-name pv-entity__secondary-title t-14 t-black t-normal">
                 <span class="visually-hidden">{{ $userDocument->keterangan }}</span>
                 <span style="margin-left: 70px" class="visually-hidden">
                   @if($userDocument->type_file == 'image/png')
                    <img style="height: 50px !important" src="{{ asset('document/user/'.$userDocument->name_file) }}">
                    @else
                    <a href="{{ asset('document/user/'.$userDocument->name_file) }}" target="_blank">
                      <img style="height: 50px !important" src="{{ asset('images/doc.png') }}">
                    </a>
                   @endIf                   
                 </span>
               </p>               
            </li>
            <hr/>
           @endForeach
        </ul>
      </div>
   </div>
</div>


<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload Document</h4>
        </div>
        <div class="modal-body">
          <form id="uplad_form">
            @csrf
              <div class="form-group col-md-12">
                  <label>Document (Bisa berupa image / doc / pdf)</label>
                  <div class="custom-file">
                    <input type="file" name="doc" class="dropify form-control" id="doc">
                  </div>
              </div>

              <div class="form-group col-md-12">
                  <label>Nama Dokument </label>
                  <div class="custom-file">
                    <input type="text" name="keterangan" class="form-control" id="keterangan">
                  </div>
              </div>

              <div class="form-group col-md-12">
                  <button type="button" id="submit_upload" class="btn btn-primary">Submit</button>
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

@endsection
@section('js')
<script type="text/javascript">
   $(function() {

      $("#follow").click(function(){
        let id = $(this).data('id');
        $.ajax({
            type: "POST",
            url: '{{ URL::to("follow") }}',
            dataType: 'json',
            data: {
              user_target : id,
              "_token": "{{ csrf_token() }}"
            },
            success: function(data){
            if(data.error == 0)
            {               
                if(data.follow == 1){
                  $("#follow").removeClass( "btn-info" );
                  $("#follow").addClass( "btn-danger" );
                  $("#follow").html("unFollow")
                }else
                {
                  $("#follow").removeClass( "btn-danger" );
                  $("#follow").addClass( "btn-info" );
                  $("#follow").html("Follow")
                }


              }
            }
        });
      });

      $("#connect").click(function(){
        let id = $(this).data('id');
        $.ajax({
            type: "POST",
            url: '{{ URL::to("connect") }}',
            dataType: 'json',
            data: {
              user_target : id,
              "_token": "{{ csrf_token() }}"
            },
            success: function(data){
              if(data.error == 0)
              {
                $("#connect").remove();

                if(data.follow == 1){
                  $("#follow").removeClass( "btn-info" );
                  $("#follow").addClass( "btn-danger" );
                  $("#follow").html("unFollow")
                }else
                {
                  $("#follow").removeClass( "btn-danger" );
                  $("#follow").addClass( "btn-info" );
                  $("#follow").html("Follow")
                }


              }
            }
          });
      });
   });
</script>
@endsection