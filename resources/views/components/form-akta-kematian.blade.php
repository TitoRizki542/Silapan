<div class="card overflow-hidden border-0 shadow rounded-4">
    <div class="card-header bg-success-subtle">
        Berkas Persyaratan Pengurusan Akta Kematian
    </div>
    <div class="card-body">
        <form action="{{ route('administrasi.pengajuan.akta-kematian') }}" method="post" enctype="multipart/form-data">
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
                <label for="ktp_meninggal" class="form-label">
                    KTP Orang yang Meninggal<font color="red">*</font> (.PDF)
                </label>
                <div class="input-group has-validation">
                    <input type="file" class="form-control rounded-pill @error('ktp_meninggal') is-invalid @enderror"
                        name="ktp_meninggal" accept=".pdf" id="ktp_meninggal">

                    @error('ktp_meninggal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="ktp_saksi1" class="form-label">
                            KTP Saksi 1<font color="red">*</font> (.PDF)
                        </label>
                        <div class="input-group has-validation">
                            <input type="file"
                                class="form-control rounded-pill @error('ktp_saksi1') is-invalid @enderror"
                                name="ktp_saksi1" accept=".pdf" id="ktp_saksi1">

                            @error('ktp_saksi1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="ktp_saksi2" class="form-label">
                            KTP Saksi 2<font color="red">*</font> (.PDF)
                        </label>
                        <div class="input-group has-validation">
                            <input type="file"
                                class="form-control rounded-pill @error('ktp_saksi2') is-invalid @enderror"
                                name="ktp_saksi2" accept=".pdf" id="ktp_saksi2">

                            @error('ktp_saksi2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
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
                <label for="sk_kematian" class="form-label">
                    Surat Keterangan Kematian dari Desa/Rumah Sakit<font color="red">*</font> (.PDF)
                </label>
                <div class="input-group has-validation">
                    <input type="file" class="form-control rounded-pill @error('sk_kematian') is-invalid @enderror"
                        name="sk_kematian" accept=".pdf" id="sk_kematian">

                    @error('sk_kematian')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="form_pengajuan" class="form-label">
                    Formulir Pengajuan<font color="red">*</font> (Excel atau .xlsx/.xls)
                </label>
                <div class="input-group has-validation">
                    <input type="file"
                        class="form-control rounded-pill @error('form_pengajuan') is-invalid @enderror"
                        name="form_pengajuan" accept=".xlsx,xls" id="form_pengajuan">

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
