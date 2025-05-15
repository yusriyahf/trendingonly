<?= $this->extend('penulis/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Ubah Profil Perusahaan</h1>
        <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-danger" role="alert">
                <h4>Error</h4>
                <p><?php echo session()->getFlashdata('error'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (session()->has('success')) : ?>
            <div class="alert alert-success">
                <?= session('success') ?>
            </div>
        <?php endif; ?>

        <div class="row gy-4">
            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start mb-4 mt-4">
                <div class="app-card-body px-4 w-100">
                    <form action="<?= base_url('penulis/profil/proses_edit'); ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <div class="mb-3 mt-4">
                            <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="<?= esc($profil_pengguna['nama_perusahaan']); ?>" required>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('penulis/dashboard'); ?>" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div><!--//app-card-body-->
            </div><!--//app-card-->
        </div><!--//row-->
    </div><!--//container-xl-->
</div><!--//app-content-->

<?= $this->endSection(); ?>