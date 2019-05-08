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
                                <label>Ketik nama pekerjaan</label>
                                <div class="autocomplete" >
                                    <input id="title-1" type="text" data-id="1" name="keyword" autocomplete="off" class="form-control title">
                                    <div id="myInputautocomplete-list-1" class="autocomplete-items"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-6">
                            <div class="form-group">                                
                                <label>Ketik kota, provinsi atau daerah</label>
                                <div class="autocomplete" >
                                    <input id="title-0" type="text" data-id="0" name="region" autocomplete="off" class="form-control title">
                                    <div id="myInputautocomplete-list-0" class="autocomplete-items"></div>
                                </div>
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
    function change_value(value, id)
    {
        $("#title-"+id).val(value);
        $("#myInputautocomplete-list-"+id).html("");
        $("#primary-title-"+id).val(value);
        
    }

    function capitalize(s)
    {
        return s && s[0].toUpperCase() + s.slice(1);
    }

    $(function() {
        $("#myInputautocomplete-list").html("");
        $(".title").keyup(function(){
            let text = $(this).val();
            let id = $(this).data('id');
            var url = "";
            
            if(id == "1")
            {
                url = "{{ URL::to('profesion/title') }}";
            }
            else{
                url = "{{ URL::to('location/region') }}";
            }

            $("#primary-title-"+id).val(text);
            if(text.length == 0)
            {
                $("#myInputautocomplete-list-"+id).html("");
            } else {
                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: 'json',
                    data: {
                        text : text
                    },
                    success: function(data){
                        $("#myInputautocomplete-list-"+id).html("");
                        $.each(data , function(index, val) { 
                            let temp = '<div class="autocomplete-value" onclick="change_value(\''+capitalize(val.name)+'\', '+id+')">'+capitalize(val.name)+'</div>';
                            $("#myInputautocomplete-list-"+id).append(temp);
                        });
                    }
                });
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