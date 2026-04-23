@extends('main')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit Status Laporan</h2>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <form action="{{ route('laporan.updateStatus', $laporan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Status Laporan -->
                    <div class="form-group mb-3">
                        <label for="status" class="form-label">Status Laporan</label>
                        <select name="status" id="status" class="form-select" required>
                            @if ($laporan->status == 'Diterima')
                                <option value="Diterima" {{ $laporan->status == 'Diterima' ? 'selected' : '' }}>Diterima
                                </option>
                                <option value="Diproses" {{ $laporan->status == 'Diproses' ? 'selected' : '' }}>Diproses
                                </option>
                            @elseif ($laporan->status == 'Diproses')
                                <option value="Diproses" {{ $laporan->status == 'Diproses' ? 'selected' : '' }}>Diproses
                                </option>
                                <option value="Selesai" {{ $laporan->status == 'Selesai' ? 'selected' : '' }}>Selesai
                                </option>
                            @else
                                <option value="Selesai" {{ $laporan->status == 'Selesai' ? 'selected' : '' }}>Selesai
                                </option>
                            @endif
                        </select>
                    </div>
                    <!-- Deskripsi -->
                    <div class="form-group mb-3" id="deskripsi-container" style="display: none;">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $laporan->deskripsi) }}</textarea>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const statusSelect = document.getElementById('status');
                            const deskripsiContainer = document.getElementById('deskripsi-container');

                            // Show/hide deskripsi based on status
                            function toggleDeskripsi() {
                                if (statusSelect.value === 'Selesai') {
                                    deskripsiContainer.style.display = 'block';
                                } else {
                                    deskripsiContainer.style.display = 'none';
                                }
                            }

                            // Initial check on page load
                            toggleDeskripsi();

                            // Listen for changes on the status dropdown
                            statusSelect.addEventListener('change', toggleDeskripsi);
                        });
                    </script>
                    <input type="hidden" name="updated_by" value="{{ auth()->id() }}">
                    <button type="submit" class="btn btn-primary w-100 mt-3">Perbarui Status</button>
                </form>
                <a href="{{ route('laporan.view') }}" class="btn btn-secondary w-100 mt-3">Kembali ke Laporan</a>
            </div>
        </div>
    </div>
@endsection
