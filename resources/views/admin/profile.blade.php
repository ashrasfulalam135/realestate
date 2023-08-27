@extends('admin.main')
@section('content')
<div class="page-content">
  <div class="row profile-body">
    <!-- left wrapper start -->
    <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
      <div class="card rounded">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-2">
            <div>
              <img class="wd-100 rounded-circle" src="{{ $profileData['photo'] ? url('storage/upload/user_image/'.$profileData['photo']) : url('upload/user_image/user.png') }}" alt="profile">
              <span class="h3 ms-3">{{ $profileData['name'] }}</span>
            </div>
          </div>
          <p>Hi! I'm {{ $profileData['name'] }} the {{ $profileData['role'] }} at RealEstate</p>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Role:</label>
            <p class="text-muted">{{ $profileData['role'] }}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
            <p class="text-muted">November 15, 2015</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
            <p class="text-muted">{{ $profileData['address'] ? $profileData['address'] : 'Tokyo, Japan' }}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
            <p class="text-muted">{{ $profileData['email'] ? $profileData['email'] : 'info@abc.xyz'}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
            <p class="text-muted">{{ $profileData['phone'] ? $profileData['phone'] : '000-0000-0000' }}</p>
          </div>
        </div>
      </div>
    </div>
    <!-- left wrapper end -->
    <!-- right wrapper start -->
    <div class="col-md-8 col-xl-8 middle-wrapper">
      <!-- Edit profile start -->
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="edit_profile_tab" data-bs-toggle="tab" href="#edit_profile" role="tab" aria-controls="edit_profile" aria-selected="true">Edit Profile</a>
        </li>
      </ul>
      <div class="tab-content border border-top-0 border-bottom-15" id="myTabContent">
        <div class="tab-pane fade show active" id="edit_profile" role="tabpanel" aria-labelledby="edit_profile_tab">
          <div class="card">
							<div class="card-body">
								<!-- <h6 class="card-title">Inputs</h6> -->
								<form method="POST" action="{{ route('admin.updateProfile') }}" enctype="multipart/form-data">
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
									<button class="btn btn-primary" type="submit">Update</button>
								</form>
							</div>
						</div>
        </div>
      </div>
      <!-- Edit profile end -->
      <br>
      <!-- Change cradential start -->
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="change_cradential_tab" data-bs-toggle="tab" href="#change_cradential" role="tab" aria-controls="change_cradential" aria-selected="false">Change Cradentials</a>
        </li>
      </ul>
      <div class="tab-content border border-top-0" id="myTabContent">
        <div class="tab-pane fade show active" id="change_cradential" role="tabpanel" aria-labelledby="change_cradential_tab">
          <div class="card rounded">
            <div class="card-body">
              <form method="POST" action="{{ route('admin.updateCredentials') }}">
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
                <button class="btn btn-primary" type="submit">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Change cradential end -->
    </div>
    <!-- right wrapper end -->
  </div>
</div>
@endsection

@section('js')
    @parent
      <script type="text/javascript">
        $(document).ready(function(){
          $('#photo').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
              $('#profilePic').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
          })
        })
      </script>
@endsection