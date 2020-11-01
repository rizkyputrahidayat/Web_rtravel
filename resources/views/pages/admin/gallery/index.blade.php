@extends('layouts.admin')

@section('title')
    HOME | RTRAVEL
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-item-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Gallery</h1>
        <a href="{{ route('gallery.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i>
            Tambah Gallery
        </a>
    </div>
    
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    @if (session('sukses'))
                        <div class="alert-bootstrap">
                            <div class="alert alert-success" role="alert">
                                {{ session('sukses') }}
                            </div>
                        </div>
                    @endif
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Travel</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                <img src="{{ Storage::url($item->image) }}" alt="Picture" style="width: 150px"
                                    class="img-thumbnail"/>
                            </td>
                            <td>
                                <a href="{{ route('gallery.edit',$item->id) }}" class="btn btn-info"><i class="fa fa-pencil-alt"></i></a>
                                <form action="{{ route('gallery.destroy', $item->id) }}" method="post" onclick="return confirm('Apakah yakin ingin dihapus?')" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    Data Tidak Ditemukan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>
<!-- /.container-fluid -->
@endsection