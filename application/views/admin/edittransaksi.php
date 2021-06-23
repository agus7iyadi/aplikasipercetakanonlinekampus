<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800"><?=$title; ?></h1>

<div class="row">
    <div class="col-lg-8">

<form action="" method="post">

<div class="form-group row">
<input type="hidden" name="id" value="<?=$userid['id'];?>">
        <label for="text" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="email" name="email"
        value="<?= $userid['email'];?>" readonly>
    </div>
</div>


<div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Status Transaksi </label>
    <div class="col-sm-10">
    <select class="form-control" id="exampleFormControlSelect1 " name="status">
      <option value="1"<?=$userid['status']==1 ? "selected" : null?>>Menunggu</option>
      <option value="2"<?=$userid['status']==2 ? "selected" : null?>>Diterima</option>
      <option value="3"<?=$userid['status']==3 ? "selected" : null?>>Ditolak</option>
      <option value="4"<?=$userid['status']==3 ? "selected" : null?>>Selesai</option>
    </select>
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