@extends('main')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Kategori</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Kategori</h4>
                            <button class="btn btn-primary" id="createNewKategori">Tambah Kategori</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="kategori-table" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal tambah -->
    <div class="modal fade" id="kategoriModal" tabindex="-1" role="dialog" aria-labelledby="kategoriModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kategoriModalLabel">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="kategoriForm">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="saveBtn" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal edit -->
    <div class="modal fade" id="kategoriModal-edit" tabindex="-1" role="dialog" aria-labelledby="kategoriModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kategoriModalLabel">Edit Kategori</h5>
                </div>
                <div class="modal-body">
                    <form id="kategoriFormEdit">
                        @csrf
                        <div class="form-group">
                            <label for="nama-edit">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama-edit" name="nama" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="saveBtnEdit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            var table = $('#kategori-table').DataTable({
                processing: true,
                responsive: true,
                serverSide: false,
                ajax: {
                    url: "{{ route('kategori.index') }}",
                    type: 'GET',
                    dataSrc: 'data'
                },
                columns: [{
                        data: null,
                        title: 'No',
                        render: function(data, type, row, meta) {
                            return meta.row + 1; // Menampilkan nomor urut berdasarkan indeks
                        },
                        orderable: false, // Tidak bisa diurutkan
                        searchable: false // Tidak bisa dicari
                    },
                    {
                        data: 'nama',
                        title: 'Nama Kategori'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `
                                <button class="btn btn-warning btn-sm editKategori" data-id="${row.id}">Edit</button>
                                <button class="btn btn-danger btn-sm deleteKategori" data-id="${row.id}">Hapus</button>
                            `;
                        },
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            // Menambah kategori baru
            $('#createNewKategori').click(function() {
                $('#kategoriModal').modal('show');
                $('#kategoriForm')[0].reset();
                $('#saveBtn').off('click').on('click', function() {
                    $.ajax({
                        url: "{{ route('kategori.store') }}",
                        type: 'POST',
                        data: $('#kategoriForm').serialize(),
                        success: function(response) {
                            Swal.fire('Sukses', response.message, 'success');
                            $('#kategoriModal').modal('hide');
                            table.ajax.reload();
                        },
                        error: function(response) {
                            Swal.fire('Error', response.responseJSON.message, 'error');
                        }
                    });
                });
            });

            // Edit kategori
            $(document).on('click', '.editKategori', function() {
                var id = $(this).data('id');
                $.get("{{ url('kategori') }}/" + id, function(data) {
                    $('#nama-edit').val(data.nama);
                    $('#kategoriModal-edit').modal('show');
                    $('#saveBtnEdit').off('click').on('click', function() {
                        $.ajax({
                            url: "{{ url('kategori') }}/" + id,
                            type: 'PUT',
                            data: $('#kategoriFormEdit').serialize(),
                            success: function(response) {
                                Swal.fire('Sukses', response.message,
                                    'success');
                                $('#kategoriModal-edit').modal('hide');
                                table.ajax.reload();
                            },
                            error: function(response) {
                                Swal.fire('Error', response.responseJSON
                                    .message, 'error');
                            }
                        });
                    });
                });
            });

            // Hapus kategori
            $(document).on('click', '.deleteKategori', function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Kategori ini akan dihapus!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ url('kategori') }}/" + id,
                            type: 'POST',
                            data: {
                                _method: 'DELETE',
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                Swal.fire('Sukses', response.message, 'success');
                                table.ajax.reload();
                            },
                            error: function(response) {
                                Swal.fire('Error', response.responseJSON.message,
                                    'error');
                            }
                        });
                    }
                });
            });
            $(document).on('click', '.close, [data-dismiss="modal"]', function() {
                $('#kategoriModal-edit').modal('hide');
                $('#kategoriModal').modal('hide');
            });
        });
    </script>
@endsection
