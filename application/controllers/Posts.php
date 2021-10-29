<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posts extends CI_Controller {
    public function index() {
        $data['title'] = 'Latest Posts';

        $data['posts'] = $this->post_model->get_posts();
        // print_r($data['posts']);

        $this->load->view('templates/header');
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug = NULL) {
        $data['post'] = $this->post_model->get_posts($slug);

        if (empty($data['post'])) {
            show_404();
        }

        $data['title'] = $data['post']['title'];

        $this->load->view('templates/header');
        $this->load->view('posts/view', $data);
        $this->load->view('templates/footer');
    }

    /* Function Create */
    public function create() {
        $data['title'] = 'Create Post';

        // Get categories 
        $data['categories'] = $this->post_model->get_categories();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'trim|required|min_length[10]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('posts/create', $data);
            $this->load->view('templates/footer');
        } else {
            // Upload Image 
            $config['upload_path'] = './assets/images/posts';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['upload_size'] = '2048';
            $config['max_width'] = '1080';
            $config['max_height'] = '1080';

            // Load library 
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $errors = array('error' => $this->upload->display_errors());
                $post_image = 'nomiage.jpg';
            } else {
                // Insert name image to db 
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
            }

            $this->post_model->create_post($post_image);
            // $this->load->view('posts/sucess');
            redirect('posts');
        }
    }

    // Function delete 
    public function delete($id) {
        $this->post_model->delete_post($id);
        redirect('posts');
    }

    // Function Edit 
    public function edit($slug) {
        $data['post'] = $this->post_model->get_posts($slug);

        // Get categories 
        $data['categories'] = $this->post_model->get_categories();

        if (empty($data['post'])) {
            show_404();
        }

        $data['title'] = 'Edit Post';

        $this->load->view('templates/header');
        $this->load->view('posts/edit', $data);
        $this->load->view('templates/footer');
    }

    // Function update post 
    public function update() {

        // $id = $this->input->post('id');
        // $data_array = array(
        //     'id' => $id
        // );
        // // var_dump($id);
        // // die();

        // $result = $this->db->get_where('posts', $data_array)->row_array();
        // $slug = $result['slug'];
        // $data['post'] = $this->post_model->get_posts($slug);
        // // var_dump($result['title']);
        // // die();

        // var_dump($data);
        // die();
        // $this->form_validation->set_rules('title', 'Title', 'required');
        // $this->form_validation->set_rules('body', 'Body', 'trim|required|min_length[10]');

        // if ($this->form_validation->run() === FALSE) {
        //     $this->load->view('templates/header');
        //     $this->load->view('posts/edit', $data);
        //     $this->load->view('templates/footer');
        // } else {
        //     $this->post_model->update_post();
        //     redirect('posts');
        // }

        // Get categories 
        $data['categories'] = $this->post_model->get_categories();

        $this->post_model->update_post();
        redirect('posts');
    }
}
