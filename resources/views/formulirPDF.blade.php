<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulir</title>
</head>

<body>
    <h1>LPK Prima Buana Indoensia</h1>
    <h3>Formulir Pendaftaran</h3>
    <br>
    <h3>Data Persoanal</h3>
    <p>Nama Lengkap : {{ $applicants->appplicant_name }}</p>
    <p>Alamat : {{ $applicants->address }}</p>
</body>

</html>
