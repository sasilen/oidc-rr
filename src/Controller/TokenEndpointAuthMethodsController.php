<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TokenEndpointAuthMethods Controller
 *
 * @property \App\Model\Table\TokenEndpointAuthMethodsTable $TokenEndpointAuthMethods
 */
class TokenEndpointAuthMethodsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->TokenEndpointAuthMethods->find();
        $tokenEndpointAuthMethods = $this->paginate($query);

        $this->set(compact('tokenEndpointAuthMethods'));
    }

    /**
     * View method
     *
     * @param string|null $id Token Endpoint Auth Method id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tokenEndpointAuthMethod = $this->TokenEndpointAuthMethods->get($id, contain: ['Rps']);
        $this->set(compact('tokenEndpointAuthMethod'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tokenEndpointAuthMethod = $this->TokenEndpointAuthMethods->newEmptyEntity();
        if ($this->request->is('post')) {
            $tokenEndpointAuthMethod = $this->TokenEndpointAuthMethods->patchEntity($tokenEndpointAuthMethod, $this->request->getData());
            if ($this->TokenEndpointAuthMethods->save($tokenEndpointAuthMethod)) {
                $this->Flash->success(__('The token endpoint auth method has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The token endpoint auth method could not be saved. Please, try again.'));
        }
        $rps = $this->TokenEndpointAuthMethods->Rps->find('list', limit: 200)->all();
        $this->set(compact('tokenEndpointAuthMethod', 'rps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Token Endpoint Auth Method id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tokenEndpointAuthMethod = $this->TokenEndpointAuthMethods->get($id, contain: ['Rps']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tokenEndpointAuthMethod = $this->TokenEndpointAuthMethods->patchEntity($tokenEndpointAuthMethod, $this->request->getData());
            if ($this->TokenEndpointAuthMethods->save($tokenEndpointAuthMethod)) {
                $this->Flash->success(__('The token endpoint auth method has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The token endpoint auth method could not be saved. Please, try again.'));
        }
        $rps = $this->TokenEndpointAuthMethods->Rps->find('list', limit: 200)->all();
        $this->set(compact('tokenEndpointAuthMethod', 'rps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Token Endpoint Auth Method id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tokenEndpointAuthMethod = $this->TokenEndpointAuthMethods->get($id);
        if ($this->TokenEndpointAuthMethods->delete($tokenEndpointAuthMethod)) {
            $this->Flash->success(__('The token endpoint auth method has been deleted.'));
        } else {
            $this->Flash->error(__('The token endpoint auth method could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
