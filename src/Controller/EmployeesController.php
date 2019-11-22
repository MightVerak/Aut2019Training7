<?php
namespace App\Controller;

use Cake\Mailer\Email;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use App\Model\Entity\EmployeeFormation;
/**
 * Employees Controller
 *
 * @property \App\Model\Table\EmployeesTable $Employees
 *
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {

        if ($this->request->is('post')) {

        $keyword = $this->request->getData(['keyword']);


        }
        if(!empty($keyword)){
            $this->paginate = ['conditions'=> array( 
            'OR'=>array( 
                'first_name LIKE'=>'%'.$keyword.'%', 
                'last_name LIKE'=>'%'.$keyword.'%')
                ),'contain' => ['Civilities', 'Languages', 'PositionTitles', 'Buildings', 'Supervisors']];
        }else{
            $this->paginate = [
            'contain' => ['Civilities', 'Languages', 'PositionTitles', 'Buildings', 'Supervisors']];
        }

        
        $employees = $this->paginate($this->Employees);
        $this->set(compact('employees'));
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => ['Civilities', 'Languages', 'PositionTitles', 'Buildings', 'Supervisors', 'employeeformations']
        ]);

        $this->set('employee', $employee);

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employee = $this->Employees->newEntity();
        if ($this->request->is('post')) {

            $employee = $this->Employees->patchEntity($employee, $this->request->getData());

            $phoneNumber = $employee['cellular'];
            if($this->needformating($phoneNumber)){
                $employee['cellular'] = $this->formatPhone($phoneNumber);
            }

            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));
                $this->addFormation($employee);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $civilities = $this->Employees->Civilities->find('list', ['limit' => 200]);
        $languages = $this->Employees->Languages->find('list', ['limit' => 200]);
        $positionTitles = $this->Employees->PositionTitles->find('list', ['limit' => 200]);
        $buildings = $this->Employees->Buildings->find('list', ['limit' => 200]);
        $supervisors = $this->Employees->Supervisors->find('list', ['limit' => 200]);
        $this->set(compact('employee', 'civilities', 'languages', 'positionTitles', 'buildings', 'supervisors'));
    }

    public static function isvalidNumber($number){
        if (strlen($number) == 12){
            return true;
        }else{
            return false;
        }
    }

    public static function needformating($number){
        if (strlen($number) == 10){
            return true;
        }else{
            return false;
        }
    }

    public static function formatPhone($number){
        $formated = substr($number,0,3);
        $formated = $formated."-";
        $formated = $formated.substr($number,3,3);
        $formated = $formated."-";
        $formated = $formated.substr($number,6,4);

        return $formated;
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            $phoneNumber = $employee['cellular'];
            if($this->needformating($phoneNumber)){
                $employee['cellular'] = $this->formatPhone($phoneNumber);
            }
            
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $civilities = $this->Employees->Civilities->find('list', ['limit' => 200]);
        $languages = $this->Employees->Languages->find('list', ['limit' => 200]);
        $positionTitles = $this->Employees->PositionTitles->find('list', ['limit' => 200]);
        $buildings = $this->Employees->Buildings->find('list', ['limit' => 200]);
        $supervisors = $this->Employees->Supervisors->find('list', ['limit' => 200]);
        $this->set(compact('employee', 'civilities', 'languages', 'positionTitles', 'buildings', 'supervisors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employees->get($id);
        if ($this->Employees->delete($employee)) {
            $this->Flash->success(__('The employee has been deleted.'));
        } else {
            $this->Flash->error(__('The employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
        public function formation($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => ['Civilities', 'Languages', 'PositionTitles', 'Buildings', 'Supervisors', 'EmployeeFormations']
        ]);

        $this->set('employee', $employee);
    }
    
    public function mailPage()
    {
        $email = new Email('default');
        $email->to($_SESSION['adress'])->subject('Plan de formation')->send($_SESSION['page']);
        $this->redirect(['action' => 'index']);
        $this->Flash->success(__('A confirmation Email has been sent to '. $_SESSION['adress']));
    }

    public function  addFormation($employee){

        $Employeeformations = TableRegistry::get('employeeFormations');
        $Employeeformations->find();
        $formations = TableRegistry::get('formationsPositionTitles')->
        find()->
        where(['position_title_id' => $employee['position_title_id']]);

        $formations = $formations->all();
        foreach($formations as $formation ){
            $employeeformation = new EmployeeFormation([
                'formation_id' => $formation['formation_id'],
                'employee_id' => $employee['id']
            ]);
 
            $Employeeformations->save($employeeformation);
        }
    }

    public function addDate($frequenceid){
        $date;

        switch($date){
            case 1:
                $date= '1 week';
            break;

            case 2:
                $date= '1 month';
            break;

            case 3:
                $date= '3 month';
            break;

            case 4:
                $date= '6 month';
            break;

            case 5:
                $date= '18 month';
            break;

            case 6:
                $date= '1 year';
            break;

            case 7:
                $date= '2 year';
            break;

            case 8:
                $date= '3 year';
            break;

            case 9:
                $date= '4 year';
            break;

            case 10:
                $date= '5 year';
            break;

            case 11:
                $date= null;
            break;

            case 12:
                $date= null;
            break;
        }
        return $date;
    }

}
