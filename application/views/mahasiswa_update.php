<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('welcome'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('mahasiswa'); ?>">Data Mahasiswa</a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
                    </ol>
                </div>
            </div>
        </div></section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Form Edit Mahasiswa</h3>
                        </div>
                        <?= form_open('mahasiswa/update'); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="npm">NPM</label>
                                <input type="text" class="form-control" id="npm" name="npm" value="<?= $mahasiswa->npm; ?>" readonly>
                                </div>
                            <div class="form-group">
                                <label for="nama_mahasiswa">Nama Mahasiswa</label>
                                <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" value="<?= $mahasiswa->nama_mahasiswa; ?>" placeholder="Masukkan Nama Mahasiswa" required>
                            </div>
                            <div class="form-group">
                                <label for="id_p">Program Studi</label>
                                <select class="form-control" id="id_p" name="id_p" required>
                                    <option value="">-- Pilih Program Studi --</option>
                                    <?php foreach ($prodi as $_prodi) : ?>
                                        <option value="<?= $_prodi->id_p; ?>" <?= ($_prodi->id_p == $mahasiswa->id_p) ? 'selected' : ''; ?>>
                                            <?= $_prodi->nama_prodi; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Update</button>
                            <a href="<?= base_url('mahasiswa'); ?>" class="btn btn-secondary">Batal</a>
                        </div>
                        <?= form_close(); ?>
                    </div>
                    </div>
                </div>
            </div>
        </section>
    </div>