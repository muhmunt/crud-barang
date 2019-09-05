@extends('layouts.app')
@section('title','Edit Product')

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
    <form action="{{route('update',$product->id)}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <h3>Edit Product</h3>
    <br>
    <div class="row mx-auto">
            <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" placeholder="Masukkan nama" name="name" class="form-control" value="{{$product->nama}}">
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="" for="inlineFormInputGroup">Harga</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp.</div>
                        </div>
                        <input type="number" class="form-control" name="harga" id="inlineFormInputGroup" placeholder="85000" value="{{$product->harga}}">                    
                    </div>
                </div>
            </div>
            <div class="row mx-auto">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <input type="text" name="kategori" placeholder="Masukkan kategori" class="form-control" value="{{$product->kategori}}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Stok</label>
                        <input type="number" placeholder="Masukkan jumlah stok" name="stok" class="form-control" value="{{$product->stok}}">
                    </div>
                </div>
            </div>
            <div class="row mx-auto">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" name="foto" id="input-foto" class="form-control">
                        <input type="hidden" name="fotolama" value="{{$product->gambar}}">
                        {{-- <img src="" class="" id="preview-foto" alt="foto" width="300px"> --}}
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
    </div>
    </form>
</div>

@endsection