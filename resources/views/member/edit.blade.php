@extends('adminlte::page')
@section('title', 'Halaman Edit Outlet')
@section('content_header')
   <h1>Edit Member</h1>
@stop
@section('link')
<li class="breadcrumb-item"><a href="{{route('member.index')}}">Member</a></li>
<li class="breadcrumb-item">Edit</li>
<li class="breadcrumb-item active">{{$member->nama_member}}</li>
@stop
@section('content')
<div class="card">
   <div class="card-body">
       <form method="POST" action="{{ route('member.update',$member->id) }}" >
           @csrf
           @method('PUT')
           <br/>
           
           <div class="row mb-3">
            <label for="nama_member" class="col-md-4 col-form-label text-mdend">{{ __('Nama Member') }}</label>
                <div class="col-md-6">
                    <input id="nama_member" type="text" class="form-control
                     @error('nama_member') is-invalid @enderror" name="nama_member" value="{{ $member->nama_member }}" required autocomplete="name" autofocus>
                        @error('nama_member')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
        </div>

        <div class="row mb-3">
            <label for="alamat_member" class="col-md-4 col-form-label text-md-end">{{ __('Alamat Member') }}</label>
                <div class="col-md-6">
                    <input id="alamat_member" type="text" class="form-control
                    @error('alamat_member') is-invalid @enderror" name="alamat_member" value="{{ $member->alamat_member }}"required autocomplete="alamat_outlet" autofocus>
                        @error('alamat_member')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
        </div>
        <div class="row mb-3">
            <label for="tlp_member" class="col-md-4 col-form-label text-mdend">{{ __('Telpon Member') }}</label>
                <div class="col-md-6">
                    <input id="tlp_member" type="text" class="form-control
                    @error('tlp_member') is-invalid @enderror" name="tlp_member" value="{{ $member->tlp_member }}"required autocomplete="tlp_outlet">
                        @error('tlp_member')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="jk_member" class="col-md-4 col-form-label text-mdend">{{ __('Jenis Kelamin') }}</label>
                <div class="col-md-6">
                    <select id="jk_member"
                        class="form-control
                    @error('jk_member') is-invalid @enderror"
                        name="jk_member" required>
                        <option value=""> Pilih Jenis Kelamin member</option>
                        <option value="pria"> Pria </option>
                        <option value="perempuan"> Perempuan </option>
                    </select>
                    @error('jk_member')
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