<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Edit Kategori Artikel</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="card-body">
                    <form
                        action="<?= base_url('admin/kategoriArtikel/proses_edit/' . ($all_data_artikel_kategori['id_kategori'] ?? '')) ?>"
                        method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col">
                                <input type="hidden" name="id_kategori"
                                    value="<?= $all_data_artikel_kategori['id_kategori'] ?? '' ?>">

                                <div class="mb-3">
                                    <label class="form-label">Nama Kategori (ID)</label>
                                    <input type="text" class="form-control" id="name_kategori_id"
                                        name="name_kategori_id"
                                        value="<?= old('name_kategori_id', $all_data_artikel_kategori['name_kategori_id'] ?? '') ?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Nama Kategori (EN)</label>
                                    <input type="text" class="form-control" id="name_kategori_en"
                                        name="name_kategori_en"
                                        value="<?= old('name_kategori_en', $all_data_artikel_kategori['name_kategori_en'] ?? '') ?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Slug (ID)</label>
                                    <input type="text" class="form-control" id="slug_id" name="slug_id"
                                        value="<?= old('slug_id', $all_data_artikel_kategori['slug_id'] ?? '') ?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Slug (EN)</label>
                                    <input type="text" class="form-control" id="slug_en" name="slug_en"
                                        value="<?= old('slug_en', $all_data_artikel_kategori['slug_en'] ?? '') ?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Meta Title (ID)</label>
                                    <input type="text" class="form-control" id="meta_title_id" name="meta_title_id"
                                        value="<?= old('meta_title_id', $all_data_artikel_kategori['meta_title_id'] ?? '') ?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Meta Description (ID)</label>
                                    <textarea class="form-control" id="meta_description_id"
                                        name="meta_description_id"><?= old('meta_description_id', $all_data_artikel_kategori['meta_description_id'] ?? '') ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Meta Title (EN)</label>
                                    <input type="text" class="form-control" id="meta_title_en" name="meta_title_en"
                                        value="<?= old('meta_title_en', $all_data_artikel_kategori['meta_title_en'] ?? '') ?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Meta Description (EN)</label>
                                    <textarea class="form-control" id="meta_description_en"
                                        name="meta_description_en"><?= old('meta_description_en', $all_data_artikel_kategori['meta_description_en'] ?? '') ?></textarea>
                                </div>

                                <div class="row mt-4">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        <a href="<?= base_url('admin/kategoriArtikel') ?>"
                                            class="btn btn-secondary">Batal</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content') ?>