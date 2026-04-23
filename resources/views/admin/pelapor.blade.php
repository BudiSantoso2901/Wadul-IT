@extends('main')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Pelapor</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Pelapor</h4>
                            <button class="btn btn-primary" id="createNewPelapor">Tambah Pelapor</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="pelapor-table" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pelapor</th>
                                            <th>NIK</th>
                                            <th>Nomor HP</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pelapor</th>
                                            <th>NIK</th>
                                            <th>Nomor HP</th>
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
    <div class="modal fade" id="pelaporModal" tabindex="-1" role="dialog" aria-labelledby="pelaporModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pelaporModalLabel">Tambah Pelapor</h5>
                </div>
                <div class="modal-body">
                    <form id="pelaporForm">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Pelapor</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" required>
                        </div>
                        <div class="form-group">
                            <label for="nomor_hp">Nomor HP</label>
                            <input type="text" class="form-control" id="nomer_hp" name="nomor_hp" required>
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
    <div class="modal fade" id="pelaporModal-edit" tabindex="-1" role="dialog" aria-labelledby="pelaporModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pelaporModalLabel">Edit Pelapor</h5>
                </div>
                <div class="modal-body">
                    <form id="pelaporFormEdit">
                        @csrf
                        <div class="form-group">
                            <label for="nama-edit">Nama Pelapor</label>
                            <input type="text" class="form-control" id="nama-edit" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="nik-edit">NIK</label>
                            <input type="text" class="form-control" id="nik-edit" name="nik" required>
                        </div>
                        <div class="form-group">
                            <label for="nomer_hp-edit">Nomor HP</label>
                            <input type="text" class="form-control" id="nomer_hp-edit" name="nomor_hp" required>
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
            var table = $('#pelapor-table').DataTable({
                processing: true,
                serverSide: false,
                responsive: true,
                ajax: {
                    url: "{{ route('laporan.indexs') }}", // URL untuk mengambil data pelapor
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
                        data: 'nik'
                    },
                    {
                        data: 'nomor_hp'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `
                                <button class="btn btn-warning btn-sm editPelapor" data-id="${row.id}">Edit</button>
                                <button class="btn btn-danger btn-sm deletePelapor" data-id="${row.id}">Hapus</button>
                            `;
                        }
                    }
                ]
            });

            // Menambah pelapor baru
            $('#createNewPelapor').click(function() {
                $('#pelaporModal').modal('show');
                $('#pelaporForm')[0].reset();
                $('#saveBtn').off('click').on('click', function() {
                    $.ajax({
                        url: "{{ route('laporan.stores') }}",
                        type: 'POST',
                        data: $('#pelaporForm').serialize(),
                        success: function(response) {
                            Swal.fire('Sukses', response.message, 'success');
                            $('#pelaporModal').modal('hide');
                            table.ajax.reload();
                        },
                        error: function(response) {
                            Swal.fire('Error', response.responseJSON.message, 'error');
                        }
                    });
                });
            });

            // Edit pelapor
            $(document).on('click', '.editPelapor', function() {
                var id = $(this).data('id');
                $.get("{{ url('pelapor') }}/" + id, function(data) {
                    $('#nama-edit').val(data.nama);
                    $('#nik-edit').val(data.nik);
                    $('#nomer_hp-edit').val(data.nomor_hp);
                    $('#pelaporModal-edit').modal('show');
                    $('#saveBtnEdit').off('click').on('click', function() {
                        $.ajax({
                            url: "{{ url('pelapor') }}/" + id,
                            type: 'PUT',
                            data: $('#pelaporFormEdit').serialize(),
                            success: function(response) {
                                Swal.fire('Sukses', response.message,
                                    'success');
                                $('#pelaporModal-edit').modal('hide');
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

            // Hapus pelapor
            $(document).on('click', '.deletePelapor', function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Pelapor ini akan dihapus!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ url('pelapor') }}/" + id,
                            type: 'DELETE',
                            data: {
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
                $('#pelaporModal-edit').modal('hide');
                $('#pelaporModal').modal('hide');
            });
        });
    </script>
@endsection
