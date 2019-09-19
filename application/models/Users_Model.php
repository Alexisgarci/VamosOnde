<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_Model extends CI_Model {


	public function user_login($username){

		$query = "SELECT user_id, permissions, password FROM users WHERE active = 1 AND username = '$username' LIMIT 1";

		return $this->db->query($query)->row_array();
	}


	public function user($user_id){

		$query = "SELECT * FROM users WHERE active = 1 AND user_id = '$user_id' LIMIT 1";

		return $this->db->query($query)->row_array();
	}


	public function update_password($pass_encrypted, $user_id){

		$data = array(

			'password' => $pass_encrypted
		);

		return $this->db->where('user_id', $user_id)->update('users', $data);
	}


	public function update_email($new_email, $user_id){

		$data = array(

			'email' => $new_email
		);

		return $this->db->where('user_id', $user_id)->update('users', $data);
	}


	public function delete_user($user_id){

	    $this->db->where('user_id', $user_id);
	    $this->db->delete('users');
	}


	public function get_favorites($user_id){

		$query = "SELECT favorites.user_id, locals.id, locals.name, locals.adress, locals.type, locals.image, locals.opening, locals.closing, locals.ranking, GROUP_CONCAT(music_type.category ORDER BY locals.id SEPARATOR ', ') AS category FROM locals JOIN music_type ON FIND_IN_SET(music_type.id, locals.category_id) JOIN favorites ON favorites.local_id = locals.id WHERE locals.active = 1 AND user_id = $user_id GROUP BY locals.id";

		return $this->db->query($query)->result_array();
	}

}
