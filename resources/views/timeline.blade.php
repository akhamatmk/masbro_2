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
</style>

<div class="content-block">
   <!-- Submit Resume -->
   <div class="section-full">
      <div class="container">
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
                        <li><a href="#">Like</a></li>
                        <li><a href="#">Share</a></li>
                     </ul>
                     <textarea class="form-control"></textarea>
                     <button style="margin-top: 2px" class="btn btn-primary"> Comment</button>
                  </div>

                  <div class="blog-comment">
                     <div class="blog-author--no-cover">                    
                        <p style="font-size: 12px">
                           <div class="clearfix">
                              <div style="width: 10%; float: left">
                                 <img class="pp" src="{{ asset('images/profile-picture-user/'.$post->user->profile_image) }}">
                              </div>

                              <div style="width: 88%; float: right;">
                                 <span>{{ $post->user->name }}</span> sadasdsasad asd asd asdsadsad sad sad sad asd asd asdasd asdasd
                              </div>
                           </div>                           
                       </p>
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