<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {
	public function index(){
        return redirect('welcome/employee_login');
	}

public function create_company()
{
    // 1️⃣ Form validation
    $this->form_validation->set_rules('region_id', 'Region', 'required');
    $this->form_validation->set_rules('comp_name', 'Company Name', 'required');
    $this->form_validation->set_rules('comp_phone', 'Company Phone Number', 'required');
    $this->form_validation->set_rules('adress', 'Address', 'required');
    $this->form_validation->set_rules('comp_number', 'Registration Number', 'required');
    $this->form_validation->set_rules('comp_email', 'Company Email', 'required|valid_email');
    $this->form_validation->set_rules('sms_status', 'SMS', 'required');
    $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

    if ($this->form_validation->run() === FALSE) {
        return $this->register();
    }

    // 2️⃣ Collect data
    $data = $this->input->post();

    
    $data['password'] = password_hash('123456', PASSWORD_BCRYPT);

    // 3️⃣ Handle company logo upload + resize
    if (!empty($_FILES['comp_logo']['name'])) {

        $upload_path = FCPATH . 'assets/images/company_logo/';

        // Ensure folder exists
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0755, true);
        }

        $config = [
            'upload_path'   => $upload_path,
            'allowed_types' => 'jpg|jpeg|png|gif',
            'max_size'      => 10240, // 10MB (KB)
            'encrypt_name'  => true
        ];

        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('comp_logo')) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            return redirect('welcome/register');
        }

        // Upload success
        $upload_data = $this->upload->data();
        $data['comp_logo'] = $upload_data['file_name'];

        // 🔁 Resize to 200x200
        $resize_config = [
            'image_library'  => 'gd2',
            'source_image'   => $upload_data['full_path'],
            'maintain_ratio' => true,
            'width'          => 200,
            'height'         => 200
        ];

        $this->load->library('image_lib');
        $this->image_lib->initialize($resize_config);

        if (!$this->image_lib->resize()) {
            $this->session->set_flashdata('error', $this->image_lib->display_errors());
            return redirect('welcome/register');
        }

        $this->image_lib->clear();
    }

    // 4️⃣ Insert company data
    $this->load->model('queries');
    $comp_id = $this->queries->insert_company_data($data);

    if (!$comp_id) {
        $this->session->set_flashdata('error', 'Data insertion failed');
        return redirect('welcome/register');
    }

    // 5️⃣ Success + SMS
    $this->session->set_userdata('comp_id', $comp_id);

    $recipients = ['255629364847', '255748470181', '255747384847'];
    $message = "Kuna kampuni imesajiliwa loan-pocket.com\n" .
               "Jina la kampuni: {$data['comp_name']}\n" .
               "Namba ya simu: {$data['comp_phone']}\n" .
               "Anuani: {$data['adress']}";

    foreach ($recipients as $phone) {
        $this->sendsms($phone, $message);
    }

    $this->session->set_flashdata('message', 'Your Company Registration was Successful');
    redirect('welcome/blanch');
}



	public function blanch(){
		$this->load->model('queries');
		 $comp_id = $this->session->userdata('comp_id');
		 $blanch = $this->queries->get_blanch($comp_id);
		 $region = $this->queries->get_region();
		  // print_r($region);
		  //    exit();
		$this->load->view('home/blanch',['blanch'=>$blanch,'region'=>$region]);
	}

public function create_blanch()
{
    $this->form_validation->set_rules('comp_id', 'Company', 'required');
    $this->form_validation->set_rules('region_id', 'Region', 'required');
    $this->form_validation->set_rules('blanch_name', 'Branch Name', 'required');
    $this->form_validation->set_rules('blanch_no', 'Branch Phone', 'required');
    $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

    if ($this->form_validation->run()) {
        $data = $this->input->post();

        $this->load->model('queries');

        // Insert branch and get its ID
        $blanch_id = $this->queries->insert_blanch($data);

        if ($blanch_id) {
            // Prepare default employee data
            $default_employee = [
                'empl_name'   => 'System Admin',
                'empl_no'     => $data['blanch_no'],
                'empl_email'  => 'admin@company.com',
                'username'    => 'admin_' . $blanch_id,
                'empl_sex'    => 'male',
                'account_no'  => 'CASH',
                'salary'      => 0,
                'password'    => password_hash('123456', PASSWORD_BCRYPT), // hashed password
				
                'position_id' => 22, // assume 22 = management
                'comp_id'     => $data['comp_id'],
                'blanch_id'   => $blanch_id,
                'ac_status'   => 'empl',
				'must_update' => 1 // to force password change on first login
            ];

            // Insert default employee
            $employee_id = $this->queries->insert_employee($default_employee);

            // Get all permissions and assign to the employee
            $all_permissions = $this->queries->get_all_links();
            foreach ($all_permissions as $perm) {
                $this->queries->insert_permission([
					'employee_id' => $employee_id,
					'link_id'     => $perm->id,
					'can_view'    => 1,
					'can_edit'    => 1,
					'can_delete'  => 1,
				]);
            }

    

            $this->session->set_flashdata('massage', 'Branch created and default management Login Here');
            return redirect('welcome/employee_login'); // Redirect to employee login		
        } else {
            $this->session->set_flashdata('error', 'Failed to create branch');
            return redirect('welcome/blanch');
        }
    }

    $this->blanch();
}



	public function login(){
        return redirect('welcome/employee_login');
	}


	public function  register(){
		$this->load->model('queries');
		$region = $this->queries->get_region();
		$this->load->view('home/register',['region'=>$region]);
	}

    



   // user sing in

		public function signin(){
		$this->form_validation->set_rules('comp_phone','company phone number','required');
		$this->form_validation->set_rules('password','password','required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		if ($this->form_validation->run()){
			$comp_phone = $this->input->post('comp_phone');
			$password = sha1($this->input->post('password'));
			$this->load->model('queries');
			$userexit = $this->queries->user_data($comp_phone,$password);
			     // print_r($userexit);
			     //           exit();
		if ($userexit){
				if ($userexit->role == 'admin') {
					$sessionData = [
					'comp_id' => $userexit->comp_id,
					'comp_phone' => $userexit->comp_phone,
					'comp_number' => $userexit->comp_number,
					'comp_name' => $userexit->comp_name,
					'role' => $userexit->role,
					];
					// print_r($userexit);
					//     exit();
					if ($userexit->comp_status == 'close'){
               $this->session->set_flashdata('mass','Your Account Is Blocked');
                        return redirect('welcome/employee_login');
                      }elseif ($userexit->comp_status == 'open') {
                    $this->session->set_userdata($sessionData);
                    $this->session->set_flashdata('massage','Log in successsfuly');
                      	return redirect('admin/index');
					return redirect("admin/index");
                      }
				}
				
			}else{
				$this->session->set_flashdata('mass','Your Phone number or password is invalid please try again');
                return redirect('welcome/employee_login');
			}
		}
		else{
			$this->login();	
		}
	}
	public function employee_login()
{
    // On login page, show default logo since user hasn't identified their company yet
    $data['company_logo'] = base_url('assets/img/logo.png'); // Default system logo
    
    $this->load->view('home/employee_login', $data);
}

public function employee_forgot_password()
{
    $this->load->view('home/employee_forgot_password');
}

public function employee_reset_password()
{
    $this->load->view('home/employee_reset_password');
}

