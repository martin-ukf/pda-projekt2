<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Studenti extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Studenti_model');
	}

	public function index(){
		$data = array();
		$data['studenti'] = $this->Studenti_model->ZobrazStudentov();
		$data['nazov'] = 'Zoznam študentov';
		//nahratie zoznamu studentov
		$this->load->view('studenti/index', $data);
	}

	// Zobrazenie detailu o studentovi
	public function view($id){
		$data = array();

		//kontrola, ci bolo zaslane id riadka
		if(!empty($id)){
			$data['studenti'] = $this->Studenti_model->ZobrazStudentov($id);
			$data['title'] = $data['studenti']['priezvisko'] . ' ' . $data['studenti']['meno'];

			//nahratie detailu zaznamu
			$this->load->view('templates/header', $data);
			$this->load->view('studenti/view', $data);
			$this->load->view('templates/footer');
		}else{
			redirect('/studenti');
		}
	}

}
