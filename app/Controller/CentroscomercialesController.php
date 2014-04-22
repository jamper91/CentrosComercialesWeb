<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//App::uses('AppController', 'Controller');

/**
 * CakePHP Centroscomerciales
 * @author jamper91
 */
class  CentroscomercialesController extends AppController {
    public $components = array('RequestHandler');

    public function index() {
        $this->layout="webservice";
        $datos = $this->Centroscomerciale->find("all");
        //debug($datos);
        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
    }
    
    public function getcentroscomercialesbyciudad() {
        $this->layout="webservice";
        $idCiudad=$this->request->data['idCiudad'];
        $datos = $this->Centroscomerciale->findByciudade_id($idCiudad);
        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
    }
    
    public function getCetegoriasByCentroComercial() 
    {
        $this->layout="webservice";
        $idCentroComercial=$this->request->data['idCentroComercial'];
        $sql="select c.nombre, c.id from categorias c, categorias_centroscomerciales c_c, centroscomerciales cc where cc.id=$idCentroComercial and c_c.centroscomerciale_id=cc.id and c_c.categoria_id=c.id";
        $datos=  $this->Centroscomerciale->query($sql);
        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
    }
    public function getInformacionCentroComercial() 
    {
        $this->layout="webservice";
        $idCentroComercial=$this->request->data['idCentroComercial'];
        $datos = $this->Centroscomerciale->findById($idCentroComercial);
        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
        
    }
    public function getMediosTransporteByCentroComercial()
    {
        $this->layout="webservice";
        $idCentroComercial=$this->request->data['idCentroComercial'];
        $sql="select m.nombre, m.id from mediostransportes m, centroscomerciales cc, "
                . "centroscomerciales_mediostransportes c_m where cc.id=$idCentroComercial "
                . "and c_m.centroscomerciale_id=cc.id and c_m.mediostransporte_id = m.id";
        $datos=  $this->Centroscomerciale->query($sql);
        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
    }


}

?>
