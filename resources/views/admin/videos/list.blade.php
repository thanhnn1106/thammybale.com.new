@extends('admin.layout')

@section('content')

<article class="content responsive-tables-page">
    @include('admin.flashMessage')
    <div class="title-block">
        <h1 class="title"> Danh sách video <a href="{{ route('manage_video_add') }}" class="btn btn-primary btn-sm rounded-s"> Thêm mới </a></h1>
        <p class="title-description">  </p>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <section class="example">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#No</th>
                                            <th>Tên</th>
                                            <th>Slug</th>
                                            <th>Thumbnail</th>
                                            <th>URL</th>
                                            <th>Mô tả</th>
                                            <th>Ngày tạo</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0 ?>
                                        @foreach ($videoList as $item)
                                        <tr class="member_{{ $item->id }} memberRow">
                                            <td class="stt">{{ ++$i }}</td>
                                            <td class="company_id">{{ $item->title }}</td>
                                            <td class="full_name">{{ $item->slug }}</td>
                                            <td class="email" style="word-break: break-all; word-wrap: break-word;">
                                                <img style="width: 100px; height: auto;" src="{{ $item->thumbnail }}" />
                                            </td>
                                            <td class="birthday" style="word-break: break-all; word-wrap: break-word;">
                                                {{ $item->content }}
                                            </td>
                                            <td class="gender">{{ $item->description }}</td>
                                            <td class="gender">{{ $item->created_at }}</td>
                                            <td>
                                                <button data-id="{{ $item->id }}" type="button" class="btnDelete btn btn-warning">Delete</button>
                                                <a href="{{ route('manage_video_edit', ['videoId' => $item->id]) }}" type="button" class="btnEdit btn btn-info">Edit</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="pull-right">
                                {{ $videoList->links('vendor.pagination.bootstrap-4') }}
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>

@include('admin.videos.delete')

</article>

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('body').on('click', '.btnDelete', function() {
            var id = $(this).data('id');
            $('#btnDelete').attr('data-id', id);
            $('#deleteVideoModal').modal('show');
        });
        $('body').on('click', '#btnDelete', function() {
            var videoId = $(this).attr('data-id');
            var _token = $('#deleteVideoModal #_token').val();
            $.ajax({
                type: "POST",
                url: "{{ route('manage_video_delete') }}",
                data: {
                    videoId: videoId,
                    _token: _token,
                },
                success: function(res) {
                    window.location.reload();
                }
            });
            return false;
        });
    });
</script>
@endsection

@endsection
