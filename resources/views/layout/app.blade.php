<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang Gudang</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
    body {
        padding: 45px;
        background-color: #f0f3f5;
    }

    a {
        text-decoration: none;
    }

    .btn-sm {
        padding: 0.5rem 0.5rem;
        font-size: 1rem;
    }

    .card {
        background-color: #f8f9fa;
        /* Light gray background */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    /* Align buttons */
    .ml-auto {
        margin-left: auto;
    }
</style>

<body>
    <div class="card p-3">
        <h2 class="text-center">Data Barang</h2>
        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Deskripsi Barang</th>
                <th>Harga</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach($datas as $data)
                <tr>
                    <td>{{ $data->idBarang }}</td>
                    <td>{{ $data->namaBarang }}</td>
                    <td>{{ $data->deskripsiBarang }}</td>
                    <td>{{ $data->harga }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('barang.edit', ['id' => $data->idBarang]) }}">
                            Edit
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger" onclick="confirmDelete('{{ route('barang.hapus',  ['idBarang' => $data->idBarang]) }}')"> Hapus
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <tfoot>
            <div class="d-flex justify-content-between">
                <a href="barang/tambah" class="btn btn-warning btn-sm">Tambah Data <i class="fas fa-plus"></i></a>
                <a onclick="confirmLogout()" href="#" class="btn btn-danger btn-sm ml-auto"><i class="fas fa-arrow-right-from-bracket fa-rotate-180"></i> Logout</a>
            </div>
        </tfoot>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script>
        function confirmDelete(deleteUrl) {
            if (confirm('Anda yakin ingin menghapus data ini?')) {
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = deleteUrl;
                form.innerHTML = form.innerHTML = '<input type="hidden" name="_method" value="DELETE">' + '<input type="hidden" name="_token" value="{{ csrf_token() }}">';
                document.body.appendChild(form);

                form.submit();
            }
        }
    </script>
    <script>
        function confirmLogout() {
            if (confirm('Anda yakin ingin logout?')) {
                window.location.href = 'login';
            }
        }
    </script>
</body>

</html>