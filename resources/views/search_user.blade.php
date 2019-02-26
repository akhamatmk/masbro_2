@extends('layout.app')
@section('title', 'Login Page Masbro')
@section('content')

<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
}

.container-user{
	box-shadow: 0 0 10px 0 rgba(0,24,128,0.1);
	margin: 5px;
    padding: 10px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

label {
  font-size: 20px;
  line-height: 26px;
}

.radio input[type="radio"] + label {
  color: grey;
  position: relative;
}

.radio input[type="radio"] + label::before {
  /* Outer Circle of radio button */
  border: 1px solid grey;
  content: ' ';
  display: inline-block;
  margin-right: 5px;
  width: 17px;
  height: 17px;
  border-radius: 50%;
  transition: border 0.15s ease-in-out;
}

.radio input[type="radio"] + label::after {
  /* Inner Circle of radio button */
  border: 0px solid orange;
  content: ' ';
  background: transparent;
  display: inline-block;
  margin-right: 5px;
  width: 11px;
  height: 11px;
  border-radius: 50%;
  position: absolute;
  left: 3px;
  top: 7px;
  transition: border 0.15s ease-in-out;
}

input[type="radio"] {
  display: none;
}

/* When button is active */
.radio input[type="radio"]:checked + label::after {
  background: orange;
}

.radio input[type="radio"]:checked + label::before {
  border-color: orange;
}

.radio input[type="radio"]:checked + label {
  color: orange;
}

.autocomplete {
    position: relative;
    display: inline-block;
    width: 100%;
    }
    .autocomplete-items {
    position: absolute;
    border: 1px solid #d4d4d4;
    border-bottom: none;
    border-top: none;
    z-index: 99;
    /*position the autocomplete items to be the same width as the container:*/
    top: 100%;
    left: 0;
    right: 0;
    }
    .autocomplete-items div {
    padding: 10px;
    background-color: #fff; 
    border-bottom: 1px solid #d4d4d4; 
    }
    /*when hovering an item:*/
    .autocomplete-items div:hover {
    background-color: #e9e9e9; 
    }
    /*when navigating through the items using the arrow keys:*/
    .autocomplete-active {
    background-color: DodgerBlue !important; 
    color: #ffffff; 
    }

    .autocomplete-value{
        cursor: pointer;
    }

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<!-- contact area -->
<div class="content-block">
    <!-- Submit Resume -->
    <div class="section-full bg-white submit-resume content-inner-2" style="padding-top: 35px; padding-bottom: 20px;">
        <div class="container" style="min-height: 600px;">
            <div class="row" id="filter" style="min-height: 100px; background-color: #fbfbfb; border-radius: 5px; display: none">
               <form method="POST" style="margin-top: 10px; width: 99%;" id="myform">
                  <div style="padding: 20px;">                  
                     <div class="form-group">
                        <label>Gender</label>
                        <div class="radio row" style="margin-left: 20px">
                           <input id="sex-male" type="radio" name="gender" value="1"/>
                           <label for="sex-male">Pria</label>
                        
                           <input id="sex-female" type="radio" style="margin-left: 20px" name="gender" value="2" />
                           <label for="sex-female" style="margin-left: 20px">Wanita</label>
                        </div>
                     </div>

                     <div class="form-group">
                         <label>Suku</label>
                         <div class="autocomplete" >
                             <input id="tribe" type="text" name="tribe" autocomplete="off" class="form-control tribe" placeholder="Suku" value="">
                             <div id="list-tribe" class="autocomplete-items"></div>
                         </div>
                     </div>

                     <div class="form-group">
                         <label>Agama</label>
                         <select name="religion" id="religion">
                             @foreach($religion as $key => $religion)
                             <option value="{{ $key }}">{{ $religion }}</option>
                             @endForeach
                         </select>                                    
                     </div>
                     @csrf
                     <input type="hidden" name="region" value="{{ $region }}" />
                     <input type="hidden" name="keyword" value="{{ $keyword }}" />
                     <button type="button" class="site-button" style="margin: 10px;">Submit</button>
                  </div>                  
               </form>
            </div>
            <button type="button" class="btn" id="btn-filter" style="margin: 10px;">filter</button>
            <div class="row" id="people">
            	@foreach($users as $key => $user)
	            	<div class="column" >
	            		<div class="container-user">
	            			<p><strong>{{ $user->first_name }} {{ $user->last_name }}</strong></p>
							<p><img style="height: 100px; width: -webkit-fill-available;"  src="{{ asset('images/profile-picture-user/'.$user->profile_image) }}"></p>	
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
	            		</div>		
					</div>
				@endForeach
            </div>
        </div>
    </div>
    <!-- Submit Resume END -->
</div>
<!-- Content END-->
@endsection

@section('js')

<script type="text/javascript">
    function cv(value)
    {
        $("#tribe").val(value);
        $("#list-tribe").html("");
   }

    $(function() {
         $("#btn-filter").click(function(){
               if($('#filter').css('display') == 'none')
                  $('#filter').show();
               else
                  $('#filter').hide();
         });

         $(".site-button").click(function(){
            $.ajax({
                type: "POST",
                url: '{{ URL::to("ajax/search/people") }}',
                dataType: 'json',
                data: $('#myform').serialize(),
                success: function(data){
                     $("#people").html(data.html);
                }
            });
         });

        $("#list-tribe").html("");
        $("#tribe").keyup(function(){
            let text = $(this).val();
            if(text.length == 0)
            {
                $("#list-tribe").html("");
            } else {
                $.ajax({
                    type: "GET",
                    url: '{{ URL::to("tribes") }}',
                    dataType: 'json',
                    data: {
                        text : text
                    },
                    success: function(data){
                        $("#list-tribe").html("");
                        $.each(data , function(index, val) { 
                            let temp = '<div class="autocomplete-value" onclick="cv(\''+val.name+'\')">'+val.name+'</div>';
                            $("#list-tribe").append(temp);
                        });                 
                    }
                });
            }
        });
    });
</script>
@endsection