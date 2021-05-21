@extends('layouts.login_main')
 @section('content')
<body class="content-wrapper" >
     
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">お問合わせフォーム</h3>
            </div>


            {{Form::model($inquiry,['url'=> Config('app.url').'/contact/confirm']) }}
           
                <div class="card-body">
                    <div class= "form-group">
                        {{ Form::label('name', '名前：') }}
                        <span class="error">@error('name') <p>{{ $message }}</p>@enderror</span>
                        {{ Form::text('name', null, ['placeholder'=>'名前を入力']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('hobby', '趣味') }}
                        <span class="error">@error('hobby')<p>{{ $message }}</p>@enderror</span>
                        @foreach (config('const.form.hobby') as $key => $value)
                            {{-- 通常(get) --}}
                            @if(!$inquiry->getHobbys())
                            {{Form::checkbox('hobby[]', $key,false,['id'=>'hobby'])}}{{ $value }}
                            @endif
                            {{-- リクエストがあったとき --}}
                            @if($inquiry->getHobbys())
                                @foreach($inquiry->getHobbys() as $hobby_key => $hobby_model)
                                    @if($hobby_model->hobby == $key)
                                        {{Form::checkbox('hobby[]', $key,true,['id'=>'hobby'])}}{{ $value }}
                                        @break
                                    @endif
                                    {{-- なかったとき --}}
                                    @if($loop->last)
                                        {{Form::checkbox('hobby[]', $key,false,['id'=>'hobby'])}}{{ $value }}
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group">
                        {{ Form::label('food', '食べ物') }}
                        <span class="error">@error('food')<p>{{ $message }}</p>@enderror</span>
                        @foreach (config('const.form.food') as $key => $value)
                        {{Form::radio('food', $key,) }}{{ $value }}
                        @endforeach
                    </div>
                    <div class="form-group">
                        {{ Form::label('area', 'お住まいの地域') }}
                        <span class="error">@error('area')<p>{{ $message }}</p>@enderror</span>
                        {{ Form::select('area', [null=>'選択してください']+config('const.form.area')),null}}
                    </div>
                    <div class="form-group">
                        <p>ID（半角英数字のみ）</p>
                        <span class="error">@error('login')<p>{{ $message }}</p>@enderror</span>
                        {{ Form::text('login', null) }}
                    </div>
                    <div class="form-group">
                        <p>パスワード</p>
                        <span class="error">@error('password')<p>{{ $message }}</p>@enderror</span>
                        {{ Form::password('password', null) }}
                    </div>
                    <div class="form-group">
                        <p>パスワード再入力</p>
                        {{ Form::password('password_confirmation', null) }}
                    </div>       
                </div>
                <div class="card-footer">
                    {{Form::submit('送信', ['class'=>'submit btn btn-primary float-right'])}}
                </div>

            {{ Form::close() }}
        </div>
    </div>

    @endsection
  