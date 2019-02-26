@extends('layout.app')
@section('title', 'Login Page Masbro')
@section('content')
<style type="text/css">
   .blog-container {
   background: #fff;
   border-radius: 5px;
   box-shadow: rgba(0, 0, 0, 0.2) 0 4px 2px -2px;
   font-family: "adelle-sans", sans-serif;
   font-weight: 100;
   margin: 5px auto;
   width: 20rem;
   }
   @media screen and (min-width: 480px) {
   .blog-container {
   width: 28rem;
   }
   }
   @media screen and (min-width: 767px) {
   .blog-container {
   width: 40rem;
   }
   }
   @media screen and (min-width: 959px) {
   .blog-container {
   width: 50rem;
   }
   }
   .blog-container a {
   color: #4d4dff;
   text-decoration: none;
   transition: .25s ease;
   }
   .blog-container a:hover {
   border-color: #ff4d4d;
   color: #ff4d4d;
   }
   .blog-cover {
   background: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/17779/yosemite-3.jpg");
   background-size: cover;
   border-radius: 5px 5px 0 0;
   height: 15rem;
   box-shadow: inset rgba(0, 0, 0, 0.2) 0 64px 64px 16px;
   }
   .blog-author,
   .blog-author--no-cover {
   margin: 0 auto;
   padding-top: .125rem;
   width: 95%;
   }
   .blog-author h3::before,
   .blog-author--no-cover h3::before {
   background: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/17779/russ.jpeg");
   background-size: cover;
   border-radius: 50%;
   content: " ";
   display: inline-block;
   height: 32px;
   margin-right: .5rem;
   position: relative;
   top: 8px;
   width: 32px;
   }
   .blog-author h3 {
   color: #fff;
   font-weight: 100;
   }
   .blog-author--no-cover h3 {
   color: #999999;
   font-weight: 100;
   }
   .blog-body {
   margin: 0 auto;
   width:95%;
   }
   .video-body {
   height: 100%;
   width: 100%;
   }
   .blog-title h1 a {
   color: #333;
   font-weight: 100;
   }

   .blog-summary p {
   color: #4d4d4d;
   padding: 5px;
   }
   .blog-tags ul {
    border-top: 1px solid #e6e6e6;
   display: flex;
   flex-direction: row;
   flex-wrap: wrap;
   list-style: none;
   padding-left: 0;
   }
   .blog-tags li + li {
   margin-left: .5rem;
   }
   .blog-tags a {
   font-weight: 700;
    color: #4e4e4e;
   font-size: .75rem;
   height: 1.5rem;
   line-height: 1.5rem;
   letter-spacing: 1px;
   padding: 0 .5rem;
   text-align: center;
   text-transform: uppercase;
   white-space: nowrap;
   width: 5rem;
   }
   .blog-footer {
   border-top: 1px solid #e6e6e6;
   margin: 0 auto;
   padding-bottom: .125rem;
   width: 80%;
   }
   .blog-footer ul {
   list-style: none;
   display: flex;
   flex: row wrap;
   justify-content: flex-end;
   padding-left: 0;
   margin: 10px;
   }
   .blog-footer li:first-child {
   margin-right: auto;
   }
   .blog-footer li + li {
   margin-left: .5rem;
   }
   .blog-footer li {
   color: #999999;
   font-size: .75rem;
   height: 1.5rem;
   letter-spacing: 1px;
   line-height: 1.5rem;
   text-align: center;
   text-transform: uppercase;
   position: relative;
   white-space: nowrap;
   }
   .blog-footer li a {
   color: #999999;
   }
   .comments {
   margin-right: 1rem;
   }
   .published-date {
   border: 1px solid #999999;
   border-radius: 3px;
   padding: 0 .5rem;
   }
   .numero {
   position: relative;
   top: -0.5rem;
   }
   .icon-star,
   .icon-bubble {
   fill: #999999;
   height: 24px;
   margin-right: .5rem;
   transition: .25s ease;
   width: 24px;
   }
   .icon-star:hover,
   .icon-bubble:hover {
   fill: #ff4d4d;
   }

   .pp{
    background-size: cover;
    border-radius: 50%;
    content: " ";
    display: inline-block;
    height: 32px;
    margin-right: .5rem;
    position: relative;
    top: 8px;
    width: 32px;
}

.row {
  display: flex;
  flex-wrap: wrap;
  padding: 0 4px;
}

/* Create four equal columns that sits next to each other */
.column {
  flex: 25%;
  max-width: 25%;
  padding: 0 4px;
}

.column img {
  margin-top: 8px;
  vertical-align: middle;
}

/* Responsive layout - makes a two column-layout instead of four columns */
@media screen and (max-width: 800px) {
  .column {
    flex: 50%;
    max-width: 50%;
  }
}

