<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//App::uses('AppModel', 'Model');

/**
 * CakePHP Categoria
 * @author jamper91
 */
class Categoria extends AppModel {
        public $hasMany = array(
        'CategoriasCentroscomerciale', 'AlmacenesCategoria'
    );
}
?>
