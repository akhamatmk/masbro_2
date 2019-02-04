<style type="text/css">
	.child-filter{		
    	margin- bottom: 30px: 
    	padding : 20px;
	}
</style>

<div class="parent-title" >
	<button class="btn btn-primary" id="add-filter" type="button" style="cursor: pointer; margin-bottom: 30px"> Add Filter</button>
	<div id="body-filter" style="border: 1px solid #d4d4d4;">	
		@foreach($filters as $cuk => $filter)
			<div class="child-filter" style="padding: 10px; margin-bottom:20px" id="child-'+id+'">
				<div class="form-group">
					<label>Filter 1</label>
					<select class="form-control filter_1" style="height: 45px;" name="parent_filter_user[]" id="parent_filter_user_{{ $cuk }}"  >';
             			<option value="0">Silahkan Pilih</option>
             			@foreach($parent_filters as $k => $parent_filter)
             				@php $select=""; @endphp
             				@if($filter->filter_1 == $parent_filter->id)
             					@php $select='selected="selected"'; @endphp
             				@endIf
             				<option {{ $select }} value="{{ $parent_filter->id }}">{{ $parent_filter->name }}</option>
             			@endForeach
             		</select>
             	</div>

             	<div class="form-group">
					<label>Filter 2</label>
					<select class="form-control filter_2" style="height: 45px;" name="filter_2[]" id="filter_2_{{ $cuk }}"  >';
             			<option value="0">Silahkan Pilih</option>
             			<?php 
             				$filters2 = App\Models\FilterUser::where('parent_id', $filter->filter_1)->get();
             				if(count($filters2) > 0)
             				{
	             				foreach ($filters2 as  $filter2) {
	             					$select="";
             						if($filter->filter_2 == $filter2->id)
             							$select='selected="selected"';             						

	             					echo '<option '.$select.' value="'.$filter2->id.'">'.$filter2->name.'</option>';
	             				}
             				}

             			?>
             		</select>
             	</div>

             	<div class="form-group">
					<label>Filter 3</label>
					<select class="form-control filter_3" style="height: 45px;" name="filter_3[]" id="filter_3_{{ $cuk }}"  >';
             			<?php 
             				$filters3 = App\Models\FilterUser::where('parent_id', $filter->filter_2)->get();
             				if(count($filters3) > 0)
             				{
	             				foreach ($filters3 as  $filter3) {
	             					$select="";
             						if($filter->filter_3 == $filter3->id)
             							$select='selected="selected"';             						

	             					echo '<option '.$select.' value="'.$filter3->id.'">'.$filter3->name.'</option>';
	             				}
             				}

             			?>
             		</select>
             	</div>


             </div>
		@endForeach
	</div>
</div>

<script type="text/javascript">
    $(function() { 
    	var id = "{{ count($filters) }}";
    	id = parseInt(id);

    	$("#add-filter").click(function(){
    		var temp = "";    		
    		$.ajax({
				type: "GET",
				url: '{{ URL::to("filter/user") }}',
				dataType: 'json',
             	success: function(data){
             		temp = '<div class="child-filter" style="padding: 10px; margin-bottom:20px" id="child-'+id+'"><div class="form-group"><label>Filter 1</label><select class="form-control filter_1" data-id="'+id+'" style="height: 45px;" name="parent_filter_user[]" id="parent_filter_user_'+id+'"  >';
             			temp = temp + '<option value="0">Silahkan Pilih</option>';
               		$.each(data , function(index, val) {
               			temp = temp + '<option value="'+val.id+'">'+val.name+'</option>';
					});

					temp = temp + '</select>';


		    		temp = temp +'</div>';

		    		temp = temp +'<div class="form-group "><label>Filter 2</label><select name="filter_2[]" class="form-control filter_2" id="filter_2_'+id+'" data-id="'+id+'" style="height : 45px"></select></div';

		    		temp = temp +'<div class="form-group"><label>Filter 3</label><select name="filter_3[]" class="form-control" id="filter_3_'+id+'" style="height : 45px"></select></div';

		    		temp = temp +'</div><hr/>';

		    		$("#body-filter").append(temp);
		    		jancuk();
		    		id++;
             	}
           	});
           	
    	});

    	function jancuk()
    	{
    		$(".filter_1").change(function(){
	    		var data_id = $(this).attr('id');
	    		var ret = data_id.replace('parent_filter_user_','');
	    		var child = $(this).find(':selected').val();
	    		$.ajax({
				type: "GET",
				url: '{{ URL::to("filter/child/") }}/'+child,
				dataType: 'json',
             	success: function(data){
	    			$("#filter_2_"+ret).html("");
	    			var temp = "";
	    			temp = temp + '<option value="0">Silahkan pilih</option>';
	    			$.each(data , function(index, val) {
               			temp = temp + '<option value="'+val.id+'">'+val.name+'</option>';
					});

					$("#filter_2_"+ret).append(temp);
		    	}
	        });
	    	});

	    	$(".filter_2").change(function(){
	    		var data_id = $(this).attr('id');
	    		var ret = data_id.replace('filter_2_','');
	    		var child = $(this).find(':selected').val();
	    		$.ajax({
				type: "GET",
				url: '{{ URL::to("filter/child/") }}/'+child,
				dataType: 'json',
             	success: function(data){
	    			$("#filter_3_"+ret).html("");
	    			var temp = "";
	    			$.each(data , function(index, val) {
               			temp = temp + '<option value="'+val.id+'">'+val.name+'</option>';
					});

					$("#filter_3_"+ret).append(temp);
		    	}
	        });
	    	});	
    	}


    	$(".filter_1").change(function(){

	    		var data_id = $(this).attr('id');
	    		alert(data_id);
	    		var ret = data_id.replace('parent_filter_user_','');
	    		var child = $(this).find(':selected').val();
	    		$.ajax({
				type: "GET",
				url: '{{ URL::to("filter/child/") }}/'+child,
				dataType: 'json',
             	success: function(data){
	    			$("#filter_2_"+ret).html("");
	    			var temp = "";
	    			temp = temp + '<option value="0">Silahkan pilih</option>';
	    			$.each(data , function(index, val) {
               			temp = temp + '<option value="'+val.id+'">'+val.name+'</option>';
					});

					$("#filter_2_"+ret).append(temp);
		    	}
	        });
	    });

	    	$(".filter_2").change(function(){

	    		var data_id = $(this).attr('id');
	    		var ret = data_id.replace('filter_2_','');
	    		var child = $(this).find(':selected').val();
	    		$.ajax({
				type: "GET",
				url: '{{ URL::to("filter/child/") }}/'+child,
				dataType: 'json',
             	success: function(data){
	    			$("#filter_3_"+ret).html("");
	    			var temp = "";
	    			$.each(data , function(index, val) {
               			temp = temp + '<option value="'+val.id+'">'+val.name+'</option>';
					});

					$("#filter_3_"+ret).append(temp);
		    	}
	        });
	    	});	

    	
    });
</script>