
<div class="login-box pt-5">
	<!-- /.login-logo -->
	<style>
	.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 70%;
}
	</style>
	<img src="assets/logo/logo.png"  class="center"/>
	<div class="login-box-body">
	


 
	<p class="login-box-msg">Login to start session</p>
	<div id="infoMessage" class="text-center"><?php echo $message;?></div>

	<?= form_open("auth/cek_login", array('id'=>'login'));?>
		<div class="form-group has-feedback">
			<?= form_input($identity);?>
			<span class="fa fa-envelope form-control-feedback"></span>
			<span class="help-block"></span>
		</div>
		<div class="form-group has-feedback">
			<?= form_input($password);?>
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			<span class="help-block"></span>
		</div>
		 <div class="callout callout-danger">
                            <p>
                                Password adalah No.HP yang didaftarkan
                            </p>
                        </div>
		<div class="row">
			<div class="col-xs-4">
			<div class="checkbox icheck">
				<label>
				<?= form_checkbox('remember', '', FALSE, 'id="remember"');?> Ingatkan!
				</label>
			</div>
			</div>
			<!-- /.col -->
			
			<!-- /.col -->
			<div class="col-xs-4">
			<a href="auth/register"><button type="button" class="btn btn-danger btn-block btn-flat">Daftar</button></a>
			</div>
			<div class="col-xs-4">
			<?= form_submit('submit', lang('login_submit_btn'), array('id'=>'submit','class'=>'btn btn-primary btn-block btn-flat'));?>
			</div>
		</div>
		<?= form_close(); ?>
 <div class="row">
  
 

</div>
		
	</div>
	</div>
</div>

<script type="text/javascript">
	let base_url = '<?=base_url();?>';
</script>
<script src="<?=base_url()?>assets/dist/js/app/auth/login.js"></script>