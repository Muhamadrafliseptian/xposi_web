@extends('template')

@section('title', ' Gallery')

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
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-plus"></i> Add Data @yield('title')
                </div>
                {{ Form::open(['url' => 'admin/gallery', 'id' => 'formKategori', 'enctype' => 'multipart/form-data']) }}
                <div class="card-body">
                    {{ Form::label("title", "Title Hero") }}
                    {{ Form::text("title_gallery", empty($data_gallery->title_gallery) ? null : $data_gallery->title_gallery, ['class' => 'form-control', 'placeholder' => 'Please, insert title gallery' ]) }}
                    {{ Form::label('image_gallery', 'Image') }}
                    {{ Form::file('image_gallery', ['class' => 'form-control', 'onchange' => 'previewImage()']) }}
                </div>
                <div class="card-footer">
                    {{ Form::button('<i class="fa fa-times"></i> Batal', ['class' => 'btn btn-danger btn-sm btn-rounded', 'type' => 'reset']) }}
                    {{ Form::button('<i class="fa fa-plus"></i> Tambah', ['class' => 'btn btn-primary btn-sm btn-rounded', 'type' => 'submit']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="mb-3 table table-striped table-bordered first" style="width: 100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=0 @endphp
                                @foreach ($data_gallery as $data)
                                    <tr>
                                        <td>{{ ++$no }}.</td>
                                        <td>{{ $data->title_gallery }}</td>
                                        <td>
                                            <img src="{{ $data->image_gallery }}" class="img-fluid" width="100">
                                        </td>
                                        <td class="text-center">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal"
                                                class="btn btn-warning btn-sm btn-rounded"
                                                onclick="editGallery({{ $data->id }})">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <button id="deleteGallery" data-id="{{ $data->id }}"
                                                class="btn btn-danger btn-sm btn-rounded">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Edit Data -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="fa fa-edit"></i> Edit Data @yield('title')
                    </h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                {{ Form::open(['url' => 'admin/gallery/simpan', 'enctype' => 'multipart/form-data']) }}
                @method('PUT')
                <div class="modal-body" id="modal-content-edit">
                </div>
                <div class="modal-footer">
                    {{ Form::button('<i class="fa fa-times"></i> Batal', ['class' => 'btn btn-danger btn-sm btn-rounded', 'type' => 'reset']) }}
                    {{ Form::button('<i class="fa fa-save"></i> Simpan', ['class' => 'btn btn-success btn-sm btn-rounded', 'type' => 'submit']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection

@section('app_js')
    <script src="{{ url('build/js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('build/js/additional-methods.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('/ui_admin') }}/ui/assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <script src="{{ url('/ui_admin') }}/ui/assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ url('/ui_admin') }}/ui/assets/vendor/datatables/js/data-table.js"></script>
    <script type="text/javascript">
        function previewImage() {
            const image = document.querySelector("#image_gallery");
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
    <script>
        function editGallery(id) {
            $.ajax({
                url: "{{ url('/admin/gallery/edit') }}",
                type: "GET",
                data: {
                    id: id
                },
                success: function(data) {
                    $("#modal-content-edit").html(data);
                    return true;
                }
            });
        }

        $("body").on("click", "#deleteGallery", function() {
            let id = $(this).data('id');

            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iyaa, Saya Yakin'
            }).then((result) => {
                if (result.isConfirmed) {
                    form_string =
                        "<form method=\"POST\" action=\"{{ url('/admin/gallery') }}/" +
                        id +
                        "\" accept-charset=\"UTF-8\"><input name=\"_method\" type=\"hidden\" value=\"DELETE\"><input name=\"_token\" type=\"hidden\" value=\"{{ csrf_token() }}\"></form>"
                    form = $(form_string)
                    form.appendTo('body');
                    form.submit();
                } else {
                    Swal.fire('Konfirmasi Diterima!', 'Data Anda Masih Terdata', 'success');
                }
            });
        });
    </script>
@endsection
