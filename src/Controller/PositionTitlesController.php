<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PositionTitles Controller
 *
 * @property \App\Model\Table\PositionTitlesTable $PositionTitles
 *
 * @method \App\Model\Entity\PositionTitle[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PositionTitlesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $positionTitles = $this->paginate($this->PositionTitles);

        $this->set(compact('positionTitles'));
    }

    /**
     * View method
     *
     * @param string|null $id Position Title id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $positionTitle = $this->PositionTitles->get($id, [
            'contain' => ['Formations', 'Employees']
        ]);

        $this->set('positionTitle', $positionTitle);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $positionTitle = $this->PositionTitles->newEntity();
        if ($this->request->is('post')) {
            $positionTitle = $this->PositionTitles->patchEntity($positionTitle, $this->request->getData());
            if ($this->PositionTitles->save($positionTitle)) {
                $this->Flash->success(__('The position title has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The position title could not be saved. Please, try again.'));
        }
        $formations = $this->PositionTitles->Formations->find('list', ['limit' => 200]);
        $this->set(compact('positionTitle', 'formations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Position Title id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $positionTitle = $this->PositionTitles->get($id, [
            'contain' => ['Formations']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $positionTitle = $this->PositionTitles->patchEntity($positionTitle, $this->request->getData());
            if ($this->PositionTitles->save($positionTitle)) {
                $this->Flash->success(__('The position title has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The position title could not be saved. Please, try again.'));
        }
        $formations = $this->PositionTitles->Formations->find('list', ['limit' => 200]);
        $this->set(compact('positionTitle', 'formations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Position Title id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $positionTitle = $this->PositionTitles->get($id);
        if ($this->PositionTitles->delete($positionTitle)) {
            $this->Flash->success(__('The position title has been deleted.'));
        } else {
            $this->Flash->error(__('The position title could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
