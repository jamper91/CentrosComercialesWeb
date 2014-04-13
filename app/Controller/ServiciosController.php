<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//App::uses('AppController', 'Controller');

/**
 * CakePHP ServiciosController
 * @author jamper91
 */
class ServiciosController extends AppController {
    public $components = array('RequestHandler');
    public function index($id) {
        
    }
    
    public function getServiciosByCentroComercial() 
    {
        $idCentroComercial=$this->request->data['idCentroComercial'];
        $sql="select s.nombre, s.id from servicios s, centroscomerciales cc, "
                . " centroscomerciales_servicios c_s where cc.id=$idCentroComercial and "
                . "c_s.centroscomerciale_id=cc.id and c_s.servicio_id=s.id";
        $datos=  $this->Servicio->query($sql);
        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
    }

}
?>