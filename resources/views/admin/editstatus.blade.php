@extends('dashboard.layouts.main')
@section('container')
<div class="row">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><i class="bi bi-person-fill"></i>{{ auth()->user()->name }}</h6>

    </div>

    <div class="col-lg-11">

        <form action="/updatestatus/{{ $pesanan->id }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="jumlah_mintah" class="form-label">Jumlah Minta</label>
                <input type="number" min="1" class="form-control" name="jumlah_minta"
                    value="{{ $pesanan->jumlah_minta }}" id="jumlah_mintah"readonly>
            </div>
            <div class="mb-3">
                <label for="jumlah_harga" class="form-label">Jumlah Harga</label>
                <input type="text" class="form-control" name="jumlah_harga" id="jumlah_harga"
                    value="{{ $pesanan->jumlah_harga }}"readonly>
            </div>
            <label for="jumlah_harga" class="form-label">Foto Bukti</label>
            <div class="mb-3">
                <img src="{{ asset('storage/'.$pesanan->bukti) }}" alt="{{ $pesanan->bukti }}"
                    width="300px" height="300px">
            </div>
            <div class="mb-3">
                <select class="form-control" name="status">
                    <option selected><h4 class="fs-5 text-primary">Pilih Status</h4></option>
                    <option value="0">Diproses</option>
                    <option value="1"> Dalam Pengiriman</option>

                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
        @endsection
    </div>
</div>
