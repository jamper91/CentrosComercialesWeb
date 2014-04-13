<?php

/*

 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 

App::uses('AppController', 'Controller');

*/
/**
 * CakePHP CategoriasController
 * @author jamper91
 */
class CategoriasController extends AppController {

    public $components = array('RequestHandler');
    public function index() 
    {
        $categorias = $this->Categoria->find('all');
        $this->set(array(
            'categorias' => $categorias,
            '_serialize' => array('categorias')
        ));
    }
    public function getCategoriasByCentroComercial($idCentroComercial) {
        $datos = $this->Categoria->find('all');
        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
    }

}

?>