<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        .dashboard-container {
            background-image: url('storage/images/Watukarung.jpg'); /* Ganti dengan path gambar yang sesuai */
            background-size: cover;
            background-position: center;
            padding: 40px 0; /* Sesuaikan padding agar konten tetap terlihat baik */
            color: #333; /* Warna teks */
        }

        .card {
            background-color: rgba(255, 255, 255, 0.9); /* Warna latar belakang kartu dengan transparansi */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Efek bayangan kartu */
        }

        .card-header {
            background-color: #f8f9fa; /* Warna latar belakang header kartu */
            border-bottom: 1px solid #ddd; /* Garis pemisah */
            padding: 10px 15px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-title {
            font-size: 20px;
            margin-bottom: 0;
        }

        .alert {
            margin-bottom: 20px;
        }

        .alert h4 {
            margin-bottom: 5px;
        }
    </style>

    <div class="dashboard-container">
        <div class="container">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h3 class="card-title"><b>Feature On Map</b> </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="alert alert-primary" role="alert">
                                <h4><i class="fa-solid fa-location-dot"></i> Total Titik Pariwisata</h4>
                                <p style="font-size: 28pt" id="totalPoints">{{ $total_points }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="alert alert-success" role="alert">
                                <h4><i class="fa-solid fa-route"></i> Total Jalan</h4>
                                <p style="font-size: 28pt" id="totalPolylines">{{ $total_polylines }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="alert alert-warning" role="alert">
                                <h4><i class="fa-solid fa-draw-polygon"></i> Total Area</h4>
                                <p style="font-size: 28pt" id="totalPolygons">{{ $total_polygons }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <p> Anda Login Sebagai <b>{{ Auth::user()->name }}</b> dengan email
                    <i>{{Auth::user()->email}}</i></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add an animate on scroll effect
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                } else {
                    entry.target.classList.remove('show');
                }
            });
        });

        const hiddenElements = document.querySelectorAll('.hidden');
        hiddenElements.forEach((el) => observer.observe(el));
    </script>
</x-app-layout>
