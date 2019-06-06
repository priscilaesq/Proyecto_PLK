<?php
    $tipo = '';
    if(@$_SESSION['info']->tipo != NULL) {
        $tipo = '-' . $_SESSION['info']->tipo;
    }
    $this->load->view('estructura/cabecera' . $tipo);
    $this->load->view($vista);
    $this->load->view('estructura/footer');
?>