<?php

class Post_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_posts($slug = FALSE) {
        if ($slug === FALSE) {
            // View All Posts 
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get_where('posts', array('status' => 0));
            return $query->result_array();
        }

        // View individual post for details 
        $query = $this->db->get_where('posts', array('slug' => $slug));
        return $query->row_array();
    }

    public function create_post() {
        $slug = url_title($this->input->post('title'));
        /* url_title:  https://codeigniter.com/userguide3/helpers/url_helper.html?highlight=url_title#url_title */

        $data = [
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'body' => $this->input->post('body'),
        ];

        return $this->db->insert('posts', $data);
    }

    // Delete Post 
    public function delete_post($id) {
        $this->db->where('id', $id);
        $data_array = array('status' => 1);
        $this->db->update('posts', $data_array);
        return true;
    }

    // Update post model 
    public function update_post() {
        $slug = url_title($this->input->post('title'));

        $data = [
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'body' => $this->input->post('body'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $query = $this->db->update('posts', $data);
        return $query;
    }
}
