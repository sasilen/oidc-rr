<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ResponseTypes Controller
 *
 * @property \App\Model\Table\ResponseTypesTable $ResponseTypes
 */
class ResponseTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->ResponseTypes->find();
        $responseTypes = $this->paginate($query);

        $this->set(compact('responseTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Response Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $responseType = $this->ResponseTypes->get($id, contain: ['Rps']);
        $this->set(compact('responseType'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $responseType = $this->ResponseTypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $responseType = $this->ResponseTypes->patchEntity($responseType, $this->request->getData());
            if ($this->ResponseTypes->save($responseType)) {
                $this->Flash->success(__('The response type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The response type could not be saved. Please, try again.'));
        }
        $rps = $this->ResponseTypes->Rps->find('list', limit: 200)->all();
        $this->set(compact('responseType', 'rps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Response Type id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $responseType = $this->ResponseTypes->get($id, contain: ['Rps']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $responseType = $this->ResponseTypes->patchEntity($responseType, $this->request->getData());
            if ($this->ResponseTypes->save($responseType)) {
                $this->Flash->success(__('The response type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The response type could not be saved. Please, try again.'));
        }
        $rps = $this->ResponseTypes->Rps->find('list', limit: 200)->all();
        $this->set(compact('responseType', 'rps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Response Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $responseType = $this->ResponseTypes->get($id);
        if ($this->ResponseTypes->delete($responseType)) {
            $this->Flash->success(__('The response type has been deleted.'));
        } else {
            $this->Flash->error(__('The response type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
