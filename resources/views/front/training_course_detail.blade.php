@extends('front.layout')

@section('content')
<!-- wrapper -->
@if(empty($courseDetail))
<h1>Không tìm thấy dữ liệu.</h1>
@else
<div class="space-medium">
    <div class="container">
        <div class="row">
            <div class="section-title text-center">
                <h1>{{ $courseDetail->name_vn }}</h1>
            </div>
        </div>
        <div class="row">
            <p>{{ $courseDetail->description }}</p>
            <p>Thời gian: {{ $courseDetail->duration }}</p>
            <p>{!! $courseDetail->details !!}</p>
            <img src="{{ asset($courseDetail->image1) }}" />
            <img src="{{ asset($courseDetail->image2) }}" />
            <img src="{{ asset($courseDetail->image3) }}" />
            <img src="{{ asset($courseDetail->image4) }}" />
            <img src="{{ asset($courseDetail->image5) }}" />
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <a href="#" class="imghover"><img src="images/service-single.jpg" alt="" class="img-responsive"></a>
            </div>
        </div>
    </div>
</div>
@endif
<!-- close container -->
@endsection
