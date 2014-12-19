<?php

class Post extends CI_Model{

	function add_post($post)
	{
		$query = "INSERT INTO posts (description, created_at, updated_at) VALUES (?, NOW(), NOW())";
		$values = array($post);
		return $this->db->query($query, $values);
	}

	function get_all_posts()
	{
		return $this->db->query("SELECT * FROM posts")->result_array();
	}

	function get_last_post()
	{
		return $this->db->query("SELECT * FROM posts ORDER BY id DESC LIMIT 1")->row_array();
	}
}