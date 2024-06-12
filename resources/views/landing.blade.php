<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SISPAR PACITAN</title>
    <link rel="stylesheet" href="storage/css/style.css" />

    <!-- Tab browser icon -->
    <link rel="icon" type="image/x-icon" href="storage/imagess/img/logo/logo-pacitan.png" />
    <!--Bootstrap Icons-->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" />

    /
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <!-- Navbar Website -->
    <nav>
        <div class="layar-dalam">
            <div class="logo">
                <a href=""><img src="storage/images/logo-white.png" class="putih" /></a>
                <a href=""><img src="storage/images/logo-black.png" class="hitam" /></a>
            </div>
            <div class="menu">
                <a href="#" class="tombol-menu">
                    <span class="garis"></span>
                    <span class="garis"></span>
                    <span class="garis"></span>
                </a>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#aboutus">About </a></li>
                    <li><a href="#support">Support</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#team">Profile</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Video  -->
    <div class="layar-penuh">
        <header id="home">
            <div class="overlay"></div>
            <video autoplay muted loop>
                <source src="storage/images/cinematic_Pacitan.mp4" type="video/mp4" />
            </video>
            <div class="intro">
                <h3>Visit Pacitan</h3>
                <p>
                    Pesona kota 1001 Goa
                </p>
                <p>
                    <a href="{{ route('index-public') }}"class="tombol">Get to Know</a>
                </p>
            </div>
        </header>

        <!-- About Us -->
        <main>
            <section id="aboutus">
                <div class="layar-dalam">
                    <h3>About </h3>
                    <h1 class="ringkasan">
                        KABUPATEN PACITAN
                    </h1>
                    <div class="konten-isi">
                        <p>
                            Pacitan (Jawa: Hanacaraka: ꦥꦕꦶꦠꦤ꧀, Pegon: ڤاچيتان) adalah sebuah wilayah kabupaten yang
                            terletak di
                            Provinsi Jawa Timur, Indonesia. Ibu kotanya adalah Kecamatan Pacitan Kota. Pada zaman
                            Hindia-Belanda,
                            daerah ini disebut Kawedanan Pacitan yang terkenal dengan tujuan wisatanya.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Support -->
            <section class="abuabu" id="support">
                <div class="layar-dalam support">
                    <div>
                        <img src="storage/images/Pantai.png" />
                        <h6>Pesona Keindahan Pantai</h6>
                        <p>
                            Pantai-pantai Pacitan memiliki keindahan yang beragam, seperti pantai berpasir putih yang
                            bersih,
                            tebing karang yang menjulang tinggi, hingga pantai dengan air terjun dengan muara ke laut
                        </p>
                    </div>
                    <div>
                        <img src="storage/images/culinary.png" />
                        <h6>Kekayaan Kuliner</h6>
                        <p>
                            Pacitan terkenal dengan sajian kulinernya yang beragam dan lezat seperti
                            Soto Pacitan, Tahu Ikan Tuna, Punten, Nasi Tiwul, Sale Anggur, Jadah Bakar, dan Kupat Tahu
                            yang wajib
                            dicoba wisatawan
                        </p>
                    </div>
                    <div>
                        <img src="storage/images/Cave.png" />
                        <h6>Kota 1001 Goa</h6>
                        <p>
                            Pacitan dikenal dengan julukan “Kota Seribu Gua” karena banyaknya gua yang terbentuk akibat
                            proses
                            karstifikasi.
                            Beberapa Goa tersebut seperti Goa Gong, Goa Tabuhan, Goa Song Terus, dan
                            Goa Luweng Jaran.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Gallery -->
            <section id="gallery">
                <div><img src="storage/images/Kasap.jpg" /></div>
                <div><img src="storage/images/Kijingan.JPG" /></div>
                <div><img src="storage/images/Watukarung.jpg" /></div>
                <div><img src="storage/images/GoaGong.jpg" /></div>
                <div><img src="storage/images/Srau.jpg" /></div>
                <div><img src="storage/images/BanyuTibo.jpg" /></div>
                <div><img src="storage/images/Goa.jpg" /></div>
                <div><img src="storage/images/LuwengJaran.jpg" /></div>
            </section>

            <!-- Quote -->
            <section class="quote">
                <div class="layar-dalam">
                    <p>Pesona Pacitan Surga Dunia Tempat Kelahiran SBY.</p>
                </div>
            </section>

            <!-- Team -->
            <section id="team">
                <div class="layar-dalam">
                    <h3>My Profile</h3>

                    <div class="tim">
                        <div>
                            <img src="storage/images/Profile.JPG" />
                            <h6>Amirul Fahmi A</h6>
                            <span>D4 SIG UGM</span>
                        </div>
                    </div>
                </div>
            </section>

            <!--Contacts-->
            <section id="contacts">
                <div class="layar-dalam">
                    <div class="row text-center mb-3">
                        <div class="col">
                            <h2>Contact Me</h2>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" aria-describedby="name" />
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email"
                                        aria-describedby="email" />
                                </div>
                                <div class="mb-3">
                                    <label for="pesan" class="form-label">Pesan</label>
                                    <textarea class="form-control" id="pesan" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!--Akhir Contacts-->

            <!-- Footer -->
            <footer id="contact">

                <div class="layar-dalam">
                    <div class="copyright">&copy; 2023 Sistem Informasi Pariwisata Pacitan</div>
                </div>
            </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="storage/js/javascript.js"></script>
</body>

</html>
