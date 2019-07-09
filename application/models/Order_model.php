<?php
    class Order_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function create()
        {
            //Prepare the order data to be inserted
            $data = array(
                "user_id" => $this->session->userdata('user_id'),
                "restaurant_name" => $this->input->post('restaurant'),
                "menu_id" => $this->input->post('menu_id'),
                "quantity" => $this->input->post('quantity'),
                "amount" => $this->input->post('amount'),
                "address" => $this->input->post('address'),
                "phone" => $this->input->post('phone'),
                "payment_id" => "DUMMY12345"
            );

            //Insert the data in the orders database
            return $this->db->insert('orders', $data);
        }

        public function history()
        {
            //Get the items in the descending order of their creation
            $this->db->order_by('orders.order_id', 'DESC');

            //Join the orders table and menu table to get the details of the menu item.
            $this->db->join('menu', 'menu.menu_id = orders.menu_id');

            //Set condition to get only orders of the current logged in user
            $this->db->where('user_id', $this->session->userdata('user_id'));

            $query = $this->db->get('orders');
            return $query->result_array();
        }

        public function get_orders()
        {
            //Get the items in the descending order of their creation
            $this->db->order_by('orders.order_id', 'DESC');

            //Join the orders table and menu table to get the details of the menu item.
            $this->db->join('menu', 'menu.menu_id = orders.menu_id');
            $this->db->join('users', 'users.id = orders.user_id');

            //Set condition to get only orders of the current logged in user
            $this->db->where('restaurant_name', $this->session->userdata('name'));

            $query = $this->db->get('orders');
            return $query->result_array();
        }
    }