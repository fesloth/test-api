<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .container input {
            width: 90%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .container input[type="number"] {
            width: 90%;
        }

        .container button {
            background-color: #444;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        .container button:hover {
            background-color: #333;
        }

        .container a {
            display: flex;
            justify-content: end;
            text-decoration: none;
        }

        .container h4 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h4>Edit Data</h4>
        <form action="{{ route('barang.update', ['id' => $data->idBarang]) }}" method="post">
            @csrf
            @method('PUT')
            <label for="namaBarang">Nama Barang</label>
            <input type="text" id="namaBarang" name="namaBarang" value="{{$data->namaBarang}}">
            <label for="deskripsiBarang">Deskripsi Barang</label>
            <input type="text" id="deskripsiBarang" name="deskripsiBarang" value="{{$data->deskripsiBarang}}">
            <label for="harga">Harga</label>
            <input type="number" id="harga" name="harga" value="{{$data->harga}}">
            <button type="submit" name="edit">Edit Data</button>
            <a href="/barang">Kembali</a>
        </form>
        @if (session('success'))
        <script>
            alert("{{ session('success') }}");
            window.location.href = '/barang';
        </script>
        @endif
    </div>
</body>

</html>