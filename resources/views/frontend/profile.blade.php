@extends('frontend.main')
@section('frontend_content')
<!-- sidebar-page-container -->
<section class="sidebar-page-container blog-details sec-pad-2">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                @include('frontend.components.dashboard_sidebar')
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="blog-details-content">
                    <!-- Update Profile Start -->
                    <div class="news-block-one">
                        <div class="inner-box">
                            <div class="lower-content">
                                <h3>Update Profile</h3>
                                <form action="{{ route('user.updateProfile') }}" method="post" class="default-form" id="update-profile" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
										<label for="name" class="col-sm-3 col-form-label">Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $profileData['name'] ? $profileData['name'] : '' }}">
										</div>
									</div>
                                    <div class="row mb-3">
										<label for="address" class="col-sm-3 col-form-label">Address</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ $profileData['address'] ? $profileData['address'] : 'Tokyo, Japan' }}">
										</div>
									</div>
                                    <div class="row mb-3">
										<label for="phone" class="col-sm-3 col-form-label">Phone</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="phone" name="phone" placeholder="+81 000 0000 0000" value="{{ $profileData['phone'] ? $profileData['phone'] : '' }}">
										</div>
									</div>
                                    <div class="row mb-3">
										<label for="photo" class="col-sm-3 col-form-label">Profice Picture</label>
										<div class="col-sm-9">
											<input class="form-control" type="file" id="photo" name="photo">
										</div>
									</div>
                                    <div class="row mb-3">
										<label for="profilePic" class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<img id="profilePic" class="wd-100 rounded-circle" src="{{ $profileData['photo'] ? url('storage/upload/user_image/'.$profileData['photo']) : url('upload/user_image/user.png') }}" alt="profile">
										</div>
									</div>
                                    
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Update Profile </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Update Profile End -->
                    <!-- Update Cradentials Start -->
                    <div class="news-block-one">
                        <div class="inner-box">
                            <div class="lower-content">
                                <h3>Update Cradentials</h3>
                                
                                <form action="{{ route('user.updateCredentials') }}" method="post" class="default-form" id="update-cradentials">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" disabled value="{{ $profileData['email'] ? $profileData['email'] : '' }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="current_password" class="col-sm-3 col-form-label">Current Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" placeholder="Current Password" value="">
                                            @error('current_password') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="new_password" class="col-sm-3 col-form-label">New Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password" placeholder="New Password" value="">
                                            @error('new_password') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="c_n_password" class="col-sm-3 col-form-label">Confirm New Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="c_n_password" name="new_password_confirmation" placeholder="New Confirm password" value="">
                                        </div>
                                    </div>
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Update Cradentials </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Update Cradentials End -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- sidebar-page-container -->
@endsection

@section('frontend_js')
    @parent
        <script type="text/javascript">
            $(document).ready(function(){
                $('#photo').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                    $('#profilePic').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });

                if($('#update-profile').length){
                    $('#update-profile').validate({
                        rules: {
                            name: {
                                required: true
                            }
                        }
                    });
                };

                if($('#update-cradentials').length){
                    $('#update-cradentials').validate({
                        rules: {
                            email: {
                                required: true,
                                email: true
                            },
                            current_password: {
                                required: true,
                                minlength:8
                            },
                            new_password: {
                                required: true,
                                minlength:8
                            },
                            new_password_confirmation: {
                                required: true,
                                minlength:8,
                                equalTo:'#new_password'
                            }
                        }
                    });
                }
            })
        </script>
@endsection