@extends('layouts.app')

@section('title', 'Daftar Transaksi')

@section('content')
    <h1>Daftar Transaksi</h1>
    <a href="{{ route('kantinwks.index') }}" class="btn btn-primary mb-3">Kembali ke Daftar Barang</a>
        <form action="{{ route('transactions.destroyAll') }}" method="POST" style="display:inline;" onsubmit="  return confirm('Yakin ingin menghapus semua transaksi?');">
    <form action="{{ route('transactions.destroyAll') }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mb-3">Hapus Semua Transaksi</button>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama User</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Tanggal Transaksi</th>
                <th>Gambar Barang</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->user->name }}</td>
                    <td>{{ $transaction->kantinwk->nama_barang }}</td>
                    <td>{{ $transaction->quantity }}</td>
                    <td>{{ $transaction->total_price }}</td>
                    <td>{{ $transaction->created_at }}</td>
                    <td>
                        @if($transaction->kantinwk->image_path)
                            <img src="{{ asset('storage/' . $transaction->kantinwk->image_path) }}" alt="{{ $transaction->kantinwk->nama_barang }}" width="100">
                        @else
                            No image available
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display:inline;">
                            
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
