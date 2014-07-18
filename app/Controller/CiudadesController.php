<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//App::uses('AppController', 'Controller');

/**
 * CakePHP CiudadesController
 * @author jamper91
 */
class CiudadesController extends AppController {

    public $components = array('RequestHandler');

    public function index() {
        $this->layout = "webservice";
        $idPais = $this->request->data["idPais"];
        $options = array(
            'recursive' => -1,
            'order' => 'Ciudade.nombre',
            'conditions'=>array(
                'Ciudade.paise_id'=>$idPais
            )
        );
        $datos = $this->Ciudade->find('all', $options);
        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
    }

}

?>
