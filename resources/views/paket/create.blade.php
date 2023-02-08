@extends('adminlte::page')
@section('title', 'Halaman Tambah Paket')
@section('content_header')
    <h1>Tambah Paket</h1>
@stop
@section('link')
    <li class="breadcrumb-item"><a href="{{ route('paket.index') }}">Paket</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('paket.store') }}">
                @csrf

                <div class="row mb-3">
                    <label for="id_outlet" class="col-md-4 col-form-label textmd-end">{{ __('Outlet') }}</label>
                    <div class="col-md-6">
                        <select id="id_outlet" class="form-control @error('id_outlet') is-invalid @enderror"
                            {{ count($outlet) == 0 ? 'disabled' : '' }} name="id_outlet" required>
                            @if (count($outlet) == 0)
                                <option>Pilihan tidak ada</option>
                            @else
                                @foreach ($outlet as $o)
                                    <option value="{{ $o->id }}">{{ $o->nama_outlet }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @error('id_spp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="jenis_paket" class="col-md-4 col-form-label text-mdend">{{ __('Jenis Paket') }}</label>
                    <div class="col-md-6">
                        <select id="jenis_paket"
                            class="form-control
                        @error('jenis_paket') is-invalid @enderror"
                            name="jenis_paket" required>
                            <option value=""> Pilih Jenis Paket </option>
                            <option value="kiloan"> Kiloan </option>
                            <option value="selimut"> Selimut </option>
                            <option value="bed_cover"> Bed Cover </option>
                            <option value="kaos"> Kaos </option>
                            <option value="lainnya"> lainnya </option>
                        </select>
                        @error('jk_member')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nama_paket" class="col-md-4 col-form-label text-mdend">{{ __('Nama Paket') }}</label>
                    <div class="col-md-6">
                        <input id="nama_paket" type="text"
                            class="form-control
                        @error('nama_paket') is-invalid @enderror"
                            name="nama_paket" value="{{ old('nama_paket') }}" required autocomplete="name" autofocus>
                        @error('nama_paket')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="harga_paket" class="col-md-4 col-form-label text-mdend">{{ __('Harga Paket') }}</label>
                    <div class="col-md-6">
                        <input id="harga_paket" type="text"
                            class="form-control
                       @error('harga_paket') is-invalid @enderror"
                            name="harga_paket" value="{{ old('harga_paket') }}"required autocomplete="harga_paket">
                        @error('harga_paket')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
