@extends('layouts.app')
@section('title','Product')

@section('content')
    <div class="container">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $error }}    
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endforeach
            @endif
            @if (session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('warning') }}    
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}    
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            @endif
            &nbsp;
        <div class="row">
            <div class="col-md-3">
                <a href="{{route('create-product')}}" class="btn btn-success">Add new Product</a>
            </div>
        </div>
        <br>
        <table class="table table-hover">
            <tr>
                <td>No</td>
                <td>Name</td>
                <td>Harga</td>
                <td>Kategori</td>
                <td>Stok</td>
                <td>Gambar</td>
                <td>Action</td>
            </tr>
            <?php $no = 1; ?>
            @foreach ($products as $product)
            <tr>
                <td>{{$no++}}.</td>
                <td>{{$product->nama}}</td>
                <td>Rp. {{number_format($product->harga)}}</td>            
                <td>{{ucfirst($product->kategori)}}</td>
                <td>{{$product->stok}}</td>
                <td>
                    <img src="{{asset('upload/'.$product->gambar)}}" width="100px" alt="foto">
                </td>
                <td>
                        <a href="" class="btn btn-primary btn-sm">Show</a>
                        <a href="{{route('delete',$product->id)}}" onclick="return confirm('Yakin hapus ini?')" class="btn btn-danger btn-sm delete-laundry"><i class="fas fa-window-close"></i>Delete</a>
                        <a href="{{route('edit',$product->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Edit</a>
                </td>
            </tr>
            @endforeach
            {!! $products->render() !!}
        </table>
    </div>
    <div class="modal modal-fade">

    </div>
@endsection