public function request_employee_reset_code()
{
    $this->form_validation->set_rules('empl_no', 'Namba yako ya simu uliyopo kwenye mfumo', 'required|trim');
    $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

    if (!$this->form_validation->run()) {
        return $this->employee_forgot_password();
    }

    $empl_no = trim((string) $this->input->post('empl_no', true));

    $this->load->model('queries');
    $employee = $this->queries->get_employee_by_phone($empl_no);

    if (empty($employee)) {
        $this->session->set_flashdata('mass', 'Kama namba ipo, ombi la tokeni limetumwa kwa menejimenti.');
        return redirect('welcome/employee_forgot_password');
    }

    $code = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);
    $expires_at = date('Y-m-d H:i:s', strtotime('+10 minutes'));

    $saved = $this->queries->store_employee_password_reset_code(
        (int) $employee->empl_id,
        (int) $employee->comp_id,
        $empl_no,
        $code,
        $expires_at
    );

    if (!$saved) {
        $this->session->set_flashdata('mass', 'Imeshindikana kutuma ombi la kurejesha nenosiri. Tafadhali jaribu tena.');
        return redirect('welcome/employee_forgot_password');
    }

    $this->session->set_flashdata('massage', 'Ombi limetumwa. Menejimenti wataona token kwenye notifications za navbar na watakupatia.');
    return redirect('welcome/employee_forgot_password');
}

