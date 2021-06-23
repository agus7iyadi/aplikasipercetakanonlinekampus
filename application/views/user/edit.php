<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800"><?=$title; ?></h1>

<div class="row">
    <div class="col-lg-8">

    <?php echo form_open_multipart('user/edit');?>

<div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
        <input type="email" class="form-control" id="email" name="email"
        value="<?= $user['email'];?>" readonly
        >
    </div>
</div>
<div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama </label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="nama" name="nama"
        value="<?= $user['nama'];?>">
        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>
<div class="form-group row">
        <div class="col-sm-2">Gambar</div>
        <div class="col-sm-10">
            <div class="row">
                <div class="col-sm-3">
                    <img src="<?= base_url('assets/admin/img/profil/').$user['image']; ?>" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="Gambar">Choose file</label>
            </div>
        </div>
    </div>
</div>
</div>

<div class="form-group row justify-content-end">
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Edit</button>
</div>


</div>
    

</form>



</div>
</div>



</div>
</div>