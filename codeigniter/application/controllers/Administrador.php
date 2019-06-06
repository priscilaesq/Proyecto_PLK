<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {


	function ver_empleado ($id){
		if($_SESSION['info']->tipo != 'administrador') redirect('./');
		$data['id'] = $id;
		$this->load->model('Principal_model');
		$data['usuario']  = $this->Principal_model->get_usuario($id);
		$this->load->view('ver_empleado', $data);
	}

	public function index() {
		if($_SESSION['info']->tipo != 'administrador') redirect('./');
		$this->load->model('Principal_model');
		if($_POST != NULL) {
			$result = $this->Principal_model->registrar_vendedor($_POST);
			if($result) {
				$data['status'] = 'El vendedor ha sido registrado';
			}
			else {
				$data['status'] = 'Ocurrió un error. Revisa que el correo no haya sido utilizado antes.';
			}
		}
		$data['vendedores'] = $this->Principal_model->get_vendedores();
		$data['vista'] = 'gestionar-cuentas';
		$this->load->view('estructura/templete', $data);
	}

	function eliminar($id) {
		if($_SESSION['info']->tipo != 'administrador') redirect('./');
		$this->load->model('Principal_model');

		if($_POST != null) {
			$this->Principal_model->eliminar_vendedor($id, $_POST['seleccionar-vendedor']);
			redirect('./');
		}

		$data['vendedores'] = $this->Principal_model->get_vendedores();
		$data['vendedor'] = $this->Principal_model->get_usuario($id)[0];
		$data['vista'] = 'eliminar-vendedor';
		$this->load->view('estructura/templete', $data);
	}

	function perfil() {
		if($_SESSION['info']->tipo != 'administrador') redirect('./');
		$this->load->model('Principal_model');
		if($_POST != NULL) {
			$args = [
				'nombre' => $_POST['nombre'],
				'apellido' => $_POST['apellido']
			];
			if($_POST['contrasena'] != ''){
				if($_POST['contrasena'] == $_POST['contrasena2']) {
					$args['contrasena'] = md5($_POST['contrasena']);
				}
				else {
					$data['error_contrasena'] = "Las contraseñas no coinciden, y no fue actualizada.";
				}
			}
			$res = $this->Principal_model->update_perfil($args);

			if($res) {
				$data['status'] = 'Los cambios han sido guardados';
			}
			else {
				$data['status'] = 'Ha ocurrido un error, intentalo de nuevo.';
			}
		}
		$data['vista'] = 'perfil';
		$this->load->view('estructura/templete', $data);
	}

}
