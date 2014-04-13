<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//App::uses('AppController', 'Controller');

/**
 * CakePHP PisosController
 * @author jamper91
 */
class PisosController extends AppController {
    public $components = array('RequestHandler');
    public function index($id) {
        
    }
    public function getPisosByCentroComercial() 
    {
        $idCentroComercial=$this->request->data['idCentroComercial'];
        $parametros=array(
            "conditions"=>array("Piso.centroscomerciale_id"=>$idCentroComercial)
        );
        $datos=  $this->Piso->find("all",$parametros);
        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
    }
    public function getMapaByPiso($idPiso) 
    {
        $idPiso=$this->request->data['idPiso'];
        $parametros=Array(
            "fields"=>array("Piso.mapa"),
            "conditions"=>array("Piso.id"=>$idPiso)
        );
        $datos=  $this->Piso->find("all",$parametros);
        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
    }

}
?>
