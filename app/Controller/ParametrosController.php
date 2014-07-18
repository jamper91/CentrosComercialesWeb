<?php

App::uses('AppController', 'Controller');

/**
 * Parametros Controller
 *
 * @property Parametro $Parametro
 * @property PaginatorComponent $Paginator
 */
class ParametrosController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator','RequestHandler');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Parametro->recursive = 0;
        $this->set('parametros', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Parametro->exists($id)) {
            throw new NotFoundException(__('Invalid parametro'));
        }
        $options = array('conditions' => array('Parametro.' . $this->Parametro->primaryKey => $id));
        $this->set('parametro', $this->Parametro->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Parametro->create();
            if ($this->Parametro->save($this->request->data)) {
                $this->Session->setFlash(__('The parametro has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The parametro could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Parametro->exists($id)) {
            throw new NotFoundException(__('Invalid parametro'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Parametro->save($this->request->data)) {
                $this->Session->setFlash(__('The parametro has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The parametro could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Parametro.' . $this->Parametro->primaryKey => $id));
            $this->request->data = $this->Parametro->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Parametro->id = $id;
        if (!$this->Parametro->exists()) {
            throw new NotFoundException(__('Invalid parametro'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Parametro->delete()) {
            $this->Session->setFlash(__('The parametro has been deleted.'));
        } else {
            $this->Session->setFlash(__('The parametro could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * Url: parametros/getparametros.xml
     * Parametros:
     *  nombre
     */
    public function getparametros() {
        $this->layout = "webservice";
        if ($this->request->is("POST")) {
            $nombre = $this->request->data("nombre");
            $datos = $this->Parametro->findByNombre($nombre);
            $this->set(array(
                'datos' => $datos,
                '_serialize' => array('datos')
            ));
        }
    }

}
