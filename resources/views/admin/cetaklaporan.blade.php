<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Pesanan</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width:95%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Almat</th>
                    <th>Jumlah Pesan</th>
                    <th>Jumlah Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pesanans as $pesanan )

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pesanan->user->name }}</td>
                        <td>{{ $pesanan->alamat_lengkap }}</td>
                        <td>{{ $pesanan->jumlah_minta }}</td>
                        <td>Rp. {{ number_format($pesanan->jumlah_harga) }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    <script type="text/javascript">
        window.print();

    </script>
</body>

</html>
