<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Form Edit Product</title>
</head>
<body>
<div class="row w-100 d-flex justify-content-center">
    <form method="POST" action="{{url('/product' . '/' . $product->id)}}" class="mt-4 d-flex flex-column w-75 justify-content-center align-items-center">
        @csrf
        @method('put')
        <h4>Edit Produk</h4>
        <div class="w-100 mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" name="nama" maxlength="255" class="form-control" placeholder="Nama produk" value="{{old('nama', $product->nama)}}">
            @error('nama')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="w-100 mb-3">
            <label for="kode" class="form-label">Kode Produk</label>
            <input type="text" name="kode" maxlength="16" class="form-control" placeholder="Kode produk" value="{{old('kode', $product->kode)}}">
            @error('kode')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="row g-3 w-100 mb-3 align-items-center justify-content-between">
            <div class="col-auto">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control" value="{{old('harga', $product->harga)}}">
                @error('harga')
                <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-auto">
                <label for="tanggalProduksi" class="form-label">Tanggal Produksi</label>
                <input type="date" name="tanggal_produksi" class="form-control" value="{{old('tanggal_produksi', $product->tanggal_produksi)}}">
                @error('tanggal_produksi')
                <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="w-100">
            <button type="submit" class="btn btn-dark">Edit Produk</button>
            <a href="{{url('/product')}}" class="btn btn-outline-dark">Kembali</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>