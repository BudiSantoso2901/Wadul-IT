<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Laporan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Cari Laporan</h1>
        <form action="{{ route('laporan.search') }}" method="GET">
            <div class="mb-3">
                <label for="nomor_tiket" class="form-label">Nomor Tiket</label>
                <input type="text" class="form-control" id="nomor_tiket" name="nomor_tiket"
                    value="{{ request('nomor_tiket') }}">
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" value="{{ request('nik') }}">
            </div>
            <div class="mb-3">
                <label for="nomor_hp" class="form-label">Nomor HP</label>
                <input type="text" class="form-control" id="nomor_hp" name="nomor_hp"
                    value="{{ request('nomor_hp') }}">
            </div>
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
    </div>
</body>

</html>
