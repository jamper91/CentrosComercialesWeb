<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//App::uses('AppModel', 'Model');

/**
 * CakePHP CentrosComerciale
 * @author jamper91
 */
class 	Centroscomerciale extends AppModel {
    public $hasMany= array('CategoriasCentroscomerciale','Almacene','Piso','CentroscomercialesServicio','CentroscomercialesMediostransporte');
    public $belongsTo = 'Ciudade';
}
?>