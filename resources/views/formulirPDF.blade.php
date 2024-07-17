<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulir</title>
    @vite('resources/css/app.css')
</head>

<body>
    <header>
        <div class="kop">
            <img src="img/kop.jpg" alt="Kop Surat">
        </div>
        <div class="formilir-identitiy d-flex justify-center">
            <div class="kotak w-10 h-10 outline-1 outline-sky-700">asdf</div>
        </div>
    </header>
    <h1 class="text-center">LPK Prima Buana Indoensia</h1>
    <h3>Formulir Pendaftaran</h3>
    <br>
    <h3>Data Persoanal</h3>
    <p>Nama Lengkap : {{ $applicants->appplicant_name }}</p>
    <p>Alamat : {{ $applicants->address }}</p>
</body>

</html>
