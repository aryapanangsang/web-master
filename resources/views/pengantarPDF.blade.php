<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengantar PDF</title>
    <style>
        * {
            padding: 0;
        }

        body {
            font-family: "Times New Roman", Times, serif;
        }

        @page {
            margin: 20px 25px;
        }

        .container {
            width: 100%;
            height: 90%;
            margin: 0 auto;
            border: 1px solid #000;
            padding: 10px 5px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: center;
        }

        .logo img {
            width: 400px;
            margin-bottom: -15px;
        }

        .title {
            flex-grow: 1;
            margin: 0 20px;
            font-size: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="header">
            <div class="logo">
                <img src="img/kop.jpg" alt="Logo">
            </div>
            <div class="title">
                <h1>SURAT PENGANTAR</h1>
            </div>
        </div>
        <div class="main">
            <div class="salam">
                <table>
                    <tr>
                        <td class="label">Perihal</td>
                        <td class="sparator">:</td>
                        <td>Medikal Check Up LPK-PBI</td>
                    </tr>
                    <br>
                    <tr>
                        <td class="label">Kepada Yth.</td>
                        <td class="sparator">
                            :
                        </td>
                    </tr>
                </table>
                <span>
                    Departemen Medical Check Up <br> <strong>Klinik Westerindo Cikarang
                    </strong> <br>Jl. Jababeka
                    Raya,
                    Pasirgombong,
                    Kec. Cikarang Utara <br>
                    Kabupaten Bekasi, Jawa Barat 17530
                </span>
                <br>
                <br>
                <span>
                    Bersama dengan ini kami lampirkan data calon Peserta Magang kami yang akan dilakukan Medikal Check
                    Up (MCU) di Klinik Westerindo Cikarang :
                </span>
            </div>

            <div class="table table-responsive conten" style="width: 80% ; margin: 10px auto">
                <table class="table table-striped" style="border-width: 0px; border: 1px solid black">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>L/P</th>
                            <th>TEMPAT, TANGGAL LAHIR</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($applicants as $applicant)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $applicant->appplicant_name }}</td>
                                <td>{{ $applicant->gender }}</td>
                                <td>{{ $applicant->birth_of . \Carbon\Carbon::create($applicant->birth_of_date)->isoFormat('D MMMM Y') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
