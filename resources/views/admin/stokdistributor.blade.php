@extends('dashboard.layouts.main')
@section('container')
<div class="row">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

        @if(Request::is('pesananbaru'))

        @else
            <h6 class="m-0 font-weight-bold text-primary">Distributor: {{ $user->name }}</h6>
        @endif

    </div>

    <div class="col-lg-12">
        <div class="my-3">
            <a href="/admin" class="btn btn-primary btn-sm" class="my-3"><i
                    class="bi bi-arrow-left-circle"></i>Kembali</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat Lengkap</th>
                    <th>Jumlah Pesan</th>
                    <th>Jumlah Harga</th>
                    <th>Status</th>
                    <th>Bukti</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <tbody>
                @if($pesanans->count())


                    @foreach($pesanans as $pesanan )
                        @php
                            $total_jumlahharga[]=$pesanan->jumlah_harga

                        @endphp
                        @php
                            $total_jumlahpesan[]=$pesanan->jumlah_minta
                        @endphp
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $pesanan->user->name }}
                            </td>
                            <td>
                                {{ $pesanan->alamat_lengkap }}
                            </td>
                            <td>
                                {{ $pesanan->jumlah_minta }}
                            </td>
                            <td>
                                Rp.{{ number_format($pesanan->jumlah_harga) }}
                            </td>

                            @if($pesanan->status==0)
                                <td>{{ "Belum bayar" }}</td>
                            @else
                                <td>{{ "Dalam Pengiriman" }}</td>
                            @endif
                            @if($pesanan->bukti)
                                <td>
                                    <img src="{{ asset('storage/'.$pesanan->bukti) }}"
                                        target="_blank" alt="$pesanan->bukti" width="50" height="50">
                                </td>
                            @else
                                <td>
                                    {{ "belum Upload" }}
                                </td>
                            @endif
                            @if($pesanan->status==0)
                                <td>
                                    <a href="/editstatus/{{ $pesanan->id }}" class="btn btn-primary btn-sm">Ubah
                                        Status</a>
                                </td>
                            @else
                                <td>
                                    <a href="#" onclick="return confirm('Status Telah Di Ubah')"
                                        class="btn btn-success btn-sm"><i class="bi bi-check"></i>Telah Ubah
                                        Status</a>
                                </td>
                            @endif

                        </tr>

                    @endforeach
                    <tr>
                        <th colspan="3">Total Keseluruan</th>
                        <th>{{ @array_sum($total_jumlahpesan ) }}</th>

                        <th>Rp.{{ number_format(@array_sum($total_jumlahharga)) }}</th>
                    </tr>
            </tbody>
        @else
            <td>
                <h6>Belum Ada Pesanan</h6>
            </td>
            @endif

        </table>

    </div>
</div>
@endsection
