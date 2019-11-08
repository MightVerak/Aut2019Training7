<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Attachments Controller
 *
 * @property \App\Model\Table\AttachmentsTable $Attachments
 *
 * @method \App\Model\Entity\Attachment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AttachmentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['EmployeeFormations']
        ];
        $attachments = $this->paginate($this->Attachments);

        $this->set(compact('attachments'));
    }

    /**
     * View method
     *
     * @param string|null $id Attachment id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attachment = $this->Attachments->get($id, [
            'contain' => ['EmployeeFormations']
        ]);

        $this->set('attachment', $attachment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
		 $uploadData = '';
		  if ($this->request->is('post')) {
            if(!empty($this->request->data['file']['name'])){
                $fileName = $this->request->data['file']['name'];
			
                $uploadPath = ('files/' . $id);
                $uploadFile = $uploadPath.$fileName;
                $ext = substr(strtolower(strrchr($fileName, '.')), 1); 
                $arr_ext = array('pdf');
                
                if(in_array($ext, $arr_ext))
                {
                  
                  if ($this->request->data['file']['size'] < 2000000) {
                        
                        if(move_uploaded_file($this->request->data['file']['tmp_name'],$uploadFile)){
                            $uploadData = $this->Attachments->newEntity();
                            $uploadData->name = $fileName;
                            $uploadData->path = $uploadPath;
                            $uploadData->load_date = date("Y-m-d H:i:s");
                            $uploadData->employee_formation_id = $id;
                          
                            if ($this->Attachments->save($uploadData)) {
                                $this->Flash->success(__('File has been uploaded and inserted successfully.'));
    
                                return $this->redirect(['controller' => 'EmployeeFormations', 'action' => 'view', $id]);
                            }else{
                                $this->Flash->error(__('Unable to upload file, please try again.'));
                            }
                        }else{
                            $this->Flash->error(__('Unable to upload file, please try again.'));
                        }
                  } else {
						 $this->Flash->error(__('File is too big.'));
				  }
                } else {
                    $this->Flash->error(__('File is not a pdf.'));
                }
                
            }else{
                $this->Flash->error(__('Please choose a file to upload.'));
            }
            
        }
        $this->set('uploadData', $uploadData);
        
        $files = $this->Attachments->find('all', ['order' => ['Attachments.load_date' => 'DESC']]);
        $filesRowNum = $files->count();
        $this->set('files',$files);
        $this->set('filesRowNum',$filesRowNum);
		 
		 
		 
		 
		 
		 
		 
       
    }

    /**
     * Edit method
     *
     * @param string|null $id Attachment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attachment = $this->Attachments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attachment = $this->Attachments->patchEntity($attachment, $this->request->getData());
            if ($this->Attachments->save($attachment)) {
                $this->Flash->success(__('The attachment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attachment could not be saved. Please, try again.'));
        }
        $employeeFormations = $this->Attachments->EmployeeFormations->find('list', ['limit' => 200]);
        $this->set(compact('attachment', 'employeeFormations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Attachment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attachment = $this->Attachments->get($id);
        $employeeFormationsId = $attachment->employee_formation_id;
        if ($this->Attachments->delete($attachment)) {
            $this->Flash->success(__('The attachment has been deleted.'));
        } else {
            $this->Flash->error(__('The attachment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'EmployeeFormations', 'action' => 'view', $employeeFormationsId]);
    }
    
    public function download($id = null) {
	$file = $this->Attachments->get($id);
	
	
	$downloadPath = (WWW_ROOT. 'files' . DS . $file->employee_formation_id);
    $downloadFile = $downloadPath.$file->name;
	
    $this->response->file($downloadFile, array(
        'download' => true
        
    ));
    return $this->response;



	}
}
