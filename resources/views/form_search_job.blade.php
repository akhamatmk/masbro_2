<!-- Section Banner -->
<div class="dez-bnr-inr dez-bnr-inr-md" style="background-image:url({{ asset('images/main-slider/slide2.jpg')}} );">
    <div class="container">
        <div class="dez-bnr-inr-entry align-m ">
            <div class="find-job-bx">
                <p class="site-button button-sm">Find Jobs, Employment & Career Opportunities</p>
                <h2>Search Between More Them <br/> <span class="text-primary">50,000</span> Open Jobs.</h2>
                <form class="dezPlaceAni" action="{{ URL('job/all') }}" method="GET">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label>Job Title, Keywords, or Phrase</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="keyword" placeholder="">
                                    <div class="input-group-append">
                                      <span class="input-group-text"><i class="fa fa-search"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <select name="province">
                                    <option value="all">Semua daerah</option>
                                    @foreach($provinces as $province)
                                       <option value="{{ $province->name }}">{{ $province->name }}</option>
                                    @endForeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <select name="category">
                                    <option value="all">Semua Category Pekerjaan</option>
                                    @foreach($categorys as $category)
                                       <option value="{{$category->name}}">{{ $category->name }}</option>
                                    @endForeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <button type="submit" class="site-button btn-block">Find Job</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Section Banner END -->