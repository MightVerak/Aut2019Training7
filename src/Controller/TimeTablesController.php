<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TimeTables Controller
 *
 * @property \App\Model\Table\TimeTablesTable $TimeTables
 *
 * @method \App\Model\Entity\TimeTable[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TimeTablesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $timeTables = $this->paginate($this->TimeTables);

        $this->set(compact('timeTables'));
    }

    /**
     * View method
     *
     * @param string|null $id Time Table id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $timeTable = $this->TimeTables->get($id, [
            'contain' => []
        ]);

        $this->set('timeTable', $timeTable);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $timeTable = $this->TimeTables->newEntity();
        if ($this->request->is('post')) {
            $timeTable = $this->TimeTables->patchEntity($timeTable, $this->request->getData());
            if ($this->TimeTables->save($timeTable)) {
                $this->Flash->success(__('The time table has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The time table could not be saved. Please, try again.'));
        }
        $this->set(compact('timeTable'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Time Table id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $timeTable = $this->TimeTables->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $timeTable = $this->TimeTables->patchEntity($timeTable, $this->request->getData());
            if ($this->TimeTables->save($timeTable)) {
                $this->Flash->success(__('The time table has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The time table could not be saved. Please, try again.'));
        }
        $this->set(compact('timeTable'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Time Table id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $timeTable = $this->TimeTables->get($id);
        if ($this->TimeTables->delete($timeTable)) {
            $this->Flash->success(__('The time table has been deleted.'));
        } else {
            $this->Flash->error(__('The time table could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
