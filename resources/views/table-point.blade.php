@extends('layouts.template')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header text-center">
                <h2> Daftar Destinasi Wisata</h2>
            </div>
            <style>
                .card-header {
                    background-color: #137c86;
                    /* Warna biru, ganti dengan warna yang Anda inginkan */
                    color: rgb(10, 10, 10);
                    /* Warna teks putih, ganti dengan warna yang Anda inginkan */
                    padding: 10px;
                    border-radius: 5px 5px 0 0;
                    /* Opsional: untuk sudut yang membulat pada bagian atas */
                }

                .card-header h2 {
                    color: white;
                    /* Mengubah warna teks h2 menjadi putih */
                }
            </style>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="example">
                    <thead>
                        <tr>
                            <th>No </th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Coordinate</th>
                            <th>Image</th>
                            <th>Created at</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1 @endphp
                        @foreach ($points as $p)
                            @php
                                $geometry = json_decode($p->geom);
                            @endphp
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->description }}</td>
                                <td>{{ $geometry->coordinates[1] . ', ' . $geometry->coordinates[0] }}</td>
                                <td>
                                    <img src="{{ asset('storage/images/' . $p->image) }}" alt="" width="200">
                                </td>
                                <td>{{ date_format($p->created_at, 'D, d M Y, H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
@endsection
@section('script')
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#example');
    </script>
@endsection
