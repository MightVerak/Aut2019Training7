<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EmployeeFormations Controller
 *
 * @property \App\Model\Table\EmployeeFormationsTable $EmployeeFormations
 *
 * @method \App\Model\Entity\EmployeeFormation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeeFormationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees', 'Formations']
        ];
        $employeeFormations = $this->paginate($this->EmployeeFormations);

        $this->set(compact('employeeFormations'));
    }

    /**
     * View method
     *
     * @param string|null $id Employee Formation id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employeeFormation = $this->EmployeeFormations->get($id, [
            'contain' => ['Employees', 'Formations', 'Attachments']
        ]);

        $this->set('employeeFormation', $employeeFormation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employeeFormation = $this->EmployeeFormations->newEntity();
        if ($this->request->is('post')) {
            $employeeFormation = $this->EmployeeFormations->patchEntity($employeeFormation, $this->request->getData());
            if ($this->EmployeeFormations->save($employeeFormation)) {
                $this->Flash->success(__('The employee formation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee formation could not be saved. Please, try again.'));
        }
        $employees = $this->EmployeeFormations->Employees->find('list', ['limit' => 200]);
        $formations = $this->EmployeeFormations->Formations->find('list', ['limit' => 200]);
        $this->set(compact('employeeFormation', 'employees', 'formations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee Formation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employeeFormation = $this->EmployeeFormations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employeeFormation = $this->EmployeeFormations->patchEntity($employeeFormation, $this->request->getData());
            if ($this->EmployeeFormations->save($employeeFormation)) {
                $this->Flash->success(__('The employee formation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee formation could not be saved. Please, try again.'));
        }
        $employees = $this->EmployeeFormations->Employees->find('list', ['limit' => 200]);
        $formations = $this->EmployeeFormations->Formations->find('list', ['limit' => 200]);
        $this->set(compact('employeeFormation', 'employees', 'formations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee Formation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employeeFormation = $this->EmployeeFormations->get($id);
        if ($this->EmployeeFormations->delete($employeeFormation)) {
            $this->Flash->success(__('The employee formation has been deleted.'));
        } else {
            $this->Flash->error(__('The employee formation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function formation($id = null)
    {
        $employeeFormation = $this->EmployeeFormations->get($id, [
            'contain' => ['Employees', 'Formations']
        ]);

        $this->set('employeeFormation', $employeeFormation);
    }
}
