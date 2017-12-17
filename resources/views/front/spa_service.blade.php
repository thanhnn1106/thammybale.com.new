@extends('front.layout')

@section('content')

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<!-- wrapper -->
<style type="text/css">
    .responstable {
        margin: 1em 0;
        width: 100%;
        overflow: hidden;
        background: #FFF;
        color: #024457;
        border-radius: 10px;
        border: 1px solid #167F92;
    }
    .responstable tr {
        border: 1px solid #D9E4E6;
    }
    .responstable tr:nth-child(odd) {
        background-color: #EAF3F3;
    }
    .responstable th {
        display: none;
        border: 1px solid #FFF;
        background-color: #167F92;
        color: #FFF;
        padding: 1em;
    }
    .responstable th:first-child {
        display: table-cell;
        text-align: center;
    }
    .responstable th:nth-child(2) {
        display: table-cell;
    }
    .responstable th:nth-child(2) span {
        display: none;
    }
    .responstable th:nth-child(2):after {
        content: attr(data-th);
    }
    @media (min-width: 480px) {
        .responstable th:nth-child(2) span {
            display: block;
        }
        .responstable th:nth-child(2):after {
            display: none;
        }
    }
    .responstable td {
        display: block;
        word-wrap: break-word;
        max-width: 7em;
    }
    .responstable td:first-child {
        display: table-cell;
        text-align: center;
        border-right: 1px solid #D9E4E6;
    }
    @media (min-width: 480px) {
        .responstable td {
            border: 1px solid #D9E4E6;
        }
    }
    .responstable th, .responstable td {
        text-align: left;
        margin: .5em 1em;
    }
    @media (min-width: 480px) {
        .responstable th, .responstable td {
            display: table-cell;
            padding: 1em;
        }
    }

</style>
<div class="">
    <div class="container">
        <div class="row">
            <div class="section-title text-center">
                <h1>Bảng giá dịch vụ</h1>
                <ul class="nav nav-tabs col-md-12" style="margin-left: 0px;">
                    <?php $j = 0; ?>
                    @foreach ($menuList as $item)
                    <li class="<?php if ($j == 0) {
                        echo "active";
                        $j++;
                    } ?>"><a data-toggle="tab" href="#menu_{{ $item->id }}">{{ $item->menu_name_en }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="tab-content">
                <?php $i = 0; ?>
                @foreach ($menuList as $item)
                <div id="menu_{{ $item->id }}" class="tab-pane fade in 
                    <?php if ($i == 0) {
                        echo "active";
                        $i++;
                    } ?>">
                    <table class="responstable">
                        <tr>
                            <th><strong>Tên dịch vụ</strong></th>
                            <th><strong>Chi phí</strong></th>
                            <th><strong>Thời gian</strong></th>
                        </tr>
                        @foreach ($serviceList as $sl)
                            @if ($item->id == $sl->menu_id)
                            <tr>
                                <td style="text-align: left;"><strong>{{ $sl->service_name_vn }}</strong></td>
                                <td><strong>Liên hệ</strong></td>
                                <td><strong>{{ $sl->duration }}</strong></td>
                            </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- close container -->
@endsection
