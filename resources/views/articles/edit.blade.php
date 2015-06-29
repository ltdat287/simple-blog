@extends('layouts.master')

@section('head.title')
Chỉnh sửa bài viết
@stop

@section('body.content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <h1>Cập nhật nội dung bài viết</h1>
            <hr/>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops</strong> There were some problems with your <br/> <br/>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('article.update',$baiviet->id) }}" method="PUT" class="form-horizontal">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="form-group">
                    <label for="title" class="control-label">Tiêu đề bài viết</label>
                    <input type="text" class="form-control" name="title" id="title" required placeholder="Hãy điền tiêu đề bài viết" value="{{ $baiviet->title }}"/>
                </div>
                <div class="form-group">
                    <label for="title" class="control-label">Nội dung bài viết</label>
                    <input type="text" class="form-control" name="content" id="content" required placeholder="Hãy điền nội dung bài viết" value="{{ $baiviet->content }}"/>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop