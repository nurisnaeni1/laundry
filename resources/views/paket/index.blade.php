@extends('adminlte::page')
@section('title', 'Halaman Paket')

@section('content_header')
   <h1 class="m-0 text-dark">Paket</h1>
@stop
@section('link')
<li class="breadcrumb-item active">Paket</li>
@stop

@section('content')
<div class="card">
   <div class="card-body">
       @if (session('status'))
           <x-adminlte-alert theme="success" title="Sukses">
               {{session('status')}}
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
       <a href="{{route('paket.create')}}" class="btn btn-md btn-success mx-1 shadow"> <i class="fa fa-lg fa-fw fa-plus"></i> Tambah Paket</a>
       <br/> <br/>
       <div class="table-responsive">
           <table id="tabel_paket" class="table table-striped table-hover table-condensed table-bordered">
               <thead>
                   <tr style="background-color: darkgrey">
                       <th>No</th>
                       <th>Outlet </th>
                       <th>Jenis</th>
                       <th>Nama Paket</th>
                       <th>Harga</th>
                       <th class="text-center" width="70">Aksi</th>
                   </tr>
               </thead>
               <tbody>
               @foreach($paket as $p)
               {{-- @dd($p->toArray()) --}}
                   <tr>
                       <td>{{$loop->iteration}}</td>
                       <td>{{$p->outlet->nama_outlet}}</td>
                       <td>{{$p->jenis_paket}}</td>
                       <td>{{$p->nama_paket}}</td>
                       <td>{{$p->harga_paket}}</td>
                       <td>
                               <a href="{{route('paket.edit',$p->id)}}" class="btn btn-sm btn-primary"
                                   title="Edit"><i class="far fa-edit"></i>Edit</a>
                                   <x-adminlte-button class="btn btn-sn btn-danger" label="Delete" data-toggle="modal" data-target="#hapuspaket{{$loop->iteration}}" icon="far fa-trash-alt" class="bg-danger"> Hapus </x-adminlte-button>
                                       {{-- Custom --}}
                                   <x-adminlte-modal id="hapuspaket{{$loop->iteration}}" title="Hapus Paket" size="md" theme="orange"
                                   icon="fas fa-bell" v-centered static-backdrop scrollable>
                                   <div style="height:80px;">
                                       <form action="{{route('paket.delete',$p->id)}}" method="POST">
                                           @csrf
                                           @method('DELETE')
                                             Apakah anda yakin akan menghapus paket ini?</div>
                                   <x-slot name="footerSlot">
                                       <x-adminlte-button type="submit" class="mr-auto" theme="primary" label="Hapus"/>
                                       <x-adminlte-button theme="danger" label="Batal" data-dismiss="modal"/>
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
   <script> $('#tabel_user').DataTable();</script>
@stop