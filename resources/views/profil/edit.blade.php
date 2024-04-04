@extends('dashboard.layouts.main')
@section('container')
<div class="row">

    <div class="col-lg-8 mt-4">
        <div class="card">
            <div class="card-header text-center">
                <h2><i class="bi bi-person-circle"></i></h2>
            </div>
            <div class="card-body ">

                <form action="/profil/{{ $profil->id }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('name')
                                is-invalid @enderror" id="name" name="name" value="{{ $profil->name }}">
                            @error('name')
                                <div class=" invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class=" mb-3 row">
                        <label for="phone" class="col-sm-2 col-form-label">No Hp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('phone')
                                    is-invalid @enderror" id="phone" name="phone" value=" {{ $profil->phone }}">
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('address')
                                    is-invalid @enderror" id="address" name="address"
                                value=" {{ $profil->address }}">
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control @error('email')
                                    is-invalid @enderror" id="email" name="email" value=" {{ $profil->email }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>




                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-arrow-repeat"></i>Update
                        Profil</button>
                </form>

            </div>
        </div>
    </div>

</div>
@endsection
