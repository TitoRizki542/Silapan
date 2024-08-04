<x-app-layout>
    <section>
        <div class="w-100 text-white d-flex align-items-center justify-content-center"
            style="min-height: 40vh; background-image: linear-gradient(to bottom, rgba(0,0,0,0.8), rgba(219, 146, 146, 0), rgba(0,0,0,0.8)), url({{ URL::asset('assets/img/borobudur-bg.jpg') }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
            <div class="">
                <h1 class="fw-bold">Formulir</h1>
                <h6 class="text-center">
                    <a href="{{ route('home') }}" class="link-light text-decoration-none">Home</a> /
                    <span>Formulir</span>
                </h6>
            </div>
        </div>
    </section>

    <section>
        <div class="container py-5">
            {{-- Perhatian --}}
            <div class="row mb-3">
                <div class="col-md">
                    <div class="card shadow rounded-4">
                        <div class="card-body">
                            <h5 class="fw-semibold text-warning">
                                <i class="fa-regular fa-triangle-exclamation"></i>
                                Perhatian
                            </h5>
                            <p class="mb-0">
                                Perhatikan berkas persyaratan yang dibutuhkan. Apabila terdapat berkas yang sudah
                                disediakan template-nya, maka download segera dan isi formulir dengan benar. Terimakasih
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md">
                    <div class="accordion shadow rounded-4" id="accordionExample">
                        <div class="accordion-item rounded-top-4 overflow-hidden">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#akta_kelahiran" aria-expanded="true"
                                    aria-controls="akta_kelahiran">
                                    Akta Kelahiran
                                </button>
                            </h2>
                            <div id="akta_kelahiran" class="accordion-collapse collapse show"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul>
                                        <li>
                                            Surat keterangan lahir rumah sakit / bidan
                                        </li>
                                        <li>KTP orang tua bayi</li>
                                        <li>2 KTP Saksi</li>
                                        <li>KK (Kartu Keluarga)</li>
                                        <li>Buku Nikah</li>
                                        <li>Formulir Pengajuan</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Akta Kematian
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    <ul>
                                        <li>KTP yang Meninggal</li>
                                        <li>2 KTP Saksi</li>
                                        <li>KK (Kartu Keluarga)</li>
                                        <li>Surat Keterangan Kematian dari Desa/Rumah Sakit</li>
                                        <li>Formulir Pengajuan</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#pindah_datang" aria-expanded="false" aria-controls="pindah_datang">
                                    Pindah Datang
                                </button>
                            </h2>
                            <div id="pindah_datang" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul>
                                        <li>
                                            SPWNI (Surat Keterangan Pindah Warga Negara Indonesia) dari Kabupaten Asal
                                        </li>
                                        <li>KTP</li>
                                        <li>
                                            Buku Nikah (pindah datang karena ikut suami/istri wajib
                                            dilampirkan jika tidak kk akan berdiri sendiri, OPSIONAL)
                                        </li>
                                        <li>Akta Kelahiran</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#pindah_keluar" aria-expanded="false" aria-controls="pindah_keluar">
                                    Pindah Keluar
                                </button>
                            </h2>
                            <div id="pindah_keluar" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul>
                                        <li>KTP</li>
                                        <li>KK</li>
                                        <li>Alamat Jelas Tujuan</li>
                                        <li>Formulir Pengajuan</li>
                                        <li>Buku Nikah (jika pindah karena nikah wajib dilampirkan) (Opsional)</li>
                                        <li>
                                            Surat Pernyataan Orang Tua (bagi anak dibawah 17 tahun pindah kk
                                            sendiri)(Opsional)
                                        </li>
                                        <li>
                                            Surat Pernyataan Dari Pasangan (Jika dalam satu kk, suami atau istri mau
                                            pindah sendiri tanpa mengikutkan anggota lain)
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>

                        <div class="accordion-item rounded-bottom-4 overflow-hidden">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#kehilangan_kk" aria-expanded="false" aria-controls="kehilangan_kk">
                                    Kehilangan KK
                                </button>
                            </h2>
                            <div id="kehilangan_kk" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul>
                                        <li>Surat Kehilangan dari Polres</li>
                                        <li>KTP (Opsional)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item rounded-bottom-4 overflow-hidden">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#berkas_lainya" aria-expanded="false" aria-controls="berkas_lainya">
                                    Berkas Lainya
                                </button>
                            </h2>
                            <div id="berkas_lainya" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul>
                                        <li>
                                            Formulir Pelaporan Pencatatan Sipil Di Wilayah NKRI (Download <a
                                                href="{{ route('download', 'catatan-sipil') }}">Disini</a>)
                                        </li>
                                        <li>
                                            Formulir Biodata Keluarga (Download <a
                                                href="{{ route('download', 'biodata-keluarga') }}">Disini</a>)
                                        </li>
                                        <li>
                                            Surat Pengantar SKCK (Download <a
                                                href="{{ route('download', 'skck') }}">Disini</a>)
                                        </li>
                                        <li>
                                            Surat Keterangan Belum Menikah (Download <a
                                                href="{{ route('download', 'belum-menikah') }}">Disini</a>)
                                        </li>
                                        <li>
                                            Surat Keterangan Tidak Mampu (Download <a
                                                href="{{ route('download', 'tidak-mampu') }}">Disini</a>)
                                        </li>
                                        <li>
                                            Surat Keterangan Usaha (Download <a
                                                href="{{ route('download', 'usaha') }}">Disini</a>)
                                        </li>
                                        <li>
                                            Surat Keterangan (Download <a
                                                href="{{ route('download', 'sk') }}">Disini</a>)
                                        </li>
                                        <li>
                                            Surat Keterangan Kehilangan (Download <a
                                                href="{{ route('download', 'kehilangan') }}">Disini</a>)
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
