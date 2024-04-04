@extends('dashboard.layouts.main')
@section('container')
<div class="row">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><i class="bi bi-person-fill"></i>{{ auth()->user()->name }}</h6>
    </div>
    <div class="col-lg-11">
        <div class="col-lg-8 mt-4">
            <form action="/pesanan" method="post">
                @csrf

                <div class="mb-3 row">
                    <label for="jumlah_minta" class="col-sm-2 col-form-label">Jumlah Pesan</label>
                    <div class="col-sm-10">
                        <input type="number" min="1" class="form-control" id="jumlah_minta" name="jumlah_minta"
                            required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="harga" class="col-sm-2 col-form-label">Harga/Item</label>
                    <div class="col-sm-10">
                        <input type="number" min="1" class="form-control" id="harga" name="harga"
                            value="{{ $barang->harga }}" readonly>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary mb-4">Pesan</button>

            </form>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jumlah Pesan</th>
                    <th>Jumlah Harga</th>
                    <th>Status Pesanan</th>
                    <th>Bukti</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($pesanans->count())
                    @foreach($pesanans as $pesanan )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pesanan->jumlah_minta }}</td>
                            <td>Rp.{{ number_format($pesanan->jumlah_harga) }}</td>
                            @if($pesanan->status==0)
                                <td>{{ "Di proses" }}</td>
                            @else
                                <td>{{ "Dalam Pengiriman" }}</td>
                            @endif


                            @if($pesanan->bukti)
                                <td>
                                    <img src="{{ asset('storage/'.$pesanan->bukti) }}"
                                        target="_blank" alt="$pesanan->bukti" width="50" height="50">
                                </td>
                                <td><a href="#" onclick="return confirm('Bukti Sudah Di upload')"
                                        class="btn btn-success btn-sm"><i class="bi bi-check"></i> Sudah ada bukti</a>
                                </td>
                            @else
                                <td>
                                    {{ "belum Upload" }}
                                </td>

                                <td>
                                    <a href="/pesanan/{{ $pesanan->id }}" class="btn btn-primary btn-sm">
                                        <i class="bi bi-arrow-right-circle"></i>Selanjutnya</a>
                                    <a href="/pesanan/{{ $pesanan->id }}/edit" class="btn btn-warning btn-sm"><i
                                            class="bi bi-pencil-square"></i></a>
                                    <form action="/pesanan/{{ $pesanan->id }}"method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin Ingin Hapus')"><i
                                                class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            @endif
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

    </div>
</div>

@endsection
