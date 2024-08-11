<div class="login-box pt-12">
	<!-- /.login-logo -->
		<style>
	.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 70%;
}
	</style>
	<img src="http://cat-prakom.com/assets/logo/logo.png"  class="center"/>

	<div class="login-box-body">
		<div class="row">
            <div class="col-sm-12">
            <?= form_open_multipart('Auth/aksi_register'); ?>
                <div class="form-group">
				<?php 
				$digits = 3;
$no_peserta = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
				?>
                    <label for="nama_dosen">No Peserta</label>
                    <input type="text" class="form-control" name="no" readonly placeholder="Nomor Peserta" value="<?= "CAT-".$no_peserta;?>">
                    <small class="help-block"></small>
                </div>
				<div class="form-group">
				<?php 
				$ref = $this->uri->segment(3);
				?>
                    <input type="hidden" class="form-control" name="ref" readonly placeholder="Referral" value="<?= $ref;?>">
                    <small class="help-block"></small>
                </div>
				<div class="form-group">
                    <label for="nama_dosen">Email</label>&nbsp;<small>* Wajib</small>
                    <input required type="email" class="form-control" name="email" placeholder="Email" required>
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="nip">No. HP</label>&nbsp;<small>* Wajib</small>
                    <input required type="number" class="form-control" name="nik" placeholder="No. HP" minlength="11" maxlength="13" required>
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="nama_dosen">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="nama_dosen">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat" placeholder="Tempat Lahir" required>
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="nama_dosen">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir" required>
                    <small class="help-block"></small>
                </div>
              <div class="form-group">
                    <label for="nama_dosen">Jenis Kelamin</label>
                    <select type="text" class="form-control" name="jk" placeholder="Jenis Kelamin" required>
                        <option>--Pilih Jenis Kelamin--</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="nama_dosen">Pekerjaan</label>
                    <select type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan" required>
                        <option>--Pilih Pekerjaan--</option>
                        <option value="Non-ASN">Non-ASN</option>
						<option value="Pegawai Swasta">Pegawai Swasta</option>
                        <option value="Wirausana">Wirausaha</option>
                        <option value="Belum Bekerja">Belum Bekerja</option>
						<option value="Lainnya">Lainnya</option>
                    </select>
                    <small class="help-block"></small>
                </div>
				 <div class="form-group">
                    <label for="nama_dosen">Alamat</label>
                    <textarea type="text" class="form-control" name="alamat" placeholder="Alamat" required></textarea>
                    <small class="help-block"></small>
                </div>
				 <div class="form-group">
                    <label for="nama_dosen">Formasi Jabatan/Kelas</label>
                    <select type="text" class="form-control" name="kelas" placeholder="Kelas" required>
                        <option>--Pilih Jabatan--</option>
                        <?php
$query = $this->db->query("SELECT * FROM jurusan WHERE aktif='1' ORDER BY no_urut ASC");
?>
    <?php foreach ($query->result() as $row) : ?>
        <option value="<?= $row->id_kelas_jurusan ?>"><?= $row->nama_jurusan ?></option>
    <?php endforeach; ?>
                    </select>
                    <small class="help-block"></small>
                </div>
  <div class="form-group">
                    <label for="nama_dosen">Melamar di Instansi Mana ?</label>
					<br/><small>ex : Pemkot Medan/Pemprov Bali/KPK/Kemenag/DPR RI</small>
                    <input type="text" class="form-control" name="melamar" placeholder="contoh : Pemkot Medan/KPK/Kemenag/DPR RI" required>
                    <small class="help-block"></small>
                </div>
                
               
          <div class="form-group">
                    <label for="nama_dosen">Zona Waktu <font color="red">WAJIB ISI</font></label>
                    <select class="form-control" name="jenis_waktu" placeholder="Zona Waktu" required>
                        <option>--Pilih Zona Waktu--</option>
                        <option value="1">WIB</option>
                        <option value="2">WITA</option>
                        <option value="3">WIT</option>
                    </select>
                    <small class="help-block"></small>
                </div>
                <div class="form-group pull-right">
                    <button type="reset" class="btn btn-flat btn-default">
                        <i class="fa fa-rotate-left"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-flat bg-purple">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            <?= form_close(); ?>
            </div>
        </div>
	</div>
	
</div>