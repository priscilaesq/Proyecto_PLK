<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendedor extends CI_Controller {

	public function index() {
		if(@$_SESSION['info']->tipo != 'vendedor') redirect('./');
		$this->load->model('Principal_model');
		$data['clientes'] = $this->Principal_model->get_clientes();
		$data['solicitudes'] = $this->Principal_model->get_solicitudes('false');

		$data['vista'] = 'mis-clientes';
		$this->load->view('estructura/templete', $data);
	}

	function registrar_cliente() {
		if(@$_SESSION['info']->tipo != 'vendedor') redirect('./');

		$this->load->model('Principal_model');
		if($_POST != NULL) {
			$args_cliente = [
				'nombre' => $_POST['nombre'],
				'apellido' => $_POST['apellido'],
				'contrasena' => $_POST['contrasena'],
				'correo' => $_POST['correo'],
			];
			$id_cliente = $this->Principal_model->registrar_cliente($args_cliente);
			$args_solicitud = [
				'id_cliente' => $id_cliente,
				'id_vendedor' => $_SESSION['info']->id,
				'rfc' => $_POST['rfc'],
				'marca' => $_POST['marca'],
				'modelo' => $_POST['modelo'],
				'ano' => $_POST['ano'],
				'costo' => $_POST['costo'],
				'probabilidad' => $_POST['probabilidad'],
				'estado' => $_POST['estado'],
				'aviso' => $_POST['aviso'],
			];
			$res_solicitud  = $this->Principal_model->registrar_solicitud($args_solicitud);
			redirect('http://localhost/vendedor/');
		}
		$data['vista'] = 'registro-cliente';
		$this->load->view('estructura/templete', $data);
	}

	function editar($id) {
		if(@$_SESSION['info']->tipo != 'vendedor') redirect('./');

		$this->load->model('Principal_model');
		if($_POST != NULL) {
			$args_cliente = [
				'nombre' => $_POST['nombre'],
				'apellido' => $_POST['apellido'],
				'correo' => $_POST['correo'],
			];
			if($_POST['contrasena'] != '') {
				$args_cliente['contrasena'] = md5($_POSt['contrasena']);
			}
			$this->Principal_model->update_usuario($id, $args_cliente);
			$args_solicitud = [
				'id_cliente' => $id,
				'id_vendedor' => $_SESSION['info']->id,
				'rfc' => $_POST['rfc'],
				'edad' => $_POST['edad'],
				'marca' => $_POST['marca'],
				'modelo' => $_POST['modelo'],
				'ano' => $_POST['ano'],
				'costo' => $_POST['costo'],
				'probabilidad' => $_POST['probabilidad'],
				'estado' => $_POST['estado'],
				'aviso' => $_POST['aviso'],
			];
			$solicitud = $this->Principal_model->get_solicitud_cliente($id);
			$this->Principal_model->update_solicitud($solicitud[0]->id, $args_solicitud);
			redirect('http://localhost/vendedor/editar/' . $id);
		}
		$data['cliente'] = $this->Principal_model->get_usuario($id);
		$data['solicitud'] = $this->Principal_model->get_solicitud_cliente($id);
		$data['vista'] = 'editar-cliente';
		$this->load->view('estructura/templete', $data);
	}

	function chat($id) {
		if(@$_SESSION['info']->tipo != 'vendedor') redirect('./');

		$this->load->model('Principal_model');
		$data['solicitud'] = $solicitud = $this->Principal_model->get_solicitud_cliente($id);
		$data['cliente'] = $cliente = $this->Principal_model->get_usuario($id);

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

		$data['vista'] = 'chat-cliente';
		$this->load->view('estructura/templete', $data);
	}

	function archivar($id_solicitud) {
		if(@$_SESSION['info']->tipo != 'vendedor') redirect('./');

		$this->load->model('Principal_model');
		$this->Principal_model->archivar_solicitud($id_solicitud);
		redirect('http://localhost/vendedor/');
	}

	function recuperar($id_solicitud) {
		if(@$_SESSION['info']->tipo != 'vendedor') redirect('./');

		$this->load->model('Principal_model');
		$this->Principal_model->recuperar_solicitud($id_solicitud);
		redirect('http://localhost/vendedor/');
	}

	function archivados() {
		if(@$_SESSION['info']->tipo != 'vendedor') redirect('./');

		$this->load->model('Principal_model');
		$data['solicitudes'] = $this->Principal_model->get_solicitudes('true');
		$data['clientes'] = $this->Principal_model->get_clientes('true');
		$data['vista'] = 'casos-archivados';
		$this->load->view('estructura/templete', $data);
	}

	function perfil() {
		if($_SESSION['info']->tipo != 'vendedor') redirect('./');
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
