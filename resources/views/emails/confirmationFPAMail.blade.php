<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi</title>
    <style>
        body {
            height: 100%;
            font-family: "Muli", sans-serif;
            -webkit-font-smoothing: antialiased;
            /* font-smoothing: antialiased; */
        }
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            color: #111111;
            font-weight: 400;
            font-family: "Muli", sans-serif;
        }
        .btn {
            display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
        .btn-warning{
            color: #fff !important;
            background-color: #e7ab3c;
            border-color: #e7ab3c;
        }
        .btn-warning:hover {
            color: #fff;
            background-color: #218838;
            border-color: #1e7e34;
        }
        a{
            text-decoration: none;
            background-color: transparent;
        }
    </style>
</head>
<body>

    <div>
        <hr>
        <table>
            <tbody>
                <tr>
                    <td>
                        <div>
                            <h4>Hai, {{ $data['name'] }} !</h4>
                            <p>Klik tombol reset password di bawah ini untuk mendapatkan password baru kamu!</p>
                            <a href="{{ route('ver-email-user', $data['email']) }}" class="btn btn-warning">Reset Password</a>
                            <p>Abaikan pesan ini jika anda tidak melakukan aksi ini</p>
                            <p>Terimakasih</p>
                            <p>SR12 Herbal Store</p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <hr>
    </div>
</body>
</html>