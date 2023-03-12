<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>

<body>
    {{-- kop --}}
    <img src="{{ public_path('image/kop_surat.jpg') }}" alt="" style="width: 40rem; margin-left: 1.6rem;">

    {{-- isi --}}
    <p style="margin-top: 4rem">Pada hari ini {{ \Carbon\Carbon::now()->translatedFormat('l') }}, {{
        \Carbon\Carbon::now()->translatedFormat('d F Y') }} yang
        bertanda tangan dibawah ini Ketua Tracer Study
        IAIA Al-Aziziyah, menerangkan bahwa :
    </p>
    <table>
        <tr>
            <td>Nama Mahasiswa &nbsp;&nbsp;</td>
            <td>:</td>
            <td>&nbsp;{{ $user->nama_mahasiswa }}</td>
        </tr>
        <tr>
            <td>NPM</td>
            <td>:</td>
            <td>&nbsp;{{ $user->npm }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>&nbsp;{{ $user->email }}</td>
        </tr>
        <tr>
            <td>No HP</td>
            <td>:</td>
            <td>&nbsp;{{ $user->no_hp }}</td>
        </tr>
    </table>
    <p>
        Bahwa yang bersangkutan telah mengisi Formulir Data Alumni dan Tracer Study pada tanggal
        {{ \Carbon\Carbon::parse($tracer->created_at)->translatedFormat('d F Y') }} dan yang bersangkutan benar
        merupakan
        Alumni
        IAIA Al-Aziziyah
        yang lulus pada tahun {{ $user->tahun_lulus }}
    </p>
    <p>
        Demikian surat keterangan ini diberikan, untuk dipergunakan sebagaimana mestinya.
    </p>

    {{-- ttd --}}
    <p style="margin-top: 5rem;float: right; margin-right: 2rem;">
        Samalanga, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
        <br>
        Ketua Tracer Study,
        <br>
        <img src="{{ public_path('image/ttd.jpeg') }}" style="padding: 1rem" width="100">
        <br>
        (Dr. H. Helmi Imran, MA)
    </p>
</body>

</html>