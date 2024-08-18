
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
	<style>
		.elegant-button {
    background-color: #4CAF50; /* Warna latar belakang */
    color: white; /* Warna teks */
    padding: 5px 5px; /* Padding di sekitar teks */
    cursor: pointer; /* Ubah cursor ketika mouse berada di atas tombol */
    border: none; /* Hapus border */
    border-radius: 5px; /* Tambahkan sedikit lengkungan pada sudut */
    transition: background-color 0.3s, transform 0.2s; /* Animasi untuk hover */
    animation: blink 1s infinite; /* Tambahkan animasi blink */
}

@keyframes blink {
    0% {
        opacity: 1;
    }
    50% {
        opacity: 0.5;
    }
    100% {
        opacity: 1;
    }
}

.star {
  font-size: 16px;
  color: #fff;
  animation: twinkle 2s infinite;
}

@keyframes twinkle {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.2);
  }
  100% {
    transform: scale(1);
  }
}
.moving-text {
  position: relative;
  animation: move 2s infinite;
}

@keyframes move {
  0% {
    left: 0;
  }
  50% {
    left: 10px;
  }
  100% {
    left: 0;
  }
}
	</style>

<style>
    .elegant-button {
        background-color: black; /* Warna latar belakang */
        color: white; /* Warna teks */
        padding: 15px 15px; /* Padding di sekitar teks */
        cursor: pointer; /* Ubah cursor ketika mouse berada di atas tombol */
        border: none; /* Hapus border */
        border-radius: 5px; /* Tambahkan sedikit lengkungan pada sudut */
        transition: background-color 0.3s, transform 0.2s; /* Animasi untuk hover */
    }
    
    .elegant-button:hover {
        background-color: #45a049; /* Ubah warna latar belakang ketika di-hover */
        transform: scale(1.05); /* Membuat tombol sedikit lebih besar ketika di-hover */
    }
    
    .elegant-button:active {
        transform: scale(0.95); /* Mengecilkan tombol sedikit ketika diklik */
    }
</style>
 

 
<p class="login-box-msg"><a href="/auth/testimonial"><button class="elegant-button"><i class="star"></i><span class="moving-text">Testimoni Alumni 2023 yang Lulus ASN</span></button></a></p>
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
						 <!--<div class="callout callout-success">
                            <p>
                                Pendaftaran Member Baru dan Login Member Lama akan dibuka bersamaan saat Pendaftaran Resmi CASN 2024, ditunggu aja ya kakak...
                            </p>
                        </div>-->
		<div class="row">
		<div class="col-xs-4">
			<a href="auth/forgot_password">Lupa Password?</a>
			</div> 
			
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
<script>
	const button = document.querySelector('.elegant-button');
const star = document.querySelector('.star');
const movingText = document.querySelector('.moving-text');

button.addEventListener('mouseover', () => {
  star.style.animation = 'twinkle 2s infinite';
  movingText.style.animation = 'move 2s infinite';
});

button.addEventListener('mouseout', () => {
  star.style.animation = 'none';
  movingText.style.animation = 'none';
});
</script>
<script type="text/javascript">
	let base_url = '<?=base_url();?>';
</script>
<script src="<?=base_url()?>assets/dist/js/app/auth/login.js"></script>