@extends('adminlte::page')
@section('title', 'Halaman Member')

@section('content_header')
    <h1 class="m-0 text-dark">Member</h1>
@stop
@section('link')
    <li class="breadcrumb-item active">Member</li>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <x-adminlte-alert theme="success" title="Sukses">
                    {{ session('status') }}
                </x-adminlte-alert>
            @endif
            @if ($errors->any())
                <x-adminlte-alert theme="success" title="Sukses">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </x-adminlte-alert>
            @endif
            <a href="{{ route('member.create') }}" class="btn btn-md btn-success mx-1 shadow"> <i
                    class="fa fa-lg fa-fw fa-plus"></i> Tambah Member</a>
            <br /> <br />
            <div class="table-responsive">
                <table id="tabel_user" class="table table-striped table-hover table-condensed table-bordered">
                    <thead>
                        <tr style="background-color: darkgrey">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No.tlp</th>
                            <th>Jenis Kelamin</th>
                            <th class="text-center" width="70">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($member as $m)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $m->nama_member }}</td>
                                <td>{{ $m->alamat_member }}</td>
                                <td>{{ $m->tlp_member }}</td>
                                <td>{{ $m->jk_member }}</td>
                                <td>
                                    <a href="{{ route('member.edit', $m->id) }}" class="btn btn-sm btn-primary"
                                        title="Edit"><i class="far fa-edit"></i>Edit</a>
                                    <x-adminlte-button class="btn btn-sn btn-danger" label="Delete" data-toggle="modal"
                                        data-target="#hapusmember{{ $loop->iteration }}" icon="far fa-trash-alt"
                                        class="bg-danger"> Hapus </x-adminlte-button>
                                    {{-- Custom --}}
                                    <x-adminlte-modal id="hapusmember{{ $loop->iteration }}" title="Hapus Member"
                                        size="md" theme="orange" icon="fas fa-bell" v-centered static-backdrop
                                        scrollable>
                                        <div style="height:80px;">
                                            <form action="{{ route('member.delete', $m->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                Apakah anda yakin akan menghapus member ini?
                                        </div>
                                        <x-slot name="footerSlot">
                                            <x-adminlte-button type="submit" class="mr-auto" theme="primary"
                                                label="Hapus" />
                                            <x-adminlte-button theme="danger" label="Batal" data-dismiss="modal" />
                                            </form>
                                        </x-slot>
                                    </x-adminlte-modal>
                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@stop
@section('plugins.Datatables', true)
@section('js')
    <script>
        $('#tabel_user').DataTable();
    </script>
@stop
