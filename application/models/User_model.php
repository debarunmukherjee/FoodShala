<?php
    class User_model extends CI_model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function register($enc_password)
        {
            //Prepare the data to be inserted
            $data = array(
                'name'        => $this->input->post('name'),
                'email'       => $this->input->post('email'),
                'preference'  => $this->input->post('preference'),
                'role'        => $this->input->post('role'),
                'password'    => $enc_password
            );

            //Insert into the users table
            $this->db->insert('users', $data);
        }

        public function login($email, $enc_password)
        {
            //Validation
            $this->db->where('email', $email);
            $this->db->where('password', $enc_password);

            //Get the user whith the given credentials
            $result = $this->db->get('users');

            if($result->num_rows() === 1)
            {
                //Validation passed and user can log in
                $user_data = array(
                    "user_id"    => $result->row(0)->id,
                    "name"       => $result->row(0)->name,
                    "email"      => $result->row(0)->email,
                    "role"       => $result->row(0)->role,
                    "preference" => $result->row(0)->preference,
                    "logged_in"  => true
                );
                return $user_data;
            }
            else
            {
                //Validation failed
                return FALSE;
            }
        }
    }