<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Hasil Pencarian Laporan</h1>
        @if ($laporans->isEmpty())
            <p class="text-center text-danger">Tidak ada laporan ditemukan.</p>
        @else
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Nomor Tiket</th>
                        <th>Nama</th>
                        <th>Ruangan</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporans as $laporan)
                        <tr>
                            <td>{{ $laporan->nomor_tiket }}</td>
                            <td>{{ $laporan->pelapor->nama }}</td>
                            <td>{{ $laporan->ruangan->nama }}</td>
                            <td>{{ $laporan->status }}</td>
                            <td>{{ $laporan->created_at->format('d-m-Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>

</html>
