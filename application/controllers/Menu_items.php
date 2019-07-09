<?php
    class Menu_items extends CI_Controller
    {
        public function index($offset = 0)
        {
            $data['title'] = ucfirst('Hot Menu Items');

            //Pagination config
            $config['base_url'] = base_url().'menu_items/index/';
            $config['total_rows'] = $this->Menu_model->get_count();
            $config['per_page'] = 3;
            $config['uri_segment'] = 3;

            //Setting some styles for pagination with bootstrap classes and html tags
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['attributes'] = ['class' => 'page-link'];
            $config['first_link'] = false;
            $config['last_link'] = false;
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
            $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';

            //Initialize pagination
            $this->pagination->initialize($config);

            //Get the menu items from the Menu model
            $data['menu_items'] = $this->Menu_model->get_items(NULL, $config['per_page'], $offset);
            
			$this->load->view('templates/header');
			$this->load->view('menu_items/index', $data);
			$this->load->view('templates/footer');
        }
        
        public function view($id = NULL)
        {
            //Get the menu item with given id from Menu model
            $data['item'] = $this->Menu_model->get_items($id);

            //If the menu item with the given id does not exist return 404.
            if(empty($data['item']))
            {
                show_404();
            }

            $data['title'] = $data['item']['item_name'];

            $this->load->view('templates/header');
			$this->load->view('menu_items/view', $data);
			$this->load->view('templates/footer');
        }

        public function create()
        {
            //Only users logged in as resturants can create a food item
            if(!$this->session->userdata('logged_in') || $this->session->userdata('role') != "Restaurant")
            {
                show_404();
            }

            $data['title'] = 'Create a new menu item';

            //Load the email helper and csrf/xss cleaning of inputs
            $this->load->helper('email');
            $this->load->helper('security');

            //Set rules for form validation
            $this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean|strip_tags');
            $this->form_validation->set_rules('description', 'Description', 'required|trim|xss_clean|strip_tags');
            $this->form_validation->set_rules('type', 'Type', 'required|trim|xss_clean|strip_tags');
            $this->form_validation->set_rules('price', 'Price', 'required|trim|xss_clean|strip_tags');

            //If form validation passes without any mishap, we will insert data into model, or else we will return the create menu item view.
            if($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header');
                $this->load->view('menu_items/create', $data);
                $this->load->view('templates/footer');
            }
            else
            {
                //Image handling configs
                $config['upload_path'] = './assets/uploaded_images/food_items';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['max_width'] = '3000';
                $config['max_height'] = '3000';

                $this->load->library('upload', $config);

                if(!$this->upload->do_upload('image')){
                    $errors = array('error' => $this->upload->display_errors());
                    $item_image = 'noimage.jpg';
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $item_image = $_FILES['image']['name'];
                }

                //Insert in the model
                $this->Menu_model->create_item($item_image);

                //Set a flash message
                $this->session->set_flashdata('item_created', 'New food item has been successfully added');
                
                redirect('menu_items');
            }
        }

        public function search()
        {
            //Access Control
            if($this->input->method(TRUE) != "POST")
            {
                show_404();
            }
            // Get the search term
            $search_term = $this->input->post('term');

            //Get search results from the menu model
            $search_results = $this->Menu_model->search($search_term);

            $base_url = base_url()."menu_items/";

            //Return data
            foreach($search_results as $res)
            {
                // <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                echo("<a href='".$base_url.$res['menu_id']."' class='list-group-item list-group-item-action'>". $res['item_name']."</a>");
            }
        }
	}