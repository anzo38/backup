@extends('layouts.login_main') 
 
@section('content')
<body class="content-wrapper">
    {{-- <div class="content-wrapper"> --}}
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>downloaDATA</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- ログイアウト --}}
                            <li class="breadcrumb-item"><a href="{{ route('logout') }}">ログアウト</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">CSVdownload</h3>
                </div>

                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                {{-- <th style="width: 1%">
                                    #
                                </th> --}}
                                <th style="width: 50% ">
                                    Data:ID
                                </th>
                               
                                <th style="width: 50%">
                                    csvdownload
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contact_id as $k =>$v)
                                <tr>
                                    <td>{{$v['id']}}</td>
                                    <td> <a class="btn btn-primary" href="{{ action('AdminController@downloads', $v['id']) }}">{{ 'download'.$v['id'] }}</a><br></td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </section>
    {{-- </div> --}}
@endsection