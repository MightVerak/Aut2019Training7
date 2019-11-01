<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Formations Controller
 *
 * @property \App\Model\Table\FormationsTable $Formations
 *
 * @method \App\Model\Entity\Formation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FormationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories', 'Frequences', 'StartReminders', 'Modalities']
        ];
        $formations = $this->paginate($this->Formations);

        $this->set(compact('formations'));
    }

    /**
     * View method
     *
     * @param string|null $id Formation id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formation = $this->Formations->get($id, [
            'contain' => ['Categories', 'Frequences', 'StartReminders', 'Modalities', 'PositionTitles', 'Employees']
        ]);

        $this->set('formation', $formation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formation = $this->Formations->newEntity();
        if ($this->request->is('post')) {
            $formation = $this->Formations->patchEntity($formation, $this->request->getData());
            if ($this->Formations->save($formation)) {
                $this->Flash->success(__('The formation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formation could not be saved. Please, try again.'));
        }
        $categories = $this->Formations->Categories->find('list', ['limit' => 200]);
        $frequences = $this->Formations->Frequences->find('list', ['limit' => 200]);
        $startReminders = $this->Formations->StartReminders->find('list', ['limit' => 200]);
        $modalities = $this->Formations->Modalities->find('list', ['limit' => 200]);
        $positionTitles = $this->Formations->PositionTitles->find('list', ['limit' => 200]);
        $this->set(compact('formation', 'categories', 'frequences', 'startReminders', 'modalities', 'positionTitles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Formation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formation = $this->Formations->get($id, [
            'contain' => ['PositionTitles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formation = $this->Formations->patchEntity($formation, $this->request->getData());
            if ($this->Formations->save($formation)) {
                $this->Flash->success(__('The formation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formation could not be saved. Please, try again.'));
        }
        $categories = $this->Formations->Categories->find('list', ['limit' => 200]);
        $frequences = $this->Formations->Frequences->find('list', ['limit' => 200]);
        $startReminders = $this->Formations->StartReminders->find('list', ['limit' => 200]);
        $modalities = $this->Formations->Modalities->find('list', ['limit' => 200]);
        $positionTitles = $this->Formations->PositionTitles->find('list', ['limit' => 200]);
        $this->set(compact('formation', 'categories', 'frequences', 'startReminders', 'modalities', 'positionTitles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Formation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formation = $this->Formations->get($id);
        if ($this->Formations->delete($formation)) {
            $this->Flash->success(__('The formation has been deleted.'));
        } else {
            $this->Flash->error(__('The formation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
