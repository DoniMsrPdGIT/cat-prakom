<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	const MAX_PASSWORD_SIZE_BYTES = 4096;
	public $data = [];

	public function __construct()
	{
		parent::__construct();
		$this->config->load('ion_auth', TRUE);
		$this->load->helper('cookie');
		$this->load->helper('date');
		$this->lang->load('ion_auth');
		
		$this->load->database();
		$this->load->model('Biodata_model');
		$this->load->model('Master_model','master');
		$this->load->library('form_validation');
		$this->load->helper(['url', 'language']);
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
		
		// initialize hash method options (Bcrypt)
		$this->hash_method = $this->config->item('hash_method', 'ion_auth');
	}
	public function hash_password($password, $identity = NULL)
	{
		// Check for empty password, or password containing null char, or password above limit
		// Null char may pose issue: http://php.net/manual/en/function.password-hash.php#118603
		// Long password may pose DOS issue (note: strlen gives size in bytes and not in multibyte symbol)
		if (empty($password) || strpos($password, "\0") !== FALSE ||
			strlen($password) > self::MAX_PASSWORD_SIZE_BYTES)
		{
			return FALSE;
		}

		$algo = $this->_get_hash_algo();
		$params = $this->_get_hash_parameters($identity);

		if ($algo !== FALSE && $params !== FALSE)
		{
			return password_hash($password, $algo, $params);
		}

		return FALSE;
	}

	public function output_json($data)
	{
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function index()
	{
		if ($this->ion_auth->logged_in()){
			$user_id = $this->ion_auth->user()->row()->id; // Get User ID
			$group = $this->ion_auth->get_users_groups($user_id)->row()->name; // Get user group
			redirect('dashboard');
		}
		$this->data['identity'] = [
			'name' => 'identity',
			'id' => 'identity',
			'type' => 'text',
			'placeholder' => 'Email',
			'autofocus'	=> 'autofocus',
			'class' => 'form-control',
			'autocomplete'=>'off'
		];
		$this->data['password'] = [
			'name' => 'password',
			'id' => 'password',
			'type' => 'password',
			'placeholder' => 'Password',
			'class' => 'form-control',
		];
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->load->view('_templates/auth/_header.php');
		$this->load->view('auth/login', $this->data);
		$this->load->view('_templates/auth/_footer.php');
	}
	
	public function privacy()
	{
		
		$this->load->view('_templates/auth/_header.php');
		$this->load->view('privacy');
		$this->load->view('_templates/auth/_footer.php');
	}

	public function cek_login()
	{
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required|trim');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required|trim');

		if ($this->form_validation->run() === TRUE)	{
			$remember = (bool)$this->input->post('remember');
			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)){
				$this->cek_akses();
			}else {
				$data = [
					'status' => false,
					'failed' => 'Incorrect Login',
				];
				$this->output_json($data);
			}
		}else{
			$invalid = [
				'identity' => form_error('identity'),
				'password' => form_error('password')
			];
			$data = [
				'status' 	=> false,
				'invalid' 	=> $invalid
			];
			$this->output_json($data);
		}
	}

	public function cek_akses()
	{
		if (!$this->ion_auth->logged_in()){
			$status = false; // jika false, berarti login gagal
			$url = 'auth'; // url untuk redirect
		}else{
			$status = true; // jika true maka login berhasil
			$url = 'dashboard';
		}

		$data = [
			'status' => $status,
			'url'	 => $url
		];
		$this->output_json($data);
	}

	public function logout()
	{
		$this->ion_auth->logout();
		redirect('login','refresh');
	}

	/**
	 * Forgot password
	 */
	public function forgot_password()
	{
		$this->data['title'] = $this->lang->line('forgot_password_heading');
		
		// setting validation rules by checking whether identity is username or email
		if ($this->config->item('identity', 'ion_auth') != 'email')
		{
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
		}
		else
		{
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
		}


		if ($this->form_validation->run() === FALSE)
		{
			$this->data['type'] = $this->config->item('identity', 'ion_auth');
			// setup the input
			$this->data['identity'] = [
				'name' 	=> 'identity',
				'id'	=> 'identity',
				'class'	=> 'form-control',
				'autocomplete'	=> 'off',
				'autofocus'	=> 'autofocus'
			];

			if ($this->config->item('identity', 'ion_auth') != 'email')
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
			}
			else
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
			}

			// set any errors and display the form
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->load->view('_templates/auth/_header', $this->data);
			$this->load->view('auth/forgot_password');
			$this->load->view('_templates/auth/_footer');
		}
		else
		{
			$identity_column = $this->config->item('identity', 'ion_auth');
			$identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

			if (empty($identity))
			{

				if ($this->config->item('identity', 'ion_auth') != 'email')
				{
					$this->ion_auth->set_error('forgot_password_identity_not_found');
				}
				else
				{
					$this->ion_auth->set_error('forgot_password_email_not_found');
				}

				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}

			// run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

			if ($forgotten)
			{
				// if there were no errors
				$this->session->set_flashdata('success', $this->ion_auth->messages());
				redirect("auth/forgot_password", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}
		}
	}
	public function testimonial(){
		//$this->load->view('_templates/auth/_header');
		$this->load->view('auth/testimonial');
		$this->load->view('_templates/auth/_footer');
	}
	public function register(){
		$data['ranting'] = $this->Biodata_model->ranting();
		$this->load->view('_templates/auth/_header', $data);
		$this->load->view('auth/email/register');
		$this->load->view('_templates/auth/_footer');
	}
	
	public function register_ref(){
		$data['ranting'] = $this->Biodata_model->ranting();
		$this->load->view('_templates/auth/_header', $data);
		$this->load->view('auth/email/register_ref');
		$this->load->view('_templates/auth/_footer');
	}

	public function aksi_register(){
		$no       = $this->input->post('no');
		$nik       = $this->input->post('nik');
		$nm    	   = $this->input->post('nama');
		$tmpt 	   = $this->input->post('tempat');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$jk    = $this->input->post('jk');
		$alamat    = $this->input->post('alamat');
		$kelas    = $this->input->post('kelas');
		$kerja     = $this->input->post('pekerjaan');
		$nohp      = $this->input->post('nik');
		$email     = $this->input->post('email');
		$melamar     = $this->input->post('melamar');
		$jenis_waktu     = $this->input->post('jenis_waktu');
		$ref     = $this->input->post('ref');
		$tgl 	 = date('dmYhis');

// Biodata Anggota
		$register = array('no_peserta'  => $no,
						  'nik' 	    => $nik,
						  'nama_b'        => $nm,
						  'tempat_lahir'=> $tmpt,
						  'tgl_lahir'   => $tgl_lahir,
						  'alamat' 	    => $alamat,
						 
						  'pekerjaan'   => $kerja,
						 
						  'no_hp'   	=> $nohp,
						  'email'	    => $email);

// Do not pass $identity as user is not known yet so there is no need
$manual_activation = $this->config->item('manual_activation', 'ion_auth');
		// Do not pass $identity as user is not known yet so there is no need
		$password = $this->hash_password($nik);
		$ip_address = $this->input->ip_address();
// Users table.
		$data = [
			'username' => $nik,
			'password' => $password,
			'email' => $email,
			'ip_address' => $ip_address,
			'created_on' => time(),
			'company' =>$ref,
			'last_name' =>$melamar,
			'remember_selector' =>$kelas,
			'active' => ($manual_activation === FALSE ? 1 : 0)
		];

	$data_mhs = [
			'nama' => $nm,
			'nim' => $nik,
			'email' => $email,
			'jenis_kelamin' => $jk,
			'kelas_id' => $kelas,
			'jenis_waktu' => $jenis_waktu,
			'no_peserta' => $no
		];
		
		
		// filter out any data passed that doesnt have a matching column in the users table
		// and merge the set user data and the additional data
		$servername = "localhost";
$username = "cat39971_donimsrpd";
$password = "aquansite1993";
$dbname = "cat39971_prakom_casndb";
// $username = "root";
// $password = "";
// $dbname = "prakom_casndb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
		//CEK EMAIL DOUBLE
		$qry=mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
		$rowCheck=mysqli_num_rows($qry);
    	if ($rowCheck>0) {
    	$this->session->set_flashdata('message',
				'<div class="pad margin no-print">
			      <div class="callout callout-danger" style="margin-bottom: 0!important;">
			        <b>Registrasi Gagal... <br/>Email sudah terdaftar</b>
			      </div>
			    </div>');
		redirect('login','refresh');	
    	}else{
    	$this->db->insert('mahasiswa', $data_mhs);
		
		$this->db->insert('users', $data);
		$last_insert_id = $this->db->insert_id(); 

		$data_group = [
			'user_id' => $last_insert_id,
			'group_id' => '3'
		];
		$this->db->insert('users_groups', $data_group);
		
		$this->Biodata_model->tambah_anggota($register);
		
		
		$this->session->set_flashdata('message',
				'<div class="pad margin no-print">
			      <div class="callout callout-info" style="margin-bottom: 0!important;">
			        <h4><i class="fa fa-info"></i> Note:</h4>
			        <b>Registrasi berhasil... <br/>Silahkan masukkan NO.HP sebagai PASSWORD pertama anda..</b>
			      </div>
			    </div>');
		redirect('login','refresh');	
    	}

		
	}

	public function forget_password(){
		$email     = $this->input->post('email');
		$nohp     = $this->input->post('nohp');

		

		$servername = "localhost";
$username = "cat39971_donimsrpd";
$password = "aquansite1993";
$dbname = "cat39971_prakom_casndb";
// $username = "root";
// $password = "";
// $dbname = "prakom_casndb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
		//CEK EMAIL DOUBLE
		$qry=mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND username='$nohp'");
		$rowCheck=mysqli_num_rows($qry);
    	if ($rowCheck>0) {
		$password = $this->hash_password($nohp);
// Users table.
		$data = [
			'password' => $password
		];	
		$this->master->update('users', $data, 'email', $email);
		
		$this->session->set_flashdata('message',
				'<div class="pad margin no-print">
			      <div class="callout callout-info" style="margin-bottom: 0!important;">
			        <h4><i class="fa fa-info"></i> Note:</h4>
			        <b>Reset password berhasil... <br/>Silahkan masukkan NO.HP sebagai PASSWORD anda..</b>
			      </div>
			    </div>');
		redirect('login','refresh');	
    	}else{
    		$this->session->set_flashdata('message',
				'<div class="pad margin no-print">
			      <div class="callout callout-danger" style="margin-bottom: 0!important;">
			        <b>Reset Password Gagal... <br/>Email/No.HP salah atau tidak terdaftar</b>
			      </div>
			    </div>');
		redirect('auth/forgot_password','refresh');
    	}

		
	}

	/**
	 * Reset password - final step for forgotten password
	 *
	 * @param string|null $code The reset code
	 */
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}

		$this->data['title'] = $this->lang->line('reset_password_heading');
		
		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{
			// if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

			if ($this->form_validation->run() === FALSE)
			{
				// display the form

				// set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] = [
					'name' => 'new',
					'id' => 'new',
					'type' => 'password',
					'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
				];
				$this->data['new_password_confirm'] = [
					'name' => 'new_confirm',
					'id' => 'new_confirm',
					'type' => 'password',
					'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
				];
				$this->data['user_id'] = [
					'name' => 'user_id',
					'id' => 'user_id',
					'type' => 'hidden',
					'value' => $user->id,
				];
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;

				// render
				$this->load->view('_templates/auth/_header');
				$this->load->view('auth/reset_password', $this->data);
				$this->load->view('_templates/auth/_footer');
			}
			else
			{
				$identity = $user->{$this->config->item('identity', 'ion_auth')};

				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
				{

					// something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($identity);

					show_error($this->lang->line('error_csrf'));

				}
				else
				{
					// finally change the password
					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

					if ($change)
					{
						// if the password was successfully changed
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						redirect("auth/login", 'refresh');
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('auth/reset_password/' . $code, 'refresh');
					}
				}
			}
		}
		else
		{
			// if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

	/**
	 * Activate the user
	 *
	 * @param int         $id   The user ID
	 * @param string|bool $code The activation code
	 */
	public function activate($id, $code = FALSE)
	{
		$activation = FALSE;

		if ($code !== FALSE)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			// redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth", 'refresh');
		}
		else
		{
			// redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

	/**
	 * @return array A CSRF key-value pair
	 */
	public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return [$key => $value];
	}

	/**
	 * @return bool Whether the posted CSRF token matches
	 */
	public function _valid_csrf_nonce(){
		$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
		if ($csrfkey && $csrfkey === $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
			return FALSE;
	}

	public function _render_page($view, $data = NULL, $returnhtml = FALSE)//I think this makes more sense
	{

		$viewdata = (empty($data)) ? $this->data : $data;

		$view_html = $this->load->view($view, $viewdata, $returnhtml);

		// This will return html on 3rd argument being true
		if ($returnhtml)
		{
			return $view_html;
		}
	}
protected function _get_hash_algo()
	{
		$algo = FALSE;
		switch ($this->hash_method)
		{
			case 'bcrypt':
				$algo = PASSWORD_BCRYPT;
				break;

			case 'argon2':
				$algo = PASSWORD_ARGON2I;
				break;

			default:
				// Do nothing
		}

		return $algo;
	}
	
protected function _get_hash_parameters($identity = NULL)
	{
		// Check if user is administrator or not
		$is_admin = FALSE;
		if ($identity)
		{
			$user_id = $this->get_user_id_from_identity($identity);
			if ($user_id && $this->in_group($this->config->item('admin_group', 'ion_auth'), $user_id))
			{
				$is_admin = TRUE;
			}
		}

		$params = FALSE;
		switch ($this->hash_method)
		{
			case 'bcrypt':
				$params = [
					'cost' => $is_admin ? $this->config->item('bcrypt_admin_cost', 'ion_auth')
										: $this->config->item('bcrypt_default_cost', 'ion_auth')
				];
				break;

			case 'argon2':
				$params = $is_admin ? $this->config->item('argon2_admin_params', 'ion_auth')
									: $this->config->item('argon2_default_params', 'ion_auth');
				break;

			default:
				// Do nothing
		}

		return $params;
	}	
}
