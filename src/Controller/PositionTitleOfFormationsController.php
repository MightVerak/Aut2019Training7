<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PositionTitleOfFormations Controller
 *
 * @property \App\Model\Table\PositionTitleOfFormationsTable $PositionTitleOfFormations
 *
 * @method \App\Model\Entity\PositionTitleOfFormation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PositionTitleOfFormationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $positionTitleOfFormations = $this->paginate($this->PositionTitleOfFormations);

        $this->set(compact('positionTitleOfFormations'));
    }

    /**
     * View method
     *
     * @param string|null $id Position Title Of Formation id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $positionTitleOfFormation = $this->PositionTitleOfFormations->get($id, [
            'contain' => ['Formations']
        ]);

        $this->set('positionTitleOfFormation', $positionTitleOfFormation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $positionTitleOfFormation = $this->PositionTitleOfFormations->newEntity();
        if ($this->request->is('post')) {
            $positionTitleOfFormation = $this->PositionTitleOfFormations->patchEntity($positionTitleOfFormation, $this->request->getData());
            if ($this->PositionTitleOfFormations->save($positionTitleOfFormation)) {
                $this->Flash->success(__('The position title of formation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The position title of formation could not be saved. Please, try again.'));
        }
        $formations = $this->PositionTitleOfFormations->Formations->find('list', ['limit' => 200]);
        $this->set(compact('positionTitleOfFormation', 'formations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Position Title Of Formation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $positionTitleOfFormation = $this->PositionTitleOfFormations->get($id, [
            'contain' => ['Formations']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $positionTitleOfFormation = $this->PositionTitleOfFormations->patchEntity($positionTitleOfFormation, $this->request->getData());
            if ($this->PositionTitleOfFormations->save($positionTitleOfFormation)) {
                $this->Flash->success(__('The position title of formation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The position title of formation could not be saved. Please, try again.'));
        }
        $formations = $this->PositionTitleOfFormations->Formations->find('list', ['limit' => 200]);
        $this->set(compact('positionTitleOfFormation', 'formations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Position Title Of Formation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $positionTitleOfFormation = $this->PositionTitleOfFormations->get($id);
        if ($this->PositionTitleOfFormations->delete($positionTitleOfFormation)) {
            $this->Flash->success(__('The position title of formation has been deleted.'));
        } else {
            $this->Flash->error(__('The position title of formation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
