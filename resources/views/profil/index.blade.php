@extends('dashboard.layouts.main')
@section('container')
<div class="row">
    <div class="col-lg-6 mt-4">
        <div class="card">
            <div class="card-header text-center">
                <h2><i class="bi bi-person-circle"></i></h2>
            </div>
            <div class="card-body ">
                <table class="table">
                    <tr>
                        <td>Nama</td>
                        <td>{{ $profil->name }}</td>
                    </tr>
                    <tr>
                        <td>No Hp</td>
                        <td>{{ $profil->phone }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{ $profil->address }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $profil->email }}</td>
                    </tr>

                </table>
                <tr>
                    <td><a href="/profil/edit/{{ $profil->id }}" class="btn btn-primary btn-sm"><i
                                class="bi bi-pencil-square mx-1"></i>Edit Profil</a></td>
                </tr>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mt-4">
        <div class="card">
            <div class="card-header">
                <span>
                    <h4>Ganti Password</h4>
                </span>
            </div>
            <div class="card-body">
                <form action="/resetpassword/{{ $profil->id }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Baru</label>
                        <input type="password" class="form-control @error('password')is-invalid @enderror"
                            name="password" id="password" name="password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="konfirmasi" class="form-label">Konfirmasi</label>
                        <input type="password" class="form-control" id="konfirmasi" name="konfirmasi" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-arrow-repeat"></i>Update
                        Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
