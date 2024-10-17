<!-- resources/views/kelola/edit.blade.php -->

@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <h2>Edit Akun</h2>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kelola.update', $akun->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" name="name" class="form-control" value="{{ $akun->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $akun->email }}">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah password">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kelola.home') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
