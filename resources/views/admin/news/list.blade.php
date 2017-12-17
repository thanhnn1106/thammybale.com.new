@extends('admin.layout')

@section('content')

<article class="content responsive-tables-page">
    @include('admin.flashMessage')
    <div class="title-block">
        <h1 class="title"> Danh sách tin tức <a href="{{ route('manage_news_add') }}" class="btn btn-primary btn-sm rounded-s"> Thêm mới </a></h1>
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
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Hình đại diện</th>
                                            <th>Tác giả</th>
                                            <th>Ngày đăng</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0 ?>
                                        @foreach ($newList as $item)
                                        <tr class="member_{{ $item->id }} memberRow">
                                            <td class="stt">{{ ++$i }}</td>
                                            <td class="company_id">{{ $item->title }}</td>
                                            <td class="full_name">{{ $item->slug }}</td>
                                            <td class="email" style="word-break: break-all; word-wrap: break-word;">
                                                <img src="{{ $item->thumbnail }}" style="width: 100px; height: auto;" />
                                            </td>
                                            <td class="birthday">{{ $item->author }}</td>
                                            <td class="role">{{ $item->created_at }}</td>
                                            <td>
                                                <button data-id="{{ $item->id }}" type="button" class="btnDelete btn btn-warning">Delete</button>
                                                <a href="{{ route('manage_news_edit', ['newId' => $item->id]) }}" type="button" class="btnEdit btn btn-info">Edit</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="pull-right">
                                {{ $newList->links('vendor.pagination.bootstrap-4') }}
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>

@include('admin.news.delete')

</article>

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('body').on('click', '.btnDelete', function() {
            var id = $(this).data('id');
            $('#btnDelete').attr('data-id', id);
            $('#deleteNewsModal').modal('show');
        });
        $('body').on('click', '#btnDelete', function() {
            var newsId = $(this).attr('data-id');
            var _token = $('#deleteNewsModal #_token').val();
            $.ajax({
                type: "POST",
                url: "{{ route('manage_news_delete') }}",
                data: {
                    newsId: newsId,
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
