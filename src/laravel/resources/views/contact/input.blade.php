<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
{{--
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./css/admin_lte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./css/admin_lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./css/admin_lte/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">  --}}
  <title>ログインフォーム</title>

<style>
 .error{
     color:red;
     font-size:small;
 }
</style>

</head>
  <body class="hold-transition login-page">
      
    <div class="card card-primary">
        <div class="card-header">
             <h3 class="card-title">お問合わせフォーム</h3>
        </div>

        {{Form::model($inquiry,['url'=>['/contact/confirm']]) }}



            <div class="card-body">

                <div class= "form-group">
                    {{ Form::label('name', '名前：') }}
                     <span class="error">@error('name') <p>{{ $message }}</p>@enderror</span>
                    {{ Form::text('name', null, ['placeholder'=>'名前を入力']) }}

                </div>



                    <div class="form-group">
                        {{ Form::label('hobby', '聞きたい内容') }}
                        <span class="error">@error('hobby')<p>{{ $message }}</p>@enderror</span>
                        @foreach (config('const.form.hobby') as $key => $value)
                        {{Form::checkbox('hobby[]', $key,false)}}{{ $value }}
                            {{-- @foreach($inquiry->getQuestions() as $key_question => $question_model)
                                @if($question_model->question == $key)
                                    {{Form::checkbox('question[]', $key,true)}}{{ $value }}
                                    @break
                                @endif
                                @if($loop->last)
                                    {{Form::checkbox('question[]', $key,false)}}{{ $value }}
                                @endif
                            @endforeach --}}

                        @endforeach
                    </div>
                    <div class="form-group">
                        {{ Form::label('food', '食べ物') }}
                        <span class="error">@error('food')<p>{{ $message }}</p>@enderror</span>
                        @foreach (config('const.form.food') as $key => $value)
                        {{Form::radio('food', $value) }}{{ $value }}
                        @endforeach
                    </div>



                    <div class="form-group">
                        {{ Form::label('area', 'お住まいの地域') }}
                        <span class="error">@error('area')<p>{{ $message }}</p>@enderror</span>
                        {{ Form::select('area', [null=>'選択してください']+config('const.form.area')),null}}
                    </div>
                    <div class="form-group">
                        <p>ID（半角英数字のみ）</p>
                        <span class="error">@error('login_id')<p>{{ $message }}</p>@enderror</span>
                         {{ Form::text('login_id', null) }}
                    </div>

                    <div class="form-group">
                        <p>パスワード</p>
                         <span class="error">@error('login_pass')<p>{{ $message }}</p>@enderror</span>
                         {{ Form::password('login_pass', null) }}
                    </div>
                    <div class="form-group">
                        <p>パスワード再入力</p>
                         {{ Form::password('password_confirmation', null) }}
                    </div>


                    {{Form::submit('送信', ['class'=>'submit'])}}
            </div>
        {{ Form::close() }}

    </div>


  {{--  <!-- jQuery -->
  <script src="./css/admin_lte/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="./css/admin_lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App --
  <script src="./css/admin_lte/dist/js/adminlte.min.js"></script>  --}}
</body>
</html>