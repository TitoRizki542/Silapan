<div class="card overflow-hidden border-0 shadow rounded-4">
    <div class="card-header bg-success-subtle">
        Berkas Persyaratan Pengurusan Pengantar Kehilangan
    </div>
    <div class="card-body">
        <form action="{{ route('administrasi.pengajuan.pengantar-kehilangan') }}" method="post"
            enctype="multipart/form-data">
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
                    KTP (.PDF)
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
