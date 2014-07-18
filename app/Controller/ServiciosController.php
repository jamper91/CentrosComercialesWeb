<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * CakePHP ServiciosController
 * @author jamper91
 */
class ServiciosController extends AppController {

    public $components = array('RequestHandler');

    public function index($id) {
        
    }

    public function getServiciosByCentroComercial() {
        $this->layout = "webservice";
        $idCentroComercial = $this->request->data['idCentroComercial'];
        $sql = "select s.nombre, s.id from servicios s, centroscomerciales cc, "
                . " centroscomerciales_servicios c_s where cc.id=$idCentroComercial and "
                . "c_s.centroscomerciale_id=cc.id and c_s.servicio_id=s.id";
        $datos = $this->Servicio->query($sql);
        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
    }

    /**
     * Esta funcion se encarga de enviar un correo con las sugerencias del usuario.
     * url: servicios/enviarinformacion.xml
     * nombres: Nombres de la persona que envia la informacion.
     * email: correo de la persona que envia informacion.
     * mensaje: Mensaje con la informacion
     */
    public function enviarinformacion() {
        $this->layout = "webservice";
        try {
            //Estoy recibiendo el formulario, compongo el cuerpo
            $cuerpo = "Sugerencias Centros Comerciales\n";
            $cuerpo .= "Nombre: " . $this->request->data["nombres"] . "\n";
            $cuerpo .= "Email: " . $this->request->data["email"] . "\n";
            $cuerpo .= "Memsaje: " . $this->request->data["mensaje"] . "\n";

            //mando el correo... 
//            mail("jamper91@hotmail.com", "Sugerencias CC " . $this->request->data["nombres"], $cuerpo);

            $Email = new CakeEmail();
            $Email->from(array($this->request->data["email"] => $this->request->data["nombres"]));
            $Email->to('jamper91@hotmail.com');
            $Email->subject("Sugerencias CC " . $this->request->data["nombres"]);
            $Email->send($cuerpo);
            $datos = array(
                "codigo" => 0,
                "mensaje" => "Mensaje enviado"
            );
        } catch (Exception $exc) {
            $datos = array(
                "codigo" => -1,
                "mensaje" => $exc->getMessage()
            );
        }


        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
    }

}

?>