.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

.comment_field{
  font-size: 12px
}

.pp_comment{
  width: 10%; float: left
}

.text_comment{
  width: 88%; float: right;
}

.active{
    color : #0275d8 !important;
    font-weight: 900 !important;
}

</style>
<link rel="stylesheet" type="text/css" href="{{ asset('css/dropzone.css') }}">
<div class="content-block">
   <!-- Submit Resume -->
   <div class="section-full">
      <div class="container">

        <div class="row" style="    background: #fff;
    border-radius: 5px;
    box-shadow: rgba(0, 0, 0, 0.2) 0 4px 2px -2px;
    font-family: "adelle-sans", sans-serif;
    font-weight: 100;
    margin: 5px auto;
    width: 20rem;">
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

         <div class="row" style=" min-height: 450px;padding-bottom: 10px; margin-bottom: 82px;">
            @foreach($posts as $key => $post)
            <div class="blog-container">
               <div class="blog-header">
                  <div class="blog-author--no-cover">                    
                     <p style="font-size: 20px">
                        <img class="pp" src="{{ asset('images/profile-picture-user/'.$post->user->profile_image) }}">
                        {{ $post->user->name }}
                    </p>
                  </div>
               </div>
               <div class="blog-body">
                  <div class="blog-summary">
                     <p style="text-align: justify;">{{ $post->post }}</p>
                     <div class="clearfix" style="margin: 10px">
                        @foreach($post->gallery as $key => $value)                        
                           @if($key == 0)
                              <div style="width: 45%; float: left">
                                 <img height="150px" src="{{ url('storage/gallery/'.$value->image) }}">
                              </div>
                           
                           @elseIf($key == 1)
                              <div style="width: 45%; float: right;">
                                 <img height="150px" src="{{ url('storage/gallery/'.$value->image) }}">
                              </div>
                           @endIf

                        @endForeach
                     </div>
                  </div>
                  <div class="blog-tags">
                     <ul>
                        <li>                            
                            <?php 
                                if(checkLike($user->id,  $post->id) == 1)
                                    echo '<a style="curson : pointer" id="like_post_'.$post->id.'" data-id="'.$post->id.'" class="active like-btn" >Like</a>';
                                else
                                    echo '<a style="curson : pointer" id="like_post_'.$post->id.'" data-id="'.$post->id.'" class="like-btn">Like</a>';
                            ?>
                        </li>
                        <li><a href="#">Share</a></li>
                     </ul>
                     <textarea class="form-control" id="form_textrarea_{{ $post->id }}"></textarea>
                     <button style="margin-top: 2px; margin-bottom: 10px" data-id="{{ $post->id }}" class="btn btn-primary submit-commit"> Comment</button>
                  </div>

                  <div class="blog-comment">
                     <div class="blog-author--no-cover">
                        <div id="post-comment-{{ $post->id }}"></div>
                        @foreach($post->comment as $comment)
                        <p class="comment_field">
                           <div class="clearfix">
                              <div class="pp_comment">
                                 <img class="pp" src="{{ asset('images/profile-picture-user/'.$comment->user->profile_image) }}">
                              </div>

                              <div class="text_comment">
                                 <span>{{ $comment->user->name }}</span> {{ $comment->text }}
                              </div>
                           </div>                           
                       </p>
                       @endForeach
                     </div>
                  </div>

               </div>
            </div>
            @endForeach
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
    $(".like-btn").click(function(){
        var id = $(this).data('id');
        $.ajax({
            type: "POST",
            url: '{{ URL::to("like/post") }}',
            data:{
                "post_id" : id,
                "_token": "{{ csrf_token() }}"
            },
            dataType: 'json',
            success: function(data){
                if(data == 1){
                    $( "#like_post_"+id ).addClass( "active" );
                }
                else
                    $( "#like_post_"+id ).removeClass( "active" );
            
            }
        });
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


    $(".submit-commit").click(function(){
        var id = $(this).data('id');
        $.ajax({
            type: "POST",
            url: '{{ URL::to("comment/insert") }}',
            data:{
                "post_id" : id,
                "text" : $("#form_textrarea_"+id).val(),
                "_token": "{{ csrf_token() }}"
            },
            dataType: 'json',
            success: function(data){
                $( "#post-comment-"+id ).after( '<p class="comment_field"><div class="clearfix"><div class="pp_comment"><img class="pp" src="{{ asset('images/profile-picture-user/') }}/'+data.user.profile_image+'"></div><div class="text_comment"><span>'+data.user.name+'</span> '+data.text+'</div></div></p>');

                $("#form_textrarea_"+id).val("");

            }
        });
    });
  });
</script>
@endSection