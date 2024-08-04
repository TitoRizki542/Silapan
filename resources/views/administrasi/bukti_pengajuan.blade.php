<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pengajuan Saya</title>
    <style>
        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .header {
            margin-leftft: 4px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 1px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header img {
            height: 100px;
            margin-right: 20px;
        }

        .header div {
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            text-transform: uppercase;
        }

        .header h2 {
            margin: 0;
            font-size: 20px;
            text-transform: uppercase;
        }

        .header h3 {
            margin: 0;
            font-size: 18px;
            text-transform: uppercase;
        }

        .header p {
            margin: 0;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="header">
        <div>
            <h1>PEMERINTAH KABUPATEN MAGELANG</h1>
            <h2>KECAMATAN SECANG</h2>
            <h3>DESA PAYAMAN</h3>
            <p>Jalan Raya Payaman No. 79 Telp. (0293)367167 Kode Pos 56195</p>
        </div>
    </div>

    <h2 style="text-align: center; margin-bottom: 0px"> Data Pengajuan</h2>
    <div class="row">
        <div class="col">
            <p style="text-align: center; margin-bottom: 0px"> No Tiket : {{ $pengajuan->no_tiket }}</p>
            <p style="text-align: center; margin-bottom: 0px"> Pengajuan @formatUnderscore($pengajuan->jenis_pengajuan->value)</p>

        </div>
    </div>

    <div class="row">
        <h2 style="margin-bottom: 0px"> Data Diri</h2>
        <div class="col">
            <p>Nama Lengkap : {{ auth()->user()->user_detail->nama_depan }}
                {{ auth()->user()->user_detail->nama_belakang }}</p>
            <p> Jenis Pengajuan : </p>

            <p>NIK :
                {{ auth()->user()->user_detail->nik }}</p>
            <p>Tanggal Lahir : {{ auth()->user()->user_detail->tanggal_lahir }}</p>

            <p>Alamat : Desa {{ auth()->user()->user_detail->kelurahan_desa }} RT{{ auth()->user()->user_detail->rt }},
                RW{{ auth()->user()->user_detail->rw }}, Kecamatan {{ auth()->user()->user_detail->kecamatan }}</p>
            <p>Agama : {{ auth()->user()->user_detail->agama }}</p>
            <p>No HP : {{ auth()->user()->user_detail->no_hp }}</p>
            <p>Email : {{ auth()->user()->email }}</p>
        </div>
    </div>

    <div class="row">
        <h2 style="margin-bottom: 0px">Proses Pengajuan</h2>
        <div class="col">
            <p>Anda telah berhasil melakukan pengajuan, harap tunggu untuk memproses pengajuan anda.
            </p>
            <p>Estimasi : 2-3 hari</p>
        </div>
    </div>

    <div class="row">

    </div>

</body>

</html>
