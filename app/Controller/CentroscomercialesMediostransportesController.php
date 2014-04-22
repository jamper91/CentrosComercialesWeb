<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//App::uses('AppController', 'Controller');

/**
 * CakePHP CentroscomercialesMediostransportesController
 * @author jamper91
 */
class CentroscomercialesMediostransportesController extends AppController {
    public $components = array('RequestHandler');
    public function index($id) {
        
    }
    
    public function getInformacionMedioTransporte() 
    {
        $this->layout="webservice";
        $idCentroComercial=$this->request->data['idCentroComercial'];
        $idMedioTransporte=$this->request->data['idMedioTransporte'];
        
        $sql="select m.nombre, c_m.descripcion, c_m.mediostransporte_id, cc.lat, cc.lon from centroscomerciales cc,"
                . " mediostransportes m, centroscomerciales_mediostransportes c_m"
                . " where cc.id=$idCentroComercial and m.id=$idMedioTransporte and"
                . " c_m.mediostransporte_id=m.id and c_m.centroscomerciale_id=$idCentroComercial";
        
//        $sql="select m.nombre, m.id from mediostransportes m, centroscomerciales cc, "
//                . "centroscomerciales_mediostransportes c_m where cc.id=$idCentroComercial "
//                . "and c_m.centroscomerciale_id=cc.id and c_m.mediostransporte_id = m.id";
        $datos=  $this->CentroscomercialesMediostransporte->query($sql);
        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
    
        
    }

}
?>
