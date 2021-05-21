@extends('layouts.login_main')
@section('content')
<body class="content-wrapper" >
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">確認</h3>
            </div>
            <div class="card-body">
                <div class= "form-group">
                {{ Form::label('name', '名前：') }}
                {{$inquiry->name}}
                </div>
                <div class= "form-group">
                {{ Form::label('hobby', '趣味:') }}
                @foreach($inquiry->hobby as $k => $v)
                {{config('const.form.hobby')[$v]}}
                @endforeach
                </div>
                <div class= "form-group">
                {{ Form::label('food', '食べ物：') }}
                {{ config('const.form.food')[$inquiry->food]}}
                </div>
                    <div class= "form-group">
                {{ Form::label('area', 'お住まいの地域：') }}
                {{ config('const.form.area')[$inquiry->area]}}
                </div>
                <div class= "form-group">
                    {{ Form::label('login', 'ID：') }}
                    {{$inquiry->login}}
                </div>
                <div class= "form-group">
                    {{ Form::label('password', 'パスワード：') }}
                    {{$inquiry->password}}
                </div>
            </div>
            
            <div class="card-footer">
                {{-- inputへ値をpost --}}
                {{Form::model($inquiry,['url'=> Config('app.url').'/contact/input']) }}
                    {{Form::hidden('name', $inquiry['name'])}}
                    @foreach($inquiry['hobby'] as $k => $v)
                    {{Form::hidden('hobby[]', $v)}}
                    @endforeach
                    {{Form::hidden('food', $inquiry['food'])}}
                    {{Form::hidden('area', $inquiry['area'])}}
                    {{Form::hidden('login', $inquiry['login_id'])}}
                    {{Form::submit('戻る', ['class'=>'back btn btn-primary float-left'])}}
                {{ Form::close() }}
                    
                {{-- completeへ値をpost --}}
                {{Form::model($inquiry,['url'=> Config('app.url').'/contact/complete']) }}
                    {{Form::hidden('name', $inquiry['name'])}}
                    @foreach($inquiry['hobby'] as $k => $v)
                    {{Form::hidden('hobby[]', $v)}}
                    @endforeach
                    {{Form::hidden('food', $inquiry['food'])}}
                    {{Form::hidden('area', $inquiry['area'])}}
                    {{Form::hidden('login', $inquiry['login'])}}
                    {{Form::hidden('password', $inquiry['password'])}}
                    {{Form::submit('送信', ['class'=>'submit btn btn-primary float-right'])}}
                {{ Form::close() }}
            </div>
            
        </div>
    </div>
@endsection