<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Register</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" />
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: "MontSerrat", sans-serif;
            background-color: rgba(142, 174, 222, 0.686);
        }

        .card {
            width: 300px;
            padding: 50px;
            padding-top: 20px;
            border: 2px solid transparent;
            border-radius: 5px;
            background-color: #4a59ab;
            display: flex;
            flex-direction: column;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
        }

        .card h1 {
            text-align: center;
            color: rgb(18, 43, 63);
        }

        .card label {
            display: block;
            margin-bottom: 10px;
        }

        .card input[type="text"],
        .card input[type="password"] {
            width: 100%;
            padding: 8px 12px;
            /* Menambahkan padding pada input */
            border: 1px;
            border-radius: 3px;
            margin-bottom: 10px;
            box-sizing: border-box;
            /* Memastikan padding tidak mempengaruhi lebar total input */
            font-size: 15px;
            /* Mengatur ukuran font pada input */
        }

        .card button[type="submit"] {
            width: 100%;
            padding: 10px 3px;
            border: none;
            border-radius: 5px;
            background-color: #1c1e40;
            color: white;
            font-weight: bold;
            cursor: pointer;
            font-family: sans-serif;
            margin-top: 10px;
        }

        .card button[type="submit"]:hover {
            background-color: #51577b;
        }

        .image img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            box-shadow: 0px 0px 10px #1c1e40;
        }

        .image {
            text-align: center;
        }

        p {
            text-align: end;
        }
    </style>
</head>

<body>
    <form id="login-form" action="{{ route('registerProses') }}" method="post">
        @csrf
        @method('post')
        <div class="card">
            <h1>Register</h1>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="username..." />
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="password..." />
            <label for="password">Confirm Password:</label>
            <input type="password" id="confirm" name="confirm" placeholder="password..." />
            <button type="submit" name="submit">Register</button> <br>
            <p>have an account? <br>
                <a href="{{route('login')}}">login</a>
            </p>
        </div>
    </form>
    @if($message = Session::get('failed'))
    <script>
        alert('Konfirmasi Password tidak sesuai')
    </script>
    @endif
</body>

</html>