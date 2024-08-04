<div class="card overflow-hidden border-0 shadow rounded-4">
    <div class="card-header bg-success-subtle">
        Berkas Persyaratan Pengurusan Pindah Keluar
    </div>
    <div class="card-body">
        <form action="{{ route('administrasi.pengajuan.pindah-keluar') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="surat_pengantar" class="form-label">
                    Surat Pengantar<font color="red">*</font> (.PDF)
                </label>
                <div class="input-group has-validation">
                    <input type="file"
                        class="form-control rounded-pill @error('surat_pengantar') is-invalid @enderror"
                        name="surat_pengantar" accept=".pdf" id="surat_pengantar">

                    @error('surat_pengantar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="ktp" class="form-label">
                    KTP<font color="red">*</font> (.PDF)
                </label>
                <div class="input-group has-validation">
                    <input type="file" class="form-control rounded-pill @error('ktp') is-invalid @enderror"
                        name="ktp" accept=".pdf" id="ktp">

                    @error('ktp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="kartu_keluarga" class="form-label">
                    Kartu Keluarga<font color="red">*</font> (.PDF)
                </label>
                <div class="input-group has-validation">
                    <input type="file"
                        class="form-control rounded-pill @error('kartu_keluarga') is-invalid @enderror"
                        name="kartu_keluarga" accept=".pdf" id="kartu_keluarga">

                    @error('kartu_keluarga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="alamat_tujuan" class="form-label">
                    Alamat Jelas Tujuan<font color="red">*</font>
                </label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control rounded-pill @error('alamat_tujuan') is-invalid @enderror"
                        name="alamat_tujuan" id="alamat_tujuan" placeholder="Masukan alamat tujuan disini..">

                    @error('alamat_tujuan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="buku_nikah" class="form-label">
                    Buku Nikah (Opsinal, wajib dilampikan apabila pindah karena menikah)
                    (.PDF)
                </label>
                <div class="input-group has-validation">
                    <input type="file" class="form-control rounded-pill @error('buku_nikah') is-invalid @enderror"
                        name="buku_nikah" accept=".pdf" id="buku_nikah">

                    @error('buku_nikah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="surat_pernyataan_orang_tua" class="form-label">
                    Surat Pernyataan Orang Tua (Wajib, bagi anak dibawah 17 tahun) (.PDF)
                </label>
                <div class="input-group has-validation">
                    <input type="file"
                        class="form-control rounded-pill @error('surat_pernyataan_orang_tua') is-invalid @enderror"
                        name="surat_pernyataan_orang_tua" accept=".pdf" id="surat_pernyataan_orang_tua">

                    @error('surat_pernyataan_orang_tua')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="surat_pernyataan_pasangan" class="form-label">
                    Surat Pernyataan Pasangan (Wajib, jika dalam satu kk, suami atau istri mau pindah sendiri tanpa
                    mengikutkan anggota lain) (.PDF)
                </label>
                <div class="input-group has-validation">
                    <input type="file"
                        class="form-control rounded-pill @error('surat_pernyataan_pasangan') is-invalid @enderror"
                        name="surat_pernyataan_pasangan" accept=".pdf" id="surat_pernyataan_pasangan">

                    @error('surat_pernyataan_pasangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="form_pengajuan" class="form-label">
                    Form Pengajuan<font color="red">*</font> (.xlsx atau .xls)
                </label>
                <div class="input-group has-validation">
                    <input type="file"
                        class="form-control rounded-pill @error('form_pengajuan') is-invalid @enderror"
                        name="form_pengajuan" accept=".xlsx,.xls" id="form_pengajuan">

                    @error('form_pengajuan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="d-flex gap-3 align-items-center">
                <button class="btn btn-success rounded-pill">Selanjutnya</button>

                <div>
                    <p class="mb-0 text-muted">
                        <font color="red">*</font>) Wajib diisi.
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>
