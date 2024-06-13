@extends('layouts.template')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" />
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
        }

        #map {
            height: calc(100vh - 56px);
            width: 100%;
            margin: 0;
        }
    </style>
@endsection

<!-- Elemen untuk menampilkan peta -->
@section('content')
    <div id="map"></div>
@endsection


@section('script')
    <script>
        // Membuat peta menggunakan Leaflet
        var map = L.map('map').setView([-8.13333, 111.16667], 10.25);

        // Menambahkan tile layer (misalnya dari OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        /* Tile Basemap */
        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            maxZoom: 19,
            attribution: 'Map data ©️ <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        }).addTo(map);

        var basemap1 = L.tileLayer(
            "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                attribution: '<a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> | <a href="DIVSIGUGM" target="_blank">DIVSIG UGM</a>',
            }
        );

        var basemap2 = L.tileLayer(
            "https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}", {
                attribution: 'Tiles &copy; Esri | <a href="Latihan WebGIS" target="_blank">DIVSIG UGM</a>',
            }
        );

        var basemap3 = L.tileLayer(
            "https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}", {
                attribution: 'Tiles &copy; Esri | <a href="Lathan WebGIS" target="_blank">DIVSIG UGM</a>',
            }
        );

        var basemap4 = L.tileLayer(
            "https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png", {
                attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors',
            }
        );

        basemap4.addTo(map);

        var baseMaps = {
            OpenStreetMap: basemap1,
            "Esri World Street": basemap2,
            "Esri Imagery": basemap3,
            "Stadia Dark Mode": basemap4,
        };

        L.control.layers(baseMaps).addTo(map);

         // marker wisata
         var markerwisata = L.icon({
            iconUrl: 'storage/images/wisata.png',
            iconSize: [30, 30],
            iconAnchor: [15, 30],
            popupAnchor: [0, -30]
        })

        /* Scale Bar */
        L.control
            .scale({
                maxWidth: 150,
                position: "bottomright",
            })
            .addTo(map);
        // Image Watermark
        L.Control.Watermark = L.Control.extend({
            onAdd: function(map) {
                var img2 = L.DomUtil.create("img");
                img2.src = "storage/images/LOGO_SIG_BLUE.png";
                img2.style.width = "150px";
                return img2;
            },
        });
        L.control.watermark = function(opts) {
            return new L.Control.Watermark(opts);
        };
        L.control.watermark({
            position: "bottomright"
        }).addTo(map);

        /* Function to generate a random color */
        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

       // GeoJSON Point
       var point = L.geoJson(null, {
            pointToLayer: function(feature, latlng) {
                return L.marker(latlng, {
                    icon: markerwisata
                });
            },
            onEachFeature: function(feature, layer) {
                var popupContent =
                    "<div style='background-color: #c98226; padding: 15px; border-radius: 5px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); text-align: center; width: 100%; max-width: 250px; height: 50;'>" +
                    "<h5 style='color:#f0efed; margin: 0 0 10px 0;'> <b>" + feature.properties.name +
                    "</b></h5>" +
                    "<p style='color: #f0efed; margin: 0; text-align: center;'> " + feature.properties
                    .description +
                    "</p>" +
                    "<img src='{{ asset('storage/images/') }}/" + feature.properties.image +
                    "' class='img-thumbnail' alt='' width='200' style='margin-top: 10px;'>";
                    "</div>" +

                    "</div>";
                layer.on({
                    click: function(e) {
                        point.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        point.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.points') }}", function(data) {
            point.addData(data);
            map.addLayer(point);
        });


        // Mendefinisikan style berdasarkan REMARK
        function getStyle(feature) {
            switch (feature.properties.REMARK) {
                case 'jalan kolektor':
                    return {
                        color: "#B22222", weight: 3
                    };
                case 'jalan lain':
                    return {
                        color: "#B22222", weight: 2
                    };
                case 'jalan lokal':
                    return {
                        color: "#B22222", weight: 1
                    };
                case 'jalan setapak':
                    return {
                        color: "#B22222", weight: 0.5
                    };
                default:
                    return {
                        color: "#B22222", weight: 1
                    };
            }
        }

        // Membuat layer GeoJSON dengan style dan popup
        var polyline = L.geoJson(null, {
            style: getStyle,
            onEachFeature: function(feature, layer) {
                var popupContent = "Nama: " + feature.properties.name + "<br>" +
                    "Deskripsi: " + feature.properties.description + "<br>" +
                    "Foto: <img src='{{ asset('storage/images/') }}/" + feature.properties.image +
                    "' class='img-thumbnail' alt='...'>" + "<br>" +
                    "<div class='d-flex flex-row mt-3'>" +
                    "<a href='{{ url('edit-polyline') }}/" + feature.properties.id +
                    "' class='btn btn-warning me-2'><i class='fa-solid fa-pen-to-square'></i></a>" +
                    "<form action='{{ url('delete-polyline') }}/" + feature.properties.id +
                    "' method='POST'>" +
                    '{{ csrf_field() }}' +
                    '{{ method_field('DELETE') }}' +
                    "<button type='submit' class='btn btn-danger' onclick='return confirm(\"Yakin Anda akan menghapus data ini?\")'><i class='fa-solid fa-trash-can'></i></button>" +
                    "</form>" +
                    "</div>";
                layer.bindPopup(popupContent);
                layer.on({
                    mouseover: function(e) {
                        layer.bindTooltip(feature.properties.name).openTooltip();
                    }
                });
            }
        });

        // Mengambil data GeoJSON dari URL dan menambahkannya ke peta
        fetch('{{ asset('storage/geojson/jalan_garis.geojson') }}')
            .then(response => response.json())
            .then(data => {
                polyline.addData(data);
                map.addLayer(polyline);
            })
            .catch(error => console.log(error));

        // GeoJSON Polygon
        var polygon = L.geoJson(null, {
            style: function(feature) {
                return {
                    opacity: 1,
                    color: "black",
                    weight: 0.5,
                    fillOpacity: 0.7,
                    fillColor: getRandomColor(),
                };
            },
            onEachFeature: function(feature, layer) {
                var content = "Kecamatan: " + feature.properties.WADMKC;
                layer.on({
                    click: function(e) {
                        // Fungsi ketika objek diklik
                        layer.bindPopup(content).openPopup();
                    },
                    mouseover: function(e) {
                        // Tidak ada perubahan warna saat mouse over
                        layer.bindPopup("Kecamatan " + feature.properties.WADMKC, {
                            sticky: false
                        }).openPopup();
                    },
                    mouseout: function(e) {
                        // Fungsi ketika mouse keluar dari objek
                        layer.resetStyle(e.target); // Mengembalikan gaya garis ke gaya awal
                        map.closePopup(); // Menutup popup
                    },
                });
            }
        });

        // Mengambil data GeoJSON dari URL dan menambahkannya ke layer poligon
        fetch('storage/geojson/Admin_Pacitan.geojson')
            .then(response => response.json())
            .then(data => {
                polygon.addData(data);
                map.addLayer(polygon);
            })
            .catch(error => {
                console.error('Error loading the GeoJSON file:', error);
            });
        //layer control
        var overlayMaps = {
            "Titik Wisata": point,
            "Jalan": polyline,
            "Batas Administrasi": polygon
        };

        var layerControl = L.control.layers(null, overlayMaps).addTo(map);
    </script>
@endsection
