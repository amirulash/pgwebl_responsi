<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container py-12">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="card-title">Data</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="alert alert-primary" role="alert">
                            <h4><i class="fa-solid fa-location-dot"></i> Total Point</h4>
                            <p style="font-size: 28pt" id="totalPoints">{{ $total_points }}</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="alert alert-success" role="alert">
                            <h4><i class="fa-solid fa-route"></i> Total Polyline</h4>
                            <p style="font-size: 28pt" id="totalPolylines">{{ $total_polylines }}</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="alert alert-warning" role="alert">
                            <h4><i class="fa-solid fa-draw-polygon"></i> Total Polygon</h4>
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

        // Add a counter effect
        const totalPointsElement = document.getElementById('totalPoints');
        const totalPolylinesElement = document.getElementById('totalPolylines');
        const totalPolygonsElement = document.getElementById('totalPolygons');

        const totalPoints = parseInt(totalPointsElement.textContent);
        const totalPolylines = parseInt(totalPolylinesElement.textContent);
        const totalPolygons = parseInt(totalPolygonsElement.textContent);

        let count1 = 0;
        let count2 = 0;
        let count3 = 0;

        const countUp1 = setInterval(() => {
            count1++;
            totalPointsElement.textContent = count1;

            if (count1 === totalPoints) {
                clearInterval(countUp1);
            }
        }, 10);

        const countUp2 = setInterval(() => {
            count2++;
            totalPolylinesElement.textContent = count2;

            if (count2 === totalPolylines) {
                clearInterval(countUp2);
            }
        }, 10);

        const countUp3 = setInterval(() => {
            count3++;
            totalPolygonsElement.textContent = count3;

            if (count3 === totalPolygons) {
                clearInterval(countUp3);
            }
        }, 10);
    </script>

    <style>
        .hidden {
            opacity: 0;
            filter: blur(5px);
            transform: translateX(-100%);
            transition: all 1s;
        }

        .show {
            opacity: 1;
            filter: blur(0);
            transform: translateX(0);
        }
    </style>
</x-app-layout>

