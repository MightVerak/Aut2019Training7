<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EmployeesFormations Controller
 *
 * @property \App\Model\Table\EmployeesFormationsTable $EmployeesFormations
 *
 * @method \App\Model\Entity\EmployeesFormation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeesFormationsController extends AppController
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
        $employeesFormations = $this->paginate($this->EmployeesFormations);

        $this->set(compact('employeesFormations'));
    }

    /**
     * View method
     *
     * @param string|null $id Employees Formation id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employeesFormation = $this->EmployeesFormations->get($id, [
            'contain' => ['Employees', 'Formations']
        ]);

        $this->set('employeesFormation', $employeesFormation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employeesFormation = $this->EmployeesFormations->newEntity();
        if ($this->request->is('post')) {
            $employeesFormation = $this->EmployeesFormations->patchEntity($employeesFormation, $this->request->getData());
            if ($this->EmployeesFormations->save($employeesFormation)) {
                $this->Flash->success(__('The employees formation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employees formation could not be saved. Please, try again.'));
        }
        $employees = $this->EmployeesFormations->Employees->find('list', ['limit' => 200]);
        $formations = $this->EmployeesFormations->Formations->find('list', ['limit' => 200]);
        $this->set(compact('employeesFormation', 'employees', 'formations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employees Formation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employeesFormation = $this->EmployeesFormations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employeesFormation = $this->EmployeesFormations->patchEntity($employeesFormation, $this->request->getData());
            if ($this->EmployeesFormations->save($employeesFormation)) {
                $this->Flash->success(__('The employees formation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employees formation could not be saved. Please, try again.'));
        }
        $employees = $this->EmployeesFormations->Employees->find('list', ['limit' => 200]);
        $formations = $this->EmployeesFormations->Formations->find('list', ['limit' => 200]);
        $this->set(compact('employeesFormation', 'employees', 'formations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employees Formation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employeesFormation = $this->EmployeesFormations->get($id);
        if ($this->EmployeesFormations->delete($employeesFormation)) {
            $this->Flash->success(__('The employees formation has been deleted.'));
        } else {
            $this->Flash->error(__('The employees formation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function formation($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => ['Civilities', 'PositionTitles', 'Buildings', 'Supervisors', 'EmployeeFormations']
        ]);

        $this->set('employee', $employee);
    }
}
