<?= $this->extend('penulis/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Edit Artikel</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="card-body">

                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger" role="alert">
                            <h4>Error</h4>
                            <p><?php echo session()->getFlashdata('error'); ?></p>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('penulis/berita/proses_edit/' . $artikel['id_artikel']) ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id_artikel" value="<?= $artikel['id_artikel'] ?>">

                        <div class="row">
                            <div class="col">
                                <!-- Input untuk Judul Artikel dalam Bahasa Indonesia -->
                                <div class="mb-3">
                                    <label class="form-label">Judul Artikel (ID) <br><span class="custom-color custom-label">Judul Artikel hanya boleh mengandung huruf dan angka</span></label>
                                    <input type="text" class="form-control" id="judul_id" name="judul_id" value="<?= old('judul_id', $artikel['judul_id']) ?>" required>
                                </div>

                                <!-- Input untuk Judul Artikel dalam Bahasa Inggris -->
                                <div class="mb-3">
                                    <label class="form-label">Judul Artikel (EN) <br><span class="custom-color custom-label">Judul Artikel hanya boleh mengandung huruf dan angka</span></label>
                                    <input type="text" class="form-control" id="judul_en" name="judul_en" value="<?= old('judul_en', $artikel['judul_en']) ?>" required>
                                </div>

                                <!-- Input untuk Konten Artikel dalam Bahasa Indonesia -->
                                <div class="mb-3">
                                    <label class="form-label">Konten Artikel (ID)</label>
                                    <textarea class="form-control tiny" id="konten_id" name="konten_id"><?= old('konten_id', $artikel['konten_id']) ?></textarea>
                                </div>

                                <!-- Input untuk Konten Artikel dalam Bahasa Inggris -->
                                <div class="mb-3">
                                    <label class="form-label">Konten Artikel (EN)</label>
                                    <textarea class="form-control tiny" id="konten_en" name="konten_en"><?= old('konten_en', $artikel['konten_en']) ?></textarea>
                                </div>

                                <!-- Input untuk Kategori Artikel -->
                                <div class="mb-3">
                                    <label class="form-label">Kategori Artikel <br>
                                        <span class="custom-color custom-label">Pilih salah satu kategori Artikel yang tersedia</span>
                                    </label>
                                    <select class="form-select" id="id_kategori" name="id_kategori" required>
                                        <option value="" disabled>Pilih Kategori Artikel</option>
                                        <?php foreach ($all_data_kategori as $kategori): ?>
                                            <option value="<?= esc($kategori['id_kategori']) ?>" <?= (old('id_kategori', $artikel['id_kategori']) == $kategori['id_kategori'] ? 'selected' : '') ?>>
                                                <?= esc($kategori['nama_kategori_id']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Input untuk Thumbnail Artikel -->
                                <div class="mb-3">
                                    <label class="form-label">Thumbnail Artikel</label>
                                    <input class="form-control <?= ($validation && $validation->hasError('thumbnail')) ? 'is-invalid' : '' ?>" type="file" id="thumbnail" name="thumbnail">
                                    <?php if (!empty($artikel['thumbnail'])) : ?>
                                        <div class="mt-2">
                                            <img src="<?= base_url('assets/img/artikel/' . $artikel['thumbnail']) ?>" width="150" class="img-thumbnail">
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" name="hapus_thumbnail" id="hapus_thumbnail" value="1">
                                                <label class="form-check-label" for="hapus_thumbnail">
                                                    Hapus thumbnail saat ini
                                                </label>
                                            </div>
                                            <input type="hidden" name="thumbnail_lama" value="<?= $artikel['thumbnail'] ?>">
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($validation && $validation->hasError('thumbnail')) : ?>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('thumbnail') ?>
                                        </div>
                                    <?php endif; ?>
                                    <small class="text-muted">*Ukuran gambar maksimal 572x572 pixels</small><br>
                                    <small class="text-muted">*Format gambar harus berekstensi jpg/png/jpeg</small>
                                </div>

                                <!-- Input untuk Tags -->
                                <div class="mb-3">
                                    <label class="form-label">Tags (ID) <br><span class="custom-color custom-label">Pisahkan dengan koma (contoh: teknologi,ai,digital)</span></label>
                                    <input type="text" class="form-control" id="tags_id" name="tags_id" value="<?= old('tags_id', $artikel['tags_id']) ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tags (EN) <br><span class="custom-color custom-label">Separate with comma (e.g: technology,ai,digital)</span></label>
                                    <input type="text" class="form-control" id="tags_en" name="tags_en" value="<?= old('tags_en', $artikel['tags_en']) ?>">
                                </div>

                                <!-- Input untuk Meta Data -->
                                <div class="mb-3">
                                    <label class="form-label">Meta Title (ID)</label>
                                    <input type="text" class="form-control" id="meta_title_id" name="meta_title_id" placeholder="Masukkan Meta Title (ID)" value="<?= old('meta_title_id', $artikel['meta_title_id']) ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description (ID)</label>
                                    <textarea class="form-control" id="meta_description_id" name="meta_description_id" placeholder="Masukkan Meta Description (ID)"><?= old('meta_description_id', $artikel['meta_description_id']) ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Title (EN)</label>
                                    <input type="text" class="form-control" id="meta_title_en" name="meta_title_en" placeholder="Masukkan Meta Title (EN)" value="<?= old('meta_title_en', $artikel['meta_title_en']) ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description (EN)</label>
                                    <textarea class="form-control" id="meta_description_en" name="meta_description_en" placeholder="Masukkan Meta Description (EN)"><?= old('meta_description_en', $artikel['meta_description_en']) ?></textarea>
                                </div>

                                <!-- Input untuk Published At -->
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Publikasi</label>
                                    <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="<?= old('published_at', date('Y-m-d\TH:i', strtotime($artikel['published_at']))) ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('penulis/artikel') ?>" class="btn btn-secondary">Batal</a>
                            </div>
                            <div class="col">
                                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo session()->getFlashdata('success') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!--//app-card-->
        </div><!--//row-->

        <hr class="my-4">
    </div><!--//container-fluid-->
</div><!--//app-content-->

<?= $this->endSection('content'); ?>