<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FormationStatuses Controller
 *
 * @property \App\Model\Table\FormationStatusesTable $FormationStatuses
 *
 * @method \App\Model\Entity\FormationStatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FormationStatusesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $formationStatuses = $this->paginate($this->FormationStatuses);

        $this->set(compact('formationStatuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Formation Status id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formationStatus = $this->FormationStatuses->get($id, [
            'contain' => ['FormationsPositionTitles']
        ]);

        $this->set('formationStatus', $formationStatus);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formationStatus = $this->FormationStatuses->newEntity();
        if ($this->request->is('post')) {
            $formationStatus = $this->FormationStatuses->patchEntity($formationStatus, $this->request->getData());
            if ($this->FormationStatuses->save($formationStatus)) {
                $this->Flash->success(__('The formation status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formation status could not be saved. Please, try again.'));
        }
        $this->set(compact('formationStatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Formation Status id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formationStatus = $this->FormationStatuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formationStatus = $this->FormationStatuses->patchEntity($formationStatus, $this->request->getData());
            if ($this->FormationStatuses->save($formationStatus)) {
                $this->Flash->success(__('The formation status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formation status could not be saved. Please, try again.'));
        }
        $this->set(compact('formationStatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Formation Status id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formationStatus = $this->FormationStatuses->get($id);
        if ($this->FormationStatuses->delete($formationStatus)) {
            $this->Flash->success(__('The formation status has been deleted.'));
        } else {
            $this->Flash->error(__('The formation status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
