<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP BannersController
 * @author Jorge Moreno
 */
class BannersController extends AppController {

    public function index($id) {
        
    }
    
    public function getBanners() 
    {
        $this->layout="webservice";
        $vista=$this->request->data["vista"];
        $idCentroComercial=$this->request->data["idCentroComercial"];
        $idCategoria=$this->request->data["idCategoria"];
        $idAlmacen=$this->request->data["idAlmacen"];
        $conditions;
        if($vista!=null && $idCentroComercial!=null && $idCategoria!=null)
        {
            $conditions=array(
                "Banner.vista"=>$vista,
                "Banner.centroscomerciale"=>$idCentroComercial,
                "Banner.idCategoria"=>$idCategoria
            );
        }else if($vista!=null && $idAlmacen!=null)
        {
            $conditions=array(
                "Banner.vista"=>$vista,
                "Banner.almacene_id"=>$idAlmacen
            );
        }else if($vista!=null && $idCentroComercial!=null)
        {
            $conditions=array(
                "Banner.vista"=>$vista,
                "Banner.centroscomerciale_id"=>$idCentroComercial
            );
        }else if($vista!=null)
        {
            $conditions=array(
                "Banner.vista"=>$vista
            );
        }
        $options=Array(
            "fields"=>array("Bet.id","Bet.nombre"),
            "conditions"=>$conditions
        );
        $datos=  $this->Banner->find('all', $options);
        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
    }

}
