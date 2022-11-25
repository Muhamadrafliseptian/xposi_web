@extends('template')

@section('app_css')
    <link rel="stylesheet" type="text/css" href="{{ url('/ui_admin') }}/ui/assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/ui_admin') }}/ui/assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/ui_admin') }}/ui/assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css"
        href="{{ url('/ui_admin') }}/assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
@endsection

@section('title', 'Features')

@section('app_breadcrumb')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">@yield('title')</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/admin/dashboard') }}" class="breadcrumb-link">Dashboard</a>
                            </li>
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
    {{ Form::open(["url" => "admin/how_book/".$edit->id, "enctype" => "multipart/form-data"]) }}
    @method("PUT")
    <div class="row">
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-edit"></i> Edit Data @yield('title')
                </div>
                <div class="card-body">
                    <div class="form-group">
                        {{ Form::label('icon_book', 'Icon') }}
                        {{ Form::text('icon_book', $edit->icon_book , ['class' => 'form-control', 'placeholder' => 'Masukkan Judul']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('title_book', 'Title') }}
                        {{ Form::text('title_book', $edit->title_book , ['class' => 'form-control', 'placeholder' => 'Masukkan Judul']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('description_book', 'Deskripsi') }}
                        {{ Form::textarea('description_book', $edit->description_book, ['class' => 'form-control', 'placeholder' => 'Masukkan Deskripsi']) }}
                    </div>
                </div>
                <div class="card-footer">
                    {{ Form::button('<i class="fa fa-times"></i> Cancel', ['class' => 'btn btn-danger btn-sm btn-rounded', 'type' => 'reset']) }}
                    {{ Form::button('<i class="fa fa-save"></i> Save', ['class' => 'btn btn-success btn-sm btn-rounded', 'type' => 'submit']) }}
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@endsection

@section('app_js')
    <script>
        $(function() {
            CKEDITOR.replace('description_book')
        })
    </script>
    <script src="//cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script src="{{ url('build/js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('build/js/additional-methods.min.js') }}"></script>

@endsection
