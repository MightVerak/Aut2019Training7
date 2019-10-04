<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FormationsPositionTitles Controller
 *
 * @property \App\Model\Table\FormationsPositionTitlesTable $FormationsPositionTitles
 *
 * @method \App\Model\Entity\FormationsPositionTitle[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FormationsPositionTitlesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Formations', 'PositionTitles', 'FormationStatuses']
        ];
        $formationsPositionTitles = $this->paginate($this->FormationsPositionTitles);

        $this->set(compact('formationsPositionTitles'));
    }

    /**
     * View method
     *
     * @param string|null $id Formations Position Title id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formationsPositionTitle = $this->FormationsPositionTitles->get($id, [
            'contain' => ['Formations', 'PositionTitles', 'FormationStatuses']
        ]);

        $this->set('formationsPositionTitle', $formationsPositionTitle);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formationsPositionTitle = $this->FormationsPositionTitles->newEntity();
        if ($this->request->is('post')) {
            $formationsPositionTitle = $this->FormationsPositionTitles->patchEntity($formationsPositionTitle, $this->request->getData());
            if ($this->FormationsPositionTitles->save($formationsPositionTitle)) {
                $this->Flash->success(__('The formations position title has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formations position title could not be saved. Please, try again.'));
        }
        $formations = $this->FormationsPositionTitles->Formations->find('list', ['limit' => 200]);
        $positionTitles = $this->FormationsPositionTitles->PositionTitles->find('list', ['limit' => 200]);
        $formationStatuses = $this->FormationsPositionTitles->FormationStatuses->find('list', ['limit' => 200]);
        $this->set(compact('formationsPositionTitle', 'formations', 'positionTitles', 'formationStatuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Formations Position Title id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formationsPositionTitle = $this->FormationsPositionTitles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formationsPositionTitle = $this->FormationsPositionTitles->patchEntity($formationsPositionTitle, $this->request->getData());
            if ($this->FormationsPositionTitles->save($formationsPositionTitle)) {
                $this->Flash->success(__('The formations position title has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formations position title could not be saved. Please, try again.'));
        }
        $formations = $this->FormationsPositionTitles->Formations->find('list', ['limit' => 200]);
        $positionTitles = $this->FormationsPositionTitles->PositionTitles->find('list', ['limit' => 200]);
        $formationStatuses = $this->FormationsPositionTitles->FormationStatuses->find('list', ['limit' => 200]);
        $this->set(compact('formationsPositionTitle', 'formations', 'positionTitles', 'formationStatuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Formations Position Title id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formationsPositionTitle = $this->FormationsPositionTitles->get($id);
        if ($this->FormationsPositionTitles->delete($formationsPositionTitle)) {
            $this->Flash->success(__('The formations position title has been deleted.'));
        } else {
            $this->Flash->error(__('The formations position title could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
