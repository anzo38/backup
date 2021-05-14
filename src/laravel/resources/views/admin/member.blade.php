 @foreach($contact_id as $k =>$v)
{{-- {{$v['id']."/r\n"}} --}}
<a href="{{ action('AdminController@downloads', $v['id']) }}">{{ 'download'.$v['id'] }}</a><br>
{{-- {{Form::open(['url' => route('.index', ['id' => '1']), 'method' => 'get'])}} --}}
@endforeach 