public function reset_employee_password_with_code()
{
    $this->form_validation->set_rules('empl_no', 'Namba yako ya simu uliyopo kwenye mfumo', 'required|trim');
    $this->form_validation->set_rules('reset_code', 'Tokeni ya uthibitisho', 'required|trim|min_length[6]|max_length[6]');
    $this->form_validation->set_rules('new_password', 'Nenosiri jipya', 'required|min_length[6]');
    $this->form_validation->set_rules('confirm_password', 'Uthibitisho wa nenosiri', 'required|matches[new_password]');
    $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

    if (!$this->form_validation->run()) {
        return $this->employee_reset_password();
    }

    $empl_no = trim((string) $this->input->post('empl_no', true));
    $reset_code = trim((string) $this->input->post('reset_code', true));
    $new_password = (string) $this->input->post('new_password', true);

    $this->load->model('queries');
    $employee = $this->queries->get_employee_by_phone($empl_no);

    if (empty($employee)) {
        $this->session->set_flashdata('mass', 'Namba ya simu au tokeni si sahihi.');
        return redirect('welcome/employee_reset_password');
    }

    $reset_row = $this->queries->verify_employee_password_reset_code((int) $employee->empl_id, $reset_code);
    if (empty($reset_row)) {
        $this->session->set_flashdata('mass', 'Tokeni si sahihi au muda wake umeisha. Tafadhali omba tokeni mpya.');
        return redirect('welcome/employee_reset_password');
    }

    $new_hash = password_hash($new_password, PASSWORD_BCRYPT);
    $updated = $this->db->where('empl_id', (int) $employee->empl_id)
        ->update('tbl_employee', ['password' => $new_hash]);

    if (!$updated) {
        $this->session->set_flashdata('mass', 'Imeshindikana kuweka nenosiri jipya. Tafadhali jaribu tena.');
        return redirect('welcome/employee_reset_password');
    }

    $this->queries->mark_employee_password_reset_used((int) $reset_row->id);

    // Auto-login immediately after successful reset.
    if ($employee->empl_status !== 'open') {
        $this->session->set_flashdata('mass', $this->lang->line('blocked_menu'));
        return redirect('welcome/employee_login');
    }

    $sessionData = [
        'empl_id'       => $employee->empl_id,
        'user_id'       => $employee->empl_id,
        'empl_name'     => $employee->empl_name,
        'username'      => $employee->username,
        'blanch_id'     => $employee->blanch_id,
        'comp_id'       => $employee->comp_id ?? null,
        'position_id'   => $employee->position_id,
        'position_name' => $employee->position ?? null,
        'must_update'   => $employee->must_update ?? 0,
    ];

    $company_logo = null;
    $company_name = null;
    if (!empty($employee->comp_id)) {
        $company = $this->queries->get_company_by_id($employee->comp_id);
        if ($company) {
            $company_logo = $company->comp_logo ?? null;
            $company_name = $company->comp_name ?? null;
        }
    }

    $sessionData['company_logo'] = $company_logo;
    $sessionData['comp_name'] = $company_name;
    $sessionData['permissions'] = $this->queries->get_employee_links($employee->empl_id);

    $this->session->set_userdata($sessionData);
    $this->session->set_flashdata('massage', 'Nenosiri jipya limewekwa kwa mafanikio.');

    if ((int) $employee->position_id === 22 && (int) ($employee->must_update ?? 0) === 1) {
        return redirect('welcome/update_profile');
    }

    if (empty($employee->passport)) {
        return redirect('welcome/upload_passport');
    }

    switch ((string) $employee->position_id) {
        case '1':
        case '2':
        case '6':
        case '17':
            return redirect('oficer/index');
        case '22':
            return redirect('admin/index');
        default:
            return redirect('oficer/index');
    }
}



	
	
	
public function Employee_signin()
{
    // ================= VALIDATION =================
    $this->form_validation->set_rules('empl_no', 'Employee Phone number', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

    if (!$this->form_validation->run()) {
        return $this->employee_login();
    }

    $empl_no        = $this->input->post('empl_no', TRUE);
    $password_input = $this->input->post('password', TRUE);

    $this->load->model('queries');
    $user = $this->queries->employee_user_data($empl_no);

    // ================= USER EXISTS =================
    if (!$user) {
        $this->session->set_flashdata('mass', "Your phone number or password is invalid, please try again");
        return redirect("welcome/employee_login");
    }

    // ================= PASSWORD CHECK =================
    $stored_password = $user->password;
    $login_success   = false;

    // OLD SHA1 PASSWORD
    if (strlen($stored_password) === 40 && sha1($password_input) === $stored_password) {
        $login_success = true;

        // Upgrade to bcrypt
        $new_hash = password_hash($password_input, PASSWORD_BCRYPT);

        // ❗ FIXED TABLE NAME (removed backtick bug)
        $this->db->where('empl_id', $user->empl_id)
                 ->update('tbl_employee', ['password' => $new_hash]);
    }
    // BCRYPT PASSWORD
    elseif (password_verify($password_input, $stored_password)) {
        $login_success = true;
    }

    if (!$login_success) {
        $this->session->set_flashdata('mass', "Your phone number or password is invalid, please try again");
        return redirect("welcome/employee_login");
    }

    // ================= ACCOUNT STATUS =================
    if ($user->empl_status !== 'open') {
        $this->session->set_flashdata('mass', $this->lang->line("blocked_menu"));
        return redirect("welcome/employee_login");
    }

    // ================= PREPARE SESSION =================
    $sessionData = [
        'empl_id'       => $user->empl_id,
        'user_id'       => $user->empl_id,
        'empl_name'     => $user->empl_name,
        'username'      => $user->username,
        'blanch_id'     => $user->blanch_id,
        'comp_id'       => $user->comp_id ?? null,
        'position_id'   => $user->position_id,
        'position_name' => $user->position,
        'must_update'   => $user->must_update ?? 0,
    ];

    // ================= FETCH COMPANY LOGO (AFTER VERIFIED) =================
    $company_logo = null;
    $company_name = null;

    if (!empty($user->comp_id)) {
        $company = $this->queries->get_company_by_id($user->comp_id);
        if ($company) {
            $company_logo = $company->comp_logo ?? null; // filename only
            $company_name = $company->comp_name ?? null;
        }
    }

    $sessionData['company_logo'] = $company_logo;
    $sessionData['comp_name'] = $company_name;

    // ================= PERMISSIONS (MANAGEMENT) =================
    $allowed_links = $this->queries->get_employee_links($user->empl_id);
    $sessionData['permissions'] = $allowed_links;

    // ================= SAVE SESSION =================
    $this->session->set_userdata($sessionData);

    // ================= FORCE PROFILE UPDATE =================
    if ($user->position_id == 22 && $user->must_update == 1) {
        return redirect('welcome/update_profile');
    }

    // ================= FORCE PROFILE PHOTO UPLOAD =================
    if (empty($user->passport)) {
        return redirect('welcome/upload_passport');
    }

    // ================= REDIRECT =================
    switch ($user->position_id) {
        case '1':
        case '2':
        case '6':
        case '17':
            return redirect('oficer/index');

        case '22':
            return redirect('admin/index');

        default:
            return redirect('oficer/index');
    }
}




public function Send_reminder_automatic(){
$today = date('Y-m-d');

$query = $this->db->query("
    SELECT * 
    FROM tbl_loans l 
    JOIN tbl_customer c ON l.customer_id = c.customer_id 
 
    AND DATE(l.date_show) = '$today' 
    AND l.loan_status = 'withdrawal'
");

$result = $query->result();
	


	foreach ($result as $auto_reminders) {
	$this->send_reminder_auto_receivable($auto_reminders->comp_id,$auto_reminders->customer_id,$auto_reminders->loan_id);
	}
}


public function get_employee_company()
{
    $this->load->model('queries');
    
    $empl_no = $this->input->post('empl_no');
    
    if (empty($empl_no)) {
        echo json_encode(['success' => false]);
        return;
    }
    
    // Get employee by phone number
    $employee = $this->queries->get_employee_by_phone($empl_no);
    
    if (!$employee) {
        echo json_encode(['success' => false]);
        return;
    }
    
    // Get company info
    $company = $this->queries->get_company_by_id($employee->comp_id);
    
    if ($company) {
        echo json_encode([
            'success' => true,
            'company' => [
                'comp_name' => $company->comp_name,
                'comp_logo' => $company->comp_logo
            ]
        ]);
    } else {
        echo json_encode(['success' => false]);
    }
}


public function send_reminder_auto_receivable($comp_id,$customer_id,$loan_id){
    $this->load->model('queries');
    $data_sms = $this->queries->get_loan_reminder($customer_id);
    $loan_restoration = $this->queries->get_restoration_loan($loan_id);
    $compdata = $this->queries->get_companyData($comp_id);
    $comp_name = $compdata->comp_name;

	$phone = $data_sms->phone_no;
	$first_name = $data_sms->f_name;
	$midle_name = $data_sms->m_name;
	$last_name = $data_sms->l_name;

    $full_name = trim($first_name . ' ' . $midle_name . ' ' . $last_name);

	$restoration = $loan_restoration->restration;
	$massage = 'Mpendwa ' . $full_name . ', tunakukumbusha kulipa rejesho lako la Tsh ' . number_format($restoration) .
' kwa ' . $comp_name . ' kabla ya saa 11:30 jioni. Tafadhali zingatia muda ili kuepuka adhabu ya kuchelewa. Asante kwa kuendelea kuwa nasi.';







	//    echo "<pre>";
	// print_r($phone);
	//      exit();
	$this->sendsms($phone,$massage);
}



public function update_profile() {
    $empl_id = $this->session->userdata('empl_id');

    $this->load->model('queries');
    $data['employee'] = $this->queries->get_employee_by_id($empl_id);
		    //  echo "<pre>";
		    //   print_r($data['employee']);	
		    //   echo "</pre>";
		    //        exit();
    $this->load->view('admin/update_profile', $data);
}

public function save_updated_profile() {
    $this->form_validation->set_rules('empl_name', 'Full Name', 'required');
    $this->form_validation->set_rules('empl_email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('empl_no', 'Phone Number', 'required');
    $this->form_validation->set_rules('empl_sex', 'Gender', 'required');

    // Only validate password if it's being changed
    if ($this->input->post('password')) {
        $this->form_validation->set_rules('password', 'Password', 'min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]');
    }

    $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

    if ($this->form_validation->run()) {
        $empl_id = $this->session->userdata('empl_id');

        $data = [
            'empl_name'   => $this->input->post('empl_name', TRUE),
            'empl_email'  => $this->input->post('empl_email', TRUE),
            'empl_no'     => $this->input->post('empl_no', TRUE),
            'empl_sex'    => $this->input->post('empl_sex', TRUE),
            'must_update' => 0 // ✅ Clear the update flag
        ];

        if ($this->input->post('password')) {
            $data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        }

        $this->load->model('queries');
        $updated = $this->queries->update_employee($empl_id, $data);

        if ($updated) {
            $this->session->set_flashdata('massage', 'Your profile was successfully updated.');

            // Redirect to admin dashboard
            return redirect('admin/index');
        } else {
            $this->session->set_flashdata('mass', 'Failed to update profile. Please try again.');
        }
    }

    // Reload form if validation fails or update fails
    $empl_id = $this->session->userdata('empl_id');
    $this->load->model('queries');
    $data['employee'] = $this->queries->get_employee_by_id($empl_id);

    $this->load->view('welcome/update_profile', $data);
}

public function upload_passport() {
    $empl_id = $this->session->userdata('empl_id');
    
    if (!$empl_id) {
        return redirect('welcome/employee_login');
    }

    $this->load->model('queries');
    $data['employee'] = $this->queries->get_employee_data($empl_id);
    
    $this->load->view('home/upload_passport', $data);
}

public function save_passport() {
    $empl_id = $this->session->userdata('empl_id');
    
    if (!$empl_id) {
        return redirect('welcome/employee_login');
    }
    
    if (empty($_FILES['passport']['name'])) {
        $this->session->set_flashdata('error', 'Please select a photo to upload');
        return redirect('welcome/upload_passport');
    }
    
    $upload_path = FCPATH . 'assets/images/passport/';
    
    // Ensure folder exists
    if (!is_dir($upload_path)) {
        mkdir($upload_path, 0755, true);
    }
    
    $config = [
        'upload_path'   => $upload_path,
        'allowed_types' => 'jpg|jpeg|png|gif',
        'max_size'      => 5120, // 5MB
        'encrypt_name'  => true
    ];
    
    $this->load->library('upload');
    $this->upload->initialize($config);
    
    if (!$this->upload->do_upload('passport')) {
        $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
        return redirect('welcome/upload_passport');
    }
    
    $upload_data = $this->upload->data();
    
    // Resize to 300x300
    $this->load->library('image_lib');
    $resize_config = [
        'image_library'  => 'gd2',
        'source_image'   => $upload_data['full_path'],
        'maintain_ratio' => true,
        'width'          => 300,
        'height'         => 300
    ];
    
    $this->image_lib->initialize($resize_config);
    $this->image_lib->resize();
    
    $passport = $upload_data['file_name'];
    
    // Update database
    $this->load->model('queries');
    $data = ['passport' => $passport];
    $result = $this->queries->update_employee($empl_id, $data);
    
    if ($result) {
        $this->session->set_flashdata('massage', 'Profile picture uploaded successfully');
        
        // Redirect based on position
        $position_id = $this->session->userdata('position_id');
        if ($position_id == 22) {
            return redirect('admin/index');
        } else {
            return redirect('oficer/index');
        }
    } else {
        $this->session->set_flashdata('error', 'Failed to upload profile picture');
        return redirect('welcome/upload_passport');
    }
}


public function insert_remain_debt() {
      $this->load->model('queries');
        $loans = $this->queries->get_active_loans_with_status();

        foreach ($loans as $loan) {
            $loan_id     = $loan->loan_id;
            $customer_id = $loan->customer_id;
            $blanch_id   = $loan->blanch_id;
            $comp_id     = $loan->comp_id;
            $empl_id     = $loan->empl_id;
            $loan_int    = $loan->loan_int;

            // Get total deposits so far
            $total_depost = $this->queries->get_sum_dapost($loan_id);
            $loan_dep = $total_depost->remain_balance_loan ?? 0;

            // Deposit is zero for cron
            $new_depost = 0;

            // Calculate remaining debt
            $baki = $loan_int - ($loan_dep + $new_depost);

            // Prevent duplicate entry for the same loan on same day
            $today = date('Y-m-d');
            $this->db->where('loan_id', $loan_id);
            $this->db->where('DATE(date_data)', $today);
            $exists = $this->db->get('tbl_pay')->num_rows();

            if ($exists == 0) {
                // Insert remain_debt record
                $this->queries->depost_balance(
                    $loan_id,
                    $comp_id,
                    $blanch_id,
                    $customer_id,
                    $new_depost, // 0 deposit
                    $loan_dep,   // sum balance
                    'AUTO CRON REMAIN DEBT',
                    'SYSTEM',    // role
                    'SYSTEM',    // payment method
                    $loan->group_id ?? 0,
                    date('Y-m-d H:i:s'),
                    0,           // dep_id
                    'SYSTEM',    // wakala
                    $baki
                );
            }
        }

        echo "✅ Cron insert_remain_debt executed successfully at " . date('Y-m-d H:i:s');
    }

	
	


	 public function get_reminder_smsData(){
       	 $date = date("Y-m-d");
         $front = date('Y-m-d 23:59', strtotime('+1 day', strtotime($date)));
         // print_r($front);
         //    exit();
       	$data = $this->db->query("SELECT * FROM tbl_loans l  JOIN tbl_company ca ON ca.comp_id = l.comp_id WHERE l.loan_status = 'withdrawal'  AND l.return_date = '$front'");
       	    //echo "<pre>";
       	 $loans = $data->result();
       	      //exit();
       	  foreach($loans as $all_loans){
             //echo "<br>";
        	    //echo $all_loans->loan_id;
        	    //echo "<br>";
        	     //exit();
        	 $this->send_automatic_sms($all_loans->loan_id);
       	   }   
       }

       public function send_automatic_sms($loan_id){
       	$this->load->model('queries');
       	$data_loan = $this->queries->get_reminder_loan($loan_id);
       	 if (!empty($data_loan)) {
       	 	$phone_number = $data_loan->phone_no;
       	 	$comp_name = $data_loan->comp_name;
       	 	   // print_r($phone_number);
       	 	   // print_r($comp_name);
       	 	             //exit();
       	 	  $sms = $comp_name.' Inakukumbusha kulipa rejesho lako siku ya kesho Ahsante ';
            $massage = $sms;
            $phone = $phone_number;
            $this->sendsms($phone,$massage);
       	 }
       }


           public function notify_customers()
    {
      
        $this->notify_no_deposit_customers(263); // replace 263 with your comp_id
    }


    public function notify_no_deposit_customers()
    {
         	$this->load->model('queries');
        $customers = $this->queries->get_customers_pending_payment();

        if (empty($customers)) {
            echo "✅ Wateja wote wamefanya malipo leo.\n";
            return;
        }

        foreach ($customers as $customer) {
            $phone = trim($customer->phone_no);
            if (empty($phone)) continue;

            $full_name = trim($customer->full_name ?: 'Mteja');
            $status = strtolower($customer->loan_status);

            $loan_amount = number_format($customer->loan_amount, 0, '.', ',');
            $rem_debt = number_format($customer->rem_debt ?? 0, 0, '.', ',');
            $loan_end_date = isset($customer->loan_end_date) ? date('d/m/Y', strtotime($customer->loan_end_date)) : '';

            if ($status === 'withdrawal') {
                $massage = "Ndugu {$full_name}, hujafanya malipo yako ya leo. Epuka kukosa sifa ya kukukopeshwa na kulipa faini kwa kutokulipa kwa wakati. Ahsante.";
            } elseif ($status === 'out') {
                $massage = "Ndugu {$full_name}, mkopo wako wa TZS {$loan_amount} ulishatoka nje ya makubaliano toka tarehe {$loan_end_date} na baki ni TZS {$rem_debt}. Tafadhali lipa mara moja ili kuepuka hatua zaidi.";
            } else {
                $massage = "Ndugu {$full_name}, tafadhali hakikisha unafanya malipo yako kwa wakati.";
            }

            // echo "<pre>";
            // print_r($full_name);
            // echo "<pre>";
            // exit();
             
        

            // Call your existing sendsms function
            $this->sendsms($phone, $massage);
        }
    }


//  public function notify_no_deposit_customers($comp_id = 263) // optional default comp_id
//     {
//         // Only allow CLI
//         if (!$this->input->is_cli_request()) {
//             echo "❌ This script can only be run via CLI.\n";
//             return;
//         }

//         $this->load->model('queries');

//         $customers = $this->queries->get_customers_pending_payment($comp_id);

//         if (empty($customers)) {
//             echo "✅ Wateja wote wamefanya malipo leo.\n";
//             return;
//         }

//         foreach ($customers as $customer) {
//             $phone = trim($customer->phone_no);
//             if (empty($phone)) continue;

//             $full_name = trim($customer->full_name ?: 'Mteja');
//             $status = strtolower($customer->loan_status);

//             $loan_amount = number_format($customer->loan_amount, 0, '.', ',');
//             $rem_debt = number_format($customer->rem_debt ?? 0, 0, '.', ',');
//             $loan_end_date = isset($customer->loan_end_date) ? date('d/m/Y', strtotime($customer->loan_end_date)) : '';

//             if ($status === 'withdrawal') {
//                 $message = "Ndugu {$full_name}, hujafanya malipo yako ya leo. Epuka kukosa sifa ya kukukopeshwa. Ahsante.";
//             } elseif ($status === 'out') {
//                 $message = "Ndugu {$full_name}, mkopo wako wa TZS {$loan_amount} ulishatoka nje ya makubaliano toka tarehe {$loan_end_date} na baki ni TZS {$rem_debt}. Tafadhali lipa mara moja ili kuepuka hatua zaidi.";
//             } else {
//                 $message = "Ndugu {$full_name}, tafadhali hakikisha unafanya malipo yako kwa wakati.";
//             }

//             // Debug: print message before sending
//             echo "To: $phone\nMessage: $message\n\n";

//             // Send SMS
//             $this->sendsms($phone, $message);
//         }

//         echo "📩 Ujumbe umetumwa kwa wateja " . count($customers) . "\n";
//     }


	public function clone_today_disbursed() {
		// Step 1: Clone today's loans (optional if needed elsewhere)
		$this->load->model('queries');
		$comp_id = 256;
	
		// Step 2: Get branch-wise total
		$comp_loan = $this->queries->get_comp_withdrawal_Loan($comp_id);
		$total_loan_aprove = number_format($comp_loan->total_loan_aprove);
$total_loan_int = number_format($comp_loan->total_loan_int); 

		$date = date("d-m-Y");  // e.g. 10 June 2025

$massage = "Habari, Mikopo iliyotoka leo Tarehe $date kwa kampuni nzima pamoja na matawi yake\n";
$massage .= "MKOPO BILA RIBA = $total_loan_aprove\n";
$massage .= "MKOPO PAMOJA NA RIBA = $total_loan_int";

// Phone number in international format if required by your SMS provider


// Example send_sms function (replace this with your provider's API call)

		// Step 4: Send to multiple recipients
		$phone_numbers = ['255763727272', '255619679334']; // Add more if needed
	
		foreach ($phone_numbers as $phone) {
			$this->sendsms($phone, $massage);
		}
	
		// Optional: Feedback or redirection
		// $this->session->set_flashdata('success', 'Makusanyo cloned na SMS zimetumwa.');
		// redirect('admin/some_page');
	}
	



     //begin withdrawal function
	//withdrow auto matic time
	public function get_autodata(){
    $data = $this->db->query("SELECT * FROM tbl_loans WHERE loan_status IN ('withdrawal','out')");
      $all_loans = $data->result();
        foreach($all_loans as $loan){
        	  //  echo "<br>";
        	  //  echo $loan->loan_id;
        	  //   echo "<br>";
        	  // exit();
      $this->withdraw_automatic_loan($loan->loan_id);
        }

      }

      // public 
       public function withdraw_automatic_loan($loan_id){
      	ini_set("max_execution_time", 3600);
      	$this->load->model('queries');
      	$loan_data = $this->queries->get_loan_LoandataAutomatic($loan_id);
         if (!empty($loan_data)) {
      	  $loan_id = $loan_data->loan_id;
      	  $comp_id = $loan_data->comp_id;
      	  $category_id = $loan_data->category_id;
      	  $loan_aprove = $loan_data->loan_aprove;
      	  $session = $loan_data->session;
      	  $balance = $loan_data->balance;
      	  $description = $loan_data->description;
      	  $comp_id = $loan_data->comp_id;
      	  $blanch_id = $loan_data->blanch_id;
      	  $customer_id = $loan_data->customer_id;
      	  $group_id = $loan_data->group_id;
      	  $loan_status = $loan_data->loan_status;
      	  $loan_end_date = $loan_data->loan_end_date;
      	  $depost = $loan_data->depost;
      	  $restoration = $loan_data->restration;
      	  $loan_int = $loan_data->loan_int;
      	  $kumaliza = $depost;
      	    // print_r($group_id);
      	    //      exit();
      	  $day = $loan_data->day;
      	  $renew_loan = $loan_data->renew_loan;
      	  $disburse_day = $loan_data->disburse_day;
      	  $dis_date = $loan_data->dis_date;
      	  //$rtn_date = $loan_data->rtn_date;
      	  $return_date = $loan_data->return_date;

      	  $old_balance_data = $balance;

      	  $interest_formular = $loan_data->interest_formular;
      	  $day = $loan_data->day;
      	  $interest = $interest_formular /100 * $loan_aprove;
      	  $total_loan_interest = $interest + $loan_aprove;

      	  $totalloan =  $loan_int;

      	  $total_session = $session;
      	  $time_return = $total_session;

      	  //$loan_returnday = $totalloan / $time_return;

      	  $loan_returnday = $restoration;

      	  $loanreturn = $loan_returnday;
           
      	  $withdraw_ba = $old_balance_data - $loanreturn;
      	  $remain = $withdraw_ba;
      	  $chukua_chote = $old_balance_data - $old_balance_data;

      	  //@$penart_category_loan = $this->queries->get_penart_category_comp($comp_id);
            
      	  // if (@$penart_category_loan->penart_category == 'LOAN PRODUCT') {
      	  // @$penart_loan_product = $this->queries->get_penart_byloan_product($comp_id,$category_id);
      	  // $penart_value_data = @$penart_loan_product->penart_value;

      	  // }elseif(@$penart_category_loan->penart_category == 'GENERAL') {
      	  //  @$penart_value_general = $this->queries->get_penart_general_loan($comp_id);
      	  //  $penart_value_data = @$penart_value_general->penart_value;
      	  //  }

      	  $today = date("Y-m-d 23:59");
          $today_date = date("Y-m-d");
      	  //$today = date("2023-02-16 23:59");
      	  @$loans = $this->queries->get_sum_depostLoan($loan_id);
      	  $depost_data = @$loans->depos;
      	  $rem = $totalloan - $depost_data;
      	      // print_r($depost_data);
      	      //  exit();
      	  //loan penart by samwel
      	   $penart_data = $loan_data->penat_status;
      	   $penart_status = $penart_data;
      	   $action_penart = $loan_data->action_penart;
      	   $action = $action_penart;
      	   $penart_value = $loan_data->penart;
      	   $money_value = $penart_value;
      	   $restoration_loan = $loan_data->restration;
      	   $lejesho = $restoration_loan;

           // Determine whether today is a scheduled repayment day based on outstand start/end dates and loan day interval.
           $loan_start_date_raw = !empty($loan_data->loan_stat_date) ? $loan_data->loan_stat_date : null;
           $loan_end_date_raw = !empty($loan_data->loan_end_date) ? $loan_data->loan_end_date : null;
           $loan_start_date = $loan_start_date_raw ? date('Y-m-d', strtotime($loan_start_date_raw)) : null;
           $loan_end_date_schedule = $loan_end_date_raw ? date('Y-m-d', strtotime($loan_end_date_raw)) : null;
           $repayment_day_interval = (int)$day;

           $is_due_repayment_today = false;
           if (!empty($loan_start_date) && !empty($loan_end_date_schedule)) {
           	if ($today_date > $loan_start_date && $today_date <= $loan_end_date_schedule) {
           		$days_from_start = (int)((strtotime($today_date) - strtotime($loan_start_date)) / 86400);

           		if ($repayment_day_interval <= 1) {
           			$is_due_repayment_today = ($days_from_start >= 1);
           		} else {
           			$is_due_repayment_today = ($days_from_start >= $repayment_day_interval) && (($days_from_start % $repayment_day_interval) === 0);
           		}
           	}
           }

           // Check cash payments made today for this loan. Penalty applies only if required amount was not met.
           $today_paid_data = $this->db
           	->select('COALESCE(SUM(depost), 0) AS total_paid_today', false)
           	->from('tbl_pay')
           	->where('loan_id', $loan_id)
           	->where('DATE(date_data)', $today_date)
           	->where('description', 'CASH DEPOSIT')
           	->get()
           	->row();
           $today_paid_amount = (float)($today_paid_data->total_paid_today ?? 0);
           $is_payment_missing_today = ($today_paid_amount < (float)$loanreturn);

           // Prevent duplicate penalty insertion for the same loan on the same day.
           $has_penalty_today = $this->db
	           ->from('tbl_store_penalt')
	           ->where('loan_id', $loan_id)
	           ->where('DATE(penart_day)', $today_date)
	           ->count_all_results() > 0;

           // Grace period rule for expired loans (based on tbl_outstand.loan_end_date):
           // if overdue for more than 3 days, add daily 1% penalty of restration.
           $grace_period_days = 3;
           $daily_overdue_penalty_rate = 1;
           $is_grace_penalty_due_today = false;
           $grace_penalty_amount = 0;

           if (!empty($loan_end_date_schedule)) {
            	$days_since_end = (int)((strtotime($today_date) - strtotime($loan_end_date_schedule)) / 86400);
            	if ($days_since_end > $grace_period_days) {
            		$grace_penalty_amount = round(((float)$lejesho * $daily_overdue_penalty_rate) / 100, 2);
            		if ($grace_penalty_amount > 0 && !$has_penalty_today && ($loan_status === 'withdrawal' || $loan_status === 'out')) {
            			$is_grace_penalty_due_today = true;
            		}
            	}
           }

           if ($is_grace_penalty_due_today) {
            	$this->insert_loanPenart_moneyValue($comp_id, $blanch_id, $customer_id, $loan_id, $grace_penalty_amount, $group_id);
            	$has_penalty_today = true;
           }
           
      	   //asilimia lejesho
      	   $percent_calc = $money_value / 100 * $lejesho;
            
           if ($old_balance_data >= $loanreturn) {
      	       $sua = 0;
      	  
      	   }elseif($old_balance_data == 0){
      	   	    $sua = 0;
      	   }elseif($loanreturn >= $old_balance_data) {
      	   	$sua = $loanreturn - $old_balance_data;
            }
             
             if ($renew_loan == FALSE) {
            $instalment = $day * 1;
             }else{
            $instalment = $day * $renew_loan;
            }

           @$loan_balance_check = $this->queries->get_Desc_balance($loan_id);
           $pay_balance_check = @$loan_balance_check->balance;
           $reamain_kulipwa = $lejesho - $pay_balance_check;

            @$deni_ckeck = $this->queries->check_loan_pending($loan_id);
            $total_pend = @$deni_ckeck->total_pend;
            $deni_baki = $total_pend + $reamain_kulipwa;

                 if($loan_end_date <= $today and $loan_status == 'withdrawal'){
                  $this->insert_outStandLoan($comp_id,$blanch_id,$loan_id,$group_id,$customer_id,$rem,$group_id);
                  	$this->update_loastatus_outstand($loan_id);
                  	$this->update_customer_status_out($customer_id);
                  	$this->update_recovery($loan_id);
                    }elseif($depost_data >= $totalloan){
                    $this->update_loastatus($loan_id);
                    $this->insert_loan_kumaliza($comp_id,$blanch_id,$customer_id,$loan_id,$kumaliza,$group_id);
                    //$this->update_shedure_paid($loan_id);
                    $this->update_customer_status($customer_id);
                       	//echo"tayali";
                       }elseif($return_date == NULL){
                       	//echo "bado sana";
                       }elseif($is_due_repayment_today){
                       if($old_balance_data < $loanreturn and $penart_status == 'YES' and $action == 'MONEY VALUE' and $is_payment_missing_today){ 
                    	//insert penart money value
                    	//echo "penati ya hela";
                   if (!$has_penalty_today) {
                   $this->insert_loanPenart_moneyValue($comp_id,$blanch_id,$customer_id,$loan_id,$money_value,$group_id);
                   }
                   $this->witdrow_balanceAutoYote($loan_id,$comp_id,$blanch_id,$customer_id,$old_balance_data,$chukua_chote,$description,$group_id);
                       // insert pending loan
                   $this->insert_pending_data($comp_id,$blanch_id,$customer_id,$loan_id,$totalloan,$day,$loanreturn,$old_balance_data,$group_id);
                   if ($total_pend == TRUE || $total_pend == '0') {
                   $this->update_pending_total($loan_id,$deni_baki);
                   }elseif ($total_pend == FALSE) {
                   $this->insert_pending_total($comp_id,$customer_id,$blanch_id,$loan_id,$reamain_kulipwa);	
                   }
                   //insert customer report money value
                   $this->insert_loan_pending_report($comp_id,$blanch_id,$customer_id,$loan_id,$loanreturn,$sua,$money_value,$group_id);
                   //$this->update_shedure_notpaid($loan_id);
                       //echo "anadaiwa";
                       }elseif($old_balance_data < $loanreturn and $penart_status == 'YES' and $action == 'PERCENTAGE VALUE' and $is_payment_missing_today){
                   //	echo "penati ya asilimia";
                   	//insert loanpenart percentage value
                  if (!$has_penalty_today) {
                  $this->insert_loanPenart_percentage_Value($comp_id,$blanch_id,$customer_id,$loan_id,$percent_calc,$group_id);
                  }
                   $this->witdrow_balanceAutoYote($loan_id,$comp_id,$blanch_id,$customer_id,$old_balance_data,$chukua_chote,$description,$group_id);
                   	   //insert pending loan
                   $this->insert_pending_data($comp_id,$blanch_id,$customer_id,$loan_id,$totalloan,$day,$loanreturn,$old_balance_data,$group_id);
                   if ($total_pend == TRUE || $total_pend == '0') {
                   $this->update_pending_total($loan_id,$deni_baki);
                   }elseif ($total_pend == FALSE) {
                   $this->insert_pending_total($comp_id,$customer_id,$blanch_id,$loan_id,$reamain_kulipwa);	
                   }
                   	   //update return date
                      //insert customer report percentage value
                   $this->insert_loan_pending_reportPercentage_value($comp_id,$blanch_id,$customer_id,$loan_id,$loanreturn,$sua,$percent_calc,$group_id);
                   //$this->update_shedure_notpaid($loan_id);
                       }elseif($old_balance_data < $loanreturn and $penart_status == 'NO' and $is_payment_missing_today){
                   	 //echo "hakuna penart";
                   	 //insert loan penart
                   $this->insert_pending_data($comp_id,$blanch_id,$customer_id,$loan_id,$totalloan,$day,$loanreturn,$old_balance_data,$group_id);
                    //insert customer report no penart 
                   $this->insert_loan_penart_free($comp_id,$blanch_id,$customer_id,$loan_id,$loanreturn,$sua,$group_id);
                   $this->witdrow_balanceAutoYote($loan_id,$comp_id,$blanch_id,$customer_id,$old_balance_data,$chukua_chote,$description,$group_id);
                   if ($total_pend == TRUE || $total_pend == '0') {
                   $this->update_pending_total($loan_id,$deni_baki);
                   }elseif ($total_pend == FALSE) {
                   $this->insert_pending_total($comp_id,$customer_id,$blanch_id,$loan_id,$reamain_kulipwa);	
                   }
                   //$this->update_shedure_notpaid($loan_id);
                   
                   }if($old_balance_data >= $loanreturn){
                   	  //echo "makato yanaendelea";
                    $this->witdrow_balanceAuto($loan_id,$comp_id,$blanch_id,$customer_id,$loanreturn,$remain,$description,$group_id);
                    $this->insert_loan_penartPaid($comp_id,$blanch_id,$customer_id,$loan_id,$loanreturn,$group_id); 
                    //$this->update_shedure_paid($loan_id); 
                    }
                    //ilinitesa sana hii update return time
                    $this->update_returntime($loan_id,$instalment,$dis_date);
                    }
                  }
                 }

                 // elseif($old_balance_data < $loanreturn){
                 // {
                 //    }
    
          //update return date
public function update_returntime($loan_id,$instalment,$dis_date){
$now = date("Y-m-d H:i");
$someDate = DateTime::createFromFormat("Y-m-d H:i",$now);
$someDate->add(new DateInterval('P'.$instalment.'D'));
     $return_data = $someDate->format("Y-m-d 23:59");
     $rtn = $someDate->format("Y-m-d");
$sqldata="UPDATE `tbl_loans` SET `dis_date`='$now',`return_date`= '$return_data',`date_show`='$rtn',`dep_status`='open' WHERE `loan_id`= '$loan_id'";
  $query = $this->db->query($sqldata);
   return true;
}



     public function update_customer_status_out($customer_id){
     $sqldata="UPDATE `tbl_customer` SET `customer_status`= 'out' WHERE `customer_id`= '$customer_id'";
     $query = $this->db->query($sqldata);
     return true;
     }

      public function update_recovery($loan_id){
       //$today = date("Y-m-d");
     $sqldata="UPDATE `tbl_pending_total` SET `total_pend`= '0' WHERE `loan_id`= '$loan_id'";
     $query = $this->db->query($sqldata);
     return true;	
      }

      public function update_pending_total($loan_id,$deni_baki){
      //$today = date("Y-m-d");
     $sqldata="UPDATE `tbl_pending_total` SET `total_pend`= '$deni_baki' WHERE `loan_id`= '$loan_id'";
     $query = $this->db->query($sqldata);
     return true;	
      }

      public function insert_pending_total($comp_id,$customer_id,$blanch_id,$loan_id,$reamain_kulipwa){
      	$date = date("Y-m-d");
         $this->db->query("INSERT INTO  tbl_pending_total (`comp_id`,`customer_id`,`blanch_id`,`loan_id`,`total_pend`,`date`) VALUES ('$comp_id','$customer_id','$blanch_id','$loan_id','$reamain_kulipwa','$date')");	
        }

     public function update_shedure_paid($loan_id){
     $today = date("Y-m-d");
     //$today = date("2022-02-16");
     $sqldata="UPDATE `tbl_test_date` SET `date_status`= 'paid' WHERE `loan_id`= '$loan_id' AND `date` ='$today'";
    // print_r($sqldata);
    //    exit();
     $query = $this->db->query($sqldata);
     return true;	
     }


     public function update_shedure_notpaid($loan_id){
     $today = date("Y-m-d");
     //$today = date("2022-02-16");
     $sqldata="UPDATE `tbl_test_date` SET `date_status`= 'not paid' WHERE `loan_id`= '$loan_id' AND `date` ='$today'";
    // print_r($sqldata);
    //    exit();
     $query = $this->db->query($sqldata);
     return true;	
     }

         //update customer status
public function update_customer_status($customer_id){
$sqldata="UPDATE `tbl_customer` SET `customer_status`= 'close' WHERE `customer_id`= '$customer_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
   return true;
}

   //insert penart in fixed amount by samwel damian
           public function insert_loanPenart_moneyValue($comp_id,$blanch_id,$customer_id,$loan_id,$money_value,$group_id){
    	$day_penart = date("Y-m-d H:i");
    $this->db->query("INSERT INTO tbl_store_penalt (`comp_id`,`blanch_id`,`customer_id`,`loan_id`,`total_penart`,`penart_day`,`group_id`) VALUES ('$comp_id','$blanch_id','$customer_id','$loan_id','$money_value','$day_penart','$group_id')");
       }  

       //insert penart in percentage by samwel damian
     public function insert_loanPenart_percentage_Value($comp_id,$blanch_id,$customer_id,$loan_id,$percent_calc,$group_id){
    	$day_penart = date("Y-m-d H:i");
    $this->db->query("INSERT INTO tbl_store_penalt (`comp_id`,`blanch_id`,`customer_id`,`loan_id`,`total_penart`,`penart_day`,`group_id`) VALUES ('$comp_id','$blanch_id','$customer_id','$loan_id','$percent_calc','$day_penart','$group_id')");
       }
      //insert receivable pending penart report yes/money value
       public function insert_loan_pending_report($comp_id,$blanch_id,$customer_id,$loan_id,$loanreturn,$sua,$money_value,$group_id){
       	$report_day = date("Y-m-d");
    $this->db->query("INSERT INTO tbl_customer_report (`comp_id`,`blanch_id`,`customer_id`,`loan_id`,`recevable_amount`,`pending_amount`,`penart_amount`,`rep_date`,`group_id`) VALUES ('$comp_id','$blanch_id','$customer_id','$loan_id','$loanreturn','$sua','$money_value','$report_day','$group_id')");
       }

         //insert receivable pending penart report yes/percentage value
       public function insert_loan_pending_reportPercentage_value($comp_id,$blanch_id,$customer_id,$loan_id,$loanreturn,$sua,$percent_calc,$group_id){
       	$report_day = date("Y-m-d");
    $this->db->query("INSERT INTO tbl_customer_report (`comp_id`,`blanch_id`,`customer_id`,`loan_id`,`recevable_amount`,`pending_amount`,`penart_amount`,`rep_date`,`group_id`) VALUES ('$comp_id','$blanch_id','$customer_id','$loan_id','$loanreturn','$sua','$percent_calc','$report_day','$group_id')");
       }



       //insert loan free penart
       public function insert_loan_penart_free($comp_id,$blanch_id,$customer_id,$loan_id,$loanreturn,$sua,$group_id){
       		$report_day = date("Y-m-d");
    $this->db->query("INSERT INTO tbl_customer_report (`comp_id`,`blanch_id`,`customer_id`,`loan_id`,`recevable_amount`,`pending_amount`,`rep_date`,`group_id`) VALUES ('$comp_id','$blanch_id','$customer_id','$loan_id','$loanreturn','$sua','$report_day','$group_id')");
       }

            //insert paid not penart
       public function insert_loan_penartPaid($comp_id,$blanch_id,$customer_id,$loan_id,$loanreturn,$group_id){
       		$report_day = date("Y-m-d");
    $this->db->query("INSERT INTO tbl_customer_report (`comp_id`,`blanch_id`,`customer_id`,`loan_id`,`recevable_amount`,`pending_amount`,`rep_date`,`group_id`) VALUES ('$comp_id','$blanch_id','$customer_id','$loan_id','$loanreturn','$loanreturn','$report_day','$group_id')");
       }

               //insert paid kumaliza
       public function insert_loan_kumaliza($comp_id,$blanch_id,$customer_id,$loan_id,$kumaliza,$group_id){
       		$report_day = date("Y-m-d");
    $this->db->query("INSERT INTO tbl_customer_report (`comp_id`,`blanch_id`,`customer_id`,`loan_id`,`recevable_amount`,`pending_amount`,`rep_date`,`group_id`) VALUES ('$comp_id','$blanch_id','$customer_id','$loan_id','$kumaliza','$kumaliza','$report_day','$group_id')");
       }

  //insert pending report by samwel
       public function insert_pending_data($comp_id,$blanch_id,$customer_id,$loan_id,$totalloan,$day,$loanreturn,$old_balance_data,$group_id){
    $day_pend = date("Y-m-d");
    $someDate = DateTime::createFromFormat("Y-m-d",$day_pend);
    $someDate->add(new DateInterval("P1D"));
    $action = $someDate->format("Y-m-d");
    $this->db->query("INSERT INTO tbl_loan_pending (`comp_id`,`blanch_id`,`customer_id`,`loan_id`,`total_loan`,`return_day`,`return_total`,`pend_date`,`action_date`,`group_id`) VALUES ('$comp_id','$blanch_id','$customer_id','$loan_id','$totalloan','$day','$loanreturn'-$old_balance_data,'$day_pend','$action','$group_id')");
      }


             //insert paid customer report and  penart status  No
     public function insert_loan_customer_report_loanStatusNo($comp_id,$blanch_id,$customer_id,$loan_id,$loanreturn,$sua){
       		$report_day = date("Y-m-d");
      $this->db->query("INSERT INTO tbl_customer_report (`comp_id`,`blanch_id`,`customer_id`,`loan_id`,`recevable_amount`,`pending_amount`,`rep_date`) VALUES ('$comp_id','$blanch_id','$customer_id','$loan_id','$loanreturn','$sua','$report_day')");
       }

       public function insert_outStandLoan($comp_id,$blanch_id,$loan_id,$group_id,$customer_id,$rem){
       	$out_day = date("Y-m-d");
        $this->db->query("INSERT INTO tbl_outstand_loan (`comp_id`,`blanch_id`,`customer_id`,`loan_id`,`group_id`,`outstand_date`,`remain_amount`) VALUES ('$comp_id','$blanch_id','$customer_id','$loan_id','$group_id','$out_day','$rem')");

       }

         //update loan out_stand
    public function update_loastatus_outstand($loan_id){
  $sqldata="UPDATE `tbl_loans` SET `loan_status`= 'out' WHERE `loan_id`= '$loan_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
   return true;
}

          //update loan status
  public function update_loastatus($loan_id){
  $sqldata="UPDATE `tbl_loans` SET `loan_status`= 'done' WHERE `loan_id`= '$loan_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
   return true;
  }


  public function witdrow_balanceAuto($loan_id,$comp_id,$blanch_id,$customer_id,$loanreturn,$remain,$description,$group_id){
    $date = date("Y-m-d");
    $this->db->query("INSERT INTO tbl_pay (`loan_id`,`blanch_id`,`comp_id`,`customer_id`,`withdrow`,`balance`,`description`,`auto_date`,`group_id`,`date_data`) VALUES ('$loan_id','$blanch_id','$comp_id','$customer_id','$loanreturn','$remain','SYSTEM/LOAN RETURN','$date','$group_id','$date')");
         //echo "good data";
  }


      
    public function witdrow_balanceAutoYote($loan_id,$comp_id,$blanch_id,$customer_id,$old_balance_data,$chukua_chote,$description,$group_id){
    $date = date("Y-m-d");
    $this->db->query("INSERT INTO tbl_pay (`loan_id`,`blanch_id`,`comp_id`,`customer_id`,`withdrow`,`balance`,`description`,`auto_date`,`group_id`,`date_data`) VALUES ('$loan_id','$blanch_id','$comp_id','$customer_id','$old_balance_data','$chukua_chote','SYSTEM/LOAN RETURN','$date','$group_id','$date')");
         //echo "good data";
    }

      //end withdrawal function


	public function admin_login(){
		$this->load->view('home/admin_login');
	}

	public function forgot_password(){
	$this->load->view('home/forgot_password');
	}

	public function search_phone_number(){
	$this->load->model('queries');
	$comp_phone = $this->input->post('comp_phone');
	$phone_data = $this->queries->search_phone($comp_phone);
	@$comp_id = $phone_data->comp_id;
	@$comp_data = $this->queries->view_com($comp_id);
	 // print_r($comp_data);
	 //         exit();
     $this->load->view('home/password',['phone_data'=>$phone_data,'comp_data'=>$comp_data]);
	}

	public function update_password($comp_id){
      $this->form_validation->set_rules('new_password','New pasword','required|matches[password]');
      $this->form_validation->set_rules('password','pasword','required');
      $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
      if ($this->form_validation->run()) {
      	   //$data = $this->input->post();
      	   $data['password'] = sha1($this->input->post('password'));
      	   // print_r($data);
      	   //      exit();
      	   $this->load->model('queries');
      	  if ($this->queries->update_comppassword($comp_id,$data)) {
      	       $this->session->set_flashdata('massage','Password changed successfully');
      	   }else{
      	       $this->session->set_flashdata('error','Failed');

      	   }
      	   return redirect('welcome/search_phone_number');
      }
      $this->search_phone_number();
	}

	//super login

	public function super(){
	$this->load->view('home/super_admin');
	}
   public function super_signin(){
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('password','password','required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		if ($this->form_validation->run()){
			$email = $this->input->post('email');
			$password = sha1($this->input->post('password'));
			$this->load->model('queries');
			$userexit = $this->queries->super_user_data($email, $password);
			     //print_r($userexit);
			               // exit();
		if ($userexit){
				if ($userexit) {
					$sessionData = [
					'admin_id' => $userexit->admin_id,
					'email' => $userexit->email,
					];
					// print_r($userexit);
					//     exit();
					if ($userexit->email == true){
                      	$this->session->set_userdata($sessionData);
                      	$this->session->set_flashdata('massage','Log in successsfuly');
                      	return redirect('super_admin/index');
                      }elseif ($userexit->email == false) {
                    $this->session->set_userdata($sessionData);
                    $this->session->set_flashdata('massage','Log in successsfuly please update your account');
					return redirect("super_admin/profile");
                      }
				}
				
			}else{
				$this->session->set_flashdata('mass','Your Email or password is invalid Please try again');
				return redirect("welcome/super");
			}
		}
		else{
			$this->super();	
		}
	}


 
 

  public function sendsms($phone,$massage){
  
    $url = "https://sms-api.kadolab.com/api/send-sms";
    $token = getenv('SMS_TOKEN');
  
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
      'Authorization: Bearer '. $token,
      'Content-Type: application/json',
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
      "phoneNumbers" => ["+$phone"],
      "message" => $massage
    ]));
  
  $server_output = curl_exec($ch);
  curl_close ($ch);
  
  //print_r($server_output);
  }



