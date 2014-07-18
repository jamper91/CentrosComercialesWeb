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
    public $components = array('RequestHandler');
    public function index($id) {
        
    }
    
    public function getbannerbyid()
    {
        $this->layout="webservice";
        $id=$this->request->data["idPromocion"];
        $options=Array(
            "fields"=>array(
                "Banner.id",
                "Banner.imagen",
                "Banner.informacion",
                "Banner.link"
                ),
            "conditions"=>array(
                "Banner.id"=>$id
            ),
        );
        $datos=  $this->Banner->find('all', $options);
        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
    }
    public function getbanners() 
    {
        $this->layout="webservice";
        if(!isset($this->request->data["vista"]) || $this->request->data["vista"]=="null")
            $vista=null;
        else
            $vista=$this->request->data["vista"];
        
        if(!isset($this->request->data["idCentroComercial"]) || $this->request->data["idCentroComercial"]=="null")
            $idCentroComercial=null;
        else
            $idCentroComercial=$this->request->data["idCentroComercial"];
        
        if(!isset($this->request->data["idCategoria"]) || $this->request->data["idCategoria"]=="null")
            $idCategoria=null;
        else
            $idCategoria=$this->request->data["idCategoria"];
        
        if(!isset($this->request->data["idAlmacen"]) || $this->request->data["idAlmacen"]=="null")
            $idAlmacen=null;
        else
            $idAlmacen=$this->request->data["idAlmacen"];
        
//        debug($idAlmacen);
        $conditions;
        if($vista!=null && $idCentroComercial!=null && $idCategoria!=null)
        {
            $conditions=array(
                "Banner.vista"=>$vista,
                "Banner.centroscomerciale_id"=>$idCentroComercial,
                "Banner.categoria_id"=>$idCategoria
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
        }else if($idAlmacen!=null)
        {
            $conditions=array(
                "Banner.almacene_id"=>$idAlmacen
            );
        }else{
            $conditions=null;
        }
        $options=Array(
            "fields"=>array("Banner.id","Banner.imagen"),
            "conditions"=>$conditions,
        );
        $datos=  $this->Banner->find('all', $options);
        $this->set(array(
            'datos' => $datos,
            '_serialize' => array('datos')
        ));
    }

}
