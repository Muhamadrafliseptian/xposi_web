@extends('template')

@section('title', ' Hero')

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

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if (empty($data_hero))
                        <i class="fa fa-plus"></i> Add Data @yield('title')
                    @else
                        <i class="fa fa-edit"></i> Edit Data @yield('title')
                    @endif
                </div>
                @if (empty($data_hero))
                    {{ Form::open(['url' => '/admin/hero/', 'enctype' => 'multipart/form-data']) }}
                @else
                    {{ Form::open(['url' => '/admin/hero/' . encrypt($data_hero->id), 'enctype' => 'multipart/form-data']) }}
                    @method('PUT')
                    @php
                        $hasil = trim($data_hero->image_hero, url('/'));

                        $print = substr($hasil, 8);
                    @endphp
                    {{ Form::hidden('gambarLama', $print) }}
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            {{ Form::label('logo', 'Image') }}
                            <br>
                            @if (empty($data_hero->image_hero))
                                <img src="{{ url('/gambar/gambar_upload.jpg') }}" class="img-fluid image-preview mb-3"
                                    id="viewImage">
                            @else
                                <img src="{{ $data_hero->image_hero }}" class="img-fluid image-preview mb-3"
                                    id="viewImage">
                            @endif
                            {{ Form::file('image_hero', ['class' => 'form-control', 'onchange' => 'previewImage()']) }}
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('icon', 'Icon Hero') }}
                                        {{ Form::text('icon_hero', empty($data_hero->icon_hero) ? null : $data_hero->icon_hero, ['class' => 'form-control', 'placeholder' => 'Please, insert icon hero']) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{ Form::label("title", "Title Hero") }}
                                    {{ Form::text("title_hero", empty($data_hero->title_hero) ? null : $data_hero->title_hero, ['class' => 'form-control', 'placeholder' => 'Please, insert title hero' ]) }}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('description', 'Description') }}
                                {{ Form::textarea('description_hero', empty($data_hero->description_hero) ? null : $data_hero->description_hero, ['class' => 'form-control', 'placeholder' => 'Please, insert description hero']) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    {{ Form::button("<i class='fa fa-times'></i> Cancel", ['class' => 'btn btn-danger btn-sm btn-rounded', 'type' => 'reset']) }}
                    @if (empty($data_hero))
                        {{ Form::button("<i class='fa fa-plus'></i> Add", ['class' => 'btn btn-primary btn-sm btn-rounded', 'type' => 'submit']) }}
                    @else
                        {{ Form::button("<i class='fa fa-save'></i> Save", ['class' => 'btn btn-success btn-sm btn-rounded', 'type' => 'submit']) }}
                    @endif
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection

@section('app_js')
    <script>
        $(function() {
            CKEDITOR.replace('description_hero')
        })
    </script>
    <script src="//cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        function previewImage() {
            const image = document.querySelector("#image_hero");
            const imgPreview = document.querySelector(".image-preview");

            imgPreview.style.display = "block";

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
                $("#viewImage").addClass('mb-3');
                $("#viewImage").height("250");
            }
        }
    </script>
@endsection
