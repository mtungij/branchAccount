<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Oficer extends CI_Controller{
    public function index()
    {
      // $position = strtoupper(trim($this->session->userdata('position_name')));

        //print_r($empl_id);
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $blanch_id = $manager_data->blanch_id;

    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);


    // echo "<pre>";
    // print_r($empl_data);
    // exit();

    $receivable_total = $this->queries->get_total_recevableBlanch($blanch_id);
    $total_received = $this->queries->get_sumReceived_amountBlanch($blanch_id);
    $total_loan_pending = $this->queries->get_sun_loanPendingBlanch($blanch_id);
    $total_loanWithdrawal = $this->queries->get_today_withdrawal_loanBlanch($blanch_id);
    $today_penart = $this->queries->get_total_penartTodayBlanch($blanch_id);
    $prepaid_today = $this->queries->prepaid_payBlanch($blanch_id);

    $total_received = $this->queries->get_sumReceived_amountBlanchs($blanch_id);

    //$prepaid_today = $this->queries->prepaid_pay($comp_id);


    //   echo "<pre>";
    // print_r($total_received);
    // exit();

    $total_loan_fee = $this->queries->get_total_loanFeereconceBlanch($blanch_id);

    $today_income = $this->queries->get_today_incomeBlanch($blanch_id);

    $toay_expences = $this->queries->get_today_expencesBlanch($blanch_id);
    $privillage = $this->queries->get_position_empl($empl_id);

    //today cash in hand
    $today_depost = $this->queries->get_today_chashData_Blanch($blanch_id);
    $today_income = $this->queries->get_today_incomeBlanchData($blanch_id);
    $today_expences = $this->queries->get_today_expencesData($blanch_id);
    $accepted_expences = $this->queries->get_accepted_expencesBlanch($blanch_id);
    
    $rejesho = $this->queries->get_total_recevableBlanch($blanch_id);

    //mamager
    $manager = $this->queries->get_position_manager($empl_id);
    $principal_loan = $this->queries->get_total_principal($comp_id);
    $total_expect = $this->queries->get_loanExpectation($comp_id);
    $done_loan = $this->queries->get_totalLoanRepayment($comp_id);
    $total_blanch = $this->queries->get_total_blanch($comp_id);
    $total_empl = $this->queries->get_sumEmployee($comp_id);
    $total_customer = $this->queries->get_total_customer($comp_id);
    $active_customer = $this->queries->get_total_customerActive($comp_id);
    $pending_customer = $this->queries->get_total_customerPending($comp_id);
    $total_loan_request = $this->queries->get_loan_request($comp_id);
    $loan_aproved = $this->queries->get_loan_Aproved($comp_id);
    $loan_pend = $this->queries->get_today_loanPending($comp_id);
    $comp_recevable = $this->queries->get_total_recevableComp($comp_id);
    $receved = $this->queries->get_sumReceived_amount($comp_id);
    $recomended = $this->queries->get_recomended_expencesnumber($comp_id);
    $branch = $this->queries->get_blanchd($comp_id);

    $loan_feeClose = $this->queries->get_total_loanFeeCloseBlanch($blanch_id);
    $outstand_loan = $this->queries->total_outstand_loan($comp_id);
    $blanch_outstand = $this->queries->total_outstand_Blanch($blanch_id);

    $loan_aproveClose = $this->queries->get_loan_aprovecloseBlanch($blanch_id);
    $withdrawalclose = $this->queries->get_total_withAmountcloseBlanch($blanch_id);
    $loan_depostClose = $this->queries->get_totalDepostCloseBlanch($blanch_id);
    $receive_AmountClose = $this->queries->get_sumReceveCloseBlanch($blanch_id);
    $loan_feeCloseData = $this->queries->get_total_loanFeeCloseBlanchData($blanch_id);
    $request_expencesclose = $this->queries->get_expencesDataCloseBlanch($blanch_id);

     //deducted fee
    $deducted = $this->queries->get_today_income_blanch($blanch_id);
    $non_deducted = $this->queries->get_today_nonDeducted_fee($blanch_id);
    $blanch_amount_balance = $this->queries->get_blanch_capital_data($blanch_id);
    $total_deducted = $this->queries->get_today_deducted_feeblanch($blanch_id);
    
      // echo "<pre>";
      // print_r(   $non_deducted);
      //     exit();
    
    // if ($position === 'LOAN OFFICER') {
    
    //   $total_customers = $this->queries->count_customers_by_officer($empl_id);
    //   $active = $this->queries->count_active_by_officer($empl_id);
    //   $new_loans = $this->queries->count_open_loans_by_officer($empl_id);
    //   $new_customer =  $this->queries->count_customers_with_one_loan_today($blanch_id, $empl_id);
    //   $done_customer = $this->queries->count_customers_completed_loan_today_officer($blanch_id, $empl_id);
    //   $lipwa = $this->queries->get_cash_transaction_by_officer($empl_id);
    //   $approved_customer = $this->queries->get_approved_loans_by_officer($blanch_id, $empl_id);
    //   $disbursed_customer =$this->queries->count_disbursed_loans_by_officer($blanch_id, $empl_id);
    //   $active_customer = $this->queries->count_active_customers_by_officer($empl_id);
    //   // $pending_customer = $this->queries->count_pending_customers_by_officer($empl_id);
    //   $default_customer = $this->queries->count_default_customers_by_officer($empl_id);
    //   $done_customer = $this->queries->count_done_loans_with_today_deposit_by_officer($empl_id);
    //     $collect = $this->queries->get_total_recevableBlanch_by_officer($blanch_id, $empl_id);
       
    //     $total_default=$this->queries->get_depositing_out_total_officer($empl_id);

        

      // echo "<pre>";
      // print_r( $rejesho);
      //     exit();
  
  // } elseif ($position === 'BRANCH MANAGER') {
    
      $total_customers = $this->queries->count_customers_by_branch($blanch_id);
      $active = $this->queries->count_active_by_branch($blanch_id);
      $new_loans = $this->queries->count_open_loans_by_branch($blanch_id);
      $new_customer = $this->queries->count_new_customers_by_customer_id_today($blanch_id);
      $done_customer = $this->queries->count_customers_completed_loan_today($blanch_id);
      $approved_customer = $this->queries->get_approved_loans_by_branch($blanch_id);
      $disbursed_customer =$this->queries->count_disbursed_loans_by_branch($blanch_id);
      $lipwa = $this->queries->get_cash_transaction_by_blanch($blanch_id);
      $active_customer = $this->queries->count_active_customers_by_branch($blanch_id);
      // $pending_customer = $this->queries->count_pending_customers_by_branch($blanch_id);
      $default_customer = $this->queries->count_default_customers_by_branch($blanch_id);
      $done_customer = $this->queries->count_done_loans_with_today_deposit_by_branch($blanch_id);
      $customers_due_tomorrow = $this->queries->count_customers_ending_loan_tomorrow($blanch_id);
      $collect = $this->queries->get_total_recevableBlanch($blanch_id);
      
      $total_default = $this->queries->get_depositing_out_total_blanch($blanch_id);
  // } else {
  //     $total_customers = 0;
  //     $new_loans = 0;
  //     $done_customer=0;
  //     $approved_customer = 0;
  //     $disbursed_customer=0;
  //     $lipwa = 0;
  //     $default_customer = 0;
  //     $active_customer = 0;
  //     $done_customer = 0;
  //     $total_default=0;

  // }
    
      


      //    echo "<pre>";
      // print_r($new_loans);
      //     exit();
    $this->load->view('officer/index',['receivable_total'=>$receivable_total,
    'total_received'=>$total_received,
    'new_customer'=>$new_customer,
    'disbursed_customer'=>$disbursed_customer,
    'approved_customer'=>$approved_customer,
    'empl_data'=>$empl_data,
    'lipwa'=>$lipwa,
    'total_deducted'=>$total_deducted,
    'collect'=>$collect,
    'total_default'=>$total_default,
    'active_customer'=>$active_customer,
    'default_customer'=>$default_customer,
    'done_customer'=>$done_customer,
    'customers_due_tomorrow'=>$customers_due_tomorrow,
    'total_customers' =>  $total_customers,
    'total_active'=> $active,
    'new_loans' => $new_loans,
    'done_customer'=>$done_customer,
    'total_loan_pending'=>$total_loan_pending,
    'total_loanWithdrawal'=>$total_loanWithdrawal,
    'today_penart'=>$today_penart,'total_received'=>$total_received,
    'prepaid_today'=>$prepaid_today,'total_loan_fee'=>$total_loan_fee,
    'today_income'=>$today_income,'toay_expences'=>$toay_expences,
    'manager_data'=>$manager_data,
    'privillage'=>$privillage,
    'today_depost'=>$today_depost,
    'today_income'=>$today_income,
    'today_expences'=>$today_expences,
    'rejesho'=>$rejesho,'manager'=>$manager,
    'principal_loan'=>$principal_loan,'total_expect'=>$total_expect,
    'done_loan'=>$done_loan,
    'total_blanch'=>$total_blanch,
    'total_empl'=>$total_empl,
    'total_customer'=>$total_customer,
    'active_customer'=>$active_customer,
    'pending_customer'=>$pending_customer,
    'total_loan_request'=>$total_loan_request,
    'loan_aproved'=>$loan_aproved,
    'loan_pend'=>$loan_pend,'comp_recevable'=>$comp_recevable,
    'receved'=>$receved,'recomended'=>$recomended,'branch'=>$branch,
    'loan_feeClose'=>$loan_feeClose,'outstand_loan'=>$outstand_loan,
    'blanch_outstand'=>$blanch_outstand,'loan_aproveClose'=>$loan_aproveClose,
    'withdrawalclose'=>$withdrawalclose,'loan_depostClose'=>$loan_depostClose,
    'receive_AmountClose'=>$receive_AmountClose,'request_expencesclose'=>$request_expencesclose,
    'loan_feeCloseData'=>$loan_feeCloseData,'deducted'=>$deducted,'non_deducted'=>$non_deducted,'blanch_amount_balance'=>$blanch_amount_balance,'accepted_expences'=>$accepted_expences]);
    }

      public function my_profile(){
    	$this->load->model('queries');
           $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
          $employee = $this->queries->get_employee_data($empl_id);
            //    echo "<pre>";
            // print_r($employee);
            //  echo "</pre>";
            //   exit();

           $this->load->view('officer/my_profile',['employee'=>$employee]);
    }

   
public function mycustomer ()

{
  $this->load->model('queries');
  $blanch_id = $this->session->userdata('blanch_id');
  $empl_id = $this->session->userdata('empl_id');

  $mydata =$this->queries->get_mycustomer($blanch_id);

  $this->load->view('officer/mycustomer',['mydata'=> $mydata]);

}

    public function view_blanchPanel($blanch_id){
        $this->load->model('queries');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $manager = $this->queries->get_position_manager($empl_id);
        $branch = $this->queries->get_blanchd($comp_id);
        $blanch_datas = $this->queries->get_managerBlanch($blanch_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $empl_data = $this->queries->get_employee_data($empl_id);


        $branch = $this->queries->get_blanchd($comp_id);
        $blanch_datas = $this->queries->get_managerBlanch($blanch_id);
        //blanch wallet
        $blanch_walet_data = $this->queries->get_blanch_wallet($blanch_id);
        $principal = $this->queries->get_total_principalBlanch($blanch_id);
        $interst_principal = $this->queries->get_loanExpectationBlanch($blanch_id);
        $loan_return = $this->queries->get_totalLoanRepaymentBlanch($blanch_id);
        $income = $this->queries->get_total_incomeBlanch($blanch_id);
        $expences = $this->queries->get_today_expencesDataBlanch($blanch_id);
        $toal_customer = $this->queries->get_total_customerBlanch($blanch_id);
        $active_customerBlanch = $this->queries->get_total_customerActiveBlanch($blanch_id);
        $pending_customerBlanch = $this->queries->get_total_customerPendingBlanch($blanch_id);
        $loan_request = $this->queries->get_loan_requestBlanch($blanch_id);
        $loan_aproved = $this->queries->get_loan_AprovedBlanh($blanch_id);
        $loan_disbursed = $this->queries->loan_disbursedBlanch($blanch_id);
        $loan_pend = $this->queries->get_today_loanPendingBlanch($blanch_id);
        $receivable_blanch = $this->queries->get_total_recevableBlanchdata($blanch_id);
        $outstand_sum = $this->queries->get_outstand_total_blanch($blanch_id);
        $customer_closed = $this->queries->get_customerCosed($blanch_id);
        $pend_total = $this->queries->get_sum_loanpendBlanch($blanch_id);
        $dep_bla = $this->queries->get_today_receivableBlanch($blanch_id);
        $requet_number = $this->queries->get_requstExpensesBlanch($blanch_id);


        //opening
        $loanAprove = $this->queries->get_loan_aproveBlanch($blanch_id);
        $withdrawal = $this->queries->get_total_withAmountBlanch($blanch_id);
        $loan_depost = $this->queries->get_totalDepostBlanch($blanch_id);
        $receive_Amount = $this->queries->get_sumReceveBlanch($blanch_id);
        $loan_fee = $this->queries->get_total_loanFeeBlanchOpen($blanch_id);
        $request_expences = $this->queries->get_expencesDataBlanch($blanch_id);
          // print_r($manager_data);
          //        exit();
        $this->load->view('officer/blanch_panel',['branch'=>$branch,'blanch_datas'=>$blanch_datas,'blanch_walet_data'=>$blanch_walet_data,'principal'=>$principal,'interst_principal'=>$interst_principal,'loan_return'=>$loan_return,'income'=>$income,'expences'=>$expences,'toal_customer'=>$toal_customer,'active_customerBlanch'=>$active_customerBlanch,'pending_customerBlanch'=>$pending_customerBlanch,'loan_request'=>$loan_request,'loan_aproved'=>$loan_aproved,'loan_disbursed'=>$loan_disbursed,'loan_pend'=>$loan_pend,'receivable_blanch'=>$receivable_blanch,'outstand_sum'=>$outstand_sum,'customer_closed'=>$customer_closed,'pend_total'=>$pend_total,'dep_bla'=>$dep_bla,'requet_number'=>$requet_number,'loanAprove'=>$loanAprove,'withdrawal'=>$withdrawal,'loan_depost'=>$loan_depost,'receive_Amount'=>$receive_Amount,'loan_fee'=>$loan_fee,'request_expences'=>$request_expences,'manager'=>$manager,'privillage'=>$privillage,'empl_data'=>$empl_data,'manager_data'=>$manager_data]);
      }



    public function group(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $blanch = $this->queries->get_blanchMyBlanch($blanch_id);
    $group = $this->queries->get_groupDataBlanch($blanch_id);
    $privillage = $this->queries->get_position_empl($empl_id);
           // print_r($blanch);
           //    exit();
    $this->load->view('officer/group',['blanch'=>$blanch,'group'=>$group,'empl_data'=>$empl_data,'privillage'=>$privillage]);
    }


      public function create_group(){
        $this->load->helper('string');
        $this->form_validation->set_rules('blanch_id','Blanch name','required');
        $this->form_validation->set_rules('group_name','group name','required');
        $this->form_validation->set_rules('comp_id','Company name','required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
        if ($this->form_validation->run()) {
               $data = $this->input->post();
               //$data['code'] = random_string('basic',20);
                  // print_r($data);
                  //      exit();
               $this->load->model('queries');
               if ($this->queries->insert_group($data)) {
                    $this->session->set_flashdata('massage','Customer Group saved successfully');
               }else{
                $this->session->set_flashdata('error','Failed');
               }

               return redirect('oficer/group');
        }

        $this->group();
    }



  



         public function update_profile_picture(){
        $this->load->model('queries');
        $empl_id = $this->session->userdata('empl_id');
        
        if (empty($_FILES['passport']['name'])) {
            $this->session->set_flashdata('error', 'Please select a photo to upload');
            redirect('oficer/my_profile');
            return;
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
            redirect('oficer/my_profile');
            return;
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
        
        // Delete old passport if exists
        $current_employee = $this->queries->get_employee_data($empl_id);
        if (!empty($current_employee->passport)) {
            $old_passport_path = FCPATH . 'assets/images/passport/' . $current_employee->passport;
            if (file_exists($old_passport_path)) {
                unlink($old_passport_path);
            }
        }
        
        // Update database
        $data = ['passport' => $passport];
        $result = $this->queries->update_employee($empl_id, $data);
        
        if ($result) {
            $this->session->set_flashdata('massage', 'Profile picture updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Failed to update profile picture');
        }
        
        redirect('oficer/my_profile');
    }



        public function update_my_password(){
        $this->load->model('queries');
        $empl_id = $this->session->userdata('empl_id');
        
        // Form validation
        $this->form_validation->set_rules('current_password', 'Current Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');
        
        if ($this->form_validation->run() == FALSE) {
            $employee = $this->queries->get_employee_data($empl_id);
            $this->load->view('officer/my_profile', ['employee' => $employee]);
            return;
        }
        
        $employee = $this->queries->get_employee_data($empl_id);
        $current_password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password');
        
        // Verify current password
        if (!password_verify($current_password, $employee->password)) {
            $this->session->set_flashdata('error', 'Current password is incorrect');
            redirect('oficer/my_profile');
            return;
        }
        
        // Hash new password
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
        
        // Update password
        $data = ['password' => $hashed_password];
        $result = $this->queries->update_employee($empl_id, $data);
        
        if ($result) {
            $this->session->set_flashdata('massage', 'Password updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Failed to update password');
        }
        
        redirect('oficer/my_profile');
    }



     public function modify_group($group_id){
        $this->load->helper('string');
        $this->form_validation->set_rules('blanch_id','Blanch name','required');
        $this->form_validation->set_rules('group_name','group name','required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
        if ($this->form_validation->run()) {
               $data = $this->input->post();
                  // print_r($data);
                  //      exit();
               $this->load->model('queries');
               if ($this->queries->update_group($group_id,$data)) {
                    $this->session->set_flashdata('massage','Customer Group updated successfully');
               }else{
                $this->session->set_flashdata('error','Failed');
               }

               return redirect('oficer/group');
        }

        $this->group();
    }


    public function delete_group($group_id){
        $this->load->model('queries');
        if($this->queries->remove_group($group_id));
        $this->session->set_flashdata('massage','Data Deleted successfully');
        return redirect('oficer/group');
    }


    public function transfar_amount(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $blanch = $this->queries->get_blanch($comp_id);
    $float = $this->queries->get_amount_transfor($comp_id);
    $privillage = $this->queries->get_position_empl($empl_id);
   //    echo "<pre>";
     // print_r($float);
     //      exit();
    $this->load->view('officer/amount_transfor',['blanch'=>$blanch,'float'=>$float,'empl_data'=>$empl_data,'privillage'=>$privillage]);
 }


  public function create_float(){
    $this->form_validation->set_rules('comp_id','company','required');
    $this->form_validation->set_rules('blanch_id','Blanch','required');
    $this->form_validation->set_rules('blanch_amount','Amount','required');
    $this->form_validation->set_rules('trans_day','Date','required');
    $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
    if ($this->form_validation->run()) {
          $data = $this->input->post();
          // echo "<pre>";
          // print_r($data);
          //    exit();
          $this->load->model('queries');
          if ($this->queries->insert_amount($data)) {
             $this->session->set_flashdata('massage','Float Submited Sucessfully');
          }else{
             $this->session->set_flashdata('error','Failed');

          }

          return redirect('oficer/transfar_amount');
    }
    $this->transfar_amount();
 }


  public function modify_float($trans_id){
    $this->form_validation->set_rules('blanch_id','Blanch','required');
    $this->form_validation->set_rules('blanch_amount','Amount','required');
    $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
    if ($this->form_validation->run()) {
          $data = $this->input->post();
          // echo "<pre>";
          // print_r($data);
          //    exit();
          $this->load->model('queries');
          if ($this->queries->update_amount($trans_id,$data)) {
             $this->session->set_flashdata('massage','Float Updated Sucessfully');
          }else{
             $this->session->set_flashdata('error','Failed');

          }

          return redirect('oficer/transfar_amount');
    }
    $this->transfar_amount();

 }


  public function delete_float($trans_id){
    $this->load->model('queries');
    if($this->queries->remove_float($trans_id));
       $this->session->set_flashdata('massage','Float Deleted successfully');
       return redirect('oficer/transfar_amount');
 }

 public function expenses(){
$this->load->model('queries');
 $blanch_id = $this->session->userdata('blanch_id');
 $empl_id = $this->session->userdata('empl_id');
 $manager_data = $this->queries->get_manager_data($empl_id);
 $comp_id = $manager_data->comp_id;
 $company_data = $this->queries->get_companyData($comp_id);
 $blanch_data = $this->queries->get_blanchData($blanch_id);
 $empl_data = $this->queries->get_employee_data($empl_id);

 $exp = $this->queries->get_expenses($comp_id);
 $privillage = $this->queries->get_position_empl($empl_id);
 $manager = $this->queries->get_position_manager($empl_id);
  // print_r($exp);
  //       exit();
$this->load->view('officer/expenses',['exp'=>$exp,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
}

public function create_expenses(){
    $this->form_validation->set_rules('comp_id','company','required');
    $this->form_validation->set_rules('ex_name','expenses name','required');
    $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
    if ($this->form_validation->run()) {
         $data = $this->input->post();
         //   echo "<pre>";
         // print_r($data);
         //      exit();
         $this->load->model('queries');
         if ($this->queries->insert_expenses($data)) {
             $this->session->set_flashdata('massage','Expenses saved successfully');
         }else{
             $this->session->set_flashdata('error','Failed');

         }
         return redirect('oficer/expenses');
    }
    $this->expenses();
}


public function modify_expences($ex_id){
    $this->form_validation->set_rules('ex_name','expenses name','required');
    $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
    if ($this->form_validation->run()) {
         $data = $this->input->post();
         //   echo "<pre>";
         // print_r($data);
         //      exit();
         $this->load->model('queries');
         if ($this->queries->update_expenses($data,$ex_id)) {
             $this->session->set_flashdata('massage','Expenses Updated successfully');
         }else{
             $this->session->set_flashdata('error','Failed');

         }
         return redirect('oficer/expenses');
    }
    $this->expenses();  
}


public function delete_expenses($ex_id){
    $this->load->model('queries');
    if($this->queries->remove_expenses($ex_id));
    $this->session->set_flashdata('massage','Data Deleted successfully');
    return redirect('oficer/expenses');
}


public function expnses_requisition_form(){
$this->load->model('queries');
 $blanch_id = $this->session->userdata('blanch_id');
 $empl_id = $this->session->userdata('empl_id');
 $manager_data = $this->queries->get_manager_data($empl_id);
 $comp_id = $manager_data->comp_id;
 $company_data = $this->queries->get_companyData($comp_id);
 $blanch_data = $this->queries->get_blanchData($blanch_id);
 $empl_data = $this->queries->get_employee_data($empl_id);

  $expns = $this->queries->get_expenses($comp_id);
  $privillage = $this->queries->get_position_empl($empl_id);
  $manager = $this->queries->get_position_manager($empl_id);

  // Date + expense filter
  $filter_from = $this->input->get('from');
  $filter_to = $this->input->get('to');
  $filter_expense = $this->input->get('expense');
  if (!empty($filter_from) && !empty($filter_to)) {
      $data = $this->queries->get_expences_requestBlanchByDate($blanch_id, $filter_from, $filter_to, $filter_expense);
  } elseif (!empty($filter_expense)) {
      $data = $this->queries->get_expences_requestBlanchByDate($blanch_id, '2000-01-01', '2099-12-31', $filter_expense);
  } else {
      $data = $this->queries->get_expences_requestBlanchuniq($blanch_id);
  }

  $blanch_account = $this->queries->get_blanch_account_data($blanch_id);
  $branch_employees = $this->queries->get_AllemployeeBlanch($blanch_id);
    $this->load->view('officer/expenses_requisition',['expns'=>$expns,'empl_data'=>$empl_data,'privillage'=>$privillage,'data'=>$data,'manager'=>$manager,'blanch_account'=>$blanch_account,'branch_employees'=>$branch_employees,'filter_from'=>$filter_from,'filter_to'=>$filter_to,'filter_expense'=>$filter_expense]);
}

public function expenses_pdf(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $empl_data = $this->queries->get_employee_data($empl_id);
    $comp_id = $empl_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);

    $filter_from = $this->input->get('from');
    $filter_to = $this->input->get('to');
    $filter_expense = $this->input->get('expense');
    if (!empty($filter_from) && !empty($filter_to)) {
        $data = $this->queries->get_expences_requestBlanchByDate($blanch_id, $filter_from, $filter_to, $filter_expense);
    } elseif (!empty($filter_expense)) {
        $data = $this->queries->get_expences_requestBlanchByDate($blanch_id, '2000-01-01', '2099-12-31', $filter_expense);
    } else {
        $data = $this->queries->get_expences_requestBlanchuniq($blanch_id);
        $filter_from = date('Y-m-d');
        $filter_to = date('Y-m-d');
    }

    require_once APPPATH . '../vendor/autoload.php';
    $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4',
        'margin_left' => 10,
        'margin_right' => 10,
        'margin_top' => 10,
        'margin_bottom' => 15,
        'tempDir' => APPPATH . 'tmp/mpdf',
    ]);

    $html = $this->load->view('officer/expenses_pdf', [
        'data' => $data,
        'company_data' => $company_data,
        'blanch_data' => $blanch_data,
        'filter_from' => $filter_from,
        'filter_to' => $filter_to,
    ], TRUE);

    $mpdf->SetTitle('Expenses Report - ' . $blanch_data->blanch_name);
    $mpdf->SetFooter('Generated on ' . date('Y-m-d H:i'));
    $mpdf->WriteHTML($html);
    $filename = 'Expenses_' . $blanch_data->blanch_name . '_' . $filter_from . '_to_' . $filter_to . '.pdf';
    $mpdf->Output($filename, 'D');
}


public function create_requstion_form(){
$this->load->model('queries');
    $this->form_validation->set_rules('blanch_id','Blanch','required');
    $this->form_validation->set_rules('ex_id','Expenses','required');
    $this->form_validation->set_rules('req_amount','Request Amount','required');
    $this->form_validation->set_rules('trans_id','Account','required');
    $this->form_validation->set_rules('req_description','description','required');
    $this->form_validation->set_rules('comp_id','Company','required');
    $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

    if ($this->form_validation->run()) {
        $data = $this->input->post();
        $blanch_id = $data['blanch_id'];
        $ex_id = $data['ex_id'];
        $req_amount = $data['req_amount'];
        $trans_id = $data['trans_id'];
        $req_description = $data['req_description'];
        $comp_id = $data['comp_id'];

        // Check if expense is "Daily allowance" (auto-approve, no manager approval needed)
        $is_daily_allowance = ($ex_id === 'daily_allowance');
        if (!$is_daily_allowance) {
            $expense_info = $this->queries->get_expenses_byId($ex_id);
            $is_daily_allowance = (strtolower(trim($expense_info->ex_name)) == 'daily allowance');
        }

        if ($is_daily_allowance) {
            // Get the selected employees for daily allowance
            $allowance_empl_ids = $this->input->post('allowance_empl_ids');
            if (empty($allowance_empl_ids) || !is_array($allowance_empl_ids)) {
                $this->session->set_flashdata("error",'Please select at least one employee for Daily Allowance');
                return redirect("oficer/expnses_requisition_form");
            }

            // Use actual ex_id if it came from tbl_expenses, otherwise 0
            $da_ex_id = ($ex_id === 'daily_allowance') ? 0 : $ex_id;

            // Calculate total amount from all selected employees
            $total_amount = 0;
            $employees_data = [];
            foreach ($allowance_empl_ids as $aid) {
                $emp = $this->queries->get_employee_data($aid);
                $emp_allowance = isset($emp->daily_allowance) ? (int)$emp->daily_allowance : 0;
                $total_amount += $emp_allowance;
                $employees_data[] = ['empl' => $emp, 'amount' => $emp_allowance];
            }

            // Check balance for total amount
            $blanch_account = $this->queries->get_blanch_balance_expenses($blanch_id,$trans_id);
            $balance_blanch = $blanch_account->blanch_capital;
            if ($total_amount > $balance_blanch) {
                $this->session->set_flashdata("error",'Branch Account Balance is Not Enough (Total: '.number_format($total_amount).')');
                return redirect("oficer/expnses_requisition_form");
            }

            // Insert one request per employee, auto-approved
            foreach ($employees_data as $ed) {
                $desc = $ed['empl']->empl_name . ' - ' . $req_description;
                $this->insert_expenses_request($comp_id,$blanch_id,$da_ex_id,$desc,$ed['amount'],$trans_id,'accept',$ed['empl']->empl_id,'daily_allowance');
            }

            // Deduct total from branch account
            $remain = $balance_blanch - $total_amount;
            $this->update_blanch_account_balance($comp_id,$blanch_id,$trans_id,$remain);
            $this->queries->save_cash_inhand_balance(
              $comp_id,
              $blanch_id,
              $trans_id,
              $this->session->userdata('empl_id'),
              $remain,
              date('Y-m-d')
            );
            $this->queries->record_account_balance_movement(array(
              'comp_id' => $comp_id,
              'blanch_id' => $blanch_id,
              'trans_id' => $trans_id,
              'reference_type' => 'daily_allowance_approved',
              'reference_id' => null,
              'movement_date' => date('Y-m-d'),
              'amount_out' => $total_amount,
              'balance_before' => $balance_blanch,
              'balance_after' => $remain,
              'description' => 'Daily allowance auto-approved: ' . $req_description,
              'created_by' => $this->session->userdata('empl_id'),
            ));
            

            // Send SMS notification to admins for daily allowance
            $blanch_data = $this->queries->get_blanchData($blanch_id);
            $message = "Habari! Kuna matumizi yamefanyika ya posho za wafanyakazi wa tawi la " . $blanch_data->blanch_name . ".\n"
                     . "Jumla ya posho leo ni TZS " . number_format($total_amount, 0) . "\n"
                     . "Idadi ya wafanyakazi: " . count($employees_data);

            $admins_numbers = $this->queries->get_admin_numbers();
            foreach ($admins_numbers as $admin) {
                $this->sendsms($admin->phone_number, $message);
            }

            $this->session->set_flashdata("massage",'Daily Allowance approved for '.count($employees_data).' employee(s)');
        } else {
            // Auto-approve: insert as accepted and deduct balance immediately
            $blanch_account = $this->queries->get_blanch_balance_expenses($blanch_id,$trans_id);
            $balance_blanch = $blanch_account->blanch_capital;
            if ($req_amount > $balance_blanch) {
                $this->session->set_flashdata("error",'Requested amount exceeds account balance. Existed balance is '.number_format($balance_blanch));
                return redirect("oficer/expnses_requisition_form");
            }
            $this->insert_expenses_request($comp_id,$blanch_id,$ex_id,$req_description,$req_amount,$trans_id,'accept');

            // Deduct balance from branch account
            $remain = $balance_blanch - $req_amount;
            $this->update_blanch_account_balance($comp_id,$blanch_id,$trans_id,$remain);

            $this->queries->save_cash_inhand_balance(
                $comp_id,
                $blanch_id,
                $trans_id,
                $this->session->userdata('empl_id'),
                $remain,
                date('Y-m-d')
            );

            $expense_info = isset($expense_info) ? $expense_info : $this->queries->get_expenses_byId($ex_id);
            $expense_name = isset($expense_info->ex_name) ? $expense_info->ex_name : 'N/A';

            $this->queries->record_account_balance_movement(array(
                'comp_id' => $comp_id,
                'blanch_id' => $blanch_id,
                'trans_id' => $trans_id,
                'reference_type' => 'expense_accepted',
                'reference_id' => null,
                'movement_date' => date('Y-m-d'),
                'amount_out' => $req_amount,
                'balance_before' => $balance_blanch,
                'balance_after' => $remain,
                'description' => $expense_name . ': ' . $req_description,
                'created_by' => $this->session->userdata('empl_id'),
            ));

            // Send SMS notification to admins
            $empl_id = $this->session->userdata('empl_id');
            $empl_data = $this->queries->get_employee_data($empl_id);
            $blanch_data = $this->queries->get_blanchData($blanch_id);

            $message = "Habari! Matumizi yameidhinishwa katika tawi la " . $blanch_data->blanch_name . ".\n"
                     . "Aina: " . $expense_name . "\n"
                     . "Kiasi: TZS " . number_format($req_amount, 0) . "\n"
                     . "Maelezo: " . $req_description . "\n"
                     . "Aliyeidhinisha: " . $empl_data->empl_name;

            $admins_numbers = $this->queries->get_admin_numbers();
            foreach ($admins_numbers as $admin) {
                $this->sendsms($admin->phone_number, $message);
            }

            $this->session->set_flashdata("massage",'Expense approved successfully');
        }
        return redirect("oficer/expnses_requisition_form");
         }
      $this->expnses_requisition_form();        
    }


  public function insert_expenses_request($comp_id,$blanch_id,$ex_id,$req_description,$req_amount,$trans_id,$req_status='open',$allowance_empl_id=null,$deduct_type=null){
   $date = date("Y-m-d");
   $empl_id = $allowance_empl_id ? $allowance_empl_id : $this->session->userdata('empl_id');
   $deduct_type = $deduct_type ? $deduct_type : '';
  $this->db->query("INSERT INTO tbl_request_exp (`comp_id`,`blanch_id`,`ex_id`,`req_description`,`req_amount`,`req_date`,`trans_id`,`empl_id`,`req_status`,`deduct_type`) VALUES ('$comp_id','$blanch_id','$ex_id','$req_description','$req_amount','$date','$trans_id','$empl_id','$req_status','$deduct_type')");  
  }

  public function update_blanch_account_balance($comp_id,$blanch_id,$trans_id,$remain_blanch_remain){
  $sqldata="UPDATE `tbl_blanch_account` SET `blanch_capital`= '$remain_blanch_remain' WHERE `blanch_id`= '$blanch_id' AND `receive_trans_id` = '$trans_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
  return true;
  }


  public function delete_expences($req_id){
        $this->load->model('queries');
        $rejected = $this->queries->get_expenses_reject($req_id);
        $req_status = $rejected->req_status;

        // Only restore balance if expense was already approved (balance was deducted)
        if ($req_status == 'accept') {
            $blanch_id = $rejected->blanch_id;
            $req_amount = $rejected->req_amount;
            $trans_id = $rejected->trans_id;
            $comp_id = $rejected->comp_id;

            $blanch_account = $this->queries->get_blanch_balance_expenses($blanch_id,$trans_id);
            $blanch_capital = $blanch_account->blanch_capital;
            $return_balance = $blanch_capital + $req_amount;

            $this->update_account_balance_remain_data($comp_id,$blanch_id,$trans_id,$return_balance);
        }

        if($this->queries->remove_expences($req_id));
        $this->session->set_flashdata('massage','Expenses rejected successfully');
        return redirect('oficer/expnses_requisition_form');
    }



    public function update_account_balance_remain_data($comp_id,$blanch_id,$trans_id,$return_balance){
    $sqldata="UPDATE `tbl_blanch_account` SET `blanch_capital`= '$return_balance' WHERE `blanch_id`= '$blanch_id' AND `receive_trans_id`='$trans_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
  return true;  
    }



      public function get_recomended_request(){
         $this->load->model('queries');
         $blanch_id = $this->session->userdata('blanch_id');
         $empl_id = $this->session->userdata('empl_id');
         $manager_data = $this->queries->get_manager_data($empl_id);
         $comp_id = $manager_data->comp_id;
         $company_data = $this->queries->get_companyData($comp_id);
         $blanch_data = $this->queries->get_blanchData($blanch_id);
         $empl_data = $this->queries->get_employee_data($empl_id);

         $data = $this->queries->get_expences_requestManager($comp_id);
         $privillage = $this->queries->get_position_empl($empl_id);
         $manager = $this->queries->get_position_manager($empl_id);
          //    echo "<pre>";
          // print_r($data);
          //        exit();
        $this->load->view('officer/recomended_request',['data'=>$data,'privillage'=>$privillage,'manager'=>$manager]);
    }


    public function expenses_request_accept($req_id){
            $this->load->model('queries');

            // Get request details for balance deduction
            $request = $this->queries->get_recomended_status($req_id);
            $blanch_id = $request->blanch_id;
            $trans_id = $request->trans_id;
            $comp_id = $request->comp_id;
            $req_amount = $this->input->post('req_amount');

            // Check branch account balance before approving
            $blanch_account = $this->queries->get_blanch_balance_expenses($blanch_id,$trans_id);
            $balance_blanch = $blanch_account->blanch_capital;
            if ($req_amount > $balance_blanch) {
                $this->session->set_flashdata("error",'Branch Account Balance is Not Enough to approve this expense');
                return redirect('oficer/get_recomended_request');
            }

            $remain = $balance_blanch - $req_amount;

            $day = date('Y-m-d');
            $data = array(
            'req_comment'=> $this->input->post('req_comment'),
            'req_amount'=> $req_amount,
            'req_status'=> 'accept',
            'req_date' => $day,
            );

            $result = $this->queries->update_requet_status($req_id,$data);

            if($result){
                // Deduct balance from branch account on approval
                $this->update_blanch_account_balance($comp_id,$blanch_id,$trans_id,$remain);
              $this->queries->save_cash_inhand_balance(
                $comp_id,
                $blanch_id,
                $trans_id,
                $this->session->userdata('empl_id'),
                $remain,
                $day
              );
              $this->queries->record_account_balance_movement(array(
                'comp_id' => $comp_id,
                'blanch_id' => $blanch_id,
                'trans_id' => $trans_id,
                'reference_type' => 'expense_approved',
                'reference_id' => $req_id,
                'movement_date' => $day,
                'amount_out' => $req_amount,
                'balance_before' => $balance_blanch,
                'balance_after' => $remain,
                'description' => !empty($request->req_description) ? $request->req_description : 'Approved expense request',
                'created_by' => $this->session->userdata('empl_id'),
              ));
                $this->session->set_flashdata('massage','Expenses Accepted successfully');
            }else{
                $this->session->set_flashdata('error','Data failed!!');
            }
            return redirect('oficer/get_recomended_request');
    }


    //  public function delete_expences($req_id){
    //     $this->load->model('queries');
    //     if($this->queries->remove_expences($req_id));
    //     $this->session->set_flashdata('massage','Expenses rejected successfully');
    //     return redirect('oficer/get_recomended_request');
    // }


    public function income_dashboard(){
        $this->load->model('queries');
         $blanch_id = $this->session->userdata('blanch_id');
         $empl_id = $this->session->userdata('empl_id');
         $manager_data = $this->queries->get_manager_data($empl_id);
         $comp_id = $manager_data->comp_id;
         $company_data = $this->queries->get_companyData($comp_id);
         $blanch_data = $this->queries->get_blanchData($blanch_id);
         $empl_data = $this->queries->get_employee_data($empl_id);

        $income = $this->queries->get_income($comp_id);
        $detail_income = $this->queries->get_income_detailBlanchData($blanch_id);
        $total_receved = $this->queries->get_sum_incomeBlanchData($blanch_id);
        $blanch_account = $this->queries->get_blanch_account_data($blanch_id);
        $customer = $this->queries->get_allcutomerblanchData($blanch_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $manager = $this->queries->get_position_manager($empl_id);

    		$income_submit_token = function_exists('random_bytes')
    			? bin2hex(random_bytes(16))
    			: md5(uniqid((string) mt_rand(), true));
    		$this->session->set_userdata('income_submit_token', $income_submit_token);
        //  echo "<pre>";
        //    print_r( $detail_income);
        //          exit();
        $this->load->view('officer/income_dashboard',['income'=>$income,'detail_income'=>$detail_income,'total_receved'=>$total_receved,'customer'=>$customer,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager,'blanch_account'=>$blanch_account,'income_submit_token'=>$income_submit_token]);
    }

  public function daily_report(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = !empty($manager_data->comp_id) ? $manager_data->comp_id : $this->session->userdata('comp_id');
    $report_date = $this->normalize_report_date(trim((string) $this->input->get('report_date', true)));

    $blanch = $this->queries->get_blanch($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $selected_branch_name = !empty($blanch_data->blanch_name) ? $blanch_data->blanch_name : 'Branch';

    $total_today_with = $this->queries->get_today_loan_withdrawal($blanch_id, $report_date);
    $today_loan_withdraw_by_account = $this->queries->get_today_loan_withdrawal_by_account_blanch($blanch_id, $report_date);
    $total_received = $this->queries->get_total_deposit_blanch($blanch_id, $report_date);
    $received_by_account = $this->queries->get_totalaccount_transaction_blanch($blanch_id, $report_date);
    $payment_breakdown = $this->queries->get_daily_payment_breakdown_blanch($blanch_id, $report_date);
    $account_payment_summary = $this->queries->get_daily_account_payment_summary_blanch($blanch_id, $report_date);
    $today_expected_raw = $this->queries->get_today_receivable_blanch($blanch_id, $report_date);
    $today_expected = (object) array(
      'total_expected' => !empty($today_expected_raw->total_restoration) ? (float) $today_expected_raw->total_restoration : 0,
    );
    $penalty_today = $this->queries->get_sum_incomeBlanchData($blanch_id, $report_date);
    $today_penalty_income_type = $this->queries->get_daily_penalty_income_by_type_blanch($blanch_id, $report_date);
    $today_penalty_income_ledger = $this->queries->get_daily_penalty_income_ledger_blanch($blanch_id, $report_date);
    $processing_fee = $this->queries->get_total_deducted_income_blanch_data($blanch_id, $report_date);
    $today_accepted_expenses = $this->queries->get_daily_accepted_expenses_blanch($blanch_id, $report_date);
    $today_hq_transfer_in = $this->queries->get_daily_hq_transfer_in_by_account_blanch($blanch_id, $report_date);

      // echo "<pre>";
      //      print_r( $total_today_with);
      //            exit();

    $this->load->view('officer/daily_report', [
      'blanch' => $blanch,
      'report_date' => $report_date,
      'selected_branch_name' => $selected_branch_name,
      'total_today_with' => $total_today_with,
      'today_loan_withdraw_by_account' => $today_loan_withdraw_by_account,
      'total_received' => $total_received,
      'received_by_account' => $received_by_account,
      'payment_breakdown' => $payment_breakdown,
      'account_payment_summary' => $account_payment_summary,
      'today_expected' => $today_expected,
      'penalty_today' => $penalty_today,
      'today_penalty_income_type' => $today_penalty_income_type,
      'today_penalty_income_ledger' => $today_penalty_income_ledger,
      'processing_fee' => $processing_fee,
      'today_accepted_expenses' => $today_accepted_expenses,
      'today_hq_transfer_in' => $today_hq_transfer_in,
    ]);
  }

  public function daily_report_pdf(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = !empty($manager_data->comp_id) ? $manager_data->comp_id : $this->session->userdata('comp_id');
    $report_date = $this->normalize_report_date(trim((string) $this->input->get('report_date', true)));

    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $selected_branch_name = !empty($blanch_data->blanch_name) ? $blanch_data->blanch_name : 'Branch';

    $total_today_with = $this->queries->get_today_loan_withdrawal($blanch_id, $report_date);
    $today_loan_withdraw_by_account = $this->queries->get_today_loan_withdrawal_by_account_blanch($blanch_id, $report_date);
    $total_received = $this->queries->get_total_deposit_blanch($blanch_id, $report_date);
    $received_by_account = $this->queries->get_totalaccount_transaction_blanch($blanch_id, $report_date);
    $payment_breakdown = $this->queries->get_daily_payment_breakdown_blanch($blanch_id, $report_date);
    $account_payment_summary = $this->queries->get_daily_account_payment_summary_blanch($blanch_id, $report_date);
    $today_expected_raw = $this->queries->get_today_receivable_blanch($blanch_id, $report_date);
    $today_expected = (object) array(
      'total_expected' => !empty($today_expected_raw->total_restoration) ? (float) $today_expected_raw->total_restoration : 0,
    );
    $penalty_today = $this->queries->get_sum_incomeBlanchData($blanch_id, $report_date);
    $today_penalty_income_type = $this->queries->get_daily_penalty_income_by_type_blanch($blanch_id, $report_date);
    $today_penalty_income_ledger = $this->queries->get_daily_penalty_income_ledger_blanch($blanch_id, $report_date);
    $processing_fee = $this->queries->get_total_deducted_income_blanch_data($blanch_id, $report_date);
    $today_accepted_expenses = $this->queries->get_daily_accepted_expenses_blanch($blanch_id, $report_date);
    $today_hq_transfer_in = $this->queries->get_daily_hq_transfer_in_by_account_blanch($blanch_id, $report_date);

    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'tempDir' => APPPATH . 'tmp/mpdf']);
    $html = $this->load->view('officer/daily_report_pdf', [
      'company_data' => $company_data,
      'blanch_data' => $blanch_data,
      'selected_branch_name' => $selected_branch_name,
      'report_date' => $report_date,
      'total_today_with' => $total_today_with,
      'today_loan_withdraw_by_account' => $today_loan_withdraw_by_account,
      'total_received' => $total_received,
      'received_by_account' => $received_by_account,
      'payment_breakdown' => $payment_breakdown,
      'account_payment_summary' => $account_payment_summary,
      'today_expected' => $today_expected,
      'penalty_today' => $penalty_today,
      'today_penalty_income_type' => $today_penalty_income_type,
      'today_penalty_income_ledger' => $today_penalty_income_ledger,
      'processing_fee' => $processing_fee,
      'today_accepted_expenses' => $today_accepted_expenses,
      'today_hq_transfer_in' => $today_hq_transfer_in,
    ], true);

    $mpdf->SetFooter('Generated By Brainsoft Technology');
    $mpdf->WriteHTML($html);
    $pdf_branch = preg_replace('/[^A-Za-z0-9_\-]/', '_', $selected_branch_name);
    $mpdf->Output('hesabu_ya_siku_' . $pdf_branch . '_' . $report_date . '.pdf', 'I');
  }

  public function mauzo_report($report_date = null){
    $this->load->model('queries');

    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = !empty($manager_data->comp_id) ? $manager_data->comp_id : $this->session->userdata('comp_id');

    if (!empty($manager_data->blanch_id)) {
      $blanch_id = $manager_data->blanch_id;
    }

    $input_date = $this->input->get('report_date', true);
    if (empty($input_date)) {
      $input_date = $report_date;
    }
    $report_date = $this->normalize_report_date(trim((string) $input_date));

    // Check if report_date is today
    $is_today_report = ($report_date === date('Y-m-d'));

    $blanch_data = $this->queries->get_blanchData($blanch_id);

    $jana_date = date('Y-m-d', strtotime($report_date . ' -1 day'));
    $jana_row = $this->queries->get_mauzo_jana_blanch($blanch_id, $jana_date);
    $leo_row = $this->queries->get_mauzo_leo_blanch($blanch_id, $report_date);
    $gawa_row = $this->queries->get_mauzo_gawa_blanch($blanch_id, $report_date);
    $double_row = $this->queries->get_mauzo_double_blanch($blanch_id, $report_date);

    $jana_raw = !empty($jana_row->total_jana) ? (float) $jana_row->total_jana : 0;
    $leo_val = !empty($leo_row->total_leo) ? (float) $leo_row->total_leo : 0;
    $gawa_val = !empty($gawa_row->total_gawa) ? (float) $gawa_row->total_gawa : 0;
    $double_val = !empty($double_row->total_double) ? (float) $double_row->total_double : 0;

    $jana_val = max(0, $jana_raw);
    $jumla_val = $jana_val + $leo_val;

    $accounts = $this->queries->get_mauzo_lala_accounts_blanch($blanch_id, $jana_date);
    $today_accounts = $this->queries->get_mauzo_lala_accounts_blanch($blanch_id, $report_date);
    $lala_jumla = 0;
    foreach ($accounts as $acc) {
      $lala_jumla += (float) $acc->closing_balance;
    }

    $fee_jana_row = $this->queries->get_mauzo_fee_jana_blanch($blanch_id, $report_date);
    $fee_leo_row = $this->queries->get_mauzo_fee_leo_blanch($blanch_id, $report_date);
    $fee_jana_val = !empty($fee_jana_row->total_fee_jana) ? (float) $fee_jana_row->total_fee_jana : 0;
    $fee_leo_val = !empty($fee_leo_row->total_fee_leo) ? (float) $fee_leo_row->total_fee_leo : 0;
    $fee_jumla_val = $fee_jana_val + $fee_leo_val;

    $fine_jana_row = $this->queries->get_mauzo_fine_jana_blanch($blanch_id, $report_date);
    $fine_leo_row = $this->queries->get_mauzo_fine_leo_blanch($blanch_id, $report_date);
    $fine_jana_val = !empty($fine_jana_row->total_fine_jana) ? (float) $fine_jana_row->total_fine_jana : 0;
    $fine_leo_val = !empty($fine_leo_row->total_fine_leo) ? (float) $fine_leo_row->total_fine_leo : 0;
    $fine_jumla_val = $fine_jana_val + $fine_leo_val;

    $sugu_jana_row = $this->queries->get_mauzo_sugu_jana_blanch($blanch_id, $report_date);
    $sugu_leo_row = $this->queries->get_mauzo_sugu_leo_blanch($blanch_id, $report_date);
    $sugu_lala_row = $this->queries->get_mauzo_sugu_lala_blanch($blanch_id, $report_date);
    $sugu_jana_val = !empty($sugu_jana_row->total_sugu_jana) ? (float) $sugu_jana_row->total_sugu_jana : 0;
    $sugu_leo_val = !empty($sugu_leo_row->total_sugu_leo) ? (float) $sugu_leo_row->total_sugu_leo : 0;
    $sugu_jumla_val = $sugu_jana_val + $sugu_leo_val;
    $sugu_lala_val = !empty($sugu_lala_row->total_sugu_lala) ? (float) $sugu_lala_row->total_sugu_lala : 0;

    $customer_count_row = $this->queries->get_daily_report_customer_count($comp_id, $blanch_id);
    $customers_paid_row = $this->queries->get_daily_report_customers_paid_count($comp_id, $report_date, $blanch_id);
    $new_customers_row = $this->queries->get_daily_report_new_customers_count($comp_id, $report_date, $blanch_id);
    $total_customers_count = !empty($customer_count_row->total_customers) ? (int) $customer_count_row->total_customers : 0;
    $customers_paid_count = !empty($customers_paid_row->total_paid_customers) ? (int) $customers_paid_row->total_paid_customers : 0;
    $new_customers_count = !empty($new_customers_row->total_new_customers) ? (int) $new_customers_row->total_new_customers : 0;

    $expenses_jana_row = $this->queries->get_mauzo_expenses_jana_blanch($blanch_id, $report_date);
    $expenses_leo_row = $this->queries->get_mauzo_expenses_leo_blanch($blanch_id, $report_date);
    $expenses_jana_val = !empty($expenses_jana_row->total_expenses_jana) ? (float) $expenses_jana_row->total_expenses_jana : 0;
    $expenses_leo_val = !empty($expenses_leo_row->total_expenses_leo) ? (float) $expenses_leo_row->total_expenses_leo : 0;
    $expenses_jumla_val = $expenses_jana_val + $expenses_leo_val;

    $expenses_accounts = $this->queries->get_mauzo_expenses_accounts_blanch($blanch_id, $report_date);

    $this->load->view('officer/mauzo_report', array(
      'report_date'         => $report_date,
      'is_today_report'     => $is_today_report,
      'branch_name'         => !empty($blanch_data->blanch_name) ? $blanch_data->blanch_name : 'Branch',
      'jana_val'            => $jana_val,
      'leo_val'             => $leo_val,
      'jumla_val'           => $jumla_val,
      'gawa_val'            => $gawa_val,
      'double_val'          => $double_val,
      'accounts'            => $accounts,
      'today_accounts'      => $today_accounts,
      'lala_jumla'          => $lala_jumla,
      'fee_jana_val'        => $fee_jana_val,
      'fee_leo_val'         => $fee_leo_val,
      'fee_jumla_val'       => $fee_jumla_val,
      'fine_jana_val'       => $fine_jana_val,
      'fine_leo_val'        => $fine_leo_val,
      'fine_jumla_val'      => $fine_jumla_val,
      'sugu_jana_val'       => $sugu_jana_val,
      'sugu_leo_val'        => $sugu_leo_val,
      'sugu_jumla_val'      => $sugu_jumla_val,
      'sugu_lala_val'       => $sugu_lala_val,
      'total_customers_count' => $total_customers_count,
      'customers_paid_count'  => $customers_paid_count,
      'new_customers_count'   => $new_customers_count,
      'expenses_jana_val'   => $expenses_jana_val,
      'expenses_leo_val'    => $expenses_leo_val,
      'expenses_jumla_val'  => $expenses_jumla_val,
      'expenses_accounts'   => $expenses_accounts,
    ));
  }

  public function mauzo_report_pdf(){
    $this->load->model('queries');

    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = !empty($manager_data->comp_id) ? $manager_data->comp_id : $this->session->userdata('comp_id');

    if (!empty($manager_data->blanch_id)) {
      $blanch_id = $manager_data->blanch_id;
    }

    $report_date = $this->normalize_report_date(trim((string) $this->input->get('report_date', true)));
    $mode = strtoupper(trim((string) $this->input->get('mode', true)));
    if ($mode !== 'I') {
      $mode = 'D';
    }

    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);

    $jana_date = date('Y-m-d', strtotime($report_date . ' -1 day'));
    $jana_row = $this->queries->get_mauzo_jana_blanch($blanch_id, $jana_date);
    $leo_row = $this->queries->get_mauzo_leo_blanch($blanch_id, $report_date);
    $gawa_row = $this->queries->get_mauzo_gawa_blanch($blanch_id, $report_date);
    $double_row = $this->queries->get_mauzo_double_blanch($blanch_id, $report_date);

    $jana_raw = !empty($jana_row->total_jana) ? (float) $jana_row->total_jana : 0;
    $leo_val = !empty($leo_row->total_leo) ? (float) $leo_row->total_leo : 0;
    $gawa_val = !empty($gawa_row->total_gawa) ? (float) $gawa_row->total_gawa : 0;
    $double_val = !empty($double_row->total_double) ? (float) $double_row->total_double : 0;

    $jana_val = max(0, $jana_raw);
    $jumla_val = $jana_val + $leo_val;

    $accounts = $this->queries->get_mauzo_lala_accounts_blanch($blanch_id, $jana_date);
    $today_accounts = $this->queries->get_mauzo_lala_accounts_blanch($blanch_id, $report_date);
    $lala_accounts_for_total = !empty($accounts) ? $accounts : $today_accounts;
    $lala_jumla = 0;
    foreach ($lala_accounts_for_total as $acc) {
      $lala_jumla += (float) $acc->closing_balance;
    }

    $fee_jana_row = $this->queries->get_mauzo_fee_jana_blanch($blanch_id, $report_date);
    $fee_leo_row = $this->queries->get_mauzo_fee_leo_blanch($blanch_id, $report_date);
    $fee_jana_val = !empty($fee_jana_row->total_fee_jana) ? (float) $fee_jana_row->total_fee_jana : 0;
    $fee_leo_val = !empty($fee_leo_row->total_fee_leo) ? (float) $fee_leo_row->total_fee_leo : 0;
    $fee_jumla_val = $fee_jana_val + $fee_leo_val;

    $fine_jana_row = $this->queries->get_mauzo_fine_jana_blanch($blanch_id, $report_date);
    $fine_leo_row = $this->queries->get_mauzo_fine_leo_blanch($blanch_id, $report_date);
    $fine_jana_val = !empty($fine_jana_row->total_fine_jana) ? (float) $fine_jana_row->total_fine_jana : 0;
    $fine_leo_val = !empty($fine_leo_row->total_fine_leo) ? (float) $fine_leo_row->total_fine_leo : 0;
    $fine_jumla_val = $fine_jana_val + $fine_leo_val;

    $sugu_jana_row = $this->queries->get_mauzo_sugu_jana_blanch($blanch_id, $report_date);
    $sugu_leo_row = $this->queries->get_mauzo_sugu_leo_blanch($blanch_id, $report_date);
    $sugu_lala_row = $this->queries->get_mauzo_sugu_lala_blanch($blanch_id, $report_date);
    $sugu_jana_val = !empty($sugu_jana_row->total_sugu_jana) ? (float) $sugu_jana_row->total_sugu_jana : 0;
    $sugu_leo_val = !empty($sugu_leo_row->total_sugu_leo) ? (float) $sugu_leo_row->total_sugu_leo : 0;
    $sugu_jumla_val = $sugu_jana_val + $sugu_leo_val;
    $sugu_lala_val = !empty($sugu_lala_row->total_sugu_lala) ? (float) $sugu_lala_row->total_sugu_lala : 0;

    $customer_count_row = $this->queries->get_daily_report_customer_count($comp_id, $blanch_id);
    $customers_paid_row = $this->queries->get_daily_report_customers_paid_count($comp_id, $report_date, $blanch_id);
    $new_customers_row = $this->queries->get_daily_report_new_customers_count($comp_id, $report_date, $blanch_id);
    $total_customers_count = !empty($customer_count_row->total_customers) ? (int) $customer_count_row->total_customers : 0;
    $customers_paid_count = !empty($customers_paid_row->total_paid_customers) ? (int) $customers_paid_row->total_paid_customers : 0;
    $new_customers_count = !empty($new_customers_row->total_new_customers) ? (int) $new_customers_row->total_new_customers : 0;

    $expenses_accounts = $this->queries->get_mauzo_expenses_accounts_blanch($blanch_id, $report_date);

    $html = $this->load->view('officer/mauzo_report_pdf', array(
      'company_data'         => $company_data,
      'blanch_data'          => $blanch_data,
      'report_date'          => $report_date,
      'branch_name'          => !empty($blanch_data->blanch_name) ? $blanch_data->blanch_name : 'Branch',
      'jana_val'             => $jana_val,
      'leo_val'              => $leo_val,
      'jumla_val'            => $jumla_val,
      'gawa_val'             => $gawa_val,
      'double_val'           => $double_val,
      'accounts'             => $accounts,
      'today_accounts'       => $today_accounts,
      'lala_jumla'           => $lala_jumla,
      'fee_jana_val'         => $fee_jana_val,
      'fee_leo_val'          => $fee_leo_val,
      'fee_jumla_val'        => $fee_jumla_val,
      'fine_jana_val'        => $fine_jana_val,
      'fine_leo_val'         => $fine_leo_val,
      'fine_jumla_val'       => $fine_jumla_val,
      'sugu_jana_val'        => $sugu_jana_val,
      'sugu_leo_val'         => $sugu_leo_val,
      'sugu_jumla_val'       => $sugu_jumla_val,
      'sugu_lala_val'        => $sugu_lala_val,
      'total_customers_count' => $total_customers_count,
      'customers_paid_count'  => $customers_paid_count,
      'new_customers_count'   => $new_customers_count,
      'expenses_accounts'    => $expenses_accounts,
    ), true);

    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'tempDir' => APPPATH . 'tmp/mpdf']);
    $mpdf->SetFooter('Generated By Brainsoft Technology');
    $mpdf->WriteHTML($html);

    $branch_label = !empty($blanch_data->blanch_name) ? $blanch_data->blanch_name : 'branch';
    $branch_slug = preg_replace('/[^A-Za-z0-9]+/', '_', strtolower(trim($branch_label)));
    $branch_slug = trim($branch_slug, '_');
    if ($branch_slug === '') {
      $branch_slug = 'branch';
    }
    $file_name = 'mauzo_report_' . $branch_slug . '_' . $report_date . '.pdf';

    $mpdf->Output($file_name, $mode);
  }

  private function normalize_report_date($date_input){
    if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $date_input) && strtotime($date_input) !== false) {
      return $date_input;
    }

    return date('Y-m-d');
  }

function fetch_loanActive()
{
$this->load->model('queries');
if($this->input->post('customer_id'))
{
echo $this->queries->fetch_vipmios($this->input->post('customer_id'));
}
}

     public function manager_income_dashboard(){
        $this->load->model('queries');
         $blanch_id = $this->session->userdata('blanch_id');
         $empl_id = $this->session->userdata('empl_id');
         $manager_data = $this->queries->get_manager_data($empl_id);
         $comp_id = $manager_data->comp_id;
         $company_data = $this->queries->get_companyData($comp_id);
         $blanch_data = $this->queries->get_blanchData($blanch_id);
         $empl_data = $this->queries->get_employee_data($empl_id);

        $income = $this->queries->get_income($comp_id);
        $detail_income = $this->queries->get_income_detail($comp_id);
        $total_receved = $this->queries->get_sum_income($comp_id);
        $customer = $this->queries->get_allcutomer($comp_id);
        $blanch = $this->queries->get_blanch($comp_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $manager = $this->queries->get_position_manager($empl_id);
         // echo "<pre>";
         //   print_r($customer);
         //         exit();
        $this->load->view('officer/manager_income_dashboard',['income'=>$income,'detail_income'=>$detail_income,'total_receved'=>$total_receved,'customer'=>$customer,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager,'blanch'=>$blanch]);
    }


    public function search_income_inBlanch(){
        $this->load->model('queries');
         $blanch_id = $this->session->userdata('blanch_id');
         $empl_id = $this->session->userdata('empl_id');
         $manager_data = $this->queries->get_manager_data($empl_id);
         $comp_id = $manager_data->comp_id;
         $company_data = $this->queries->get_companyData($comp_id);
         $blanch_data = $this->queries->get_blanchData($blanch_id);
         $empl_data = $this->queries->get_employee_data($empl_id);

        $blanch_id = $this->input->post('blanch_id');
        $receve_day = $this->input->post('receve_day');
        $blanch_income = $this->queries->get_blanchIncome($blanch_id,$receve_day);
        $blanch = $this->queries->get_blanch($comp_id);
        $sum_income = $this->queries->get_sum_incomeBlanchData($blanch_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $manager = $this->queries->get_position_manager($empl_id);
         //  echo "<pre>";
         // print_r($sum_income);
         //            exit();
        $this->load->view('officer/income_blanch',['blanch_income'=>$blanch_income,'blanch'=>$blanch,'sum_income'=>$sum_income,'blanch_id'=>$blanch_id,'receve_day'=>$receve_day,'privillage'=>$privillage,'manager'=>$manager]);
    }


    public function print_todayIncome(){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
         $empl_id = $this->session->userdata('empl_id');
         $manager_data = $this->queries->get_manager_data($empl_id);
         $comp_id = $manager_data->comp_id;
         $company_data = $this->queries->get_companyData($comp_id);
         $blanch_data = $this->queries->get_blanchData($blanch_id);
         $empl_data = $this->queries->get_employee_data($empl_id);
        $compdata = $this->queries->get_companyData($comp_id);
        $income = $this->queries->get_income($comp_id);
        $detail_income = $this->queries->get_income_detail($comp_id);
        $total_receved = $this->queries->get_sum_income($comp_id);
        $mpdf = new \Mpdf\Mpdf(['tempDir' => APPPATH . 'tmp/mpdf']);
        $html = $this->load->view('officer/today_income_report',['compdata'=>$compdata,'income'=>$income,'detail_income'=>$detail_income,'total_receved'=>$total_receved],true);
         $footer_text = strtoupper(trim((string)($compdata->comp_name ?? '')));
         if ($footer_text === '') {
           $footer_text = 'COMPANY';
         }
         $mpdf->SetFooter($footer_text);
        $mpdf->WriteHTML($html);
        $mpdf->Output(); 
    }


    public function print_blanch_income($blanch_id,$receve_day){
        $this->load->model('queries');
       $blanch_id = $this->session->userdata('blanch_id');
         $empl_id = $this->session->userdata('empl_id');
         $manager_data = $this->queries->get_manager_data($empl_id);
         $comp_id = $manager_data->comp_id;
         $company_data = $this->queries->get_companyData($comp_id);
         $blanch_data = $this->queries->get_blanchData($blanch_id);
         $empl_data = $this->queries->get_employee_data($empl_id);

        $compdata = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanch_data($blanch_id);
        $blanch_income = $this->queries->get_blanchDataIncome($blanch_id,$receve_day);
        $sum_income = $this->queries->get_sum_incomeBlanchData($blanch_id);
             //     echo "<pre>";
             // print_r($blanch_income);
             //         exit();
        $mpdf = new \Mpdf\Mpdf(['tempDir' => APPPATH . 'tmp/mpdf']);
        $html = $this->load->view('officer/print_blanch_income',['compdata'=>$compdata,'blanch_income'=>$blanch_income,'sum_income'=>$sum_income,'blanch_data'=>$blanch_data],true);
        $mpdf->SetFooter('Generated By Brainsoft Technology');
        $mpdf->WriteHTML($html);
        $mpdf->Output(); 
      //$this->load->view('admin/print_blanch_income');
    }


    public function get_accepted_expencess(){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
         $empl_id = $this->session->userdata('empl_id');
         $manager_data = $this->queries->get_manager_data($empl_id);
         $comp_id = $manager_data->comp_id;
         $company_data = $this->queries->get_companyData($comp_id);
         $blanch_data = $this->queries->get_blanchData($blanch_id);
         $empl_data = $this->queries->get_employee_data($empl_id);

         $data = $this->queries->get_expences_requestAccepted($comp_id);
         $privillage = $this->queries->get_position_empl($empl_id);
         $manager = $this->queries->get_position_manager($empl_id);
         $total_req = $this->queries->getTotal_reqExpences($comp_id);
          // print_r($total_req);
          //         exit();
        $this->load->view('officer/accepted_expences',['privillage'=>$privillage,'manager'=>$manager,'empl_data'=>$empl_data,'data'=>$data,'total_req'=>$total_req]);
    }


    public function print_accepted_expences(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $data = $this->queries->get_expences_requestAccepted($comp_id);
    $privillage = $this->queries->get_position_empl($empl_id);
    $manager = $this->queries->get_position_manager($empl_id);
    $total_req = $this->queries->getTotal_reqExpences($comp_id);
    $compdata = $this->queries->get_companyData($comp_id);

    $mpdf = new \Mpdf\Mpdf(['tempDir' => APPPATH . 'tmp/mpdf']);
    $html = $this->load->view('officer/print_all_aceptexpences',['data'=>$data,'blanch'=>$blanch,'compdata'=>$compdata,'total_req'=>$total_req],true);
    $mpdf->SetFooter('Generated By Brainsoft Technology');
    $mpdf->WriteHTML($html);
    $mpdf->Output(); 
    }


    //out data

function fetch_ward_data()
{
$this->load->model('queries');
if($this->input->post('blanch_id'))
{
echo $this->queries->fetch_eneos($this->input->post('blanch_id'));
}
}

function fetch_data_vipimioData()
{
$this->load->model('queries');
if($this->input->post('region_id'))
{
echo $this->queries->fetch_vipmios($this->input->post('region_id'));
}
}


        public function income_detail(){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
         $empl_id = $this->session->userdata('empl_id');
         $manager_data = $this->queries->get_manager_data($empl_id);
         $comp_id = $manager_data->comp_id;
         $company_data = $this->queries->get_companyData($comp_id);
         $blanch_data = $this->queries->get_blanchData($blanch_id);
         $empl_data = $this->queries->get_employee_data($empl_id);        
         $income = $this->queries->get_income($comp_id);
         $manager = $this->queries->get_position_manager($empl_id);
         $privillage = $this->queries->get_position_empl($empl_id);
           // print_r($income);
           //      exit();
        $this->load->view('officer/income',['income'=>$income,'manager'=>$manager,'privillage'=>$privillage,'empl_data'=>$empl_data]);
    }

   

   public function print_penalt()
{
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');

    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    // echo "<pre>";
    // print_r($blanch_data);
    //       exit(); 

    $income = $this->queries->get_income($comp_id);
    $detail_income = $this->queries->get_income_detailBlanchData($blanch_id);
    $total_receved = $this->queries->get_sum_incomeBlanchData($blanch_id);
    $customer = $this->queries->get_allcutomerblanchData($blanch_id);
    $privillage = $this->queries->get_position_empl($empl_id);
    $manager = $this->queries->get_position_manager($empl_id);

    // Set mPDF in landscape ('L') and A4
    $mpdf = new \Mpdf\Mpdf([
        'format' => 'A4-L', // A4 Landscape
        'margin_left' => 10,
        'margin_right' => 10,
        'margin_top' => 15,
        'margin_bottom' => 15,
        'margin_header' => 5,
        'margin_footer' => 5,
        'tempDir' => APPPATH . 'tmp/mpdf',
    ]);

    $html = $this->load->view('officer/print_penalt', [
        'income' => $income,
        'company_data' => $company_data,
        'detail_income' => $detail_income,
        'manager' => $manager,
        'privillage' => $privillage,
        'empl_data' => $empl_data
    ], true);

    $mpdf->SetFooter('Generated By CodeWithJames');

$mpdf->WriteHTML($html);

$filename = 'Faini' . $blanch_data->blanch_name . '.pdf';
$mpdf->Output($filename, 'I'); // Inline (open in browser with branch name)


}


//insert non-deducted
    public function insert_non_deducted_balance($comp_id,$blanch_id,$receve_amount){
    $this->db->query("INSERT INTO tbl_receive_non_deducted (`comp_id`,`blanch_id`,`non_balance`) VALUES ('$comp_id','$blanch_id','$receve_amount')");
    }

public function update_nonDeducted_balance($comp_id,$blanch_id,$another_deducted){
$sqldata="UPDATE `tbl_receive_non_deducted` SET `non_balance`= '$another_deducted' WHERE `blanch_id`= '$blanch_id'";
$query = $this->db->query($sqldata);
return true;    
}

      public function update_paidPenart($loan_id,$update_paid){
   $sqldata="UPDATE `tbl_pay_penart` SET `penart_paid`= '$update_paid' WHERE `loan_id`= '$loan_id'";
   $query = $this->db->query($sqldata);

   return true;
  }

    public function insert_income($comp_id,$inc_id,$blanch_id,$customer_id,$username,$penart_paid,$penart_date,$loan_id,$group_id,$trans_id){
      $this->db->query("INSERT INTO tbl_receve (`comp_id`,`inc_id`,`blanch_id`,`customer_id`,`empl`,`receve_amount`,`trans_id`,`receve_day`,`loan_id`,`group_id`) VALUES ('$comp_id','$inc_id','$blanch_id','$customer_id','$username','$penart_paid','$trans_id','$penart_date','$loan_id','$group_id')");
  }

  private function get_cash_account_id($comp_id){
    $accounts = $this->queries->get_account_transaction($comp_id);
    if (empty($accounts)) {
      return null;
    }

    foreach ($accounts as $account) {
      $name = isset($account->account_name) ? strtolower(trim($account->account_name)) : '';
      if ($name === 'cash') {
        return $account->trans_id;
      }
    }

    return null;
  }

  private function add_income_to_branch_account($comp_id, $blanch_id, $loan_id, $customer_id, $amount, $username, $group_id, $income_date, $trans_id = null, $reference_type = 'penalty_income', $description = 'Income received'){
    $target_trans_id = !empty($trans_id) ? (int) $trans_id : (int) $this->get_cash_account_id($comp_id);
    if (empty($target_trans_id)) {
      return;
    }

    $account_row = $this->queries->get_amount_remainAmountBlanch($blanch_id, $target_trans_id);
    $old_balance = !empty($account_row) ? (float) $account_row->blanch_capital : 0;
    $new_balance = $old_balance + (float) $amount;

    if (!empty($account_row)) {
      $this->db->query("UPDATE tbl_blanch_account SET blanch_capital = '$new_balance' WHERE blanch_id = '$blanch_id' AND receive_trans_id = '$target_trans_id'");
    } else {
      $this->db->query("INSERT INTO tbl_blanch_account (`comp_id`,`blanch_id`,`blanch_capital`,`receive_trans_id`) VALUES ('$comp_id','$blanch_id','$amount','$target_trans_id')");
    }

    // Keep cash-in-hand and balance ledger aligned with the account movement.
    $created_by = (int) $this->session->userdata('empl_id');
    $this->queries->save_cash_inhand_balance(
      $comp_id,
      $blanch_id,
      $target_trans_id,
      $created_by,
      $new_balance,
      $income_date
    );

    $this->queries->record_account_balance_movement(array(
      'comp_id' => $comp_id,
      'blanch_id' => $blanch_id,
      'trans_id' => $target_trans_id,
      'reference_type' => $reference_type,
      'reference_id' => $loan_id,
      'movement_date' => $income_date,
      'amount_in' => $amount,
      'balance_before' => $old_balance,
      'balance_after' => $new_balance,
      'description' => $description,
      'created_by' => $created_by,
    ));

    // Keep account-based cashflow consistent for reporting.
    $pay_desc = strtoupper($description);
    $this->db->query("INSERT INTO tbl_pay (`loan_id`,`blanch_id`,`comp_id`,`customer_id`,`depost`,`balance`,`description`,`pay_status`,`stat`,`date_pay`,`emply`,`group_id`,`date_data`,`p_method`) VALUES ('$loan_id','$blanch_id','$comp_id','$customer_id','$amount','0','$pay_desc','1','1','$income_date','$username','$group_id','$income_date','$target_trans_id')");
  }



   public function create_income_detail(){
        $this->form_validation->set_rules('comp_id','company','required');
        $this->form_validation->set_rules('blanch_id','company','required');
        $this->form_validation->set_rules('customer_id','company','required');
        $this->form_validation->set_rules('inc_id','Income','required');
        $this->form_validation->set_rules('trans_id','Account','required');
        $this->form_validation->set_rules('receve_amount','Amount','required');
        $this->form_validation->set_rules('receve_day','company','required');
        $this->form_validation->set_rules('empl','employee','required');
        $this->form_validation->set_rules('loan_id','Loan','required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
        if ($this->form_validation->run()) {
             $data = $this->input->post();

      $submit_token = trim((string) $this->input->post('submit_token', true));
      $session_token = (string) $this->session->userdata('income_submit_token');
      if (empty($submit_token) || empty($session_token) || !hash_equals($session_token, $submit_token)) {
        $this->session->set_flashdata('error', 'Duplicate submit detected. Tafadhali jaribu tena.');
        return redirect('oficer/income_dashboard');
      }
      $this->session->unset_userdata('income_submit_token');

            //  echo "<pre>";
            //  print_r($data);
            //        exit();
             $this->load->model('queries');
             $empl_id = $this->session->userdata('empl_id');
             $empl_data = $this->queries->get_employee_data($empl_id);
             $blanch_id = $data['blanch_id'];
             //$blanch_id = $data['blanch_id'];
            $loan_id = $data['loan_id'];
            $comp_id = $data['comp_id'];
            $penart_paid = $data['receve_amount'];
            $trans_id = (int) $data['trans_id'];
            $username = $data['empl'];
            $customer_id = $data['customer_id'];
            $penart_date = $data['receve_day'];
             $receve_amount = $data['receve_amount'];
             @$blanch_account = $this->queries->get_blanchAccountremain($blanch_id);
             $old_balance = @$blanch_account->blanch_capital;
             $total_new = $old_balance + $receve_amount;
             $inc_id = $data['inc_id'];
             $income_data = $this->queries->get_income_data($inc_id);
             $income_name = $income_data->inc_name;
             $alphabet = $income_name;
             $empl = $username;
             $penart = $this->queries->get_paidPenart($loan_id);

             $loan_income = $this->queries->get_loan_income($loan_id);
             $group_id = $loan_income->group_id;
             
             @$non_deducted = $this->queries->check_nonDeducted_balance($comp_id,$blanch_id);
              $deducted_blanch = @$non_deducted->blanch_id;
              $deducted_balance = @$non_deducted->non_balance;
              $another_deducted = $deducted_balance + $receve_amount;

        $company = $this->queries->get_comp_data($comp_id);
        $comp_name = $company->comp_name;
        $comp_phone = $company->comp_phone;
        
        $data_sms = $this->queries->get_sms_penart($customer_id);
        $data_notifications = $this->queries->get_receive_details_by_customer($customer_id);
        $branch_income = $this->queries->get_total_receive_amount_by_blanch($blanch_id);
        $phone = $data_sms->phone_no;
        $first_name = $data_sms->f_name;
        $midle_name = $data_sms->m_name;
        $last_name = $data_sms->l_name;

    //         echo "<pre>";
    // print_r(  $empl_data);
    //      exit();


        if (!empty($data_notifications)) {
          $data_notification = $data_notifications[0]; // chukua object ya kwanza
      } else {
          $data_notification = null;
      }
      
      // Sasa unaweza tumia safely
      if ($data_notification) {
          $empl_name = $data_notification->empl_name;
          $blanch_name = $data_notification->blanch_name;
          $first_name = $data_notification->f_name;
          $middle_name = $data_notification->m_name;
          $last_name = $data_notification->l_name;
          $phone_number_single = $data_notification->phone_no;
          
      }

      $time = date('d/m/Y h:i A');
      
    //  echo "<pre>";
    // print_r( $branch_income);
    //      exit();

        $massage = 'Ndugu ' . $first_name . ' ' . $last_name . ', ' .
    'Umelipa Faini ya Tsh. ' . number_format($penart_paid) . '. ' .
    'Leta marejesho kwa wakati ili kuepuka adhabu.';
      //  echo "<pre>";
    // print_r($data_notifications->receve_amount);
    //      exit();

    $jumla_faini = $penart_paid + $branch_income;

  // echo "<pre>";
  //   print_r(   $jumla_faini);
  //        exit();

  // $massage = "Habari, malipo ya faini yamefanyika tawi la {$data_notification->blanch_name}. 
  // Mteja: {$first_name} {$middle_name} {$last_name} ({$phone_number_single}). 
  // Afisa: {$data_notification->empl_name}. 
  // Kiasi: TZS " . number_format($penart_paid, 0) . ". 
  // Jumla ya faini: TZS " . number_format($jumla_faini, 0) . ".";

 $massage = "Habari, malipo ya faini yamefanyika {$data_sms->blanch_name}. 
Mteja: {$data_sms->f_name} {$data_sms->m_name} {$data_sms->l_name} ({$data_sms->phone_no}). 
Afisa: {$empl_data->empl_name}. 
Kiasi: " . number_format($penart_paid, 0) . " TZS. 
Muda: {$time}. 
Jumla leo tawi: " . number_format($jumla_faini) . " TZS.";

  
  $admins_numbers = $this->queries->get_admin_numbers();

  // echo "<pre>";
  // print_r($admins_numbers);
  //       exit();

        foreach ($admins_numbers as $admin) {
    $phone_numbers[] = $admin->phone_number; // hakika hakuna validation, tuzichukue raw
}

      
  
      foreach ($phone_numbers as $phone) {
          $this->sendsms($phone, $massage);
      }

              
              // print_r($amount);
              //            exit();

              if ($deducted_blanch == TRUE) {
               $this->update_nonDeducted_balance($comp_id,$blanch_id,$another_deducted);
                //echo "update";
              }else{

             $this->insert_non_deducted_balance($comp_id,$blanch_id,$receve_amount);
                //echo "ingiza";
              }



             //  echo "<pre>";
             // print_r($penart);
             //           exit();
                 if($alphabet == 'Penart'|| $alphabet == 'PENART' || $alphabet == 'penart'|| $alphabet == 'faini' || $alphabet == 'FAINI' || $alphabet == 'Faini' || $alphabet == 'fine' || $alphabet == 'FAINI KULALA' || $alphabet == 'faini kulala' || $alphabet == 'Faini kulala' || $alphabet == 'FAINI (PENALTY)' || $alphabet == 'penalt' || $alphabet == 'PENALT' || $alphabet == 'FAINI LALA' || $alphabet == 'PENATI' || $alphabet == 'penati' || $alphabet == 'Penati' || $alphabet == 'Adhabu' || $alphabet == 'ADHABU' || $alphabet == 'adhabu' || $alphabet == 'PENALTY' || $alphabet == 'Penarty' || $alphabet == 'penarty') {
                    if ($penart == TRUE) {
                 $old_paid = $penart->penart_paid;
                $update_paid = $old_paid + $penart_paid;
                $this->update_paidPenart($loan_id,$update_paid);
                 $this->insert_income($comp_id,$inc_id,$blanch_id,$customer_id,$username,$penart_paid,$penart_date,$loan_id,$group_id,$trans_id);
                  $this->add_income_to_branch_account($comp_id, $blanch_id, $loan_id, $customer_id, $penart_paid, $username, $group_id, $penart_date, $trans_id, 'penalty_income', 'Penalty payment received');
                $this->session->set_flashdata('massage','Tsh. '.$penart_paid .' Paid successfully');
                $this->sendsms($phone,$massage);
                    }elseif($penart == FALSE){
                  $this->insert_income($comp_id,$inc_id,$blanch_id,$customer_id,$username,$penart_paid,$penart_date,$loan_id,$group_id,$trans_id);
                 $this->insert_penartPaid($loan_id,$inc_id,$blanch_id,$comp_id,$penart_paid,$username,$customer_id,$penart_date,$group_id);
                  $this->add_income_to_branch_account($comp_id, $blanch_id, $loan_id, $customer_id, $penart_paid, $username, $group_id, $penart_date, $trans_id, 'penalty_income', 'Penalty payment received');
                 $this->session->set_flashdata('massage','Tsh. '.$penart_paid .' Paid successfully');
                 $this->sendsms($phone,$massage);
                        }
                 
                 }else{ 
                $this->insert_income($comp_id,$inc_id,$blanch_id,$customer_id,$username,$penart_paid,$penart_date,$loan_id,$group_id,$trans_id);
                $this->add_income_to_branch_account($comp_id, $blanch_id, $loan_id, $customer_id, $penart_paid, $username, $group_id, $penart_date, $trans_id, 'other_income', 'Income received');
              $this->session->set_flashdata('massage','Tsh. '.$penart_paid .' Paid successfully');
              $this->sendsms($phone,$massage);
                 }
              // //print_r($alphabet);
              //      exit();

             return redirect('oficer/income_dashboard');
        }
        $this->income_dashboard();
    }

     public function insert_penartPaid($loan_id,$inc_id,$blanch_id,$comp_id,$penart_paid,$username,$customer_id,$penart_date,$group_id){
   $this->db->query("INSERT INTO tbl_pay_penart (`loan_id`,`inc_id`,`blanch_id`,`comp_id`,`penart_paid`,`username`,`customer_id`,`penart_date`,`group_id`) VALUES ('$loan_id','$inc_id','$blanch_id','$comp_id','$penart_paid','$username','$customer_id','$penart_date','$group_id')");
  }


    public function previous_income(){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);

        $blanch = $this->queries->get_blanch($comp_id);
        $from = $this->input->post('from');
        $to = $this->input->post('to');
        $blanch_id = $this->input->post('blanch_id');
        $comp_id = $this->input->post('comp_id');
        $data = $this->queries->get_previous_income($from,$to,$comp_id,$blanch_id);
        $sum_income = $this->queries->get_sum_previousIncome($from,$to,$comp_id,$blanch_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $manager = $this->queries->get_position_manager($empl_id);

          //   echo "<pre>";
          // print_r($data);
          //     exit();
        $this->load->view('officer/previous_income',['data'=>$data,'sum_income'=>$sum_income,'from'=>$from,'to'=>$to,'comp_id'=>$comp_id,'blanch_id'=>$blanch_id,'blanch'=>$blanch,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
    }


  public function print_previous_report($from,$to,$comp_id,$blanch_id){
      $this->load->model('queries');
      $compdata = $this->queries->get_companyData($comp_id);
      $data = $this->queries->get_previous_income($from,$to,$comp_id,$blanch_id);
      $sum_income = $this->queries->get_sum_previousIncome($from,$to,$comp_id,$blanch_id);
      $blanch = $this->queries->get_blanch_data($blanch_id);
        //      echo "<pre>";
        // print_r($blanch);
        //        exit();
      $mpdf = new \Mpdf\Mpdf(['tempDir' => APPPATH . 'tmp/mpdf']);
      $html = $this->load->view('officer/previous_income_report',['compdata'=>$compdata,'data'=>$data,'sum_income'=>$sum_income,'from'=>$from,'to'=>$to,'blanch'=>$blanch,'blanch'=>$blanch],true);
      $mpdf->SetFooter('Generated By Brainsoft Technology');
      $mpdf->WriteHTML($html);
      $mpdf->Output();
    }



  public function all_previous_income(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);
    $privillage = $this->queries->get_position_empl($empl_id);
    $manager = $this->queries->get_position_manager($empl_id);

    $from = $this->input->post('from');
    $to = $this->input->post('to');
    $comp_id = $this->input->post('comp_id');
    $data = $this->queries->get_previous_incomeAll($from,$to,$comp_id);
    $sum_income = $this->queries->get_sum_previousIncomeAll($from,$to,$comp_id);
    $this->load->view('officer/all_blanch_income',['data'=>$data,'sum_income'=>$sum_income,'from'=>$from,'to'=>$to,'comp_id'=>$comp_id,'privillage'=>$privillage,'manager'=>$manager,'empl_data'=>$empl_data]);
  }

  public function print_previous_reportAll($from,$to,$comp_id){
      $this->load->model('queries');
      $compdata = $this->queries->get_companyData($comp_id);
      $data = $this->queries->get_previous_incomeAll($from,$to,$comp_id);
      $sum_income = $this->queries->get_sum_previousIncomeAll($from,$to,$comp_id);
      $mpdf = new \Mpdf\Mpdf(['tempDir' => APPPATH . 'tmp/mpdf']);
      $html = $this->load->view('officer/previous_income_reportAll',['compdata'=>$compdata,'data'=>$data,'sum_income'=>$sum_income,'from'=>$from,'to'=>$to],true);
      $mpdf->SetFooter('Generated By Brainsoft Technology');
      $mpdf->WriteHTML($html);
      $mpdf->Output();
    }





    public function create_income(){
        $this->form_validation->set_rules('inc_name','income','required');
        $this->form_validation->set_rules('comp_id','company','required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
        if ($this->form_validation->run()) {
              $data = $this->input->post();
                // echo "<pre>";
              // print_r($data);
              //       exit();
              $this->load->model('queries');
              if ($this->queries->insert_income($data)) {
                   $this->session->set_flashdata('massage','Income Data Saved successfully');
              }else{
                 $this->session->set_flashdata('error','Failed');

              }

              return redirect('oficer/income_detail');
        }
        $this->income_detail();
    }

    public function modify_income($inc_id){
        $this->form_validation->set_rules('inc_name','income','required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
        if ($this->form_validation->run()) {
               $data = $this->input->post();
              //    echo "<pre>";
              // print_r($data);
              //       exit();
              $this->load->model('queries');
              if ($this->queries->update_income($data,$inc_id)) {
                   $this->session->set_flashdata('massage','Income Data Updated successfully');
              }else{
                 $this->session->set_flashdata('error','Failed');

              }

              return redirect('oficer/income_detail');
        }
        $this->income_detail();
    }


    public function delete_income($inc_id){
        $this->load->model('queries');
        if($this->queries->remove_income($inc_id));
        $this->session->set_flashdata('massage','Income data Deleted successfully');
        return redirect('oficer/income_detail');
    }

 public function insert_blanchAccount_income($blanch_id,$total_new){
  $sqldata="UPDATE `tbl_blanch_account` SET `blanch_capital`= '$total_new' WHERE `blanch_id`= '$blanch_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
  return true;
}
public function insert_companyAccount_income($comp_id,$comp_total){
  $sqldata="UPDATE `tbl_ac_company` SET `comp_balance`= '$comp_total' WHERE `comp_id`= '$comp_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
  return true;
}



    public function modify_income_detail($receved_id){
        $this->form_validation->set_rules('inc_id','Income','required');
        $this->form_validation->set_rules('customer_id','customer','required');
        $this->form_validation->set_rules('receve_amount','Amount','required');
        $this->form_validation->set_rules('loan_id','loan_id','required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
        if ($this->form_validation->run()) {
             $data = $this->input->post();
             $loan_id = $data['loan_id'];
             $update_paid = $data['receve_amount'];
              //  echo "<pre>";
              // print_r($loan_id);
              //      exit();
             $this->load->model('queries');
             if ($this->queries->update_income_detail($data,$receved_id)) {
                  $this->update_paidPenart($loan_id,$update_paid);
                  $this->session->set_flashdata('massage','Income Updated successfully');
             }else{
             $this->session->set_flashdata('error','Failed');   
             }
             return redirect('oficer/income_dashboard');
        }
        $this->income_dashboard();
    }

    public function delete_receved($receved_id){
        $this->load->model('queries');
        $data_receive = $this->queries->income_receive_delete($receved_id);
        $loan_id = $data_receive->loan_id;
        $receve_amount = $data_receive->receve_amount;
        $blanch_id = $data_receive->blanch_id;

        $pay_penart = $this->queries->get_data_paypenart($loan_id);
        $penart_paid = @$pay_penart->penart_paid;

        $remove_receive = @$penart_paid - $receve_amount;

        $received_non = $this->queries->get_receive_nonDeducted($blanch_id);
        $non_balance = $received_non->non_balance;

        $remain_receive = $non_balance - $receve_amount;

       $this->remove_nondeducted_blanch_accout($blanch_id,$remain_receive);
       $this->remove_paid_penart_loan($loan_id,$remove_receive);
        //    echo "<pre>";
        // print_r($remain_receive);
        //     exit();
        if($this->queries->remove_receved($receved_id));
        $this->session->set_flashdata('massage','Data Deleted successfully');
        return redirect('oficer/income_dashboard');
    }

    public function remove_paid_penart_loan($loan_id,$remove_receive){
    $sqldata="UPDATE `tbl_pay_penart` SET `penart_paid`= '$remove_receive' WHERE `loan_id`= '$loan_id'";
    $query = $this->db->query($sqldata);
    return true;    
    }


    public function remove_nondeducted_blanch_accout($blanch_id,$remain_receive){
    $sqldata="UPDATE `tbl_receive_non_deducted` SET `non_balance`= '$remain_receive' WHERE `blanch_id`= '$blanch_id'";
    $query = $this->db->query($sqldata);
    return true;   
    }

     public function employee(){
        $this->load->model('queries');
         $blanch_id = $this->session->userdata('blanch_id');
         $empl_id = $this->session->userdata('empl_id');
         $manager_data = $this->queries->get_manager_data($empl_id);
         $comp_id = $manager_data->comp_id;
         $company_data = $this->queries->get_companyData($comp_id);
         $blanch_data = $this->queries->get_blanchData($blanch_id);
         $empl_data = $this->queries->get_employee_data($empl_id);

        $blanch = $this->queries->get_blanch($comp_id);
        $position = $this->queries->get_position();
        $employee = $this->queries->get_employee($comp_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $manager = $this->queries->get_position_manager($empl_id);
      
        $this->load->view('officer/employee',['blanch'=>$blanch,'position'=>$position,'employee'=>$employee,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
    }


    public function create_employee(){
        $this->form_validation->set_rules('comp_id','company','required');
        $this->form_validation->set_rules('blanch_id','blanch','required');
        $this->form_validation->set_rules('empl_name','Empl name','required');
        $this->form_validation->set_rules('empl_no','phone number','required');
        $this->form_validation->set_rules('empl_email','Email','required');
        $this->form_validation->set_rules('position_id','position','required');
        $this->form_validation->set_rules('salary','salary','required');
        $this->form_validation->set_rules('pays','pays','required');
        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('pay_nssf','pay nssf','required');
        $this->form_validation->set_rules('bank_account','bank account','required');
        $this->form_validation->set_rules('account_no','account no','required');
        $this->form_validation->set_rules('password','password','required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
        if ($this->form_validation->run()) {
            $data = $this->input->post();
            $data['password'] = sha1($this->input->post('password'));
              //  echo "<pre>";
              // print_r($data);
              // echo "</pre>";
              //    exit();
            $this->load->model('queries');
            if ($this->queries->insert_employee($data)) {
                 $this->session->set_flashdata('massage','Eployee Registered successfully Password = 1234');
            }else{
                $this->session->set_flashdata('error','Failed');
            }
            return redirect('oficer/employee');
        }
        $this->employee();
    }

       public function modify_employee($empl_id){
        $this->form_validation->set_rules('blanch_id','blanch','required');
        $this->form_validation->set_rules('empl_name','Empl name','required');
        $this->form_validation->set_rules('empl_no','phone number','required');
        $this->form_validation->set_rules('empl_email','email','required');
        $this->form_validation->set_rules('position_id','position','required');
        $this->form_validation->set_rules('salary','salary','required');
        $this->form_validation->set_rules('pays','pays','required');
        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('pay_nssf','pay nssf','required');
        $this->form_validation->set_rules('bank_account','bank account','required');
        $this->form_validation->set_rules('account_no','account no','required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
        if ($this->form_validation->run()) {
            $data = $this->input->post();
              //  echo "<pre>";
              // print_r($data);
              // echo "</pre>";
              //    exit();
            $this->load->model('queries');
            if ($this->queries->update_employee($empl_id,$data)) {
                 $this->session->set_flashdata('massage','Eployee updated successfully');
            }else{
                $this->session->set_flashdata('error','Failed');
            }
            return redirect('oficer/all_employee');
        }
        $this->employee();
    }


     public function delete_employee($empl_id){
        $this->load->model('queries');
        if($this->queries->remove_employee($empl_id));
         $this->session->set_flashdata('massage','Data Deleted successfully');
         return redirect('oficer/employee');
    }


    public function all_employee(){
        $this->load->model('queries');
         $blanch_id = $this->session->userdata('blanch_id');
         $empl_id = $this->session->userdata('empl_id');
         $manager_data = $this->queries->get_manager_data($empl_id);
         $comp_id = $manager_data->comp_id;
         $company_data = $this->queries->get_companyData($comp_id);
         $blanch_data = $this->queries->get_blanchData($blanch_id);
         $empl_data = $this->queries->get_employee_data($empl_id);

        $all_employee = $this->queries->get_AllemployeeBlanch($blanch_id);
        $blanch = $this->queries->get_blanch($comp_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $manager = $this->queries->get_position_manager($empl_id);
          //    echo "<pre>";
          // print_r($all_employee);
          //  echo "</pre>";
          //      exit();
        $this->load->view('officer/all_employee',['all_employee'=>$all_employee,'blanch'=>$blanch,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
    }

       public function manager_all_employee(){
        $this->load->model('queries');
         $blanch_id = $this->session->userdata('blanch_id');
         $empl_id = $this->session->userdata('empl_id');
         $manager_data = $this->queries->get_manager_data($empl_id);
         $comp_id = $manager_data->comp_id;
         $company_data = $this->queries->get_companyData($comp_id);
         $blanch_data = $this->queries->get_blanchData($blanch_id);
         $empl_data = $this->queries->get_employee_data($empl_id);

        $all_employee = $this->queries->get_Allemployee($comp_id);
        $blanch = $this->queries->get_blanch($comp_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $manager = $this->queries->get_position_manager($empl_id);
          //    echo "<pre>";
          // print_r($all_employee);
          //  echo "</pre>";
          //      exit();
        $this->load->view('officer/all_employee',['all_employee'=>$all_employee,'blanch'=>$blanch,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
    }



   public function privillage($empl_id){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
         $empl_id = $this->session->userdata('empl_id');
         $manager_data = $this->queries->get_manager_data($empl_id);
         $comp_id = $manager_data->comp_id;
         $company_data = $this->queries->get_companyData($comp_id);
         $blanch_data = $this->queries->get_blanchData($blanch_id);
         $empl_data = $this->queries->get_employee_data($empl_id);

        $position = $this->queries->get_position();
        $emply = $this->queries->view_employee($empl_id);
        $my_priv = $this->queries->get_myprivillage($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $manager = $this->queries->get_position_manager($empl_id);
          //  echo "<pre>";
          // print_r($my_priv);
          //   exit();
        $this->load->view('officer/privillage',['position'=>$position,'emply'=>$emply,'my_priv'=>$my_priv,'privillage'=>$privillage,'manager'=>$manager]);
    }

    public function create_Employee_privillage($empl_id){
        $validation  = array( array('field'=> 'position_id[]','rules'=>'required'));
          $this->form_validation->set_rules($validation);
           if ($this->form_validation->run() == true) {
               $position_id  = $this->input->post('position_id[]');
               $empl_id = $this->input->post('empl_id');
               $comp_id = $this->input->post('comp_id');
              //    echo "<pre>";
              // print_r($position_id);
              //     echo "<br>";
              // print_r($comp_id);
              //     echo "<br>";
              // print_r($empl_id);
              //     exit();
              foreach ($position_id as $key => $value) {
      $this->db->query("INSERT INTO  tbl_privellage(`position_id`,`empl_id`,`comp_id`) VALUES ('$value','$empl_id','$comp_id')");
           }   
          $this->session->set_flashdata('massage','User Access Saved successfully');
       
           }
          $this->load->model('queries');
          $emply = $this->queries->view_employee($empl_id);
          $empl_id = $emply->empl_id;
           // print_r($empl_id);
           //    exit();
           return redirect("oficer/privillage/".$empl_id); 
       }


       public function  delete_priv($priv_id){
        $this->load->model('queries');
        $pri = $this->queries->get_privData($priv_id);
        $empl_id = $pri->empl_id;
          // print_r($empl_id);
          //     exit();
        if($this->queries->remove_priv($priv_id));
        $this->session->set_flashdata('massage','User Access Removed successfully');
        return redirect('oficer/privillage/'.$empl_id);
       }


    public function view_blanchEmployee(){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
         $empl_id = $this->session->userdata('empl_id');
         $manager_data = $this->queries->get_manager_data($empl_id);
         $comp_id = $manager_data->comp_id;
         $company_data = $this->queries->get_companyData($comp_id);
         $blanch_data = $this->queries->get_blanchData($blanch_id);
         $empl_data = $this->queries->get_employee_data($empl_id);

        $blanch = $this->queries->get_blanch($comp_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $manager = $this->queries->get_position_manager($empl_id);

         // print_r($blanch);
         //     exit();
        $this->load->view('officer/blanch_employee',['blanch'=>$blanch,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
    }

    public function print_branch(){
     $this->load->model('queries');
     $blanch_id = $this->session->userdata('blanch_id');
     $empl_id = $this->session->userdata('empl_id');
     $manager_data = $this->queries->get_manager_data($empl_id);
     $comp_id = $manager_data->comp_id;
     $company_data = $this->queries->get_companyData($comp_id);
     $blanch_data = $this->queries->get_blanchData($blanch_id);
     $empl_data = $this->queries->get_employee_data($empl_id);

     $compdata = $this->queries->get_companyData($comp_id);
     $blanch = $this->queries->get_blanch($comp_id);
     $mpdf = new \Mpdf\Mpdf(['tempDir' => APPPATH . 'tmp/mpdf']);
     $html = $this->load->view('officer/blanch_report',['compdata'=>$compdata,'blanch'=>$blanch,'empl_data'=>$empl_data],true);
     $mpdf->SetFooter('Generated By Brainsoft Technology');
     $mpdf->WriteHTML($html);
     $mpdf->Output();
        //$this->load->view('admin/blanch_report');
    }


    public function view_allEmployee($blanch_id){
        $this->load->model('queries');
     $empl_id = $this->session->userdata('empl_id');
     $manager_data = $this->queries->get_manager_data($empl_id);
     $comp_id = $manager_data->comp_id;
     $company_data = $this->queries->get_companyData($comp_id);
     $blanch_data = $this->queries->get_blanchData($blanch_id);
     $empl_data = $this->queries->get_employee_data($empl_id);
     $all_employee = $this->queries->get_blanchEmployee($blanch_id);
     $privillage = $this->queries->get_position_empl($empl_id);
     $manager = $this->queries->get_position_manager($empl_id);
          // print_r($empl);
          //       exit();
        $this->load->view('officer/all_employee',['all_employee'=>$all_employee,'privillage'=>$privillage,'manager'=>$manager]);
    }


    public function leave(){
     $this->load->model('queries');
     $blanch_id = $this->session->userdata('blanch_id');
     $empl_id = $this->session->userdata('empl_id');
     $manager_data = $this->queries->get_manager_data($empl_id);
     $comp_id = $manager_data->comp_id;
     $company_data = $this->queries->get_companyData($comp_id);
     $blanch_data = $this->queries->get_blanchData($blanch_id);
     $empl_data = $this->queries->get_employee_data($empl_id);

     $employee = $this->queries->get_Allemployee($comp_id);
     $blanch = $this->queries->get_blanch($comp_id);
     $leave = $this->queries->get_all_leave($comp_id);
     $privillage = $this->queries->get_position_empl($empl_id);
     $manager = $this->queries->get_position_manager($empl_id);
          //   echo "<pre>";
          // print_r($leave);
          // echo "</pre>";
          //    exit();
   $this->load->view('officer/employe_leave',['employee'=>$employee,'blanch'=>$blanch,'leave'=>$leave,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
    }


    public function create_leave(){
        $this->form_validation->set_rules('comp_id','company','required');
        $this->form_validation->set_rules('empl_id','Employee','required');
        $this->form_validation->set_rules('stat_date','stat date','required');
        $this->form_validation->set_rules('end_date','end date','required');
        $this->form_validation->set_rules('remaks','remaks','required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
        if ($this->form_validation->run()) {
             $data = $this->input->post();
              // print_r($data);
              //     exit();
             $this->load->model('queries');
             if ($this->queries->insert_leave($data)) {
                  $this->session->set_flashdata('massage','Leave saved successfully');
             }else{
                  $this->session->set_flashdata('error','Failed');

             }
             return redirect('oficer/leave');
        }
         $this->leave();
    }

     public function salary_sheet(){
        $this->load->model('queries');
     $blanch_id = $this->session->userdata('blanch_id');
     $empl_id = $this->session->userdata('empl_id');
     $manager_data = $this->queries->get_manager_data($empl_id);
     $comp_id = $manager_data->comp_id;
     $company_data = $this->queries->get_companyData($comp_id);
     $blanch_data = $this->queries->get_blanchData($blanch_id);
     $empl_data = $this->queries->get_employee_data($empl_id);

    $sheet = $this->queries->get_Allemployee_salary($comp_id);
    $total_salary = $this->queries->get_sum_salary($comp_id);
    $privillage = $this->queries->get_position_empl($empl_id);
    $manager = $this->queries->get_position_manager($empl_id);
          // print_r($total_salary);
          //      exit();
    $this->load->view('officer/salary_sheet',['sheet'=>$sheet,'total_salary'=>$total_salary,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
    }


    public function print_salary_sheet(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $sheet = $this->queries->get_Allemployee_salary($comp_id);
    $total_salary = $this->queries->get_sum_salary($comp_id);
    $compdata = $this->queries->get_companyData($comp_id);
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4-L','orientation' => 'L', 'tempDir' => APPPATH . 'tmp/mpdf']);
    $html = $this->load->view('officer/salary_sheet_report',['compdata'=>$compdata,'sheet'=>$sheet,'total_salary'=>$total_salary,'empl_data'=>$empl_data],true);
     $mpdf->SetFooter('Generated By Brainsoft Technology');
     $mpdf->WriteHTML($html);
     $mpdf->Output();
    }

    public function employee_allowance(){
    $this->load->model('queries');
     $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $employee = $this->queries->get_Allemployee_salary($comp_id);
    $all_alowance = $this->queries->get_all_allowance($comp_id);
    $privillage = $this->queries->get_position_empl($empl_id);
    $manager = $this->queries->get_position_manager($empl_id);
       // print_r($all_alowance);
       //          exit();
    $this->load->view('officer/employee_allowance',['employee'=>$employee,'all_alowance'=>$all_alowance,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
    }


    public function create_allowance(){
        $this->form_validation->set_rules('empl_id','Employee','required');
        $this->form_validation->set_rules('new_amount','new amount','required');
        $this->form_validation->set_rules('remaks_allow','remaks allow','required');
        $this->form_validation->set_rules('comp_id','Company','required');
        $this->form_validation->set_rules('<div class="text-danger">','</div>');
          if ($this->form_validation->run()) {
            $data = $this->input->post();
            $new_amount = $data['new_amount'];
            $empl_id = $data['empl_id'];
             //  echo "<pre>";
             // print_r($new_amount);
             //    echo "<br>";
             //    print_r($empl_id);
             //     exit();
            $this->load->model('queries');
            if ($this->queries->insert_allowance($data)) {
               $this->update_sallary($empl_id,$new_amount);
                $this->session->set_flashdata('massage','New Allowance Saved successfully');
            }else{

                $this->session->set_flashdata('error','Failed');
            }
            return redirect('oficer/employee_allowance');
          }
          $this->employee_allowance();
    }


     public function update_sallary($empl_id,$new_amount){
  $sqldata="UPDATE `tbl_employee` SET `salary`= `salary`+$new_amount WHERE `empl_id`= '$empl_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
   return true;
}


public function modify_allowance($alow_id){
 $this->form_validation->set_rules('empl_id','Employee','required');
 $this->form_validation->set_rules('new_amount','new amount','required');
 $this->form_validation->set_rules('remaks_allow','remaks allow','required');
// $this->form_validation->set_rules('comp_id','Company','required');
 $this->form_validation->set_rules('<div class="text-danger">','</div>');
          if ($this->form_validation->run()) {
            $data = $this->input->post();
            $new_amount = $data['new_amount'];
            $empl_id = $data['empl_id'];
            $remaks_allow = $data['remaks_allow'];
             //  echo "<pre>";
             // print_r($new_amount);
             //    echo "<br>";
             //    print_r($empl_id);
             //    print_r($remaks_allow);
             //     exit();
            $this->load->model('queries');
            if ($this->update_sallarydata($empl_id,$new_amount,$remaks_allow,$alow_id)) {
               $this->update_sallary($empl_id,$new_amount);
                $this->session->set_flashdata('massage','New Allowance Updated successfully');
            }else{

                $this->session->set_flashdata('error','Failed');
            }
            return redirect('oficer/employee_allowance');
          }
          $this->employee_allowance();  
     }

  public function update_sallarydata($empl_id,$new_amount,$remaks_allow,$alow_id){
  $sqldata="UPDATE `tbl_new_allownce` SET `empl_id`='$empl_id',`new_amount`= `new_amount`+$new_amount,`remaks_allow`='$remaks_allow' WHERE `alow_id`= '$alow_id'";
    // print_r($sqldata);
    //    exit();
   $query = $this->db->query($sqldata);
   return true;
}

public function employee_deduction(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $employee = $this->queries->get_Allemployee_salary($comp_id);
    $all_deduction = $this->queries->get_deduction_empl($comp_id);
    $total_deduction = $this->queries->get_sumdeduction($comp_id);
    $privillage = $this->queries->get_position_empl($empl_id);
    $manager = $this->queries->get_position_manager($empl_id);
      //    echo "<pre>";
      // print_r($total_deduction);
      //          exit();
    $this->load->view('officer/employee_deduction',['employee'=>$employee,'all_deduction'=>$all_deduction,'total_deduction'=>$total_deduction,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
}


public function create_deduction(){
        $this->form_validation->set_rules('empl_id','Employee','required');
        $this->form_validation->set_rules('amount','amount','required');
        $this->form_validation->set_rules('description','description','required');
        $this->form_validation->set_rules('comp_id','Company','required');
        $this->form_validation->set_rules('<div class="text-danger">','</div>');
          if ($this->form_validation->run()) {
            $data = $this->input->post();
            $amount = $data['amount'];
            $empl_id = $data['empl_id'];
             //  echo "<pre>";
             // print_r($amount);
             //    echo "<br>";
             //    print_r($empl_id);
             //     exit();
            $this->load->model('queries');
            if ($this->queries->insert_deduction($data)) {
               $this->update_sallary_mistake($empl_id,$amount);
                $this->session->set_flashdata('massage','Employee Deduction Saved successfully');
            }else{

                $this->session->set_flashdata('error','Failed');
            }
            return redirect('oficer/employee_deduction');
          }
          $this->employee_deduction();
    }

    public function update_sallary_mistake($empl_id,$amount){
  $sqldata="UPDATE `tbl_employee` SET `salary`= `salary`-$amount WHERE `empl_id`= '$empl_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
   return true;
}

public function customer(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $region = $this->queries->get_region();
    $blanch = $this->queries->get_blanch($comp_id);
    $privillage = $this->queries->get_position_empl($empl_id);
    $manager = $this->queries->get_position_manager($empl_id);

    $employee = $this->queries->get_employee_blanch($blanch_id);
          //  echo "<pre>";
          // print_r($employee);
          // echo "</pre>";
          //      exit();
    $this->load->view('officer/customer',['region'=>$region,'blanch'=>$blanch,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager,'employee'=>$employee]);
    }


 public function create_customer() {

    if (!isset($_SESSION)) {
        session_start();
    }

    $post_token = $this->input->post('form_token');

    if (!$post_token || $post_token !== ($_SESSION['form_token'] ?? null)) {
        $this->session->set_flashdata('error', 'Invalid or duplicate form submission.');
        return redirect('oficer/customer');
    }

    // Invalidate token so it can't be reused
    unset($_SESSION['form_token']);

    $this->form_validation->set_rules('comp_id', 'company', 'required');
    $this->form_validation->set_rules('empl_id', 'company', 'required');
    $this->form_validation->set_rules('blanch_id', 'blanch', 'required');
    $this->form_validation->set_rules('f_name', 'First name', 'required');
    $this->form_validation->set_rules('m_name', 'Middle name', 'required');
    $this->form_validation->set_rules('l_name', 'Last name', 'required');
    $this->form_validation->set_rules('phone_no', 'phone number', 'required');
    $this->form_validation->set_rules('gender', 'gender', 'required');
    $this->form_validation->set_rules('date_birth', 'date of birth', 'required');
    $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

    if ($this->form_validation->run()) {
        $data = $this->input->post();

        // Remove form_token before inserting into database
        if (isset($data['form_token'])) {
            unset($data['form_token']);
        }

        // Process the phone number
        $phone_no = $this->normalize_phone_number($data['phone_no']);
        $data['phone_no'] = $phone_no;

        // Extract other fields
        $f_name = $data['f_name'];
        $m_name = $data['m_name'];
        $l_name = $data['l_name'];
        $data['gender'] = trim($data['gender']);
        $blanch_id = $data['blanch_id'];
        $comp_id = $data['comp_id'];

        $this->load->model('queries');
        $check = $this->queries->check_name($f_name, $m_name, $l_name, $blanch_id, $comp_id);
        $existing_phone_customer = $this->queries->find_customer_by_phone($comp_id, $phone_no);
        $company_data = $this->queries->get_companyData($comp_id);
        $comp_phone = $company_data->comp_phone;

        if ($check == TRUE) {
            $this->session->set_flashdata('error', 'This customer Already Registered');
            return redirect('oficer/customer');
        } elseif (!empty($existing_phone_customer)) {
          $this->session->set_flashdata('error', 'This phone number is already registered.');
          return redirect('oficer/customer_details/' . $existing_phone_customer->customer_id);
        } elseif ($check == FALSE) {
            $customer_id = $this->queries->insert_customer($data);
            if ($customer_id > 0) {
                $compdata = $this->queries->get_companyData($comp_id);
                $full_name = $f_name . ' ' . $m_name . ' ' . $l_name;

                $massage = "Habari $full_name! Karibu sana katika familia ya " . $compdata->comp_name . ". " .
                    "Tunathamini uamuzi wako wa kujiunga nasi. Kwa maswali, ushauri au msaada wowote, " .
                    "tupigie simu kupitia namba: $comp_phone. Tuko tayari kukuhudumia kwa moyo wote!";

                $this->sendsms($phone_no, $massage);
                $this->session->set_flashdata('massage', 'Customer successfully registered.');
            } else {
                $this->session->set_flashdata('error', 'Failed to register the customer.');
            }
            return redirect('oficer/customer_details/' . $customer_id);
        }
    }

    $this->customer();
}


  private function normalize_phone_number($phone_no){
    $phone_no = preg_replace('/\D+/', '', (string) $phone_no);

    if ($phone_no === '') {
      return '';
    }

    if (substr($phone_no, 0, 1) === '0') {
      return '255' . substr($phone_no, 1);
    }

    return $phone_no;
  }


  public function sendsms($phone,$massage){
  
    $api_key = '';                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
 
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
  
 
  }
  
         public function customer_details($customer_id){
            $this->load->model('queries');
            $blanch_id = $this->session->userdata('blanch_id');
            $empl_id = $this->session->userdata('empl_id');
            $manager_data = $this->queries->get_manager_data($empl_id);
            $comp_id = $manager_data->comp_id;
            $company_data = $this->queries->get_companyData($comp_id);
            $blanch_data = $this->queries->get_blanchData($blanch_id);
            $empl_data = $this->queries->get_employee_data($empl_id);
            $customer = $this->queries->get_customer_data($customer_id);
            $phone_history = $this->queries->get_customer_phone_history($customer_id);
            $account = $this->queries->get_accountTYpe();
            $privillage = $this->queries->get_position_empl($empl_id);
            $manager = $this->queries->get_position_manager($empl_id);
              // print_r($account);
              //    exit();
            $this->load->view('officer/detail',['customer'=>$customer,'phone_history'=>$phone_history,'account'=>$account,'privillage'=>$privillage,'manager'=>$manager]);
        }





public function create_lastDetail($customer_id)
{
    $this->load->library('form_validation');

    // Validate required text fields
    $this->form_validation->set_rules('famous_area', 'Nick Name', 'required');
    $this->form_validation->set_rules('place_imployment', 'Place of Business', 'required');
    $this->form_validation->set_rules('code', 'Code', 'required');
    $this->form_validation->set_rules('account_id', 'Account ID', 'required');

    // Conditionally validate file fields if uploaded
    if (!empty($_FILES['barua_utambulisho']['name'])) {
        $this->form_validation->set_rules(
            'barua_utambulisho',
            'Barua ya Utambulisho',
            'callback_validate_pdf_upload[barua_utambulisho]'
        );
    }

    if (!empty($_FILES['kitambulisho']['name'])) {
        $this->form_validation->set_rules(
            'kitambulisho',
            'Kitambulisho',
            'callback_validate_pdf_upload[kitambulisho]'
        );
    }

    // If validation fails, reload the form
    if ($this->form_validation->run() === FALSE) {
        return $this->customer_details($customer_id);
    }

    // Upload the files only if they are present
    if (!empty($_FILES['barua_utambulisho']['name'])) {
        $this->upload_file_as('barua_utambulisho', 'barua_' . $customer_id);
    }

    if (!empty($_FILES['kitambulisho']['name'])) {
        $this->upload_file_as('kitambulisho', 'kitambulisho_' . $customer_id);
    }

    // Prepare data for database insert
    $data = array(
        'customer_id'       => $this->input->post('customer_id'),
        'famous_area'       => $this->input->post('famous_area'),
        'place_imployment'  => $this->input->post('place_imployment'),
        'code'              => $this->input->post('code'),
        'account_id'        => $this->input->post('account_id'),
    );

    // Insert data using model
    $this->load->model('queries');
    $result = $this->queries->insert_customerData($data);

    // Handle result
    if ($result) {
        $this->update_code($customer_id, $data['code']);
        $this->update_customer_pendData($customer_id);
        $this->session->set_flashdata('success', 'Customer details saved successfully.');
    } else {
        $this->session->set_flashdata('error', 'Failed to save data.');
    }

    // Redirect to signature view
    return redirect('oficer/viw_ID_sig/' . $customer_id);
}


private function upload_file_as($field_name, $file_name)
{
    $config['upload_path']   = './assets/documents/';
    $config['allowed_types'] = 'pdf';
    $config['max_size']      = 2048; // 2MB
    $config['file_name']     = $file_name . '.pdf';
    $config['overwrite']     = true;

    $this->load->library('upload', $config);
    $this->upload->initialize($config);

   if (!$this->upload->do_upload($field_name)) {
    echo $this->upload->display_errors(); // show error message directly
    exit;
}


    return true;
}



public function validate_pdf_upload($str, $field_name)
{
    if (empty($_FILES[$field_name]['name'])) {
        $this->form_validation->set_message('validate_pdf_upload', 'The {field} field is required.');
        return false;
    }

    $allowed_mime = ['application/pdf'];
    $file_mime = mime_content_type($_FILES[$field_name]['tmp_name']);
    if (!in_array($file_mime, $allowed_mime)) {
        $this->form_validation->set_message('validate_pdf_upload', 'The {field} must be a valid PDF.');
        return false;
    }

    return true;
}


        

    public function update_customer_pendData($customer_id){
      $sqldata="UPDATE `tbl_customer` SET `customer_status`= 'pending' WHERE `customer_id`= '$customer_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
   return true;  
    }




    public function viw_ID_sig($customer_id){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
            $empl_id = $this->session->userdata('empl_id');
            $manager_data = $this->queries->get_manager_data($empl_id);
            $comp_id = $manager_data->comp_id;
            $company_data = $this->queries->get_companyData($comp_id);
            $blanch_data = $this->queries->get_blanchData($blanch_id);
            $empl_data = $this->queries->get_employee_data($empl_id);
            $privillage = $this->queries->get_position_empl($empl_id);
          $data_customer = $this->queries->get_customer_data($customer_id);
          $phone_history = $this->queries->get_customer_phone_history($customer_id);
          $manager = $this->queries->get_position_manager($empl_id);
           // print_r($data_customer);
           //           exit();
        $this->load->view('officer/customer_Id',['empl_data'=>$empl_data,'privillage'=>$privillage,'data_customer'=>$data_customer,'phone_history'=>$phone_history,'manager'=>$manager]);
    }

      public function update_customer_passport($customer_id){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $data_customer = $this->queries->get_customer_data($customer_id);
        $passport_row = $this->db->select('passport')
          ->where('customer_id', $customer_id)
          ->get('tbl_sub_customer')
          ->row();
        $existing_passport = ($passport_row && !empty($passport_row->passport)) ? $passport_row->passport : null;
        $manager = $this->queries->get_position_manager($empl_id);

        $this->load->view('officer/update_customer_passport', [
          'empl_data' => $empl_data,
          'privillage' => $privillage,
          'data_customer' => $data_customer,
          'existing_passport' => $existing_passport,
          'manager' => $manager,
        ]);
      }

      public function update_customer_passport_inline($customer_id)
      {
        $cropped_data = $this->input->post('passport_cropped');

        if (empty($cropped_data) && empty($_FILES['passport']['name'])) {
          $this->session->set_flashdata('error', 'Please choose and crop passport image.');
          return redirect('oficer/view_more_customer/' . $customer_id);
        }

        $existing = $this->db->select('passport')
          ->where('customer_id', $customer_id)
          ->get('tbl_sub_customer')
          ->row();

        $config['upload_path'] = FCPATH . 'assets/uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
        $config['max_size'] = 4096;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;

        if (!is_dir($config['upload_path'])) {
          mkdir($config['upload_path'], 0755, true);
        }

        if (!empty($cropped_data)) {
          $base64 = preg_replace('#^data:image/\w+;base64,#i', '', $cropped_data);
          $decoded = base64_decode($base64, true);

          if ($decoded === false) {
            $this->session->set_flashdata('error', 'Invalid cropped passport image data.');
            return redirect('oficer/view_more_customer/' . $customer_id);
          }

          $file_name = 'passport_' . $customer_id . '_' . time() . '_' . mt_rand(100, 999) . '.jpg';
          $full_path = $config['upload_path'] . $file_name;

          if (file_put_contents($full_path, $decoded) === false) {
            $this->session->set_flashdata('error', 'Failed to save cropped passport image.');
            return redirect('oficer/view_more_customer/' . $customer_id);
          }

          $new_path = 'assets/uploads/' . $file_name;
        } else {
          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          if (!$this->upload->do_upload('passport')) {
            $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
            return redirect('oficer/view_more_customer/' . $customer_id);
          }

          $upload_data = $this->upload->data();
          $new_path = 'assets/uploads/' . $upload_data['file_name'];
        }

        if (!empty($existing->passport)) {
          $old_full = FCPATH . ltrim($existing->passport, '/');
          if (file_exists($old_full)) {
            @unlink($old_full);
          }
        }

        $this->db->where('customer_id', $customer_id)
          ->update('tbl_sub_customer', ['passport' => $new_path]);

        $this->session->set_flashdata('massage', 'Customer passport updated successfully.');
        return redirect('oficer/view_more_customer/' . $customer_id);
      }

      private function get_latest_customer_passport($customer_id)
      {
        $passport_row = $this->db->select('passport')
          ->where('customer_id', $customer_id)
          ->order_by('id', 'DESC')
          ->limit(1)
          ->get('tbl_sub_customer')
          ->row();

        return ($passport_row && !empty($passport_row->passport)) ? $passport_row->passport : null;
      }



public function upload_passport()
{
    $image = $this->input->post('image');
    $customer_id = $this->input->post('customer_id');

    if (!$image || !$customer_id) {
        echo "Missing image or customer ID.";
        return;
    }

    // Fetch existing passport path
    $this->db->select('passport');
    $this->db->where('customer_id', $customer_id);
    $query = $this->db->get('tbl_sub_customer');
    $customer = $query->row();

    $folderPath = './assets/uploads/';
    if (!is_dir($folderPath)) {
        mkdir($folderPath, 0755, true);
    }

    // Decode base64 image
    $image_parts = explode(";base64,", $image);
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = uniqid() . '.png';
    $filePath = $folderPath . $fileName;

    // Save new image
    if (file_put_contents($filePath, $image_base64) === false) {
        echo "Failed to save image.";
        return;
    }

    // If customer had old image, delete it
    if ($customer && !empty($customer->passport)) {
        $oldImagePath = './' . $customer->passport; // full path
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
    }

    // Update DB with new image path
    $this->db->where('customer_id', $customer_id);
    $this->db->update('tbl_sub_customer', ['passport' => 'assets/uploads/' . $fileName]);

    echo "Passport image saved successfully.";
}




    public function update_customerID($customer_id){
        if(!empty($_FILES['passport']['name'])){
                $config['upload_path'] = 'assets/i/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
                $config['file_name'] = $_FILES['passport']['name'];
                $config['max_size']      = '8192'; 
                $config['remove_spaces']=TRUE;  //it will remove all spaces
                $config['encrypt_name']=TRUE;   //it wil encrypte the original file name
                    //die($config);
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('passport')){
                    $uploadData = $this->upload->data();
                    $passport = $uploadData['file_name'];
                }else{
                    $passport = '';
                }
            }else{
                $passport = '';
            }
            if(!empty($_FILES['signature']['name'])){
                $config['upload_path'] = 'assets/i/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
                $config['file_name'] = $_FILES['signature']['name'];
                $config['max_size']      = '8192'; 
                $config['remove_spaces']=TRUE;  //it will remove all spaces
                $config['encrypt_name']=TRUE;   //it wil encrypte the original file name
                    //die($config);
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('signature')){
                    $uploadData = $this->upload->data();
                    $signature = $uploadData['file_name'];
                }else{
                    $signature = '';
                }
            }else{
                $signature = '';
            }
            
            //Prepare array of user data
            $data = array(
            'signature' => $signature,
            'passport' => $passport,
            );
            //   echo "<pre>";
            // print_r($data);
            //  echo "</pre>";
            //   exit();
           $this->load->model('queries'); 
            //Storing insertion status message.
            if($data){
                $this->queries->update_customer_profile($customer_id,$data);
                $this->session->set_flashdata('massage','Customer Registration Successfully');
               }else{
                $this->session->set_flashdata('error','Data failed!!');
            }
            return redirect('oficer/customer_profile/'.$customer_id);

    }

 public function update_code($customer_id,$customer_code){
  $sqldata="UPDATE `tbl_customer` SET `customer_code`= '$customer_code' WHERE `customer_id`= '$customer_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
   return true;
}



public function customer_profile($customer_id){
$this->load->model('queries');
$blanch_id = $this->session->userdata('blanch_id');
$empl_id = $this->session->userdata('empl_id');
$manager_data = $this->queries->get_manager_data($empl_id);
$comp_id = $manager_data->comp_id;
$company_data = $this->queries->get_companyData($comp_id);
$blanch_data = $this->queries->get_blanchData($blanch_id);
$empl_data = $this->queries->get_employee_data($empl_id);
$customer = $this->queries->get_customer_data($customer_id);
$account = $this->queries->get_accountTYpe();
$privillage = $this->queries->get_position_empl($empl_id);
$customer_profile = $this->queries->get_customer_profileData($customer_id);
$manager = $this->queries->get_position_manager($empl_id);
$this->load->view('officer/customer_profile',['customer_profile'=>$customer_profile,'privillage'=>$privillage,'manager'=>$manager]);
          }


          public function all_customer() {
            $this->load->model('queries');
        
            // Get session data
        
            $blanch_id  = $this->session->userdata('blanch_id');
            $empl_id    = $this->session->userdata('empl_id');
        
            // Get supporting data
            $manager_data  = $this->queries->get_manager_data($empl_id);
            $comp_id       = $manager_data->comp_id ?? null;
            $company_data  = $this->queries->get_companyData($comp_id);
            $blanch_data   = $this->queries->get_blanchData($blanch_id);
            $empl_data     = $this->queries->get_employee_data($empl_id);
            $privillage    = $this->queries->get_position_empl($empl_id);
            $manager       = $this->queries->get_position_manager($empl_id);
        
          $customer = $this->queries->get_customer_blanch($blanch_id);
          
            //    echo "<pre>";
            // print_r($customer);
            //  echo "</pre>";
            //   exit();

//             echo "Position: $position<br>";
// echo "Employee ID: $empl_id<br>";
// echo "<pre>"; print_r($customer); echo "</pre>"; exit();

        
            // Load the view
            $this->load->view('officer/all_customer', [
                'customer'   => $customer,
                'empl_data'  => $empl_data,
                'privillage' => $privillage,
                'manager'    => $manager
            ]);
        }
        

public function manager_allcustomer(){
  $this->load->model('queries');
   $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $customer = $this->queries->get_allcutomer($comp_id);
    $privillage = $this->queries->get_position_empl($empl_id);
    $manager = $this->queries->get_position_manager($empl_id);
       //  echo"<pre>";
       // print_r($customer);
       // echo"</pre>";
       //      exit();
    $this->load->view('officer/all_customer',['customer'=>$customer,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]); 
}


public function view_more_customer($customer_id){
    $this->load->model('queries');
     $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);
    //$customer_profile = $this->queries->get_customer_profileData($customer_id);
    $customer = $this->queries->edit_customer($customer_id);
    $privillage = $this->queries->get_position_empl($empl_id);
    $manager = $this->queries->get_position_manager($empl_id);


    $customer_profile = $this->queries->get_customer_profileData_update($customer_id);
    
    $customer = $this->queries->edit_customer($customer_id);

    $blanch = $this->queries->get_blanch($comp_id);
    $region = $this->queries->get_region();
    $account = $this->queries->get_accountTYpe();

    $sponser = $this->queries->get_sponserCustomer($customer_id);

    $all_customer_loan = $this->queries->get_loan_collection_customer($customer_id);
    
  $this->load->view('officer/view_more_customer',['customer_profile'=>$customer_profile,'privillage'=>$privillage,'customer'=>$customer,'manager'=>$manager,'blanch'=>$blanch,'region'=>$region,'account'=>$account,'sponser'=>$sponser,'all_customer_loan'=>$all_customer_loan]);
}

public function upadate_customer($customer_id){
    $this->form_validation->set_rules('phone_no','phone number','required');
    $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
    if ($this->form_validation->run()) {
        $data = $this->input->post();
        $data['phone_no'] = $this->input->post('phone_no');
        // print_r($data);
        //     exit();
        $this->load->model('queries');
        if ($this->queries->update_customer($customer_id,$data)) {
            $this->session->set_flashdata('massage','Phone number Updated successfully');
        }else{
      $this->session->set_flashdata('error','Failed');

        }
        return redirect('oficer/view_more_customer/'.$customer_id);
    }
    $this->view_more_customer();
}

public function loan_application(){
  // $position = strtoupper(trim($this->session->userdata('position_name')));
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);
    
   
    $privillage = $this->queries->get_position_empl($empl_id);
    $manager = $this->queries->get_position_manager($empl_id);
    // if (strtoupper($position) === 'LOAN OFFICER') {
    //     $customer = $this->queries->get_allcutomerofficerData($blanch_id, $empl_id);
    // } elseif ($position === 'BRANCH MANAGER') {
      $customer = $this->queries->get_allcutomerblanchData($blanch_id);
    // } else {
    //     $customer = []; // fallback: empty list
    // }
    
      //   echo "<pre>";
      // print_r($customer);
      //      exit();
    $this->load->view('officer/loan_application',['customer'=>$customer,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
}


public function manager_loanApplication(){
$this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $customer = $this->queries->get_all_customer($comp_id);
    $privillage = $this->queries->get_position_empl($empl_id);
    $manager = $this->queries->get_position_manager($empl_id);
      //   echo "<pre>";
      // print_r($customer);
      //      exit();
    $this->load->view('officer/loan_application',['customer'=>$customer,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
}

public function search_customer()
{
    $this->load->model('queries');

    /* ===============================
       1. Hakiki login & session data
    ================================*/
    $empl_id = $this->session->userdata('empl_id');
    if (!$empl_id) {
        redirect('login');
        return;
    }

    $blanch_id = $this->session->userdata('blanch_id');

    /* ===============================
       2. Pata manager & company info
    ================================*/
    $manager_data = $this->queries->get_manager_data($empl_id);
    if (!$manager_data) {
        $this->session->set_flashdata('error', 'Taarifa za meneja hazijapatikana.');
        redirect('oficer/loan_application');
        return;
    }

    $comp_id = $manager_data->comp_id;

    /* ===============================
       3. Pata employee data
    ================================*/
    $empl_data = $this->queries->get_employee_data($empl_id);

    /* ===============================
       4. Pata customer_id (POST au SESSION)
    ================================*/
    $customer_id = $this->input->post('customer_id');

    if (!$customer_id) {
        $customer_id = $this->session->userdata('customer_id');
    }

    if (!$customer_id) {
        $this->session->set_flashdata('error', 'Tafadhali chagua mteja.');
        redirect('oficer/loan_application');
        return;
    }

    // Ondoa customer_id baada ya kuitumia
    $this->session->unset_userdata('customer_id');

    /* ===============================
       5. Tafuta mteja
    ================================*/
    $customer = $this->queries->search_CustomerID($customer_id, $comp_id);

    if (!$customer) {
        $this->session->set_flashdata(
            'error',
            'Mteja hakupatikana au hajaruhusiwa chini ya kampuni hii.'
        );
        redirect('oficer/loan_application');
        return;
    }

    /* ===============================
       6. Hakiki mkopo ulio wazi
    ================================*/
    $open_loan = $this->db
        ->where('customer_id', $customer_id)
        ->where('loan_status', 'open')
        ->get('tbl_loans')
        ->row();

    if ($open_loan) {
        return $this->load->view('officer/search_customer', [
            'customer'      => $customer,
        'existing_passport' => $this->get_latest_customer_passport($customer_id),
            'sponser'       => $this->queries->get_sponser($customer_id),
            'sponsers_data' => $this->queries->get_sponserCustomer($customer_id),
            'region'        => $this->queries->get_region(),
            'comp_id'       => $comp_id, 
            'empl_data'     => $empl_data,
            'privillage'    => $this->queries->get_position_empl($empl_id),
            'manager'       => $this->queries->get_position_manager($empl_id)
        ]);
    }

    /* ===============================
       7. Hakiki mikopo inayosubiri
    ================================*/
    if ($this->queries->has_pending_loans($customer_id)) {
        return $this->load->view('officer/toast_message_view', [
            'message' => "Mteja <b>{$customer->f_name} {$customer->m_name} {$customer->l_name}</b> bado hajamaliza mkopo wake. Tafadhali maliza mkopo kabla ya kuomba tena.",
            'type'    => 'loan'
        ]);
    }

    /* ===============================
       8. Hakiki faini
    ================================*/
    $latestLoan = $this->queries->get_latest_done_loan($customer_id);

    if ($latestLoan) {
        $total_penart = $this->queries->get_total_penart_loan($latestLoan->loan_id)->total_penart ?? 0;
        $paid         = $this->queries->get_total_penart_paid_loan($latestLoan->loan_id)->total_PaidPenart ?? 0;

        $msamaha = $this->queries->get_penart_check($latestLoan->loan_id);
        $waived  = ($msamaha && $msamaha->status === 'checked');

        if (!$waived && ($total_penart > $paid)) {
            return $this->load->view('officer/toast_message_view', [
                'message' => "Habari, Mteja <b>{$customer->f_name} {$customer->m_name} {$customer->l_name}</b> anadaiwa faini TZS " .
                    number_format($total_penart - $paid) .
                    ". Tafadhali alipe au omba ahakikiwe.",
                'type' => 'penalty'
            ]);
        }
    }

    /* ===============================
       9. Sponsor info
    ================================*/
    $sponser = $this->queries->get_sponser($customer_id);
    $askReplace = ($latestLoan && $sponser) ? true : false;

    /* ===============================
       10. Load final view
    ================================*/
    return $this->load->view('officer/search_customer', [
        'customer'      => $customer,
      'existing_passport' => $this->get_latest_customer_passport($customer_id),
        'comp_id'       => $comp_id,
        'sponser'       => $sponser,
        'sponsers_data' => $this->queries->get_sponserCustomer($customer_id),
        'region'        => $this->queries->get_region(),
        'empl_data'     => $empl_data,
        'privillage'    => $this->queries->get_position_empl($empl_id),
        'manager'       => $this->queries->get_position_manager($empl_id),
        'askReplace'    => $askReplace,
        'latestLoan'    => $latestLoan
    ]);
}


/**
 * Handle sponser confirmation (persistent)
 */
public function handle_sponser_confirmation()
{
    $customer_id = $this->input->post('customer_id');

    if (!$customer_id) {
        $this->session->set_flashdata('error', 'Hakuna mteja aliyechaguliwa.');
        redirect('oficer/loan_application');
        return;
    }

    if ($this->input->post('replace')) {
        // Futa mdhamini wa zamani
        $this->db->where('customer_id', $customer_id)->delete('tbl_sponser');
        $this->session->set_flashdata('massage', 'Mdhamini wa zamani amefutwa. Tafadhali ongeza mdhamini mpya.');
    } else if ($this->input->post('keep')) {
        $this->session->set_flashdata('massage', 'Mdhamini wa sasa bado anabaki.');
    }

    // Reload search_customer view, lakini **modal haionekani tena**
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id   = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id   = $manager_data->comp_id;
    $empl_data = $this->queries->get_employee_data($empl_id);

    $customer = $this->queries->search_CustomerID($customer_id, $comp_id);

    // Load view without askReplace
    return $this->load->view('officer/search_customer', [
        'customer'      => $customer,
      'existing_passport' => $this->get_latest_customer_passport($customer_id),
        'comp_id'       => $comp_id,
        'sponser'       => $this->queries->get_sponser($customer_id),
        'sponsers_data' => $this->queries->get_sponserCustomer($customer_id),
        'region'        => $this->queries->get_region(),
        'empl_data'     => $empl_data,
        'privillage'    => $this->queries->get_position_empl($empl_id),
        'manager'       => $this->queries->get_position_manager($empl_id),
        'askReplace'    => false // ⚠️ modal haionekani tena
    ]);
}

 








// public function search_customer()
// {
//     $this->load->model('queries');
//     $blanch_id = $this->session->userdata('blanch_id');
//     $empl_id = $this->session->userdata('empl_id');
//     $manager_data = $this->queries->get_manager_data($empl_id);
//     $comp_id = $manager_data->comp_id;
//     $company_data = $this->queries->get_companyData($comp_id);
//     $blanch_data = $this->queries->get_blanchData($blanch_id);
//     $empl_data = $this->queries->get_employee_data($empl_id);

//     $customer_id = $this->input->post('customer_id');

//     $customer = $this->queries->search_CustomerID($customer_id, $comp_id);
    
//     if (!$customer) {
//         $this->session->set_flashdata('error', 'Mteja hakupatikana.');
//         redirect('oficer/loan_application');
//     }

//     // ✅ Check if the customer has an open loan
//     $open_loan = $this->db
//         ->where('customer_id', $customer_id)
//         ->where('loan_status', 'open')
//         ->get('tbl_loans')
//         ->row();

//     if ($open_loan) {
//         $sponser = $this->queries->get_sponser($customer_id);
//         @$sponsers_data = $this->queries->get_sponserCustomer($customer_id);
//         @$region = $this->queries->get_region();
//         $privillage = $this->queries->get_position_empl($empl_id);
//         $manager = $this->queries->get_position_manager($empl_id);

//         $this->load->view('officer/search_customer', [
//             'customer' => $customer,
//             'sponser' => $sponser,
//             'sponsers_data' => $sponsers_data,
//             'region' => $region,
//             'empl_data' => $empl_data,
//             'privillage' => $privillage,
//             'manager' => $manager
//         ]);
//         return;
//     }

//     // ⚠️ If the customer has a pending loan (not done and not open)
//     if ($this->queries->has_pending_loans($customer_id)) {
//         $data = [
//             'message' => 'Mteja bado hajamaliza mkopo wake. Tafadhali maliza mkopo kabla ya kuomba tena.',
//             'type' => 'loan'
//         ];
//         $this->load->view('officer/toast_message_view', $data);
//         return;
//     }

//     // ✅ If no penalties and no pending loan, proceed normally
//     $sponser = $this->queries->get_sponser($customer_id);
//     @$sponsers_data = $this->queries->get_sponserCustomer($customer_id);
//     @$region = $this->queries->get_region();
//     $privillage = $this->queries->get_position_empl($empl_id);
//     $manager = $this->queries->get_position_manager($empl_id);

//     $this->load->view('officer/search_customer', [
//         'customer' => $customer,
//         'sponser' => $sponser,
//         'sponsers_data' => $sponsers_data,
//         'region' => $region,
//         'empl_data' => $empl_data,
//         'privillage' => $privillage,
//         'manager' => $manager
//     ]);
// }




// public function creat_sponser($customer_id,$comp_id){
//         $this->load->model('queries');
//         $customer = $this->queries->search_CustomerID($customer_id,$comp_id);
//         $customerdata = $customer->customer_id;
//                    // print_r($customer_id);
//                    //           exit();
//         if(!empty($this->input->post('submit'))){
//             // echo "<pre>";
//             // print_r($_POST['']);
//               if(isset($_POST['submit'])){ 
//                     $sp_name =  $_POST['sp_name']; 
//                     $sp_mname =  $_POST['sp_mname']; 
//                     $sp_lname =  $_POST['sp_lname']; 
//                     $sp_phone_no =  $_POST['sp_phone_no']; 
                   
//                     $nature =  $_POST['nature']; 
//                     $sp_relation =  $_POST['sp_relation'];  
//                     $comp_id =  $_POST['comp_id']; 
//                     $customer_id =  $_POST['customer_id'];


                   
//           for($i=0; $i<count($sp_name);$i++) {
//         $this->db->query("INSERT INTO  tbl_sponser (`sp_name`,`sp_mname`,`sp_lname`,`sp_phone_no`,`sp_relation`,`comp_id`,`customer_id`) 
//       VALUES ('".$sp_name[$i]."','".$sp_mname[$i]."','".$sp_lname[$i]."','".$sp_phone_no[$i]."','".$sp_relation[$i]."','".$comp_id[$i]."','".$customer_id[$i]."')");
         
//              }
                       
//            }
//        $this->session->set_flashdata('massage','Sponsers saved successfully');

                    
//         }  
//         return redirect("oficer/loan_applicationForm/".$customerdata);        
//     }


public function create_sponser($customer_id = null, $comp_id = null)
{
    $this->load->model('queries');
    $this->load->library('form_validation');

    /* ================= SESSION & BASIC DATA ================= */

    $empl_id = $this->session->userdata('empl_id');

    if (!$comp_id) {
        $comp_id = $this->session->userdata('comp_id');
    }

    $customer = $this->queries->search_CustomerID($customer_id, $comp_id);

      // echo "<pre>";
      //       print_r(    $customer );
      //       echo "</pre>";
      //           exit();

    if (!$customer) {
        show_error('Customer not found');
    }

    $customerdata = $customer->customer_id;

    /* ================= FORM VALIDATION ================= */

    $this->form_validation->set_rules('sp_name', 'First Name', 'required');
    $this->form_validation->set_rules('sp_mname', 'Middle Name', 'required');
    $this->form_validation->set_rules('sp_lname', 'Last Name', 'required');
    $this->form_validation->set_rules(
        'sp_phone_no',
        'Phone Number',
        'required|numeric|exact_length[10]'
    );
    $this->form_validation->set_rules('sp_relation', 'Relationship', 'required');
    $this->form_validation->set_rules('nature', 'Business Nature', 'required');

    /* ================= OPTIONAL FILE VALIDATION ================= */

    if (!empty($_FILES['barua_utambulisho']['name'])) {
        $this->form_validation->set_rules(
            'barua_utambulisho',
            'Barua ya Utambulisho',
            'callback_validate_pdf_upload[barua_utambulisho]'
        );
    }

    if (!empty($_FILES['kitambulisho']['name'])) {
        $this->form_validation->set_rules(
            'kitambulisho',
            'Kitambulisho',
            'callback_validate_pdf_upload[kitambulisho]'
        );
    }

    /* ================= VALIDATION FAIL ================= */

    if ($this->form_validation->run() == FALSE) {
        $sponser = (object) $this->input->post();
        $this->load->view('officer/search_customer', [
            'customer' => $customer,
        'existing_passport' => $this->get_latest_customer_passport($customer_id),
            'sponser'  => $sponser
        ]);
        return;
    }

    /* ================= FILE UPLOADS ================= */

    $barua_name = '';
    $kitambulisho_name = '';

    if (!empty($_FILES['barua_utambulisho']['name'])) {
        $barua_name = $this->upload_file(
            'barua_utambulisho',
            'barua_' . $customer_id
        );
    }

    if (!empty($_FILES['kitambulisho']['name'])) {
        $kitambulisho_name = $this->upload_file(
            'kitambulisho',
            'kitambulisho_' . $customer_id
        );
    }

    /* ================= PASSPORT (BASE64) ================= */

    $passportPath = '';
    $passportData = $this->input->post('passport_cropped');

    if (!empty($passportData)) {
        $passportBase64 = preg_replace(
            '#^data:image/\w+;base64,#i',
            '',
            $passportData
        );

        $passportDecoded = base64_decode($passportBase64);

        $passportFileName = 'passport_' . $customer_id . '_' . time() . '.jpg';
        $passportPath = 'assets/sponser_passport/' . $passportFileName;

        if (!file_exists(FCPATH . 'assets/sponser_passport/')) {
            mkdir(FCPATH . 'assets/sponser_passport/', 0755, true);
        }

        file_put_contents(FCPATH . $passportPath, $passportDecoded);
    }

    /* ================= PREPARE DATA ================= */

$data = [
    'customer_id'        => $customerdata,
    'comp_id'            => $comp_id,

    'sp_name'            => $this->input->post('sp_name'),
    'sp_mname'           => $this->input->post('sp_mname'),
    'sp_lname'           => $this->input->post('sp_lname'),
    'sp_phone_no'        => $this->input->post('sp_phone_no'),
    'sp_relation'        => $this->input->post('sp_relation'),
    'nature'             => $this->input->post('nature'),

    // ✅ FILE PATHS (CORRECT COLUMN NAMES)
    'barua_path'         => $barua_name,
    'kitambulisho_path'  => $kitambulisho_name,
    'passport_path'      => $passportPath,

    // ✅ EXISTS IN TABLE
    'created_at'         => date('Y-m-d H:i:s')
];


    /* ================= INSERT OR UPDATE ================= */

    $exists = $this->db
        ->where('customer_id', $customerdata)
        ->where('comp_id', $comp_id)
        ->where('loan_id IS NULL', NULL, FALSE)
        ->get('tbl_sponser')
        ->row();

    if ($exists) {
        $this->db
            ->where('sp_id', $exists->sp_id)
            ->update('tbl_sponser', $data);
    } else {
        $this->db->insert('tbl_sponser', $data);
    }

    /* ================= SUCCESS ================= */

    $this->session->set_flashdata(
        'massage',
        'Taarifa za mdhamini zimepokelewa'
    );

    redirect("oficer/loan_applicationForm/" . $customer_id);
}


public function verify_sponsor_otp_page($customer_id)
{
    $sponser = $this->db
        ->where('customer_id', $customer_id)
        ->where('otp_verified', 0)
        ->get('tbl_sponser')
        ->row();

    if (!$sponser) {
        // OTP tayari verified → nenda loan form
        redirect("oficer/loan_applicationForm/" . $customer_id);
        return;
    }

    $this->load->view('officer/verify_sponsor_otp', [
        'customer_id' => $customer_id,
        'phone'       => $sponser->sp_phone_no
    ]);
}



public function verify_sponsor_otp()
{
    $customer_id = $this->input->post('customer_id');
    $otp = $this->input->post('otp');

    $sponser = $this->db
        ->where('customer_id', $customer_id)
        ->where('otp_code', $otp)
        ->where('otp_verified', 0)
        ->where('otp_expires >=', date('Y-m-d H:i:s'))
        ->get('tbl_sponser')
        ->row();

    if (!$sponser) {
        $this->session->set_flashdata('otp_error', 'OTP sio sahihi au muda umeisha.');
        redirect("oficer/verify_sponsor_otp_page/" . $customer_id);
        return;
    }

    // Verify OTP
    $this->db->where('sp_id', $sponser->sp_id)->update('tbl_sponser', [
        'otp_verified' => 1,
        'otp_code'     => null
    ]);

    // ✅ SASA NDIPO IFUNGUE LOAN FORM
    redirect("oficer/loan_applicationForm/" . $customer_id);
}







// public function view_aggrement($customer_id)
// {
    // $this->load->model('queries');

    // $empl_id      = $this->session->userdata('empl_id');
    // $manager_data = $this->queries->get_manager_data($empl_id);
    // $comp_id      = $manager_data->comp_id;

    // $customer  = $this->queries->get_aggrement($customer_id, $comp_id);
    // $loan_form = $this->queries->get_formloanData($customer_id, $comp_id);
    // $compdata  = $this->queries->get_comp_data($comp_id);
    // $mdhamini  = $this->queries->get_guarator_data($customer_id, $comp_id);

    // $loan_id = $loan_form ? $loan_form->loan_id : null;
    // if (!$loan_id) {
    //     show_error("Loan ID not found. Please check the loan data.");
    // }

    // $collateral    = $this->queries->get_colateral_data($loan_id);
    // $local_officer = $this->queries->get_loacagovment_data($loan_id);
    // $inc_history   = $this->queries->get_loanIncomeHistory($customer_id);

    // ✅ Capture HTML (nothing echoed to browser)
    // $html = $this->load->view('officer/loan_aggrement', [
    //     "customer"      => $customer,
    //     "loan_form"     => $loan_form,
    //     "mdhamini"      => $mdhamini,
    //     "compdata"      => $compdata,
    //     "collateral"    => $collateral,
    //     "local_officer" => $local_officer,
    //     "inc_history"   => $inc_history
    // ], true);

    // ✅ Clear any buffered output (very important)
    // if (ob_get_length()) {
    //     ob_end_clean();
    // }

    // ✅ Setup mPDF
    // $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);
    // $mpdf->SetFooter('Generated By Brainsoft Technology | {PAGENO} of {nbpg}');
    // $mpdf->WriteHTML($html);

    // ✅ Send PDF directly (no headers already sent)
    // $filename = 'Loan_Agreement_' . $customer_id . '.pdf';
    // $mpdf->Output($filename, 'I'); // Inline
// }



public function  view_aggrement($customer_id, $loan_id = null){
  $this->load->model('queries');

    $empl_id      = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id      = $manager_data->comp_id;

    $customer  = $this->queries->get_aggrement($customer_id, $comp_id);
    if (!empty($loan_id)) {
      $loan_form = $this->queries->get_formloanDataByLoanId($customer_id, $comp_id, $loan_id);
      if (empty($loan_form)) {
        $loan_form = $this->queries->get_formloanDataByLoanIdAnyCompany($customer_id, $loan_id);
      }
    } else {
      $loan_form = $this->queries->get_formloanData($customer_id, $comp_id);
    }
    $compdata  = $this->queries->get_comp_data($comp_id);
    $mdhamini  = $this->queries->get_guarator_data($customer_id, $comp_id);

    $loan_id = $loan_form ? $loan_form->loan_id : null;
    if (!$loan_id) {
        show_error("Loan ID not found. Please check the loan data.");
    }

    $collateral    = $this->queries->get_colateral_data($loan_id);
    $local_officer = $this->queries->get_loacagovment_data($loan_id);
    $inc_history   = $this->queries->get_loanIncomeHistory($customer_id);


      //  echo "<pre>";
      //       print_r( $compdata );
      //       echo "</pre>";
      //           exit();
                


    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);
    $watermark_text = strtoupper(trim((string)($compdata->comp_name ?? '')));
    if ($watermark_text !== '') {
      $mpdf->SetWatermarkText($watermark_text, 0.08);
      $mpdf->showWatermarkText = true;
    }
     $html = $this->load->view('officer/loan_aggrement',[
       "customer"      => $customer,
        "loan_form"     => $loan_form,
        "mdhamini"      => $mdhamini,
        "compdata"      => $compdata,
        "collateral"    => $collateral,
        "local_officer" => $local_officer,
        "inc_history"   => $inc_history],true);
     $footer_text = strtoupper(trim((string)($compdata->comp_name ?? '')));
     if ($footer_text === '') {
       $footer_text = 'COMPANY';
     }
     $mpdf->SetFooter($footer_text);
     $mpdf->WriteHTML($html);
     $customer_name_for_file = trim((string)(($customer->f_name ?? '') . '_' . ($customer->m_name ?? '') . '_' . ($customer->l_name ?? '')));
     $customer_name_for_file = strtolower(preg_replace('/[^a-zA-Z0-9_]+/', '_', $customer_name_for_file));
     $customer_name_for_file = trim(preg_replace('/_+/', '_', $customer_name_for_file), '_');
     if ($customer_name_for_file === '') {
       $customer_name_for_file = (string)$customer_id;
     }
     $download_file_name = 'mkataba_wa_' . $customer_name_for_file . '.pdf';
     $mpdf->Output($download_file_name, 'I');
		//$this->load->view('admin/blanch_report');


    
	}






public function validate_sponser_pdf($field)

{
    if (isset($_FILES[$field]) && $_FILES[$field]['error'] === UPLOAD_ERR_OK) {
        $ext = strtolower(pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION));
        if ($ext === 'pdf') {
            return true;
        } else {
            $this->form_validation->set_message('validate_pdf_upload', 'The {field} must be a PDF file.');
            return false;
        }
    } else {
        $this->form_validation->set_message('validate_pdf_upload', 'The {field} is required.');
        return false;
    }
}


private function upload_file($field_name, $new_name_prefix)
{
  $upload_path = './assets/sponser_documents/';

    
    // Create the directory if it doesn't exist
    if (!file_exists($upload_path)) {
        mkdir($upload_path, 0755, true);
    }

    // Get the extension
    $ext = pathinfo($_FILES[$field_name]['name'], PATHINFO_EXTENSION);

    // Create a new unique filename
    $new_name = $new_name_prefix . '_' . time() . '.' . $ext;
    $full_path = $upload_path . $new_name;

    // Move the uploaded file
    if (move_uploaded_file($_FILES[$field_name]['tmp_name'], $full_path)) {
        return 'uploads/sponser_documents/' . $new_name; // return relative path to save in DB
    }

    return null;
}



  


 



      public function loan_applicationForm($customer_id){
        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['loan_form_token'] = bin2hex(random_bytes(32));

        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);

        $customer = $this->queries->get_customer_data($customer_id);
        $loans = $this->queries->get_open_loans_by_customer($customer_id);
        
        // echo "<pre>";
        //     print_r(  $loans);
        //     echo "</pre>";
        //          exit();
    $existing_loan = null;
    if (!empty($loans)) {
        // Assuming you want the first open loan to edit/update
        $existing_loan = $loans[0];
    }

        $loan_category = $this->queries->get_loancategory($comp_id);
        $group = $this->queries->get_groupDataBlanchData($blanch_id);
        $region = $this->queries->get_region();
        $blanch = $this->queries->get_blanch($comp_id);
        $loan_form_request = $this->queries->get_customerDataLOANform($customer_id);
        $loan_option = $this->queries->get_loan_done($customer_id);
        $skip_next = $this->queries->get_loanOpen_skip($customer_id);
        $reject_skip = $this->queries->get_loanOpen_skipReject($customer_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $manager = $this->queries->get_position_manager($empl_id);
        $formular = $this->queries->get_interestFormular($comp_id);
        $loan_fee_category = $this->queries->get_loanfee_categoryData($comp_id);

        $empl_blanch = $this->queries->get_employee_blanch($blanch_id);
       


         $this->load->view('officer/loan_aplication_form', [
        'customer' => $customer,
        'loan_category' => $loan_category,
        'existing_loan' => $existing_loan,  // This is new
        'group' => $group,
        'region' => $region,
        'blanch' => $blanch,
        'loan_form_request' => $loan_form_request,
        'loan_option' => $loan_option,
        'empl_data' => $empl_data,
        'privillage' => $privillage,
        'skip_next' => $skip_next,
        'manager' => $manager,
        'reject_skip' => $reject_skip,
        'formular' => $formular,
        'loan_fee_category' => $loan_fee_category,
        'empl_blanch' => $empl_blanch,
        'loan_form_token' => $_SESSION['loan_form_token']
    ]);
    }



    public function create_loanapplication($customer_id) {
      // Load necessary helpers and libraries
      $this->load->helper(['form', 'string']);
      $this->load->library('form_validation');
      $this->load->model('queries');

      if (!isset($_SESSION)) {
          session_start();
      }

      $post_token = $this->input->post('loan_form_token');
      if (!$post_token || $post_token !== ($_SESSION['loan_form_token'] ?? null)) {
          $this->session->set_flashdata('error', 'Invalid or duplicate loan form submission.');
          return redirect('oficer/loan_applicationForm/' . $customer_id);
      }

      unset($_SESSION['loan_form_token']);
  
      // Set validation rules
      $this->form_validation->set_rules('comp_id', 'Company', 'required');
      $this->form_validation->set_rules('empl_id', 'Employee', 'required');
      $this->form_validation->set_rules('blanch_id', 'Blanch', 'required');
      $this->form_validation->set_rules('customer_id', 'Customer', 'required');
      $this->form_validation->set_rules('category_id', 'Category', 'required');
      $this->form_validation->set_rules('how_loan', 'How Loan', 'required');
      $this->form_validation->set_rules('day', 'Day', 'required|integer');
      $this->form_validation->set_rules('session', 'Session', 'required');
      $this->form_validation->set_rules('rate', 'Rate', 'required');
      $this->form_validation->set_rules('reason', 'Reason', 'required');
  
      // Run validation
      if ($this->form_validation->run() === FALSE) {
          // Send validation errors back
          $this->session->set_flashdata('error', validation_errors());
          return redirect('oficer/loan_applicationForm/' . $customer_id);
      }
  
      // Collect form data
      $data = $this->input->post();
        unset($data['loan_form_token']);

        if ($this->queries->has_pending_loans($customer_id)) {
          $existing_open_loan = $this->queries->get_loanOpen_skip($customer_id);
          $this->session->set_flashdata('error', 'This customer already has a pending loan.');

          if (!empty($existing_open_loan) && !empty($existing_open_loan->loan_id)) {
            return redirect('oficer/collelateral_session/' . $existing_open_loan->loan_id);
          }

          return redirect('oficer/loan_applicationForm/' . $customer_id);
        }

      $data['loan_code'] = random_string('numeric', 14);
      $data['created_by'] = $this->session->userdata('user_id');
  
      if (!$data['created_by']) {
          $this->session->set_flashdata('error', 'Session expired. Please log in again.');
          return redirect('login');
      }
  
      // Fetch category info for limits
      $category_id = $data['category_id'];
      $how_loan = $data['how_loan'];
      $cat = $this->queries->get_loancategoryData($category_id);
      $loan_price = $cat->loan_price;
      $loan_perday = $cat->loan_perday;
  
      if ($how_loan < $loan_price) {
          $this->session->set_flashdata('massage', 'Amount of Loan Is Less than minimum allowed');
          return redirect('oficer/loan_applicationForm/' . $customer_id);
      }
  
      if ($how_loan > $loan_perday) {
          $this->session->set_flashdata('massage', 'Amount of Loan Is Greater than daily limit');
          return redirect('oficer/loan_applicationForm/' . $customer_id);
      }
  
      // Insert loan into DB
      $loan_id = $this->queries->insert_loan($data);

      // Link unlinked sponsors to this loan
      $comp_id_val = $data['comp_id'];
      $this->queries->link_sponsors_to_loan($customer_id, $comp_id_val, $loan_id);

      $new_customer = $this->queries->get_loan_by_loan_id($loan_id);
  
      // Prepare notification message
      $first_name   = $new_customer->f_name;
      $middle_name  = $new_customer->m_name;
      $last_name    = $new_customer->l_name;
      $phone_number = $new_customer->phone_no;
      $employee_name = $new_customer->empl_name;
      $blanch_name  = $new_customer->blanch_name;
  
      $message = "Habari! Kuna maombi ya mkopo katika tawi la $blanch_name. 
  Jina la mteja ni $first_name $middle_name $last_name, nambari ya simu ni $phone_number. 
  Afisa aliyesajili ni $employee_name. Kiasi cha mkopo kilichoombwa ni TZS " . number_format($how_loan, 0);
  
      // Phone numbers to notify
    $admins_numbers = $this->queries->get_admin_numbers();
      $phone_numbers = [];
        foreach ($admins_numbers as $admin) {
    $phone_numbers[] = $admin->phone_number; // hakika hakuna validation, tuzichukue raw
}

            foreach ($phone_numbers as $phone) {
                $this->sendsms($phone, $message);
            }
  
      // Redirect with success message
      $this->session->set_flashdata('massage', 'Loan application created successfully!');
      return redirect('oficer/collelateral_session/' . $loan_id);
  }
  
  

public function modify_loanapplication($customer_id, $loan_id) {
    $this->load->helper('string');
    $this->form_validation->set_rules('comp_id', 'Company', 'required');
    $this->form_validation->set_rules('blanch_id', 'Blanch', 'required');
    $this->form_validation->set_rules('customer_id', 'Customer', 'required');
    $this->form_validation->set_rules('category_id', 'Category', 'required');
    $this->form_validation->set_rules('how_loan', 'How loan', 'required');
    $this->form_validation->set_rules('day', 'Day', 'required');
    $this->form_validation->set_rules('session', 'Session', 'required');
    $this->form_validation->set_rules('rate', 'Rate', 'required');
    $this->form_validation->set_rules('reason', 'Reason', 'required');

    if ($this->form_validation->run()) {
        $data = $this->input->post();

        $this->load->model('queries');

        // Get existing loan before update
        $existing_loan = $this->queries->get_loan_by_id($loan_id); // Make sure this method exists
        $old_loan_amount = $existing_loan->how_loan;

        $category_id = $data['category_id'];
        $how_loan = $data['how_loan'];

        $cat = $this->queries->get_loancategoryData($category_id);
        $loan_price = $cat->loan_price;
        $loan_perday = $cat->loan_perday;

        if ($how_loan < $loan_price) {
            $this->session->set_flashdata('massage', 'Amount of Loan Is Less');
            return redirect('oficer/loan_applicationForm/' . $customer_id);
        } elseif ($how_loan > $loan_perday) {
            $this->session->set_flashdata('massage', 'Amount of Loan Is Greater');
            return redirect('oficer/loan_applicationForm/' . $customer_id);
        } else {
            // Update loan
            $this->queries->upadete_loan($data, $loan_id);

            // Fetch updated customer/loan data
            $new_customer = $this->queries->get_loan_by_loan_id($loan_id);

            $first_name = $new_customer->f_name;
            $middle_name = $new_customer->m_name;
            $last_name = $new_customer->l_name;
            $phone_number = $new_customer->phone_no;
            $employee_name = $new_customer->empl_name;
            $blanch_name = $new_customer->blanch_name;

            // Build SMS message
            $message = "Habari! Kuna mabadiliko ya maombi ya mkopo katika tawi la $blanch_name. 
Jina la mteja: $first_name $middle_name $last_name, 
Nambari ya simu: $phone_number. 
Kiasi kilichoombwa mwanzo: TZS " . number_format($old_loan_amount, 0) . ", 
Kilichobadilishwa sasa kuwa: TZS " . number_format($how_loan, 0) . ".";
$admins_numbers = $this->queries->get_admin_numbers();
        foreach ($admins_numbers as $admin) {
    $phone_numbers[] = $admin->phone_number; // hakika hakuna validation, tuzichukue raw
}

            foreach ($phone_numbers as $phone) {
                $this->sendsms($phone, $message);
            }

            $this->session->set_flashdata('massage', 'Loan Application Updated successfully');
        }

        return redirect('oficer/collelateral_session/' . $loan_id);
    }

    // If validation fails, show form again
    $this->loan_applicationForm($customer_id);
}





        public function collelateral_session($loan_id){
      if (!isset($_SESSION)) {
        session_start();
      }

      $_SESSION['collateral_form_token'] = bin2hex(random_bytes(32));

    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;

    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);
    $loan_attach = $this->queries->get_loanAttach($loan_id);
    $privillage = $this->queries->get_position_empl($empl_id);
    $collateral = $this->queries->get_colateral_data($loan_id);
    $manager = $this->queries->get_position_manager($empl_id);


       
        // echo "<pre>";
        //     print_r(  $loan_attach);
        //     echo "</pre>";
        //          exit();

    // ===========================
    //  SAFISHA NAMBA HAPA NDANI
    // ===========================
    $phone = preg_replace('/\D/', '', $loan_attach->sp_phone_no); 

    if (substr($phone, 0, 1) === '0') { 
        $phone = substr($phone, 1); 
    }

    $phone = "255" . $phone;
    // ===========================

    // Majina
    $sponsor_fname = $loan_attach->sp_name;
    $sponsor_lname = $loan_attach->sp_lname;

    $customer_fname = $loan_attach->f_name;
    $customer_lname = $loan_attach->l_name;

    $loan = number_format($loan_attach->how_loan);

    // Kampuni na tawi
    $comp_name   = $company_data->comp_name;
    $blanch_name = $blanch_data->blanch_name;

    // MESSAGE MPYA
// $message = "Ndugu $sponsor_fname, $customer_fname $customer_lname ni mkopaji kwenye $comp_name ($blanch_name) kwa Tsh $loan. Jukumu lako kama mdhamini ni kulipa ikiwa mkopaji hatalipa. Ikiwa hujapanga kudhamini, toa taarifa kwa 0629364847.";




    // $this->sendsms($phone, $message);

    $this->load->view('officer/collelateral',[
        'loan_attach'=>$loan_attach,
        'privillage'=>$privillage,
        'collateral'=>$collateral,
      'manager'=>$manager,
      'collateral_form_token' => $_SESSION['collateral_form_token']
    ]);
}


       public function create_colateral($loan_id)
{
      if (!isset($_SESSION)) {
        session_start();
      }

      $post_token = $this->input->post('collateral_form_token');
      if (!$post_token || $post_token !== ($_SESSION['collateral_form_token'] ?? null)) {
        $this->session->set_flashdata('error', 'Invalid or duplicate collateral form submission.');
        return redirect('oficer/collelateral_session/' . $loan_id);
      }

      unset($_SESSION['collateral_form_token']);

 
    // Prepare data array for database if you want to save info
    $data = [
        'description'  => $this->input->post('description', true),
        'loan_id'      => $loan_id,
        'co_condition' => $this->input->post('co_condition', true),
        'value'        => str_replace(',', '', $this->input->post('value', true)),
    
    ];

    // Save in DB or do whatever you want with $data
    $this->load->model('queries');
    if ($this->queries->insert($data)) {
        $this->session->set_flashdata('massage', 'Dhamana imehifadhiwa vizuri.');
    } else {
        $this->session->set_flashdata('error', 'Imeshindikana kuhifadhi dhamana.');
    }

    return redirect('oficer/collelateral_session/' . $loan_id);
}





    public function modify_colateral($loan_id,$col_id){
            if(!empty($_FILES['file_name']['name'])){
                $config['upload_path'] = 'assets/i/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
                $config['file_name'] = $_FILES['file_name']['name'];
                $config['max_size']      = '8192'; 
                $config['remove_spaces']=TRUE;  //it will remove all spaces
                $config['encrypt_name']=TRUE;   //it wil encrypte the original file name
                    //die($config);
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('file_name')){
                    $uploadData = $this->upload->data();
                    $file_name = $uploadData['file_name'];
                }else{
                    $file_name = '';
                }
            }else{
                $file_name = '';
            }
            
            //Prepare array of user data
            $data = array(
            'description' =>$this->input->post('description'),
            'co_condition' =>$this->input->post('co_condition'),
            'value' =>$this->input->post('value'),
            'file_name' => $file_name,
            );
            //   echo "<pre>";
            // print_r($data);
            //  echo "</pre>";
            //   exit();
           $this->load->model('queries'); 
            //Storing insertion status message.
            if($data){
                $this->queries->queries->update_collateral($data,$col_id);
                $this->session->set_flashdata('massage','Colateral Updated  Successfully');
               }else{
                $this->session->set_flashdata('error','Data failed!!');
            }
            return redirect('oficer/collelateral_session/'.$loan_id."/".$col_id);

    }

    public function delete_colateral($loan_id,$col_id){
        $this->load->model('queries');
        if($this->queries->remove_collateral($col_id));
        $this->session->set_flashdata('massage','Colateral Deleted successfully');
        return redirect('oficer/collelateral_session/'.$loan_id."/".$col_id);
    }


    public function local_government($loan_id){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);
    $loan_attach = $this->queries->get_loanAttach($loan_id);
    $loan_attach = $this->queries->get_loanAttach($loan_id);
    $region = $this->queries->get_region();
    $privillage = $this->queries->get_position_empl($empl_id);
    $local_gov = $this->queries->get_localgovernmentDetail($loan_id);
    $manager = $this->queries->get_position_manager($empl_id);
        // print_r($region);
        //           exit();
        $this->load->view('officer/local_government',['loan_attach'=>$loan_attach,'region'=>$region,'privillage'=>$privillage,'local_gov'=>$local_gov,'manager'=>$manager]);
    }

  



    public function create_local_govDetails($loan_id){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
        if(!empty($_FILES['cont_attachment']['name'])){
                $config['upload_path'] = 'assets/i/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
                $config['file_name'] = $_FILES['cont_attachment']['name'];
                $config['max_size']      = '10000'; 
                $config['remove_spaces']=TRUE;  //it will remove all spaces
                $config['encrypt_name']=TRUE;   //it wil encrypte the original file name
                    //die($config);
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('cont_attachment')){
                    $uploadData = $this->upload->data();
                    $cont_attachment = $uploadData['file_name'];
                }else{
                    $cont_attachment = '';
                }
            }else{
                $cont_attachment = '';
            }
            
            //Prepare array of user data
            $data = array(
            'loan_id'=> $this->input->post('loan_id'),
            'oficer'=> $this->input->post('oficer'),
            'phone_oficer'=> $this->input->post('phone_oficer'),
            'region_oficer'=> $this->input->post('region_oficer'),
            'district_oficer'=> $this->input->post('district_oficer'),
           
            'ward_oficer'=> $this->input->post('ward_oficer'),
            'street_oficer'=> $this->input->post('street_oficer'),
            'oficer_position'=> $this->input->post('oficer_position'),
            'cont_attachment' => $cont_attachment,
            );
           //    echo "<pre>";
           // print_r($data);
           //      exit();
            //Pass user data to model
           $this->load->model('queries'); 
           $data = $this->queries->insert_localgov_details($data);
          
            //Storing insertion status message.
            if($data){
                $this->session->set_flashdata('massage','maombi ya mikopo yashatumwa tayari');
               }else{
                $this->session->set_flashdata('error','Data failed!!');
            }
            $group = $this->queries->get_groupLoanData($loan_id);
            $manager = $this->queries->get_position_manager($empl_id);
            $group_id = $group->group_id;
            $customer_id = $group->customer_id;
              // echo "<pre>";
              // print_r($group_id);
              //      exit();
              if ($group_id == TRUE) {
                 //echo "machemba";
              return redirect('oficer/group_member/'.$loan_id.'/'.$customer_id);
                   }elseif($manager->position_id == '21'){     
            return redirect('oficer/manager_loanApplication/');
            }else{
            return redirect('oficer/loan_application/');  
            }
    }


    public function group_member($loan_id,$customer_id){
      $this->load->model('queries');
      $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);

      $member = $this->queries->get_groupLoanData($loan_id);
      $region = $this->queries->get_region();
      $groudata = $this->queries->get_groupLoan_detail($loan_id);
       //    echo "<pre>";
       // print_r($member);
       //      exit();
        $this->load->view('officer/group_member',['region'=>$region,'member'=>$member,'groudata'=>$groudata,'customer_id'=>$customer_id,'privillage'=>$privillage]);
    }


    public function create_member_status($customer_id){
    $this->form_validation->set_rules('member_status','Member status','required');
    $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

    if ($this->form_validation->run()) {
        $data = $this->input->post();
        $this->load->model('queries');
        if ($this->queries->update_member_status($data,$customer_id)) {
            $this->session->set_flashdata("massage",'Loan Application Saved successfully');
        }else {
            $this->session->set_flashdata("error",'Failed');
            
        }
        return redirect('oficer/loan_application');
    }

$this->loan_application();
    
}

     
     public function Update_local_govDetails($loan_id,$attach_id){
        $this->load->model('queries');
        if(!empty($_FILES['cont_attachment']['name'])){
                $config['upload_path'] = 'assets/i/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
                $config['file_name'] = $_FILES['cont_attachment']['name'];
                $config['max_size']      = '10000'; 
                $config['remove_spaces']=TRUE;  //it will remove all spaces
                $config['encrypt_name']=TRUE;   //it wil encrypte the original file name
                    //die($config);
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('cont_attachment')){
                    $uploadData = $this->upload->data();
                    $cont_attachment = $uploadData['file_name'];
                }else{
                    $cont_attachment = '';
                }
            }else{
                $cont_attachment = '';
            }
            
            //Prepare array of user data
            $data = array(
            'loan_id'=> $this->input->post('loan_id'),
            'oficer'=> $this->input->post('oficer'),
            'phone_oficer'=> $this->input->post('phone_oficer'),
            'region_oficer'=> $this->input->post('region_oficer'),
            'district_oficer'=> $this->input->post('district_oficer'),
           
            'ward_oficer'=> $this->input->post('ward_oficer'),
            'street_oficer'=> $this->input->post('street_oficer'),
            'oficer_position'=> $this->input->post('oficer_position'),
            'cont_attachment' => $cont_attachment,
            );
           //    echo "<pre>";
           // print_r($data);
           //      exit();
            //Pass user data to model
           $this->load->model('queries'); 
           $data = $this->queries->update_localDetail($data,$attach_id);
          
            //Storing insertion status message.
            if($data){
                $this->session->set_flashdata('massage','Local government information Updated Successfully');
               }else{
                $this->session->set_flashdata('error','Data failed!!');
            }
            $group = $this->queries->get_groupLoanData($loan_id);
            $group_id = $group->group_id;
              // echo "<pre>";
              // print_r($group_id);
              //      exit();
              if ($group_id == TRUE) {
                 //echo "machemba";
              return redirect('oficer/group_member/'.$loan_id);
                   }else{     
            return redirect('oficer/local_government/'.$loan_id."/".$attach_id);
            }
    }







    public function loan_pending() {
    $position   = strtoupper($this->session->userdata('position_name'));
      $this->load->model('queries');
      $blanch_id = $this->session->userdata('blanch_id');
      $empl_id = $this->session->userdata('empl_id');
      $manager_data = $this->queries->get_manager_data($empl_id);
      $comp_id = $manager_data->comp_id;
      $company_data = $this->queries->get_companyData($comp_id);
      $blanch_data = $this->queries->get_blanchData($blanch_id);
      $empl_data = $this->queries->get_employee_data($empl_id);
  
      $privillage = $this->queries->get_position_empl($empl_id);
      $total_request = $this->queries->get_total_loanPendingBlanch($blanch_id);
            //  echo "<pre>";
            // print_r($position);
            //      exit();
      // if ($position === 'LOAN OFFICER') {
      //     $loan_pending = $this->queries->get_loanPendingByOfficer($empl_id);
      // } elseif ($position === 'BRANCH MANAGER') {
          $loan_pending = $this->queries->get_loanPendingBlanch($blanch_id);
      // } else {
      //     $loan_pending = [];
      // }
    // echo "<pre>";
    //           print_r( $empl_data);
    //                exit();

      // Append loan count per customer
      foreach ($loan_pending as $loan) {
          $customer_id = $loan->customer_id;
  
          $this->db->where('customer_id', $customer_id);
          $this->db->from('tbl_loans'); // change to your actual loans table name
          $loan->loan_count = $this->db->count_all_results();
      }
  
      $this->load->view('officer/loan_pending', [
          'loan_pending' => $loan_pending,
          'empl_data' => $empl_data,
          'privillage' => $privillage,
          'total_request' => $total_request
      ]);
  }
  

    public function loan_group_request(){
        $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);
    $privillage = $this->queries->get_position_empl($empl_id);


    $group_loan = $this->queries->get_loan_group_loan($blanch_id);
    $total_loan_group = $this->queries->get_total_loan_group($blanch_id);
    // echo "<pre>";
    // print_r($total_loan_group);
    //        exit();

    $this->load->view('officer/loan_group_request',['privillage'=>$privillage,'empl_data'=>$empl_data,'group_loan'=>$group_loan,'total_loan_group'=>$total_loan_group]);
    }

    public function print_loan_group_request(){
     $this->load->model('queries');
     $blanch_id = $this->session->userdata('blanch_id');
     $empl_id = $this->session->userdata('empl_id');
     $manager_data = $this->queries->get_manager_data($empl_id);
     $comp_id = $manager_data->comp_id;
     $compdata = $this->queries->get_companyData($comp_id);
     $group_loan = $this->queries->get_loan_group_loan($blanch_id);
     $total_loan_group = $this->queries->get_total_loan_group($blanch_id);
     $blanch_data = $this->queries->get_blanchData($blanch_id);
     
     $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4-L','orientation' => 'L', 'tempDir' => APPPATH . 'tmp/mpdf']);
     $html = $this->load->view('officer/loan_group_request_report',['group_loan'=>$group_loan,'compdata'=>$compdata,'total_loan_group'=>$total_loan_group,'blanch_data'=>$blanch_data],true);
     $mpdf->SetFooter('Generated By Brainsoft Technology');
     $mpdf->WriteHTML($html);
     $mpdf->Output();

     //$this->load->view('officer/loan_group_request_report',['group_loan'=>$group_loan,'compdata'=>$compdata,'total_loan_group'=>$total_loan_group,'blanch_data'=>$blanch_data]);
    }



    public function print_loan_request(){
     $this->load->model('queries');
     $blanch_id = $this->session->userdata('blanch_id');
     $empl_id = $this->session->userdata('empl_id');
     $manager_data = $this->queries->get_manager_data($empl_id);
     $comp_id = $manager_data->comp_id;
     $compdata = $this->queries->get_companyData($comp_id);
     $loan_pending = $this->queries->get_loanPendingBlanch($blanch_id);
     $total_request = $this->queries->get_total_loanPendingBlanch($blanch_id);
     $blanch_data = $this->queries->get_blanchData($blanch_id);
     // print_r($total_request);
     //            exit();
     $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4-L','orientation' => 'L', 'tempDir' => APPPATH . 'tmp/mpdf']);
     $html = $this->load->view('officer/loan_request_report',['compdata'=>$compdata,'loan_pending'=>$loan_pending,'total_request'=>$total_request,'blanch_data'=>$blanch_data],true);
     $mpdf->SetFooter('Generated By Brainsoft Technology');
     $mpdf->WriteHTML($html);
     $mpdf->Output();
    }




    public function manager_loanPending(){
      $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);

        $loan_pending = $this->queries->get_loanPending($comp_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $manager = $this->queries->get_position_manager($empl_id);
            //     echo "<pre>";
            // print_r($loan_pending);
            //     echo "<pre>";
                   // exit();
        $this->load->view('officer/loan_pending',['loan_pending'=>$loan_pending,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);  
    }

    // Branch Manager: view loans pending verification for their branch
    public function manager_verify_loans(){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $empl_data = $this->queries->get_employee_data($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);

        $loan_pending = $this->queries->get_loanPendingVerification($blanch_id);

        $this->load->view('officer/manager_verify_loans', [
            'loan_pending' => $loan_pending,
            'empl_data' => $empl_data,
            'privillage' => $privillage
        ]);
    }

    // Branch Manager: verify a single loan
    public function verify_loan($loan_id){
        $this->load->model('queries');
        $empl_id = $this->session->userdata('empl_id');
        $position_id = $this->session->userdata('position_id');

        // Check position is branch manager (position_id = 21)
        if ($position_id != '21') {
            $this->session->set_flashdata('error', 'You do not have permission to verify loans');
            return redirect('oficer/index');
        }

        $data = array(
            'verified_by' => $empl_id,
            'verified_at' => date('Y-m-d H:i:s'),
        );

        $updated = $this->queries->update_status($loan_id, $data);

        if ($updated) {
            $this->session->set_flashdata('massage', 'Loan verified successfully');
        } else {
            $this->session->set_flashdata('error', 'Verification failed');
        }

        return redirect('oficer/manager_verify_loans');
    }

    // Branch Manager: verify loan with edits from view_Dataloan form
    public function verify_loan_update($loan_id){
        $this->load->model('queries');
        $empl_id = $this->session->userdata('empl_id');
        $position_id = $this->session->userdata('position_id');

        // Check position is branch manager (position_id = 21)
        if ($position_id != '21') {
            $this->session->set_flashdata('error', 'You do not have permission to verify loans');
            return redirect('oficer/index');
        }

        $data = array(
            'verified_by' => $empl_id,
            'verified_at' => date('Y-m-d H:i:s'),
        );

        // Update editable fields if submitted
        if ($this->input->post('category_id') !== null) {
            $data['category_id'] = $this->input->post('category_id');
        }
        if ($this->input->post('day') !== null) {
            $data['day'] = $this->input->post('day');
        }
        if ($this->input->post('loan_aprove') !== null) {
            $data['loan_aprove'] = $this->input->post('loan_aprove');
        }
        if ($this->input->post('session') !== null) {
            $data['session'] = $this->input->post('session');
        }
        if ($this->input->post('reason') !== null) {
            $data['reason'] = $this->input->post('reason');
        }

        $updated = $this->queries->update_status($loan_id, $data);

        if ($updated) {
            $this->session->set_flashdata('massage', 'Loan verified and updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Verification failed');
        }

        return redirect('oficer/loan_pending');
    }


         public function view_Dataloan($customer_id,$comp_id){
         $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);

         $customer_data = $this->queries->get_loanData($customer_id,$comp_id);
         $loan_form = $this->queries->get_formloanData($customer_id,$comp_id);
         $loan_id = $loan_form->loan_id;
         $sponser_detail = $this->queries->get_sponser_by_loan($loan_id);
         if (empty($sponser_detail)) {
             $sponser_detail = $this->queries->get_sponser_data($customer_id, $comp_id);
         }
         $collateral = $this->queries->get_colateral_data($loan_id);
         $local_oficer = $this->queries->get_loacagovment_data($loan_id);
         $privillage = $this->queries->get_position_empl($empl_id);
         $loan_categories = $this->queries->get_loancategory($comp_id);
            //    echo "<pre>";
            // print_r(  $sponser_detail);
            //    echo "</pre>";
            //        exit();
        $this->load->view('officer/view_loan_customer',['customer_data'=>$customer_data,'sponser_detail'=>$sponser_detail,'loan_form'=>$loan_form,'collateral'=>$collateral,'local_oficer'=>$local_oficer,'empl_data'=>$empl_data,'privillage'=>$privillage,'loan_categories'=>$loan_categories]);
    }

      public function download_attach($attach_id){
        if(!empty($attach_id)){
            //load download helper
            $this->load->helper('download');
            $this->load->model('queries');
            //get file info from database
            $filedata = $this->queries->data_download(array('attach_id' => $attach_id));
            
            //file path
            $file = 'assets/img/'.$filedata['cont_attachment'];
            
            //download file from directory
            force_download($file, NULL);
        }
    }


    public function aprove_loan($loan_id){
      $this->load->helper('string');
      $this->load->model('queries');
    
      // Delete existing records for the loan_id from tbl_outstand
      $this->db->where('loan_id', $loan_id);
      $this->db->delete('tbl_outstand');
    
      // Get current datetime
      $day = date('Y-m-d H:i');
    
      // Get current approver's name from session
      $approved_by = isset($_SESSION['empl_name']) ? $_SESSION['empl_name'] : 'Unknown';
    
      // Prepare data for update
      $data = array(
        'loan_aprove'   => $this->input->post('loan_aprove'),
        'penat_status'  => $this->input->post('penat_status'),
        'loan_status'   => 'manager_approved',
        'loan_day'      => $day,
        'code'          => random_string('numeric',4),
        'approved_by'   => $approved_by, // <== NEW LINE
      );
    
      // Update loan record
      $updated = $this->queries->update_status($loan_id, $data);
    
      if ($updated) {
        $this->session->set_flashdata('massage', 'Loan Approved successfully');
      } else {
        $this->session->set_flashdata('error', 'Data failed!!');
      }
    
      return redirect('oficer/loan_pending');
    }


        public function reject_loan($loan_id){
    $this->load->model('queries');
    $data = $this->queries->get_loan_rejectData($loan_id);
    // print_r($data);
    //     exit();
    if ($data->loan_status = 'reject') {
        // print_r($data);
        //   exit();
        $this->queries->update_status($loan_id,$data);
        $this->session->set_flashdata('massage','Loan Rejected successfully');
    }
    return redirect('oficer/loan_pending');
 }

 public function get_loan_aproved(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $loan_aproved = $this->queries->get_loanAprovedBlanch($blanch_id);
    $privillage = $this->queries->get_position_empl($empl_id);
    $manager = $this->queries->get_position_manager($empl_id);
      //    echo "<pre>";
      //  print_r( $empl_data);
      //    echo "</pre>";
      //           exit();
    $this->load->view('officer/loan_aproved',['loan_aproved'=>$loan_aproved,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);

}

public function manager_loanAproved(){
  $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $loan_aproved = $this->queries->get_loanAproved($comp_id);
    $privillage = $this->queries->get_position_empl($empl_id);
    $manager = $this->queries->get_position_manager($empl_id);
       //   echo "<pre>";
       // print_r($loan_aproved);
       //   echo "</pre>";
       //          exit();
    $this->load->view('officer/loan_aproved',['loan_aproved'=>$loan_aproved,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]); 
}


public function disburse($loan_id){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $empl_data = $this->queries->get_employee_data($empl_id);
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
   
    $manager = $this->queries->get_position_manager($empl_id);

    //$admin_data = $this->queries->get_admin_role($comp_id);
    $loan_fee = $this->queries->get_loanfee($comp_id);
    $loan_data = $this->queries->get_loanDisbarsed($loan_id);
    $loan_data_interst = $this->queries->get_loanInterest($loan_id);
    $loan_fee_sum = $this->queries->get_sumLoanFee($comp_id);
    $total_loan_fee = $loan_fee_sum->total_fee;

       
        
      $loan_id = $loan_data->loan_id;
      $blanch_id = $loan_data->blanch_id;
      $comp_id = $loan_data->comp_id;
      $customer_id = $loan_data->customer_id;
      $balance = $loan_data->loan_aprove;
      $group_id = $loan_data->group_id;
      $loan_codeID = $loan_data->loan_code;
      $code = $loan_data->code;
      $comp_name = $loan_data->comp_name;
      $phones = $loan_data->phone_no;
      $day = $loan_data->day;
      $session = $loan_data->session;
      $end_date = $day * $session;
      //admin data
      $role = $empl_data->empl_name;

          // echo "<pre>";
          // print_r($role);
          // echo "<br>";
      $interest_loan = $loan_data_interst->interest_formular;
      if ($loan_data_interst->rate == 'FLAT RATE') {
      // $now = date("Y-m-d");
      // $someDate = DateTime::createFromFormat("Y-m-d",$now);
      // $someDate->add(new DateInterval('P'.$end_date.'D'));
      // $return_data = $someDate->format("Y-m-d");

      // $date1 = $now;
      // $date2 = $return_data;

      // $ts1 = strtotime($date1);
      // $ts2 = strtotime($date2);

      // $year1 = date('Y', $ts1);
      // $year2 = date('Y', $ts2);

      // $month1 = date('m', $ts1);
      // $month2 = date('m', $ts2);
      // $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
        $day_data = $end_date;
        $months = floor($day_data / 30);

      $interest = $interest_loan;
      $loan_interest = $interest /100 * $balance * $months;
      $total_loan = $balance + $loan_interest;
      }elseif($loan_data_interst->rate == 'SIMPLE'){
      $interest_loan = $loan_data_interst->interest_formular;
      $interest = $interest_loan;
      $loan_interest = $interest /100 * $balance;
      $total_loan = $balance + $loan_interest;
      }elseif($loan_data_interst->rate == 'REDUCING'){
       $months = $end_date / 30;
       $interest = $interest_loan / 1200;
       $loan = $balance;
       $amount = $interest * -$loan * pow((1 + $interest), $months) / (1 - pow((1 + $interest), $months));
       $total_loan = $amount * 1 * $months;
       $loan_interest = $total_loan - $loan;
       $res = $amount; 
      }
        //   echo "<pre>";
        //   print_r($total_loan);
        //   echo "<br>";
        //   print_r($loan_interest);
        //    echo "<br>";
        // print_r($res);
        //   exit();
      $loan_fee_type = $this->queries->get_loanfee_type($comp_id);
      $type = $loan_fee_type->type;
      $this->insert_loan_aprovedDisburse($comp_id,$loan_id,$customer_id,$blanch_id,$balance,$role,$group_id);
      $unchangable_balance = $balance;
     if ($type == 'PERCENTAGE VALUE') {
      for ($i=0; $i<count($loan_fee); $i++) { 
        $interest = $loan_fee[$i]->fee_interest;
        $fee_description = $loan_fee[$i]->description;
        $fee_number = $loan_fee[$i]->fee_interest;
        $withdraw_balance = $unchangable_balance * ($interest / 100);

        $new_balance = $balance - $withdraw_balance;
        $pay_id = $this->insert_loanfee($loan_fee[$i]->fee_id,$loan_fee[$i]->fee_interest,$loan_fee[$i]->description,$loan_fee[$i]->fee_interest,$loan_id,$blanch_id,$comp_id,$customer_id,$new_balance, $withdraw_balance,$group_id);
     //Update Balance in this Loop
        $balance = $new_balance;   
    }
   }elseif ($type == 'MONEY VALUE') {
     for ($i=0; $i<count($loan_fee); $i++) { 
        $interest = $loan_fee[$i]->fee_interest;
        $fee_description = $loan_fee[$i]->description;
        $fee_number = $loan_fee[$i]->fee_interest;
        $withdraw_balance = $interest;

        
        $new_balance = $balance - $withdraw_balance;
        $pay_id = $this->insert_loanfee_money($loan_fee[$i]->fee_id,$loan_fee[$i]->fee_interest,$loan_fee[$i]->description,$loan_fee[$i]->fee_interest,$loan_id,$blanch_id,$comp_id,$customer_id,$new_balance, $withdraw_balance,$group_id);

     //Update Balance in this Loop
        $balance = $new_balance;   
    }
   }
           $this->insert_loan_lecord($comp_id,$customer_id,$loan_id,$blanch_id,$total_loan,$loan_interest,$group_id);
           $this->update_loaninterest($pay_id,$total_loan);
           //$this->sendsms($phone,$massage);
           $this->aprove_disbas_status($loan_id);
           if($manager->position_id == '21'){
          return redirect('oficer/manager_loanPending');      
         }else{
        return redirect('oficer/get_loan_aproved'); 
         }
        }

         
        public function insert_loan_aprovedDisburse($comp_id,$loan_id,$customer_id,$blanch_id,$balance,$role,$group_id){
        $day = date("Y-m-d");
      $this->db->query("INSERT INTO tbl_pay (`comp_id`,`loan_id`,`customer_id`,`blanch_id`,`balance`,`depost`,`emply`,`description`,`date_data`,`group_id`) VALUES ('$comp_id','$loan_id', '$customer_id','$blanch_id','$balance','$balance','$role','CASH DEPOST','$day','$group_id')");
      }


          public function insert_loanfee($loan_fee,$interest,$fee_description,$fee_number,$loan_id,$blanch_id,$comp_id,$customer_id,$new_balance, $withdraw_balance,$group_id){
    $date = date("Y-m-d");
  $this->db->query("INSERT INTO tbl_pay (`fee_id`,`fee_desc`,`fee_percentage`,`loan_id`,`blanch_id`,`comp_id`,`customer_id`,`balance`,`withdrow`,`p_today`,`emply`,`symbol`,`date_data`,`group_id`) VALUES ('$loan_fee','$fee_description','$fee_number','$loan_id','$blanch_id','$comp_id','$customer_id','$new_balance','$withdraw_balance','$date','SYSTEM WITHDRAWAL','%','$date','$group_id')");
   return $this->db->insert_id();
      }

    public function insert_loanfee_money($loan_fee,$interest,$fee_description,$fee_number,$loan_id,$blanch_id,$comp_id,$customer_id,$new_balance, $withdraw_balance,$group_id){
    $date = date("Y-m-d");
    $this->db->query("INSERT INTO tbl_pay (`fee_id`,`fee_desc`,`fee_percentage`,`loan_id`,`blanch_id`,`comp_id`,`customer_id`,`balance`,`withdrow`,`p_today`,`emply`,`symbol`,`group_id`,`date_data`) VALUES ('$loan_fee','$fee_description','$fee_number','$loan_id','$blanch_id','$comp_id','$customer_id','$new_balance','$withdraw_balance','$date','SYSTEM WITHDRAWAL','Tsh','$group_id','$date')");
   return $this->db->insert_id();
      }



         //update loan + interest in pay table
    public function update_loaninterest($pay_id,$total_loan){
  $sqldata="UPDATE `tbl_pay` SET `interest_loan`= '$total_loan' WHERE `pay_id`= '$pay_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
   return true;
}


      public function insert_loan_lecord($comp_id,$customer_id,$loan_id,$blanch_id,$total_loan,$loan_interest,$group_id){
        $day = date("Y-m-d");
      $this->db->query("INSERT INTO tbl_prev_lecod (`comp_id`,`customer_id`,`loan_id`,`blanch_id`,`total_loan`,`total_int`,`lecod_day`,`group_id`) VALUES ('$comp_id', '$customer_id','$loan_id','$blanch_id','$total_loan','$loan_interest','$day','$group_id')");
      }




      public function aprove_disbas_status($loan_id){
            //Prepare array of user data
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $manager = $this->queries->get_position_manager($empl_id);

        $loan_data = $this->queries->get_loanInterest($loan_id);
        $loan_datas = $this->queries->get_loanDisbarsed($loan_id);
        $loan_fee_sum = $this->queries->get_sumLoanFee($comp_id);
        $total_loan_fee = $loan_fee_sum->total_fee;

        //sms count function
        @$smscount = $this->queries->get_smsCountDate($comp_id);
        $sms_number = @$smscount->sms_number;
        $sms_id = @$smscount->sms_id;
           //echo "<pre>";
        // print_r($loan_data);
        //             exit();
        $interest_loan = $loan_data->interest_formular;
        $loan_aproved = $loan_data->loan_aprove;
        $session_loan = $loan_data->session;
        $day = $loan_data->day;
        $loan_codeID = $loan_data->loan_code;
        $code = $loan_data->code;
        $comp_name = $loan_datas->comp_name;
        $phones = $loan_datas->phone_no;
        $comp_phone = $loan_datas->comp_phone;
        $balance = $loan_aproved;
        $end_date = $day * $session_loan;
        if ($loan_data->rate == 'FLAT RATE'){
        // $now = date("Y-m-d");
        // $someDate = DateTime::createFromFormat("Y-m-d",$now);
        // $someDate->add(new DateInterval('P'.$end_date.'D'));
        // $return_data = $someDate->format("Y-m-d");

        // $date1 = $now;
        // $date2 = $return_data;

        // $ts1 = strtotime($date1);
        // $ts2 = strtotime($date2);

        // $year1 = date('Y', $ts1);
        // $year2 = date('Y', $ts2);

        // $month1 = date('m', $ts1);
        // $month2 = date('m', $ts2);

        // $diff = (($year2 - $year1) * 12) + ($month2 - $month1);

        $day_data = $end_date;
        $months = floor($day_data / 30);

        $interest = $interest_loan;
        $loan_interest = $interest /100 * $loan_aproved * $months;

        $total_loan = $loan_aproved + $loan_interest; 

        $restoration = ($loan_interest + $loan_aproved) / ($session_loan);
        $res = $restoration;
    }elseif($loan_data->rate == 'SIMPLE') {
        $interest = $interest_loan;
        $loan_interest = $interest /100 * $loan_aproved;
        $total_loan = $loan_aproved + $loan_interest; 
        $restoration = ($loan_interest + $loan_aproved) / ($session_loan);
        $res = $restoration;
    }elseif($loan_data->rate == 'REDUCING'){
       $months = $end_date / 30;
       $interest = $interest_loan / 1200;
       $loan = $balance;
       $amount = $interest * -$loan * pow((1 + $interest), $months) / (1 - pow((1 + $interest), $months));
       $total_loan = $amount * 1 * $months;
       $loan_interest = $total_loan - $loan;
       $res = $amount;   
    }
             // print_r($total_loan);
             //     echo "<br>";
             //  print_r($loan_interest);
             //     echo "<br>";
             //  print_r($res);
             //         exit();
        $day = date('Y-m-d H:i');
        $day_data = date('Y-m-d H:i');
            $data = array(
            'loan_status'=> 'disbarsed',
            'loan_day' => $day,
            'loan_int' => $total_loan,
            'disburse_day' => $day_data,
            'dis_date' => $day_data,
            'restration' => $res,
           
            );
            //   echo "<pre>";
            // print_r($data);
            //  echo "</pre>";
            //   exit();

          //data inorder to send sms
      $fee_type = $this->queries->get_loanfee_type($comp_id);
      //$type = $fee_type->type;
       if ($fee_type->type == 'MONEY VALUE') {
       $remain_balance = $loan_aproved - $total_loan_fee;
       }elseif ($fee_type->type == 'PERCENTAGE VALUE') {
        $sms_data = $total_loan_fee /100 * $loan_aproved;
        $remain_balance = $loan_aproved - $sms_data;
       }

      // $sms = $comp_name.' Imeingiza Mkopo Kiasi cha Tsh.'.$remain_balance.' kwenye Acc Yako ' . $loan_codeID .' Kwa msaada zaidi Piga simu Namba '.$comp_phone;
      // $massage = $sms;
      // $phone = $phones;
              //  print_r($massage);
              //       exit();
            //Pass user data to model
            $data = $this->queries->update_status($loan_id,$data);
            
            //Storing insertion status message.
            if($data){
             if (@$smscount->sms_number == TRUE) {
                $new_sms = 1;
                $total_sms = @$sms_number + $new_sms;
                $this->update_count_sms($comp_id,$total_sms,$sms_id);
              }elseif (@$smscount->sms_number == FALSE) {
             $sms_number = 1;
             $this->insert_count_sms($comp_id,$sms_number);
             }
             
                //$this->sendsms($phone,$massage);
                $this->session->set_flashdata('massage','Loan disbarsed successfully');
            }else{
                $this->session->set_flashdata('error','Data failed!!');
            }
            if($manager->position_id == '21'){

            return redirect('oficer/manager_loanPending');
        }else{
        return redirect('oficer/get_loan_aproved');  
        }
    }




    public function disburse_lonnottfee($loan_id){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $manager = $this->queries->get_position_manager($empl_id);

        //$admin_data = $this->queries->get_admin_role($comp_id);

        $disbursed_data = $this->queries->get_loanDisbarsed($loan_id);
        $loan_data_interst = $this->queries->get_loanInterest($loan_id);
        $int_loan = $loan_data_interst->interest_formular;
         $loan_id = $disbursed_data->loan_id;
         $comp_id = $disbursed_data->comp_id;
         $blanch_id = $disbursed_data->blanch_id;
         $customer_id = $disbursed_data->customer_id;
         $balance = $disbursed_data->loan_aprove;
         $group_id = $disbursed_data->group_id;
         $loan_codeID = $disbursed_data->loan_code;
         $code = $disbursed_data->code;
         $comp_name = $disbursed_data->comp_name;
         $phones = $disbursed_data->phone_no;
         $day = $disbursed_data->day;
         $session = $disbursed_data->session;
         $deposit = $balance;
         $remain_balance = $balance;
         $end_date = $day * $session;


         $fee_category = $this->queries->get_loanfee_categoryData($comp_id);
         $category_fee = $fee_category->fee_category;
         
         $loan_category = $this->queries->get_loanproduct_fee($loan_id);
         $fee_category_type = $loan_category->fee_category_type;
         $fee_value = $loan_category->fee_value;
         
         if ($fee_category_type == 'MONEY') {
          $symbol = "Tsh";
          $with_fee = $fee_value;
          $cash_aprove = $balance - $fee_value;
         }elseif ($fee_category_type == 'PERCENTAGE') {
         $symbol = "%";
         $with_fee = $balance * ($fee_value / 100);
         $cash_aprove = $balance -  $balance * ($fee_value / 100);
         }


         if ($loan_data_interst->rate == 'FLAT RATE') {
         // $now = date("Y-m-d");
         // $someDate = DateTime::createFromFormat("Y-m-d",$now);
         // $someDate->add(new DateInterval('P'.$end_date.'D'));
         // $return_data = $someDate->format("Y-m-d");

         // $date1 = $now;
         // $date2 = $return_data;

         // $ts1 = strtotime($date1);
         // $ts2 = strtotime($date2);

         // $year1 = date('Y', $ts1);
         // $year2 = date('Y', $ts2);

         // $month1 = date('m', $ts1);
         // $month2 = date('m', $ts2);

         // $diff = (($year2 - $year1) * 12) + ($month2 - $month1);

        $day_data = $end_date;
        $months = floor($day_data / 30);


         $interest_loan = $loan_data_interst->interest_formular;
         $interest = $interest_loan;
         $loan_interest = $interest /100 * $deposit * $months;
         $total_loan = $deposit + $loan_interest;
         }elseif($loan_data_interst->rate == 'SIMPLE'){
          $interest_loan = $loan_data_interst->interest_formular;
         $interest = $interest_loan;
         $loan_interest = $interest /100 * $deposit;
         $total_loan = $deposit + $loan_interest;  
         }elseif($loan_data_interst->rate == 'REDUCING'){
          $months = $end_date / 30;
          $interest = $int_loan / 1200;
          $loan = $balance;
          $amount = $interest * -$loan * pow((1 + $interest), $months) / (1 - pow((1 + $interest), $months));
          $total_loan = $amount * 1 * $months;
          $loan_interest = $total_loan - $loan;
          $res = $amount; 
         }

          // print_r($total_loan);
          //      echo "<br>";
          // print_r($loan_interest);
          //      echo "<br>";
          // print_r($res);
          //     exit();
         //admin role
         $role = $empl_data->username;

        //  $sms = 'Taasisi ya '.$comp_name.' Imeingiza Mkopo Kiasi cha Tsh.'.$remain_balance.' kwenye Acc Yako ' . $loan_codeID .' Namba ya siri ya kutolea mkopo ni '.$code;
        //  $massage = $sms;
        //  $phone = $phones;
           
      $fee_description = "Loan Processing Fee";
      $loan_fee = "0";
      if ($category_fee == 'LOAN PRODUCT') {
       echo "hapa nimakato ya kila loan product"; 
       $pay_id = $this->insert_loan_aprovedDisburse($comp_id,$loan_id,$customer_id,$blanch_id,$balance,$role,$group_id);
       $this->insert_loanfee_money_feetype($loan_fee,$fee_description,$fee_value,$loan_id,$blanch_id,$comp_id,$customer_id,$cash_aprove,$group_id,$symbol,$with_fee);
      }elseif($category_fee == 'GENERAL') {
         //echo "hapa nimakato ya loan fee general";
       $pay_id = $this->insert_loan_aprovedDisburse($comp_id,$loan_id,$customer_id,$blanch_id,$balance,$role,$group_id);
      }
      //exit();
           $this->update_loaninterest($pay_id,$total_loan);
           $this->insert_loan_lecord($comp_id,$customer_id,$loan_id,$blanch_id,$total_loan,$loan_interest,$group_id);
           $this->aprove_disbas_statusNotloanfee($loan_id);
            if($manager->position_id == '21'){
           return redirect('oficer/manager_loanPending');
       }else{
         return redirect('oficer/get_loan_aproved');
       }

    }


     public function insert_loanfee_money_feetype($loan_fee,$fee_description,$fee_value,$loan_id,$blanch_id,$comp_id,$customer_id,$cash_aprove,$group_id,$symbol,$with_fee){
    $date = date("Y-m-d");
    $this->db->query("INSERT INTO tbl_pay (`fee_id`,`fee_desc`,`fee_percentage`,`loan_id`,`blanch_id`,`comp_id`,`customer_id`,`balance`,`withdrow`,`p_today`,`emply`,`symbol`,`group_id`,`date_data`) VALUES ('$loan_fee','$fee_description','$fee_value','$loan_id','$blanch_id','$comp_id','$customer_id','$cash_aprove','$with_fee','$date','SYSTEM WITHDRAWAL','$symbol','$group_id','$date')");
   return $this->db->insert_id();
      }

    public function aprove_disbas_statusNotloanfee($loan_id){
            //Prepare array of user data
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $manager = $this->queries->get_position_manager($empl_id);

        $loan_data = $this->queries->get_loanInterest($loan_id);
        $loan_datas = $this->queries->get_loanDisbarsed($loan_id);
        $loan_fee_sum = $this->queries->get_sumLoanFee($comp_id);
        $total_loan_fee = $loan_fee_sum->total_fee;

        $loan_payTable = $this->queries->get_remain_balance_inpay($loan_id);
        $remain_makato = $loan_payTable->balance;

         //sms count function
        @$smscount = $this->queries->get_smsCountDate($comp_id);
        $sms_number = @$smscount->sms_number;
        $sms_id = @$smscount->sms_id;
           //echo "<pre>";
        // print_r($loan_data);
        //             exit();
        $interest_loan = $loan_data->interest_formular;
        $loan_aproved = $loan_data->loan_aprove;
        $session_loan = $loan_data->session;
        $day = $loan_data->day;
        $loan_codeID = $loan_data->loan_code;
        $code = $loan_data->code;
        $comp_name = $loan_datas->comp_name;
        $comp_phone = $loan_datas->comp_phone;
        $phones = $loan_datas->phone_no;
        $balance = $loan_aproved;
        $end_date = $day * $session_loan;
        if ($loan_data->rate == 'FLAT RATE') {
        // $now = date("Y-m-d");
        // $someDate = DateTime::createFromFormat("Y-m-d",$now);
        // $someDate->add(new DateInterval('P'.$end_date.'D'));
        // $return_data = $someDate->format("Y-m-d");


        // $date1 = $now;
        // $date2 = $return_data;

        // $ts1 = strtotime($date1);
        // $ts2 = strtotime($date2);

        // $year1 = date('Y', $ts1);
        // $year2 = date('Y', $ts2);

        // $month1 = date('m', $ts1);
        // $month2 = date('m', $ts2);

        // $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
        $day_data = $end_date;
        $months = floor($day_data / 30);
           
        $interest = $interest_loan;
        $loan_interest = $interest /100 * $loan_aproved * $months;

        $total_loan = $loan_aproved + $loan_interest; 

        $restoration = ($loan_interest + $loan_aproved) / ($session_loan);
        $res = $restoration;
         }elseif($loan_data->rate == 'SIMPLE') {
        $interest = $interest_loan;
        $loan_interest = $interest /100 * $loan_aproved;
        $total_loan = $loan_aproved + $loan_interest; 
        $restoration = ($loan_interest + $loan_aproved) / ($session_loan);
        $res = $restoration;
         }elseif($loan_data->rate == 'REDUCING'){
        $months = $end_date / 30;
        $interest = $interest_loan / 1200;
        $loan = $loan_aproved;
        $amount = $interest * -$loan * pow((1 + $interest), $months) / (1 - pow((1 + $interest), $months));
        $total_loan = $amount * 1 * $months;
        $res = $amount;  
         }
         //print_r($total_loan);
                //echo "<br>";
            // print_r($res);
                // echo "<br>";
             //print_r($session_loan);
                     //exit();
        $day = date('Y-m-d H:i');
        $day_data = date('Y-m-d H:i');
            $data = array(
            'loan_status'=> 'disbarsed',
            'loan_day' => $day,
            'loan_int' => $total_loan,
            'disburse_day' => $day_data,
            'dis_date' => $day_data,
            'restration' => $res,
           
            );
            //   echo "<pre>";
            // print_r($data);
            //  echo "</pre>";
            //   exit();

             //data inorder to send sms
      // $sms_data = $total_loan_fee /100 * $balance;
      // $remain_balance = $balance - $sms_data;

      // $sms = 'Taasisi ya '.$comp_name.' Imeingiza Mkopo Kiasi cha Tsh.'.$remain_makato.' kwenye Acc Yako ' . $loan_codeID . 'Kwa msaada zaidi Piga Simu Namba'.$comp_phone;
      // $massage = $sms;
      // $phone = $phones;
               // print_r($massage);
               //      exit();
            //Pass user data to model
            $data = $this->queries->update_status($loan_id,$data);
            
            //Storing insertion status message.
            if($data){
             if (@$smscount->sms_number == TRUE) {
                $new_sms = 1;
                $total_sms = @$sms_number + $new_sms;
                $this->update_count_sms($comp_id,$total_sms,$sms_id);
              }elseif (@$smscount->sms_number == FALSE) {
             $sms_number = 1;
             $this->insert_count_sms($comp_id,$sms_number);
             }
                //$this->sendsms($phone,$massage);
                $this->session->set_flashdata('massage','Loan disbarsed successfully');
            }else{
                $this->session->set_flashdata('error','Data failed!!');
            }
             if($manager->position_id == '21'){
            return redirect('oficer/manager_loanPending');
        }else{
          return redirect('oficer/get_loan_aproved');  
        }
    }




     public function disburse_loan(){
      // $position   = strtoupper($this->session->userdata('position_name'));
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);

        $disburse = $this->queries->get_DisbarsedLoanBlanch($blanch_id);
        $total_loanDis = $this->queries->get_sum_loanDisbursedBlanch($blanch_id);
        $total_interest_loan = $this->queries->get_sum_loanDisburse_interestBlanch($blanch_id);
        $privillage = $this->queries->get_position_empl($empl_id);

       

      //   if ($position === 'LOAN OFFICER') {
      //     $disburse = $this->queries->get_DisbarsedLoanByOfficer($empl_id);

      //       // print_r($disburse);
      //       //         exit();
      
      //     // Calculate totals for this officer
      //     $total_loan = 0;
      //     $total_interest = 0;
      //     foreach ($disburse as $loan) {
      //         $total_loan += $loan->loan_aprove;
      //         $total_interest += $loan->loan_int;
      //     }
      //     $total_loanDis = (object)['total_loan' => $total_loan];
      //     $total_interest_loan = (object)['total_loan_int' => $total_interest];
      
      // } elseif ($position === 'BRANCH MANAGER') {
      //     $disburse = $this->queries->get_DisbarsedLoanBlanch($blanch_id);
          $total_loanDis = $this->queries->get_sum_loanDisbursedBlanch($blanch_id);
          $total_interest_loan = $this->queries->get_sum_loanDisburse_interestBlanch($blanch_id);
      // } else {
      //     $disburse = [];
      //     $total_loanDis = (object)['total_loan' => 0];
      //     $total_interest_loan = (object)['total_loan_int' => 0];
      // }
      

            // echo "<pre>";
            // print_r( $disburse);
            // echo "</pre>";
            //     exit();
        $this->load->view('officer/disburse_loan',['disburse'=>$disburse,'total_loanDis'=>$total_loanDis,'total_interest_loan'=>$total_interest_loan,'empl_data'=>$empl_data,'privillage'=>$privillage]);
    }

    public function manager_loandisbursed(){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);

        $disburse = $this->queries->get_DisbarsedLoan($comp_id);
        $total_loanDis = $this->queries->get_sum_loanDisbursed($comp_id);
        $total_interest_loan = $this->queries->get_sum_loanDisburse_interest($comp_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $manager = $this->queries->get_position_manager($empl_id);
            // echo "<pre>";
            // print_r($total_interest_loan);
            // echo "</pre>";
            //     exit();
        $this->load->view('officer/disburse_loan',['disburse'=>$disburse,'total_loanDis'=>$total_loanDis,'total_interest_loan'=>$total_interest_loan,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]); 
    }


     public function all_loan_lejected(){
    $this->load->model('queries');
   $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $loan_reject = $this->queries->get_loan_rejectBlanch($blanch_id);
    $privillage = $this->queries->get_position_empl($empl_id);
       //  echo "<pre>";
       // print_r($loan_reject);
       //         exit();
    $this->load->view('officer/loan_rejected',['loan_reject'=>$loan_reject,'empl_data'=>$empl_data,'privillage'=>$privillage]);
 }

 public function manager_loanRejected(){
  $this->load->model('queries');
   $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $loan_reject = $this->queries->get_loan_reject($comp_id);
    $privillage = $this->queries->get_position_empl($empl_id);
    $manager = $this->queries->get_position_manager($empl_id);
       //  echo "<pre>";
       // print_r($loan_reject);
       //         exit();
    $this->load->view('officer/loan_rejected',['loan_reject'=>$loan_reject,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);  
 }


 public function delete_loan($loan_id){
    $this->load->model('queries');
    if($this->queries->remove_loan($loan_id));
    $this->session->set_flashdata('massage','Loan Deleted successfully');
    return redirect('oficer/loan_pending');
 }

 public function delete_loanReject($loan_id){
    $this->load->model('queries');
    if($this->queries->remove_loan($loan_id));
    $this->session->set_flashdata('massage','Loan Deleted successfully');
    return redirect('oficer/all_loan_lejected');
 }


 public function loanpending_groups(){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);

        $group = $this->queries->get_groupDataBlanchData($blanch_id);
        $privillage = $this->queries->get_position_empl($empl_id);
          // print_r($group);
          //      exit();
        $this->load->view('officer/loan_grouppending',['group'=>$group,'empl_data'=>$empl_data,'privillage'=>$privillage]);
    }


     public function  view_customer_group($group_id,$blanch_id){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);

        $customer_group = $this->queries->get_customergroupdataBlanch($group_id,$blanch_id);
        $loan_pending = $this->queries->get_loanGroupBlanch($group_id,$blanch_id);
        $group_data = $this->queries->get_groupDataone($group_id);
        $privillage = $this->queries->get_position_empl($empl_id);
           //  echo "<pre>";
           // print_r($group_data);
           //  echo "</pre>";
           //      exit();
        $this->load->view('officer/loan_customer_group',['customer_group'=>$customer_group,'loan_pending'=>$loan_pending,'group_data'=>$group_data,'empl_data'=>$empl_data,'privillage'=>$privillage]);
    }


      public function parsonal_pending_loan(){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);

        $personal = $this->queries->get_parsonalloan_pendingBlanch($blanch_id);
        $privillage = $this->queries->get_position_empl($empl_id);
            //  echo "<pre>";
            // print_r($personal);
            //  echo "</pre>";
            //    exit();
        $this->load->view('officer/personal_pandingloan',['personal'=>$personal,'privillage'=>$privillage]);
    }

    public function manager_personal_loan(){
       $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);

        $personal = $this->queries->get_parsonalloan_pending($comp_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $manager = $this->queries->get_position_manager($empl_id);
            //  echo "<pre>";
            // print_r($personal);
            //  echo "</pre>";
            //    exit();
        $this->load->view('officer/personal_pandingloan',['personal'=>$personal,'privillage'=>$privillage,'manager'=>$manager]);  
    }


     public function loan_withdrawal(){
        $this->load->model('queries');
        // $position = strtoupper($this->session->userdata('position_name'));
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);

        // Date range filter from GET params
        $from_date = $this->input->get('from_date') ?: '';
        $to_date   = $this->input->get('to_date')   ?: '';
        $filter_month = $this->input->get('filter_month') ?: '';

        // Monthly shortcut: if month selected, derive from/to from that month
        if (!empty($filter_month) && preg_match('/^\d{4}-\d{2}$/', $filter_month)) {
          $from_date = $filter_month . '-01';
          $to_date = date('Y-m-t', strtotime($from_date));
        }

        $filters = [
          'blanch_id' => $blanch_id,
          'exclude_loan_status' => 'disbarsed',
          'group_by_customer' => true,
        ];
        if ($from_date && $to_date) {
            $filters['from'] = $from_date;
            $filters['to']   = $to_date;
        }

        $total_loanDis = $this->queries->get_sum_loanwithdrawal_dataBlanch($blanch_id);
       
        $privillage = $this->queries->get_position_empl($empl_id);
        $manager = $this->queries->get_position_manager($empl_id);

        $disburse = $this->queries->get_withdrawal_Loan($comp_id, $filters);
        $disburse_grouped = $this->queries->get_grouped_withdrawal_LoanBlanch($blanch_id);
        $total_interest_loan = $this->queries->get_sum_withdrawal_by_branch($blanch_id);

        $this->load->view('officer/loan_withdrawal',[
          'disburse' => $disburse,
          'disburse_grouped' => $disburse_grouped ?: [],
          'total_loanDis' => $total_loanDis,
          'total_interest_loan' => $total_interest_loan,
          'company_data' => $company_data,
          'empl_data' => $empl_data,
          'privillage' => $privillage,
          'manager' => $manager,
          'from_date' => $from_date,
          'to_date'   => $to_date,
          'filter_month' => $filter_month,
        ]);
    }

    public function delete_loanDisbursed($loan_id){
        ini_set("max_execution_time", 3600);
        $this->load->model('queries');
        if($this->queries->remove_loandisbursed($loan_id));
           $this->delete_from_tbl_pay($loan_id);
           $this->delete_from_Deposttable($loan_id);
           $this->delete_from_prevlecod($loan_id);
           $this->delete_from_reciveTable($loan_id);
           $this->delete_storePenart($loan_id);
           $this->delete_storePenart($loan_id);
           $this->delete_payPenartTable($loan_id);
           $this->delete_outstandLoan($loan_id);
           $this->delete_loanPending($loan_id);
           $this->delete_customer_report($loan_id);
           $this->delete_outstand($loan_id);
        $this->session->set_flashdata("massage",'Loan Deleted successfully');
        return redirect('oficer/loan_withdrawal');
    }
    //delete from paytble
    public function delete_from_tbl_pay($loan_id){
        return $this->db->delete('tbl_pay',['loan_id'=>$loan_id]);
    }
    public function delete_from_Deposttable($loan_id){
        return $this->db->delete('tbl_depost',['loan_id'=>$loan_id]);
    }

    public function delete_from_prevlecod($loan_id){
        return $this->db->delete('tbl_prev_lecod',['loan_id'=>$loan_id]);
    }

    public function delete_from_reciveTable($loan_id){
        return $this->db->delete('tbl_receve',['loan_id'=>$loan_id]);
    }

    public function delete_storePenart($loan_id){
        return $this->db->delete('tbl_store_penalt',['loan_id'=>$loan_id]);
    }

    public function delete_payPenartTable($loan_id){
        return $this->db->delete('tbl_pay_penart',['loan_id'=>$loan_id]);
    }

    public function delete_outstandLoan($loan_id){
        return $this->db->delete('tbl_outstand_loan',['loan_id'=>$loan_id]);
    }

    public function delete_loanPending($loan_id){
        return $this->db->delete('tbl_loan_pending',['loan_id'=>$loan_id]);
    }

    public function delete_customer_report($loan_id){
        return $this->db->delete('tbl_customer_report',['loan_id'=>$loan_id]);
    }

    public function delete_outstand($loan_id){
        return $this->db->delete('tbl_outstand',['loan_id'=>$loan_id]);
    }

    public function customer_loan_detail($customer_id)
    {
      $this->load->model('queries');
      $empl_id = $this->session->userdata('empl_id');
      $manager_data = $this->queries->get_manager_data($empl_id);
      $comp_id = !empty($manager_data->comp_id) ? (int)$manager_data->comp_id : (int)$this->session->userdata('comp_id');
      $officer_blanch_id = !empty($manager_data->blanch_id) ? (int)$manager_data->blanch_id : (int)$this->session->userdata('blanch_id');

      if (!$comp_id) {
        return redirect('welcome/employee_login');
      }

      $customer_id = (int)$customer_id;
      $customer = $this->queries->search_CustomerID($customer_id, $comp_id);
      if (!$customer || (int)($customer->blanch_id ?? 0) !== $officer_blanch_id) {
        $this->session->set_flashdata('error', 'Customer not found');
        return redirect('oficer/loan_withdrawal');
      }

      $customer_loans_raw = $this->queries->get_loan_customer($customer_id);
      $customer_loans = array_values(array_filter($customer_loans_raw, function ($loan) use ($officer_blanch_id, $comp_id) {
        return (int)($loan->blanch_id ?? 0) === $officer_blanch_id
          && (int)($loan->comp_id ?? 0) === (int)$comp_id;
      }));

      $this->load->view('officer/customer_loan_detail', [
        'customer' => $customer,
        'customer_loans' => $customer_loans,
      ]);
    }


    public function manager_loanWithdrawal(){
         $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);

        $disburse = $this->queries->get_withdrawal_Loan($comp_id, ['blanch_id' => $blanch_id]);
        $disburse_grouped = $this->queries->get_grouped_withdrawal_LoanBlanch($blanch_id);
          
        $total_loanDis = $this->queries->get_sum_loanwithdrawal_dataBlanch($blanch_id);
        $total_interest_loan = $this->queries->get_sum_loanwithdrawal_interestBlanch($blanch_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $manager = $this->queries->get_position_manager($empl_id);
           //    echo "<pre>";
           // print_r($disburse);
           //            exit();

        $this->load->view('officer/loan_withdrawal',[
          'disburse' => $disburse,
          'disburse_grouped' => $disburse_grouped ?: [],
          'total_loanDis' => $total_loanDis,
          'total_interest_loan' => $total_interest_loan,
          'empl_data' => $empl_data,
          'privillage' => $privillage,
          'manager' => $manager
        ]);

    }


        public function teller_dashboard(){
          // $position = strtoupper($this->session->userdata('position_name'));
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);

        $float = $this->queries->get_today_floatBlanch($blanch_id);
        $depost = $this->queries->get_sumTodayDepostBlanch($blanch_id);
        $withdraw = $this->queries->get_sumTodayWithdrawalBlanch($blanch_id);
        $privillage = $this->queries->get_position_empl($empl_id);

     

// if ($position === 'LOAN OFFICER') {
    
//   $customer = $this->queries->get_allcustomer_by_officer($blanch_id, $empl_id);

// } elseif ($position === 'BRANCH MANAGER') {

  $customer = $this->queries->get_allcutomerBlanch($blanch_id);
// } else {
//   $customer=[];
// }


          // echo "<pre>";
          // print_r($customer);
          //   exit();
        $this->load->view('officer/teller_dashboard',['float'=>$float,'depost'=>$depost,'withdraw'=>$withdraw,'customer'=>$customer,'empl_data'=>$empl_data,'privillage'=>$privillage]);
    }


    public function manager_tellerdashboard(){
      $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);

        $float = $this->queries->get_today_floatBlanch($blanch_id);
        $depost = $this->queries->get_sumTodayDepostBlanch($blanch_id);
        $withdraw = $this->queries->get_sumTodayWithdrawalBlanch($blanch_id);
        $customer = $this->queries->get_allcustomerDatagroup($comp_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $manager = $this->queries->get_position_manager($empl_id);
          // echo "<pre>";
          // print_r($customer);
          //   exit();
        $this->load->view('officer/teller_dashboard',['float'=>$float,'depost'=>$depost,'withdraw'=>$withdraw,'customer'=>$customer,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);  
    }



    public function search_customerData(){
    // $position = strtoupper($this->session->userdata('position_name'));
    $this->load->model('Queries', 'queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    
    $customer_id = $this->input->post('customer_id');
    $comp_id = $this->input->post('comp_id');
    $customer = $this->queries->search_CustomerLoan($customer_id);
    @$customer_id = $customer->customer_id;
    @$blanch_id = $customer->blanch_id;
    $acount = $this->queries->get_customer_account_verfied($blanch_id);
    
    $deposts = $this->queries->get_sumTodayDepostBlanch($blanch_id);
    $withdraw = $this->queries->get_sumTodayWithdrawalBlanch($blanch_id);
    $blanch_amount_balance = $this->queries->get_blanch_capital_data($blanch_id);
    $privillage = $this->queries->get_position_empl($empl_id);

  //   if ($position === 'LOAN OFFICER') {
  //     $customery = $this->queries->get_allcutomerblanchData_by_officer($blanch_id, $empl_id);
      
  
  // } elseif ($position === 'BRANCH MANAGER') {
    
    $customery = $this->queries->get_allcutomerblanchData($blanch_id);
  
  // } else {
  //   $customery = [];
    
  // }


   
   $this->load->view('officer/search_loan_customer',['customer'=>$customer,'blanch_amount_balance'=>$blanch_amount_balance,'deposts'=>$deposts,'withdraw'=>$withdraw,'acount'=>$acount,'empl_data'=>$empl_data,'customery'=>$customery,'privillage'=>$privillage]);
}


public function send_payment($customer_id)
{
    $this->load->model('queries');

    // Pata data za customer
    $customer_data = $this->queries->get_customerData($customer_id);

    if (!$customer_data) {
        $this->session->set_flashdata('error', 'Mteja haipo.');
        redirect('customer/list');
        return;
    }

    $first_name = $customer_data->f_name;
    $middle_name = $customer_data->m_name;
    $last_name = $customer_data->l_name;
    $phone = $customer_data->phone_no;

    // Pata loan ya mteja (active loan)
    $customer_loan = $this->queries->get_loan_active_customer($customer_id);

    if (!$customer_loan) {
        $this->session->set_flashdata('error', 'Mteja hana mkopo hai.');
        redirect('customer/view/' . $customer_id);
        return;
    }

    $loan_id = $customer_loan->loan_id;

    // Jumla na latest deposit
    $total_deposit_loan = $this->queries->get_total_and_latest_deposit($loan_id);
    $total_paid = $total_deposit_loan->total_depost ?? 0;
    $latest_paid = $total_deposit_loan->latest_deposit ?? 0;
$latest_paid_day = isset($total_deposit_loan->latest_deposit_day) 
    ? date('d-m-Y', strtotime($total_deposit_loan->latest_deposit_day)) 
    : 'N/A';

  $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);
    // Deni lililobaki
    $remaining = max(0, $customer_loan->loan_int - $total_paid);

    // Company name (au default)
    $comp_name =$company_data->comp_name;


  // echo "<pre>";
  //   print_r($comp_name);
  //  echo "<pre>";
  //  exit();

    // Build message
    $massage = "Ndugu {$first_name} {$last_name}, umelipa jumla TZS " . number_format($total_paid) . ". "
        . "Deni lililobaki TZS " . number_format($remaining) . ". "
        . "Kiasi ulicholipa mara ya mwisho TZS " . number_format($latest_paid) . " tarehe {$latest_paid_day}. "
        . "Asante, {$comp_name}.";

    // Tuma SMS
     $this->sendsms($phone, $massage);

    if ($massage) {
        $this->session->set_flashdata('success', 'SMS ya malipo imetumwa kwa mteja.');
    } else {
        $this->session->set_flashdata('error', 'SMS haikuweza kutumwa. Angalia namba ya simu au huduma ya SMS.');
    }

   return redirect('oficer/data_with_depost/'.$customer_id);
}



public function today_officer_transaction(){
 $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);
    
    $cash_transaction = $this->queries->get_cash_transaction_blanch($blanch_id);
    $sum_cashTransaction = $this->queries->get_cash_transaction_sum_blanch($blanch_id);


    $account_deposit = $this->queries->get_deposit_sunnary_account_blanch($blanch_id);
    $default_list = $this->queries->get_depositing_out_blanch($blanch_id);
    $toyal_default = $this->queries->get_depositing_out_total_blanch($blanch_id);

    $withdrawal_account = $this->queries->get_withdrawal_summary_account_blanch_data($blanch_id);
    $total_code_no = $this->queries->get_total_code_number_blanch_data($blanch_id);
    $deducted_fee = $this->queries->get_total_deducted_income_blanch_data($blanch_id);

    $penart_paid = $this->queries->get_total_penart_paid_blanch_data($blanch_id);

    $miamala = $this->queries->get_miamala_hewa_blanch_data($blanch_id);
    $total_miamala = $this->queries->get_miamala_hewa_total_blanch_data($blanch_id);


    $hai_wateja = $this->queries->get_depositing_hai_blanch($blanch_id);
    $sugu_wateja = $this->queries->get_depositing_sugu_blanch($blanch_id);
    //        echo "<pre>";
    // print_r($sugu_wateja);
    //            exit();

    $this->load->view('officer/today_officer_transaction',['empl_data'=>$empl_data,'cash_transaction'=>$cash_transaction,'sum_cashTransaction'=>$sum_cashTransaction,'account_deposit'=>$account_deposit,'default_list'=>$default_list,'toyal_default'=>$toyal_default,'withdrawal_account'=>$withdrawal_account,'total_code_no'=>$total_code_no,'deducted_fee'=>$deducted_fee,'penart_paid'=>$penart_paid,'miamala'=>$miamala,'total_miamala'=>$total_miamala,'hai_wateja'=>$hai_wateja,'sugu_wateja'=>$sugu_wateja]);
}

public function print_officer_todaycash_transaction()

{
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $cash_transaction = $this->queries->get_cash_transaction_blanch($blanch_id);
    $sum_cashTransaction = $this->queries->get_cash_transaction_sum_blanch($blanch_id);

    $account_deposit = $this->queries->get_deposit_sunnary_account_blanch($blanch_id);
    $default_list = $this->queries->get_depositing_out_blanch($blanch_id);
    $toyal_default = $this->queries->get_depositing_out_total_blanch($blanch_id);

    $withdrawal_account = $this->queries->get_withdrawal_summary_account_blanch_data($blanch_id);
    $total_code_no = $this->queries->get_total_code_number_blanch_data($blanch_id);
    $deducted_fee = $this->queries->get_total_deducted_income_blanch_data($blanch_id);

    $penart_paid = $this->queries->get_total_penart_paid_blanch_data($blanch_id);

    $miamala = $this->queries->get_miamala_hewa_blanch_data($blanch_id);
    $total_miamala = $this->queries->get_miamala_hewa_total_blanch_data($blanch_id);

    $hai_wateja = $this->queries->get_depositing_hai_blanch($blanch_id);
    $sugu_wateja = $this->queries->get_depositing_sugu_blanch($blanch_id);
    $detail_income = $this->queries->get_income_detailBlanchData($blanch_id);
    $fine_keywords = ['penart', 'faini', 'fine', 'faini kulala', 'faini (penalty)', 'penalt', 'faini lala', 'penati', 'adhabu', 'penalty', 'penarty'];
    $faini = array_values(array_filter($detail_income, function ($item) use ($fine_keywords) {
      $income_name = strtolower(trim((string) ($item->inc_name ?? '')));

      if ($income_name === '') {
        return false;
      }

      if (in_array($income_name, $fine_keywords, true)) {
        return true;
      }

      return strpos($income_name, 'faini') !== false || strpos($income_name, 'penalty') !== false || strpos($income_name, 'adhabu') !== false;
    }));

    $company_name = $company_data->comp_name ?? 'Today_Officer_Transaction';
    $company_name = preg_replace('/[^a-zA-Z0-9_-]/', '_', $company_name);

    $mpdf = new \Mpdf\Mpdf([
      'format' => 'A4-L',
      'orientation' => 'L',
        'tempDir' => APPPATH . 'tmp/mpdf',
    ]);

    $html = $this->load->view('officer/print_today_officer_transaction', [
      'company_data' => $company_data,
      'blanch_data' => $blanch_data,
      'empl_data' => $empl_data,
      'cash_transaction' => $cash_transaction,
      'sum_cashTransaction' => $sum_cashTransaction,
      'account_deposit' => $account_deposit,
      'default_list' => $default_list,
      'toyal_default' => $toyal_default,
      'withdrawal_account' => $withdrawal_account,
      'total_code_no' => $total_code_no,
      'deducted_fee' => $deducted_fee,
      'penart_paid' => $penart_paid,
      'miamala' => $miamala,
      'total_miamala' => $total_miamala,
      'hai_wateja' => $hai_wateja,
      'sugu_wateja' => $sugu_wateja,
      'faini' => $faini,
    ], true);

    $mpdf->SetFooter('Generated By Brainsoft Technology | {PAGENO} of {nbpg}');
    $mpdf->WriteHTML($html);

    if (ob_get_length()) {
      ob_end_clean();
    }

    $filename = $company_name . '_today_officer_transaction.pdf';
    $mpdf->Output($filename, 'I');
}

  public function delete_depost_data($pay_id)
  {
    $blanch_id = $this->session->userdata('blanch_id');
    $deposit = $this->queries->get_deposit_data_record($pay_id);

    if (!$deposit) {
      $this->session->set_flashdata('error', 'Transaction not found.');
      return redirect('oficer/today_officer_transaction');
    }

    if ((int)$deposit->blanch_id !== (int)$blanch_id) {
      $this->session->set_flashdata('error', 'You are not allowed to delete this transaction.');
      return redirect('oficer/today_officer_transaction');
    }

    if (empty($deposit->depost) || (float)$deposit->depost <= 0) {
      $this->session->set_flashdata('error', 'Only paid (Lipwa) transactions can be deleted.');
      return redirect('oficer/today_officer_transaction');
    }

    $depost = $deposit->depost;
    $trans_id = $deposit->trans_id;
    $comp_id = $deposit->comp_id;
    $customer_id = $deposit->customer_id;
    $loan_id = $deposit->loan_id;
    $dep_id = $pay_id;

    $remain_depost = $depost - $depost;

    $blanch_balance = $this->queries->get_remain_blanch_capital($blanch_id, $trans_id);
    $old_balance = $blanch_balance->blanch_capital ?? 0;
    $deposit_new = $old_balance - $depost;

    $descriptions = $this->queries->get_description_pay($loan_id);
    $description = $descriptions->description ?? '';

    $recovery = $this->queries->get_total_pend_data($loan_id);
    $total_pend = $recovery->total_pend ?? 0;
    $recov = $total_pend + $depost;

    $out = $this->queries->get_outstand_loan_depost($loan_id);
    $remain = $out->remain_amount ?? 0;
    $paid = $out->paid_amount ?? 0;

    $remain_data = $remain + $depost;
    $paid_data = $paid - $depost;

    $out_deposit = $this->queries->get_outstand_deposit($blanch_id, $trans_id);
    $out_balance = $out_deposit->out_balance ?? 0;
    $new_out_balance = $out_balance - $depost;

    $total_depost = $this->queries->get_sum_dapost($loan_id);
    $loan_restoration = $this->queries->get_loanInterest($loan_id);
    $compdata = $this->queries->get_companyData($comp_id);
    $customer_data = $this->queries->get_customer_data($customer_id);

    $loan_dep = $total_depost->remain_balance_loan ?? 0;
    $remove_deposit = $loan_dep - $depost;

    $loan_int = $loan_restoration->loan_int ?? 0;
    $remain_loan = $loan_int - $remove_deposit;

    $comp_name = $compdata->comp_name ?? '';
    $comp_phone = $compdata->comp_phone ?? '';
    $phone = $customer_data->phone_no ?? null;

    if (!empty($phone)) {
      $massage = 'Tsh.' . number_format($depost) . ' Iliyoingizwa Kimakosa Kwenye Mkopo wako ' . $comp_name . ' Imetolewa Kiasi Kilichobaki Kulipwa ' . number_format($remain_loan) . ' Kwa Msaada ' . $comp_phone;
      $this->sendsms($phone, $massage);
    }

    if ($description == 'CASH DEPOSIT') {
      $this->update_loan_statatus_adjust_withdrawal($loan_id);
    } elseif ($description == 'SYSTEM / PENDING LOAN RETURN') {
      $this->update_recovery_amount($loan_id, $recov);
      $this->update_loan_statatus_adjust_withdrawal($loan_id);
    } elseif ($description == 'SYSTEM / DEFAULT LOAN RETURN') {
      $this->update_outstand_table_mistak($loan_id, $remain_data, $paid_data);
      $this->update_loan_statatus_adjust_out($loan_id);
    }

    if ($description == 'SYSTEM / DEFAULT LOAN RETURN') {
      $this->update_blanch_amount_outstand($comp_id, $blanch_id, $new_out_balance, $trans_id);
    } else {
      $this->insert_blanch_amount_deposit($blanch_id, $deposit_new, $trans_id);
    }

    $this->update_prev_record_data($pay_id, $remain_depost);
    $this->update_deposit_record_data($pay_id, $remain_depost);
    $this->remove_deposit_loan($dep_id);
    $this->remove_prepaid_deposit($dep_id);

    $this->session->set_flashdata('massage', 'Adjust successfully');
    return redirect('oficer/today_officer_transaction');
  }

  public function remove_prepaid_deposit($dep_id)
  {
    return $this->db->delete('tbl_prepaid', ['dep_id' => $dep_id]);
  }

  public function remove_deposit_loan($dep_id)
  {
    return $this->db->delete('tbl_pay', ['dep_id' => $dep_id]);
  }

  public function update_deposit_record_data($pay_id, $remain_depost)
  {
    $sqldata = "UPDATE `tbl_depost` SET `depost`= '$remain_depost',`sche_principal`='0',`sche_interest`='0',`depost_method`='0' WHERE `dep_id`= '$pay_id'";
    $this->db->query($sqldata);
    return true;
  }

  public function update_prev_record_data($pay_id, $remain_depost)
  {
    $sqldata = "UPDATE `tbl_prev_lecod` SET `depost`= '$remain_depost',`trans_id`='0' WHERE `pay_id`= '$pay_id'";
    $this->db->query($sqldata);
    return true;
  }

  public function insert_blanch_amount_deposit($blanch_id, $deposit_new, $trans_id)
  {
    $sqldata = "UPDATE `tbl_blanch_account` SET `blanch_capital`= '$deposit_new' WHERE `blanch_id`= '$blanch_id' AND `receive_trans_id` ='$trans_id'";
    $this->db->query($sqldata);
    return true;
  }

  public function update_blanch_amount_outstand($comp_id, $blanch_id, $new_out_balance, $trans_id)
  {
    $sqldata = "UPDATE `tbl_receve_outstand` SET `out_balance`= '$new_out_balance' WHERE `blanch_id`= '$blanch_id' AND `trans_id`='$trans_id'";
    $this->db->query($sqldata);
    return true;
  }

  public function update_loan_statatus_adjust_out($loan_id)
  {
    $sqldata = "UPDATE `tbl_loans` SET `loan_status`= 'out' WHERE `loan_id`= '$loan_id'";
    $this->db->query($sqldata);
    return true;
  }

  public function update_outstand_table_mistak($loan_id, $remain_data, $paid_data)
  {
    $sqldata = "UPDATE `tbl_outstand_loan` SET `remain_amount`= '$remain_data',`paid_amount`='$paid_data',`out_status`='open' WHERE `loan_id`= '$loan_id'";
    $this->db->query($sqldata);
    return true;
  }

  public function update_recovery_amount($loan_id, $recov)
  {
    $sqldata = "UPDATE `tbl_pending_total` SET `total_pend`= '$recov' WHERE `loan_id`= '$loan_id'";
    $this->db->query($sqldata);
    return true;
  }

  public function update_loan_statatus_adjust_withdrawal($loan_id)
  {
    $sqldata = "UPDATE `tbl_loans` SET `loan_status`= 'withdrawal' WHERE `loan_id`= '$loan_id'";
    $this->db->query($sqldata);
    return true;
  }


  public function deposit_loan($customer_id){
    ini_set("max_execution_time", 3600);

    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $this->form_validation->set_rules('customer_id','Customer','required');
    $this->form_validation->set_rules('blanch_id','blanch','required');
    $this->form_validation->set_rules('loan_id','Loan','required');
    $this->form_validation->set_rules('depost','depost','required');
    $this->form_validation->set_rules('p_method','Method','required');
    $this->form_validation->set_rules('description','description','required');
    $this->form_validation->set_rules('deposit_date','deposit date','required');
    $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
       if ($this->form_validation->run()) {
          $depost = $this->input->post();
$wakala = $this->input->post('wakala'); // may be empty for cash

      

          // echo "<pre>";
          // print_r( $depost);
          //     exit();

          $customer_id = $depost['customer_id'];
          $comp_id = !empty($depost['comp_id']) ? $depost['comp_id'] : $comp_id;
          $blanch_id = $depost['blanch_id'];
          $p_method = $depost['p_method'];
          $loan_id = $depost['loan_id'];
          $deposit_date = $depost['deposit_date'];
          $depost = (float)str_replace([',', ' '], '', (string)$depost['depost']);
          $description = 'LOAN RETURN';
          $new_depost = $depost;
          $payment_method = $p_method;
          $kumaliza = $depost;
          $trans_id = $p_method;

          //        echo "<pre>";
          // print_r($deposit_date);
          //         exit();
   $method = $this->queries->get_account_by_transid($p_method);
  //  print_r($method);
  //  exit();
    $method_name = $method ? strtolower(trim($method->account_name)) : '';
    if ($method_name !== 'cash') {
        $this->form_validation->set_rules('wakala','Wakala','required|trim');
    }

    

         $loan_restoration = $this->queries->get_restoration_loan($loan_id);
         $company = $this->queries->get_comp_data($comp_id);
         $comp_name = $company->comp_name;
         $comp_phone = $company->comp_phone;
         $restoration = $loan_restoration->restration;
         $group_id = $loan_restoration->group_id;
         $loan_aprove = $loan_restoration->loan_aprove;
         $loan_codeID = $loan_restoration->loan_code;
         $empl_id = $loan_restoration->empl_id;

         $loan_aproved = $loan_aprove;
          //  print_r( $comp_phone);
          //         exit();
         $prepaid = $depost - $restoration;
         @$data_depost = $this->queries->get_customer_Loandata($customer_id);
         $customer_data = $this->queries->get_customerData($customer_id);
      //    echo "<pre>";
      //  print_r( $customer_data);
      //  echo "<pre>";
                  // exit();
         $phone = $customer_data->phone_no;
         $first_name = $customer_data->f_name;
         $last_name = $customer_data->l_name;
         // $admin_data = $this->queries->get_admin_role($comp_id);
         $remain_balance = @$data_depost->balance;

 $end_date = @$data_depost->loan_end_date;
$branch_name=$customer_data->blanch_name;

   

         $old_balance = $remain_balance;
         $sum_balance = $old_balance + $new_depost;
          //admin role
        $role = $empl_data->empl_name;

        $new_balance = $new_depost;

           //sms count function
        @$smscount = $this->queries->get_smsCountDate($comp_id);
        $sms_number = @$smscount->sms_number;
        $sms_id = @$smscount->sms_id;

        

        $out_data = $this->queries->getOutstand_loanData($loan_id);
        $total_depost_loan = $this->queries->get_total_depost($loan_id);

        $total_dept =  $total_depost_loan->total_depost +  $depost;

        $deni = $data_depost->loan_int - $total_dept;
       

      //  echo "<pre>";
      //  print_r($deni);
      //  echo "<pre>";
      //             exit();
        

         @$deposit_check = $this->queries->get_today_deposit_true($loan_id);

          $dep_id = @$deposit_check->dep_id;
          $dep_date = @$deposit_check->deposit_day;
          $depost_res = @$deposit_check->depost;
          $depost_method_res = @$deposit_check->depost_method;
          if ($deposit_check == TRUE) {
          $update_res = $depost_res + $new_depost;
          }else{
          $update_res = $new_depost;
           } 
        //new code interest and principal
               //new code
        $interest_data = $this->queries->get_interest_loan($loan_id);
          $int = $update_res;
          $day = @$interest_data->day;
          $session = @$interest_data->session;
          $loan_status = @$interest_data->loan_status;
          $loan_int = @$interest_data->loan_int;
          $loan_aprove = @$interest_data->loan_aprove;
          $interest_formular = @$interest_data->interest_formular;
          $ses_day = $session;
          $day_int = $loan_aprove * $interest_formular / 100 / $session;
          $day_princ = $int - $day_int;

          //insert principal balance 
          $trans_id = $payment_method;
          $princ_status = $loan_status;
          $principal_balance = $day_princ;
          $interest_balance = $day_int;

          // print_r($deposit_date);
          //          exit();
          
        

          $principal_blanch = $this->queries->get_blanch_capitalPrincipal($comp_id,$blanch_id,$trans_id,$princ_status);
          $old_principal_balance = @$principal_blanch->principal_balance;
          $principal_insert = $old_principal_balance + $principal_balance;

           //interest
          $interest_blanch = $this->queries->get_blanch_interest_capital($comp_id,$blanch_id,$trans_id,$princ_status);
          $interest_blanch_balance = @$interest_blanch->capital_interest;
          $interest_insert = $interest_blanch_balance + $day_int;

        $total_depost = $this->queries->get_sum_dapost($loan_id);
         $loan_dep = $total_depost->remain_balance_loan;
         $kumaliza_depost = $loan_dep + $kumaliza;
         $loan_int = $loan_restoration->loan_int;
         $remain_loan = $loan_int - $total_depost->remain_balance_loan;

         $baki = $loan_int - ($loan_dep + $kumaliza);
           

         if ($kumaliza_depost < $loan_int){
            //print_r($kumaliza_depost);
              // echo "bado sana";
           }elseif($kumaliza_depost > $loan_int){
            //echo "hapana";
           }elseif($kumaliza_depost == $loan_int){
            $this->update_loastatus_done($loan_id);
            $this->insert_loan_kumaliza($comp_id,$blanch_id,$customer_id,$loan_id,$kumaliza,$group_id,$wakala);
            $this->update_customer_statusclose($customer_id);
            //echo "tunamaliza kazi";
          }
         

          //  print_r($empl_id);
          // exit();





           if ($out_data == TRUE) {
            $remain_amount = (float)$out_data->remain_amount;
            $current_remain_loan = max(0, (float)$remain_loan);
            $allowed_max_deposit = max($remain_amount, $current_remain_loan);
            if ($new_balance > $allowed_max_deposit){
            $this->session->set_flashdata("error",'Your Depost Amount is Greater');
            }else{
           $remain_amount = $allowed_max_deposit;
           $paid_amount = $out_data->paid_amount;
           $customer_id = $out_data->customer_id;
            if ($new_balance >= $remain_amount){
           $depost_amount = $remain_amount - $new_balance;
           $paid_out = $paid_amount + $new_balance;
              
          //insert depost balance
         
          if ($deposit_check == TRUE) {
         $this->update_loan_lecorDeposit($comp_id,$customer_id,$loan_id,$blanch_id,$update_res,$p_method,$role,$day_int,$day_princ,$loan_status,$group_id,$deposit_date,$empl_id,$dep_id,$wakala);    
                }else{
        $dep_id = $this->insert_loan_lecorDeposit($comp_id,$customer_id,$loan_id,$blanch_id,$update_res,$p_method,$role,$day_int,$day_princ,$loan_status,$group_id,$deposit_date,$empl_id,$wakala);
           }

          //$this->insert_blanch_amount($blanch_id,$new_depost);
          //$this->insert_comp_balance($comp_id,$new_depost);

          $new_balance = $new_depost;

           //total depost 
          // $total_depost = $this->queries->get_total_amount_depost_loan($loan_id);
          // print_r($total_depost);
          //           exit();

          if ($dep_id > 0) {
             $this->session->set_flashdata('massage','Deposit imefanyika');
            $message = 'Ndugu ' . $first_name . ' ' . $last_name . 
            ', tumepokea TZS ' . number_format($new_balance) . 
            ' kupitia ' . $comp_name . ' - ' . $branch_name . 
            '. Hongera! Umemaliza kulipa mkopo wako kikamilifu.';
  
        $this->sendsms($phone, $message);
          }else{
            $this->session->set_flashdata('massage','malipo has made Sucessfully');

            $message = 'Ndugu ' . $first_name . ' ' . $last_name . 
           ', umelipa ' . number_format($new_balance) . 
           ' ' . $comp_name . 
           '. Kiasi kilichobaki kulipwa kwa changamoto, fika ofisini.';

			    $this->sendsms($phone, $message);
          }
         if ($deposit_check == TRUE) {
         $this->update_loan_lecordDataDeposit_data($comp_id,$customer_id,$loan_id,$blanch_id,$update_res,$dep_id,$group_id,$trans_id,$restoration,$loan_aproved,$deposit_date,$empl_id,$wakala);
          }else{
          $this->insert_loan_lecordDataDeposit($comp_id,$customer_id,$loan_id,$blanch_id,$update_res,$dep_id,$group_id,$trans_id,$restoration,$loan_aproved,$deposit_date,$empl_id,$wakala);    
          }

         $this->depost_balance($loan_id,$comp_id,$blanch_id,$customer_id,$new_depost,$sum_balance,$description,$role,$p_method,$group_id,$deposit_date,$dep_id,$wakala,$baki);
         $this->insert_remainloan($loan_id,$depost_amount,$paid_out,$dep_id);
         $this->update_loastatus($loan_id);
         $this->update_outstand_status($loan_id);
        if (@$principal_blanch == TRUE) {
         $this->update_principal_capital_balanc($comp_id,$blanch_id,$trans_id,$princ_status,$principal_insert);
         }elseif(@$principal_blanch == FALSE){
         $this->insert_blanch_principal($comp_id,$blanch_id,$trans_id,$princ_status,$principal_insert);
         }
          //inrterest
         if (@$interest_blanch == TRUE) {
         $this->update_interest_blanchBalance($comp_id,$blanch_id,$trans_id,$princ_status,$interest_insert);    
         }elseif(@$interest_blanch == FALSE){
         $this->insert_interest_blanch_capital($comp_id,$blanch_id,$trans_id,$princ_status,$interest_insert);
       }
         $this->insert_customer_report($loan_id,$comp_id,$blanch_id,$customer_id,$group_id,$new_depost,$pay_id,$deposit_date);
         $this->insert_prepaid_balance($loan_id,$comp_id,$blanch_id,$customer_id,$prepaid,$dep_id);
         $this->update_customer_statusLoan($customer_id);
          $total_depost = $this->queries->get_sum_dapost($loan_id);
         $loan_int = $loan_restoration->loan_int;
         $remain_loan = $loan_int - $total_depost->remain_balance_loan;
            //sms send
            // $message = 'Umeingiza Tsh.' .$new_balance. ' kwenye Acc Yako ' . $loan_codeID . $comp_name.' Mpokeaji '.$role . ' Kiasi kilicho baki Kulipwa ni Tsh.'.$remain_loan.' Kwa malalamiko piga '.$comp_phone;
            // $this->sendsms($phone, $message);

           $loan_ID = $loan_id;
          @$out_check = $this->queries->get_outstand_total($loan_id);
          $amount_remain = @$out_check->remain_amount;
            // print_r( $amount_remain);
            //       exit();
          if($amount_remain > $new_balance){
          $this->insert_outstand_balance($comp_id,$blanch_id,$customer_id,$loan_id,$update_res,$group_id,$dep_id);
          }elseif($amount_remain = $new_balance) {
          $this->insert_outstand_balance($comp_id,$blanch_id,$customer_id,$loan_id,$update_res,$group_id,$dep_id);
          }
          if ($company_data->sms_status == 'YES'){
             $this->sendsms($phone,$massage);
             //echo "kitu kipo";
          }elseif($company_data->sms_status == 'NO'){
            $this->sendsms($phone,$massage);
          }
        
            }else{  
                //exit();
           $depost_amount = $remain_amount - $new_balance;
           $paid_out = $paid_amount + $new_balance;
              // print_r($paid_out);
              //          exit();
          //insert depost balance
          

        if ($deposit_check == TRUE) {
         $this->update_loan_lecorDeposit($comp_id,$customer_id,$loan_id,$blanch_id,$update_res,$p_method,$role,$day_int,$day_princ,$loan_status,$group_id,$deposit_date,$empl_id,$dep_id,$wakala);    
                }else{
        $dep_id = $this->insert_loan_lecorDeposit($comp_id,$customer_id,$loan_id,$blanch_id,$update_res,$p_method,$role,$day_int,$day_princ,$loan_status,$group_id,$deposit_date,$empl_id,$wakala);
           }


          $new_balance = $new_depost;
          
          if ($pay_id > 0) {
             $this->session->set_flashdata('massage','pesa has made Sucessfully');
             $message = 'Ndugu ' . $first_name . ' ' . $last_name . 
             ', umelipa ' . number_format($new_balance) . 
             ' ' . $comp_name .  '-' .$branch_name.
             '. Kiasi kilichobaki kulipwa kwa changamoto, fika ofisini.';
  
              $this->sendsms($phone, $message);
          }else{
            $this->session->set_flashdata('massage','Malipo yamelipwa kikamilifu!');
$massage = 'Ndugu ' . $first_name . ' ' . $last_name . 
    ', umelipa ' . number_format($new_balance) . 
    ' ' . $comp_name . ' - ' . $branch_name . 
    '. Mkataba wako ulimalizika tarehe ' . date('d/m/Y', strtotime($end_date)) . 
    '. Deni lililobaki ni ' . number_format($deni) . 
    '. Tafadhali maliza kulipa haraka.';




 
             $this->sendsms($phone, $massage);
          }
          if ($deposit_check == TRUE) {
         $this->update_loan_lecordDataDeposit_data($comp_id,$customer_id,$loan_id,$blanch_id,$update_res,$dep_id,$group_id,$trans_id,$restoration,$loan_aproved,$deposit_date,$empl_id,$wakala);
          }else{
          $this->insert_loan_lecordDataDeposit($comp_id,$customer_id,$loan_id,$blanch_id,$update_res,$dep_id,$group_id,$trans_id,$restoration,$loan_aproved,$deposit_date,$empl_id,$wakala);    
          };
         $this->insert_remainloan($loan_id,$depost_amount,$paid_out,$dep_id);
         $this->depost_balance($loan_id,$comp_id,$blanch_id,$customer_id,$new_depost,$sum_balance,$description,$role,$p_method,$group_id,$deposit_date,$dep_id,$wakala,$baki);
              if (@$principal_blanch == TRUE) {
         $this->update_principal_capital_balanc($comp_id,$blanch_id,$trans_id,$princ_status,$principal_insert);
         }elseif(@$principal_blanch == FALSE){
         $this->insert_blanch_principal($comp_id,$blanch_id,$trans_id,$princ_status,$principal_insert);
         }
          //inrterest
         if (@$interest_blanch == TRUE) {
         $this->update_interest_blanchBalance($comp_id,$blanch_id,$trans_id,$princ_status,$interest_insert);    
         }elseif(@$interest_blanch == FALSE){
         $this->insert_interest_blanch_capital($comp_id,$blanch_id,$trans_id,$princ_status,$interest_insert);
       }
         $this->insert_customer_report($loan_id,$comp_id,$blanch_id,$customer_id,$group_id,$new_depost,$pay_id,$deposit_date);
         $this->insert_prepaid_balance($loan_id,$comp_id,$blanch_id,$customer_id,$prepaid,$dep_id);
          $total_depost = $this->queries->get_sum_dapost($loan_id);
         $loan_int = $loan_restoration->loan_int;
         $remain_loan = $loan_int - $total_depost->remain_balance_loan;
        //  echo "<pre>";
        //  print_r($remain_loan);
        //  exit();
            
          //   $massage = 'Umeingiza Tsh.' .$new_balance. ' kwenye Acc Yako ' . $loan_codeID . $comp_name.' Mpokeaji '.$role . ' Kiasi kilicho baki Kulipwa ni Tsh.'.$remain_loan.' Kwa malalamiko piga '.$comp_phone;
        
          // $this->sendsms($phone,$massage);
           $loan_ID = $loan_id;
          @$out_check = $this->queries->get_outstand_total($loan_id);
          $amount_remain = @$out_check->remain_amount;
            // print_r($new_balance);
            //       exit();
          if($amount_remain > $new_balance){
          $this->insert_outstand_balance($comp_id,$blanch_id,$customer_id,$loan_id,$update_res,$group_id,$dep_id);
          }elseif($amount_remain = $new_balance) {
          $this->insert_outstand_balance($comp_id,$blanch_id,$customer_id,$loan_id,$update_res,$group_id,$dep_id);
          }
          //$phone = '255'.substr($phones, 1,10);
            // print_r($sms);
            //   echo "<br>";
            // print_r($phone);
            //      exit();
          if ($company_data->sms_status == 'YES'){
             $this->sendsms($phone,$massage);
             //echo "kitu kipo";
          }elseif($company_data->sms_status == 'NO'){
            $this->sendsms($phone,$massage);
          }

         }
          }




   

        // ndania ya mkataba
           }elseif($out_data == FALSE){

          
            if ($kumaliza_depost > $loan_int) {
            $this->session->set_flashdata("error",'Your Depost Amount is Greater'); 
            }else{
          

        if ($deposit_check == TRUE) {
         $this->update_loan_lecorDeposit($comp_id,$customer_id,$loan_id,$blanch_id,$update_res,$p_method,$role,$day_int,$day_princ,$loan_status,$group_id,$deposit_date,$empl_id,$dep_id,$wakala);    
                }else{
        $dep_id = $this->insert_loan_lecorDeposit($comp_id,$customer_id,$loan_id,$blanch_id,$update_res,$p_method,$role,$day_int,$day_princ,$loan_status,$group_id,$deposit_date,$empl_id,$wakala);
           }


              // print_r($empl_id);
              // exit();

          $new_balance = $new_depost;

          // print_r($new_balance);
          //     exit();

          if ($dep_id > 0) {
            $this->session->set_flashdata('massage','Deposit1 has made Sucessfully');

        //  $remain_den = $this->queries->get_remain_amount($loan_id);
        //  $new_remain_amount = $remain_den - $new_balance;
//  print_r($remain_den);
//               exit();
      //       $massage = 'Ndugu ' . $first_name . ' ' . $last_name . 
			// ', umelipa ' . number_format($new_balance) . 
			// ' ' . $comp_name . 
			// '. Kiasi kilichobaki kulipwa ' . number_format($new_remain_amount) . 
			// ' kama kuna changamoto kwenye malipo yako fika ofisini.';
      $total_depost = $this->queries->get_sum_dapost($loan_id);
      $loan_int = $loan_restoration->loan_int;
      $left_loan = $loan_int - $total_depost->remain_balance_loan;
      

  if ($left_loan == 0) {
    $massage = 'Ndugu ' . $first_name . ' ' . $last_name . 
        ', tunakupongeza! Tumepokea malipo yako ya TZS ' . number_format($new_balance) . 
        ' yaliyofanyika tarehe ' . date("d/m/Y") . 
        ' kupitia ' . $comp_name . 
        '. Hongera, umemaliza kulipa mkopo wako kikamilifu!';
} else {
    $massage = 'Ndugu ' . $first_name . ' ' . $last_name . 
        ', tumepokea malipo yako ya TZS ' . number_format($new_balance) . 
        ' yaliyofanyika tarehe ' . date("d/m/Y") . 
        ' kupitia ' . $comp_name . '-' .$branch_name.
        '. Malipo yako yamepokelewa na ' . $role . 
        '. Deni lilobaki kulipwa ni TZS ' . number_format($left_loan) . '.';
}

    

			$this->sendsms($phone,$massage);
            
          }else{
            $this->session->set_flashdata('massage','Failed');
          }
           if ($deposit_check == TRUE) {
         $this->update_loan_lecordDataDeposit_data($comp_id,$customer_id,$loan_id,$blanch_id,$update_res,$dep_id,$group_id,$trans_id,$restoration,$loan_aproved,$deposit_date,$empl_id,$wakala);
          }else{
          $this->insert_loan_lecordDataDeposit($comp_id,$customer_id,$loan_id,$blanch_id,$new_depost,$dep_id,$group_id,$trans_id,$restoration,$loan_aproved,$deposit_date,$empl_id,$wakala);    
          }
         $this->depost_balance($loan_id,$comp_id,$blanch_id,$customer_id,$new_depost,$sum_balance,$description,$role,$p_method,$group_id,$deposit_date,$dep_id,$wakala,$baki);
        if (@$principal_blanch == TRUE) {
         $this->update_principal_capital_balanc($comp_id,$blanch_id,$trans_id,$princ_status,$principal_insert);
         }elseif(@$principal_blanch == FALSE){
         $this->insert_blanch_principal($comp_id,$blanch_id,$trans_id,$princ_status,$principal_insert);
         }
          //inrterest
         if (@$interest_blanch == TRUE) {
         $this->update_interest_blanchBalance($comp_id,$blanch_id,$trans_id,$princ_status,$interest_insert);    
         }elseif(@$interest_blanch == FALSE){
         $this->insert_interest_blanch_capital($comp_id,$blanch_id,$trans_id,$princ_status,$interest_insert);
         }
         $this->insert_prepaid_balance($loan_id,$comp_id,$blanch_id,$customer_id,$prepaid,$dep_id);
          $total_depost = $this->queries->get_sum_dapost($loan_id);
         $loan_int = $loan_restoration->loan_int;
         $remain_loan = $loan_int - $total_depost->remain_balance_loan;
            //sms send
          // $sms = 'Umeingiza Tsh.' .$new_balance. ' kwenye Acc Yako ' . $loan_codeID . $comp_name.' Mpokeaji '.$role . ' Kiasi kilicho baki Kulipwa ni Tsh.'.$remain_loan.' Kwa malalamiko piga '.$comp_phone;
          // $massage = $sms;
          // $phone = $phones;


            //updating recovery loan
         $loan_ID = $loan_id;
         @$data_pend = $this->queries->get_total_pending_loan($loan_ID);
          $total_pend = @$data_pend->total_pend;

          if (@$data_pend->total_pend == TRUE) {
            if($depost > $total_pend){
           $deni_lipa = $depost - $total_pend;
           //$recovery = $deni_lipa - $total_pend; 
           $this->update_loan_pending_remain($loan_id);
           $this->insert_description_report($comp_id,$blanch_id,$customer_id,$loan_id,$total_pend,$deni_lipa,$group_id,$dep_id); 
            }elseif($depost < $total_pend){
           $deni_lipa = $total_pend - $depost;
           $this->update_loan_pending_balance($loan_id,$deni_lipa);
           $this->insert_returnDescriptionData_report($comp_id,$blanch_id,$customer_id,$loan_id,$depost,$group_id,$dep_id);
          }elseif ($depost = $total_pend) {
          $this->update_loan_pending_remain($loan_id);
          $this->insert_returnDescriptionData_report($comp_id,$blanch_id,$customer_id,$loan_id,$depost,$group_id,$dep_id);
          }
          }elseif ($data_pend->total_pend == FALSE) {
            //echo "hakuna kitu";
          }
          //$phone = '255'.substr($phones, 1,10);
            // print_r($sms);
            //   echo "<br>";
            // print_r($phone);
            //      exit();
          if ($company_data->sms_status == 'YES'){
             $this->sendsms($phone,$massage);
             //echo "kitu kipo";
          }elseif($company_data->sms_status == 'NO'){
             //echo "Hakuna kitu hapa";
          }
           }
           }              
         return redirect('oficer/data_with_depost/'.$customer_id);
             
       }

       $this->session->set_flashdata('error', validation_errors('<div class="text-danger">', '</div>'));
       return redirect('oficer/data_with_depost/'.$customer_id);

      }


 
  public function update_loan_lecordDataDeposit_data($comp_id,$customer_id,$loan_id,$blanch_id,$update_res,$dep_id,$group_id,$trans_id,$restoration,$loan_aproved,$deposit_date,$empl_id,$wakala){
        $sqldata="UPDATE `tbl_prev_lecod` SET `depost`= '$update_res',`trans_id`='$trans_id' WHERE `pay_id`= '$dep_id'";
     $query = $this->db->query($sqldata);
     return true;
      }


 public function update_loan_lecorDeposit($comp_id,$customer_id,$loan_id,$blanch_id,$update_res,$p_method,$role,$day_int,$day_princ,$loan_status,$group_id,$deposit_date,$empl_id,$dep_id,$wakala){
     $sqldata="UPDATE `tbl_depost` SET `depost`= '$update_res',`sche_principal`='$day_princ',`sche_interest`='$day_int',`depost_method`='$p_method' WHERE `dep_id`= '$dep_id'";
     $query = $this->db->query($sqldata);
     return true;   
      }


    public function insert_outstand_balance($comp_id,$blanch_id,$customer_id,$loan_id,$update_res,$group_id,$dep_id){

     $report_day = date("Y-m-d");
    $this->db->query("INSERT INTO  tbl_pay (`comp_id`,`blanch_id`,`customer_id`,`loan_id`,`withdrow`,`balance`,`description`,`date_data`,`auto_date`,`group_id`,`dep_id`) VALUES ('$comp_id','$blanch_id','$customer_id','$loan_id','$update_res','0','SYSTEM / NJE MKATABA','$report_day','$report_day','$group_id','$dep_id')");
    }

    public function insert_returnDescriptionData_report($comp_id,$blanch_id,$customer_id,$loan_id,$depost,$group_id,$dep_id){
     $report_day = date("Y-m-d");
    $this->db->query("INSERT INTO  tbl_pay (`comp_id`,`blanch_id`,`customer_id`,`loan_id`,`withdrow`,`balance`,`description`,`date_data`,`auto_date`,`group_id`,`dep_id`) VALUES ('$comp_id','$blanch_id','$customer_id','$loan_id','$depost','0','SYSTEM / LAZO LA NYUMA','$report_day','$report_day','$group_id','$dep_id')");
    }

     public function update_loan_pending_balance($loan_id,$deni_lipa){
     $sqldata="UPDATE `tbl_pending_total` SET `total_pend`= '$deni_lipa' WHERE `loan_id`= '$loan_id'";
     $query = $this->db->query($sqldata);
     return true;
     }

      public function insert_description_report($comp_id,$blanch_id,$customer_id,$loan_id,$total_pend,$deni_lipa,$group_id,$dep_id){
      $report_day = date("Y-m-d");
    $this->db->query("INSERT INTO  tbl_pay (`comp_id`,`blanch_id`,`customer_id`,`loan_id`,`withdrow`,`balance`,`description`,`date_data`,`auto_date`,`group_id`,`dep_id`) VALUES ('$comp_id','$blanch_id','$customer_id','$loan_id','$total_pend','$deni_lipa','SYSTEM / LAZO LA NYUMA','$report_day','$report_day','$group_id',`dep_id`)");
      }

   //update empty
   public function update_loan_pending_remain($loan_id)
     {
     $sqldata="UPDATE `tbl_pending_total` SET `total_pend`= '0' WHERE `loan_id`= '$loan_id'";
     $query = $this->db->query($sqldata);
     return true;   
     }





                           //update loan status
    public function update_loastatus_done($loan_id){
  $sqldata="UPDATE `tbl_loans` SET `loan_status`= 'done' WHERE `loan_id`= '$loan_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
   return true;
}

  public function insert_loan_kumaliza($comp_id,$blanch_id,$customer_id,$loan_id,$kumaliza,$group_id){
            $report_day = date("Y-m-d");
    $this->db->query("INSERT INTO tbl_customer_report (`comp_id`,`blanch_id`,`customer_id`,`loan_id`,`recevable_amount`,`pending_amount`,`rep_date`,`group_id`,`wakala`) VALUES ('$comp_id','$blanch_id','$customer_id','$loan_id','$kumaliza','$kumaliza','$report_day','$group_id','$wakala')");
    }

             //update customer status
public function update_customer_statusclose($customer_id){
$sqldata="UPDATE `tbl_customer` SET `customer_status`= 'close' WHERE `customer_id`= '$customer_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
   return true;
}


public function insert_interest_blanch_capital($comp_id,$blanch_id,$trans_id,$princ_status,$interest_insert){
$this->db->query("INSERT INTO tbl_blanch_capital_interest (`comp_id`,`blanch_id`,`trans_id`,`int_status`,`capital_interest`) VALUES ('$comp_id','$blanch_id','$trans_id','$princ_status','$interest_insert')"); 
}


  public function update_interest_blanchBalance($comp_id,$blanch_id,$trans_id,$princ_status,$interest_insert){
   $sqldata="UPDATE `tbl_blanch_capital_interest` SET `capital_interest`= '$interest_insert' WHERE `blanch_id`= '$blanch_id' AND `trans_id`='$trans_id' AND `int_status`='$princ_status'";
    // print_r($sqldata);
    //    exit();
   $query = $this->db->query($sqldata);
   return true; 
  }

public function insert_blanch_principal($comp_id,$blanch_id,$trans_id,$princ_status,$principal_insert){
 $this->db->query("INSERT INTO tbl_blanch_capital_principal (`comp_id`,`blanch_id`,`trans_id`,`princ_status`,`principal_balance`) VALUES ('$comp_id','$blanch_id','$trans_id','$princ_status','$principal_insert')");   
}


 public function update_principal_capital_balanc($comp_id,$blanch_id,$trans_id,$princ_status,$principal_insert){
  $sqldata="UPDATE `tbl_blanch_capital_principal` SET `principal_balance`= '$principal_insert' WHERE `blanch_id`= '$blanch_id' AND `trans_id`='$trans_id' AND `princ_status`='$princ_status'";
    // print_r($sqldata);
    //    exit();
   $query = $this->db->query($sqldata);
   return true;
  } 

      

      public function get_loan_code_resend($customer_id){
        $this->load->model('queries');

        $loan_code = $this->queries->get_loanCustomerCode($customer_id);
        $code = $loan_code->code;
        $first_name = $loan_code->f_name;
        $last_name =$loan_code->l_name;
        $phone = $loan_code->phone_no;
        $comp_id = $loan_code->comp_id;
        $compdata = $this->queries->get_companyData($comp_id);
        $comp_name=$compdata->comp_name;
        $massage = 'Habari ' . $first_name . ' ' . $last_name . ', namba yako ya siri kwa ajili ya kutolewa mkopo ni ' . $code . '. Asante kwa kuchagua huduma zetu. - ' . $comp_name;

       
       
        // print_r(  $massage);
      
        //      exit();
       
        $this->sendsms($phone,$massage);
        $this->session->set_flashdata('massage','Nambari ya mkopo imetumwa kwa mteja. Ikiwa haijafika, tafadhali unaweza kuituma tena.');
        return redirect('oficer/data_with_depost/'.$customer_id);
      }


//update outstand status
      public function update_outstand_status($loan_id){
     $sqldata="UPDATE `tbl_outstand_loan` SET `out_status`= 'close' WHERE `loan_id`= '$loan_id'";
    // print_r($sqldata);
    //    exit();
     $query = $this->db->query($sqldata);
     return true;
   }


      //insert out loan
        public function insert_remainloan($loan_id,$depost_amount,$paid_out,$dep_id){
   $sqldata="UPDATE `tbl_outstand_loan` SET `remain_amount`= '$depost_amount',`paid_amount`='$paid_out',`pay_id`='$dep_id' WHERE `loan_id`= '$loan_id'";
  $query = $this->db->query($sqldata);
  return true;
      }


      //update customer status
public function update_customer_statusLoan($customer_id){
$sqldata="UPDATE `tbl_customer` SET `customer_status`= 'close' WHERE `customer_id`= '$customer_id'";
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

public function insert_comp_balance($comp_id,$new_depost){
  $sqldata="UPDATE `tbl_ac_company` SET `comp_balance`= `comp_balance`+$new_depost WHERE `comp_id`= '$comp_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
  return true;
}

  public function insert_blanch_amount($blanch_id,$new_depost){
  $sqldata="UPDATE `tbl_blanch_account` SET `blanch_capital`= `blanch_capital`+$new_depost WHERE `blanch_id`= '$blanch_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
  return true;
}

    //insert prepaid balance
    public function insert_prepaid_balance($loan_id,$comp_id,$blanch_id,$customer_id,$prepaid,$dep_id){
        $date = date("Y-m-d");
    $this->db->query("INSERT INTO tbl_prepaid (`loan_id`,`comp_id`,`blanch_id`,`customer_id`,`prepaid_amount`,`prepaid_date`,`dep_id`) VALUES ('$loan_id','$comp_id','$blanch_id','$customer_id','$prepaid','$date','$dep_id')");
      }


      //insert loan Report 
      public function insert_customer_report($loan_id,$comp_id,$blanch_id,$customer_id,$group_id,$new_depost,$pay_id,$deposit_date){
          //$date = date("Y-m-d");
    $this->db->query("INSERT INTO tbl_customer_report (`loan_id`,`comp_id`,`blanch_id`,`customer_id`,`group_id`,`pending_amount`,`pay_id`,`rep_date`) VALUES ('$loan_id','$comp_id','$blanch_id','$customer_id','$group_id','$new_depost','$pay_id','$deposit_date')");
      }


    public function depost_balance($loan_id,$comp_id,$blanch_id,$customer_id,$new_depost,$sum_balance,$description,$role,$p_method,$group_id,$deposit_date,$dep_id,$wakala,$baki){
    $this->load->model('queries');
    $account_before = $this->queries->get_blanch_balance_account_details($blanch_id, $p_method);
    $balance_before = !empty($account_before->blanch_capital) ? (float) $account_before->blanch_capital : 0;
    $balance_after = $balance_before + (float) $new_depost;
    //$day = date("Y-m-d");
    $this->db->query("INSERT INTO tbl_pay (`loan_id`,`blanch_id`,`comp_id`,`customer_id`,`depost`,`balance`,`description`,`pay_status`,`stat`,`date_pay`,`emply`,`p_method`,`group_id`,`date_data`,`dep_id`,`wakala`,`rem_debt`) VALUES ('$loan_id','$blanch_id','$comp_id','$customer_id','$new_depost','$sum_balance','CASH DEPOSIT','1','1','$day','$role','$p_method','$group_id','$deposit_date','$dep_id','$wakala','$baki')");

    // Increase branch account balance on the selected payment account.
    $this->db->query("UPDATE `tbl_blanch_account` SET `blanch_capital` = `blanch_capital` + '$new_depost' WHERE `blanch_id` = '$blanch_id' AND `receive_trans_id` = '$p_method'");

    $this->queries->record_account_balance_movement(array(
      'comp_id' => $comp_id,
      'blanch_id' => $blanch_id,
      'trans_id' => $p_method,
      'reference_type' => 'loan_payment',
      'reference_id' => $dep_id,
      'movement_date' => $deposit_date,
      'amount_in' => $new_depost,
      'balance_before' => $balance_before,
      'balance_after' => $balance_after,
      'description' => 'Loan repayment received',
      'created_by' => $this->session->userdata('empl_id'),
    ));

    $this->queries->save_cash_inhand_balance(
      $comp_id,
      $blanch_id,
      $p_method,
      $this->session->userdata('empl_id'),
      $balance_after,
      $deposit_date
    );

    return $this->db->insert_id();

      }


    public function insert_loan_lecordDataDeposit($comp_id,$customer_id,$loan_id,$blanch_id,$update_res,$dep_id,$group_id,$trans_id,$restoration,$loan_aproved,$deposit_date,$empl_id,$wakala){
          // print_r($loan_aprove);
          //        exit();
        $time = date("Y-m-d H:i:s");
        $this->db->query("INSERT INTO tbl_prev_lecod (`comp_id`,`customer_id`,`loan_id`,`blanch_id`,`depost`,`lecod_day`,`pay_id`,`time_rec`,`group_id`,`empl_id`,`trans_id`,`restrations`,`loan_aprov`,`wakala`) VALUES ('$comp_id','$customer_id','$loan_id','$blanch_id','$update_res','$deposit_date','$dep_id','$time','$group_id','$empl_id','$trans_id','$restoration','$loan_aprove','$wakala')");
    }

    public function insert_loan_lecorDeposit($comp_id,$customer_id,$loan_id,$blanch_id,$update_res,$p_method,$role,$day_int,$day_princ,$loan_status,$group_id,$deposit_date,$empl_id,$wakala){
        // print_r($deposit_date); 
        //     exit();
        $date = date("Y-m-d H:i:s");       
        $this->db->query("INSERT INTO  tbl_depost (`comp_id`,`customer_id`,`loan_id`,`blanch_id`,`depost`,`depost_day`,`depost_method`,`empl_username`,`empl_id`,`sche_interest`,`sche_principal`,`dep_status`,`group_id`,`deposit_day`,`wakala`) VALUES ('$comp_id','$customer_id','$loan_id','$blanch_id','$update_res','$deposit_date','$p_method','$role','$empl_id','$day_int','$day_princ','$loan_status','$group_id','$date','$wakala')");
        return $this->db->insert_id();
    }





    public function data_with_depost($customer_id = null){
    ini_set("max_execution_time", 3600);
    $this->load->model('queries');

    if (empty($customer_id)) {
      $customer_id = $this->input->post('customer_id');
    }

    if (empty($customer_id)) {
      $this->session->set_flashdata('error', 'Customer is required.');
      return redirect('oficer');
    }

    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);
    $privillage = $this->queries->get_position_empl($empl_id);
   
//     echo "<pre>";
// print_r($comp_id);
// echo "</pre>";
// exit();
  
    $depost = $this->queries->get_sumTodayDepostBlanch($blanch_id);
    $withdraw = $this->queries->get_sumTodayWithdrawalBlanch($blanch_id);
    $blanch_amount_balance = $this->queries->get_blanch_capital_data($blanch_id);


    $customer = $this->queries->search_CustomerLoan($customer_id);
    $customery = $this->queries->get_allcutomerblanchData($blanch_id);
    $comp_id = $this->input->post('comp_id');
    @$blanch_id = $customer->blanch_id;
    $acount = $this->queries->get_customer_account_verfied($blanch_id);

  


       // print_r($loan_id);
       //          exit();
    $this->load->view('officer/depost_withdrow',['customer'=>$customer,'customery'=>$customery,'acount'=>$acount,'blanch_amount_balance'=>$blanch_amount_balance,'depost'=>$depost,'withdraw'=>$withdraw,'empl_data'=>$empl_data,'privillage'=>$privillage]);
}


public function penalt_today ()
{

   $this->load->model('queries');
   $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $detail_income = $this->queries->get_income_detailBlanchData($blanch_id);

    // print_r($detail_income);
    //       exit();

          $this->load->view('officer/penalt_today',['detail_income'=>$detail_income,'empl_data'=>$empl_data]);

}


public function create_withdrow_balance($customer_id){
    ini_set("max_execution_time", 3600);
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);
   
    $this->form_validation->set_rules('customer_id','Customer','required');
    $this->form_validation->set_rules('comp_id','Company','required');
    $this->form_validation->set_rules('blanch_id','blanch','required');
    $this->form_validation->set_rules('loan_id','Loan','required');
    $this->form_validation->set_rules('method','method','required');
    $this->form_validation->set_rules('withdrow','withdrow','required');
    $this->form_validation->set_rules('loan_status','loan status','required');
    // $this->form_validation->set_rules('code','Code','required');
    $this->form_validation->set_rules('with_date','with date','required');
    $this->form_validation->set_rules('description','description','required');
    if ($this->form_validation->run() ) {
          $data = $this->input->post();

          $withdrow_newbalance = $data['withdrow'];
          $loan_id = $data['loan_id'];
          $customer_id = $data['customer_id'];
          $blanch_id = $data['blanch_id'];
          $comp_id = $data['comp_id'];
          $description = $data['description'];
          $method = $data['method'];
          //  $new_code = $data['code'];
          $with_date = $data['with_date'];
          $loan_status = 'withdrawal';
          $new_balance = $withdrow_newbalance;
          $with_method = $method;
          $statusLoan = $loan_status;
          $payment_method = $method;
          $trans_id = $method;
      
          //  print_r($new_balance);
          // echo "</pre>";
          //       exit();

          $day_loan = $this->queries->get_loan_day($loan_id);
          $day = $day_loan->day;
          $disburse_day = $day_loan->disburse_day;
          $dis_day = $day_loan->dis_date;
          $session = $day_loan->session;
          $group_id = $day_loan->group_id;
          $code = $day_loan->code;
          $loan_aprove = $day_loan->loan_aprove;
          $restoration = $day_loan->restration;
          $loan_codeID = $day_loan->loan_code;
          $empl_id = $day_loan->empl_id;
          //admin role
          $role = $empl_data->username;
          $end_date = $day * $session;

        $customer_name = $day_loan->f_name . ' ' . $day_loan->m_name . ' ' . $day_loan->l_name;
$sponsor_name = $day_loan->sp_name . ' ' . $day_loan->sp_mname . ' ' . $day_loan->sp_lname;
$phone_sp = $day_loan->sp_phone_no;
$loan_amount = number_format($day_loan->loan_int);
$loan_end = date('d.m.Y', strtotime($day_loan->loan_end_date));



if (substr($phone_sp, 0, 1) === '0') {
    $phone = '255' . substr($phone_sp, 1);
} else {
    $phone = $phone_sp;
}





// Ujumbe unaotumia comp_name


    // print_r($phone);
    //       echo "</pre>";
    //             exit();




        

        //company loan fee setting
         $comp_fee = $this->queries->get_loanfee_categoryData($comp_id);
         $aina_makato = $comp_fee->fee_category;
          //loanfee setting
         $fee_type = $this->queries->get_loanfee_type($comp_id);
         $type = $fee_type->type;

          
         if ($aina_makato == 'LOAN PRODUCT') {
         $category_loan = $this->queries->get_loanproduct_fee($loan_id);
         $fee_category_type = $category_loan->fee_category_type;
         $fee_value = $category_loan->fee_value;
            if ($fee_category_type == 'MONEY') {
            $sum_fee = $this->queries->get_sumfeepercentage($loan_id);
            $fee = $sum_fee->total_fee;
            $sum_total_loanFee = $fee;
            }elseif ($fee_category_type == 'PERCENTAGE') {
                //echo "makato ya percent";
            $sum_fee = $this->queries->get_sumfeepercentage($loan_id);
            $fee = $sum_fee->total_fee;
            $sum_total_loanFee = $loan_aprove * $fee / 100; 
            }
               
          }elseif ($aina_makato == 'GENERAL') {
          if ($type == 'PERCENTAGE VALUE') {
          $sum_fee = $this->queries->get_sumfeepercentage($loan_id);
          $fee = $sum_fee->total_fee;
          $sum_total_loanFee = $loan_aprove * $fee / 100;
          }elseif ($type == 'MONEY VALUE') {
          $sum_fee = $this->queries->get_sumfeepercentage($loan_id);
          $fee = $sum_fee->total_fee;
          $sum_total_loanFee = $fee;
         }

        }

          //branch Account
          @$blanch_account = $this->queries->get_amount_remainAmountBlanch($blanch_id,$payment_method);
          $blanch_capital = @$blanch_account->blanch_capital;
          $withMoney = ($blanch_capital) - ($new_balance);
            
          //sms count function
          @$smscount = $this->queries->get_smsCountDate($comp_id);
          $sms_number = @$smscount->sms_number;  
          $sms_id = @$smscount->sms_id;  
           
          //                 echo "<pre>";
          // print_r( $blanch_capital);
          //  echo "<br>";
          //  exit();
           
                
          $datas_balance = $this->queries->get_remainbalance($customer_id);
          $customer_data = $this->queries->get_customerData($customer_id);
          $phone = $customer_data->phone_no;
          $old_balance = $datas_balance->balance;
          $branch_name =$customer_data->blanch_name;
          $balance = $old_balance;
          $with_balance = $balance - $new_balance; 
  // print_r(  $balance);
  //          echo "<br>";
  //          exit();
          $up_balance = $this->queries->get_upBalance_Data($customer_id);
          $balance = $up_balance->balance;
          $input_balance = $withdrow_newbalance;

          $today_float = $this->queries->get_today_cash($blanch_id);
          $float = $today_float->blanch_capital;
          $remain_balance = $balance;
          $today = date("Y-m-d H:i");

          
          $company_name = $company_data->comp_name;
          $amount       = number_format($remain_balance, 0);
          $today        = date('Y-m-d');
          
        // //   $massage = "Habari $full_name, umepokea Tsh $amount kutoka $company_name tarehe $today. Tunakutakia urejeshaji mwema wa mkopo. Asante kwa kutumia huduma zetu.";
        // $massage = "Habari! Ombi la mkopo wa tsh $amount katika tawi la $branch_name kwa $full_name mwenye namba $phone limeidhinishwa na Manager $day_loan->approved_by .Ahsante.";
    
        // // List of phone numbers to notify
        // $numbers = [
                   
        //     '255769096078',
        //   '255765453435',      // Admin or officer 2
        // ];
        
        // // Send SMS to each number
        // foreach ($numbers as $phone) {
        //   $this->sendsms($phone, $massage);
        // }
              
            @$check_deducted = $this->queries->get_deducted_blanch($blanch_id);
            $deducted = @$check_deducted->deducted;
            $blanch_deducted = @$check_deducted->blanch_id;
           
            $new_deducted = $deducted + $sum_total_loanFee;

               if($new_code === $code){
                 $this->session->set_flashdata('error','Pin ya mteja Uliyojaza Haipo Sahihi!!');
               }else
               if($blanch_capital < $withdrow_newbalance){
            $this->session->set_flashdata('error','Huna salio la kutosha kwenye mfumo kuweza kutoa mkopo. Tafadhali wasiliana na Meneja .');
             }elseif($input_balance <= $balance){
              //$day_loandata = $this->queries->get_loan_day($loan_id);
               $this->witdrow_balance($loan_id,$comp_id,$blanch_id,$customer_id,$new_balance,$with_balance,$description,$role,$method,$group_id);
               $this->insert_loan_lecordData($comp_id,$customer_id,$loan_id,$blanch_id,$new_balance,$group_id,$empl_id,$trans_id,$restoration,$loan_aprove);
              $this->withdrawal_blanch_capital($blanch_id,$payment_method,$withMoney);
              $this->queries->record_account_balance_movement(array(
                'comp_id' => $comp_id,
                'blanch_id' => $blanch_id,
                'trans_id' => $payment_method,
                'reference_type' => 'loan_withdrawal',
                'reference_id' => $loan_id,
                'movement_date' => $with_date,
                'amount_out' => $new_balance,
                'balance_before' => $blanch_capital,
                'balance_after' => $withMoney,
                'description' => 'Loan withdrawal',
                'created_by' => $this->session->userdata('empl_id'),
              ));

              $this->queries->save_cash_inhand_balance(
                $comp_id,
                $blanch_id,
                $payment_method,
                $this->session->userdata('empl_id'),
                $withMoney,
                $with_date
              );

              $this->insert_deducted_fee($comp_id,$blanch_id,$loan_id,$sum_total_loanFee,$group_id,$with_date);
               if ($blanch_deducted == TRUE) {
                $this->update_old_deducted_balance($comp_id,$blanch_id,$new_deducted);
                //echo "update";
               }else{
                $this->insert_sum_deducted_fee($comp_id,$blanch_id,$sum_total_loanFee);
                //echo "ingiza";
               }
               $this->update_withtime($loan_id,$with_method,$statusLoan,$input_balance,$with_date);
               $this->update_returntime($loan_id,$day,$dis_day,$with_date);
               $this->insert_startLoan_date($comp_id,$loan_id,$blanch_id,$end_date,$customer_id,$with_date);
               $this->update_customer_status($customer_id);
                if($company_data->sms_status == 'YES'){

               if (@$smscount->sms_number == TRUE) {
                $new_sms = 1;
                $total_sms = @$sms_number + $new_sms;
                $this->update_count_sms($comp_id,$total_sms,$sms_id);
                }elseif (@$smscount->sms_number == FALSE) {
               $sms_number = 1;
               $this->insert_count_sms($comp_id,$sms_number);
               }
                  //$this->sendsms($phone,$massage);  
                }elseif($company_data->sms_status == 'NO'){
                  //echo "HAKUNA SMS HAPA";
                }
        

               $this->session->set_flashdata('massage','withdrow Has made Sucessfully');
              }else{
             $this->session->set_flashdata('error','You don`t have Enough balance');
              }
          //               echo "<pre>";
          // print_r( $day_loan );
          //  echo "<br>";

          //  exit();

 
// $massage = " $company_name inakujulisha, mkopaji $customer_name ambaye ulikubali kumdhamini awali tayari amepokea mkopo wa sh. $loan_amount. Utapaswa kufuatilia malipo yake yote hadi mkopo uwe umemalizika";

		// $this->sendsms($phone,$massage);

         return redirect('oficer/data_with_depost/'.$customer_id);
    }
   $this->data_with_depost($customer_id);
    
}



    //update deducted fee
     public function update_old_deducted_balance($comp_id,$blanch_id,$new_deducted){
      $sqldata="UPDATE `tbl_receive_deducted` SET `deducted`= '$new_deducted' WHERE `blanch_id`= '$blanch_id'";
      $query = $this->db->query($sqldata);
      return true;  
     }

     //insert sumdeducted fee
     public function insert_sum_deducted_fee($comp_id,$blanch_id,$sum_total_loanFee){
      $this->db->query("INSERT INTO tbl_receive_deducted (`comp_id`,`blanch_id`,`deducted`) VALUES ('$comp_id','$blanch_id','$sum_total_loanFee')");    
     }
//insert deducted fee
 public function insert_deducted_fee($comp_id,$blanch_id,$loan_id,$sum_total_loanFee,$group_id,$deducted_date = null){
  $day = !empty($deducted_date) ? $deducted_date : date("Y-m-d");
    $this->db->query("INSERT INTO tbl_deducted_fee (`comp_id`,`blanch_id`,`loan_id`,`deducted_balance`,`deducted_date`,`group_id`) VALUES ('$comp_id','$blanch_id','$loan_id','$sum_total_loanFee','$day','$group_id')");  
 }
//withdral blanch Float
public function withdrawal_blanch_capital($blanch_id,$payment_method,$withMoney){
$sqldata="UPDATE `tbl_blanch_account` SET `blanch_capital`= '$withMoney' WHERE `blanch_id`= '$blanch_id' AND `receive_trans_id` = '$payment_method'";
    // print_r($sqldata);
    //  echo "<br>";
    //    exit();
  $query = $this->db->query($sqldata);
   return true;
}

//update customer status
public function update_customer_status($customer_id){
$sqldata="UPDATE `tbl_customer` SET `customer_status`= 'open' WHERE `customer_id`= '$customer_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
   return true;
}


public function witdrow_balance($loan_id,$comp_id,$blanch_id,$customer_id,$new_balance,$with_balance,$description,$role,$method,$group_id){
        $day = date("Y-m-d");
     $this->db->query("INSERT INTO tbl_pay (`loan_id`,`blanch_id`,`comp_id`,`customer_id`,`withdrow`,`balance`,`description`,`pay_status`,`stat`,`date_pay`,`emply`,`p_method`,`group_id`,`date_data`) VALUES ('$loan_id','$blanch_id','$comp_id','$customer_id','$new_balance','$with_balance','$description','2','1','$day','$role','$method','$group_id','$day')");
      }


      public function insert_loan_lecordData($comp_id,$customer_id,$loan_id,$blanch_id,$new_balance,$group_id,$empl_id,$trans_id,$restoration,$loan_aprove){
    $day = date("Y-m-d");
    $this->db->query("INSERT INTO tbl_prev_lecod (`comp_id`,`customer_id`,`loan_id`,`blanch_id`,`withdraw`,`lecod_day`,`group_id`,`empl_id`,`time_rec`,`restrations`,`loan_aprov`,`with_trans`) VALUES ('$comp_id','$customer_id','$loan_id','$blanch_id','$loan_aprove','$day','$group_id','$empl_id','$day','$restoration','$loan_aprove','$trans_id')");
  
}

//update withdraw time
 public function update_withtime($loan_id,$with_method,$statusLoan,$input_balance,$with_date){
    $data_day = $with_date;
  $sqldata="UPDATE `tbl_loans` SET `dis_date`= '$data_day',`method`='$with_method',`loan_status`='$statusLoan',`disburse_day`='$data_day',`with_amount`='$input_balance',`region_id`='ok' WHERE `loan_id`= '$loan_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
   return true;
}


//update return date
public function update_returntime($loan_id,$day,$dis_date,$with_date){
$now = $with_date;
$someDate = DateTime::createFromFormat("Y-m-d",$now);
$someDate->add(new DateInterval('P'.$day.'D'));
 //echo $someDate->format("Y-m-d");
       $return_data = $someDate->format("Y-m-d 23:59");
       $rtn = $someDate->format("Y-m-d");

$sqldata="UPDATE `tbl_loans` SET `dis_date`='$now',`return_date`= '$return_data',`date_show`='$rtn' WHERE `loan_id`= '$loan_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
   return true;
}




//insert start loan and end loan  date
public function insert_startLoan_date($comp_id,$loan_id,$blanch_id,$end_date,$customer_id,$with_date){
$this->load->model('queries');
ini_set("max_execution_time", 3600);
$get_day = $this->queries->get_loan_day($loan_id);
$day = $get_day->day;
$now = $with_date;
$someDate = DateTime::createFromFormat("Y-m-d",$now);
$someDate->add(new DateInterval('P'.$end_date.'D'));
$return_data = $someDate->format("Y-m-d 23:59");

$this->db->query("INSERT INTO tbl_outstand (`comp_id`,`loan_id`,`blanch_id`,`loan_stat_date`,`loan_end_date`) VALUES ('$comp_id','$loan_id','$blanch_id','$now','$return_data')");
//     if ($day == 1) {
//      $begin = new DateTime($now);
//      $end = new DateTime($return_data);
//      //$end = $end->modify( '+1 day' );
     
//      $array = array();
//      $interval = DateInterval::createFromDateString('1 day');
//      $period = new DatePeriod($begin, $interval, $end);
      
//      foreach($period as $dt){
//      $array[] = $dt->format("Y-m-d");   
//      } 
//       $loan_id = $loan_id;
//       $customer_id = $customer_id;
//        for($i=0; $i<count($array);$i++) {
//         //$loan_id = 1;
//       $this->db->query("INSERT INTO  tbl_test_date (`date`,`loan_id`,`customer_id`) 
//       VALUES ('".$array[$i]."','$loan_id','$customer_id')"); 
//        }
//    $this->update_shedure_status($loan_id);
//     }elseif($day == 7){
// $startTime = strtotime($now);
// $endTime = strtotime($return_data);
// $weeks = array();
// while ($startTime < $endTime) {  
//     $weeks[] = date('Y-m-d', $startTime); 
//     $startTime += strtotime('+1 week', 0);
// }
//       $loan_id = $loan_id;
//       $customer_id = $customer_id;
//        for($i=0; $i<count($weeks);$i++) {
//         //$loan_id = 1;
//       $this->db->query("INSERT INTO  tbl_test_date (`date`,`loan_id`,`customer_id`) 
//       VALUES ('".$weeks[$i]."','$loan_id','$customer_id')"); 
//      }
//    $this->update_shedure_status($loan_id);
//     }elseif($day == 30){
//     $start = $month = strtotime($now);
// $end = strtotime($return_data);
// $months = array();
//    while($month < $end){
//      $months[] = date('Y-m-d', $month);
//      $month = strtotime("+1 month", $month);  
//   }
//       $loan_id = $loan_id;
//       $customer_id = $customer_id;
//        for($i=0; $i<count($months);$i++) {
//         //$loan_id = 1;
//       $this->db->query("INSERT INTO  tbl_test_date (`date`,`loan_id`,`customer_id`) 
//       VALUES ('".$months[$i]."','$loan_id','$customer_id')"); 
//      }
//      $this->update_shedure_status($loan_id);
//     }
}

     public function update_shedure_status($loan_id){
     $today = date("Y-m-d");
     $sqldata="UPDATE `tbl_test_date` SET `date_status`= 'withdrawal' WHERE `loan_id`= '$loan_id' AND `date` ='$today'";
    // print_r($sqldata);
    //    exit();
     $query = $this->db->query($sqldata);
     return true;   
     }


     public function cash_transaction(){
      // $position = strtoupper($this->session->userdata('position_name'));
      $this->load->model('queries');
      $blanch_id = $this->session->userdata('blanch_id');
      $empl_id = $this->session->userdata('empl_id');
      $manager_data = $this->queries->get_manager_data($empl_id);
      $comp_id = $manager_data->comp_id;
      $company_data = $this->queries->get_companyData($comp_id);
      $blanch_data = $this->queries->get_blanchData($blanch_id);
      $empl_data = $this->queries->get_employee_data($empl_id);
     
    //   echo "<pre>";
    //    print_r($lazo_data);
    //  echo "<pre>";
    //    exit();
     
     
      $privillage = $this->queries->get_position_empl($empl_id);
      $manager = $this->queries->get_position_manager($empl_id);
  
      // if ($position === 'LOAN OFFICER') {
      //     $cash = $this->queries->get_cash_transaction_by_officer($empl_id);
      //     $lazo =$this->queries->get_today_offficerexpected_collections($blanch_id, $empl_id);
      //     $sum_depost = $this->queries->get_sumCashtransDepostByOfficer($empl_id);
      //     $sum_withdrawls = $this->queries->get_sumCashtransWithdrowByOfficer($empl_id);
      //      echo "<pre>";
      // print_r($lazo );
      // exit();

      // } elseif ($position === 'BRANCH MANAGER') {
        $lazo =$this->queries->managerexpected_collections( $blanch_id);
          $cash = $this->queries->get_cash_transactionBlanch($blanch_id);
          $sum_depost = $this->queries->get_sumCashtransDepostBlanch($blanch_id);
          $sum_withdrawls = $this->queries->get_sumCashtransWithdrowBlanch($blanch_id);
      // } else {
      //     $cash = [];
      //     $sum_depost = 0;
      // }
    
     
      // echo "<pre>";
      // print_r($lazo  );
      // exit();
  
      $this->load->view('officer/cash_transaction', [
          'cash' => $cash,
          'lazo' =>$lazo,
          'sum_depost' => $sum_depost,
          'sum_withdrawls' => $sum_withdrawls,
          'empl_data' => $empl_data,
          'privillage' => $privillage,
          'manager' => $manager
      ]);
  }
  
  public function withdraw_transactions()

  {
    // $position = strtoupper(trim($this->session->userdata('position_name')));


      $this->load->model('queries');
      $blanch_id = $this->session->userdata('blanch_id');
      $empl_id = $this->session->userdata('empl_id');
  
      $manager_data = $this->queries->get_manager_data($empl_id);
      $comp_id = $manager_data->comp_id;
  
      $company_data = $this->queries->get_companyData($comp_id);
      $blanch_data = $this->queries->get_blanchData($blanch_id);
      $empl_data = $this->queries->get_employee_data($empl_id);
  
     
      $total_loanDis = $this->queries->get_sum_loanwithdrawal_data($comp_id);
      $total_interest_loan = $this->queries->get_sum_loanwithdrawal_interest($comp_id);
      $privillage = $this->queries->get_position_empl($empl_id);
      $manager = $this->queries->get_position_manager($empl_id);

      // if ($position === 'LOAN OFFICER') {
    
      //   $disburse_grouped = $this->queries->get_grouped_withdrawal_officertodayBlanch($blanch_id, $empl_id);
      
        // echo "<pre>";get_cash_transaction_by_officer($empl_id, $blanch_id)
        // print_r( $lipwa);
        //     exit();
    
    // } elseif ($position === 'BRANCH MANAGER') {
      
      $disburse_grouped = $this->queries->get_grouped_withdrawal_todayBlanch($blanch_id);
        
    
    // } else {
    //   $disburse_grouped=0;
    // }
  
      $this->load->view('officer/loan_withdrawal', [
          'disburse_grouped' => $disburse_grouped,
          'total_loanDis' => $total_loanDis,
          'total_interest_loan' => $total_interest_loan,
          'empl_data' => $empl_data,
          'privillage' => $privillage,
          'manager' => $manager,
          'sno' => 1
      ]);
  }

  public function print_manager_withdrawal_pdf()
  {
      $this->load->model('queries');
      $blanch_id = $this->session->userdata('blanch_id');

        // Get dates from GET params
        $from_date = $this->input->get('from_date');
        $to_date   = $this->input->get('to_date');
        $filter_month = $this->input->get('filter_month');

        // Monthly shortcut: if month selected, derive from/to from that month
        if (!empty($filter_month) && preg_match('/^\d{4}-\d{2}$/', $filter_month)) {
          $from_date = $filter_month . '-01';
          $to_date = date('Y-m-t', strtotime($from_date));
        }

      // Default fallback if dates not provided
      if (!$from_date) $from_date = date('Y-m-01');
      if (!$to_date)   $to_date   = date('Y-m-d');

      $empl_id      = $this->session->userdata('empl_id');
      $manager_data = $this->queries->get_manager_data($empl_id);
      $comp_id      = $manager_data->comp_id;
      $compdata     = $this->queries->get_companyData($comp_id);
      $blanch       = $this->queries->get_blanchData($blanch_id);

      // Flat filtered data — same as what the web view shows
        $filters = [
          'blanch_id' => $blanch_id,
          'from' => $from_date,
          'to' => $to_date,
          'exclude_loan_status' => 'disbarsed',
            'group_by_customer' => true,
        ];
      $disburse = $this->queries->get_withdrawal_Loan($comp_id, $filters);

      $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L', 'orientation' => 'L', 'tempDir' => APPPATH . 'tmp/mpdf']);
      $html = $this->load->view('officer/loan_withdrawal_report', [
          'compdata'  => $compdata,
          'blanch'    => $blanch,
          'disburse'  => $disburse,
          'from_date' => $from_date,
          'to_date'   => $to_date,
      ], true);

      $mpdf->SetFooter('Generated By Brainsoft Technology');
      $mpdf->WriteHTML($html);

      $branch_name_safe = preg_replace('/[^A-Za-z0-9_\-]/', '_', $blanch->blanch_name);
      $filename = "Loan_Withdrawal_Report_" . $branch_name_safe . "_" . $from_date . "_to_" . $to_date . ".pdf";

        $mpdf->Output($filename, \Mpdf\Output\Destination::DOWNLOAD);
  }
  
  

  
  public function filter_manager_withdrawal()
{
    $this->load->model('queries');

    // Get branch ID and dates from GET parameters
    $blanch_id = $this->session->userdata('blanch_id');
    $from_date = $this->input->get('from_date');
    $to_date = $this->input->get('to_date');

    // Basic check if dates are provided
    if (!$from_date || !$to_date) {
        redirect('oficer/print_manager_withdrawal_pdf');  // fallback redirect
    }

    // Get filtered data from the model (you'll create this next)
    $disburse_grouped = $this->queries->get_grouped_withdrawal_LoanBlanch_by_date($blanch_id, $from_date, $to_date);
    $compdata = $this->queries->get_companyData($this->session->userdata('comp_id'));
    $total_interest_loan = $this->queries->get_sum_loanwithdrawal_interestBlanch_by_date($blanch_id, $from_date, $to_date);
    $blanch = $this->queries->get_blanchData($blanch_id);

    // Pass data to the view
    $data = [
        'compdata' => $compdata,
        'disburse_grouped' => $disburse_grouped,
        'total_interest_loan' => $total_interest_loan,
        'blanch' => $blanch,
        'from_date' => $from_date,
        'to_date' => $to_date,
    ];

    $this->load->view('officer/loan_withdrawal_report', $data);
}


 public function manager_cashTransaction(){
  $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $cash = $this->queries->get_cash_transaction($comp_id);
    $sum_depost = $this->queries->get_sumCashtransDepost($comp_id);
    $sum_withdrawls = $this->queries->get_sumCashtransWithdrow($comp_id);
    $privillage = $this->queries->get_position_empl($empl_id);
    $manager = $this->queries->get_position_manager($empl_id);
       //  echo "<pre>";
       // print_r($sum_withdrawls);
       //       exit();
    $this->load->view('officer/cash_transaction',['cash'=>$cash,'sum_depost'=>$sum_depost,'sum_withdrawls'=>$sum_withdrawls,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);  
 }


    public function prev_cashtransaction(){
    $this->load->model('queries');
   $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $from = $this->input->post('from');
    $to = $this->input->post('to');
    $blanch_id = $this->input->post('blanch_id');
    $data = $this->queries->search_prev_cashtransactionBlanch($from,$to,$blanch_id);
    $total_cashDepost = $this->queries->get_sumCashtransDepostPrviousBlanch($from,$to,$blanch_id);
    $total_withdrawal = $this->queries->get_sumCashtransWithdrowPreviousBlanch($from,$to,$blanch_id);
    $privillage = $this->queries->get_position_empl($empl_id);
    $manager = $this->queries->get_position_manager($empl_id);
       //     echo "<pre>";
       // print_r($data);
       //        exit();

    $this->load->view('officer/previous_cash',['data'=>$data,'from'=>$from,'to'=>$to,'blanch_id'=>$blanch_id,'total_cashDepost'=>$total_cashDepost,'total_withdrawal'=>$total_withdrawal,'comp_id'=>$comp_id,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
    }

    public function manager_prevTransaction(){
      $this->load->model('queries');
   $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $from = $this->input->post('from');
    $to = $this->input->post('to');
    $comp_id = $this->input->post('comp_id');
    $data = $this->queries->search_prev_cashtransaction($from,$to,$comp_id,$blanch_id);
    $total_cashDepost = $this->queries->get_sumCashtransDepostPrvious($from,$to,$comp_id,$blanch_id);
    $total_withdrawal = $this->queries->get_sumCashtransWithdrowPrevious($from,$to,$comp_id,$blanch_id);
    $privillage = $this->queries->get_position_empl($empl_id);
    $manager = $this->queries->get_position_manager($empl_id);
       //     echo "<pre>";
       // print_r($data);
       //        exit();

    $this->load->view('officer/manager_previous_cash',['data'=>$data,'from'=>$from,'to'=>$to,'total_cashDepost'=>$total_cashDepost,'total_withdrawal'=>$total_withdrawal,'comp_id'=>$comp_id,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);   
    }


    public function print_cash(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $cash = $this->queries->get_cash_transactionBlanch($blanch_id);
    $compdata = $this->queries->get_companyData($comp_id);
    $sum_depost = $this->queries->get_sumCashtransDepostBlanch($blanch_id);
    $sum_withdrawls = $this->queries->get_sumCashtransWithdrowBlanch($blanch_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl = $this->queries-> get_employee_data($empl_id);
        // print_r($empl);
        //        exit();
    $mpdf = new \Mpdf\Mpdf(['tempDir' => APPPATH . 'tmp/mpdf']);
    $html = $this->load->view('officer/print_cash_transaction',['cash'=>$cash,'empl'=> $empl,'compdata'=>$compdata,'sum_depost'=>$sum_depost,'sum_withdrawls'=>$sum_withdrawls,'empl_data'=>$empl_data,'blanch_data'=>$blanch_data],true);
    $mpdf->SetFooter('Generated By Brainsoft Technology');
        $mpdf->WriteHTML($html);
        $mpdf->Output('Miamala.pdf', \Mpdf\Output\Destination::INLINE);
        
         
    }


    public function print_manager_cash_transaction()

    {

      $this->load->model('queries');
      $blanch_id = $this->session->userdata('blanch_id');
      $empl_id = $this->session->userdata('empl_id');
      $manager_data = $this->queries->get_manager_data($empl_id);
      $comp_id = $manager_data->comp_id;
      $company_data = $this->queries->get_companyData($comp_id);
      $blanch_data = $this->queries->get_blanchData($blanch_id);
      $empl_data = $this->queries->get_employee_data($empl_id);


      $lazo =$this->queries->managerexpected_collections( $blanch_id);
      $faini = $this->queries->get_income_detailBlanchData($blanch_id);
  $gawa =$this->queries->get_DisbarsedLoanBlanch_today($blanch_id);
        // echo "<pre>";
        //    print_r($lazo  );
        //          exit();
    
      $company_name = $company_data->comp_name;
     
    
      // ✅ Set landscape mode: 'A4-L' for A4 Landscape
      $mpdf = new \Mpdf\Mpdf([
        'format' => 'A4-L', // A4 size in Landscape orientation
        'orientation' => 'L', // Optional, since 'A4-L' already sets it
          'tempDir' => APPPATH . 'tmp/mpdf',
      ]);
    
      // Load the HTML view
      $html = $this->load->view('officer/print_managercash_transaction', [
        'company_name' => $company_name,
        'blanch_data'=>$blanch_data,
        'faini'=>$faini,
        'gawa'=>$gawa ,
        'lazo' => $lazo,
      ], true);
    
      // Set the footer
      $mpdf->SetFooter('Generated By Brainsoft Technology');
    
      // Write the content
      $mpdf->WriteHTML($html);
    
      // Output the PDF
      $filename = $company_name . '_cash_transaction.pdf';
      $mpdf->Output($filename, 'I'); // Use 'I' for inline view in browser

    }


    public function print_manager_todaycash_transaction()
    {
    
      $this->load->model('queries');
      $blanch_id = $this->session->userdata('blanch_id');
      $empl_id = $this->session->userdata('empl_id');
      $manager_data = $this->queries->get_manager_data($empl_id);
      $comp_id = $manager_data->comp_id;
      $company_data = $this->queries->get_companyData($comp_id);
      $blanch_data = $this->queries->get_blanchData($blanch_id);
      $empl_data = $this->queries->get_employee_data($empl_id);

      $cash = $this->queries->get_cash_transactionBlanch($blanch_id);
      $sum_depost = $this->queries->get_sumCashtransDepostBlanch($blanch_id);
      $sum_withdrawls = $this->queries->get_sumCashtransWithdrowBlanch($blanch_id);
      
      $privillage = $this->queries->get_position_empl($empl_id);
      $manager = $this->queries->get_position_manager($empl_id);

        // echo "<pre>";
        //    print_r(  $cash  );
        //          exit();

      $company_name = $company_data->comp_name;
      
        //  echo "<pre>";
        //    print_r(  $blanch_data );
        //          exit();


      $mpdf = new \Mpdf\Mpdf([
        'format' => 'A4-L', // A4 size in Landscape orientation
        'orientation' => 'L', // Optional, since 'A4-L' already sets it
          'tempDir' => APPPATH . 'tmp/mpdf',
      ]);
    
      // Load the HTML view
      $html = $this->load->view('officer/print_manager_todaycash_transaction', [
        'company_name' => $company_name,
        'blanch_data'=>$blanch_data,
        'manager_data'=>$manager_data,
        'cash' =>  $cash ,
      ], true);
    
      // Set the footer
      $mpdf->SetFooter('Generated By Brainsoft Technology');
    
      // Write the content
      $mpdf->WriteHTML($html);
    
      // Output the PDF
      $filename = $company_name . '_officer_cash_transaction.pdf';
      $mpdf->Output($filename, 'I'); // Use 'I' for inline view in browser
    
  
      
    }

    public function print_officer_cash_transaction()
    {

      $this->load->model('queries');
      $blanch_id = $this->session->userdata('blanch_id');
      $empl_id = $this->session->userdata('empl_id');
      $manager_data = $this->queries->get_manager_data($empl_id);
      $comp_id = $manager_data->comp_id;
      $company_data = $this->queries->get_companyData($comp_id);
      $blanch_data = $this->queries->get_blanchData($blanch_id);
      $empl_data = $this->queries->get_employee_data($empl_id);

      $lazo =$this->queries->get_today_offficerexpected_collections($blanch_id, $empl_id);
  
        // echo "<pre>";
        //    print_r( $lazo  );
        //          exit();
    
      $company_name = $company_data->comp_name;
      $company_name = preg_replace('/[^a-zA-Z0-9_-]/', '_', $company_name);
    
      // ✅ Set landscape mode: 'A4-L' for A4 Landscape
      $mpdf = new \Mpdf\Mpdf([
        'format' => 'A4-L', // A4 size in Landscape orientation
        'orientation' => 'L', // Optional, since 'A4-L' already sets it
          'tempDir' => APPPATH . 'tmp/mpdf',
      ]);
    
      // Load the HTML view
      $html = $this->load->view('officer/print_officercash_transaction', [
        'company_name' => $company_name,
        'blanch_data'=>$blanch_data,
        'manager_data'=>$manager_data,
        'lazo' => $lazo,
      ], true);
    
      // Set the footer
      $mpdf->SetFooter('Generated By Brainsoft Technology');
    
      // Write the content
      $mpdf->WriteHTML($html);
    
      // Output the PDF
      $filename = $company_name . '_officer_cash_transaction.pdf';
      $mpdf->Output($filename, 'I'); // Use 'I' for inline view in browser

    }


    public function manager_printCash(){
      $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $cash = $this->queries->get_cash_transaction($comp_id);
    $compdata = $this->queries->get_companyData($comp_id);
    $sum_depost = $this->queries->get_sumCashtransDepost($comp_id);
    $sum_withdrawls = $this->queries->get_sumCashtransWithdrow($comp_id);
        // print_r($comdata);
        //        exit();
    $mpdf = new \Mpdf\Mpdf(['tempDir' => APPPATH . 'tmp/mpdf']);
    $html = $this->load->view('officer/print_cash_transaction',['cash'=>$cash,'compdata'=>$compdata,'sum_depost'=>$sum_depost,'sum_withdrawls'=>$sum_withdrawls,'empl_data'=>$empl_data],true);
    $mpdf->SetFooter('Generated By Brainsoft Technology');
        $mpdf->WriteHTML($html);
        $mpdf->Output();  
    }


     public function print_previous_cash($from,$to,$blanch_id){
    $this->load->model('queries');
     $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $compdata = $this->queries->get_companyData($comp_id);
    $data = $this->queries->search_prev_cashtransactionBlanch($from,$to,$blanch_id);
    $total_cashDepost = $this->queries->get_sumCashtransDepostPrviousBlanch($from,$to,$blanch_id);
    $total_withdrawal = $this->queries->get_sumCashtransWithdrowPreviousBlanch($from,$to,$blanch_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $mpdf = new \Mpdf\Mpdf(['tempDir' => APPPATH . 'tmp/mpdf']);
    $html = $this->load->view('officer/previous_cash_report',['compdata'=>$compdata,'data'=>$data,'total_cashDepost'=>$total_cashDepost,'total_withdrawal'=>$total_withdrawal,'from'=>$from,'to'=>$to,'empl_data'=>$empl_data,'blanch_data'=>$blanch_data],true);
    $mpdf->SetFooter('Generated By Brainsoft Technology');
    $mpdf->WriteHTML($html);
    $mpdf->Output();
         
    }


     public function Manager_print_previous_cash($from,$to,$comp_id){
    $this->load->model('queries');
     $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $compdata = $this->queries->get_companyData($comp_id);
    $data = $this->queries->search_prev_cashtransaction($from,$to,$comp_id);
    $total_cashDepost = $this->queries->get_sumCashtransDepostPrvious($from,$to,$comp_id);
    $total_withdrawal = $this->queries->get_sumCashtransWithdrowPrevious($from,$to,$comp_id);
    $mpdf = new \Mpdf\Mpdf(['tempDir' => APPPATH . 'tmp/mpdf']);
    $html = $this->load->view('officer/manager_print_cash',['compdata'=>$compdata,'data'=>$data,'total_cashDepost'=>$total_cashDepost,'total_withdrawal'=>$total_withdrawal,'from'=>$from,'to'=>$to,'empl_data'=>$empl_data],true);
    $mpdf->SetFooter('Generated By Brainsoft Technology');
    $mpdf->WriteHTML($html);
    $mpdf->Output();
         
    }




    public function blanchiwise_report(){
       $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $data_blanch = $this->queries->get_sumblanch_wiseBlanch($blanch_id);
    $total_allblanch = $this->queries->get_sum_DepostBlanch($blanch_id);
    $total_loan = $this->queries->get_sumloanInterestBlanch($blanch_id);
    $privillage = $this->queries->get_position_empl($empl_id);
    $manager = $this->queries->get_position_manager($empl_id);

    //$jumla_loan = $this->queries->get_total_blanchy($blanch_id);
           //  echo "<pre>";
           // print_r($jumla_loan);
           //       exit();
        $this->load->view('officer/branch_wise_report',['data_blanch'=>$data_blanch,'total_allblanch'=>$total_allblanch,'total_loan'=>$total_loan,'total_allblanch'=>$total_allblanch,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
    }

    public function Manager_blanchiwise_report(){
       $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $data_blanch = $this->queries->get_sumblanch_wise($comp_id);
    $total_allblanch = $this->queries->get_sum_Depost($comp_id);
    $total_loan = $this->queries->get_sumloanInterest($comp_id);
    $privillage = $this->queries->get_position_empl($empl_id);
    $manager = $this->queries->get_position_manager($empl_id);
           //  echo "<pre>";
           // print_r($data_blanch);
           //       exit();
    $this->load->view('officer/manager_blanchwise_sumary',['data_blanch'=>$data_blanch,'total_allblanch'=>$total_allblanch,'total_loan'=>$total_loan,'total_allblanch'=>$total_allblanch,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
    }


     public function print_blanchWisereport(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $compdata = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $data_blanch = $this->queries->get_sumblanch_wiseBlanch($blanch_id);
    $total_allblanch = $this->queries->get_sum_DepostBlanch($blanch_id);
    $total_loan = $this->queries->get_sumloanInterestBlanch($blanch_id);
    $privillage = $this->queries->get_position_empl($empl_id);
            // echo "<pre>";
            //   print_r($company_data);
            //         exit();

    $mpdf = new \Mpdf\Mpdf(['tempDir' => APPPATH . 'tmp/mpdf']);
    $html = $this->load->view('officer/print_blanchwise_report',['data_blanch'=>$data_blanch,'total_allblanch'=>$total_allblanch,'total_loan'=>$total_loan,'compdata'=>$compdata],true);
    $mpdf->SetFooter('Generated By Brainsoft Technology');
        $mpdf->WriteHTML($html);
        $mpdf->Output();

    }


      public function manager_print_blanchWisereport(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $compdata = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $data_blanch = $this->queries->get_sumblanch_wise($comp_id);
    $total_allblanch = $this->queries->get_sum_Depost($comp_id);
    $total_loan = $this->queries->get_sumloanInterest($comp_id);
    $privillage = $this->queries->get_position_empl($empl_id);
            // echo "<pre>";
            //   print_r($company_data);
            //         exit();

    $mpdf = new \Mpdf\Mpdf(['tempDir' => APPPATH . 'tmp/mpdf']);
    $html = $this->load->view('officer/manager_print_blanchwise_report',['data_blanch'=>$data_blanch,'total_allblanch'=>$total_allblanch,'total_loan'=>$total_loan,'compdata'=>$compdata],true);
    $mpdf->SetFooter('Generated By Brainsoft Technology');
        $mpdf->WriteHTML($html);
        $mpdf->Output();

    }


    public function previous_blanchwise_data(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

        $from = $this->input->post('from');
        $to = $this->input->post('to');
        $blanch_id = $this->input->post('blanch_id');
        $data_blanchwise = $this->queries->get_blanchwise_previousBlanch($from,$to,$blanch_id);
        $total_receivable = $this->queries->get_blanchwise_TotalreceivableBlanch($from,$to,$blanch_id);
        $total_receved = $this->queries->get_blanchwise_TotalrecevedBlanch($from,$to,$blanch_id);
        $privillage = $this->queries->get_position_empl($empl_id);
          //       echo "<pre>";
          // print_r($total_receved);
          //       exit();
        $this->load->view('officer/previous_blanchwise',['data_blanchwise'=>$data_blanchwise,'total_receivable'=>$total_receivable,'total_receved'=>$total_receved,'from'=>$from,'to'=>$to,'blanch_id'=>$blanch_id,'empl_data'=>$empl_data,'privillage'=>$privillage]);

    }


    public function print_previous_blanchwise($from,$to,$blanch_id){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);

        $data_blanchwise = $this->queries->get_blanchwise_previousBlanch($from,$to,$blanch_id);
        $total_receivable = $this->queries->get_blanchwise_TotalreceivableBlanch($from,$to,$blanch_id);
        $total_receved = $this->queries->get_blanchwise_TotalrecevedBlanch($from,$to,$blanch_id);
        $compdata = $this->queries->get_companyData($comp_id);
        $privillage = $this->queries->get_position_empl($empl_id); 

        $mpdf = new \Mpdf\Mpdf(['tempDir' => APPPATH . 'tmp/mpdf']);
        $html = $this->load->view('officer/print_previous_blanchwise',['data_blanchwise'=>$data_blanchwise,'total_receivable'=>$total_receivable,'total_receved'=>$total_receved,'from'=>$from,'to'=>$to,'blanch_id'=>$blanch_id,'compdata'=>$compdata,'empl_data'=>$empl_data,'privillage'=>$privillage],true);
        $mpdf->SetFooter('Generated By Brainsoft Technology');
        $mpdf->WriteHTML($html);
        $mpdf->Output();

    }

    public function loan_pending_time() {
      // $position = strtoupper(trim($this->session->userdata('position_name')));
      $this->load->model('queries');
  
      $blanch_id = $this->session->userdata('blanch_id');
      $empl_id = $this->session->userdata('empl_id');
  
      $manager_data = $this->queries->get_manager_data($empl_id);
      $comp_id = $manager_data->comp_id;
  
      $company_data = $this->queries->get_companyData($comp_id);
      $blanch_data = $this->queries->get_blanchData($blanch_id);
      $empl_data = $this->queries->get_employee_data($empl_id);
  
      $loan_pend = $this->queries->get_pending_reportLoanblanch($blanch_id);
      $pend = $this->queries->get_sun_loanPendingBlanch($blanch_id);
      $privillage = $this->queries->get_position_empl($empl_id);
      $manager = $this->queries->get_position_manager($empl_id);
  
  
  
      // if ($position === 'LOAN OFFICER') {
      //     $loan_pending_new = $this->queries->get_total_loan_pending_officer($blanch_id, $empl_id);
      //     $new_total_pending = $this->queries->get_total_pend_officerloan($blanch_id, $empl_id);
  
      // } elseif ($position === 'BRANCH MANAGER') {
          $loan_pending_new = $this->queries->get_total_loan_pending($blanch_id);
          $new_total_pending = $this->queries->get_total_pend_loan($blanch_id);
      // }
  
      $this->load->view('officer/loan_pending_time', [
          'loan_pend' => $loan_pend,
          'pend' => $pend,
          'privillage' => $privillage,
          'manager' => $manager,
          'loan_pending_new' => $loan_pending_new,
          'new_total_pending' => $new_total_pending
      ]);
  }
  

     public function manager_loan_pending_time(){
    $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);

       $loan_pend = $this->queries->get_pending_reportLoanblanch($blanch_id);
       $pend = $this->queries->get_sun_loanPendingBlanch($blanch_id);
       $privillage = $this->queries->get_position_empl($empl_id);
       $manager = $this->queries->get_position_manager($empl_id);
       $blanch = $this->queries->get_blanch($comp_id);
      //  echo "<pre>";
      // print_r($pend);
      //     exit();
    
    $this->load->view('officer/manager_loan_pendingtime',['loan_pend'=>$loan_pend,'pend'=>$pend,'privillage'=>$privillage,'manager'=>$manager,'blanch'=>$blanch]);
    }

     public function prev_pendingLoan(){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);

        $from = $this->input->post('from');
        $to = $this->input->post('to');
        $blanch_id = $this->input->post('blanch_id');
        $loan_pend= $this->queries->get_penddata($from,$to,$blanch_id);
        $pend = $this->queries->get_sun_loanPendingPrev($from,$to,$blanch_id);
        $blanch = $this->queries->get_blanch($comp_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $manager = $this->queries->get_position_manager($empl_id);

        //   echo "<pre>";
        // print_r($data_pend);
        //     exit();
        $this->load->view('officer/prev_pending_loan',['blanch'=>$blanch,'loan_pend'=>$loan_pend,'pend'=>$pend,'from'=>$from,'to'=>$to,'blanch_id'=>$blanch_id,'privillage'=>$privillage,'manager'=>$manager]);
    }

    public function prev_pending_loan(){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);

        $from = $this->input->post('from');
        $to = $this->input->post('to');
        $blanch_id = $this->input->post('blanch_id');
        $loan_pend = $this->queries->get_penddata($from,$to,$blanch_id);
        $pend = $this->queries->get_sun_loanPendingPrev($from,$to,$blanch_id);
        //  echo "<pre>";
        // print_r($loan_pend);
        //        exit();
        $this->load->view('officer/prev_pend_loan',['privillage'=>$privillage,'loan_pend'=>$loan_pend,'pend'=>$pend,'from'=>$from,'to'=>$to,'blanch_id'=>$blanch_id]);
    }


    public function print_prev_pendLoan($from,$to,$blanch_id){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $compdata = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);

        $loan_pend = $this->queries->get_penddata($from,$to,$blanch_id);
        $pend = $this->queries->get_sun_loanPendingPrev($from,$to,$blanch_id); 
        $blanch = $this->queries->get_blanch_data($blanch_id);
         // print_r($blanch);
         //      exit();
     $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4-L','orientation' => 'L', 'tempDir' => APPPATH . 'tmp/mpdf']);
     $html = $this->load->view('officer/print_prev_pendLoan',['compdata'=>$compdata,'pend'=>$pend,'loan_pend'=>$loan_pend,'from'=>$from,'to'=>$to,'blanch'=>$blanch],true);
     $mpdf->SetFooter('Generated By Brainsoft Technology');
     $mpdf->WriteHTML($html);
     $mpdf->Output();
    }



     public function print_pending_report(){
     $this->load->model('queries');
      $blanch_id = $this->session->userdata('blanch_id');
      $empl_id = $this->session->userdata('empl_id');
      $manager_data = $this->queries->get_manager_data($empl_id);
      $comp_id = $manager_data->comp_id;
      $company_data = $this->queries->get_companyData($comp_id);
      $blanch_data = $this->queries->get_blanchData($blanch_id);
      $empl_data = $this->queries->get_employee_data($empl_id);

     $compdata = $this->queries->get_companyData($comp_id);
     $loan_pend = $this->queries->get_pending_reportLoanblanch($blanch_id);
     $pend = $this->queries->get_sun_loanPendingBlanch($blanch_id);
     $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4-L','orientation' => 'L', 'tempDir' => APPPATH . 'tmp/mpdf']);
     $html = $this->load->view('officer/loan_pending_report',['compdata'=>$compdata,'pend'=>$pend,'loan_pend'=>$loan_pend],true);
     $mpdf->SetFooter('Generated By Brainsoft Technology');
     $mpdf->WriteHTML($html);
     $mpdf->Output(); 
    }

    public function manager_print_pending_report(){
     $this->load->model('queries');
      $blanch_id = $this->session->userdata('blanch_id');
      $empl_id = $this->session->userdata('empl_id');
      $manager_data = $this->queries->get_manager_data($empl_id);
      $comp_id = $manager_data->comp_id;
      $company_data = $this->queries->get_companyData($comp_id);
      $blanch_data = $this->queries->get_blanchData($blanch_id);
      $empl_data = $this->queries->get_employee_data($empl_id);

     $compdata = $this->queries->get_companyData($comp_id);
     $loan_pend = $this->queries->get_pending_reportLoan($comp_id);
     $pend = $this->queries->get_sun_loanPending($comp_id);
     $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4-L','orientation' => 'L', 'tempDir' => APPPATH . 'tmp/mpdf']);
     $html = $this->load->view('officer/loan_pending_report',['compdata'=>$compdata,'pend'=>$pend,'loan_pend'=>$loan_pend],true);
     $mpdf->SetFooter('Generated By Brainsoft Technology');
     $mpdf->WriteHTML($html);
     $mpdf->Output(); 
    }


    public function repaymant_data(){
      $this->load->model('queries');
      $blanch_id = $this->session->userdata('blanch_id');
      $empl_id = $this->session->userdata('empl_id');
      $manager_data = $this->queries->get_manager_data($empl_id);
      $comp_id = $manager_data->comp_id;
      $company_data = $this->queries->get_companyData($comp_id);
      $blanch_data = $this->queries->get_blanchData($blanch_id);
      $empl_data = $this->queries->get_employee_data($empl_id);

      $repayment = $this->queries->get_repayment_dataBlanch($blanch_id);
      $total_loanAprove = $this->queries->get_total_loanDoneBlanch($blanch_id);
      $total_loan_int = $this->queries->get_sum_totalloanInterstBlanch($blanch_id);
      $privillage = $this->queries->get_position_empl($empl_id);
      $manager = $this->queries->get_position_manager($empl_id);
          //     echo "<pre>";
          // print_r($total_loan_int);
          //      exit();
      $this->load->view('officer/loan_repayment',['repayment'=>$repayment,'total_loanAprove'=>$total_loanAprove,'total_loan_int'=>$total_loan_int,'privillage'=>$privillage,'manager'=>$manager]);
    }


     public function manager_repaymant_data(){
      $this->load->model('queries');
      $blanch_id = $this->session->userdata('blanch_id');
      $empl_id = $this->session->userdata('empl_id');
      $manager_data = $this->queries->get_manager_data($empl_id);
      $comp_id = $manager_data->comp_id;
      $company_data = $this->queries->get_companyData($comp_id);
      $blanch_data = $this->queries->get_blanchData($blanch_id);
      $empl_data = $this->queries->get_employee_data($empl_id);

      $repayment = $this->queries->get_repayment_data($comp_id);
      $total_loanAprove = $this->queries->get_total_loanDone($comp_id);
      $total_loan_int = $this->queries->get_sum_totalloanInterst($comp_id);
      $privillage = $this->queries->get_position_empl($empl_id);
      $manager = $this->queries->get_position_manager($empl_id);
          //     echo "<pre>";
          // print_r($total_loan_int);
          //      exit();
      $this->load->view('officer/loan_repayment',['repayment'=>$repayment,'total_loanAprove'=>$total_loanAprove,'total_loan_int'=>$total_loan_int,'privillage'=>$privillage,'manager'=>$manager]);
    }




    public function previour_repayment(){
        $this->load->model('queries');
      $blanch_id = $this->session->userdata('blanch_id');
      $empl_id = $this->session->userdata('empl_id');
      $manager_data = $this->queries->get_manager_data($empl_id);
      $comp_id = $manager_data->comp_id;
      $company_data = $this->queries->get_companyData($comp_id);
      $blanch_data = $this->queries->get_blanchData($blanch_id);
      $empl_data = $this->queries->get_employee_data($empl_id);

        $from = $this->input->post('from');
        $to = $this->input->post('to');
        $blanch_id = $this->input->post('blanch_id');
        $repayment = $this->queries->get_previous_repaymentsBlanch($from,$to,$blanch_id);
        $total_loanAprove = $this->queries->get_sumprev_loanAproveBlanch($from,$to,$blanch_id);
        $total_loan_int = $this->queries->get_sum_prevtotalLoansintBlanch($from,$to,$blanch_id);
        $privillage = $this->queries->get_position_empl($empl_id);
          //   echo "<pre>";
          // print_r($repayment);
          //      exit();
        $this->load->view('officer/previous_repayment',['repayment'=>$repayment,'from'=>$from,'to'=>$to,'total_loanAprove'=>$total_loanAprove,'total_loan_int'=>$total_loan_int,'blanch_id'=>$blanch_id,'empl_data'=>$empl_data,'privillage'=>$privillage]);
    }

     public function print_repayment_report(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
      $empl_id = $this->session->userdata('empl_id');
      $manager_data = $this->queries->get_manager_data($empl_id);
      $comp_id = $manager_data->comp_id;
      $company_data = $this->queries->get_companyData($comp_id);
      $blanch_data = $this->queries->get_blanchData($blanch_id);
      $empl_data = $this->queries->get_employee_data($empl_id);

    $compdata = $this->queries->get_companyData($comp_id);
    $repayment = $this->queries->get_repayment_dataBlanch($blanch_id);
    $total_loanAprove = $this->queries->get_total_loanDoneBlanch($blanch_id);
    $total_loan_int = $this->queries->get_sum_totalloanInterstBlanch($blanch_id);
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4-L','orientation' => 'L', 'tempDir' => APPPATH . 'tmp/mpdf']);
    $html = $this->load->view('officer/repayment_report',['compdata'=>$compdata,'repayment'=>$repayment,'total_loanAprove'=>$total_loanAprove,'total_loan_int'=>$total_loan_int],true);
    $mpdf->SetFooter('Generated By Brainsoft Technology');
    $mpdf->WriteHTML($html);
    $mpdf->Output();    
    }

     public function manager_print_repayment_report(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
      $empl_id = $this->session->userdata('empl_id');
      $manager_data = $this->queries->get_manager_data($empl_id);
      $comp_id = $manager_data->comp_id;
      $company_data = $this->queries->get_companyData($comp_id);
      $blanch_data = $this->queries->get_blanchData($blanch_id);
      $empl_data = $this->queries->get_employee_data($empl_id);

    $compdata = $this->queries->get_companyData($comp_id);
    $repayment = $this->queries->get_repayment_data($comp_id);
    $total_loanAprove = $this->queries->get_total_loanDone($comp_id);
    $total_loan_int = $this->queries->get_sum_totalloanInterst($comp_id);
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4-L','orientation' => 'L', 'tempDir' => APPPATH . 'tmp/mpdf']);
    $html = $this->load->view('officer/repayment_report',['compdata'=>$compdata,'repayment'=>$repayment,'total_loanAprove'=>$total_loanAprove,'total_loan_int'=>$total_loan_int],true);
    $mpdf->SetFooter('Generated By Brainsoft Technology');
    $mpdf->WriteHTML($html);
    $mpdf->Output();    
    }


    public function print_prev_reportRepayment($from,$to,$blanch_id){
     $this->load->model('queries');
     $blanch_id = $this->session->userdata('blanch_id');
      $empl_id = $this->session->userdata('empl_id');
      $manager_data = $this->queries->get_manager_data($empl_id);
      $comp_id = $manager_data->comp_id;
      $company_data = $this->queries->get_companyData($comp_id);
      $blanch_data = $this->queries->get_blanchData($blanch_id);
      $empl_data = $this->queries->get_employee_data($empl_id);

     $repayment = $this->queries->get_previous_repaymentsBlanch($from,$to,$blanch_id);
     $total_loanAprove = $this->queries->get_sumprev_loanAproveBlanch($from,$to,$blanch_id);
     $total_loan_int = $this->queries->get_sum_prevtotalLoansintBlanch($from,$to,$blanch_id);
     $compdata = $this->queries->get_companyData($comp_id);
     $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4-L','orientation' => 'L', 'tempDir' => APPPATH . 'tmp/mpdf']);
     $html = $this->load->view('officer/prev_repayment_report',['compdata'=>$compdata,'repayment'=>$repayment,'total_loanAprove'=>$total_loanAprove,'total_loan_int'=>$total_loan_int,'from'=>$from,'to'=>$to],true);
     $mpdf->SetFooter('Generated By Brainsoft Technology');
     $mpdf->WriteHTML($html);
     $mpdf->Output();
    }

      public function search_customer_loan_report(){
      $this->load->model('queries');
       $blanch_id = $this->session->userdata('blanch_id');
      $empl_id = $this->session->userdata('empl_id');
      $manager_data = $this->queries->get_manager_data($empl_id);
      $comp_id = $manager_data->comp_id;
      $blanch_id = !empty($manager_data->blanch_id) ? $manager_data->blanch_id : $this->session->userdata('blanch_id');
      $empl_data = $this->queries->get_employee_data($empl_id);
      $privillage = $this->queries->get_position_empl($empl_id);
      $manager = $this->queries->get_position_manager($empl_id);

      $customer = $this->queries->get_allcutomerBlanch_Data($blanch_id);
      $this->load->view('officer/search_customer_loan_report',['customer'=>$customer,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
    }

     public function manager_search_customer_loan_report(){
      $this->load->model('queries');
       $blanch_id = $this->session->userdata('blanch_id');
      $empl_id = $this->session->userdata('empl_id');
      $manager_data = $this->queries->get_manager_data($empl_id);
      $comp_id = $manager_data->comp_id;
      $company_data = $this->queries->get_companyData($comp_id);
      $blanch_data = $this->queries->get_blanchData($blanch_id);
      $empl_data = $this->queries->get_employee_data($empl_id);
      $privillage = $this->queries->get_position_empl($empl_id);
      $manager = $this->queries->get_position_manager($empl_id);

      $customer = $this->queries->get_allcustomerData($comp_id);
      $this->load->view('officer/search_loan_report',['customer'=>$customer,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
    }

     public function customer_loan_report(){
    $this->load->model('queries');
     $blanch_id = $this->session->userdata('blanch_id');
      $empl_id = $this->session->userdata('empl_id');
      $manager_data = $this->queries->get_manager_data($empl_id);
      $comp_id = $manager_data->comp_id;
      $company_data = $this->queries->get_companyData($comp_id);
      $blanch_data = $this->queries->get_blanchData($blanch_id);
      $empl_data = $this->queries->get_employee_data($empl_id);

    $customer_id = $this->input->post('customer_id');
    $blanch_id = $this->input->post('blanch_id');
    $customer = $this->queries->search_CustomerLoan_report($customer_id,$comp_id);
    @$customer_id = $customer->customer_id;
    @$customer_report = $this->queries->get_customer_loanReport($customer_id);
    @$sum_recevable = $this->queries->get_sum_receivableAmountCustomer($customer_id);
    @$sum_pend = $this->queries->get_sumPending_Amount($customer_id);
    @$sum_penart = $this->queries->get_penart_amount_total($customer_id);
    $privillage = $this->queries->get_position_empl($empl_id);
    $manager = $this->queries->get_position_manager($empl_id);
    //    echo "<pre>";
    // print_r($customer_report);
    //       exit();
    $this->load->view('officer/customer_report',['customer'=>$customer,'customer_report'=>$customer_report,'sum_recevable'=>$sum_recevable,'sum_pend'=>$sum_pend,'sum_penart'=>$sum_penart,'customer_id'=>$customer_id,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
    }

    public function print_customer_loan_report($customer_id){
      $this->load->model('queries');
      $blanch_id = $this->session->userdata('blanch_id');
      $empl_id = $this->session->userdata('empl_id');
      $manager_data = $this->queries->get_manager_data($empl_id);
      $comp_id = $manager_data->comp_id;
      $company_data = $this->queries->get_companyData($comp_id);
      $blanch_data = $this->queries->get_blanchData($blanch_id);
      $empl_data = $this->queries->get_employee_data($empl_id);

        $compdata = $this->queries->get_companyData($comp_id);
        $customer_report = $this->queries->get_customer_loanReport($customer_id);
        $sum_recevable = $this->queries->get_sum_receivableAmountCustomer($customer_id);
        $sum_pend = $this->queries->get_sumPending_Amount($customer_id);
        $sum_penart = $this->queries->get_penart_amount_total($customer_id);
        $statement = $this->queries->get_customer_datareport($customer_id);
         //  echo "<pre>";
         // print_r($customer_report);
         //     exit();
        $mpdf = new \Mpdf\Mpdf(['tempDir' => APPPATH . 'tmp/mpdf']);
        $html = $this->load->view('officer/customer_loan_report',['compdata'=>$compdata,'customer_report'=>$customer_report,'customer_id'=>$customer_id,'sum_recevable'=>$sum_recevable,'sum_pend'=>$sum_pend,'sum_penart'=>$sum_penart,'statement'=>$statement],true);
        $mpdf->SetFooter('Generated By Brainsoft Technology');
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }


    public function customer_account_statement(){
      $this->load->model('queries');
      $blanch_id = $this->session->userdata('blanch_id');
      $empl_id = $this->session->userdata('empl_id');
      $manager_data = $this->queries->get_manager_data($empl_id);
      $comp_id = $manager_data->comp_id;
      $company_data = $this->queries->get_companyData($comp_id);
      $blanch_data = $this->queries->get_blanchData($blanch_id);
      $empl_data = $this->queries->get_employee_data($empl_id);
      $privillage = $this->queries->get_position_empl($empl_id);
      $manager = $this->queries->get_position_manager($empl_id);

      $customer = $this->queries->get_allcutomerBlanch_Data($blanch_id);
      $this->load->view('officer/account_statement',['customer'=>$customer,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
    }


        function fetch_data_loanActive()
{
$this->load->model('queries');
if($this->input->post('customer_id'))
{
echo $this->queries->fetch_loan_list($this->input->post('customer_id'));
}
}

    public function payment_statement_search() {
      $this->load->model('queries');
      $empl_id = $this->session->userdata('empl_id');
      $manager_data = $this->queries->get_manager_data($empl_id);
      $blanch_id = !empty($manager_data->blanch_id) ? $manager_data->blanch_id : $this->session->userdata('blanch_id');

      $selected_customer_id = (int) $this->input->get('customer_id');
      $selected_loan_id = (int) $this->input->get('loan_id');

      $customers = $this->queries->get_allcutomerBlanch_Data($blanch_id);
      $this->load->view('officer/payment_statement_search', [
        'customers' => $customers,
        'selected_customer_id' => $selected_customer_id,
        'selected_loan_id' => $selected_loan_id,
      ]);
    }

    public function payment_statement_go() {
      $loan_id = (int) $this->input->post('loan_id');
      if (!$loan_id) {
        return redirect('oficer/payment_statement_search');
      }
      return redirect('oficer/payment_statement_detail/' . $loan_id);
    }

    public function payment_statement_detail($loan_id = null) {
      if (empty($loan_id)) {
        $this->session->set_flashdata('error', 'Chagua mkopo kwanza');
        return redirect('oficer/payment_statement_search');
      }

      $this->load->model('queries');
      $empl_id = $this->session->userdata('empl_id');
      $manager_data = $this->queries->get_manager_data($empl_id);
      $comp_id = $manager_data->comp_id;
      $officer_blanch_id = !empty($manager_data->blanch_id) ? (int) $manager_data->blanch_id : (int) $this->session->userdata('blanch_id');
      $loan_id = (int) $loan_id;
      $customers = $this->queries->get_allcutomerBlanch_Data($officer_blanch_id);

      $loan = $this->queries->get_loan_statement_info($loan_id, $comp_id);
      if (!$loan || ((int) ($loan->blanch_id ?? 0) !== $officer_blanch_id)) {
        $this->session->set_flashdata('error', 'Mkopo haukupatikana');
        return redirect('oficer/payment_statement_search');
      }

      $customer = $this->queries->search_CustomerID($loan->customer_id, $comp_id);
      $compdata = $this->queries->get_companyData($comp_id);

      $deposits_by_date  = $this->queries->get_deposits_by_date_for_loan($loan_id);
      $penalties_by_date = $this->queries->get_penalties_by_date_for_loan($loan_id);

      $schedule      = [];
      $start_raw     = !empty($loan->loan_stat_date) ? $loan->loan_stat_date : $loan->disburse_day;
      $end_raw       = !empty($loan->loan_end_date) ? $loan->loan_end_date : $loan->return_date;
      $restoration   = (float) $loan->restration;
      $day_interval  = max(1, (int) $loan->day);

      if (!empty($start_raw) && !empty($end_raw)) {
        $start   = new DateTime(date('Y-m-d', strtotime($start_raw)));
        $end     = new DateTime(date('Y-m-d', strtotime($end_raw)));
        $today   = new DateTime(date('Y-m-d'));
        $current = clone $start;

        if ($day_interval <= 1) {
          $current->modify('+1 day');
        } else {
          $current->modify("+{$day_interval} days");
        }

        while ($current <= $end && $current <= $today) {
          $date_key = $current->format('Y-m-d');
          $paid     = isset($deposits_by_date[$date_key]) ? (float) $deposits_by_date[$date_key] : 0.0;
          $penalty  = isset($penalties_by_date[$date_key]) ? (float) $penalties_by_date[$date_key] : 0.0;

          if ($paid >= $restoration) {
            $status       = 'paid';
            $status_label = $this->lang->line('ps_paid_status') ?: 'Imelipwa';
          } elseif ($paid > 0) {
            $status       = 'partial';
            $status_label = $this->lang->line('ps_partial_status') ?: 'Kidogo';
          } else {
            $status       = 'not_paid';
            $status_label = $this->lang->line('ps_not_paid_status') ?: 'Haijalipwa';
          }

          $schedule[] = [
            'date'         => $date_key,
            'expected'     => $restoration,
            'paid'         => $paid,
            'penalty'      => $penalty,
            'status'       => $status,
            'status_label' => $status_label,
          ];

          $current->modify("+{$day_interval} days");
        }
      }

      $scheduled_dates = array_column($schedule, 'date');
      foreach ($deposits_by_date as $date_key => $paid) {
        if (!in_array($date_key, $scheduled_dates)) {
          $penalty = isset($penalties_by_date[$date_key]) ? (float) $penalties_by_date[$date_key] : 0.0;
          $schedule[] = [
            'date'         => $date_key,
            'expected'     => 0.0,
            'paid'         => (float) $paid,
            'penalty'      => $penalty,
            'status'       => 'paid',
            'status_label' => $this->lang->line('ps_paid_status') ?: 'Imelipwa',
          ];
        }
      }

      usort($schedule, function($a, $b) { return strcmp($a['date'], $b['date']); });

      $sponsors = $this->queries->get_sponser_by_loan($loan_id);
      if (empty($sponsors)) {
        $sponsors = $this->queries->get_sponser_data($loan->customer_id, $comp_id);
      }
      $collateral = $this->queries->get_colateral_data($loan_id);

      $this->load->view('officer/payment_statement_detail', [
        'loan'                 => $loan,
        'customer'             => $customer,
        'compdata'             => $compdata,
        'schedule'             => $schedule,
        'sponsors'             => $sponsors,
        'collateral'           => $collateral,
        'customers'            => $customers,
        'selected_customer_id' => (int) ($loan->customer_id ?? 0),
        'selected_loan_id'     => $loan_id,
      ]);
    }

    public function payment_statement_pdf($loan_id) {
      $this->load->model('queries');
      $empl_id = $this->session->userdata('empl_id');
      $manager_data = $this->queries->get_manager_data($empl_id);
      $comp_id = $manager_data->comp_id;
      $officer_blanch_id = !empty($manager_data->blanch_id) ? (int) $manager_data->blanch_id : (int) $this->session->userdata('blanch_id');
      $loan_id = (int) $loan_id;

      $generated_by = 'System';
      if (!empty($empl_id)) {
        $empl_data = $this->queries->get_employee_data($empl_id);
        if (!empty($empl_data) && !empty($empl_data->empl_name)) {
          $generated_by = $empl_data->empl_name;
        }
      }
      if ($generated_by === 'System') {
        $generated_by = $this->session->userdata('username') ?: 'System';
      }
      $generated_date = date('d-m-Y H:i');

      $loan = $this->queries->get_loan_statement_info($loan_id, $comp_id);
      if (!$loan || ((int) ($loan->blanch_id ?? 0) !== $officer_blanch_id)) {
        $this->session->set_flashdata('error', 'Mkopo haukupatikana');
        return redirect('oficer/payment_statement_search');
      }

      $customer = $this->queries->search_CustomerID($loan->customer_id, $comp_id);
      $compdata = $this->queries->get_companyData($comp_id);

      $deposits_by_date  = $this->queries->get_deposits_by_date_for_loan($loan_id);
      $penalties_by_date = $this->queries->get_penalties_by_date_for_loan($loan_id);

      $schedule      = [];
      $start_raw     = !empty($loan->loan_stat_date) ? $loan->loan_stat_date : $loan->disburse_day;
      $end_raw       = !empty($loan->loan_end_date) ? $loan->loan_end_date : $loan->return_date;
      $restoration   = (float) $loan->restration;
      $day_interval  = max(1, (int) $loan->day);

      if (!empty($start_raw) && !empty($end_raw)) {
        $start   = new DateTime(date('Y-m-d', strtotime($start_raw)));
        $end     = new DateTime(date('Y-m-d', strtotime($end_raw)));
        $today   = new DateTime(date('Y-m-d'));
        $current = clone $start;

        if ($day_interval <= 1) {
          $current->modify('+1 day');
        } else {
          $current->modify("+{$day_interval} days");
        }

        while ($current <= $end && $current <= $today) {
          $date_key = $current->format('Y-m-d');
          $paid     = isset($deposits_by_date[$date_key]) ? (float) $deposits_by_date[$date_key] : 0.0;
          $penalty  = isset($penalties_by_date[$date_key]) ? (float) $penalties_by_date[$date_key] : 0.0;

          if ($paid >= $restoration) {
            $status       = 'paid';
            $status_label = $this->lang->line('ps_paid_status') ?: 'Imelipwa';
          } elseif ($paid > 0) {
            $status       = 'partial';
            $status_label = $this->lang->line('ps_partial_status') ?: 'Kidogo';
          } else {
            $status       = 'not_paid';
            $status_label = $this->lang->line('ps_not_paid_status') ?: 'Haijalipwa';
          }

          $schedule[] = [
            'date'         => $date_key,
            'expected'     => $restoration,
            'paid'         => $paid,
            'penalty'      => $penalty,
            'status'       => $status,
            'status_label' => $status_label,
          ];

          $current->modify("+{$day_interval} days");
        }
      }

      $scheduled_dates = array_column($schedule, 'date');
      foreach ($deposits_by_date as $date_key => $paid) {
        if (!in_array($date_key, $scheduled_dates)) {
          $penalty = isset($penalties_by_date[$date_key]) ? (float) $penalties_by_date[$date_key] : 0.0;
          $schedule[] = [
            'date'         => $date_key,
            'expected'     => 0.0,
            'paid'         => (float) $paid,
            'penalty'      => $penalty,
            'status'       => 'paid',
            'status_label' => $this->lang->line('ps_paid_status') ?: 'Imelipwa',
          ];
        }
      }

      usort($schedule, function($a, $b) { return strcmp($a['date'], $b['date']); });

      $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L', 'orientation' => 'L', 'tempDir' => APPPATH . 'tmp/mpdf']);
      $html = $this->load->view('admin/payment_statement_pdf', [
        'loan'           => $loan,
        'customer'       => $customer,
        'compdata'       => $compdata,
        'schedule'       => $schedule,
        'generated_by'   => $generated_by,
        'generated_date' => $generated_date,
      ], true);

      $mpdf->SetFooter('Generated By Brainsoft Technology');
      $mpdf->WriteHTML($html);

      $filename = (!empty($loan->loan_code) ? preg_replace('/[^a-zA-Z0-9_-]/', '_', $loan->loan_code) : 'loan_statement') . '_payment_statement.pdf';
      $mpdf->Output($filename, 'I');
    }

public function customer_report(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);
    $customer_id = $this->input->post('customer_id');
    $loan_id = $this->input->post('loan_id');

    $customer = $this->queries->search_CustomerLoan($customer_id);
     $customery = $this->queries->get_allcutomerblanchData($blanch_id);
    //     echo"<pre>";
    // print_r($customery);
    // echo"<pre>";
    // exit();
   
    $this->load->view('officer/customer_account_report',['empl_data'=>$empl_data,'customery'=>$customery,'customer'=>$customer,'loan_id'=>$loan_id,'customer_id'=>$customer_id]);
}


public function loan_statementreport(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);
    $customer_id = $this->input->post('customer_id');
    $loan_id = $this->input->post('loan_id');

    $customer = $this->queries->search_CustomerLoan($customer_id);
     $customery = $this->queries->get_allcutomerblanchData($blanch_id);
    //     echo"<pre>";
    // print_r($customery);
    // echo"<pre>";
    // exit();
   
    $this->load->view('officer/loan_statementreport',['empl_data'=>$empl_data,'customery'=>$customery,'customer'=>$customer,'loan_id'=>$loan_id,'customer_id'=>$customer_id]);
}

     public function manager_customer_account_statement(){
      $this->load->model('queries');
      $blanch_id = $this->session->userdata('blanch_id');
      $empl_id = $this->session->userdata('empl_id');
      $manager_data = $this->queries->get_manager_data($empl_id);
      $comp_id = $manager_data->comp_id;
      $company_data = $this->queries->get_companyData($comp_id);
      $blanch_data = $this->queries->get_blanchData($blanch_id);
      $empl_data = $this->queries->get_employee_data($empl_id);
      $privillage = $this->queries->get_position_empl($empl_id);
      $manager = $this->queries->get_position_manager($empl_id);

      $customer = $this->queries->get_allcustomerData($comp_id);
      $this->load->view('officer/account_statement',['customer'=>$customer,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
    }



     public function print_account_statement($customer_id,$loan_id){
    	// print_r($loan_id);
    	//    exit();
     $this->load->model('queries');
     $comp_id = $this->session->userdata('comp_id');
     $compdata = $this->queries->get_companyData($comp_id);
     $customer_data = $this->queries->get_loan_schedule_customer($loan_id);
     
    $mpdf = new \Mpdf\Mpdf(['tempDir' => APPPATH . 'tmp/mpdf']);
     $html = $this->load->view('officer/customer_account_statement',['compdata'=>$compdata,'customer_data'=>$customer_data,'loan_id'=>$loan_id,'customer_id'=>$customer_id],true);
     $mpdf->SetFooter('Generated By Brainsoft');
     $mpdf->WriteHTML($html);
     $mpdf->Output(); 

    }

     public function search_acount_statement(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $customer_id = $this->input->post('customer_id');
    $comp_id = $this->input->post('comp_id');
    $customer = $this->queries->search_CustomerLoan($customer_id,$comp_id);
    @$customer_id = $customer->customer_id;
    @$statement = $this->queries->get_customer_datareport($customer_id);
    @$pay_customer = $this->queries->get_paycustomer($customer_id);
    @$payisnull = $this->queries->get_paycustomerNotfee_Statement($customer_id);
    @$sum_depost = $this->queries->get_sumDepost_loan($customer_id);
    $privillage = $this->queries->get_position_empl($empl_id);
    $manager = $this->queries->get_position_manager($empl_id);
      //   echo "<pre>";
      // print_r($customer);
      //       exit();
    $this->load->view('officer/search_account',['pay_customer'=>$pay_customer,'payisnull'=>$payisnull,'customer'=>$customer,'statement'=>$statement,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
    }

    public function print_customer_statement($customer_id, $loan_id)
{
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);
$customer_loan_data = $this->queries->get_loan_schedule_customer($loan_id);
$total_depost=$this->queries->get_total_amount_paid_loan($loan_id);
  $statement = $this->queries->get_customer_datareport($customer_id);

  

  
    $pay_customer = $this->queries->get_paycustomer($customer_id);
    $payisnull = $this->queries->get_paycustomerNotfee_Statement($customer_id,$loan_id);

//     echo "<pre>";
// print_r( $empl_data);
// echo "<pre>";
// exit();
    $compdata = $this->queries->get_companyData($comp_id);
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4-L','orientation' => 'L', 'tempDir' => APPPATH . 'tmp/mpdf']);
    $html = $this->load->view('officer/customer_statement_report',['compdata'=>$compdata,'statement'=>$statement,'customer_loan_data'=>$customer_loan_data,
    'total_depost'=>$total_depost,'pay_customer'=>$pay_customer,'payisnull'=>$payisnull,'empl_data'=>$empl_data],true);
    //  $mpdf->SetFooter('Generated By Brainsoft Technology');
     $mpdf->WriteHTML($html);
     $mpdf->Output();
    }


    public function today_recevable_loan(){
    $this->load->model('queries');
    // $position = strtoupper(trim($this->session->userdata('position_name')));
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
      $blanch_id = $manager_data->blanch_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    
   
    $privillage = $this->queries->get_position_empl($empl_id);
    $manager = $this->queries->get_position_manager($empl_id);


      // echo "<pre>";
      // print_r($position);
      //     exit();
   
    // if ($position === 'LOAN OFFICER') {
    
    //   $today_recevable = $this->queries->get_today_recevable_loanBlanch_by_officer($blanch_id, $empl_id);
    //   $rejesho = $this->queries->get_total_recevableBlanch_by_officer($blanch_id, $empl_id);
      // echo "<pre>";
      // print_r($today_recevable);
      //     exit();
  
  // } elseif ($position === 'BRANCH MANAGER') {
    $rejesho = $this->queries->get_total_recevableBlanch($blanch_id);
    $today_recevable = $this->queries->get_today_recevable_loan($comp_id, $blanch_id, null);
      // echo "<pre>";
      // print_r($today_recevable);
      //     exit();
  
  // } else {
  //     $total_customers = 0;
  //     $new_loans = 0;
  // }
  
          //     echo "<pre>";
          // print_r($today_recevable);
          //           exit();
    $this->load->view('officer/today_recevable',['today_recevable'=>$today_recevable,'rejesho'=>$rejesho,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
    }


      public function manager_today_recevable_loan(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $today_recevable = $this->queries->get_today_recevable_loan($comp_id);
    $rejesho = $this->queries->get_total_recevable($comp_id);
    $privillage = $this->queries->get_position_empl($empl_id);
    $manager = $this->queries->get_position_manager($empl_id);
          //     echo "<pre>";
          // print_r($today_recevable);
          //           exit();
    $this->load->view('officer/today_recevable',['today_recevable'=>$today_recevable,'rejesho'=>$rejesho,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
    }

 public function today_receved_loan()
{
    $this->load->model('queries');

    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id   = $this->session->userdata('empl_id');

    // Read filter inputs
    $from_date   = $this->input->post('from') ?? date('Y-m-d');
    $to_date     = $this->input->post('to') ?? date('Y-m-d');
    $loan_status = $this->input->post('dep_status');

    // Get filtered data
    $received = $this->queries->get_received_loanBlanch($blanch_id, $empl_id, $from_date, $to_date, $loan_status);

    // Hesabu summary
    $summary = [
        'withdrawal' => ['count' => 0, 'sum' => 0],
        'out'        => ['count' => 0, 'sum' => 0],
        'done'       => ['count' => 0, 'sum' => 0],
    ];

    $total_loan = 0;
    $total_received = 0;
    $total_lazo = 0;
    $total_dabo = 0;

    foreach ($received as $today_recevables) {
        $total_loan += $today_recevables->loan_int;
        $total_received += $today_recevables->depost;

        // Hesabu lazo na dabo
        $lazo = 0;
        $dabo = 0;
        if ($today_recevables->restration > $today_recevables->depost) {
            $lazo = $today_recevables->restration - $today_recevables->depost;
        } elseif ($today_recevables->depost > $today_recevables->restration) {
            $dabo = $today_recevables->depost - $today_recevables->restration;
        }

        $total_lazo += $lazo;
        $total_dabo += $dabo;

        if (isset($summary[$today_recevables->loan_status])) {
            $summary[$today_recevables->loan_status]['count']++;
            $summary[$today_recevables->loan_status]['sum'] += $today_recevables->depost;
        }
    }

    // Other info
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);
    $privillage = $this->queries->get_position_empl($empl_id);
    $manager = $this->queries->get_position_manager($empl_id);

    $this->load->view('officer/today_received', [
        'received'       => $received,
        'empl_data'      => $empl_data,
        'privillage'     => $privillage,
        'manager'        => $manager,
        'from_date'      => $from_date,
        'to_date'        => $to_date,
        'loan_status'    => $loan_status,
        'summary'        => $summary,
        'total_loan'     => $total_loan,
        'total_received' => $total_received,
        'total_lazo'     => $total_lazo,
        'total_dabo'     => $total_dabo,
    ]);
}


public function today_received_pdf()
{
    $this->load->model('queries');

    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id   = $this->session->userdata('empl_id');

    // Read filter inputs
    $from_date   = $this->input->post('from') ?? date('Y-m-d');
    $to_date     = $this->input->post('to') ?? date('Y-m-d');
    $loan_status = $this->input->post('dep_status');

    // Get filtered data
    $received = $this->queries->get_received_loanBlanch($blanch_id, $empl_id, $from_date, $to_date, $loan_status);

    // Calculate totals
    $total_received = $total_lazo = $total_dabo = 0;
    foreach ($received as $row) {
        $lazo = max(0, $row->restration - $row->depost);
        $dabo = max(0, $row->depost - $row->restration);

        $total_received += $row->depost;
        $total_lazo += $lazo;
        $total_dabo += $dabo;
    }

    // Pass data to the view
    $data = [
        'received'       => $received,
        'from_date'      => $from_date,
        'to_date'        => $to_date,
        'loan_status'    => $loan_status,
        'total_received' => $total_received,
        'total_lazo'     => $total_lazo,
        'total_dabo'     => $total_dabo,
    ];

    // Load the view as HTML
    $html = $this->load->view('officer/report_siku', $data, true);

    // Generate PDF
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4-L','orientation' => 'L', 'tempDir' => APPPATH . 'tmp/mpdf']);
    $mpdf->SetFooter('Generated By Brainsoft Technology');
    $mpdf->WriteHTML($html);

    // Safe: open PDF in browser
    $filename = 'loan_report_' . date('Y-m-d') . '.pdf';
    $mpdf->Output($filename, 'I'); // 'I' = inline in browser
}





    

    public function manager_today_receved_loan(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $received = $this->queries->get_today_received_loan($comp_id);
    $total_receved = $this->queries->get_sumReceived_amount($comp_id);
    $privillage = $this->queries->get_position_empl($empl_id);
    $manager = $this->queries->get_position_manager($empl_id);
          //   echo "<pre>";
          // print_r($received);
          //         exit();
        $this->load->view('officer/today_received',['received'=>$received,'total_receved'=>$total_receved,'empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
    }


      public function bank_reconselation_report(){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);

        $daily_recons = $this->queries->get_total_recevableDailyBlanch($blanch_id);

        $weekly_receivable = $this->queries->get_total_recevableweeklyBlanch($blanch_id);

        $monthly_receivable = $this->queries->get_total_recevableMonthlyblanch($blanch_id);

        $receivable_total = $this->queries->get_total_recevableBl($blanch_id);

        $received_daily = $this->queries->get_sumReceived_amountDailyblanch($blanch_id);

        $received_weekly = $this->queries->get_sumReceived_amountWeeklyBlanch($blanch_id);

        $received_monthly = $this->queries->get_sumReceived_amountmonthlyBlanch($blanch_id);



        $total_received = $this->queries->get_sumReceived_amountbl($blanch_id);

        $prepaid_today = $this->queries->prepaid_paybla($blanch_id);

        $total_loan_fee = $this->queries->get_total_loanFeereconceBlanch($blanch_id);

        $today_income = $this->queries->get_today_incomeBlanch($blanch_id);

        $toay_expences = $this->queries->get_today_expencesBlanch($blanch_id);
        $privillage = $this->queries->get_position_empl($empl_id);

          //  echo "<pre>";
          // print_r($toay_expences);
          //     exit();
        $this->load->view('officer/reconselation',['daily_recons'=>$daily_recons,'weekly_receivable'=>$weekly_receivable,'monthly_receivable'=>$monthly_receivable,'receivable_total'=>$receivable_total,'received_daily'=>$received_daily,'received_weekly'=>$received_weekly,'received_monthly'=>$received_monthly,'total_received'=>$total_received,'prepaid_today'=>$prepaid_today,'total_loan_fee'=>$total_loan_fee,'today_income'=>$today_income,'toay_expences'=>$toay_expences,'privillage'=>$privillage]);
    }


    public function today_cashinhand(){
      $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        
        $today_depost = $this->queries->get_today_chashData_Blanch($blanch_id);
        $today_income = $this->queries->get_today_incomeBlanchData($blanch_id);
        $today_expences = $this->queries->get_today_expencesData($blanch_id);
        $data_today = $this->queries->get_toay_Cashinhand($blanch_id);



        $today_cash = $this->queries-> get_todayCah($blanch_id);
        $total_amount = $this->queries->get_sum_cashInHand($blanch_id);
        $privillage = $this->queries->get_position_empl($empl_id);

         // print_r($data_today);
         //     exit();

      $this->load->view('officer/cash_inhand',['empl_data'=>$empl_data,'today_cash'=>$today_cash,'total_amount'=>$total_amount,'privillage'=>$privillage,'today_depost'=>$today_depost,'today_income'=>$today_income,'today_expences'=>$today_expences,'data_today'=>$data_today]);
    }

    public function create_cashin_Hand(){
      $this->form_validation->set_rules('comp_id','Company','required');
      $this->form_validation->set_rules('blanch_id','blanch','required');
      $this->form_validation->set_rules('empl_id','employee','required');
      $this->form_validation->set_rules('cash_amount','Cash','required');
      $this->form_validation->set_rules('cash_day','cash_day','required');
      $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
      if ($this->form_validation->run()) {
           $data = $this->input->post();
           // print_r($data);
           //    exit();
           $this->load->model('queries');
           if ($this->queries->insert_todayCash($data)) {
              $this->session->set_flashdata('massage','Data saved successfully');
           }else{
            $this->session->set_flashdata('error','Data Failed');
           }
           return redirect('oficer/today_cashinhand');
      }
      $this->today_cashinhand();
    }

    public function previoous_cashInhand(){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);

        $from = $this->input->post('from');
        $to = $this->input->post('to');
        $blanch_id = $this->input->post('blanch_id');
        $data = $this->queries->search_previous_cashInHand($from,$to,$blanch_id);
        $sum_data = $this->queries->search_Sum_previous_cashInHand($from,$to,$blanch_id);
           //  echo "<pre>";
           // print_r($sum_data);
           //         exit();
        
        $this->load->view('officer/previous_cashInhand',['privillage'=>$privillage,'empl_data'=>$empl_data,'data'=>$data,'sum_data'=>$sum_data]);
    }

public function oficer_profile(){
    $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $manager = $this->queries->get_position_manager($empl_id);
      //  echo "<pre>";
      // print_r($region);
      //     exit();
    $this->load->view('officer/company_profile',['empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
  }

  public function modify_empl_account($empl_id){
    $this->form_validation->set_rules('empl_name','Employee Name','required');
    $this->form_validation->set_rules('empl_no','Employee number','required');
    $this->form_validation->set_rules('empl_email','Employee Email','required');
    $this->form_validation->set_rules('empl_sex','Employee Sex','required');
    $this->form_validation->set_error_delimiters('<div class="text-danger">','<div class="text-danger">');
     if ($this->form_validation->run()) {
         $data = $this->input->post();
          // echo "<pre>";
          // print_r($data);
          //      exit();
         $this->load->model('queries');
         if ($this->queries->update_employee_profile($data,$empl_id)) {
            $this->session->set_flashdata('massage','Employee Profile Updated successfully');
         }else{
          $this->session->set_flashdata('error','Failed');
         }
         return redirect('oficer/oficer_profile');
     }
     $this->oficer_profile();
  }



    public function modify_sponser($sp_id,$customer_id){
           // print_r($sp_id);
           //     echo "<br>";
           //     print_r($customer_id);
           //      exit();
      $this->form_validation->set_rules('sp_name','Sponser first name','required');
      $this->form_validation->set_rules('sp_mname','Sponser midle name','required');
      $this->form_validation->set_rules('sp_lname','Sponser last name','required');
      $this->form_validation->set_rules('sp_phone_no','Sponser phone number','required');
      $this->form_validation->set_rules('nature','nature','required');
      $this->form_validation->set_rules('sp_relation','Sponser relation','required');
      $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
      if ($this->form_validation->run()) {
        $data = $this->input->post();
        //       echo "<pre>";
        // print_r($data);
        //       exit();
        $this->load->model('queries');
        if ($this->queries->update_sponser($sp_id,$data)) {
          $this->session->set_flashdata('massage','Sponsers information Updated successfully');
        }else{
        $this->session->set_flashdata('error','Failed');  
        }
        $sponser = $this->queries->get_sponser($customer_id);
        $customer_id = $sponser->customer_id;
              // print_r($customer_id);
              //     exit();
        return redirect('oficer/edit_viewSponser/'.$customer_id);
      }
      $this->edit_viewSponser();
    }

    public function update_sponsor_passport($sp_id, $customer_id)
    {
      $cropped_data = $this->input->post('passport_cropped');

      if (empty($cropped_data) && empty($_FILES['passport']['name'])) {
        $this->session->set_flashdata('error', 'Please choose and crop passport image.');
        return redirect('oficer/view_more_customer/' . $customer_id);
      }

      $existing = $this->db
        ->select('passport_path')
        ->where('sp_id', $sp_id)
        ->where('customer_id', $customer_id)
        ->get('tbl_sponser')
        ->row();

      $config['upload_path'] = FCPATH . 'assets/sponser_passport/';
      $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
      $config['max_size'] = 4096;
      $config['encrypt_name'] = TRUE;
      $config['remove_spaces'] = TRUE;

      if (!is_dir($config['upload_path'])) {
        mkdir($config['upload_path'], 0755, true);
      }

      if (!empty($cropped_data)) {
        $base64 = preg_replace('#^data:image/\w+;base64,#i', '', $cropped_data);
        $decoded = base64_decode($base64, true);

        if ($decoded === false) {
          $this->session->set_flashdata('error', 'Invalid cropped passport image data.');
          return redirect('oficer/view_more_customer/' . $customer_id);
        }

        $file_name = 'sponsor_passport_' . $sp_id . '_' . time() . '_' . mt_rand(100, 999) . '.jpg';
        $full_path = $config['upload_path'] . $file_name;

        if (file_put_contents($full_path, $decoded) === false) {
          $this->session->set_flashdata('error', 'Failed to save cropped passport image.');
          return redirect('oficer/view_more_customer/' . $customer_id);
        }

        $new_path = 'assets/sponser_passport/' . $file_name;
      } else {
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('passport')) {
          $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
          return redirect('oficer/view_more_customer/' . $customer_id);
        }

        $upload_data = $this->upload->data();
        $new_path = 'assets/sponser_passport/' . $upload_data['file_name'];
      }

      if (!empty($existing->passport_path)) {
        $old_full = FCPATH . ltrim($existing->passport_path, '/');
        if (file_exists($old_full)) {
          @unlink($old_full);
        }
      }

      $this->db
        ->where('sp_id', $sp_id)
        ->where('customer_id', $customer_id)
        ->update('tbl_sponser', ['passport_path' => $new_path]);

      $this->session->set_flashdata('massage', 'Sponsor passport updated successfully.');
      return redirect('oficer/view_more_customer/' . $customer_id);
    }


    public function edit_viewSponser($customer_id){
      $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $sponser = $this->queries->get_sponser($customer_id);
        $sponsers_data = $this->queries->get_sponserCustomer($customer_id);
        $customers = $this->queries->get_search_dataCustomer($customer_id);
        $region = $this->queries->get_region();
        $manager = $this->queries->get_position_manager($empl_id);
        //   echo "<pre>";
        // print_r($customer);
        //        exit();
        $this->load->view('officer/sponser_view',['sponser'=>$sponser,'sponsers_data'=>$sponsers_data,'customers'=>$customers,'region'=>$region,'privillage'=>$privillage,'manager'=>$manager]);

    }

//change password
  public function change_password(){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $old = $empl_data->password;
        $this->form_validation->set_rules('oldpass', 'old password', 'required');
        $this->form_validation->set_rules('newpass', 'new password', 'required');
        $this->form_validation->set_rules('passconf', 'confirm password', 'required|matches[newpass]');
        $this->form_validation->set_error_delimiters('<strong><div class="text-danger">', '</div></strong>');

        if($this->form_validation->run()) {
          $data = $this->input->post();
          $oldpass = $data['oldpass'];
          $newpass = $data['newpass'];
          $passconf = $data['passconf'];
             // print_r(sha1($newpass));
                 // echo "<br>";
                 // print_r($oldpass);
                 //  echo "<br>";
                 // print_r($old);
                 //    exit();
           if($old !== sha1($oldpass)){
           $this->session->set_flashdata('error','Old Password not Match') ; 
             return redirect('oficer/oficer_profile');
         }elseif($old == sha1($oldpass)){
         $this->queries->update_password_dataEmployee($empl_id, array('password' => sha1($newpass)));
         $this->session->set_flashdata('massage','Password changed successfully'); 
        $empl_data = $this->queries->get_employee_data($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $manager = $this->queries->get_position_manager($empl_id);
        $this->load->view("officer/company_profile",['empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
        
          }else{
           $empl_data = $this->queries->get_employee_data($empl_id);
           $privillage = $this->queries->get_position_empl($empl_id);
           $manager = $this->queries->get_position_manager($empl_id);
        $this->load->view("officer/company_profile",['empl_data'=>$empl_data,'privillage'=>$privillage,'manager'=>$manager]);
          }
        }
        }
// check old password is match
        public function password_check($oldpass)
    {
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $user = $this->queries->get_employee_data($empl_id);
          
        if($user->password !== sha1($oldpass)) {
            $this->form_validation->set_message('error', 'Old Password not Match');
            //return false;
        }

        return redirect("oficer/oficer_profile");
    }


    	public function loan_calculator()
	{
         	$this->load->model('queries');
      	$comp_id = $this->session->userdata('comp_id');
		$loan_category = $this->queries->get_loancategory($comp_id);

 $this->load->view('officer/loan_calculator',['loan_category'=>$loan_category]);
	}

  public function clonic_customers(){

      $this->load->model('queries');
     $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $outstand = $this->queries->defaulters_customer($blanch_id);
        $filtered = [];
        foreach ($outstand as $item) {
          $endDateStr = substr($item->loan_end_date ?? '', 0, 10);
          $endDate = DateTime::createFromFormat('Y-m-d', $endDateStr);
          if (!$endDate) {
            continue;
          }
          $today = new DateTime();
          $diff = $endDate->diff($today);
          $pendingDays = $diff->invert ? 0 : $diff->days;
          if ($pendingDays > 50) {
            $item->pending_days = $pendingDays;
            $filtered[] = $item;
          }
        }
        $outstand = $filtered;

        // echo "<pre>";
        // print_r($outstand);
        // echo "<br>";
        //        exit();
    $this->load->view('officer/clonic_customers',['outstand'=>$outstand,'privillage'=>$privillage]);

  }

    public function get_outstand_loan(){
    $this->load->model('queries');
     $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $outstand = $this->queries->get_outstand_loan_yesterday_by_branch($blanch_id);
       

        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');
        if (!empty($start_date) || !empty($end_date)) {
          $filtered = [];
          foreach ($outstand as $item) {
            $dateStr = substr($item->loan_stat_date ?? '', 0, 10);
            if (!$dateStr) {
              continue;
            }
            $date = DateTime::createFromFormat('Y-m-d', $dateStr);
            if (!$date) {
              continue;
            }
            $include = true;
            if (!empty($start_date)) {
              $start = DateTime::createFromFormat('Y-m-d', $start_date);
              if ($start && $date < $start) {
                $include = false;
              }
            }
            if (!empty($end_date)) {
              $end = DateTime::createFromFormat('Y-m-d', $end_date);
              if ($end && $date > $end) {
                $include = false;
              }
            }
            if ($include) {
              $filtered[] = $item;
            }
          }
          $outstand = $filtered;
          $totalOut = 0;
          foreach ($outstand as $item) {
            $totalOut += (float)($item->remain_amount ?? 0);
          }
          $total_remain = (object)['total_out' => $totalOut];
        }
        $manager = $this->queries->get_position_manager($empl_id);
    //    echo "<pre>";
    //  print_r($outstand);
    //         exit();
    $this->load->view('officer/out_stand_loan',[
      'outstand'=>$outstand,
      'privillage'=>$privillage,
     
      'manager'=>$manager,
      'start_date'=>$start_date ?? '',
      'end_date'=>$end_date ?? ''
    ]);
}

   public function manager_get_outstand_loan(){
    $this->load->model('queries');
     $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);

        $outstand = $this->queries->outstand_loan($comp_id);
        $total_remain = $this->queries->total_outstand_loan($comp_id);
        $manager = $this->queries->get_position_manager($empl_id);
     //   echo "<pre>";
     // print_r($outstand);
     //        exit();
    $this->load->view('officer/out_stand_loan',['outstand'=>$outstand,'privillage'=>$privillage,'total_remain'=>$total_remain,'manager'=>$manager]);
}

      public function download_outstand_loan(){
      $this->load->model('queries');
      $blanch_id = $this->session->userdata('blanch_id');
      $empl_id = $this->session->userdata('empl_id');
      $manager_data = $this->queries->get_manager_data($empl_id);
      $comp_id = $manager_data->comp_id;
      $company_data = $this->queries->get_companyData($comp_id);
      $blanch_data = $this->queries->get_blanchData($blanch_id);

      $outstand = $this->queries->outstand_loanBlanch($blanch_id);
      $total_remain = $this->queries->total_outstand_loanBlanch($blanch_id);

      $start_date = $this->input->get('start_date');
      $end_date = $this->input->get('end_date');
      if (!empty($start_date) || !empty($end_date)) {
        $filtered = [];
        foreach ($outstand as $item) {
          $dateStr = substr($item->loan_stat_date ?? '', 0, 10);
          if (!$dateStr) {
            continue;
          }
          $date = DateTime::createFromFormat('Y-m-d', $dateStr);
          if (!$date) {
            continue;
          }
          $include = true;
          if (!empty($start_date)) {
            $start = DateTime::createFromFormat('Y-m-d', $start_date);
            if ($start && $date < $start) {
              $include = false;
            }
          }
          if (!empty($end_date)) {
            $end = DateTime::createFromFormat('Y-m-d', $end_date);
            if ($end && $date > $end) {
              $include = false;
            }
          }
          if ($include) {
            $filtered[] = $item;
          }
        }
        $outstand = $filtered;
        $totalOut = 0;
        foreach ($outstand as $item) {
          $totalOut += (float)($item->remain_amount ?? 0);
        }
        $total_remain = (object)['total_out' => $totalOut];
      }

      $mpdf = new \Mpdf\Mpdf([
        'format' => 'A4-L',
        'orientation' => 'L',
          'tempDir' => APPPATH . 'tmp/mpdf',
      ]);

      $html = $this->load->view('officer/print_outstand_loan_pdf', [
        'company_data' => $company_data,
        'blanch_data' => $blanch_data,
        'outstand' => $outstand,
        'total_remain' => $total_remain,
        'start_date' => $start_date,
        'end_date' => $end_date,
      ], true);

      $mpdf->SetFooter('Generated By Brainsoft Technology | {PAGENO} of {nbpg}');
      $mpdf->WriteHTML($html);

      if (ob_get_length()) {
        ob_end_clean();
      }

      $filename = 'outstand_loans_' . date('Ymd_His') . '.pdf';
      $mpdf->Output($filename, 'I');
      }


public function print_allCustomer(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);

    $customer = $this->queries->get_customer_blanch($blanch_id);
    $compdata = $this->queries->get_companyData($comp_id);
    $blanch = $this->queries->get_blanchData($blanch_id);
      //      echo "<pre>";
      // print_r($customer);
      //          exit();

    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4-L','orientation' => 'L', 'tempDir' => APPPATH . 'tmp/mpdf']);
    $html = $this->load->view('officer/customer_report_pdf',['compdata'=>$compdata,'customer'=>$customer,'blanch'=>$blanch],true);
    $mpdf->SetFooter('Generated By Brainsoft Technology');
    $mpdf->WriteHTML($html);
    $mpdf->Output(); 

}



public function download_yesterday_defaulters_pdf()
{
    $this->load->model('queries');

    // Get branch ID from session
    $blanch_id = $this->session->userdata('blanch_id');

    // Get branch and company info
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $compdata = $this->queries->get_companyData($blanch_data->comp_id);

    // Get loans ending yesterday for this branch
    $outstand = $this->queries->get_outstand_loan_yesterday_by_branch($blanch_id);

    // Data for view
    $data = [
        'compdata'    => $compdata,
        'blanch_data' => $blanch_data,
        'outstand'    => $outstand,
        'title'       => $this->lang->line('pdf_yesterday_defaulters_report') ?: "Yesterday's Defaulters Report"
    ];

    // Clear any previous output
    if (ob_get_length()) ob_end_clean();

    // Load mPDF
    $mpdf = new \Mpdf\Mpdf(['format' => 'A4-L', 'tempDir' => APPPATH . 'tmp/mpdf']); // Landscape
    $html = $this->load->view('officer/yesterday_defaulters_pdf', $data, true);
    $mpdf->WriteHTML($html);

    // Force download
    $filename = "Yesterday_Defaulters_{$blanch_data->blanch_name}_" . date('d-m-Y') . ".pdf";
    $mpdf->Output($filename, 'D'); // 'D' = Download

    exit; // Stop any further output
}


   public function defaulters_3_30_days_pdf()
    {
        $this->load->model('queries');

        // Get company ID and branch ID from session
        $comp_id = $this->session->userdata('comp_id');
        $blanch_id = $this->session->userdata('blanch_id');

        // Get company & branch info
        $compdata = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);

        // Get all loans overdue 3–30 days for this company
        $outstand = $this->queries->get_defaulters_3_30_days_by_branch($blanch_id);

echo "<pre>";

echo "🚧 Ipo kwenye matengenezo, tafadhali subiri...";
exit();

        // Data for PDF view
        $data = [
            'compdata'    => $compdata,
            'blanch_data' => $blanch_data,
            'outstand'    => $outstand,
            'title'       => $this->lang->line('pdf_defaulters_3_30_report') ?: 'Defaulters Report (3-30 Days Past Due)'
        ];

        // Clear previous output
        if (ob_get_length()) ob_end_clean();

        // Load mPDF and render PDF
        $mpdf = new \Mpdf\Mpdf(['format' => 'A4-L', 'tempDir' => APPPATH . 'tmp/mpdf']); // Landscape
        $html = $this->load->view('officer/defaulters_3_30_days_pdf', $data, true);
        $mpdf->WriteHTML($html);

        // Force download
        $filename = "Defaulters_3_30_Days_" . date('d-m-Y') . ".pdf";
        $mpdf->Output($filename, 'D');
        exit;
    }



    public function print_loan_withdrawal(){
    $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);

    $loan_withdrawal = $this->queries->get_withdrawal_LoanBlanch($blanch_id);
    $compdata = $this->queries->get_companyData($comp_id);
    $total_interest_loan = $this->queries->get_sum_loanwithdrawal_interestBlanch($blanch_id);

     $blanch = $this->queries->get_blanchData($blanch_id);
       // print_r($blanch);
       //         exit();
     $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4-L','orientation' => 'L', 'tempDir' => APPPATH . 'tmp/mpdf']);
     $html = $this->load->view('officer/loan_withdrawal_report',['compdata'=>$compdata,'loan_withdrawal'=>$loan_withdrawal,'total_interest_loan'=>$total_interest_loan,'blanch'=>$blanch],true);
     $mpdf->SetFooter('Generated By Brainsoft Technology');
     $mpdf->WriteHTML($html);
     $mpdf->Output();
    }


     public function manager_print_loan_withdrawal(){
    $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);

    $loan_withdrawal = $this->queries->get_withdrawal_Loan($comp_id);
    $compdata = $this->queries->get_companyData($comp_id);
    $total_interest_loan = $this->queries->get_sum_loanwithdrawal_interest($comp_id);

     $blanch = $this->queries->get_blanchData($blanch_id);
       // print_r($blanch);
       //         exit();
     $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4-L','orientation' => 'L', 'tempDir' => APPPATH . 'tmp/mpdf']);
     $html = $this->load->view('officer/loan_withdrawal_report',['compdata'=>$compdata,'loan_withdrawal'=>$loan_withdrawal,'total_interest_loan'=>$total_interest_loan,'blanch'=>$blanch],true);
     $mpdf->SetFooter('Generated By Brainsoft Technology');
     $mpdf->WriteHTML($html);
     $mpdf->Output();
    }


    public function customer_update(){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $customer = $this->queries->get_all_customerBlanch($blanch_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $this->load->view('officer/customer_update',['privillage'=>$privillage,'customer'=>$customer,'empl_data'=>$empl_data]);
    }


    public function manager_customer_update(){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $customer = $this->queries->get_all_customer_incomplete($comp_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $manager = $this->queries->get_position_manager($empl_id);
        $this->load->view('officer/customer_update',['privillage'=>$privillage,'customer'=>$customer,'empl_data'=>$empl_data,'manager'=>$manager]);  
    }


    public function edit_customer($customer_id = null){
        $this->load->model('queries');
         $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        if (empty($customer_id)) {
          $customer_id = $this->input->post('customer_id');
        }

        if (empty($customer_id)) {
          $this->session->set_flashdata('error', 'Please select a customer first.');
          return redirect('oficer/customer_update');
        }

        $data = $this->queries->get_customerInfor($customer_id);

        if (empty($data) || !is_object($data)) {
          $this->session->set_flashdata('error', 'Customer not found. Please search again.');
          return redirect('oficer/customer_update');
        }

        $region = $this->queries->get_region();
        $manager = $this->queries->get_position_manager($empl_id);
        // print_r($data);
        //       exit();
        $this->load->view('officer/edit_customer',['privillage'=>$privillage,'data'=>$data,'empl_data'=>$empl_data,'region'=>$region,'manager'=>$manager]);
    }


    public function modify_customer($customer_id){
        $this->form_validation->set_rules('comp_id','company','required');
        $this->form_validation->set_rules('empl_id','company','required');
        $this->form_validation->set_rules('blanch_id','blanch','required');
        $this->form_validation->set_rules('f_name','First name','required');
        $this->form_validation->set_rules('m_name','Middle name','required');
        $this->form_validation->set_rules('l_name','Last name','required');
        $this->form_validation->set_rules('gender','gender','required');
        $this->form_validation->set_rules('date_birth','date_birth','required');
        $this->form_validation->set_rules('phone_no','phone number','required');

        if ($this->input->post('region_id') !== null && $this->input->post('region_id') !== '') {
          $this->form_validation->set_rules('region_id','region','required');
        }

        if ($this->input->post('district') !== null && $this->input->post('district') !== '') {
          $this->form_validation->set_rules('district','district','required');
        }

        if ($this->input->post('ward') !== null && $this->input->post('ward') !== '') {
          $this->form_validation->set_rules('ward','ward','required');
        }

        if ($this->input->post('street') !== null && $this->input->post('street') !== '') {
          $this->form_validation->set_rules('street','street','required');
        }

        if (!empty($_FILES['barua_utambulisho']['name'])) {
          $this->form_validation->set_rules(
            'barua_utambulisho',
            'Barua ya Utambulisho',
            'callback_validate_pdf_upload[barua_utambulisho]'
          );
        }

        if (!empty($_FILES['kitambulisho']['name'])) {
          $this->form_validation->set_rules(
            'kitambulisho',
            'Kitambulisho',
            'callback_validate_pdf_upload[kitambulisho]'
          );
        }

        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
        if ($this->form_validation->run()) {
             $data = $this->input->post();
             if (isset($data['gender'])) {
               $data['gender'] = strtolower(trim($data['gender']));
             }
             $data['phone_no'] = $this->normalize_phone_number($data['phone_no']);
             // print_r($data);
             //        exit();
             $this->load->model('queries');
             if ($this->queries->update_customerData($customer_id,$data)) {
                  if (!empty($_FILES['barua_utambulisho']['name'])) {
                    if (!$this->upload_customer_pdf('barua_utambulisho', 'barua', $customer_id)) {
                        $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
                        return redirect('oficer/edit_customer/' . $customer_id);
                    }
                  }

                  if (!empty($_FILES['kitambulisho']['name'])) {
                    if (!$this->upload_customer_pdf('kitambulisho', 'kitambulisho', $customer_id)) {
                        $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
                        return redirect('oficer/edit_customer/' . $customer_id);
                    }
                  }

                  $this->session->set_flashdata('massage','Customer detail Updated successfully');
             }else{
               $this->session->set_flashdata('error','Failed');  
             }
           return redirect('oficer/AfterUpdate/'.$customer_id);  
        }

        return redirect('oficer/edit_customer/' . $customer_id);
    }

    private function upload_customer_pdf($field_name, $file_prefix, $customer_id)
    {
        $upload_path = './assets/documents/';
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0755, true);
        }

        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 2048;
        $config['file_name'] = $file_prefix . '_' . $customer_id . '.pdf';
        $config['overwrite'] = true;

        $this->load->library('upload');
        $this->upload->initialize($config);

        return $this->upload->do_upload($field_name);
    }


    public function AfterUpdate($customer_id){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $data = $this->queries->get_customerInfor($customer_id);
        $region = $this->queries->get_region();
        $manager = $this->queries->get_position_manager($empl_id);
        $this->load->view('officer/edit_customer',['empl_data'=>$empl_data,'privillage'=>$privillage,'data'=>$data,'region'=>$region,'manager'=>$manager]);
    }


    public function update_lsatDetailCustomer($customer_id){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $last = $this->queries->get_lastdata($customer_id);
        $customer = $this->queries->search_CustomerID($customer_id, $comp_id);
        if (empty($customer)) {
          $customer = $this->queries->get_customerInfor($customer_id);
        }
        if (empty($customer)) {
          $this->session->set_flashdata('error', 'Customer not found. Please search again.');
          return redirect('oficer/customer_update');
        }
        $account = $this->queries->get_accountTYpe();
        $manager = $this->queries->get_position_manager($empl_id);
         // print_r($last);
         //       exit();
        $this->load->view('officer/update_last_detail',['privillage'=>$privillage,'empl_data'=>$empl_data,'last'=>$last,'customer'=>$customer,'account'=>$account,'manager'=>$manager]);
    }


    public function create_update_lastData($customer_id = null){
        $this->load->model('queries');

        if (empty($customer_id)) {
          $customer_id = $this->input->post('customer_id');
        }

        if (empty($customer_id)) {
          $customer_id = $this->uri->segment(3);
        }

        if (empty($customer_id)) {
          $posted_code = (string) $this->input->post('code');
          if (preg_match('/(\d+)$/', $posted_code, $m)) {
            $customer_id = $m[1];
          }
        }

        if (!empty($customer_id) && empty($this->queries->get_customerInfor($customer_id))) {
          $customer_id = null;
        }

        if (empty($customer_id)) {
          $this->session->set_flashdata('error', 'Customer not found. Please try again.');
          return redirect('oficer/customer_update');
        }

         //Prepare array of user data
        $posted_customer_id = $this->input->post('customer_id');
            $data = array(
        'customer_id'=> !empty($posted_customer_id) ? $posted_customer_id : $customer_id,
            'famous_area'=> $this->input->post('famous_area'),
            'martial_status'=> $this->input->post('martial_status'),
          
            'bussiness_type'=> $this->input->post('bussiness_type'),
            'work_status'=> $this->input->post('work_status'),
            'number_dependents'=> $this->input->post('number_dependents'),
            'place_imployment'=> $this->input->post('place_imployment'),
            'month_income'=> $this->input->post('month_income'),
            'code'=> $this->input->post('code'),
            'account_id'=> $this->input->post('account_id'),
            );

            // print_r($data);
            //     exit();

            //Pass user data to model
            $customer_code = $data['code'];
            if (!empty($data['customer_id'])) {
              $customer_id = $data['customer_id'];
            }
           
                  
           $existing_last_data = $this->queries->get_lastdata($customer_id);
           if (!empty($existing_last_data)) {
             $result = $this->queries->update_lastCustomerData($customer_id, $data);
           } else {
             $result = $this->queries->insert_customerData($data);
           }
           if ($result) {
                $this->update_code($customer_id,$customer_code);
                $this->update_customer_pendData($customer_id);
                $this->session->set_flashdata('massage','Customer Data Updated successfully');
           } else {
                $this->session->set_flashdata('error','Data failed!!');
           }
           return redirect('oficer/update_lsatDetailCustomer/'.$customer_id);
        }


         public function modify_update_lastData($customer_id = null){
          $this->load->model('queries');

          if (empty($customer_id)) {
            $customer_id = $this->input->post('customer_id');
          }

          if (empty($customer_id)) {
            $customer_id = $this->uri->segment(3);
          }

          if (empty($customer_id)) {
            $posted_code = (string) $this->input->post('code');
            if (preg_match('/(\d+)$/', $posted_code, $m)) {
              $customer_id = $m[1];
            }
          }

          if (!empty($customer_id) && empty($this->queries->get_customerInfor($customer_id))) {
            $customer_id = null;
          }

          if (empty($customer_id)) {
            $this->session->set_flashdata('error', 'Customer not found. Please try again.');
            return redirect('oficer/customer_update');
          }

         //Prepare array of user data
          $posted_customer_id = $this->input->post('customer_id');
            $data = array(
          'customer_id'=> !empty($posted_customer_id) ? $posted_customer_id : $customer_id,
            'famous_area'=> $this->input->post('famous_area'),
            'martial_status'=> $this->input->post('martial_status'),
            'natinal_identity'=> $this->input->post('natinal_identity'),
            'bussiness_type'=> $this->input->post('bussiness_type'),
            'work_status'=> $this->input->post('work_status'),
            'number_dependents'=> $this->input->post('number_dependents'),
            'place_imployment'=> $this->input->post('place_imployment'),
            'month_income'=> $this->input->post('month_income'),
            'code'=> $this->input->post('code'),
            'account_id'=> $this->input->post('account_id'),
            );

            // print_r($data);
            //     exit();

            //Pass user data to model
            $customer_code = $data['code'];
            if (!empty($data['customer_id'])) {
              $customer_id = $data['customer_id'];
            }
            $natinal_identity = $data['natinal_identity'];
                  
            if($data){
                $this->queries->update_lastCustomerData($customer_id,$data);
                $this->update_code($customer_id,$customer_code);
                $this->update_customer_pendData($customer_id);
                $this->session->set_flashdata('massage','Customer Data Updated successfully');
             }else{
                $this->session->set_flashdata('error','Data failed!!');
            }
           
            return redirect('oficer/update_lsatDetailCustomer/'.$customer_id);
        }


    // public function cashInHand_Data(){
    //     $this->load->model('queries');
    //     $blanch_id = $this->session->userdata('blanch_id');
    //     $empl_id = $this->session->userdata('empl_id');
    //     $manager_data = $this->queries->get_manager_data($empl_id);
    //     $comp_id = $manager_data->comp_id;
    //     $company_data = $this->queries->get_companyData($comp_id);
    //     $blanch_data = $this->queries->get_blanchData($blanch_id);
    //     $empl_data = $this->queries->get_employee_data($empl_id);
    //     $privillage = $this->queries->get_position_empl($empl_id);

    //     $this->load->view('officer/cash_inhandData',['empl_data'=>$empl_data,'privillage'=>$privillage]);
    // }


        //genearal manager function


    public function create_adjustment($customer_id){
     $this->load->model('queries');
     $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;

    $this->form_validation->set_rules('customer_id','Customer','required');
    $this->form_validation->set_rules('comp_id','Company','required');
    $this->form_validation->set_rules('blanch_id','blanch','required');
    $this->form_validation->set_rules('loan_id','Loan','required');
    $this->form_validation->set_rules('withdrow','withdrow','required');
    $this->form_validation->set_rules('description','description','required');
       if ($this->form_validation->run()) {
          $depost = $this->input->post();

          $customer_id = $depost['customer_id'];
          $comp_id = $depost['comp_id'];
          $blanch_id = $depost['blanch_id'];
          $loan_id = $depost['loan_id'];
          $withdraw = $depost['withdrow'];
          $description = 'ADJUSTMENT';
          
          //$this->load->model('queries');
          $data_depost = $this->queries->get_customer_Loandata($customer_id);
          $blanch_acount_balance = $this->queries->get_blanchAccountremain($blanch_id);
          $blanch_balance = $blanch_acount_balance->blanch_capital;
            
          $loan_id = $data_depost->loan_id;
          @$group = $this->queries->get_groupLoan_detail($loan_id);
          $group_id = @$group->group_id;
            // print_r($group_id);
            //      exit();
             
          $admin_data = $this->queries->get_employee_data($empl_id);
          $remain_balance = $data_depost->balance;
          $pay_id = $data_depost->pay_id;
          $depost = $data_depost->depost;
          $role = $admin_data->username;



          $old_balance = $remain_balance;
          $old_depost = $depost;
          $new_withdrawal = $withdraw;

          $remain_oldDepost = $old_depost - $new_withdrawal;
          $remain_oldBalance = $old_balance - $new_withdrawal;
          $adjust_balance = $blanch_balance - $withdraw;
            
           @$adjust_outstand = $this->queries->get_payID_outstand_loan($pay_id);
           $remain_amount = @$adjust_outstand->remain_amount;
           $paid_amount = @$adjust_outstand->paid_amount;

           $add_remain = $remain_amount + $new_withdrawal;
           $remove_paidAmount = $paid_amount - $new_withdrawal;

           @$loan_state = $this->queries->get_customerLoanStatement($loan_id);
            $pending_amount = @$loan_state->pending_amount;

            $report = $new_withdrawal - $pending_amount;
            

           $check_depost = $this->queries->get_depost_adjust($loan_id);
           $depost = $check_depost->depost;
            if ($withdraw > $depost) {
            $this->session->set_flashdata('error','Adjustiment Amount is Greater');
           return redirect('oficer/data_with_depost/'.$customer_id); 
           }else{
          //admin role
          $this->update_udjust_balanceData($pay_id,$remain_oldDepost,$group_id);
          $this->update_outstandlon_balance($pay_id,$add_remain,$remove_paidAmount);
                  //exit();
          if ($this->insert_remainBalanceData($loan_id,$comp_id,$blanch_id,$customer_id,$new_withdrawal,$remain_oldBalance,$description,$role,$group_id)) {
             $this->session->set_flashdata('massage','');
          }else{
            $this->session->set_flashdata('massage','Adjustiment has made Sucessfully');
          }
          $this->update_loan_lecordDataDeposit($pay_id,$remain_oldDepost);
          $this->update_loan_Depost($pay_id,$remain_oldDepost);
          $this->update_account_balance($blanch_id,$adjust_balance);
          $this->update_accountComp_balance($comp_id,$adjust_balance);
          $this->update_customer_loanAccount($pay_id,$report);
          return redirect('oficer/data_with_depost/'.$customer_id);  
       }
       $this->data_with_depost();
      }
      }

      //update customer loan account 
      public function update_customer_loanAccount($pay_id,$report){
     $sqldata="UPDATE `tbl_customer_report` SET `pending_amount`= '$report' WHERE `pay_id`= '$pay_id'";
  $query = $this->db->query($sqldata);
  return true;
      }

      //update outstand loan 
  public function update_outstandlon_balance($pay_id,$add_remain,$remove_paidAmount){
  $sqldata="UPDATE `tbl_outstand_loan` SET `remain_amount`= '$add_remain',`paid_amount`='$remove_paidAmount' WHERE `pay_id`= '$pay_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
  return true;
  }
      //update blanch account Adjustment
       public function update_account_balance($blanch_id,$adjust_balance){
  $sqldata="UPDATE `tbl_blanch_account` SET `blanch_capital`= '$adjust_balance' WHERE `blanch_id`= '$blanch_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
  return true;
}

     //update comp account Adjustment
  public function update_accountComp_balance($comp_id,$adjust_balance){
  $sqldata="UPDATE `tbl_ac_company` SET `comp_balance`= '$adjust_balance' WHERE `comp_id`= '$comp_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
  return true;
}



              //update adjustment data
    public function update_udjust_balanceData($pay_id,$remain_oldDepost,$group_id){
        $date = date("Y-m-d");
  $sqldata="UPDATE `tbl_pay` SET `depost`= '$remain_oldDepost',`group_id`='$group_id',`date_data`='$date' WHERE `pay_id`= '$pay_id'";
  $query = $this->db->query($sqldata);
   return true;
}

public function insert_remainBalanceData($loan_id,$comp_id,$blanch_id,$customer_id,$new_withdrawal,$remain_oldBalance,$description,$role,$group_id){
    $date = date("Y-m-d");
  $this->db->query("INSERT INTO tbl_pay (`loan_id`,`comp_id`,`blanch_id`,`customer_id`,`withdrow`,`balance`,`description`,`emply`,`group_id`,`date_data`) VALUES ('$loan_id','$comp_id','$blanch_id','$customer_id','$new_withdrawal','$remain_oldBalance','ADJUSTMENT','$role','$group_id','$date')");
}

public function update_loan_lecordDataDeposit($pay_id,$remain_oldDepost){
$sqldata="UPDATE `tbl_prev_lecod` SET `depost`= '$remain_oldDepost' WHERE `pay_id`= '$pay_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
   return true;
}

public function update_loan_Depost($pay_id,$remain_oldDepost){
$sqldata="UPDATE `tbl_depost` SET `depost`= '$remain_oldDepost' WHERE `pay_id`= '$pay_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
   return true;
}

 public function loan_collection(){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);

        $loan_collection = $this->queries->get_loan_collectionBlanch($blanch_id);

        //$income = $this->queries->get_income($comp_id);
        $loan_total = $this->queries->get_total_loanBlanch($blanch_id);
        $depost_loan = $this->queries->get_totalPaid_loanBlanch($blanch_id);
        $penart = $this->queries->get_total_penartBlanch($blanch_id);
        $penart_paid = $this->queries->get_paid_penartBlanch($blanch_id);
        //$blanch = $this->queries->get_blanch($comp_id);
        $manager = $this->queries->get_position_manager($empl_id);
        
     //               echo "<pre>";
     //      // print_r($loan_collection);
           // print_r($this->get_total_penartData(723));
     //                  exit();        
        $this->load->view('officer/loan_collection',['loan_collection'=>$loan_collection,'loan_total'=>$loan_total,'depost_loan'=>$depost_loan,'penart'=>$penart,'penart_paid'=>$penart_paid,'privillage'=>$privillage,'manager'=>$manager,'empl_data'=>$empl_data]);
      }


       public function print_all_loanCollection(){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);

        $loan_collection = $this->queries->get_loan_collectionBlanch($blanch_id);

        //$income = $this->queries->get_income($comp_id);
        $loan_total = $this->queries->get_total_loanBlanch($blanch_id);
        $depost_loan = $this->queries->get_totalPaid_loanBlanch($blanch_id);
        $penart = $this->queries->get_total_penartBlanch($blanch_id);
        $penart_paid = $this->queries->get_paid_penartBlanch($blanch_id);
        //$blanch = $this->queries->get_blanch($comp_id);
        $manager = $this->queries->get_position_manager($empl_id);
        $compdata = $this->queries->get_companyData($comp_id);

       $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4-L','orientation' => 'L', 'tempDir' => APPPATH . 'tmp/mpdf']);
       $html = $this->load->view('officer/loan_collection_report',['compdata'=>$compdata,'loan_collection'=>$loan_collection,'income'=>$income,'loan_total'=>$loan_total,'depost_loan'=>$depost_loan,'penart'=>$penart,'penart_paid'=>$penart_paid],true);
       $mpdf->SetFooter('Generated By Brainsoft Technology');
       $mpdf->WriteHTML($html);
       $mpdf->Output();

      }

      public function manager_print_all_loanCollection(){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);

        $loan_collection = $this->queries->get_loan_collection($comp_id);
        $income = $this->queries->get_income($comp_id);
        $loan_total = $this->queries->get_total_loan($comp_id);
        $depost_loan = $this->queries->get_totalPaid_loan($comp_id);
        $penart = $this->queries->get_total_penart($comp_id);
        $penart_paid = $this->queries->get_paid_penart($comp_id);
        $compdata = $this->queries->get_companyData($comp_id);

       $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4-L','orientation' => 'L', 'tempDir' => APPPATH . 'tmp/mpdf']);
       $html = $this->load->view('officer/loan_collection_report',['compdata'=>$compdata,'loan_collection'=>$loan_collection,'income'=>$income,'loan_total'=>$loan_total,'depost_loan'=>$depost_loan,'penart'=>$penart,'penart_paid'=>$penart_paid],true);
       $mpdf->SetFooter('Generated By Brainsoft Technology');
       $mpdf->WriteHTML($html);
       $mpdf->Output();

      }

      public function search_loanSatatus(){
      $this->load->model('queries');
      $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);

      $blanch = $this->queries->get_blanch($comp_id);
      $blanch_id = $this->input->post('blanch_id');
      $loan_status = $this->input->post('loan_status');
      $comp_id = $this->input->post('comp_id');
      $blanch = $this->queries->get_blanch($comp_id);
      $data_collection = $this->queries->filter_loanstatus($blanch_id,$loan_status,$comp_id);
      $data_blanch = $this->queries->get_blanch_data($blanch_id);
      $total_loans = $this->queries->get_total_loanFilter($blanch_id,$loan_status,$comp_id);
      $loan_paid = $this->queries->get_totalPaid_loanFilter($blanch_id,$loan_status,$comp_id);
      $penart_amounts = $this->queries->get_total_penartFilter($blanch_id,$loan_status,$comp_id);
      $paid_penart = $this->queries->get_paid_penartFilter($blanch_id,$loan_status,$comp_id);
      $manager = $this->queries->get_position_manager($empl_id);

         //    echo "<pre>";
         // print_r($paid_penart);
         //       exit();
      $this->load->view('officer/loan_collection_blanch',['data_collection'=>$data_collection,'data_blanch'=>$data_blanch,'total_loans'=>$total_loans,'loan_paid'=>$loan_paid,'penart_amounts'=>$penart_amounts,'paid_penart'=>$paid_penart,'blanch_id'=>$blanch_id,'loan_status'=>$loan_status,'comp_id'=>$comp_id,'privillage'=>$privillage,'manager'=>$manager,'empl_data'=>$empl_data,'blanch'=>$blanch]);

      }


    public function print_loanCollection_blanch($blanch_id,$loan_status,$comp_id){
      $this->load->model('queries');
      $data_collection = $this->queries->filter_loanstatus($blanch_id,$loan_status,$comp_id);
      $data_blanch = $this->queries->get_blanch_data($blanch_id);
      $total_loans = $this->queries->get_total_loanFilter($blanch_id,$loan_status,$comp_id);
      $loan_paid = $this->queries->get_totalPaid_loanFilter($blanch_id,$loan_status,$comp_id);
      $penart_amounts = $this->queries->get_total_penartFilter($blanch_id,$loan_status,$comp_id);
      $paid_penart = $this->queries->get_paid_penartFilter($blanch_id,$loan_status,$comp_id);
      $compdata = $this->queries->get_companyData($comp_id);
       //   echo "<pre>";
       // print_r($data_collection);
       //            exit();
       
       $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4-L','orientation' => 'L', 'tempDir' => APPPATH . 'tmp/mpdf']);
       $html = $this->load->view('officer/loan_collections_blanch_report',['data_collection'=>$data_collection,'compdata'=>$compdata,'data_blanch'=>$data_blanch,'total_loans'=>$total_loans,'loan_paid'=>$loan_paid,'penart_amounts'=>$penart_amounts,'paid_penart'=>$paid_penart],true);
       $mpdf->SetFooter('Generated By Brainsoft Technology');
       $mpdf->WriteHTML($html);
       $mpdf->Output();

      }


       public function Manager_loan_collection(){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $loan_collection = $this->queries->get_loan_collection($comp_id);

        $income = $this->queries->get_income($comp_id);
        $loan_total = $this->queries->get_total_loan($comp_id);
        $depost_loan = $this->queries->get_totalPaid_loan($comp_id);
        $penart = $this->queries->get_total_penart($comp_id);
        $penart_paid = $this->queries->get_paid_penart($comp_id);
        $blanch = $this->queries->get_blanch($comp_id);
        $manager = $this->queries->get_position_manager($empl_id);
        
     //               echo "<pre>";
     //      // print_r($loan_collection);
           // print_r($this->get_total_penartData(723));
     //                  exit();        
        $this->load->view('officer/loan_collection',['loan_collection'=>$loan_collection,'income'=>$income,'loan_total'=>$loan_total,'depost_loan'=>$depost_loan,'penart'=>$penart,'penart_paid'=>$penart_paid,'blanch'=>$blanch,'privillage'=>$privillage,'manager'=>$manager,'empl_data'=>$empl_data]);
      }

      public function loan_schedule(){
        $this->load->model('queries');
        $comp_id = $this->session->userdata('comp_id');
        $customer = $this->queries->get_allcustomerDatagroup($comp_id);
        $this->load->view('admin/loan_shedure',['customer'=>$customer]);
       }

       public function filter_loan_schedule(){
        $this->load->model('queries');
        $loan_id = $this->input->post('loan_id');
        $data_loan = $this->queries->get_loanSchedule($loan_id);
        $loan = $this->queries->get_loan_day($loan_id);
        //   echo "<pre>";
        // print_r($data_loan);
        //          exit();
        $this->load->view('admin/loan_shedure_list',['data_loan'=>$data_loan,'loan'=>$loan,'loan_id'=>$loan_id]);
       }

         public function loan_schedule_detail($loan_id = null){
        $this->load->model('queries');

        $loan_id = (int) $loan_id;
        if ($loan_id <= 0) {
          show_404();
          return;
        }

        $data_loan = $this->queries->get_loanSchedule($loan_id);
        $loan = $this->queries->get_loan_day($loan_id);

        if (empty($loan)) {
          show_404();
          return;
        }

        $this->load->view('officer/loan_schedure_list', [
          'data_loan' => $data_loan,
          'loan' => $loan,
          'loan_id' => $loan_id,
        ]);
         }

       public function print_loan_shedure($loan_id){
       $this->load->model('queries');
       $comp_id = $this->session->userdata('comp_id');
       $data_loan = $this->queries->get_loanSchedule($loan_id);
       $loan = $this->queries->get_loan_day($loan_id);
       $compdata = $this->queries->get_companyData($comp_id);
       $mpdf = new \Mpdf\Mpdf(['tempDir' => APPPATH . 'tmp/mpdf']);
       $html = $this->load->view('admin/schedule_report',['compdata'=>$compdata,'data_loan'=>$data_loan,'loan'=>$loan],true);
       $mpdf->SetFooter('Generated By Brainsoft Technology');
       $mpdf->WriteHTML($html);
       $mpdf->Output();
       }


       
        //insert sms counter
    public function insert_count_sms($comp_id,$sms_number){
        $date = date("Y-m-d");
    $this->db->query("INSERT INTO tbl_sms_count (`comp_id`,`sms_number`,`date`) VALUES ('$comp_id','$sms_number','$date')");
      }

      //update smscounter
      public function update_count_sms($comp_id,$total_sms,$sms_id){
      $sqldata="UPDATE `tbl_sms_count` SET `sms_number`= '$total_sms' WHERE `comp_id`= '$comp_id' AND `sms_id`='$sms_id'";
    // print_r($sqldata);
    //    exit();
     $query = $this->db->query($sqldata);
     return true;
      }

      public function deducted_income(){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);

        $deducted_data = $this->queries->get_deducted_balance_blanch($blanch_id);
        $total_deducted = $this->queries->get_today_deducted_feeblanch($blanch_id);
        //  echo "<pre>";
        // print_r($deducted_data);
        //        exit();

        $this->load->view('officer/deducted_income',['privillage'=>$privillage,'deducted_data'=>$deducted_data,'total_deducted'=>$total_deducted ]);
      }

      public function print_deducted()
      {
            $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);

        $deducted_data = $this->queries->get_deducted_balance_blanch($blanch_id);
        $total_deducted = $this->queries->get_today_deducted_feeblanch($blanch_id);
        //  echo "<pre>";
        // print_r($deducted_data);
        //        exit();

          $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4-L','orientation' => 'L', 'tempDir' => APPPATH . 'tmp/mpdf']);
    $html = $this->load->view('officer/print_deducted_income',['company_data'=>$company_data,'deducted_data'=>$deducted_data, 'empl_data'=>$empl_data,'blanch_data'=>$blanch_data],true);
     $mpdf->SetFooter('Generated By Brainsoft Technology');
     $mpdf->WriteHTML($html);
     $mpdf->Output();

      }

      public function interest_principal_transfor(){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        $acount = $this->queries->get_customer_account_verfied($blanch_id);
        $transfor_data = $this->queries->get_today_transaction_principal_int($blanch_id);
        $total_transfor = $this->queries->get_total_transfor($blanch_id);

        $blanch_amount = $this->queries->get_total_branchAccount($blanch_id);
        $principal_withdrawal = $this->queries->get_principal_repayment($blanch_id);
        $principal_out = $this->queries->get_principal_repayment_out($blanch_id);
        $interest_withdrawal = $this->queries->get_total_repayment_interest($blanch_id);
        $interest_out = $this->queries->get_total_repayment_interestout($blanch_id);

        $deducted_fee = $this->queries->get_deducted_feeBlanch($blanch_id);
        $non_deducted = $this->queries->get_nonDeducted_Blanchdata($blanch_id);
        $blanch_account = $this->queries->get_blanch_account_summary($blanch_id);

        $money_transaction = $this->queries->get_today_summary_transformation($blanch_id);
        $total_with_loan = $this->queries->get_total_today_loanWithdrawal($blanch_id);
        $total_principal = $this->queries->get_total_principal_repayment_blanch($blanch_id);
        $total_interest = $this->queries->get_total_interest_repayment($blanch_id);
        $sum_exp_request = $this->queries->get_total_expenses_today($blanch_id);
        $today_deducted = $this->queries->get_tot_deducted_feetoday($blanch_id);
        $today_non_deducted = $this->queries->get_total_non_deducted_fee($blanch_id);

        $principal_account = $this->queries->get_principal_repayment_account($blanch_id);
        $interest_account = $this->queries->get_interest_summary($blanch_id);
         // echo "<pre>";
         // print_r($interest_account);
         //        exit();

        $this->load->view('officer/interest_transfor',['privillage'=>$privillage,'empl_data'=>$empl_data,'acount'=>$acount,'transfor_data'=>$transfor_data,'total_transfor'=>$total_transfor,'blanch_amount'=>$blanch_amount,'principal_withdrawal'=>$principal_withdrawal,'principal_out'=>$principal_out,'interest_withdrawal'=>$interest_withdrawal,'interest_out'=>$interest_out,'deducted_fee'=>$deducted_fee,'non_deducted'=>$non_deducted,'blanch_account'=>$blanch_account,'money_transaction'=>$money_transaction,'total_with_loan'=>$total_with_loan,'total_principal'=>$total_principal,'total_interest'=>$total_interest,'sum_exp_request'=>$sum_exp_request,'today_deducted'=>$today_deducted,'today_non_deducted'=>$today_non_deducted,'principal_account'=>$principal_account,'interest_account'=>$interest_account]);
      }

      public function create_transfor_principal(){
        $this->form_validation->set_rules('comp_id','company','required');
        $this->form_validation->set_rules('blanch_id','blanch','required');
        $this->form_validation->set_rules('from_payment','from payment','required');
        $this->form_validation->set_rules('loan_type','Loan Type','required');
        $this->form_validation->set_rules('from_account','from_account','required');
        $this->form_validation->set_rules('balance','balance','required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

        if ($this->form_validation->run()) {
             $this->load->model('queries');
             $data = $this->input->post();
             $comp_id = $data['comp_id'];
             $blanch_id = $data['blanch_id'];
             $from_payment = $data['from_payment'];
             $loan_type = $data['loan_type'];
             $from_account = $data['from_account'];
             $balance = $data['balance'];
             $trans_id = $from_account;
             $princ_status = $loan_type;
              
                //principal
             $princ_balance = $this->queries->getprincipal_account($blanch_id,$trans_id,$princ_status);
             $principal_account = @$princ_balance->principal_balance;

             $blanch_account = $this->queries->get_blanch_account_target($blanch_id,$trans_id);
             $balance_blanch_capital = $blanch_account->blanch_capital;
            
             $remain_principal = $principal_account - $balance;

             //multiple
             $new_blanch_capital_principal = $balance_blanch_capital + $balance;
             
             //interest
             $interest_loan = $this->queries->get_interest_blanch_capital($blanch_id,$trans_id,$princ_status);
             $int_balance = @$interest_loan->capital_interest;

             $remain_interest = $int_balance - $balance;

            
             if ($from_payment == 'principal') {
                if ($principal_account < $balance) {
                 $this->session->set_flashdata('error','Balance Amount is not Enough');
                }else{
             $this->insert_principal_transaction_blanch($comp_id,$blanch_id,$from_payment,$princ_status,$trans_id,$balance);
             $this->update_remain_principal_balance($comp_id,$blanch_id,$trans_id,$princ_status,$remain_principal);
             $this->update_balance_capital_blanch($comp_id,$blanch_id,$trans_id,$new_blanch_capital_principal);
             $this->session->set_flashdata('massage','Transaction successfully');
             }
             }elseif($from_payment == 'interest'){
              if ($int_balance < $balance) {
                $this->session->set_flashdata('error','Balance Amount is not Enough');  
              }else{
             $this->insert_principal_transaction_blanch($comp_id,$blanch_id,$from_payment,$princ_status,$trans_id,$balance);
             $this->update_remain_interest($comp_id,$blanch_id,$trans_id,$princ_status,$remain_interest);

             $this->update_balance_capital_blanch($comp_id,$blanch_id,$trans_id,$new_blanch_capital_principal);
             $this->session->set_flashdata('massage','Transaction successfully');
               // echo "chukua interest";
                }
             }

             return redirect('oficer/interest_principal_transfor');
        }
        $this->interest_principal_transfor();
      }

      public function update_remain_interest($comp_id,$blanch_id,$trans_id,$princ_status,$remain_interest){
       $sqldata="UPDATE `tbl_blanch_capital_interest` SET `capital_interest`= '$remain_interest' WHERE `blanch_id`= '$blanch_id' AND `trans_id` = '$trans_id' AND `int_status`= '$princ_status'";
        $query = $this->db->query($sqldata);
        return true; 
      }

      public function update_balance_capital_blanch($comp_id,$blanch_id,$trans_id,$new_blanch_capital_principal){
      $sqldata = "UPDATE `tbl_blanch_account` SET `blanch_capital`= '$new_blanch_capital_principal' WHERE `blanch_id`= '$blanch_id' AND `receive_trans_id` = '$trans_id'";
      // print_r($sqldata);
      //         exit();
        $query = $this->db->query($sqldata);
        return true;
      }


      public function update_remain_principal_balance($comp_id,$blanch_id,$trans_id,$princ_status,$remain_principal){
        $sqldata="UPDATE `tbl_blanch_capital_principal` SET `principal_balance`= '$remain_principal' WHERE `blanch_id`= '$blanch_id' AND `trans_id` = '$trans_id' AND `princ_status`='$princ_status'";
        $query = $this->db->query($sqldata);
        return true;
      }


      public function insert_principal_transaction_blanch($comp_id,$blanch_id,$from_payment,$princ_status,$trans_id,$balance){
            $day = date("Y-m-d");
          $this->db->query("INSERT INTO tbl_principal_int_transfor (`comp_id`,`blanch_id`,`from_payment`,`loan_type`,`from_account`,`balance`,`date_trans`) VALUES ('$comp_id','$blanch_id','$from_payment','$princ_status','$trans_id','$balance','$day')");
      }


      public function saving_deposit(){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);
        
        $miamala = $this->queries->get_miamala($blanch_id);
        // echo "<pre>";
        // print_r($miamala);
        //       exit();
        $this->load->view('officer/saving_deposit',['privillage'=>$privillage,'empl_data'=>$empl_data,'miamala'=>$miamala]);
      }


      public function create_saving_deposit(){
        $this->form_validation->set_rules('comp_id','company','required');
        $this->form_validation->set_rules('blanch_id','blanch','required');
        $this->form_validation->set_rules('provider','provider','required');
        $this->form_validation->set_rules('agent','agent','required');
        $this->form_validation->set_rules('amount','amount','required');
        $this->form_validation->set_rules('ref_no','refference number','required');
        $this->form_validation->set_rules('time','Time','required');
        $this->form_validation->set_rules('description','description');
        $this->form_validation->set_rules('date','Date','required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

        if ($this->form_validation->run()) {
             $data = $this->input->post();
             // print_r($data);
             //      exit();
             $this->load->model('queries');
             if ($this->queries->insert_miamala($data)) {
                 $this->session->set_flashdata("massage",'Data saved successfully');
             }else{
               $this->session->set_flashdata("error",'Failed'); 
             }
             return redirect('oficer/saving_deposit');
        }
        $this->saving_deposit();
      }



      public function modify_saving_deposit($id){
        $this->form_validation->set_rules('provider','provider','required');
        $this->form_validation->set_rules('agent','agent','required');
        $this->form_validation->set_rules('amount','amount','required');
        $this->form_validation->set_rules('ref_no','refference number','required');
        $this->form_validation->set_rules('time','Time','required');
        $this->form_validation->set_rules('description','description','required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

        if ($this->form_validation->run()) {
             $data = $this->input->post();
             // print_r($data);
             //      exit();
             $this->load->model('queries');
             if ($this->queries->update_miamala($data,$id)) {
                 $this->session->set_flashdata("massage",'Data Updated successfully');
             }else{
               $this->session->set_flashdata("error",'Failed'); 
             }
             return redirect('oficer/saving_deposit');
        }
        $this->saving_deposit();
      }


      public function delete_miamala($id){
        $this->load->model('queries');
        if($this->queries->delete_miamala($id));
        $this->session->set_flashdata("massage",'Data Deleted successfully');
        return redirect('oficer/saving_deposit');
      }



        public function view_LoanCustomerData($customer_id,$comp_id){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);


         $customer_data = $this->queries->get_loanCustomer($customer_id,$comp_id);
         $loan_form = $this->queries->get_loanform($customer_id,$comp_id);
         $loan_id = $loan_form->loan_id;
         $sponser_detail = $this->queries->get_sponser_by_loan($loan_id);
         if (empty($sponser_detail)) {
             $sponser_detail = $this->queries->get_sponser_data($customer_id, $comp_id);
         }
         $collateral = $this->queries->get_colateral_data($loan_id);
         $local_oficer = $this->queries->get_loacagovment_data($loan_id);
         $group = $this->queries->get_groupLoan_detail($loan_id);
         $group_id = $group->group_id;
         $member_data = $this->queries->get_groupMember($group_id);
           // print_r($member_data);
           //     exit();
        $this->load->view('officer/view_loancustomer_data',['customer_data'=>$customer_data,'sponser_detail'=>$sponser_detail,'loan_form'=>$loan_form,'collateral'=>$collateral,'local_oficer'=>$local_oficer,'group'=>$group,'member_data'=>$member_data,'empl_data'=>$empl_data,'privillage'=>$privillage]);
    }


    public function general_operation(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);
    $privillage = $this->queries->get_position_empl($empl_id);

    $empl = $this->queries->get_general_loanGroupblanch($blanch_id);
        // echo "<pre>";
        // print_r($empl);
        //       exit();
    $this->load->view('officer/general_operation',['empl'=>$empl,'privillage'=>$privillage]);
    }


    public function print_general_operation(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);
    $privillage = $this->queries->get_position_empl($empl_id);

    $empl = $this->queries->get_general_loanGroupblanch($blanch_id);
    $compdata = $this->queries->get_companyData($comp_id);
    $blanch = $this->queries->get_blanchData($blanch_id);

    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4-L','orientation' => 'L', 'tempDir' => APPPATH . 'tmp/mpdf']);
    $html = $this->load->view('officer/print_general_operation',['compdata'=>$compdata,'empl'=>$empl,'blanch'=>$blanch],true);
     $mpdf->SetFooter('Generated By Brainsoft Technology');
     $mpdf->WriteHTML($html);
     $mpdf->Output();

        //$this->load->view('officer/print_general_operation');
    }


    public function group_list(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);
    $privillage = $this->queries->get_position_empl($empl_id);

    $group_loan = $this->queries->get_group_loan_blanch($blanch_id);
        // echo "<pre>";
        // print_r($group_loan);
        //         exit();
   $this->load->view('officer/group_list',['group_loan'=>$group_loan,'privillage'=>$privillage]);
    }


    public function print_group_collection(){
    $this->load->model('queries');
     $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;

    $compdata = $this->queries->get_companyData($comp_id);
    $group_loan = $this->queries->get_group_loan_blanch($blanch_id);
    $blanch = $this->queries->get_blanchData($blanch_id);

    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4-L','orientation' => 'L', 'tempDir' => APPPATH . 'tmp/mpdf']);
    $html = $this->load->view('officer/print_group_collection',['compdata'=>$compdata,'blanch'=>$blanch,'group_loan'=>$group_loan],true);
     $mpdf->SetFooter('Generated By Brainsoft Technology');
     $mpdf->WriteHTML($html);
     $mpdf->Output();
        //$this->load->view('officer/print_group_collection');
    }


        public function teller_oficer(){
        $this->load->model('queries');
        $blanch_id = $this->session->userdata('blanch_id');
        $empl_id = $this->session->userdata('empl_id');
        $manager_data = $this->queries->get_manager_data($empl_id);
        $comp_id = $manager_data->comp_id;
        $company_data = $this->queries->get_companyData($comp_id);
        $blanch_data = $this->queries->get_blanchData($blanch_id);
        $empl_data = $this->queries->get_employee_data($empl_id);
        $privillage = $this->queries->get_position_empl($empl_id);

        $empl_oficer = $this->queries->get_empl_data_loan_blanch($blanch_id);
        $total_deposit = $this->queries->get_total_deposit_blanch($blanch_id);
        $total_withdrawal = $this->queries->get_total_withdrawal_blanch($blanch_id);
        $cash_account = $this->queries->get_totalaccount_transaction_blanch($blanch_id);
        // echo "<pre>";
        //  print_r($empl_oficer);
        //           exit();
        $this->load->view('officer/teller_oficer',['empl_oficer'=>$empl_oficer,'total_deposit'=>$total_deposit,'total_withdrawal'=>$total_withdrawal,'cash_account'=>$cash_account,'privillage'=>$privillage]);
    }


    public function print_report_telleroficer(){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;
    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);
    $privillage = $this->queries->get_position_empl($empl_id);

    $empl_oficer = $this->queries->get_empl_data_loan_blanch($blanch_id);
    $total_deposit = $this->queries->get_total_deposit_blanch($blanch_id);
    $total_withdrawal = $this->queries->get_total_withdrawal_blanch($blanch_id);
    $cash_account = $this->queries->get_totalaccount_transaction_blanch($blanch_id);


    $compdata = $this->queries->get_companyData($comp_id);
    $blanch = $this->queries->get_blanchData($blanch_id);
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4-L','orientation' => 'L', 'tempDir' => APPPATH . 'tmp/mpdf']);
    $html = $this->load->view('officer/teller_officer_report',['compdata'=>$compdata,'blanch'=>$blanch,'empl_oficer'=>$empl_oficer,'total_deposit'=>$total_deposit,'total_withdrawal'=>$total_withdrawal,'cash_account'=>$cash_account],true);
     $mpdf->SetFooter('Generated By Brainsoft Technology');
     $mpdf->WriteHTML($html);
     $mpdf->Output();
    }


    public function update_customer_details($customer_id){
        // $this->form_validation->set_rules('blanch_id','blanch','required');
        $this->form_validation->set_rules('f_name','First name','required');
        $this->form_validation->set_rules('m_name','Middle name','required');
        $this->form_validation->set_rules('l_name','Last name','required');
        $this->form_validation->set_rules('gender','gender','required');
        $this->form_validation->set_rules('date_birth','date_birth','required');
        $this->form_validation->set_rules('age','Age');
        $this->form_validation->set_rules('phone_no','phone number','required');
        $this->form_validation->set_rules('region_id','region','required');
        $this->form_validation->set_rules('district','district','required');
        $this->form_validation->set_rules('ward','ward','required');
        $this->form_validation->set_rules('street','street','required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
        if ($this->form_validation->run()) {
             $data = $this->input->post();

             // $blanch_id = $data['blanch_id'];
             $f_name = $data['f_name'];
             $m_name = $data['m_name'];
             $l_name = $data['l_name'];
             $gender = $data['gender'];
             $date_birth = $data['date_birth'];
             $age = $data['age'];
             $phone_no = $data['phone_no'];
             $region_id = $data['region_id'];
             $district = $data['district'];
             $ward = $data['ward'];
             $street = $data['street'];
             // echo "<pre>";
             // print_r($data);
             //     exit();
             $this->load->model('queries');
             if ($this->update_customer_profile_data($customer_id,$f_name,$m_name,$l_name,$gender,$date_birth,$age,$phone_no,$region_id,$district,$ward,$street)) {
                $this->session->set_flashdata("massage",'Data Updated successfully');
             }else{
                $this->session->set_flashdata("error",'Failed');
             }
    
          return redirect("oficer/view_more_customer/".$customer_id);
        }
        $this->view_more_customer();
    }

    public function update_customer_profile_data($customer_id,$f_name,$m_name,$l_name,$gender,$date_birth,$age,$phone_no,$region_id,$district,$ward,$street){
    $sqldata="UPDATE `tbl_customer` SET `f_name`='$f_name',`m_name`='$m_name',`l_name`='$l_name',`gender`='$gender',`date_birth`='$date_birth',`age`='$age',`phone_no`='$phone_no',`region_id`='$region_id',`district`='$district',`ward`='$ward' WHERE `customer_id`= '$customer_id'";
    // print_r($sqldata);
    //    exit();
    $query = $this->db->query($sqldata);
     return true;   
    }


    public function view_collateral($loan_id,$customer_id){
    $this->load->model('queries');
    $blanch_id = $this->session->userdata('blanch_id');
    $empl_id = $this->session->userdata('empl_id');
    $manager_data = $this->queries->get_manager_data($empl_id);
    $comp_id = $manager_data->comp_id;

    $company_data = $this->queries->get_companyData($comp_id);
    $blanch_data = $this->queries->get_blanchData($blanch_id);
    $empl_data = $this->queries->get_employee_data($empl_id);
    $privillage = $this->queries->get_position_empl($empl_id);
    $data_collateral = $this->queries->get_colateral_data($loan_id);
    $this->load->view('officer/view_collateral',['data_collateral'=>$data_collateral,'customer_id'=>$customer_id,'privillage'=>$privillage]);
}

        public function next_expectation(){
            $this->load->model('queries');
            $blanch_id = $this->session->userdata('blanch_id');
            $empl_id = $this->session->userdata('empl_id');
            $manager_data = $this->queries->get_manager_data($empl_id);
            $comp_id = $manager_data->comp_id;
            $company_data = $this->queries->get_companyData($comp_id);
            $blanch_data = $this->queries->get_blanchData($blanch_id);
            $empl_data = $this->queries->get_employee_data($empl_id);
            $privillage = $this->queries->get_position_empl($empl_id);
            // echo "<pre>";
            // print_r($blanch);
            //     exit();
            $this->load->view('officer/next_expect',['privillage'=>$privillage,'empl_data'=>$empl_data]);
        }


    public function next_expectation_report(){
            $this->load->model('queries');
            $blanch_id = $this->session->userdata('blanch_id');
            $empl_id = $this->session->userdata('empl_id');
            $manager_data = $this->queries->get_manager_data($empl_id);
            $comp_id = $manager_data->comp_id;
            $company_data = $this->queries->get_companyData($comp_id);
            $blanch_data = $this->queries->get_blanchData($blanch_id);
            $empl_data = $this->queries->get_employee_data($empl_id);
            $privillage = $this->queries->get_position_empl($empl_id);
            $branch = $this->queries->get_blanch($comp_id);
            $blanch_id = $this->input->post('blanch_id');
            $from = $this->input->post('from');
            $to = $this->input->post('to');

              if ($blanch_id == 'all') {
             $data_expected = $this->queries->get_expected_receivable_comp($from,$to,$comp_id);
             $sum_expectation = $this->queries->get_expected_receivable_sum_comp($from,$to,$comp_id);   
              }else{
            $data_expected = $this->queries->get_expected_receivable($from,$to,$blanch_id);
            $sum_expectation = $this->queries->get_expected_receivable_sum($from,$to,$blanch_id);
            }
            $branch_data = $this->queries->get_blanch_data($blanch_id);
            // echo "<pre>";
            // print_r($sum_expectation);
            //        exit();

            $this->load->view('officer/next_expectation',['branch'=>$branch,'data_expected'=>$data_expected,'sum_expectation'=>$sum_expectation,'from'=>$from,'to'=>$to,'branch_data'=>$branch_data,'blanch_id'=>$blanch_id,'empl_data'=>$empl_data,'privillage'=>$privillage]);
        }


        public function print_expected_receivable($from,$to,$blanch_id){
            $this->load->model('queries');
            $blanch_id = $this->session->userdata('blanch_id');
            $empl_id = $this->session->userdata('empl_id');
            $manager_data = $this->queries->get_manager_data($empl_id);
            $comp_id = $manager_data->comp_id;
            $company_data = $this->queries->get_companyData($comp_id);
            $blanch_data = $this->queries->get_blanchData($blanch_id);
            $empl_data = $this->queries->get_employee_data($empl_id);
            $compdata = $this->queries->get_companyData($comp_id);

              if ($blanch_id == 'all') {
             $data_expected = $this->queries->get_expected_receivable_comp($from,$to,$comp_id);
             $sum_expectation = $this->queries->get_expected_receivable_sum_comp($from,$to,$comp_id);   
              }else{
            $data_expected = $this->queries->get_expected_receivable($from,$to,$blanch_id);
            $sum_expectation = $this->queries->get_expected_receivable_sum($from,$to,$blanch_id);
            }
            $branch_data = $this->queries->get_blanch_data($blanch_id);

          $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4-L','orientation' => 'L', 'tempDir' => APPPATH . 'tmp/mpdf']);
          $html = $this->load->view('officer/next_expectation_report',['compdata'=>$compdata,'branch'=>$branch,'data_expected'=>$data_expected,'sum_expectation'=>$sum_expectation,'from'=>$from,'to'=>$to,'branch_data'=>$branch_data,'blanch_id'=>$blanch_id],true);
          $mpdf->SetFooter('Generated By Brainsoft Technology');
          $mpdf->WriteHTML($html);
          $mpdf->Output();
        }


public function test_page(){
  
  $total_loan = 100000;
  $day = 7;
  $session = 4;
  $formular = 'simple';
  $interest = 20;

//interest
  $interest_loan = $interest /100 * $total_loan;
//restoration
  $restoration = ($interest_loan + $total_loan) / ($session);
  //total loan
  $loan_int = $total_loan + $interest_loan;

  $end_date = $day * $session;

 // principal restoration

  $day_int = $total_loan * $interest / 100 / $session;
  $day_princ = $restoration - $day_int;

  
  $sum_principal = round($day_princ,2) * $session;
  $sum_interest = round($day_int,2) * $session;
  $sum_restoration = $restoration * $session;

   // echo round($day_princ,2);
   // echo "<br>";
   // echo round($day_int,2);
//   echo "<br>";
//print_r(number_format($sum_principal));
  //echo "<br>";
  //print_r($restoration);
    //exit();

  

     // kanuni ya kupata interest
  // $interest /100 * $loan_aproved
  //$restoration = ($loan_interest + $loan_aproved) / ($session_loan);

    //per day
      $date = date("Y-m-d");
      $now = date('Y-m-d', strtotime('+1 week', strtotime($date)));
      $someDate = DateTime::createFromFormat("Y-m-d",$now);
      $someDate->add(new DateInterval('P'.$end_date .'D'));
      $return_data = $someDate->format("Y-m-d");

     //  $begin = new DateTime($now);
     //  $end = new DateTime($return_data);
     // //$end = $end->modify( '+1 day' );
     
     //  $array = array();
     //  $interval = DateInterval::createFromDateString('1 day');
     //  $period = new DatePeriod($begin, $interval, $end);
      
     // foreach($period as $dt){
     // $array[]['date'] = $dt->format("Y-m-d");   
     // }

    


     $startTime = strtotime($now);
     $endTime = strtotime($return_data);
     $weeks = array();
     while ($startTime < $endTime) {  
     $weeks[]['date'] = date('Y-m-d', $startTime); 
     $startTime += strtotime('+1 week', 0);
   }
     
       for($i=0; $i<count($weeks);$i++) {
        //$loan_id = 1;
      //$this->db->query("INSERT INTO  tbl_test_date (`date`,`loan_id`,`customer_id`) 
      //VALUES ('".$weeks[$i]."','$loan_id','$customer_id')"); 
     }

     $array = $weeks;

     //  foreach ($ as $key => $value) {
     // //     // code...
     //  }
    // echo "<pre>";
    //  print_r($array);
    //   exit();

   
     

       $this->load->view('officer/test',['array'=>$array,'restoration'=>$restoration,'loan_int'=>$loan_int,'day_princ'=>$day_princ,'day_int'=>$day_int,'sum_principal'=>$sum_principal,'sum_interest'=>$sum_interest,'sum_restoration'=>$sum_restoration]);


      
}

      

        //session destroy
      public function __construct(){
        parent::__construct();
        $ui_lang = $this->session->userdata('ui_lang');
        if (empty($ui_lang)) {
            $ui_lang = 'english';
            $this->session->set_userdata('ui_lang', $ui_lang);
        }

        $idiom = ($ui_lang === 'swahili') ? 'swahili' : 'english';
        $this->lang->load('app', $idiom);

        if (!$this->session->userdata("empl_id"))
            return redirect("welcome/employee_login");
}   

}

