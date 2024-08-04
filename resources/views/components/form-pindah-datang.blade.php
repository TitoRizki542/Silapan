<div class="card overflow-hidden border-0 shadow rounded-4">
    <div class="card-header bg-success-subtle">
        Berkas Persyaratan Pengurusan Pindah Datang
    </div>
    <div class="card-body">
        <form action="{{ route('administrasi.pengajuan.pindah-datang') }}" method="post" enctype="multipart/form-data">
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
                <label for="skpwni" class="form-label">
                    SKPWNI (Surat Keterangan Pindah Warga Negara Indonesia)
                    dari Kabupaten Asal<font color="red">*</font>(.PDF)
                </label>
                <div class="input-group has-validation">
                    <input type="file" class="form-control rounded-pill @error('skpwni') is-invalid @enderror"
                        name="skpwni" accept=".pdf" id="skpwni">

                    @error('skpwni')
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
                <label for="buku_nikah" class="form-label">
                    Buku Nikah (Opsinal, wajib dilampikan apabila ikut suami/istri. Jika tidak, KK akan berdiri sendiri)
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
                <label for="akta_kelahiran" class="form-label">
                    Akta Kelahiran<font color="red">*</font> (.PDF)
                </label>
                <div class="input-group has-validation">
                    <input type="file"
                        class="form-control rounded-pill @error('akta_kelahiran') is-invalid @enderror"
                        name="akta_kelahiran" accept=".pdf" id="akta_kelahiran">

                    @error('akta_kelahiran')
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
                        <font color="red">*</font>) Wajib Diisi.
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>
