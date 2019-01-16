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
   .dropify-wrapper{
   border: 1px solid;
   }

   .clearfix::after {
     content: "";
     clear: both;
     display: table;
   }
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/dropzone.css') }}">

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
                     <svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="artdeco-icon icon">
                        <g class="large-icon" style="fill: currentColor" id="gear-icon-large">
                           <path d="M12,9a3,3,0,1,0,3,3A3,3,0,0,0,12,9Zm0,5.13A2.13,2.13,0,1,1,14.12,12,2.12,2.12,0,0,1,12,14.13Zm7.91-2.87L22,9.38,19.26,4.62,16.6,5.5a1,1,0,0,1-1.29-.75L14.74,2H9.26L8.69,4.75A1,1,0,0,1,7.4,5.5L4.74,4.62,2,9.38l2.09,1.87a1,1,0,0,1,0,1.49L2,14.62l2.74,4.76L7.4,18.5a1,1,0,0,1,1.29.75L9.26,22h5.48l0.57-2.75a1,1,0,0,1,1.29-.75l2.66,0.88L22,14.62l-2.09-1.87A1,1,0,0,1,19.91,11.25ZM18.4,17.12l-1.22-.4a2.86,2.86,0,0,0-3.7,2.14l-0.26,1.26H10.78l-0.26-1.26a2.86,2.86,0,0,0-3.7-2.14l-1.22.4L4.38,15l1-.86a2.88,2.88,0,0,0,0-4.29L4.38,9,5.6,6.88l1.22,0.4a2.86,2.86,0,0,0,3.7-2.14l0.26-1.26h2.44l0.26,1.26a2.86,2.86,0,0,0,3.7,2.14l1.22-.4L19.62,9l-1,.86a2.88,2.88,0,0,0,0,4.29l1,0.86Z"></path>
                        </g>
                     </svg>
                  </li-icon>
               </a>
               <h5>{{ $user->name }}</h5>
               <p>{{ $user->profession }}</p>
               <p><i class="fa fa-map-marker" aria-hidden="true"></i>{{ isset($user->regency->name) ? " ".$user->regency->name." , " : " " }}  {{ isset($user->province->name) ? $user->province->name." , " : "" }} Indonesia.</p>
               <a href="{{ url('profile/user/edit') }}" class="btn btn-info btn-sm">Edit Profile</a>
               <a href="#" class="btn btn-success btn-sm upload">Upload Document</a>
            </div>
         </div>
      </div>
   </div>
   <div class="row" style="margin-top: 10px">
      <div class="col-sm-8 col-12 main-section">
         <form action="{{ url('make/post') }}" method="POST" style="margin: 10px">
            @csrf
            <h4><u>Make Your Post ?</u></h4>
            <div class="form-group col-md-12">
               <textarea class="form-control" name="post" rows="6" placeholder="Describe your post"></textarea>  
            </div>
            <div class="form-group col-md-12">
               <div id="dropzone" class="dropzone"></div>
            </div>
            <div class="form-group col-md-12 clearfix">
               <div style="float: right;">
                  <button class="btn btn-primary">Post</button>
               </div>
            </div>
            <div id="product-image"></div>
         </form>
      </div>
   </div>

    <div class="row" style="margin-top: 10px">
      <div class="col-sm-8 col-12 main-section">
        @include('layout/timeline')
      </div>
    </div>

    <div class="row" style="margin-top: 10px">
      <div class="col-sm-8 col-12 main-section">
        @include('layout/gallery')
      </div>
    </div>

   <div class="row" style="margin-top: 10px">
      <div class="col-sm-8 col-12 main-section">
         <div class="row" style="padding: 24px 24px 0; margin-bottom: -10px">
            <div style="width: 70%; float: left;">
               <h3 class="col-md-10" style="    margin: -10px;"> Education </h3>
            </div>
            <div style="width: 20%; float: right;">
               <a href="{{ url('education/create') }}" id="ember155">
                  <span class="svg-icon-wrap">
                     <li-icon aria-hidden="true" type="plus-icon">
                        <svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="artdeco-icon" focusable="false">
                           <path d="M21,13H13v8H11V13H3V11h8V3h2v8h8v2Z" class="large-icon" style="fill: currentColor"></path>
                        </svg>
                     </li-icon>
                  </span>
               </a>
            </div>
         </div>
         <div class="clearfix visible-xs"></div>
         <br/>
         <ul style="list-style: none;">
            @foreach($educations as $education)
            <li>
              <div class="clearfix">
                <div style="float: left; width: 75%">
                  <h3 class="pv-entity__school-name t-16 t-black t-bold" style="margin-bottom: -5px;">{{ $education->school }}</h3>
                </div>

                <div style="float: right; width: 20%">
                  <a href="{{ url('education/edit/'.$education->id) }}"><img width="25px" src="{{ asset('images/edit.png') }}"></a>
                  <a style="cursor: pointer;" class="deleteEducation" data-id="{{ $education->id }}"><img width="25px" src="{{ asset('images/remove.png') }}"></a>
                </div>
              </div>

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
            <div style="width: 70%; float: left;">
               <h3 class="col-md-10" style="    margin: -10px;"> Experience </h3>
            </div>
            <div style="width: 20%; float: right;">
               <a href="{{ url('experience/create') }}" id="ember155">
                  <span class="svg-icon-wrap">
                     <li-icon aria-hidden="true" type="plus-icon">
                        <svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="artdeco-icon" focusable="false">
                           <path d="M21,13H13v8H11V13H3V11h8V3h2v8h8v2Z" class="large-icon" style="fill: currentColor"></path>
                        </svg>
                     </li-icon>
                  </span>
               </a>
            </div>
         </div>
         <div class="clearfix visible-xs"></div>
         <br/>
         <ul style="list-style: none;">
            @foreach($experiences as $experience)
            <li>

               <div class="clearfix">
                <div style="float: left; width: 75%">                  
                  <h3 class="pv-entity__school-name t-16 t-black t-bold" style="margin-bottom: -5px;">{{ $experience->title }}</h3>
                </div>

                <div style="float: right; width: 20%">
                  <a href="{{ url('experience/edit/'.$experience->id) }}"><img width="25px" src="{{ asset('images/edit.png') }}"></a>
                  <a style="cursor: pointer;" class="deleteExperience" data-id="{{ $experience->id }}"><img width="25px" src="{{ asset('images/remove.png') }}"></a>
                </div>
              </div>

               
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
            <div style="width: 70%; float: left;">
               <h3 class="col-md-10" style="    margin: -10px;"> Document </h3>
            </div>
            <div style="width: 20%; float: right;">
               <a class="upload" id="ember155">
                  <span class="svg-icon-wrap">
                     <li-icon aria-hidden="true" type="plus-icon">
                        <svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="artdeco-icon" focusable="false">
                           <path d="M21,13H13v8H11V13H3V11h8V3h2v8h8v2Z" class="large-icon" style="fill: currentColor"></path>
                        </svg>
                     </li-icon>
                  </span>
               </a>
            </div>
         </div>
         <div class="clearfix visible-xs"></div>
         <br/>
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
<script src="{{ asset('js/dropzone.js') }}"></script>
<script type="text/javascript">
   Dropzone.autoDiscover = false;
    $(function() {
        
        @if(Session::has('succes'))
          swal("Good job!", "Create Post Succes!", "success");
        @endIf
    
        $('.dropify').dropify();
   
        $(".upload").click(function(){
           $("#myModal").modal('show');
        });

        $(".deleteEducation").click(function(){
          let id = $(this).data('id');
           swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: [
              'No, cancel it!',
              'Yes, I am sure!'
            ],
            dangerMode: true,
          }).then(function(isConfirm) {
            if (isConfirm) {
              window.location.href = "{{ url('education/delete')}}/"+id;
            } else {
              swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
          })
        });

        $(".deleteExperience").click(function(){
          let id = $(this).data('id');
           swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: [
              'No, cancel it!',
              'Yes, I am sure!'
            ],
            dangerMode: true,
          }).then(function(isConfirm) {
            if (isConfirm) {
              window.location.href = "{{ url('experience/delete')}}/"+id;
            } else {
              swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
          })
        });
   
   
        $("#dropzone").dropzone({ 
               url: "{{ URL('upload/image/gallery') }}",
               //dictDefaultMessage: "your custom message",
               init: function () {
         this.on('success', function (file) {                    
             $(".dz-preview:last-child").attr('id', "document-" +file.upload.uuid);
             var value_image = $("#"+file.upload.uuid).val();             
         })
       },
               maxFiles: 5,
               paramName: "image", 
               addRemoveLinks: true,
               sending: function(file, xhr, formData) {
             formData.append("_token", "{{ csrf_token() }}");
       },
       removedfile: function(file) {
           $("#"+file.upload.uuid).remove();
           file.previewElement.remove();
         },
       success: function (file, response) {
         $("#product-image").append($("<input id='"+file.upload.uuid+"' value='"+response+"' type='hidden' name='product_images[]' >"));
               }
           });
   
   
        $("#submit_upload").click(function(){
           let form = $('#uplad_form')[0];
           let formData = new FormData(form);
   
           $.ajax({
             type: "POST",
             url: '{{ URL::to("upload/document") }}',
             dataType: 'json',
             data: formData,
             cache: false,
             contentType: false,
             processData: false,
             success: function(data){
               $("#myModal").modal('hide');
               if(data.succes == 1)
               {
                 swal({title: "Good job", text: "Your Document Succes Upload", type: 
                   "success"}).then(function(){ 
                      location.reload();
                      }
                   );
               }
             }
           });
        });
    });
</script>
@endsection