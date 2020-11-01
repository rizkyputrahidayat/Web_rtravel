@extends('layouts.admin')

@section('title')
    HOME | RTRAVEL
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-item-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
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
                            <th>User</th>
                            <th>Visa</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->travel_package->title }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->additional_visa }}</td>
                            <td>{{ $item->transaction_total }}</td>
                            <td>{{ $item->transaction_status }}</td>
                            <td>
                                <a href="{{ route('transaction.show', $item->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i> </a>
                                <a href="{{ route('transaction.edit',$item->id) }}" class="btn btn-info"><i class="fa fa-pencil-alt"></i></a>
                                <form action="{{ route('transaction.destroy', $item->id) }}" method="post" onclick="return confirm('Apakah yakin ingin dihapus?')" class="d-inline">
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