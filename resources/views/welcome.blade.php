<x-app-layout>
    <section id="jumbotron">
        <div class="w-100 text-white d-flex align-items-center"
            style="min-height: 80vh; background-image: linear-gradient(to bottom, rgba(0,0,0,0.8), rgba(0,0,0,0), rgba(0,0,0,0.8)), url({{ URL::asset('assets/img/banner.jpg') }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
            <div class="container d-flex flex-column align-items-center">
                <h1 class="fw-bold">SILAPAN</h1>
                <h6 class="mb-3 text-center w-75">
                    Selamat datang di Sistem Layanan Administrasi Kelurahan Payaman. Layanan ini digunakan untuk
                    memudahkan warga dalam mengakses layanan administrasi kelurahan secara online.
                </h6>

                <a href="{{ route('administrasi') }}" class="btn btn-success rounded-pill" style="width: fit-content">
                    Ajukan Sekarang
                </a>
            </div>
        </div>
    </section>

    <section>
        <div class="bg-success-subtle">
            <div class="container pt-5">
                <h3 class="text-center fw-bold mb-3">Dokumen apa saja yang dapat diurus?</h3>
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-md-2">
                        <div class="d-flex justify-content-center align-items-center fw-semibold p-3">
                            <div class="d-flex flex-column gap-2 align-items-center">
                                <i class="fa-regular fa-memo fs-1"></i>
                                <h5 class="mb-0">
                                    Kartu Keluarga
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-2">
                        <div class="d-flex justify-content-center align-items-center fw-semibold p-3">
                            <div class="d-flex flex-column gap-2 align-items-center">
                                <i class="fa-solid fa-person-breastfeeding fs-1"></i>
                                <h5 class="mb-0">
                                    Akta Kelahiran
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-2">
                        <div class="d-flex justify-content-center align-items-center fw-semibold p-3">
                            <div class="d-flex flex-column gap-2 align-items-center">
                                <i class="fa-regular fa-truck-front fs-1"></i>
                                <h5 class="mb-0">
                                    Pindah Masuk
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-2">
                        <div class="d-flex justify-content-center align-items-center fw-semibold p-3">
                            <div class="d-flex flex-column gap-2 align-items-center">
                                <i class="fa-light fa-truck-plane fs-1"></i>
                                <h5 class="mb-0">
                                    Pindah Keluar
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-2">
                        <div class="d-flex justify-content-center align-items-center fw-semibold p-3">
                            <div class="d-flex flex-column gap-2 align-items-center">
                                <i class="fa-light fa-book-skull fs-1"></i>
                                <h5 class="mb-0">
                                    Akta Kematian
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#d1e7dd" fill-opacity="1"
                d="M0,192L48,176C96,160,192,128,288,138.7C384,149,480,203,576,213.3C672,224,768,192,864,186.7C960,181,1056,203,1152,213.3C1248,224,1344,224,1392,224L1440,224L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
            </path>
        </svg>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <h1 class="fw-bold">Tentang Kami</h1>
                <div class="col-md-6 mb-sm-3 d-md-none">
                    <div>
                        <div class="w-100 rounded-4"
                            style="min-height: 75vh; background-image: linear-gradient(to bottom, rgba(0,0,0,0.9), rgba(0,0,0,0), rgba(0,0,0,0.9)), url({{ URL::asset('assets/img/marketplace.jpg') }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="">
                        <p style="text-align: justify">
                            Selamat datang di aplikasi SILAPAN (Sistem Layanan Administrasi Kelurahan Payaman) adalah
                            solusi digital terbaru yang kami tawarkan untuk mempermudah warga dalam mengurus berbagai
                            keperluan administrasi secara online. Dengan aplikasi ini, warga dapat mengajukan berbagai
                            jenis surat seperti surat keterangan domisili, surat izin usaha, dan lainnya dengan cepat
                            dan mudah.

                            Selain itu, aplikasi kami juga menyediakan layanan pembayaran online untuk berbagai jenis
                            pajak dan retribusi yang berlaku di Kelurahan Payaman. Dengan demikian, warga tidak perlu
                            lagi menghabiskan waktu berharga mereka untuk datang ke kantor kelurahan, karena semua dapat
                            dilakukan melalui aplikasi ini.

                            Kami berkomitmen untuk terus mengembangkan aplikasi ini agar dapat memberikan pelayanan yang
                            lebih baik lagi kepada warga Kelurahan Payaman. Dengan Aplikasi SILAPAN, kami berharap dapat
                            memudahkan hidup warga dan meningkatkan kualitas pelayanan publik di Kelurahan Payaman.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 d-none d-md-block">
                    <div>
                        <div class="w-100 rounded-4"
                            style="min-height: 75vh; background-image: linear-gradient(to bottom, rgba(0,0,0,0.9), rgba(0,0,0,0), rgba(0,0,0,0.9)), url({{ URL::asset('assets/img/marketplace.jpg') }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#d1e7dd" fill-opacity="1"
                d="M0,192L48,176C96,160,192,128,288,138.7C384,149,480,203,576,213.3C672,224,768,192,864,186.7C960,181,1056,203,1152,213.3C1248,224,1344,224,1392,224L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>

        <div class="bg-success-subtle">
            <div class="container pb-5">
                <div class="row">
                    <div class="col-md-6">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15825.434217015538!2d110.21438023044588!3d-7.425513603457938!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a842fcc680c9b%3A0x5027a76e3558900!2sPayaman%2C%20Kec.%20Secang%2C%20Kabupaten%20Magelang%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1714194013736!5m2!1sid!2sid"
                            width="550" height="250" style="border:0; border-radius: 1.5rem" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <h1 class="fw-bold mb-3">Lokasi dan Kontak</h1>

                        <h5>
                            <i class="fa-regular fa-map-location-dot fs-4 me-3"></i> Payaman, Kec. Secang, Kab. Magelang
                        </h5>

                        <h5>
                            <i class="fa-solid fa-phone fs-4 me-3"></i> +62 812-1234-5677
                        </h5>

                        <h5>
                            <i class="fa-solid fa-envelope fs-4 me-3"></i> silapan@test.com
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
