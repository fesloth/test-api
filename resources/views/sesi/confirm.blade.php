<!DOCTYPE html>
<html>

<head>
    <title>Konfirmasi Logout</title>
    <!-- Tambahkan stylesheet atau link ke CSS jika diperlukan -->
</head>

<body>
    <h1>Konfirmasi Logout</h1>
    <p>Anda yakin ingin logout?</p>
    <form action="{{ route('perform-logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>

</html>