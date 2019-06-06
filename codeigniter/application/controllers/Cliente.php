<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

	public function index() {
		if($_SESSION['info']->tipo != 'cliente') redirect('./');

		$id = $_SESSION['info']->id;
		$this->load->model('Principal_model');
		$data['solicitud'] = $solicitud = $this->Principal_model->get_solicitud_cliente($id);

		if($_POST != null) {
			$args = [
				'datos_emisor' => json_encode($_SESSION['info']),
				'id_receptor' => $id,
				'mensaje' => $_POST['mensaje'],
				'id_solicitud' => $solicitud[0]->id,
			];
			$this->Principal_model->registrar_mensaje($args);
		}

		$data['chat'] = $chat = $this->Principal_model->get_chat_solicitud($solicitud[0]->id);

		$data['vista'] = 'inicio-cliente';
		$this->load->view('estructura/templete', $data);
	}

	function perfil() {
		if($_SESSION['info']->tipo != 'cliente') redirect('./');
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
