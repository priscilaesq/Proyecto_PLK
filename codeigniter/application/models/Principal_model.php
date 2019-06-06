<?php

  class Principal_model extends CI_Model {
    public function __constructor() {
      parent::__construct();
      $this->load->database();
    }

    function get_usuario($id) {
      $args = array(
        'id' => $id
      );
      return $this->db->get_where('usuario', $args)->result();
    }
    
    public function subir_imagen($index, $nombre, $camino) {
      $name = basename($_FILES[$index]["name"]);
      $tipo = strtolower(pathinfo($name,PATHINFO_EXTENSION));
      if (!is_dir($camino)) {
        mkdir($camino);
      }
      $camino = $camino . $nombre . "." . $tipo;
      if ( move_uploaded_file($_FILES[$index]["tmp_name"], $camino ) ) {
        $status['exito'] = true;
        $status['camino'] = $camino;
      }
      else {
        $status['exito'] = false;
      }
      return $status;
    }


    function validar_usuario($correo, $contrasena) {
      $args = [
				'correo' => $correo,
				'contrasena' => $contrasena
      ];
      $res = $this->db->get_where('usuario', $args)->result();
      return $res;
    }

    public function update_imagen($tabla,$id,$index) {
      $condiciones = [
        'id' => $id
      ];
      if($_FILES[$index]['tmp_name'] != '') {
        $url = "./imgs/$tabla/$id/";
        $image = subir_imagen($index, $index, $url);
        if($image) {
          $this->db->update($tabla, $index)->where($condiciones);
        }
        else {
          return false;
        }
      }
    }

    public function eliminar_imagenes($url) {
      if(is_dir($url)){
          $files = glob( $url . '*', GLOB_MARK );
          foreach( $files as $file ){
            eliminar_imagenes( $file );
          }
          rmdir( $url );
      } elseif(is_file($url)) {
          unlink( $url );
      }
    }

    function registrar_vendedor($args) {
      $correo = $args['correo'];
      $args_verificacion = [
        'correo' => $correo
      ];
      $verificacion = $this->db->get_where('usuario', $args_verificacion)->result();
      if(@$verificacion[0] != NULL) {
        return false;
      }
      else {
        $args['contrasena'] = md5($args['contrasena']);
        $args['tipo'] = 'vendedor';
        $res = $this->db->insert('usuario', $args);
        return $res;
      }
    }

    function registrar_cliente($args) {
      $correo = $args['correo'];
      $args_verificacion = [
        'correo' => $correo
      ];
      $verificacion = $this->db->get_where('usuario', $args_verificacion)->result();
      if(@$verificacion[0] != NULL) {
        return false;
      }
      else {
        $args['contrasena'] = md5($args['contrasena']);
        $args['tipo'] = 'cliente';
        $res = $this->db->insert('usuario', $args);
        $insert_id = $this->db->insert_id();
        return $insert_id;
      }
    }

    function registrar_solicitud($args) {
      $args_verificacion = [
        'id_vendedor' => $args['id_vendedor'],
        'id_cliente' => $args['id_cliente']
      ];
      $verificacion = $this->db->get_where('solicitud', $args_verificacion)->result();
      if(@$verificacion[0] != NULL) {
        return false;
      }
      else {
        $res = $this->db->insert('solicitud', $args);
        return $res;
      }
    }

    function update_solicitud($id, $args) {
      return $this->db->update('solicitud', $args, array('id' => $id));
    }

    function get_vendedores() {
      $args = [
        'tipo' => 'vendedor'
      ];
      return $this->db->get_where('usuario', $args)->result();
    }
    function get_clientes() {
      $args = [
        'tipo' => 'cliente'
      ];
      $clientes = $this->db->get_where('usuario', $args)->result();
      $clientes_ord = [];
      foreach($clientes as $cliente) {
        $clientes_ord[$cliente->id] = $cliente;
      }
      return $clientes_ord;
    }

    function update_perfil($args) {
      $id = $_SESSION['info']->id;
      $res = $this->db->update('usuario', $args, array('id' => $id));
      $info = $this->db->get_where('usuario', array('id' => $id))->result();
      $_SESSION['info'] = $info[0];
      return $res;
    }

    function update_usuario($id, $args) {
      $res = $this->db->update('usuario', $args, array('id' => $id));
      return $res;
    }

    function get_solicitud_cliente($id_cliente) {
      $args = [
        'id_cliente' => $id_cliente
      ];
      $solicitud = $this->db->get_where('solicitud', $args)->result();
      return $solicitud;
    }

    function get_solicitudes($archivado = '') {
      $args['id_vendedor'] = $_SESSION['info']->id;
      if($archivado != '') {
        $args['archivado'] = $archivado;
        $solicitud = $this->db->get_where('solicitud', $args)->result();
      }
      else {
        $solicitud = $this->db->get_where('solicitud', $args)->result();
      }
      return $solicitud;
    }

    function eliminar_vendedor($id_old, $id_new) {
      //INTERCABIO
      $args = [
        'id_vendedor' => $id_old,
      ];
      $data = [
        'id_vendedor' => $id_new,
      ];
      $this->db->update('solicitud', $data, $args);
      $this->db->delete('usuario', array('id' => $id_old)); 
    }

    function get_chat_solicitud($id_solicitud) {
      $args = [
        'id_solicitud' => $id_solicitud
      ];
      $this->db->order_by('fecha', 'DESC');
      $chat = $this->db->get_where('mensaje', $args)->result();
      return $chat;
    }

    function registrar_mensaje($args) {
      return $this->db->insert('mensaje', $args);
    }

    function archivar_solicitud($id_solicitud) {
      $data = [
        'archivado' => 'true'
      ];
      $args = [
        'id' => $id_solicitud
      ];
      $this->db->update('solicitud', $data, $args);
    }

    function recuperar_solicitud($id_solicitud) {
      $data = [
        'archivado' => 'false'
      ];
      $args = [
        'id' => $id_solicitud
      ];
      $this->db->update('solicitud', $data, $args);
    }
  }

