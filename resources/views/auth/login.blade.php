@extends('frontend.main')
@section('frontend_content')
<!-- ragister-section -->
<section class="ragister-section centred sec-pad">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-xl-8 col-lg-12 col-md-12 offset-xl-2 big-column">
                <div class="sec-title">
                    <h5>Sign in</h5>
                    <h2>Sign In With Realshed</h2>
                </div>
                <div class="tabs-box">
                    <div class="tabs-content">
                        <div class="tab active-tab" id="tab-1">
                            <div class="inner-box">
                                <!-- <h4>Sign in</h4> -->
                                <form action="{{ route('login') }}" method="post" class="default-form" id="login-form">
                                    @csrf
                                    <div class="form-group">
                                        <label>Email/Username/Phone</label>
                                        <input type="text" name="login" required="">
                                        @if ($errors->has('login')) <span class="text-danger">{{ $errors->first('login') }}</span> @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" required="">
                                        @if ($errors->has('password')) <span class="text-danger">{{ $errors->first('password') }}</span> @endif
                                    </div>
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Login</button>
                                    </div>
                                </form>
                                <div class="othre-text">
                                    <p>Have not any account? <a href="{{ route('register') }}">Register Now</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ragister-section end -->


<!-- subscribe-section -->
<section class="subscribe-section bg-color-3">
    <div class="pattern-layer" style="background-image: url(frontend/assets/images/shape/shape-2.png);"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                <div class="text">
                    <span>Subscribe</span>
                    <h2>Sign Up To Our Newsletter To Get The Latest News And Offers.</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-column">
                <div class="form-inner">
                    <form action="contact.html" method="post" class="subscribe-form">
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Enter your email" required="">
                            <button type="submit">Subscribe Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- subscribe-section end -->
@endsection

@section('frontend_js')
    @parent
      <script type="text/javascript">
        $(document).ready(function(){
            if($('#login-form').length){
                $('#login-form').validate({
                    rules: {
                        login: {
                            required: true
                        },
                        password: {
                            required: true,
                            minlength:8
                        }
                    }
                });
            }
        })
      </script>
@endsection