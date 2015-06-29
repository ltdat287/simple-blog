@extends('layouts.master')

@section('head.title')
Tieu de cua bai viet
@stop

@section('body.content')
<div class="container">
    <div class="row">
        <div class="col-6-sm col-sm-offset-3">
            <a href="{{ route('article.index') }}" class="btn btn-link">
            <span class="glyphicon glyphicon-chevron-left"></span>
            Back to home
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <h2>{{ $article->title }}</h2>
            <p>{{ $article->content }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <a class="btn btn-info" href="{{ route('article.edit',$article->id) }}">Sửa bài viết</a>
            {!! Form::open([
                    'route' => ['article.destroy', $article->id],
                    'method' => 'DELETE',
                    'style' => 'display:inline'
                ])
            !!}
                <button class="btn btn-danger">{{{ trans('labels.destroy_article') }}}</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop
