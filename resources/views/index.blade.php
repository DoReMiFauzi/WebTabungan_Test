<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Tabungan</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="{{ route('tabungan.index') }}">Home</a>
        <a class="nav-link" href="{{ route('tabungan.create') }}">Tabung</a>
        <a class="nav-link" href="{{ route('tabungan.viewTarik') }}">Tarik</a>
      </div>
    </div>
  </div>
</nav>

<div class="container mt-5">

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
</div>

<div class="container mt-5 mb-4 d-flex gap-4">
  <div class="card" style="width: 18rem;">
  <div class="card-body">
  <h5 class="card-title">Saldo Tabungan</h5>
  <p class="card-text">Rp. {{ number_format($saldo, 0, ',', '.') }}</p>
  <a href="{{ route('tabungan.create') }}" class="btn btn-primary">Gas Nabung Lagi</a>
  </div>
  </div>
  <div class="card" style="width: 18rem;">
  <div class="card-body">
  <h5 class="card-title">Total Tarik Tabungan</h5>
  <p class="card-text" style="color: red">Rp. -{{ number_format($totalTarik , 0, ',', '.') }}</p>
  <a href="{{ route('tabungan.viewTarik') }}" class="btn btn-danger">Tarik Tabungan</a>
  </div>
  </div>
</div>

    <div class="container mb-4">
      <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Metode</th>
                    <th>Nominal</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($historyTabungan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        @if ($item->tipe == 'Tarik')
                            <td style="color: red">{{ $item->tipe }}</td>
                        @else  
                        <td style="color: green">{{ $item->tipe }}</td>
                        @endif
                        @if ($item->tipe == 'Tarik')
                        <td style="color: red">Rp. -{{ number_format($item->nominal , 0, ',', '.') }}</td>
                        @else
                        <td style="color: green">Rp. {{ number_format($item->nominal, 0, ',', '.') }}</td>
                        @endif
                        @if ($item->keterangan == null)
                            <td>-</td>
                        @else
                        <td>{{ $item->keterangan }}</td>
                        @endif
                        <td>{{ $item->created_at->format('d-m H:i') }}</td>
                    </tr>
                @endforeach
                @if ($historyTabungan->isEmpty())
                    <td colspan="10" class="text-center" style="color: grey" >
                      <p>Maaf Data Belum Di Tambah</p>
                    </td>
                @endif
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>