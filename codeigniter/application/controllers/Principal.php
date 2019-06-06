<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	public function index() {
		if(@$_SESSION['info']->tipo != '') {
			$tipo = $_SESSION['info']->tipo;
			redirect('http://localhost/' . $tipo);
		}

		$this->load->model('Principal_model');
		if($_POST != NULL) {
			$correo = $_POST['correo'];
			$contrasena = md5($_POST['contrasena']);
			$data['usuario'] = $usuario = $this->Principal_model->validar_usuario($correo, $contrasena);
			if(@$usuario[0] != NULL) {
				$_SESSION['info'] = $usuario[0];
				redirect('http://localhost/'.$usuario[0]->tipo);
			}
			else {
				$data['error'] = 'No existe el usuario o la contraseña es incorrecta.';
			}
		}
		$data['vista'] = 'login';
		$this->load->view('estructura/templete', $data);
	}

	function ver_empleado ($id){
		$data['id'] = $id;
		$this->load->model('Principal_model');
		$data['usuario']  = $this->Principal_model->get_usuario($id);
	}

	function maqueta($vista) {
		$data['vista'] = $vista;
		$this->load->view('estructura/templete', $data);
	}

	function logout() {
		unset($_SESSION);
		session_destroy();
		redirect('http://localhost');
	}
	

}
