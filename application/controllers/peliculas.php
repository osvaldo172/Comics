<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Peliculas extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->model(array('Buscador_m', 'Comics_m'));
    } 
    //con esta función validamos y protegemos el buscador
    public function validar() {
        $this->form_validation->set_rules('buscando', 'buscador', 'required|min_length[2]|max_length[20]|trim|xss_clean');
        $this->form_validation->set_message('required', 'El %s no puede ir vacío!');
        $this->form_validation->set_message('min_length', 'El  %s debe tener al menos %s carácteres');
        $this->form_validation->set_message('max_length', 'El %s no puede tener más de %s carácteres');
        if ($this->form_validation->run() == TRUE) {
 
            $buscador = $this->input->post('buscando');
            $this->session->set_userdata('buscando', $buscador);
            //todo correcto y pasamos a la función index
            redirect('../peliculas', 'refresh');
        } else {
            //mostramos de nuevo el buscador con los errores
            $this->load->view('buscar_prueba');
        }
    }
 
    public function index() {

        //cargamos la vista y el array data
        $this->load->view('buscar_prueba');
    }
}
/*application/controllers/peliculas.php
 * el controlador
 */