// 	//send sms function
// function sendsms($phone,$massage){
//     $message = urlencode($massage);
//     $sender = 'SEDEMO'; 
//     $api_key = 'd4af7dff16f3ab47';
//     $secret_key = 'MjIyNWIwODNmNTNjZTg3OTI2MDBlNGQyYThjNTFjMzAwNmIzMjBhMmJhMGFjNDUxYjRmNmRhOTYxZGY3ZGZiOA==';
    
// $postData = array(
//     'source_addr' => 'INFO',
//     'encoding'=>0,
//     'schedule_time' => '',
//     'message' => $massage,
//     'recipients' => [array('recipient_id' => '1','dest_addr'=>$phone)]
// );

// $Url ='https://apisms.beem.africa/v1/send';

// $ch = curl_init($Url);
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
// curl_setopt_array($ch, array(
//     CURLOPT_POST => TRUE,
//     CURLOPT_RETURNTRANSFER => TRUE,
//     CURLOPT_HTTPHEADER => array(
//         'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
//         'Content-Type: application/json'
//     ),
//     CURLOPT_POSTFIELDS => json_encode($postData)
// ));

// $response = curl_exec($ch);

// if($response === FALSE){
//         echo $response;

//     die(curl_error($ch));
// }
// //var_dump($response);
// return true;

// }


	//Admin log out
	public function logout(){
		$this->session->unset_userdata("comp_id");
		$this->session->set_flashdata('massage','');
		return  redirect("welcome/employee_login");
	}

	//Manager log out
	public function empl_logout(){
		$this->session->unset_userdata("empl_id");
		$this->session->set_flashdata('massage','');
		return  redirect("welcome/Employee_signin");
	}


	//super log out
	public function super_logout(){
		$this->session->unset_userdata("admin_id");
		$this->session->set_flashdata('massage','');
		return  redirect("welcome/super");
	}

		//general Manager log out
	public function general_manager_logout(){
		$this->session->unset_userdata("empl_id");
		$this->session->set_flashdata('massage','');
		return  redirect("welcome/Employee_signin");
	}


}
