<?php 
    class Users extends CI_Controller
    {
        public function register()
        {
            //If user is already logged in, redirect to menu items page
            if($this->session->userdata('logged_in'))
            {
                redirect('menu_items');
            }

            $data['title'] = "Sign Up";

            //Load the email helper and csrf/xss cleaning of inputs
            $this->load->helper('email');
            $this->load->helper('security');

            //Setting a custom message for rule is_unique
            $this->form_validation->set_message('is_unique', '%s is already registered.');

            //Run form validation checks
            $this->form_validation->set_rules('name', 'Name', "required|trim|xss_clean|strip_tags");
            $this->form_validation->set_rules('email', 'Email', "required|trim|xss_clean|strip_tags|valid_email|is_unique[users.email]");
            $this->form_validation->set_rules('preference', 'Preference', "required");
            $this->form_validation->set_rules('password', 'Password', "required|min_length[8]|alpha_numeric");
            $this->form_validation->set_rules('password_c', 'Confirm Password', "required|matches[password]");

            //Run the validations
            if($this->form_validation->run() === FALSE)
            {
                //If there's some error return the register page again
                $this->load->view('templates/header');
                
                if($this->uri->segment(1) === "register-restaurant")
                {
                    $data['title'] = "Sign Up as Resturant";
                    $this->load->view('users/register_restaurant', $data);
                }
                else
                {
                    $data['title'] = "Sign Up as Customer";
                    $this->load->view('users/register_customer', $data);
                }
                $this->load->view('templates/footer');
            }
            else
            {
                //Encrypt the password
                $enc_password = md5($this->input->post('password'));

                //Form validation has been done and now entry to database is to be made
                $this->User_model->register($enc_password);

                //Set a flash message
                $this->session->set_flashdata('user_registered', 'You are now registered and can log in');

                //Redirect to menu items page
                redirect('menu_items');
            }
        }

        public function login()
        {
            //If user is already logged in, redirect to menu items page
            if($this->session->userdata('logged_in'))
            {
                redirect('menu_items');
            }

            $data['title'] = "Log in";

            //Load helper for csrf/xss cleaning
            $this->load->helper('security');

            //Run form validation checks
            $this->form_validation->set_rules('email', 'Email', "required|trim|xss_clean|strip_tags|valid_email");
            $this->form_validation->set_rules('password', 'Password', "required");

            //Run the validations
            if($this->form_validation->run() === FALSE)
            {
                //Show the login page again if validations fail
                $this->load->view('templates/header');
                $this->load->view('users/login', $data);
                $this->load->view('templates/footer');
            }
            else
            {
                //Grab the email id
                $email = $this->input->post('email');

                //Grab and encrypt the password
                $enc_password = md5($this->input->post('password'));

                //Match credentials against the database and return the user data if there's a match, otherwise returns false
                $user_data = $this->User_model->login($email, $enc_password);

                if($user_data)
                {
                    //Create session for the user
                    $this->session->set_userdata($user_data);

                    //Set a flash message
                    $this->session->set_flashdata('user_loggedin', 'You have been successfully logged in');

                    //Redirect to menu items page
                    redirect('menu_items');
                }
                else
                {
                    //Set a flash message
                    $this->session->set_flashdata('login_error', 'Please enter valid credentials');

                    //Redirect to menu items page
                    redirect('login');
                }
            }
        }

        public function logout()
        {
            //If user is not logged in, show log in page
            if(!$this->session->userdata('logged_in'))
            {
                redirect('login');
            }

            // return $this->session->userdata('email');

            //Unset every individual session data created for the user
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('name');
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('role');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('preference');

            //Set a flash message
            $this->session->set_flashdata('user_loggedout', 'You have been successfully logged out');

            //Redirect to menu items page
            redirect('menu_items');
        }
    }