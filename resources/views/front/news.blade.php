@extends('front.layout')

@section('content')
<!-- wrapper -->
<div class="space-medium">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="row">
                    @if (empty($newList))
                    <p>Không tìm thấy dữ liệu.</p>
                    @else
                    @foreach ($newList as $item)
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="post-holder mb40">
                            <div class="post-img mb30">
                                <a href="/tin-tuc/chi-tiet/{{ $item->slug }}" class="imghover">
                                    <img src="{{ $item->thumbnail }}" alt="" class="img-responsive">
                                </a>
                                <div class="sticky-box">
                                    <div class="post-sticky">
                                        <i class="fa fa-thumb-tack"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="post-header">
                                <div class="meta">
                                    <span class="meta-date">{{ $item->created_at }}</span>
                                    <span class="meta-comments"><a href="#" class="title">Lượt xem: </a>{{ $item->page_view }}</span>
                                    <span class="meta-category">
                                        <a href="#" class="title">{{ $item->menu_reference }}</a>
                                    </span>
                                    <span class="meta-user">by <a href="#">{{ $item->author }}</a> </span>
                                </div>
                                <h1><a href="/tin-tuc/chi-tiet/{{ $item->slug }}" class="title">{{ $item->title }}</a></h1>
                            </div>
                            <p>{!! str_limit($item->content, 500) !!}...</p>
                            <a href="/tin-tuc/chi-tiet/{{ $item->slug }}" class="btn btn-default">Chi tiết</a>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="sidebar">
                <!-- sidebar-area -->
                <div class=" widget widget-search">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Seacrh Here">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                            </span> </div>
                    </form>
                </div>
                <div class=" widget widget-categories">
                    <h2 class="widget-title">Tin tức nổi bật</h2>
                    <ul class="listnone bullet bullet-arrow-default">
                        <li><a href="#" class="title"> Gynaecology </a><span><strong> (10) </strong></span></li>
                        <li><a href="#" class="title"> Obstetrics </a><span><strong> (15) </strong></span></li>
                        <li><a href="#" class="title"> Infertility </a><span><strong> (20) </strong></span></li>
                    </ul>
                </div>
                <!-- /.widget well bg -->
            </div>
            <!-- /.sidebar-area -->
        </div>
    </div>
</div>
<!-- close container -->
@endsection
