@extends('admin.layout')

@section('content')

<article class="content item-editor-page">
    @include('admin.flashMessage')
    <div class="subtitle-block">
        <h3 class="subtitle"> Thêm video mới </h3>
    </div>
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-12">
                <div class="card card-block">
                    <form role="form" action="{{ route('manage_video_add') }}" id="form-player" method="post" enctype="multipart/form-data">
                        <div class="title-block">
                            <h3 class="title">
                                <button type="submit" class="btn btn-primary btn-sm rounded-s">
                                    Thêm mới
                                </button>
                            </h3>
                        </div>
                        <div class="form-group @if ($errors->has('title')) has-error @endif">
                            <label class="control-label" for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required value="{{ old('title') }}" />
                            @if ($errors->has('title'))
                                <span class="has-error">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('slug')) has-error @endif">
                            <label class="control-label" for="slug">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="" required value="{{ old('slug') }}" />
                            @if ($errors->has('slug'))
                                <span class="has-error">{{ $errors->first('slug') }}</span>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('thumbnail')) has-error @endif">
                            <label class="control-label" for="thumbnail">Thumbnail</label>
                            <input type="text" class="form-control" id="thumbnail" name="thumbnail" required value="{{ old('thumbnail') }}" />
                            @if ($errors->has('thumbnail'))
                                <span class="has-error">{{ $errors->first('thumbnail') }}</span>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('content')) has-error @endif">
                            <label class="control-label" for="content">URL</label>
                            <input type="text" class="form-control" id="content" name="content" required value="{{ old('content') }}" />
                            @if ($errors->has('content'))
                                <span class="has-error">{{ $errors->first('content') }}</span>
                            @endif
                        </div>
                        <div class="form-group @if ($errors->has('description')) has-error @endif">
                            <label class="control-label" for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" required value="{{ old('description') }}" />
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
