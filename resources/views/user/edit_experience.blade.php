@extends('layout.app')
@section('title', 'Login Page Masbro')
@section('content')
<style type="text/css">
	.section-full:last-child {
	    margin-bottom: 0px;
	}
</style>
	<!-- contact area -->
        <div class="content-block" style="min-height: 500px">
			<!-- Submit Resume -->
			<div class="section-full bg-white submit-resume content-inner-2" style="padding-top: 35px; padding-bottom: 20px;">
				<div class="container">
					<div class="row">
						<div class="col-md-7 col-lg-9" style="box-shadow: 0 0 10px 0 rgba(0,24,128,0.1); margin-top: 10px">
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
									<label>Title</label>
									<input type="text" name="title" class="form-control" value="{{ $data->title }}" placeholder="Your Title">
								</div>

								<div class="form-group">
									<label>Company</label>
									<input type="text" name="company" class="form-control" value="{{ $data->company }}" placeholder="Your Company">
								</div>

								<div class="form-group">
									<label for="province_id">Provinsi alamat</label>
									<select name="province_id" id="province_id">
										@foreach($provinces as $province)
											@php $select="" @endphp
											@if($data->id == $province->id)
												@php $select='selected="selected"' @endphp
											@endIf
											<option {{ $select }} value="{{ $province->id }}">{{ $province->name }}</option>
										@endForeach
									</select>
								</div>								

								<div class="form-group">
									<label for="regency_id">Kota / Kabupaten alamat</label>
									<select name="regency_id" id="regency_id">										
									</select>
								</div>

								<div class="form-group">
									<label>From Year</label>
									<select name="from_year" id="from_year">
										<option value="0">Silahkan Pilih</option>
										@for($a = date('Y'); $a > 1960; $a --)

											@php $select="" @endphp
											@if($data->from_year == $a)
												@php $select='selected="selected"' @endphp
											@endIf

											<option {{ $select }} value="{{ $a }}">{{ $a }}</option>
										@endFor
									</select> <br>
									<select name="from_month" id="from_month">
										@foreach($months as $key => $month)
											@php $select="" @endphp
											@if($data->from_month == $key)
												@php $select='selected="selected"' @endphp
											@endIf

											@if($key != 0)
												<option {{ $select }} value="{{ $key }}">{{ $month }}</option>
											@endIf
										@endForeach
									</select>
								</div>

								<div class="form-group" id="until" style="display: none;">
									<label>To Year</label>
									<select name="until_year" id="until_year">
										<option value="0">Silahkan Pilih</option>
										@for($a = date('Y'); $a > 1960; $a --)
											<option value="{{ $a }}">{{ $a }}</option>
										@endFor
									</select><br>
									<select name="until_month" id="until_month">
										@foreach($months as $key => $month)
											@if($key != 0)
												<option value="{{ $key }}">{{ $month }}</option>
											@endIf
										@endForeach
									</select>
								</div>

								<div class="form-group">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="currently" checked="checked" name="currently">
										<label class="custom-control-label" for="currently">Currently In here</label>
									</div>
								</div>

								<div class="form-group">
									<label>Description</label>
									<textarea name="description" id="description" class="form-control">{{ $data->description }}</textarea>
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
	$(function() {
    	$("#province_id").change(function(){
			$.ajax({
				type: "GET",
				url: '{{ URL::to("place/regencyAjax") }}/'+$(this).val(),
				dataType: 'json',
				success: function(data){
					$("#regency_id").html("");
					$("#district_id").html("");
					$.each( data.data, function( key, value ) {
						var type = "Kota";
						if(value.type == 1)
							var type = "Kabupaten";

							$('#regency_id').append($('<option>', {
        						value: value.id,
        						text: type+" "+value.name
      						}));
					});
					 $('#regency_id').selectpicker('refresh');
				}
			});
		});

		$("#currently").click(function(){
			if($(this).is(':checked'))
			      $("#until").hide();  // uncheck
			else
				$("#until").show();
			    
		});
	});
</script>

@endsection