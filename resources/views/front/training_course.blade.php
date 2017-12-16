@extends('front.layout')

@section('content')
<div class="space-medium">
    <div class="container">
        <div class="row">
            <div class="section-title text-center">
                <h1 class="logo">CÁC KHOÁ ĐÀO TẠO</h1>
            </div>
        </div>
        <div class="row">
            @foreach ($courseList as $item)
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="treatment-block mb30">
                    <!-- treatment block -->
                    <div class="treatment-img">
                        <!-- treatment img -->
                        <a href="/cac-khoa-hoc/{{ $item->name_slug }}" class="imghover"><img src="{{ $item->image_course }}" class="img-responsive" alt=""></a>
                    </div>
                    <!-- /.treatment img -->
                    <div class="treatment-content">
                        <!-- treatment content -->
                        <h2><a href="/cac-khoa-hoc/{{ $item->name_slug }}">{{ $item->name_vn }}</a></h2>
                        <div>{{ $item->description }}</div>
                        <a href="/cac-khoa-hoc/{{ $item->name_slug }}" class="btn-link"> View More Details</a>
                    </div>
                    <!-- /.treatment content -->
                </div>
                <!-- /.treatment block -->
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- close container -->
@endsection
