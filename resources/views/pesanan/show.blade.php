@extends('dashboard.layouts.main')
@section('container')
<div class="row">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><i class="bi bi-person-fill"></i>{{ auth()->user()->name }}</h6>
    </div>

    <div class="col-lg-12 mt-4">
        <div class="col-lg-6">
            <h4>Informasi</h4>
            <p>Silahkan transfer melaului rekening <span>BANK BNI : 081232572980</span> atas nama : <span>BUDI
                    SETYAWAN</span></p>

        </div>
        <div class="col-lg-6 mt-4">
            <form action="/uploadbukti/{{ $pesanan->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="jumlah_mintah" class="form-label">Jumlah Pesan</label>
                    <input type="number" min="1" class="form-control" name="jumlah_minta"
                        value="{{ $pesanan->jumlah_minta }}" id="jumlah_mintah" readonly>
                </div>
                <div class="mb-3">
                    <label for="jumlah_harga" class="form-label">Total Harga</label>
                    <input type="text" class="form-control" name="jumlah_harga" id="jumlah_harga"
                        value="{{ $pesanan->jumlah_harga }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                    <div class="form-floating">
                        <textarea class="form-control @error('alamat_lengkap')is-invalid @enderror"
                            name="alamat_lengkap" placeholder=" Masukan alamat lengkap" id="floatingTextarea2"
                            style="height: 100px" value="{{ old('alamat_lengkap') }}"></textarea>
                        @error('alamat_lengkap')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>
                </div>

                <div class="mb-3">
                    <label for="bukti" class="form-label">Upload Bukti Pembayaran</label>
                    <input class="form-control @error('bukti')is-invalid @enderror" type="file" id="bukti" name="bukti"
                        required>
                    @error('bukti')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror
                </div>




                <button type="submit" class="btn btn-primary mb-4">Kirim</button>

            </form>
        </div>


    </div>
</div>
@endsection
