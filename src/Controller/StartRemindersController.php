<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StartReminders Controller
 *
 * @property \App\Model\Table\StartRemindersTable $StartReminders
 *
 * @method \App\Model\Entity\StartReminder[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StartRemindersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $startReminders = $this->paginate($this->StartReminders);

        $this->set(compact('startReminders'));
    }

    /**
     * View method
     *
     * @param string|null $id Start Reminder id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $startReminder = $this->StartReminders->get($id, [
            'contain' => ['Formations']
        ]);

        $this->set('startReminder', $startReminder);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $startReminder = $this->StartReminders->newEntity();
        if ($this->request->is('post')) {
            $startReminder = $this->StartReminders->patchEntity($startReminder, $this->request->getData());
            if ($this->StartReminders->save($startReminder)) {
                $this->Flash->success(__('The start reminder has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The start reminder could not be saved. Please, try again.'));
        }
        $this->set(compact('startReminder'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Start Reminder id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $startReminder = $this->StartReminders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $startReminder = $this->StartReminders->patchEntity($startReminder, $this->request->getData());
            if ($this->StartReminders->save($startReminder)) {
                $this->Flash->success(__('The start reminder has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The start reminder could not be saved. Please, try again.'));
        }
        $this->set(compact('startReminder'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Start Reminder id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $startReminder = $this->StartReminders->get($id);
        if ($this->StartReminders->delete($startReminder)) {
            $this->Flash->success(__('The start reminder has been deleted.'));
        } else {
            $this->Flash->error(__('The start reminder could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
