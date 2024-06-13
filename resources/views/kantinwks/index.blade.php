@extends('layouts.app')

@section('title', 'Kantinwk Admin')

@section('content')
    <h1>Kantinwk Admin</h1>
    <a href="{{ route('kantinwks.create') }}" class="btn btn-primary mb-3">Tambahkan barang</a>
    <a href="{{ route('transactions.index') }}" class="btn btn-info mb-3">Daftar Transaksi</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Pemasok</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Harga Barang</th>
                <th>Jumlah Barang</th>
                <th>Gambar</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kantinwks as $kantinwk)
                <tr>
                    <td>{{ $kantinwk->nama_pemasok }}</td>
                    <td>{{ $kantinwk->nama_barang }}</td>
                    <td>{{ $kantinwk->jenis_barang }}</td>
                    <td>{{ $kantinwk->harga_barang }}</td>
                    <td>{{ $kantinwk->jumlah_barang }}</td>
                    <td>
                        @if($kantinwk->image_path)
                            <img src="{{ asset('storage/' . $kantinwk->image_path) }}" alt="{{ $kantinwk->nama_barang }}" width="100">
                        @else
                            No image available
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('kantinwks.edit', $kantinwk) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kantinwks.destroy', $kantinwk) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
