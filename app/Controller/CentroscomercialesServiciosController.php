<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//App::uses('AppController', 'Controller');

/**
 * CakePHP CentroscomercialesServiciosController
 * @author jamper91
 */
class CentroscomercialesServiciosController extends AppController {
    public $components = array('RequestHandler');
    public function index($id) {
        
    }
    
    public function getservicios()
    {
        $this->layout="webservice";
        $idCentroComercial=$this->request->data["idCentroComercial"];
        $idServicio=$this->request->data["idServicio"];
        $piso=$this->request->data["piso"];
        $options=array(
            "conditions"=>array(
                "CentroscomercialesServicio.centroscomerciale_id"=>$idCentroComercial,
                "CentroscomercialesServicio.servicio_id"=>$idServicio,
                "CentroscomercialesServicio.piso_id"=>$piso
                
            )
        );
        $datos=  $this->CentroscomercialesServicio->find("all",$options);
        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
    }

}
?>
