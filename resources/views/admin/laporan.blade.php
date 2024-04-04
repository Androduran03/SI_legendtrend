@extends('dashboard.layouts.main')
@section('container')
<div class="row">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><i class="bi bi-person-fill"></i>{{ auth()->user()->name }}</h6>
    </div>
    <div class="col-lg-11">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jumlah Pesan</th>
                    <th>Jumlah Harga</th>

                </tr>
            </thead>
            <tbody>
                @if($pesanans->count())
                    @foreach($pesanans as $pesanan )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pesanan->user->name }}</td>
                            <td>{{ $pesanan->alamat_lengkap }}</td>
                            <td>{{ $pesanan->jumlah_minta }}</td>
                            <td>Rp.{{ number_format($pesanan->jumlah_harga) }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">
                            <p class="text-center fs-4">Belum Ada pesanan</p>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
        <a href="/cetaklaporan" class="btn btn-danger btn-sm"><i class="bi bi-printer-fill"></i>Cetak Laporan</a>
    </div>
</div>
@endsection
