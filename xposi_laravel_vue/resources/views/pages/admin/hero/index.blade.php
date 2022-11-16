@extends('template')

@section('title', 'Hero')

@section('title_breadcrumb', 'Hero')

@section('breadcrumb')

    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
            <a href="">
                Dashboard
            </a>
        </div>
        <div class="breadcrumb-item">
            @yield('title')
        </div>
    </div>

@endsection

@section('content')

    @if (empty($data))
        <form action="{{ url('/pages/admin/hero') }}" method="POST" enctype="multipart/form-data">
        @else
            <form action="{{ url('/pages/admin/hero/' . $data->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @php
                    $str = $data->image;
                    $result = trim($str, url('/'));

                    $print = substr($result, 8);
                @endphp
                <input type="hidden" name="gambarLama" value="{{ $print }}">
    @endif
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fa fa-upload"></i> Upload Gambar
                    </h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="image"> Foto </label>
                        @if (empty($data))
                            <img src="{{ url('/gambar/upload-gambar.jpg') }}" class="img-fluid mb-3 image-preview"
                                id="viewImage">
                        @else
                            <img src="{{ $data->image }}" class="img-fluid mb-3 image-preview" id="viewImage">
                        @endif
                        <input type="file" class="form-control" name="image" id="image"
                            onchange="previewImage()">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 ">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        @if (empty($data))
                            <i class="fa fa-plus"></i> Tambah Data
                        @else
                            <i class="fa fa-edit"></i> Edit Data
                        @endif
                    </h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="icon"> Nama Profil Perusahaan </label>
                        <input type="text" class="form-control" name="icon" id="icon"
                            placeholder="Masukkan Profil Nama Perusahaan"
                            value="{{ empty($data->icon) ? '' : $data->icon }}">
                    </div>
                    <div class="form-group">
                        <label for="title"> Deskripsi Singkat </label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ empty($data->title) ? '' : $data->title }}">
                    </div>
                    <div class="row">
                    <div class="form-group">
                        <label for="description"> Deskripsi </label>
                        <textarea name="description" class="form-control" id="description" rows="5"
                            placeholder="Masukkan Deskripsi">{{ empty($data->description) ? '' : $data->description }}</textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn {{ empty($data) ? 'btn-primary' : 'btn-success' }} btn-sm">
                        <i class="{{ empty($data) ? 'fa fa-plus' : 'fa fa-save' }}"></i>
                        {{ empty($data) ? 'Tambah' : 'Simpan' }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    </form>

@endsection

@section('js')

    <script type="text/javascript">
        function previewImage() {
            const image = document.querySelector("#image");
            const imgPreview = document.querySelector(".image-preview");
            imgPreview.style.display = "block";
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
                $("#viewImage").addClass('mb-3');
                $("#viewImage").width("100%");
                $("#viewImage").height("300");
            }
        }
    </script>

@endsection
