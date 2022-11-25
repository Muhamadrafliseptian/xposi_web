@extends('template')

@section('title', ' Profile Company')

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
                    @if (empty($data_profile))
                        <i class="fa fa-plus"></i> Tambah Data @yield('title')
                    @else
                        <i class="fa fa-edit"></i> Edit Data @yield('title')
                    @endif
                </div>
                @if (empty($data_profile))
                    {{ Form::open(['url' => 'admin/profile_company', 'enctype' => 'multipart/form-data']) }}
                @else
                    {{ Form::open(['url' => 'admin/profile_company/' . encrypt($data_profile->id), 'enctype' => 'multipart/form-data']) }}
                    @method('PUT')
                    @php
                        $result = trim($data_profile->company_image, url('/'));

                        $print = substr($result, 8);
                    @endphp
                    {{ Form::hidden('gambarLama', $print) }}
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            {{ Form::label('Image Company', 'Foto') }}
                            <br>
                            @if (empty($data_profile->company_image))
                                <img src="{{ url('/gambar/gambar_upload.jpg') }}" class="img-fluid gambar-preview mb-3"
                                    id="tampilGambar">
                            @else
                                <img src="{{ $data_profile->company_image }}" class="img-fluid gambar-preview mb-3"
                                    id="tampilGambar">
                            @endif
                            {{ Form::file('company_image', ['class' => 'form-control', 'onchange' => 'previewImage()']) }}
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('singkatan', 'Singkatan') }}
                                        {{ Form::text('company_name', empty($data_profile->company_name) ? null : $data_profile->company_name, ['class' => 'form-control', 'placeholder' => 'Masukkan Singkatan']) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('no_hp', 'No. HP') }}
                                        {{ Form::number('company_phone_number', empty($data_profile->company_phone_number) ? null : $data_profile->company_phone_number, ['class' => 'form-control', 'min' => 1, 'placeholder' => '0']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('nama', 'Nama') }}
                                        {{ Form::text('company_name', empty($data_profile->company_name) ? null : $data_profile->company_name, ['class' => 'form-control', 'placeholder' => 'Masukkan Nama']) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('alamat', 'Alamat') }}
                                        {{ Form::text("company_address", empty($data_profile->company_address) ? null : $data_profile->company_address, ['class' => 'form-control', 'placeholder' => 'Masukkan Alamat']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('deskripsi', 'Deskrpisi') }}
                                {{ Form::textarea('company_description', empty($data_profile->company_description) ? null : $data_profile->company_description, ['class' => 'form-control', 'placeholder' => 'Masukkan Deskrpisi']) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    {{ Form::button("<i class='fa fa-times'></i> Batal", ['class' => 'btn btn-danger btn-sm btn-rounded', 'type' => 'reset']) }}
                    @if (empty($data_profile))
                        {{ Form::button("<i class='fa fa-plus'></i> Tambah", ['class' => 'btn btn-primary btn-sm btn-rounded', 'type' => 'submit']) }}
                    @else
                        {{ Form::button("<i class='fa fa-save'></i> Simpan", ['class' => 'btn btn-success btn-sm btn-rounded', 'type' => 'submit']) }}
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
            CKEDITOR.replace('company_description')
        })
    </script>
    <script src="//cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        function previewImage() {
            const image = document.querySelector("#logo");
            const imgPreview = document.querySelector(".gambar-preview");

            imgPreview.style.display = "block";

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
                $("#tampilGambar").addClass('mb-3');
                $("#tampilGambar").height("250");
            }
        }
    </script>
@endsection
