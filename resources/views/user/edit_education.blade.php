@extends('layout.app')
@section('title', 'Login Page Masbro')
@section('content')
<style type="text/css">
    .section-full:last-child {
    margin-bottom: 0px;
    }
    /*the container must be positioned relative:*/
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
</style>
<!-- contact area -->
<div class="content-block">
    <!-- Submit Resume -->
    <div class="section-full bg-white submit-resume content-inner-2" style="padding-top: 35px; padding-bottom: 20px;">
        <div class="container" style="min-height: 600px">
            <div class="row">
                <div class="col-md-7 col-lg-9" style="box-shadow: 0 0 10px 0 rgba(0,24,128,0.1);">
                    @if(Session::has('message-succes'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{ Session::get('message-succes') }}</li>
                        </ul>
                    </div>
                    @endif
                    <form method="POST" style="margin-top: 10px" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Kampus / Sekolah</label>
                            <div class="autocomplete" >
                                <input id="school" type="text" name="school" class="form-control" value="{{ $data->school }}" placeholder="Sekolah">
                                <div id="myInputautocomplete-list" class="autocomplete-items"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Degree</label>
                            <input type="text" name="degree" class="form-control" value="{{ $data->degree }}" placeholder="Your Degree">
                        </div>
                        <div class="form-group">
                            <label>Field of study</label>
                            <input type="text" name="field_of_study" class="form-control" value="{{ $data->field_of_study }}" placeholder="Your field of study">
                        </div>
                        <div class="form-group">
                            <label>From Year</label>
                            <select name="from" id="from">
                                <option value="0">Silahkan Pilih</option>
                                @for($a = date('Y'); $a > 1960; $a --)
                                    @php $select="" @endphp                                    
                                    <?php
                                        if($data->from == $a)
                                            $select='selected="selected"';
                                    ?>

                                <option {{ $select }} value="{{ $a }}">{{ $a }} </option>
                                @endFor
                            </select>
                        </div>
                        <div class="form-group">
                            <label>To Year</label>
                            <select name="until" id="until">
                                <option value="0">Silahkan Pilih</option>
                                @for($a = date('Y'); $a > 1960; $a --)
                                    @php $select="" @endphp                                    
                                    <?php
                                        if($data->until == $a)
                                            $select='selected="selected"';
                                    ?>

                                <option {{ $select }} value="{{ $a }}">{{ $a }}</option>
                                @endFor
                            </select>
                        </div>
                        <button type="submit" class="site-button" style="margin-bottom: 10px;">Submit</button>
                        <a href="{{ url('profile/user') }}"><button type="button" class="site-button" style="margin-bottom: 10px;">Back to Profile</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Submit Resume END -->
</div>
<!-- Content END-->
@endsection
@section('js')
<script type="text/javascript">
    function change_value(value)
   	{
   		document.getElementById("school").value = value;
   		$("#myInputautocomplete-list").html("");
   	}

    $(function() {
       	$("#school").keyup(function(){
   			let text = $(this).val();
           	$.ajax({
				type: "GET",
				url: '{{ URL::to("search/school") }}',
				dataType: 'json',
				data: {
					text : text
				},
             	success: function(data){
             		$("#myInputautocomplete-list").html("");
               		$.each(data , function(index, val) { 
  						let temp = '<div class="autocomplete-value" onclick="change_value(\''+val.name+'\')">'+val.name+'</div>';
  						$("#myInputautocomplete-list").append(temp);
					});

					
             	}
           	});           	
       	});
    });
</script>
@endsection