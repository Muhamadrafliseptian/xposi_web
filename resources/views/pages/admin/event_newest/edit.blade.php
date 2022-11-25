@extends('template')

@section('app_css')
    <link rel="stylesheet" type="text/css" href="{{ url('/ui_admin') }}/ui/assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/ui_admin') }}/ui/assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/ui_admin') }}/ui/assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css"
        href="{{ url('/ui_admin') }}/ui/assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
@endsection

@section('title', 'Event')

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
    {{ Form::open(["url" => "admin/event_newest/".$edit->id, "enctype" => "multipart/form-data"]) }}
    @method("PUT")
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-plus"></i> Edit Image @yield('title')
                </div>
                <div class="card-body">
                    <img src="{{ $edit->event_image }}" class="img-fluid gambar-preview mb-3"
                    id="event_image">
                    {{ Form::label('event_image', 'Image') }}
                    {{ Form::file('event_image', ['class' => 'gambar-preview form-control', 'onchange' => 'previewImage()']) }}
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-plus"></i> Edit Data @yield('title')
                </div>
                <div class="card-body">
                    <div class="form-group">
                        {{ Form::label('event_name', 'Event Name') }}
                        {{ Form::text('event_name', $edit->event_name, ['class' => 'form-control', 'placeholder' => 'Insert Nama Event']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('event_price', 'Event Price') }}
                        {{ Form::text('event_price', $edit->event_price, ['class' => 'form-control', 'placeholder' => 'Insert Price']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('event_time', 'Time') }}
                        {{ Form::time('event_time', $edit->event_time, ['class' => 'form-control', 'placeholder' => 'Insert Price']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('event_date', 'Date') }}
                        {{ Form::date('event_date', $edit->event_date, ['class' => 'form-control', 'placeholder' => 'Insert Date']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('event_description', 'Description') }}
                        {{ Form::textarea('event_description', $edit->event_description, ['class' => 'form-control', 'placeholder' => 'Insert Deskripsi']) }}
                    </div>

                </div>
                <div class="card-footer">
                    {{ Form::button('<i class="fa fa-times"></i> Cancel', ['class' => 'btn btn-danger btn-sm btn-rounded', 'type' => 'reset']) }}
                    {{ Form::button('<i class="fa fa-plus"></i> Save', ['class' => 'btn btn-success btn-sm btn-rounded', 'type' => 'submit']) }}
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@endsection

@section('app_js')
    <script>
        $(function() {
            CKEDITOR.replace('event_description')
        })
    </script>
    <script type="text/javascript">
        function previewImage() {
            const image = document.querySelector("#logo");
            const imgPreview = document.querySelector(".gambar-preview");

            imgPreview.style.display = "block";

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
                $("#event_image").addClass('mb-3');
                $("#event_image").height("250");
            }
        }
    </script>
    <script src="//cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script src="{{ url('build/js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('build/js/additional-methods.min.js') }}"></script>

@endsection
