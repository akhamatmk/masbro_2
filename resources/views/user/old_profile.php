<!-- contact area -->
<div class="container emp-profile">
            <form method="post">
                <div class="row" style="float: right; margin-top: 30px">
                    <a style="    width: 150px;
    color: white;
    height: 30px; margin-right: 20px; margin-bottom: 10px" href="{{ url('profile/user/edit') }}" class="btn btn-primary profile-edit-btn float-right" style="">Edit Profile</a>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('images/profile-picture-user/'.$user->profile_image) }}">
                    </div>
                    <div class="col-md-8">
                        <div class="profile-head">
                                    
                                    <h5>
                                        {{ ucwords($user->name) }}
                                    </h5>
                                    <h6>
                                        {{ $user->profession }}
                                    </h6>
                                    <!-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Detail</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="study-tab" data-toggle="tab" href="#study" role="tab" aria-controls="study" aria-selected="false">Pendidikan</a>
                                </li>

                            </ul>
                        </div>

                         <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->userId }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->name }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->email }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->phone }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Profession</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->profession }}</p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <label>Your Bio</label><br/>
                                <p>{{ $user->bio }}</p>
                            </div>

                            <div class="tab-pane fade" id="study" role="tabpanel" aria-labelledby="study-tab">
                                <div class="row">
                                    <a class="btn btn-primary" href="{{ url("education/create") }}">Tambah Pendidikan</a>
                                </div>
                                <div class="row" style="margin-top: 10px">
                                    @foreach($educations as $education)
                                    <div class="card" style="width: 18rem; margin-top: 10px; margin-left: 10px">
                                      <div class="card-body">
                                        <h5 class="card-title"></h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $education->school }}</h6>
                                        <p class="card-text">{{ $education->degree }}, {{ $education->field_of_study }}</p>
                                        <a class="card-link">{{ $education->from }}</a>
                                        <a class="card-link">{{ $education->until }}</a>
                                      </div>
                                    </div>
                                    @endForeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-4">
                        <div class="profile-work">
                           <!--  <p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/> -->
                        </div>
                    </div>

                    <div class="col-md-8">
                       
                    </div>
                </div>

            </form>           
        </div>