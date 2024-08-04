<div class="card overflow-hidden border-0 shadow rounded-4">
    <div class="card-header bg-success-subtle">
        Berkas Persyaratan Pengurusan Kehilangan KK
    </div>
    <div class="card-body">
        <form action="{{ route('administrasi.pengajuan.kehilangan-kk') }}" method="post" enctype="multipart/form-data">
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
                <label for="surat_kehilangan" class="form-label">
                    Surat Kehilangan dari Polres<font color="red">*</font> (.PDF)
                </label>
                <div class="input-group has-validation">
                    <input type="file"
                        class="form-control rounded-pill @error('surat_kehilangan') is-invalid @enderror"
                        name="surat_kehilangan" accept=".pdf" id="surat_kehilangan">

                    @error('surat_kehilangan')
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
