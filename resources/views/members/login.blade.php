@extends('layouts.master')

@section('head.title')
    Trang đăng nhập
@stop

@section('body.content')
    <div class="container">
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
        </div>
        <div class="col-sm-4 col-sm-offset-4">
            <form action="{{asset('login')}}" method="post" id="form_login">
                <div class="form-group">
                    <legend>Trang đăng nhập</legend>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <input type="text" name="username" id="username" placeholder="Username or Email" class="form-control"/>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control"/>
                </div>
                <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng nhập</button>
                </div>
            </form>
        </div>
    </div>


@endsection