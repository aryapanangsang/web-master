<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="img/kop.jpg" alt="Logo">
            </div>
            <div class="title">
                <h1>FORMULIR PENDAFTARAN</h1>
            </div>
            <div class="noreg">
                <table border="1px">
                    <tr>
                        <td class="x">
                            @if ($applicants->id < 9)
                                {{ 0 . 0 . $applicants->id }}
                            @elseif($applicants->id > 99)
                                {{ 0 . 0 . 0 . $applicants->id }}
                            @else
                                {{ $applicants->id }}
                            @endif
                        </td>
                        <td>/FP/LPK/</td>
                        <td class="x">
                            @if (\Carbon\Carbon::create($applicants->created_at)->isoFormat('M') < 9)
                                {{ 0 . \Carbon\Carbon::create($applicants->created_at)->isoFormat('M') }}
                            @else
                                {{ \Carbon\Carbon::create($applicants->created_at)->isoFormat('M') }}
                            @endif
                        </td>
                        <td class="y">
                            {{ \Carbon\Carbon::create($applicants->created_at)->isoFormat('Y') }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <form>
            <section>
                <table>
                    <h4 class="personal">I. PERSONAL DATA</h4>
                    <tr>
                        <td>Nama</td>
                        <td>: {{ $applicants->appplicant_name }}</td>
                    </tr>
                    <tr>
                        <td>No. KTP</td>
                        <td>: {{ $applicants->identity_number }}</td>
                    </tr>
                    <tr>
                        <td>No. NPWP</td>
                        <td>: {{ $applicants->npwp }}</td>
                    </tr>
                    <tr>
                        <td>No. BPJS Kesehatan</td>
                        <td>: {{ $applicants->bpjs_kesehatan }}</td>
                    </tr>
                    <tr>
                        <td>Tempat, Tanggal Lahir</td>
                        <td>: {{ $applicants->birth_of . ',' . $birth_of_date }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: {{ $applicants->address }}</td>
                    </tr>
                    <tr>
                        <td>Domisili</td>
                        <td>: {{ $applicants->domisili }}</td>
                    </tr>
                    <tr>
                        <td>No. Hp Aktif</td>
                        <td>: {{ $applicants->phone_number }}</td>
                    </tr>
                    <tr>
                        <td>No. WhatsApp</td>
                        <td>: {{ $applicants->wa_number }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: {{ $applicants->email }}</td>
                    </tr>
                    <tr>
                        <td>Kontak Darurat</td>
                        <td>: {{ $applicants->emergency_number }}</td>
                    </tr>
                    <tr>
                        <td>Nama Kontak Darurat</td>
                        <td>: {{ $applicants->emergency_number_name }}</td>
                    </tr>
                    <tr>
                        <td>Status Pernikahan</td>
                        <td>: {{ $applicants->maried_status }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>: {{ $applicants->gender }}</td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>: {{ $applicants->religion }}</td>
                    </tr>
                    <tr>
                        <td>Nama Ibu</td>
                        <td>: {{ $applicants->mother }}</td>
                    </tr>
                    <tr>
                        <td>Nama Ayah</td>
                        <td>: {{ $applicants->father }}</td>
                    </tr>
                    <tr>
                        <td>Status Vaksin</td>
                        <td>: {{ $applicants->caccine }}</td>
                    </tr>
                    <tr>
                        <td>Tinggi Badan</td>
                        <td>: {{ $applicants->height }}</td>
                    </tr>
                    <tr>
                        <td>Berat Badan</td>
                        <td>: {{ $applicants->weight }}</td>
                    </tr>
                    <tr>
                        <td>Ukuran Seragam</td>
                        <td>: {{ $applicants->uniform_size }}</td>
                    </tr>
                    <tr>
                        <td>Ukuran Sepatu</td>
                        <td>: {{ $applicants->shoes_size }}</td>
                    </tr>

                    <h4 class="pendidikan">II. PENDIDIKAN TERAKHIR</h4>
                    <tr>
                        <td>Nama Sekolah</td>
                        <td>: {{ $applicants->educational_level }}</td>
                    </tr>
                    <tr>
                        <td>Tahun Lulus</td>
                        <td>: {{ $applicants->graduated }}</td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td>: {{ $applicants->major }}</td>
                    </tr>
                    <tr>
                        <td>Nilai Matematika</td>
                        <td>: {{ $applicants->math_value }}</td>
                    </tr>
                    <tr>
                        <td>Skill/Keahlian</td>
                        <td>: {{ $applicants->skills }}</td>
                    </tr>
                    <h4 class="pengalaman">III. Pengalaman </h4>
                    <tr>
                        <td>Nama Perusahaan</td>
                        <td>: {{ $applicants->company_name }}</td>
                    </tr>
                    <tr>
                        <td>Uang Saku / Upah</td>
                        <td>: {{ $applicants->salary }}</td>
                    </tr>
                    <tr>
                        <td>Jabatan / Bagian</td>
                        <td>: {{ $applicants->position }}</td>
                    </tr>
                    <tr>
                        <td>Masa Kerja</td>
                        <td>: {{ $applicants->duration }}</td>
                    </tr>
                </table>
                <div class="epilog">
                    <h5>Demikian formulir ini saya isi dengan sebenarnya. Apabila saya berbohong, maka saya siap
                        dikenakan
                        sanksi.</h5>
                    <div class="tgl_daftar">
                        <p>Cikarang, {{ $tgl_daftar }}</p>
                    </div>
                </div>
                <div class="signature">
                    <table>
                        <tr>
                            <td class="pihak_kedua">Pihak Kedua</td>
                            <td class="pihak_satu">Pihak Pertama</td>
                        </tr>
                        <br>
                        <br>
                        <br>
                        <tr class="signature_name">
                            <td class="pihak_kedua">Pihak Kedua</td>
                            <td class="pihak_satu">LPK PBI</td>
                        </tr>
                    </table>
                </div>
            </section>
        </form>
    </div>

    <script>
        // Set current date
        document.getElementById('current-date').textContent = new Date().toLocaleDateString('id-ID', {
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        });
    </script>
</body>

</html>
