{{$inquiry->name}}
{{-- {{dd($hobbys->hobby)}}exit; --}}
@foreach($inquiry->hobby as $k => $v)
{{$v}}
@endforeach
{{$inquiry->food}}
{{$inquiry->area}}
{{$inquiry->login}}
{{$inquiry->password}}
{{-- {{dd($inquiry->hobby)}} --}}

{{Form::model($inquiry,['url'=> Config('app.url').'/contact/input']) }}
{{Form::hidden('name', $inquiry['name'])}}
@foreach($inquiry['hobby'] as $k => $v)
{{Form::hidden('hobby[]', $v)}}
@endforeach
{{Form::hidden('food', $inquiry['food'])}}
{{Form::hidden('area', $inquiry['area'])}}
{{Form::hidden('login', $inquiry['login_id'])}}
{{Form::submit('戻る', ['class'=>'back'])}}
{{ Form::close() }}

{{Form::model($inquiry,['url'=> Config('app.url').'/contact/complete']) }}
{{Form::hidden('name', $inquiry['name'])}}
@foreach($inquiry['hobby'] as $k => $v)
{{Form::hidden('hobby[]', $v)}}
@endforeach
{{Form::hidden('food', $inquiry['food'])}}
{{Form::hidden('area', $inquiry['area'])}}
{{Form::hidden('login', $inquiry['login'])}}
{{Form::hidden('password', $inquiry['password'])}}
{{Form::submit('送信', ['class'=>'submit'])}}
{{ Form::close() }}