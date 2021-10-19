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

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'trim|required|min_length[10]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('posts/create', $data);
            $this->load->view('templates/footer');
        } else {
            $this->post_model->create_post();
            // $this->load->view('posts/sucess');
            redirect('posts');
        }
    }

    // Function delete 
    public function delete($id) {
        $this->post_model->delete_post($id);
        redirect('posts');
    }
}
