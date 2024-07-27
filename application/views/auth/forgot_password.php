<div class="login-box pt-5">
		<style>
	.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 70%;
}
</style>
	<!-- /.login-logo -->

		<a href="<?=base_url('login')?>"><img src="<?=base_url('')?>assets/logo/logo.png"  class="center"/></a>
	

	<div class="login-box-body">
		<h3 class="text-center mt-0 mb-4">
			Lupa Password
		</h3>
		<p class="login-box-msg">
			Masukkan Email dan No.HP anda pada saat Pendaftaran sebelumnya.
		</p>

		<?php if( $this->session->flashdata('success') ) : ?>
			<p class="text-green text-center"><?=$this->session->flashdata('success');?></p>
		<?php endif; ?>

		<div id="infoMessage" class="text-red text-center"><?php echo $message;?></div>

		<?php echo form_open("auth/forget_password");?>

			<p>
				<div class="form-group">
                    <label for="nama_dosen">Email</label>&nbsp;<small>* Wajib</small>
                    <input required type="email" class="form-control" name="email" placeholder="Email" required>
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="nip">No. HP</label>&nbsp;<small>* Wajib</small>
                    <input required type="number" class="form-control" name="nohp" placeholder="No. HP" minlength="11" maxlength="13" required>
                    <small class="help-block"></small>
                </div>
			</p>

			<p><?php echo form_submit('submit', 'Forgot Password', ['class'=>'btn btn-primary btn-flat btn-block']);?></p>

		<?php echo form_close();?>

    </div>
</div>