<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800"><?=$title; ?></h1>

<div class="row">
    <div class="col-lg-8">

<form action="" method="post">

<div class="form-group row">
<input type="hidden" name="id" value="<?=$userid['id'];?>">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
        <input type="email" class="form-control" id="email" name="email"
        value="<?= $userid['email'];?>" readonly>
    </div>
</div>

<div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="nama" name="nama"
        value="<?= $userid['nama'];?>" readonly>
    </div>
</div>

<div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Status Akun </label>
    <div class="col-sm-10">
    <select class="form-control" id="exampleFormControlSelect1 " name="is_active">
      <option value="1"<?=$userid['is_active']==1 ? "selected" : null?>>Aktif</option>
      <option value="2"<?=$userid['is_active']==2 ? "selected" : null?>>Tidak Aktif</option>
    </select>
    </div>
</div>
<div class="form-group row">
        <div class="col-sm-2">Gambar</div>
        <div class="col-sm-10">
            <div class="row">
                <div class="col-sm-3">
                    <img src="<?= base_url('assets/admin/img/profil/').$userid['image']; ?>" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
            
        </div>
    </div>
</div>
</div>

<div class="form-group row justify-content-end">
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Update</button>
</div>


</div>
    

</form>



</div>
</div>



</div>
</div>