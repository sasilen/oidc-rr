<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * AllowedAuthMethods Controller
 *
 * @property \App\Model\Table\AllowedAuthMethodsTable $AllowedAuthMethods
 */
class AllowedAuthMethodsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->AllowedAuthMethods->find();
        $allowedAuthMethods = $this->paginate($query);

        $this->set(compact('allowedAuthMethods'));
    }

    /**
     * View method
     *
     * @param string|null $id Allowed Auth Method id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $allowedAuthMethod = $this->AllowedAuthMethods->get($id, contain: ['Rps']);
        $this->set(compact('allowedAuthMethod'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $allowedAuthMethod = $this->AllowedAuthMethods->newEmptyEntity();
        if ($this->request->is('post')) {
            $allowedAuthMethod = $this->AllowedAuthMethods->patchEntity($allowedAuthMethod, $this->request->getData());
            if ($this->AllowedAuthMethods->save($allowedAuthMethod)) {
                $this->Flash->success(__('The allowed auth method has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The allowed auth method could not be saved. Please, try again.'));
        }
        $rps = $this->AllowedAuthMethods->Rps->find('list', limit: 200)->all();
        $this->set(compact('allowedAuthMethod', 'rps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Allowed Auth Method id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $allowedAuthMethod = $this->AllowedAuthMethods->get($id, contain: ['Rps']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $allowedAuthMethod = $this->AllowedAuthMethods->patchEntity($allowedAuthMethod, $this->request->getData());
            if ($this->AllowedAuthMethods->save($allowedAuthMethod)) {
                $this->Flash->success(__('The allowed auth method has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The allowed auth method could not be saved. Please, try again.'));
        }
        $rps = $this->AllowedAuthMethods->Rps->find('list', limit: 200)->all();
        $this->set(compact('allowedAuthMethod', 'rps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Allowed Auth Method id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $allowedAuthMethod = $this->AllowedAuthMethods->get($id);
        if ($this->AllowedAuthMethods->delete($allowedAuthMethod)) {
            $this->Flash->success(__('The allowed auth method has been deleted.'));
        } else {
            $this->Flash->error(__('The allowed auth method could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
