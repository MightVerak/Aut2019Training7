<?php
namespace App\Controller;

use Cake\Mailer\Email;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use App\Model\Entity\EmployeeFormation;
use Cake\I18n\Date;
use Cake\I18n\Time;
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
    public function initialize()
{
    parent::initialize();
    $this->Auth->allow(['checkEmail']);
}
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

    public function checkEmail($mail = null){

    
        $employee = $this->Employees->find('all', ['conditions' => ['email =' => $mail], 'contain'  
        => ['Civilities', 'Languages', 'PositionTitles', 'Buildings', 'Supervisors', 'EmployeeFormations'] ])->first();
       

        if ($employee->id != null) {
            $this->anonymeMail($employee);
            $this->Flash->error(__('Sa marche.'));
            return $this->redirect(['controller'=>'home','action' => 'index']);
        }
        $this->Flash->error(__('ostie de criss.'));
        return $this->redirect(['controller'=>'home','action' => 'index']);
    
    }

    private function anonymeMail($employee){
        $email = new Email('default');
        $page = '<!DOCTYPE html>
        <html>
        <h2>Plan de formation</h2>
        <hr size="2" color="red">
        <div>
            <table style=" text-align: left;" >
                <tr>
                    <th>Numéro de l\'employé: </th>
                    <td> '. $employee->number . ' </td>
                </tr>
                <tr>
                    <th>  Nom de l\'employé: </th>
                    <td> '.$employee->civility->civility. ' ' .$employee->first_name.' '.$employee->last_name . ' </td>
                </tr>
                <tr>
                    <th> Titre du poste </th>
                    <td> '.$employee->position_title->position_title.' </td>
                </tr>
                <tr>
                    <th> Supervisor </th>
                    <td> '.$employee->supervisor->name.' </td>
                </tr>
                <tr>
                    <th> Building </th>
                    <td> '. $employee->building->building.' </td>
                </tr>
            </table>
            <div> ';
            
                if (!empty($employee->employee_formations)) {
                    $page .= '<table style="border-collapse: collapse;">
                    <tr  style="border: 1px solid #000;">
                        <th style="border: 1px solid #000;"> Formation </th>
                        <th style="border: 1px solid #000;"> Statut </th>
                        <th style="border: 1px solid #000;"> Fréquence </th>
                        <th style="border: 1px solid #000;"> Faite le </th>
                        <th style="border: 1px solid #000;"> Prévue le </th>
                        <th style="border: 1px solid #000;"> Expirée </th>
                        <th style="border: 1px solid #000;"> À venir </th>
                        <th style="border: 1px solid #000;"> À faire </th>
                        <th style="border: 1px solid #000;"> Jamais faite </th>
                    </tr>';

                    foreach ($employee->employee_formations as $employeeFormations){
                    $formation =  TableRegistry::get('Formations')->get($employeeFormations->formation_id, ['contain' => ['Categories' , 'Frequences']]); 
                    $formationposition = TableRegistry::get('formationsPositionTitles')->
                    find()->
                    where(['position_title_id' => $employee['position_title_id']]);
            
                    $formationposition = $formationposition->first(); 
                    $status =   TableRegistry::get('FormationStatuses')->get($formationposition->formation_status_id); 
                    $datedone = $employeeFormations->date_done;
                    $date = $this->addDate($datedone,$formation->frequence_id);
                    $page .= '<tr style="border: 1px solid #000;">
                    
                    <td style="border: 1px solid #000;"> '.$formation->title.' </td>
                    <td style="border: 1px solid #000;"> '.$status->formation_status.' </td>
                    <td style="border: 1px solid #000;"> '.TableRegistry::get('frequences')->get($formation->frequence_id)->frequence .' </td>
                    <td style="border: 1px solid #000;"> '. $datedone .' </td>
                   
    
    
                    <td style="border: 1px solid #000;"> '.$date.' </td>
                    <td style="border: 1px solid #000;"> '.$this->isExpired($datedone,$date).' </td>
                    <td style="border: 1px solid #000;"> '.$this->isVenir($datedone,$date,$formation->start_reminder_id).' </td>
                    <td style="border: 1px solid #000;"> '.$this->isAFair($datedone,$date,$formation->start_reminder_id).'  </td>
                    <td style="border: 1px solid #000;"> '.$this->isjamaisfait($datedone,$date).' </td>
                </tr>';
                    } 
                    
                   
                   $page .= '</table>';
                
                
            
                }
                $page .= '</div>
                        </div>
                    </html>'; 
                
        $email->to($employee->email)->subject('Plan de formation')->send($page);
    }


    public function addDate($date,$frequenceid){
        $value = null;

        switch($frequenceid){
            case 1:
                $value = '+1 week';
            break;

            case 2:
                $value= '+1 month';
            break;

            case 3:
                $value= '+3 month';
            break;

            case 4:
                $value= '+6 month';
            break;

            case 5:
                $value= '+18 month';
            break;

            case 6:
                $value= '+1 year';
            break;

            case 7:
                $value= '+2 year';
            break;

            case 8:
                $value= '+3 year';
            break;

            case 9:
                $value= '+4 year';
            break;

            case 10:
                $value= '+5 year';
            break;

            case 11:
                $value= null;
            break;

            case 12:
                $value= null;
            break;
        }

        if($value == null){
            return null;
        }else{
            return  new Time(date('m/d/y', strtotime($date .  $value ) ));
        }
        
    }

    public function removeDate($date,$frequenceid){
        $value = null;

        switch($frequenceid){
            case 1:
                $value = '-1 week';
            break;

            case 2:
                $value= '-1 month';
            break;

            case 3:
                $value= '-3 month';
            break;

            case 4:
                $value= '-6 month';
            break;

            case 5:
                $value= '-18 month';
            break;

            case 6:
                $value= '-1 year';
            break;

            case 7:
                $value= '-2 year';
            break;

            case 8:
                $value= '-3 year';
            break;

            case 9:
                $value= '-4 year';
            break;

            case 10:
                $value= '-5 year';
            break;

            case 11:
                $value= null;
            break;

            case 12:
                $value= null;
            break;
        }

        if($value == null){
            return null;
        }else{
            $clone = clone $date;
            return  $clone->modify($value);
        }
        
    }

    public function isExpired($datedone,$date ){
        $bool = 'Yes';
        $no = 'No';

       if($date < Time::now() && $date !=null && $datedone!=null){

        }else{
            $bool = $no;
        }

        return $bool;
    }

    public function isVenir($datedone,$date,$id){
        $bool = '';

        if($datedone == null){
            
        }else if($this->isAFair($datedone,$date,$id) == 'Yes' && $this->isExpired($datedone,$date) != 'Yes'){
           

           // $reminderStart = $this->removeDate($date,$id);
           // $bool = $reminder - Time::now() ;
        
     
           $maintenant = date_create($datedone->year."-".$datedone->month."-".$datedone->day);
           $venir = date_create(($date->year."-".$date->month."-".$date->day));
           $maintenant = date_create();
          
           
           $diff = date_diff($maintenant, $venir);
           $bool = $diff->format("%a days");
           
        


        }
        return $bool;
    }

    public function isAFair($datedone,$date,$id){
        $bool = 'Yes';
        $no = 'No';

        if($datedone != null && $date != null && $date > Time::now() ){
            $reminderStart = $this->removeDate($date,$id);
            if($reminderStart<Time::now()){
              
            }else{
                $bool = $no;
                
            }
        }else if ($this->isExpired($datedone,$date) == 'Yes'){
            
        }else{
            $bool = $no;
        }
        
        return $bool;
    }
    

    public function isjamaisfait($datedone,$date){
        $bool = 'Yes';
        $no = 'No';

        if($date == null && $datedone == null ){

        }else if( $datedone == null){
            
        }else{
            $bool = $no;
        }
        return $bool;

    }
    


}
