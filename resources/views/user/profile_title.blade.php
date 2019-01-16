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

    .child-title{
    	padding: 10px; border: 1px solid rgba(0,24,128,0.1); margin-top: 10px;
    }
</style>

<div class="parent-title">
	<button class="btn" id="add" type="button" style="cursor: pointer;"> Add Profesion</button>
	@if(count($titles) > 0)

		@foreach($titles as $key => $value)
			<div class="child-title" id="child-0">
			    <div class="form-group">
			        <label>Title</label>
			        <div class="autocomplete" >
			            <input id="title-{{ $key }}" type="text" data-id="{{ $key }}" name="title[]" value="{{ $value->title }}" autocomplete="off" class="form-control title" placeholder="Title">
			            <div id="myInputautocomplete-list-{{ $key }}" class="autocomplete-items"></div>
			        </div>
			    </div>
			    <div class="form-group">
			    	<label><input type="radio" checked="checked" id="primary-title-{{ $key }}" name="primary" value="{{ $value->title }}" >Jadikan Sebagai Utama</label>
			    </div>

			    <div class="checkbox">
				  <label>		  	
				    <input type="checkbox" name="show[]" class="show_hidden" data-id="{{ $key }}" @if($value->show == 1) checked="checked" @endIf> Munculkan di pencarian
				    <input type="hidden" name="show_hidden[]" id="show_hidden_{{ $key }}" data-id="{{ $key }}" value="@if($value->show == 1) on @else off @endIf">
				  </label>
				</div>
			</div>
		@endForeach

	@else
	<div class="child-title" id="child-0">
	    <div class="form-group">
	        <label>Title</label>
	        <div class="autocomplete" >
	            <input id="title-0" type="text" data-id="0" name="title[]" autocomplete="off" class="form-control title" placeholder="Title">
	            <div id="myInputautocomplete-list-0" class="autocomplete-items"></div>
	        </div>
	    </div>
	    <div class="form-group">
	    	<label><input type="radio" checked="checked" id="primary-title-0" name="primary" checked>Jadikan Sebagai Utama</label>
	    </div>

	    <div class="checkbox">
		  <label>		  	
		    <input type="checkbox" class="show_hidden" data-id="0" name="show[]"> Munculkan di pencarian
		    <input type="hidden" id="show_hidden_0" name="show_hidden[]"  value="off">
		  </label>
		</div>
	</div>
	@endIf

</div>

@section('js')
<script type="text/javascript">
    function change_value(value, id)
   	{
   		$("#title-"+id).val(value);
   		$("#myInputautocomplete-list-"+id).html("");
   		$("#primary-title-"+id).val(value);
   		
   	}

    $(function() {
    	let child_id = "{{ count($titles) }}";
    	child_id = parseInt(child_id);
		$("#myInputautocomplete-list").html("");
       	$(".title").keyup(function(){
   			let text = $(this).val();
   			let id = $(this).data('id');
   			$("#primary-title-"+id).val(text);
           	$.ajax({
				type: "GET",
				url: '{{ URL::to("profesion/title") }}',
				dataType: 'json',
				data: {
					text : text
				},
             	success: function(data){
             		console.log(data);             		
             		$("#myInputautocomplete-list-"+id).html("");
               		$.each(data , function(index, val) { 
  						let temp = '<div class="autocomplete-value" onclick="change_value(\''+val.name+'\', '+id+')">'+val.name+'</div>';
  						$("#myInputautocomplete-list-"+id).append(temp);
					});					
             	}
           	});           	
       	});

       	$(".show_hidden").click(function(){
       		let id = $(this).data('id');
       		if ($(this).is(":checked"))
   				$("#show_hidden_"+id).val('on');
			else
				$("#show_hidden_"+id).val('off');
       	});

       	$("#add").click(function(){
       		let temp = '<div class="child-title" id="child-'+child_id+'"><div class="form-group"><label>Title</label><div class="autocomplete" ><input id="title-'+child_id+'" type="text" data-id="'+child_id+'" autocomplete="off" name="title[]" class="form-control title" placeholder="Title"><div id="myInputautocomplete-list-'+child_id+'" class="autocomplete-items"></div></div></div><div class="form-group"><label><input type="radio" name="primary" id="primary-title-'+child_id+'" checked>Jadikan Sebagai Utama</label></div><div class="checkbox"><label><input type="checkbox" name="show[]" class="show_hidden" data-id="'+child_id+'" id="on-off-'+child_id+'" data-toggle="toggle"> Munculkan di pencarian <input type="hidden" id="show_hidden_'+child_id+'" name="show_hidden[]" data-id="'+child_id+'" value="off"> </label></div></div>';
       		$(".parent-title").append(temp);

       		$(".title").keyup(function(){
	   			let text = $(this).val();
	   			let id = $(this).data('id');
	   			$("#primary-title-"+id).val(text);
	           	$.ajax({
					type: "GET",
					url: '{{ URL::to("profesion/title") }}',
					dataType: 'json',
					data: {
						text : text
					},
	             	success: function(data){
	             		$("#myInputautocomplete-list-"+id).html("");
	               		$.each(data , function(index, val) { 
	  						let temp = '<div class="autocomplete-value" onclick="change_value(\''+val.name+'\', '+id+')">'+val.name+'</div>';
	  						$("#myInputautocomplete-list-"+id).append(temp);
						});					
	             	}
	           	});           	
	       	});

	       	$(".show_hidden").click(function(){
	       		let id = $(this).data('id');
	       		if ($(this).is(":checked"))
	   				$("#show_hidden_"+id).val('on');
				else
					$("#show_hidden_"+id).val('off');
	       	});

       		child_id++;
       	});
    });
</script>
@endsection