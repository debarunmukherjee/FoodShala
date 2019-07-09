<?php
    class Menu_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function get_count()
        {
            //Get the items only according to preference
            if($this->session->userdata('preference') === "Veg")
            {
                $this->db->where('type', 'Veg');
            }
            else if($this->session->userdata('preference') === "Non-Veg")
            {
                $this->db->where('type', 'Non-Veg');
            }

            //Return the total number of menu items in the database
            $this->db->from('menu');
            return $this->db->count_all_results();
        }

        public function get_items($id = NULL, $limit = NULL, $offset = NULL)
        {
            //Limit items for pagination
            if($limit != NULL)
            {
                $this->db->limit($limit, $offset);
            }

            //Get the items only according to preference
            if($this->session->userdata('preference') === "Veg")
            {
                $this->db->where('type', 'Veg');
            }
            else if($this->session->userdata('preference') === "Non-Veg")
            {
                $this->db->where('type', 'Non-Veg');
            }

            //Get the items in the descending order of their creation
            $this->db->order_by('menu.menu_id', 'DESC');

            //Join the users table and menu table to get the restaurant name by matching the restaurant_id
            $this->db->join('users', 'users.id = menu.restaurant_id');

            //Return all menu items if no particular id is passed.
            if($id == NULL){
                $query = $this->db->get('menu');
                return $query->result_array();
            }

            //If a particular id is passed, then return only that menu item.
            $query = $this->db->get_where('menu', array('menu.menu_id' => $id));
            return $query->row_array();
        }

        public function create_item($item_image)
        {
            //Make a slug url for the menu item (for SEO stuff)
            $slug = url_title($this->input->post('name'));

            //Prepare the data to be inserted
            $data = array(
                'item_name'      => $this->input->post('name'),
                'description'    => $this->input->post('description'),
                'restaurant_id'  => $this->session->userdata('user_id'),
                'type'           => $this->input->post('type'),
                'price'          => $this->input->post('price'),
                'slug'           => $slug,
                'image'          => $item_image
            );

            //Insert the data in the menu table
            return $this->db->insert('menu', $data);
        }

        public function search($term)
        {
            //If search term is empty return an empty array
            if(empty($term))
                return array();

            //Get the items only according to preference
            if($this->session->userdata('preference') === "Veg")
            {
                $this->db->where('type', 'Veg');
            }
            else if($this->session->userdata('preference') === "Non-Veg")
            {
                $this->db->where('type', 'Non-Veg');
            }

            //Limit the results to 6 items
            $this->db->limit(6);

            //Get the matching menu items
            $result = $this->db->like('item_name', $term)->get('menu');

            //Return the results
            return $result->result_array();
        }
    }