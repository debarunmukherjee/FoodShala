<?php
    class Orders extends CI_Controller
    {
        public function index($menu_id = NULL)
        {
            if(!$this->session->userdata('logged_in') || ($this->session->userdata('role') === "Restaurant") || $menu_id === NULL)
            {
                show_404();
            }

            //Set the title
            $data['title'] = "Checkout";

            //Get the details of the menu item ordered
            $data['menu_item'] = $this->Menu_model->get_items($menu_id);

            $this->load->view('templates/header');
            $this->load->view('orders/checkout', $data);
            $this->load->view('templates/footer');
        }

        public function place_order()
        {
            if(!$this->session->userdata('logged_in') || ($this->session->userdata('role') === "Restaurant") || $this->input->method(TRUE) != "POST")
            {
                show_404();
            }

            //Set the title
            $data['title'] = "Thank You !";

            //Load the xss cleaning helper
            $this->load->helper('security');

            //Set form validation rules
            $this->form_validation->set_rules('address', 'Address', 'required|trim|xss_clean|strip_tags');
            $this->form_validation->set_rules('phone', 'Phone Number', 'required|trim|xss_clean|strip_tags');
            $this->form_validation->set_rules('restaurant', 'Restaurant', 'required|trim|xss_clean|strip_tags');
            $this->form_validation->set_rules('menu_id', 'Menu Id number', 'required|trim|xss_clean|strip_tags');
            $this->form_validation->set_rules('quantity', 'Quantity', 'required|trim|xss_clean|strip_tags');
            $this->form_validation->set_rules('amount', 'Amount', 'required|trim|xss_clean|strip_tags');

            //Run all the form form validations
            if($this->form_validation->run() === FALSE)
            {
                //If the validations didn't run correctly, go to the checkout page again
                $data['title'] = "Checkout";
                $this->load->view('templates/header');
                $this->load->view('orders/checkout', $data);
                $this->load->view('templates/footer');
            }
            else
            {
                //If validations ran successfully, insert in the orders database.
                $this->Order_model->create();

                //Set a flash message
                $this->session->set_flashdata("order_placed", "Sit tight master. We will make sure to deliver your dream meal in no time!");

                //Redirect to order history page
                return redirect('order-history');
            }
        }

        public function history()
        {
            if(!$this->session->userdata('logged_in') || ($this->session->userdata('role') === "Restaurant"))
            {
                show_404();
            }

            //Set the title
            $data['title'] = "Your order history";

            //Get the order history
            $data['history'] = $this->Order_model->history();

            //Load the pages with the data
            $this->load->view('templates/header');
            $this->load->view('orders/order_history', $data);
            $this->load->view('templates/footer');
        }

        public function view_orders()
        {
            if(!$this->session->userdata('logged_in') || ($this->session->userdata('role') === "User"))
            {
                show_404();
            }

            //Set the title
            $data['title'] = "Orders Taken";

            //Get the orders taken by the resturant
            $data['orders'] = $this->Order_model->get_orders();

            //Load the pages with data
            $this->load->view('templates/header');
            $this->load->view('orders/restaurant_orders', $data);
            $this->load->view('templates/footer');
        }
    }