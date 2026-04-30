<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('queries');
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);
    }

    // Customer Login Page
    public function index() {
        // If already logged in, redirect to dashboard
        if ($this->session->userdata('customer_id')) {
            redirect('customer/dashboard');
        }
        $this->load->view('customer/login');
    }

    // Process Customer Login
    public function login() {
        $this->form_validation->set_rules('phone_no', 'Phone Number', 'required');
        $this->form_validation->set_rules('customer_code', 'Customer Code', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('customer');
        } else {
            $phone_no = $this->input->post('phone_no');
            $customer_code = $this->input->post('customer_code');

            // Convert phone number starting with 0 to 255
            if (substr($phone_no, 0, 1) === '0') {
                $phone_no = '255' . substr($phone_no, 1);
            }

            // Verify customer credentials
            $customer = $this->queries->verify_customer_login($phone_no, $customer_code);

            if ($customer) {
                // Set session data
                $session_data = array(
                    'customer_id' => $customer->customer_id,
                    'customer_name' => $customer->f_name . ' ' . $customer->m_name . ' ' . $customer->l_name,
                    'customer_phone' => $customer->phone_no,
                    'comp_id' => $customer->comp_id,
                    'blanch_id' => $customer->blanch_id,
                    'customer_logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);

                redirect('customer/dashboard');
            } else {
                $this->session->set_flashdata('error', 'Invalid phone number or customer code. Please try again.');
                redirect('customer');
            }
        }
    }

    // Customer Dashboard
    public function dashboard() {
        // Check if customer is logged in
        if (!$this->session->userdata('customer_logged_in')) {
            redirect('customer');
        }

        $customer_id = $this->session->userdata('customer_id');
        $comp_id = $this->session->userdata('comp_id');
        
        // Get customer data
        $data['customer'] = $this->queries->search_CustomerLoan($customer_id);

        // echo "<pre>";
        // print_r($data['customer']);
        // echo "</pre>";
        // exit();
        
        // Get all customer loans
        $data['all_loans'] = $this->queries->get_customer_all_loans($customer_id);
        
        // Get active loan
        $data['active_loan'] = $this->queries->get_loan_active_customer($customer_id);
        
        // Get notifications
        $data['notifications'] = $this->queries->get_customer_notifications($customer_id, $comp_id);
        $data['unread_count'] = $this->queries->get_unread_notification_count($customer_id, $comp_id);
        
        // Get current loan payment history if active loan exists
        if (!empty($data['active_loan'])) {
            $data['payments'] = $this->queries->get_customer_payment_history($data['active_loan']->loan_id);
            $data['total_paid'] = $this->queries->get_total_amount_paid_loan($data['active_loan']->loan_id);
            // Get payment schedule with missed payments
            $data['loan_details'] = $this->queries->get_loan_payment_schedule_with_missed($data['active_loan']->loan_id);
            // echo "<pre>";
            // print_r( $data['loan_details']);
            // echo "</pre>";
            // exit();
        } else {
            $data['payments'] = [];
            $data['total_paid'] = null;
            $data['loan_details'] = [];
        }

        $this->load->view('customer/dashboard', $data);
    }

    // View specific loan details
    public function loan_details($loan_id) {
        if (!$this->session->userdata('customer_logged_in')) {
            redirect('customer');
        }

        $customer_id = $this->session->userdata('customer_id');
        
        // Verify this loan belongs to the logged-in customer
        $loan = $this->queries->get_loan_by_id($loan_id);
        if (!$loan || $loan->customer_id != $customer_id) {
            $this->session->set_flashdata('error', 'Unauthorized access.');
            redirect('customer/dashboard');
        }

        $data['customer'] = $this->queries->get_customer_by_id($customer_id);
        $data['loan'] = $loan;
        $data['payments'] = $this->queries->get_customer_payment_history($loan_id);
        $data['total_paid'] = $this->queries->get_total_amount_paid_loan($loan_id);
        $data['loan_details'] = $this->queries->get_total_pay_description($loan_id);

        $this->load->view('customer/loan_details', $data);
    }

    // Download Payment Receipt as PDF
    public function print_receipt($loan_id) {
        if (!$this->session->userdata('customer_logged_in')) {
            redirect('customer');
        }

        $customer_id = $this->session->userdata('customer_id');
        
        // Verify this loan belongs to the logged-in customer
        $loan = $this->queries->get_loan_by_id($loan_id);
        if (!$loan || $loan->customer_id != $customer_id) {
            show_error('Unauthorized access', 403);
        }

        $data['customer'] = $this->queries->get_customer_by_id($customer_id);
        $data['loan'] = $loan;
        // Use the payment schedule method to get all payments including missed ones
        $data['payments'] = $this->queries->get_loan_payment_schedule_with_missed($loan_id);
        $data['total_paid'] = $this->queries->get_total_amount_paid_loan($loan_id);
        $data['company'] = $this->queries->get_company_by_id($this->session->userdata('comp_id'));

        // Generate HTML for PDF
        $html = $this->load->view('customer/print_receipt', $data, TRUE);

        // Create PDF
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_top' => 10,
            'margin_bottom' => 10,
            'margin_left' => 10,
            'margin_right' => 10,
            'tempDir' => APPPATH . 'tmp/mpdf',
        ]);
        
        $mpdf->SetTitle('Risiti ya Malipo - ' . $data['customer']->f_name . ' ' . $data['customer']->l_name);
        $mpdf->SetAuthor($data['company']->comp_name);
        $mpdf->WriteHTML($html);
        
        // Generate filename
        $filename = 'Risiti_' . $data['customer']->f_name . '_' . date('Y-m-d') . '.pdf';
        
        // Download PDF (D = download, I = inline view)
        $mpdf->Output($filename, 'D');
    }

    // Mark Notification as Read
    public function mark_notification_read($notification_id) {
        if (!$this->session->userdata('customer_logged_in')) {
            echo json_encode(['success' => false, 'message' => 'Unauthorized']);
            return;
        }

        $customer_id = $this->session->userdata('customer_id');
        $result = $this->queries->mark_notification_read($notification_id, $customer_id);
        
        echo json_encode(['success' => $result]);
    }

    // Logout
    public function logout() {
        // Destroy customer session
        $this->session->unset_userdata([
            'customer_id',
            'customer_name',
            'customer_phone',
            'comp_id',
            'blanch_id',
            'customer_logged_in'
        ]);
        $this->session->set_flashdata('massage', 'You have been logged out successfully.');
        redirect('customer');
    }
}
