<?php
/**
 * Felipe María Lluch Serra
 * Curso de Adaptación a Grado en Ingeniería Informática
 * Universidad Internacional de La Rioja
 */

namespace App\Controller;
use App\Controller\AppController;

class PolicesController extends AppController
{
    public function index()
    {
    $polices = $this->Polices->find()
        ->contain('Categories');

    $categories = $this->Polices->Categories->find('list');

    $this->set('categories', $categories);
    $this->set(compact('polices'));
    }

    public function view($slug=null)
    {
        $police = $this->Polices
            ->findBySlug($slug)
            ->contain('Categories')
            ->firstOrFail();
        $categories = $this->Polices->Categories->find('list');

        if ($this->request->is(['put','post'])) {
            $police = $this->Polices->patchEntity($police, $this->request->getData());
            //Habrá que eliminarlo cuando genere más usuarios
            //$police->user_id=1;

            if ($this->Polices->save($police)) {
                $this->Flash->success('Horas del policía con carnet ' . $police->carnet . ' modificadas');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se ha podido modificar');
        }

        $this->set('categories', $categories);
        $this->set('police',$police);


    }

    public function add(){

        $police = $this->Polices->newEntity();
        if ($this->request->is('post')){
            $police = $this->Polices->patchEntity($police,$this->request->getData());
            //Habrá que eliminarlo cuando genere más usuarios
            //$police->user_id=1;
            $police->nombre=strtoupper($police->nombre);
            $police->apellido1=strtoupper($police->apellido1);
            $police->apellido2=strtoupper($police->apellido2);

            if($this->Polices->save($police)){
                $this->Flash->success('El policía con carnet ' . $police->carnet . ' ha sido dado de alta');
                return $this->redirect(['action' => 'index']);
            }

        }
        $categories = $this->Polices->Categories->find('list');

        $this->set('categories', $categories);
        $this->set('police',$police);
    }

    public function edit($slug){

        $police = $this->Polices
            ->findBySlug($slug)
            ->contain('Categories')
            ->firstOrFail();

        if ($this->request->is(['put','post'])){
            $police = $this->Polices->patchEntity($police,$this->request->getData());
            //Habrá que eliminarlo cuando genere más usuarios
            //$police->user_id=1;
            $police->nombre=strtoupper($police->nombre);
            $police->apellido1=strtoupper($police->apellido1);
            $police->apellido2=strtoupper($police->apellido2);

            if($this->Polices->save($police)){
                $this->Flash->success('Datos del policía con carnet ' . $police->carnet . ' modificados');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se ha podido guardar');
        }

        $categories = $this->Polices->Categories->find('list');

        $this->set('categories', $categories);
        $this->set('police',$police);
    }

    public function delete($slug)
    {
        $this->request->allowMethod(['post', 'delete']);
        $police = $this->Polices->findBySlug($slug)->firstOrFail();
        if ($this->Polices->delete($police)) {
            $this->Flash->success('El policía ha sido eliminado');
            return $this->redirect(['action' => 'index']);
        }
    }
}