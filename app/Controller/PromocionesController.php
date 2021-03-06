<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//App::uses('AppController', 'Controller');

/**
 * CakePHP PromocionesController
 * @author jamper91
 */
class PromocionesController extends AppController {

    public $components = array('RequestHandler');

    public function index($id) {
        
    }

    public function getPromocion() {
        $this->layout = "webservice";
        $idPromocion = $this->request->data['idPromocion'];
        $parametros = array(
            "conditions" => array("Promocione.id" => $idPromocion)
        );
        $datos = $this->Promocione->find("all", $parametros);
        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
    }

    public function getPromociones() {
        $this->layout = "webservice";
        $idCentroComercial = $this->request->data['idCentroComercial'];
        //debug("idCentroComercial: ".$idCentroComercial);
        if ($idCentroComercial && $idCentroComercial>0) {
            $parametros = array(
                "conditions" => array("Almacene.centroscomerciale_id" => $idCentroComercial)
            );
        }else
            $parametros=null;

        $datos = $this->Promocione->find("all", $parametros);
        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
    }

}

?>
