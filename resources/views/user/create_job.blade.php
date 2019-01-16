@extends('layout.app')
@section('title', 'Login Page Masbro')
@section('content')

<style type="text/css">
	.section-full:last-child {
	    margin-bottom: 0px;
	}
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('css/googlemap.css')}}">
	<!-- contact area -->
        <div class="content-block">
			<!-- Submit Resume -->
			<div class="section-full submit-resume content-inner-2" style="padding-top: 35px; padding-bottom: 20px;">
				<div class="container">
					<div class="row">
						<div class="col-md-7 col-lg-9" style="box-shadow: 0 0 10px 0 rgba(0,24,128,0.1); background: #ffff">
							 @if(Session::has('message-succes'))
		                        <div class="alert alert-success" style="margin: 10px">
		                             <ul>                                
		                                 <li>{{ Session::get('message-succes') }}</li>
		                             </ul>
		                         </div>
		                     @endif
							<form method="POST" style="margin-top: 10px" enctype="multipart/form-data">
								@csrf
								<div class="form-group">
									<label>Title Job</label>
									<input type="text" name="title" class="form-control" placeholder="Your Title Job">
								</div>

								<div class="form-group">
									<label for="category_panret_job_id">Category Pekerjaan</label>
									<select name="category_panret_job_id" id="category_panret_job_id">
										<option value="0">Silahkan Pilih Parent Category</option>
										@foreach($categoryParents as $categoryParent)
											<option value="{{ $categoryParent->id }}">{{ $categoryParent->name }}</option>
										@endForeach
									</select> <br><br>
									
									<select name="category_job_id" id="category_job_id">										
									</select>
								</div>

								<div class="form-group">
									<label for="type_jobs">Type Pekerjaan</label>
									<select name="type_jobs" id="type_jobs">
										@foreach($types as $key => $type)
											<option value="{{ $key }}">{{ $type }}</option>
										@endForeach
									</select>
								</div>

								<div class="form-group">
									<label>Deskripsi Pekerjaan</label>
									<textarea name="job_description" id="job_description" class="form-control" placeholder="Deskripsi Pekerjaan"></textarea>
								</div>

								<div class="form-group">
									<label>How To Apply</label>
									<textarea name="how_to_apply" id="how_to_apply" class="form-control" placeholder="Cara Melamar"></textarea>
								</div>

								<div class="form-group">
									<label>Requirements</label>
									<textarea name="job_requirements" id="job_requirements" class="form-control" placeholder="Requirements"></textarea>
								</div>

								<div class="form-group">
									<label>Salary</label>
									<input type="text" name="sallary" class="form-control" placeholder="Ex 12.000.000">
								</div>

								<div class="form-group">
									<label>Type Salary</label>
									<select name="type_payment" id="type_payment">
										<option value='1'>Bulanan</option>
										<option value='2'>Mingguan</option>
										<option value='3'>Harian</option>
									</select>
								</div>

								<div class="form-group">
									<label>Experience</label>
									<input type="text" name="experience" id="experience" class="form-control" placeholder="Ex Freshgraduate Welcome">
								</div>

								<div class="form-group">
									<label>Batas Akhir Pendaftaram</label>
									<input type="text" name="deadline_jobs" class="form-control col-md-4" id="deadline_jobs" autocomplete="off">
								</div>

								<div class="form-group">
									<label for="province_id">Provinsi alamat</label>
									<select name="province_id" id="province_id">
										<option value="0">Silahkan Pilih</option>
										@foreach($provinces as $province)
											<option value="{{ $province->id }}">{{ $province->name }}</option>
										@endForeach
									</select>
								</div>								

								<div class="form-group">
									<label for="regency_id">Kota / Kabupaten alamat</label>
									<select name="regency_id" id="regency_id">
										<option value="0">Silahkan Pilih</option>
									</select>
								</div>

								<div class="form-group">
									<label>Detail Alamat</label>
									<textarea name="addreess" id="addreess" class="form-control" placeholder="Alamat"></textarea>
								</div>

								<div class="form-group">
									<label>Maps</label><br/><br/>
									<input id="pac-input" class="controls" type="text" placeholder="Search Box" style="left : 0; width: 70%; margin-top: 7px;">
                      				<div id="mapGoogle" style="osition: relative; overflow: hidden; height: 300px; margin-top: -30px; z-index: 0;"></div>
                      				<input type="hidden" name="long" id="long">
                      				<input type="hidden" name="lat" id="lat">
								</div>

								<button type="submit" class="site-button" style="margin-bottom: 10px;">Submit</button>
							</form>
						</div>						
					</div>
				</div>
			</div>
            <!-- Submit Resume END -->
		</div>
    </div>
    <!-- Content END-->


@endsection

@section('js')

<script type="text/javascript">
        var marker;
        var map;
        var longitude = 106.7883531;
        var latitude = -6.2440165;
        
        function initMap() {
          map = new google.maps.Map(document.getElementById('mapGoogle'), {
            zoom: 17,
            center: {lat: latitude, lng: longitude}
          });          	

          marker = new google.maps.Marker({
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            position: {lat: latitude, lng: longitude}
          });

          marker.addListener('click', toggleBounce);
  
            // Create the search box and link it to the UI element.
          var input = document.getElementById('pac-input');
          var searchBox = new google.maps.places.Autocomplete(input);

          searchBox.setComponentRestrictions(
            {'country': ['id']});

          map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            
        // Bias the SearchBox results towards current map's viewport.
          map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
          });

          searchBox.addListener('place_changed', function() {

          marker.setVisible(false);
          var place = searchBox.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);
          placeMarker(map.center);
        });


            google.maps.event.addListener(map, 'click', function(event) {
              placeMarker(event.latLng);
              setLongLat();
          });

          function placeMarker(location) {
              marker.setPosition(location);
              //map.setCenter(location);
              map.setZoom(17);
              setLongLat();
          }

          setLongLat();
        }

        function setLongLat()
        {
            document.getElementById('long').value= map.getCenter().lng();
            document.getElementById('lat').value= map.getCenter().lat();
        }
  
        function toggleBounce() {
          if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
          } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
          }
        }    
</script>
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDR7DFQIBGumoziD6B6a0n2EZgrKhQOWS4&callback=initMap&libraries=places"></script>

<script type="text/javascript">
	$(function() {
		
		$('#deadline_jobs').datepicker({ dateFormat: 'yy-mm-dd' });

		$("#category_panret_job_id ").change(function(){
			$.ajax({
				type: "GET",
				url: '{{ URL::to("category/job/child") }}/'+$(this).val(),
				dataType: 'json',
				success: function(data){
					$("#category_job_id").html("");
					$.each( data, function( key, value ) {
							$('#category_job_id').append($('<option>', {
        						value: value.id,
        						text: value.name
      						}));
					});
					
					$('#category_job_id').selectpicker('refresh');
				}
			});
		});

    	$("#province_id").change(function(){
			$.ajax({
				type: "GET",
				url: '{{ URL::to("place/regencyAjax") }}/'+$(this).val(),
				dataType: 'json',
				success: function(data){
					$("#regency_id").html("");
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
	});
</script>

@endsection