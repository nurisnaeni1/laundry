@extends('adminlte::page')
@section('title', 'Halaman Edit Outlet')
@section('content_header')
   <h1>Edit Outlet</h1>
@stop
@section('link')
<li class="breadcrumb-item"><a href="{{route('outlet.index')}}">Outlet</a></li>
<li class="breadcrumb-item">Edit</li>
<li class="breadcrumb-item active">{{$outlet->nama_outlet}}</li>
@stop
@section('content')
<div class="card">
   <div class="card-body">
       <form method="POST" action="{{ route('outlet.update',$outlet->id) }}" >
           @csrf
           @method('PUT')
           <br/>
           
           <div class="row mb-3">
            <label for="nama_outlet" class="col-md-4 col-form-label text-mdend">{{ __('Nama Outlet') }}</label>
                <div class="col-md-6">
                    <input id="nama_outlet" type="text" class="form-control
                     @error('nama_outlet') is-invalid @enderror" name="nama_outlet" value="{{ $outlet->nama_outlet }}" required autocomplete="name" autofocus>
                        @error('nama_outlet')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
        </div>

        <div class="row mb-3">
            <label for="alamat_outlet" class="col-md-4 col-form-label text-md-end">{{ __('Alamat Outlet') }}</label>
                <div class="col-md-6">
                    <input id="alamat_outlet" type="text" class="form-control
                    @error('alamat_outlet') is-invalid @enderror" name="alamat_outlet" value="{{ $outlet->alamat_outlet }}"required autocomplete="alamat_outlet" autofocus>
                        @error('alamat_outlet')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
        </div>
        <div class="row mb-3">
            <label for="tlp_outlet" class="col-md-4 col-form-label text-mdend">{{ __('Telpon Outlet') }}</label>
                <div class="col-md-6">
                    <input id="tlp_outlet" type="text" class="form-control
                    @error('tlp_outlet') is-invalid @enderror" name="tlp_outlet" value="{{ $outlet->tlp_outlet }}"required autocomplete="tlp_outlet">
                        @error('tlp_outlet')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
        </div>
        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                     Perbarui
                </button>
        </div>
    </div>
</form>
</div>
</div>
@endsection