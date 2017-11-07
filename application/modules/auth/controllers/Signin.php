<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Authentication Module
 *
 * @module		authentication module
 * @author		Syahril Hermana (syahril.hermana@gmail.com)
 * @copyright	Copyright (c) 2017.
 * @version		v1.0.0
 */

class Signin extends MY_Controller
{
    public $error = '';

    function __construct(){
        parent::__construct();

        $this->template->set_template('authentication');
    }

    public function index()
    {
        if ($this->aauth->is_loggedin())
            redirect('account/profile');

        $this->template->title = 'Sign In';

        $data = array();
        $this->template->content->view('index', $data);

        $this->template->publish();
    }

    public function do_login()
    {
        if ($this->aauth->is_loggedin())
            redirect('account/profile');

        $this->form_validation->set_rules('username', 'Email / Username is required', 'required');
        $this->form_validation->set_rules('password', 'Password is required', 'required');

        if($this->form_validation->run() == true) {
            if ($this->aauth->login($this->input->post('username'), $this->input->post('password'))) {
                $this->session->set_flashdata('success', 'Welcome back ');
                redirect('account/profile');
            }
            else {
                if(count($this->aauth->get_errors_array()) > 0)
                    $this->error = $this->aauth->get_errors_array()[0];

                $this->session->set_flashdata('error', $this->error);
                $this->session->keep_flashdata('error');
                redirect('auth/sign-in');
            }
        }
        else {
            $this->session->set_flashdata('error', 'Email / Username & Password is required');
            $this->session->keep_flashdata('error');
            redirect('auth/sign-in');
        }
    }

    public function do_logout()
    {
        if ($this->aauth->is_loggedin())
            $this->aauth->logout();

        redirect('/');
    }

    public function forgot_password()
    {
        $this->template->title = 'Forgot Password';

        $data = array();
        $this->template->content->view('forgot-password', $data);

        $this->template->publish();
    }

    public function remind_password()
    {
        $this->form_validation->set_rules('email', 'Email is required', 'required');

        if($this->form_validation->run() == true) {
            if($this->aauth->remind_password($this->input->post('email'))) {
                $this->session->set_flashdata('success', 'We was send to you');
                $this->session->keep_flashdata('success');
                redirect('auth/forgot-my-password');
            }
            else {
                if(count($this->aauth->get_errors_array()) > 0)
                    $this->error = $this->aauth->get_errors_array()[0];

                $this->session->set_flashdata('error', $this->error);
                $this->session->keep_flashdata('error');
            }
        }
    }
}