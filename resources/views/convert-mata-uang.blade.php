@extends('layouts.app')
@section('title','Product')

@section('content')

    <div class="container">
        {{-- <form action="" method="post"> --}}
            <label for="">Masukkan jumlah uang</label>
            <input type="text" name="uang" class="form-control">
            <br>
            <input type="submit" value="Pecahkan" class="btn btn-primary">
        {{-- </form> --}}
    </div>

    <script>
        $(document).ready(function(){
            alert('ksdfkjsakl');
        });
    </script>
@endsection
