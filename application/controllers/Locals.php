<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Locals extends MY_Controller{


	public function __construct(){

		parent::__construct();
		$this->load->model('locals_model');

	}


	public function index(){

		$this->data['trending'] = $this->locals_model->get_top_category('trending');
		$this->data['ranking'] = $this->locals_model->get_top_category('ranking');
		$this->data['music_random'] = $this->locals_model->random_music_types();
		$this->render('home');
	}


	public function show($id){

		$this->data['local_show'] = $this->locals_model->get_one($id);
		$this->data['gallery'] = $this->locals_model->get_gallery($id);

		if ($this->session->userdata('user_id') > 0) {
			$user_id = $this->session->userdata('user_id');
			$this->data['check_favorite'] = $this->locals_model->check_button('favorites', $user_id, $id);
			$this->data['check_visited'] = $this->locals_model->check_button('visited', $user_id, $id);
			$this->data['local_ranking'] = $this->locals_model->get_local_ranking($user_id, $id);

		}

		$this->data['events'] = $this->locals_model->get_local_party($id);

		$this->render('locals_show');

	}


	public function search(){

		$output = '';
		$search = strtolower($this->input->post('query'));

	    if ($search == 'trending') {
	      $conditions = ' AND locals.trending = 1';
	    }elseif ($search == 'top ranking') {
	      $conditions = ' AND locals.ranking >= 4.2';
	    }else{
	      $conditions = " AND locals.name LIKE '%$search%' OR category LIKE '%$search%' OR locals.adress LIKE '%$search%'";
	    }

		$search_results = $this->locals_model->search($conditions);

		if(isset($search_results) && !empty($search_results)){

			foreach($search_results as $row){

          $output.= "
          <a href='locals/show/" . $row['id'] . "' class='show_search_results'>
            <div class='show_search_results_image'>
              <img src='assets/images/locals/" . $row['id'] . "/" . $row['image'] . "' alt='" . $row['name'] . "'>
            </div>
            <div class='show_search_results_info'>
              <p> " . $row['name'] . " " . $row['adress'] . " </p>
              <p> " . $row['category'] . "</p>
            </div>
            <div class='show_search_results_ranking'>
              <div class='stars-outer'  data-ranking=" . $row['ranking'] . ">
                <div class='stars-inner'></div>
              </div>
            </div>
            </a>";
			}
		}
		else
		{
			$output .= "<br><p>No matches found</p><br>";
		}

		echo $output;
	}


	public function insert_button($table, $user_id, $local_id){

		$data = array(
		   'user_id' => $user_id,
		   'local_id' => $local_id,
		);

		$this->db->insert($table, $data);
	}


	public function delete_button($table, $user_id, $local_id){

		$data = array(
		   'user_id' => $user_id,
		   'local_id' => $local_id,
		);

		$this->db->delete($table, $data);
	}


	public function insert_ranking($user_id, $local_id, $ranking){

		$data = array(
		   	'user_id' => $user_id,
		   	'local_id' => $local_id,
			'ranking_given' => $ranking
		);

		$this->db->insert('ranking', $data);
	}


	public function update_ranking($user_id, $local_id, $ranking){

		$data = array(
		   	'user_id' => $user_id,
		   	'local_id' => $local_id,
			'ranking_given' => $ranking
		);

		$this->db->where('user_id', $user_id);
		$this->db->where('local_id', $local_id);
		$this->db->update('ranking', $data);

		$this->new_local_ranking($local_id);
	}


	public function new_local_ranking($local_id){

		$this->db->select_avg('ranking_given');
		$this->db->where('local_id', $local_id);
		$query = $this->db->get('ranking');
		$row = $query->row();

 		$new_ranking = $row->ranking_given;

 		$data = array(
			'ranking' => $new_ranking
		);

 		$this->db->where('id', $local_id);
		$this->db->update('locals', $data);

	}


	public function creat_event(){

		if($this->input->post('add_event')){

			$local_id = $_SESSION['user_id'];
			$title = $this->input->post('event_name');
			$text = $this->input->post('event_text');
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');

			$data = array(
				'local_id' => $local_id,
				'title' => $title,
				'text' => $text,
				'start_date' => $start_date,
				'end_date' => $end_date,
			);

			$this->db->insert('local_partys', $data);

			redirect("/users/profile", "refresh");
		}
	}


	public function go_map(){
		$this->render('only_map');
	}


	public function go_help(){

		$this->render('help');

		}

	public function quick_search_music($id){

		$this->data['quick_search_type'] = $this->locals_model->quick_search_musics($id);
		$this->render('locals_index');

	}


}
