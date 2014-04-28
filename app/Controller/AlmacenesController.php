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
        $this->layout="webservice";
        $parametros=array(
            "conditions"=>array("Almacene.escalera"=>0),
            "recursive"=>-1
        );
        $datos=  $this->Almacene->find('all',$parametros);
            $this->set(array(
                'datos' => $datos,
                '_serialize' => array('datos')
            ));
       

    }

    public function getLocalesByBusqueda()
    {
        $this->layout="webservice";
        $idCentroComercial=$this->request->data['idCentroComercial'];
        $idCategoria=$this->request->data['idCategoria'];
        $conCC="";
        $conCA="";
        
        
        if($idCentroComercial==0 && $idCategoria==0)
            $sql="select l.nombre, l.id from almacenes l";
        else if($idCentroComercial==0 && $idCategoria>0)
        {
            $sql="select l.nombre, l.id from almacenes l "
                . "almacenes_categorias c_l where "
                . " c_l.almacene_id=l.id and c_l.categoria_id=$idCategoria";
        }else if($idCentroComercial>0 && $idCategoria==0)
        {
            $sql="select l.nombre, l.id from almacenes l "
                . " where "
                . " l.centroscomerciale_id=$idCentroComercial";
        }
        
//        $sql="select l.nombre, l.id from almacenes l, centroscomerciales cc, "
//                . "almacenes_categorias c_l, categorias c where cc.id=$idCentroComercial "
//                . " and c.id=$idCategoria and l.centroscomerciale_id=$idCentroComercial and"
//                . " c_l.almacene_id=l.id and c_l.categoria_id=$idCategoria";
            $datos=  $this->Almacene->query($sql);
            $this->set(array(
                'datos' => $datos,
                '_serialize' => array('datos')
            ));
    }
    public function getcentroscomercialesbyLocal() 
    {
        $this->layout="webservice";
        $idLocal=$this->request->data['idLocal'];
        $sql="select  cc.nombre, a.id from centroscomerciales cc, almacenes a, "
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
        $this->layout="webservice";
        $idLocal=$this->request->data['idLocal'];
        $datos=$this->Almacene->findById($idLocal);
        $this->set(array(
                'datos' => $datos,
                '_serialize' => array('datos')
            ));
    }
    public function getLocalesByCentroComercial() 
    {
        $this->layout="webservice";
        $idCentroComercial=$this->request->data['idCentroComercial'];
        $parametros=array(
            "fields"=>array(
              "Almacene.nombre",
              "Almacene.id"
            ),
            "conditions"=>array(
                "Almacene.escalera"=>0,
                "Almacene.centroscomerciale_id"=>$idCentroComercial
            ),
            "recursive"=>-1
        );
        $datos=  $this->Almacene->find('all',$parametros);
            $this->set(array(
                'datos' => $datos,
                '_serialize' => array('datos')
            ));
        $this->set(array(
                'datos' => $datos,
                '_serialize' => array('datos')
            ));
    }
    
    public function getEscaleraByPisoBloque()
    {
        $this->layout="webservice";
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
        $this->layout="webservice";
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
