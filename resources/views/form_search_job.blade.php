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

    .btn-group bootstrap-select{
        display: none;
    }

    .select2-container--default .select2-selection--single{
        border-radius: 0;
        background-color: transparent;
        border-width: 0 0 2px 0;
        border-color: #2e55fa;
    }

    .select2-container--default .select2-selection--single .select2-selection__placeholder{
        color: black;
    }

    .select2-container .select2-selection--single .select2-selection__rendered{
        padding-top: 5px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered{
        height: 50px;
    }

    .select2-container .select2-selection--single{
        height: 50px;
    }

    ..select2-container--default .select2-selection--single .select2-selection__arrow{
        top: 5px;
    }
</style>

<!-- Section Banner -->
<div class="dez-bnr-inr dez-bnr-inr-md" style="background-image:url({{ asset('images/main-slider/slide2.jpg')}} );">
    <div class="container">
        <div class="dez-bnr-inr-entry align-m ">
            <div class="find-job-bx">
                <h3>Rekrut Pekerja untuk segala kebutuhan anda</h3>
                <form class="dezPlaceAni" action="{{ URL('search/people/job') }}" method="GET">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="form-group">
                                <select name="keyword" id="jobs_name"></select>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-6">
                            <div class="form-group">
                                <select name="region" id="region"></select>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <button type="submit" class="site-button btn-block">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Section Banner END -->
@section('js')
<script type="text/javascript">
    $(function() {
        $('#jobs_name').select2({
            placeholder: "Ketik Nama Pekerjaan",
            minimumInputLength: 1,
            multiple: false,
            width: 400,
            ajax: {
                url: "{{ URL::to('profesion/title') }}",
                data: function (params) {
                    var query = {
                        text: params.term
                    }

                    return query;
                },
                processResults: function(data, page) {
                    return { results: data };
                },
            }
        });

        $('#region').select2({
            placeholder: "Ketik kota, provinsi atau daerah",
            minimumInputLength: 1,
            multiple: false,
            width: 400,
            ajax: {
                url: "{{ URL::to('location/region') }}",
                data: function (params) {
                    var query = {
                        text: params.term
                    }

                    return query;
                },
                processResults: function(data, page) {
                    return { results: data };
                },
            }
        });

        $(".show_hidden").click(function(){
            let id = $(this).data('id');
            if ($(this).is(":checked"))
                $("#show_hidden_"+id).val('on');
            else
                $("#show_hidden_"+id).val('off');
        });       
    });
</script>

@endsection