<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Tabel Produk</title>
</head>
<body>
@if(session()->has('success'))
<div class="row">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif
    <div class="d-flex justify-content-center align-items-center mb-2">
        <a href="{{url('/product/create')}}" class="btn btn-dark p-2">Tambah Produk</a>
    </div>
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nama Produk</th>
                <th>Kode Produk</th>
                <th>Harga</th>
                <th>Tanggal Produksi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$product->nama}}</td>
                <td>{{$product->kode}}</td>
                <td>{{$product->harga}}</td>
                <td>{{$product->tanggal_produksi}}</td>
                <td>
                    <a href="{{url('/product' . '/' . $product->id . '/edit')}}" class="btn btn-dark mr-1">Edit</a>
                    <form method="POST" class="w-100" action="{{url('/product' . '/' . $product->id)}}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-dark">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>