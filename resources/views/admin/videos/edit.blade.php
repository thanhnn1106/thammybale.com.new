@extends('admin.layout')

@section('content')

<article class="content item-editor-page">
    @include('admin.flashMessage')
    <div class="subtitle-block">
        <h3 class="subtitle"> Thay đổi thông tin video </h3>
    </div>
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-12">
                <div class="card card-block">
                    <form role="form" action="{{ route('manage_video_edit', ['videoId' => $videoInfo->id]) }}" id="form-video" method="post" enctype="multipart/form-data">
                        <div class="title-block">
                            <h3 class="title">
                                <button type="submit" class="btn btn-primary btn-sm rounded-s">
                                    Cập nhật
                                </button>
                            </h3>
                        </div>
                        <div class="form-group @if ($errors->has('title')) has-error @endif">
                            <label class="control-label" for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required value="{{ !is_null(old('title')) ? old('title') : $videoInfo->title }}" />
                            @if ($errors->has('title'))
                                <span class="has-error">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('slug')) has-error @endif">
                            <label class="control-label" for="slug">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="" required value="{{ !is_null(old('slug')) ? old('slug') : $videoInfo->slug }}" />
                            @if ($errors->has('slug'))
                                <span class="has-error">{{ $errors->first('slug') }}</span>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('thumbnail')) has-error @endif">
                            <label class="control-label" for="thumbnail">Thumbnail</label>
                            <input type="text" class="form-control" id="thumbnail" name="thumbnail" required value="{{ !is_null(old('thumbnail')) ? old('thumbnail') : $videoInfo->thumbnail }}" />
                            @if ($errors->has('thumbnail'))
                                <span class="has-error">{{ $errors->first('thumbnail') }}</span>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('content')) has-error @endif">
                            <label class="control-label" for="content">URL</label>
                            <input type="text" class="form-control" id="url" name="content" required value="{{ !is_null(old('content')) ? old('content') : $videoInfo->content }}" />
                            @if ($errors->has('content'))
                                <span class="has-error">{{ $errors->first('content') }}</span>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('description')) has-error @endif">
                            <label class="control-label" for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" required value="{{ !is_null(old('description')) ? old('description') : $videoInfo->description }}" />
                            @if ($errors->has('description'))
                                <span class="has-error">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </section>
</article>
@section('script')
@endsection

@endsection
