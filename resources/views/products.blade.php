@extends('layouts.app')

@section('title', 'Products')

@section('content')
<table>
    <tr>
        <th>Nama</th>
        <th>Harga</th>
        <th>Deskripsi</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>Rp{{ number_format($product->price) }}</td>
        <td>{{ $product->description }}</td>
    </tr>
    @endforeach
</table>
@endsection