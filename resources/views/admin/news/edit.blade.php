@extends('admin.layout')

@section('content')

<article class="content item-editor-page">
    @include('admin.flashMessage')
    <div class="subtitle-block">
        <h3 class="subtitle"> Cập nhật tin tức </h3>
    </div>
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-12">
                <div class="card card-block">
                    <form role="form" action="{{ route('manage_news_edit', ['newsId' => $newsInfo->id]) }}" id="form-news" method="post" enctype="multipart/form-data">
                        <div class="title-block">
                            <h3 class="title">
                                <button type="submit" class="btn btn-primary btn-sm rounded-s">
                                    Cập nhật
                                </button>
                            </h3>
                        </div>
                        <div class="form-group @if ($errors->has('title')) has-error @endif">
                            <label class="control-label" for="title">Tiêu đề</label>
                            <input type="text" class="form-control" id="title" name="title" required value="{{ !is_null(old('title')) ? old('title') : $newsInfo->title }}" />
                            @if ($errors->has('title'))
                                <span class="has-error">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('slug')) has-error @endif">
                            <label class="control-label" for="slug">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="" required value="{{ !is_null(old('slug')) ? old('slug') : $newsInfo->slug }}" />
                            @if ($errors->has('slug'))
                                <span class="has-error">{{ $errors->first('slug') }}</span>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('thumbnail')) has-error @endif">
                            <label class="control-label" for="thumbnail">Thumbnail</label>
                            <input type="text" class="form-control" id="thumbnail" name="thumbnail" required value="{{ !is_null(old('thumbnail')) ? old('thumbnail') : $newsInfo->thumbnail }}" />
                            @if ($errors->has('thumbnail'))
                                <span class="has-error">{{ $errors->first('thumbnail') }}</span>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('author')) has-error @endif">
                            <label class="control-label" for="author">Tác giả</label>
                            <input type="text" class="form-control" id="author" name="author" required value="{{ !is_null(old('author')) ? old('author') : $newsInfo->author }}" />
                            @if ($errors->has('author'))
                                <span class="has-error">{{ $errors->first('author') }}</span>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('content')) has-error @endif">
                            <label class="control-label" for="content">Nội dung</label>
                            <textarea type="text" class="form-control border-corner editor-content" id="content" name="content">{{ !is_null(old('content')) ? old('content') : $newsInfo->content }}</textarea>
                            @if ($errors->has('content'))
                            <span class="has-error">{{ $errors->first('content') }}</span>
                            @endif
                            <div class="title-block pull-right" style="margin-top: 20px">
                                <h3 class="title">
                                    <button type="submit" class="btn btn-primary btn-sm rounded-s">
                                        Cập nhật
                                    </button>
                                </h3>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </section>
</article>
@section('script')
<script type="text/javascript" src="{{ asset('admin/plugins/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        tinymce.init({
            selector: ".editor-content", 
            theme: "modern", 
            height: 400,
            // subfolder:"",
            // plugins: [ 
            // "advlist autolink link image lists charmap print preview hr anchor pagebreak", 
            // "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking", 
            // "table contextmenu directionality emoticons paste textcolor filemanager" 
            // ], 
            // image_advtab: true, 
            plugins: [
                 "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                 "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                 "template table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
            ],
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
            toolbar2: "template | forms | responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
            image_advtab: true,
            //toolbar: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect forecolor backcolor | link unlink anchor | responsivefilemanager | image media | print preview code",
            filemanager_crossdomain: true,
            external_filemanager_path:"/filemanager/",
            external_plugins: { "filemanager" : "/filemanager/plugin.min.js"},
            filemanager_title:"LCD Filemanager",
            
        });
    });
</script>
@endsection

@endsection
