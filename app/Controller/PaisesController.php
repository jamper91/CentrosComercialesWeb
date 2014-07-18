<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP PaisesController
 * @author Developer
 */
class PaisesController extends AppController {
    public $components = array('RequestHandler');
    public function index() {
        $this->layout="webservice";
        $options=array();
        $datos=$this->Paise->find('all',$options);
        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
        
    }

}
