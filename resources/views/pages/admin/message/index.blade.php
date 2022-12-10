@php
use Carbon\Carbon;
@endphp

@extends('template')

@section('title', 'Inbox Data')

@section('app_css')
    <link rel="stylesheet" type="text/css" href="{{ url('/ui_admin') }}/assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/ui_admin') }}/assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/ui_admin') }}/assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css"
        href="{{ url('/ui_admin') }}/assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
@endsection

@section('app_breadcrumb')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">@yield('title')</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                @yield('title')
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('app_content')

    <div class="row">
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-envelope"></i> Inbox
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered first" style="width: 100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th class="text-center">Message At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($data_message as $data)
                                    <tr>
                                        <td class="text-center">{{ ++$no }}.</td>
                                        <td>{{ $data->message_name }}</td>
                                        <td>{{ $data->message_email }}</td>
                                        <td>{{ $data->message_subject }}</td>
                                        <td>{{ $data->message_text }}</td>
                                        <td class="text-center">{{ Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->isoFormat('dddd, D MMMM Y H:mm:s') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('app_js')

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('/ui_admin') }}/assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>

    <script src="{{ url('/ui_admin') }}/assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ url('/ui_admin') }}/assets/vendor/datatables/js/data-table.js"></script>

@endsection
