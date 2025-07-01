<div class="container-fluid">
    <!--begin::Row-->
    <div class="row g-4">
        <!--begin::Col-->
        <div class="col-md-12">
            <!--begin::Quick Example-->
            <div class="card card-primary card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header">
                    <div class="card-title">Form Data Barang</div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <?php echo form_open_multipart('welcome/tangkap_barang'); ?>
                <!--begin::Body-->
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kode Barang</label>
                        <input type="text" class="form-control" name="kode">
                        <div id="emailHelp" class="form-text">
                            Inputkan kode barang
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupFile02">Harga</label>
                        <input type="text" class="form-control" name="harga">
                    </div>
                </div>
                <!--end::Body-->
                <!--begin::Footer-->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <!--end::Footer-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Quick Example-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
</div>