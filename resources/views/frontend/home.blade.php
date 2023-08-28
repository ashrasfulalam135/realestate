@extends('frontend.main')
@section('frontend_content')
<!-- banner-section -->
@include('frontend.home_sections.banner')
<!-- banner-section end -->

<!-- category-section -->
@include('frontend.home_sections.category')
<!-- category-section end -->

<!-- feature-section -->
@include('frontend.home_sections.feature')
<!-- feature-section end -->

<!-- video-section -->
@include('frontend.home_sections.video')
<!-- video-section end -->

<!-- deals-section -->
@include('frontend.home_sections.deals')
<!-- deals-section end -->

<!-- testimonial-section end -->
@include('frontend.home_sections.testimonial')
<!-- testimonial-section end -->

<!-- chooseus-section -->
@include('frontend.home_sections.chooseus')
<!-- chooseus-section end -->

<!-- place-section -->
@include('frontend.home_sections.place')
<!-- place-section end -->

<!-- team-section -->
@include('frontend.home_sections.team')
<!-- team-section end -->

<!-- cta-section -->
@include('frontend.home_sections.cta')
<!-- cta-section end -->

<!-- news-section -->
@include('frontend.home_sections.news')
<!-- news-section end -->

<!-- download-section -->
@include('frontend.home_sections.download')
<!-- download-section end -->

@endsection