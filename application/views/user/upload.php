
<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800"> <?=$title; ?> </h1>

<div class="row">
    <div class="col-lg-8">
    <?=$this->session->flashdata('message'); ?>
<?php echo form_open_multipart('user/upload') ?>

<div class="form-group row">
    <!-- untuk mengambil email -->
    <div class="col-sm-10">
        <input type="hidden"   class="form-control" id="email" name="email" placeholder="Nama user" value="<?= $user['email'];?>">
    </div>
</div>
<div class="form-group row">
    <!-- untuk mengambil email -->
    <div class="col-sm-10">
    <input type="hidden"  class="form-control" id="jumlahtotal" name="jumlahtotal">
    </div>
</div>

<div class="form-group row">
    <label for="varchar" class="col-sm-2 col-form-label">Judul Order</label>
    <div class="col-sm-10">
    
        <input type="text"  class="form-control" id="judulorderan" name="fjudulorderan" placeholder="judul Orderan" value="<?=set_value('fjudulorderan')?>">
        <?= form_error('fjudulorderan', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>
<div class="form-group row">
    <label for="varchar" class="col-sm-2 col-form-label">Pengambilan</label>
    <div class="col-sm-10">
    <select class="form-control" id="exampleFormControlSelect2" name="fpilihan">
    <option value="1">Ambil Sendiri</option>
    <option value="2">Dikirim</option>
    </select>
    </div>
</div>
<div class="form-group row">
    <label for="varchar" class="col-sm-2 col-form-label">Pilihan Paket</label>
    <div class="col-sm-10">
    <select class="form-control" id="exampleFormControlSelect2" name="fpaket">
    <option value="1">Paket Standar</option>
    <option value="2">Paket Cepat</option>
    </select>
    </div>
</div>
<div class="form-group row">
        <label for="varchar" class="col-sm-2 col-form-label">Print Berwarna</label>
    <div class="col-sm-10">
        <input type="number" min="0" class="form-control" id="kertaswarna" name="fkertaswarna" placeholder="Jumlah Print Berwarna">
        <?= form_error('fkertaswarna', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>
<div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Print Hitam Putih </label>
    <div class="col-sm-10">
        <input type="number" min="0" class="form-control" id="kertaswarnahitam" name="fkertaswarnahitam"
        placeholder="Jumlah Print hitam Putih">
        <?= form_error('fkertaswarnahitam', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label" >Deskripsi Tambahan Orderan </label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" id="deskripsi" name="fdeskripsi" placeholder="Deskripsi Tambahan Orderan.." value="<?=set_value('fdeskripsi')?>"></textarea>
    <?= form_error('fdeskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div class="form-group row">
        <label for="varchar" class="col-sm-2 col-form-label">Upload Di sini </label>
        <div class="col-sm-10">
            <div class="custom-file">
                <input type="file" class="custom-file-input"  name="filename" required>
                <label class="custom-file-label" for="Gambar">Choose file</label>
                <p><b>NB: file harus bertype pdf|doc|docx|. ukuran maksimal 10 MB.</b></p>
            </div>
       
</div>
</div>

<div class="form-group row justify-content-end">
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Kirim</button>
        <button type="submit" class="btn btn-danger">Reset</button>
        </div>
</div>
</form>
<?php echo form_close() ?>
</div>
</div>
</div>
</div>
