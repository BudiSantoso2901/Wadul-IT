@extends('main')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Ruangan</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Ruangan</h4>
                            <button class="btn btn-primary" id="createNewRuangan">Tambah Ruangan</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="ruangan-table" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Ruangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Ruangan</th>
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
    <div class="modal fade" id="ruanganModal" tabindex="-1" role="dialog" aria-labelledby="ruanganModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ruanganModalLabel">Tambah Ruangan</h5>
                </div>
                <div class="modal-body">
                    <form id="ruanganForm">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Ruangan</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="saveBtn" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal edit -->
    <div class="modal fade" id="ruanganModal-edit" tabindex="-1" role="dialog" aria-labelledby="ruanganModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ruanganModalLabel">Edit Ruangan</h5>
                </div>
                <div class="modal-body">
                    <form id="ruanganFormEdit">
                        @csrf
                        <div class="form-group">
                            <label for="nama-edit">Nama Ruangan</label>
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
            var table = $('#ruangan-table').DataTable({
                processing: true,
                serverSide: false,
                responsive: true,
                ajax: {
                    url: "{{ route('ruangan.index') }}", // URL untuk mengambil data ruangan
                    type: 'GET',
                    dataSrc: 'data' // Mengambil data dari key 'data' dalam JSON
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
                        data: 'nama'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `
                                <button class="btn btn-warning btn-sm editRuangan" data-id="${row.id}">Edit</button>
                                <button class="btn btn-danger btn-sm deleteRuangan" data-id="${row.id}">Hapus</button>
                            `;
                        }
                    }
                ]
            });

            // Menambah ruangan baru
            $('#createNewRuangan').click(function() {
                $('#ruanganModal').modal('show');
                $('#ruanganForm')[0].reset();
                $('#saveBtn').off('click').on('click', function() {
                    $.ajax({
                        url: "{{ route('ruangan.store') }}",
                        type: 'POST',
                        data: $('#ruanganForm').serialize(),
                        success: function(response) {
                            Swal.fire('Sukses', response.message, 'success');
                            $('#ruanganModal').modal('hide');
                            table.ajax.reload();
                        },
                        error: function(response) {
                            Swal.fire('Error', response.responseJSON.message, 'error');
                        }
                    });
                });
            });

            // Edit ruangan
            $(document).on('click', '.editRuangan', function() {
                var id = $(this).data('id');
                $.get("{{ url('ruangan') }}/" + id + "/edit", function(data) {
                    $('#nama-edit').val(data.nama);
                    $('#ruanganModal-edit').modal('show');
                    $('#saveBtnEdit').off('click').on('click', function() {
                        $.ajax({
                            url: "{{ url('ruangan') }}/" + id + "/update",
                            type: 'PUT',
                            data: $('#ruanganFormEdit').serialize(),
                            success: function(response) {
                                Swal.fire('Sukses', response.message,
                                    'success');
                                $('#ruanganModal-edit').modal('hide');
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

            // Hapus ruangan
            $(document).on('click', '.deleteRuangan', function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Ruangan ini akan dihapus!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ url('ruangan/delete') }}/" + id,
                            type: 'POST',
                            data: {
                                _method: 'DELETE', // Laravel membutuhkan ini untuk metode DELETE
                                _token: $('meta[name="csrf-token"]').attr(
                                    'content') // Sertakan token CSRF
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
                $('#ruanganModal-edit').modal('hide');
                $('#ruanganModal').modal('hide');
            });
        });
    </script>
@endsection
