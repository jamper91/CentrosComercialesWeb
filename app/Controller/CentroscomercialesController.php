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
class CentroscomercialesController extends AppController {

    public $components = array('RequestHandler');

    public function index() {
        $this->layout = "webservice";
        $options = array(
            "order" => array(
                "Centroscomerciale.nombre"
            )
        );

        $datos = $this->Centroscomerciale->find("all", $options);
        //debug($datos);
        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
    }

    public function getcentroscomercialesbyciudad() {
        $this->layout = "webservice";
        $idCiudad = $this->request->data['idCiudad'];
        $options = array(
            'recursive' => -1,
            'conditions' => array(
                'Centroscomerciale.ciudade_id' => $idCiudad
            ),
            "order" => array(
                "Centroscomerciale.nombre"
            )
        );
        $datos = $this->Centroscomerciale->find("all", $options);
        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
    }

    public function getCetegoriasByCentroComercial() {
        $this->layout = "webservice";
        $idCentroComercial = $this->request->data['idCentroComercial'];
        if ($idCentroComercial > 0)
            $sql = "select c.nombre, c.id, c.class from categorias c, categorias_centroscomerciales c_c, centroscomerciales cc where cc.id=$idCentroComercial and c_c.centroscomerciale_id=cc.id and c_c.categoria_id=c.id order by c.nombre";
        else
            $sql = "select c.nombre, c.id, c.class from categorias c order by c.nombre";
        $datos = $this->Centroscomerciale->query($sql);
        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
    }

    public function getInformacionCentroComercial() {
        $this->layout = "webservice";
        $idCentroComercial = $this->request->data['idCentroComercial'];
        $options = array(
            'conditions' => array(
                'CentrosComerciale.id' => $idCentroComercial
            ),
            'recursive' => 0
        );
        $datos = $this->Centroscomerciale->find("all", $options);
        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
    }

    public function getMediosTransporteByCentroComercial() {
        $this->layout = "webservice";
        $idCentroComercial = $this->request->data['idCentroComercial'];
        $sql = "select m.nombre, m.id from mediostransportes m, centroscomerciales cc, "
                . "centroscomerciales_mediostransportes c_m where cc.id=$idCentroComercial "
                . "and c_m.centroscomerciale_id=cc.id and c_m.mediostransporte_id = m.id";
        $datos = $this->Centroscomerciale->query($sql);
        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
    }

}

?>
