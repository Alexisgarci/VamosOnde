<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Locals_Model extends CI_Model{


	public function get_categories(){

		return $this->db->query("SELECT * FROM music_type ORDER BY category ASC")->result_array();
	}


	public function search($conditions){

		$query = "SELECT locals.id, locals.name, locals.adress, locals.type, locals.image, locals.opening, locals.closing, locals.ranking, GROUP_CONCAT(music_type.category ORDER BY locals.id SEPARATOR ', ') AS category FROM locals JOIN music_type ON FIND_IN_SET(music_type.id, locals.category_id) WHERE locals.active = 1 $conditions GROUP BY locals.id";

		return $this->db->query($query)->result_array();
	}


	public function get_one($id){

		$query = "SELECT locals.id, locals.name, locals.adress, locals.type, locals.image, locals.opening, locals.closing, locals.ranking, GROUP_CONCAT(music_type.category ORDER BY locals.id SEPARATOR ', ') AS category FROM locals JOIN music_type ON FIND_IN_SET(music_type.id, locals.category_id) WHERE locals.active = 1 AND locals.id = $id GROUP BY locals.id";

		return $this->db->query($query)->row_array();
	}

	public function get_local_party($id){

		$query = "SELECT * FROM local_partys WHERE local_id = $id";

		return $this->db->query($query)->result_array();
	}


	public function get_local_ranking($user_id, $local_id) {

		$query = "SELECT ranking_given FROM ranking WHERE user_id = $user_id AND local_id = $local_id";

		return $this->db->query($query)->row_array();

	}


	public function get_top_category($category){

		if ($category == 'trending') {
			$conditions = ' AND locals.trending = 1';
		}else{
			$conditions = ' AND locals.ranking >= 4.2';
		}

		$query = "SELECT locals.id, locals.name, locals.adress, locals.type, locals.image, locals.opening, locals.closing, locals.ranking, GROUP_CONCAT(music_type.category ORDER BY locals.id SEPARATOR ', ') AS category FROM locals JOIN music_type ON FIND_IN_SET(music_type.id, locals.category_id) WHERE locals.active = 1 $conditions GROUP BY locals.id";

		return $this->db->query($query)->result_array();
	}


	public function check_button($table, $user_id, $local_id){

		$query = $this->db->query("SELECT * FROM $table WHERE user_id = $user_id AND local_id = $local_id")->row_array();

		if (is_array($query) && count($query) > 0) {

			return true;
		}else{

			return false;
		}

	}


	public function random_music_types(){

		$query = "SELECT * FROM music_type ORDER BY RAND() LIMIT 7";

		return $this->db->query($query)->result_array();

	}


	public function quick_search_musics($id){

		$query = "SELECT locals.id, locals.name, locals.adress, locals.type, locals.image, locals.opening, locals.closing, locals.ranking, GROUP_CONCAT(music_type.category ORDER BY locals.id SEPARATOR ', ') AS category FROM locals JOIN music_type ON FIND_IN_SET(music_type.id, locals.category_id) WHERE music_type.id = $id AND locals.active = 1 GROUP BY locals.id";

		return $this->db->query($query)->result_array();
	}


	public function get_gallery($id){

		$query = $this->db->query("SELECT gallery FROM locals WHERE id = $id")->row_array();

		foreach ($query as $row){

	       return explode(', ',$row);
		}

	}

}
