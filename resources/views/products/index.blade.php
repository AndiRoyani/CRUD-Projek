@extends('products.layout')

@section('content')
<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="custom-title animated-title">Daftar Produk</h2>
                <a class="btn btn-success custom-btn" href="{{ route('products.create') }}">Buat Produk Baru</a>
                <a class="btn btn-success custom-btn" href="{{ route('kelola.home') }}">Kelola Akun</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped shadow-lg">
            <thead class="thead-dark">
                <tr class="bg-primary text-white">
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Tentang Produk</th>
                    <th width="280px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr class="bg-light">
                    <td>{{ ++$i }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ Str::limit($product->detail, 50) }}</td> <!-- Membatasi panjang detail -->
                    <td>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            
                            <a class="btn custom-btn btn-sm" href="{{ route('products.edit', $product->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn custom-btn btn-sm" onclick="return confirm('Anda yakin ingin menghapus produk ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {!! $products->links() !!}
</div>

<style>
    /* Styling tambahan */
    .table thead th {
        background: linear-gradient(90deg, #00c6ff, #0072ff);
        color: #fff;
        border-bottom: 2px solid #ddd;
    }
    
    .table tbody tr:hover {
        background-color: #f1f1f1;
        transition: background-color 0.3s ease;
    }

    .table-hover tbody tr:hover {
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .table td, .table th {
        padding: 15px;
        text-align: center;
        vertical-align: middle;
    }

    .btn-sm {
        font-size: 14px;
        padding: 5px 10px;
    }

    /* Custom styling for title */
    .custom-title {
        font-size: 3rem;
        font-weight: bold;
        background: linear-gradient(90deg, #ff7e5f, #feb47b); /* gradient effect */
        background-size: 200% 200%; /* for gradient animation */
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); /* adds shadow for depth */
        text-align: center;
        animation: glow 1.5s infinite alternate, gradientMove 4s infinite; /* glow + gradient animation */
    }

    /* Keyframes for glow animation */
    @keyframes glow {
        from {
            text-shadow: 2px 2px 10px rgba(255, 126, 95, 0.7), 2px 2px 20px rgba(254, 180, 123, 0.5);
        }
        to {
            text-shadow: 2px 2px 20px rgba(255, 126, 95, 0.9), 2px 2px 30px rgba(254, 180, 123, 0.7);
        }
    }

    /* Keyframes for animated gradient */
    @keyframes gradientMove {
        0% {
            background-position: 0% 50%;
        }
        100% {
            background-position: 100% 50%;
        }
    }

    /* Fade-in effect */
    .animated-title {
        opacity: 0;
        transform: scale(0.9); /* scale down at start */
        animation: fadeIn 2s forwards, scaleUp 2s forwards; /* animation for fade-in and scaling up */
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
        }
    }

    @keyframes scaleUp {
        to {
            transform: scale(1); /* scaling up to original size */
        }
    }

    /* Custom button styling */
    .custom-btn {
        background: linear-gradient(90deg, #00c6ff, #0072ff); /* Gradien warna */
        color: white;
        padding: 10px 20px;
        font-size: 1rem; /* Ukuran font lebih kecil untuk tombol kecil */
        font-weight: bold;
        border: none;
        border-radius: 30px; /* Membulatkan sudut */
        box-shadow: 0 4px 15px rgba(0, 114, 255, 0.4); /* Shadow untuk tombol */
        transition: transform 0.3s ease, box-shadow 0.3s ease; /* Animasi saat hover */
    }

    .custom-btn:hover {
        transform: translateY(-3px); /* Naik saat hover */
        box-shadow: 0 6px 20px rgba(0, 114, 255, 0.6); /* Shadow lebih besar saat hover */
        background: linear-gradient(90deg, #0072ff, #00c6ff); /* Membalikkan gradien saat hover */
    }

    /* Background transition */
    body {
        transition: background-color 2s ease;
    }
</style>

<script>
    // JavaScript to change the background color every 5 seconds
    const colors = ['#ff9999', '#99ccff', '#ffcc99', '#ccff99', '#ffccff']; // Array of colors
    let index = 0;

    setInterval(() => {
        document.body.style.backgroundColor = colors[index];
        index = (index + 1) % colors.length; // Loop through the colors
    }, 5000); // Change every 5000 milliseconds (5 seconds)
</script>
@endsection
