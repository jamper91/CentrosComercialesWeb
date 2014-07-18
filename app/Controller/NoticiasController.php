<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP NoticiasController
 * @author Developer
 */
class NoticiasController extends AppController {

    public $components = array('RequestHandler');

    public function index() {
        $this->layout = "webservice";
        $options = null;
        $datos = $this->Noticia->find('all', $options);
        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
    }
    public function getnoticia() {
        $this->layout = "webservice";
        $idNoticia=$this->request->data["idNoticia"];
        $options = array(
            "conditions"=>array(
                "Noticia.id"=>$idNoticia
            )
        );
        $datos = $this->Noticia->find('all', $options);
        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
    }

}
