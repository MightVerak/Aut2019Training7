<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FormationsPositionTitleOfFormations Controller
 *
 * @property \App\Model\Table\FormationsPositionTitleOfFormationsTable $FormationsPositionTitleOfFormations
 *
 * @method \App\Model\Entity\FormationsPositionTitleOfFormation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FormationsPositionTitleOfFormationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Formations', 'PositionTitleOfFormations']
        ];
        $formationsPositionTitleOfFormations = $this->paginate($this->FormationsPositionTitleOfFormations);

        $this->set(compact('formationsPositionTitleOfFormations'));
    }

    /**
     * View method
     *
     * @param string|null $id Formations Position Title Of Formation id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formationsPositionTitleOfFormation = $this->FormationsPositionTitleOfFormations->get($id, [
            'contain' => ['Formations', 'PositionTitleOfFormations']
        ]);

        $this->set('formationsPositionTitleOfFormation', $formationsPositionTitleOfFormation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formationsPositionTitleOfFormation = $this->FormationsPositionTitleOfFormations->newEntity();
        if ($this->request->is('post')) {
            $formationsPositionTitleOfFormation = $this->FormationsPositionTitleOfFormations->patchEntity($formationsPositionTitleOfFormation, $this->request->getData());
            if ($this->FormationsPositionTitleOfFormations->save($formationsPositionTitleOfFormation)) {
                $this->Flash->success(__('The formations position title of formation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formations position title of formation could not be saved. Please, try again.'));
        }
        $formations = $this->FormationsPositionTitleOfFormations->Formations->find('list', ['limit' => 200]);
        $positionTitleOfFormations = $this->FormationsPositionTitleOfFormations->PositionTitleOfFormations->find('list', ['limit' => 200]);
        $this->set(compact('formationsPositionTitleOfFormation', 'formations', 'positionTitleOfFormations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Formations Position Title Of Formation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formationsPositionTitleOfFormation = $this->FormationsPositionTitleOfFormations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formationsPositionTitleOfFormation = $this->FormationsPositionTitleOfFormations->patchEntity($formationsPositionTitleOfFormation, $this->request->getData());
            if ($this->FormationsPositionTitleOfFormations->save($formationsPositionTitleOfFormation)) {
                $this->Flash->success(__('The formations position title of formation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formations position title of formation could not be saved. Please, try again.'));
        }
        $formations = $this->FormationsPositionTitleOfFormations->Formations->find('list', ['limit' => 200]);
        $positionTitleOfFormations = $this->FormationsPositionTitleOfFormations->PositionTitleOfFormations->find('list', ['limit' => 200]);
        $this->set(compact('formationsPositionTitleOfFormation', 'formations', 'positionTitleOfFormations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Formations Position Title Of Formation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formationsPositionTitleOfFormation = $this->FormationsPositionTitleOfFormations->get($id);
        if ($this->FormationsPositionTitleOfFormations->delete($formationsPositionTitleOfFormation)) {
            $this->Flash->success(__('The formations position title of formation has been deleted.'));
        } else {
            $this->Flash->error(__('The formations position title of formation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
