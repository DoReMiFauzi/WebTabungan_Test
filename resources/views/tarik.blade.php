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
    <a class="navbar-brand" href="#">Navbar</a>
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
    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Saldo Tabungan Saat Ini</h5>
    <p class="card-text">Rp. {{ number_format($saldo) }}</p>
  </div>
</div>
</div>

<form action="{{ route('tabungan.tarikTabungan') }}" method="post" class="container mt-5">
@csrf

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nominal Tarik Tabungan</label>
    <input type="number" name="nominal" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Tanggal</label>
    <input type="date" name="tanggal" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-danger">Tarik</button>
</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>