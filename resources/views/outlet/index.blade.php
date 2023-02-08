@extends('adminlte::page')
@section('title', 'Halaman Outlet')

@section('content_header')
   <h1 class="m-0 text-dark">Outlet</h1>
@stop
@section('link')
<li class="breadcrumb-item active">Outlet</li>
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
       <a href="{{route('outlet.create')}}" class="btn btn-md btn-success mx-1 shadow"> <i class="fa fa-lg fa-fw fa-plus"></i> Tambah Outlet</a>
       <br/> <br/>
       <div class="table-responsive">
           <table id="tabel_outlet" class="table table-striped table-hover table-condensed table-bordered">
               <thead>
                   <tr style="background-color: darkgrey">
                       <th>No</th>
                       <th>Nama</th>
                       <th>Alamat</th>
                       <th>No.tlp</th>
                       <th class="text-center" width="70">Aksi</th>
                   </tr>
               </thead>
               <tbody>
               @foreach($outlet as $o)
                   <tr>
                       <td>{{$loop->iteration}}</td>
                       <td>{{$o->nama_outlet}}</td>
                       <td>{{$o->alamat_outlet}}</td>
                       <td>{{$o->tlp_outlet}}</td>
                       <td>
                               <a href="{{route('outlet.edit',$o->id)}}" class="btn btn-sm btn-primary"
                                   title="Edit"><i class="far fa-edit"></i>Edit</a>
                                   <x-adminlte-button class="btn btn-sn btn-danger" label="Delete" data-toggle="modal" data-target="#hapusoutlet{{$loop->iteration}}" icon="far fa-trash-alt" class="bg-danger"> Hapus </x-adminlte-button>
                                       {{-- Custom --}}
                                   <x-adminlte-modal id="hapusoutlet{{$loop->iteration}}" title="Hapus Outlet" size="md" theme="orange"
                                   icon="fas fa-bell" v-centered static-backdrop scrollable>
                                   <div style="height:80px;">
                                       <form action="{{route('outlet.delete',$o->id)}}" method="POST">
                                           @csrf
                                           @method('DELETE')
                                             Apakah anda yakin akan menghapus outlet ini?</div>
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
   <script> $('#tabel_outlet').DataTable();</script>
@stop