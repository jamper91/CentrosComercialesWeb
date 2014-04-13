<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//App::uses('AppController', 'Controller');

/**
 * CakePHP LocalesController
 * @author jamper91
 */
class AlmacenesController extends AppController {
    public $components = array('RequestHandler');
    public function index() {
        
    }
    
    public function getLocales()
    {
        $parametros=array(
            "conditions"=>array("Almacen.escalera"=>0)
        );
        $datos=  $this->Almacene->find('all');
            $this->set(array(
                'datos' => $datos,
                '_serialize' => array('datos')
            ));
       

    }

    public function getLocalesByBusqueda()
    {
        $idCentroComercial=$this->request->data['idCentroComercial'];
        $idCategoria=$this->request->data['idCategoria'];
        $sql="select l.nombre, l.id from almacenes l, centroscomerciales cc, "
                . "almacenes_categorias c_l, categorias c where cc.id=$idCentroComercial "
                . " and c.id=$idCategoria and l.centroscomerciale_id=$idCentroComercial and"
                . " c_l.almacene_id=l.id and c_l.categoria_id=$idCategoria";
            $datos=  $this->Almacene->query($sql);
            $this->set(array(
                'datos' => $datos,
                '_serialize' => array('datos')
            ));
    }
    public function getCentrosComercialesByLocal() 
    {
        $idLocal=$this->request->data['idLocal'];
        $sql="select  cc.nombre, cc.id from centroscomerciales cc, almacenes a, "
                . " (select nombre from almacenes where id=$idLocal) as b where "
                . "a.nombre=b.nombre and a.centroscomerciale_id=cc.id";
        $datos=  $this->Almacene->query($sql);
            $this->set(array(
                'datos' => $datos,
                '_serialize' => array('datos')
            ));
        
    }
    public function getInformacionLocal() 
    {
        $idLocal=$this->request->data['idLocal'];
        $datos=$this->Almacene->findById($idLocal);
        $this->set(array(
                'datos' => $datos,
                '_serialize' => array('datos')
            ));
    }
    public function getLocalesByCentroComercial() 
    {
        $idCentroComercial=$this->request->data['idCentroComercial'];
        $sql="select a.nombre, a.id from almacenes a, centroscomerciales cc "
                . "where a.centroscomerciale_id=$idCentroComercial and escalera=0";
        $datos=$this->Almacene->query($sql);
        $this->set(array(
                'datos' => $datos,
                '_serialize' => array('datos')
            ));
    }
    
    public function getEscaleraByPisoBloque()
    {
        $piso=$this->request->data['piso'];
        $bloque=$this->request->data['bloque'];
        $sql="select a.id from almacenes a, pisos p where p.numero=$piso and "
                . " a.bloque=$bloque and a.piso_id=p.id and a.escalera=1";
//        $opciones=array(
//            'fields'=>array('Almacene.id'),
//            'conditions' => array('Almacene.piso_id' => $piso, "Almacene.bloque"=> $bloque, "Almacene.escalera"=> 1)
//        );
//        $datos=$this->Almacene->find("all",$opciones);
        $datos=  $this->Almacene->query($sql);
        $this->set(array(
                'datos' => $datos,
                '_serialize' => array('datos')
            ));
                
    }
    public function getCoordenadasEscalera() 
    {
        $idEscalera=$this->request->data['idEscalera'];
        $opciones=array(
            'conditions'=> array('Almacene.id'=>$idEscalera, "Almacene.escalera"=>1),
            'fields' => array('Almacene.x', "Almacene.y")
        );
        $datos=$this->Almacene->find("all",$opciones);
        $this->set(array(
                'datos' => $datos,
                '_serialize' => array('datos')
            ));
        
    }

}

?>
