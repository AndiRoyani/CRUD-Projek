<!-- resources/views/kelola/home.blade.php -->

@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <h2>Daftar Akun</h2>
            <a class="btn btn-primary" href="{{ route('kelola.create') }}">Tambah Akun Baru</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered mt-3">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th width="280px">Aksi</th>
        </tr>
        @foreach ($akuns as $akun)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $akun->name }}</td>
            <td>{{ $akun->email }}</td>
            <td>
                <a class="btn btn-sm btn-info" href="{{ route('kelola.edit', $akun->id) }}">Edit</a>
                <form action="{{ route('kelola.destroy', $akun->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus akun ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $akuns->links() !!}
</div>
@endsection
