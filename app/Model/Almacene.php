<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//App::uses('AppModel', 'Model');

/**
 * CakePHP Locale
 * @author jamper91
 */
class Almacene extends AppModel {
    public $belongsTo =array('Centroscomerciale',"Piso");
    public $hasMany=array('AlmacenesCategoria','AlmacenesCategoria');
}
?>