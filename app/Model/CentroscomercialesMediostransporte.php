<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//App::uses('AppModel', 'Model');

/**
 * CakePHP CentroscomercialesMediostransportes
 * @author jamper91
 */
class CentroscomercialesMediostransporte extends AppModel {
    public $belongsTo = array(
        'Mediostransporte', 'Centroscomerciale'
    );
}
?>