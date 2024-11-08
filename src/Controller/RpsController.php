<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Rps Controller
 *
 * @property \App\Model\Table\RpsTable $Rps
 */
class RpsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Rps->find();
        $rps = $this->paginate($query);

        $this->set(compact('rps'));
    }

    /**
     * View method
     *
     * @param string|null $id Rp id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rp = $this->Rps->get($id, contain: ['Resources', 'AllowedAuthMethods', 'Federations', 'GrantTypes', 'ResponseTypes', 'Scopes', 'TokenEndpointAuthMethods', 'Users', 'RedirectUris']);
        $this->set(compact('rp'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rp = $this->Rps->newEmptyEntity();
        if ($this->request->is('post')) {
            $rp = $this->Rps->patchEntity($rp, $this->request->getData());
            if ($this->Rps->save($rp)) {
                $this->Flash->success(__('The rp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rp could not be saved. Please, try again.'));
        }
        $resources = $this->Rps->Resources->find('list', limit: 200)->all();
        $allowedAuthMethods = $this->Rps->AllowedAuthMethods->find('list', limit: 200)->all();
        $federations = $this->Rps->Federations->find('list', limit: 200)->all();
        $grantTypes = $this->Rps->GrantTypes->find('list', limit: 200)->all();
        $responseTypes = $this->Rps->ResponseTypes->find('list', limit: 200)->all();
        $scopes = $this->Rps->Scopes->find('list', limit: 200)->all();
        $tokenEndpointAuthMethods = $this->Rps->TokenEndpointAuthMethods->find('list', limit: 200)->all();
        $users = $this->Rps->Users->find('list', limit: 200)->all();
        $this->set(compact('rp', 'resources', 'allowedAuthMethods', 'federations', 'grantTypes', 'responseTypes', 'scopes', 'tokenEndpointAuthMethods', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rp id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rp = $this->Rps->get($id, contain: ['Resources', 'AllowedAuthMethods', 'Federations', 'GrantTypes', 'ResponseTypes', 'Scopes', 'TokenEndpointAuthMethods', 'Users']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rp = $this->Rps->patchEntity($rp, $this->request->getData());
            if ($this->Rps->save($rp)) {
                $this->Flash->success(__('The rp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rp could not be saved. Please, try again.'));
        }
        $resources = $this->Rps->Resources->find('list', limit: 200)->all();
        $allowedAuthMethods = $this->Rps->AllowedAuthMethods->find('list', limit: 200)->all();
        $federations = $this->Rps->Federations->find('list', limit: 200)->all();
        $grantTypes = $this->Rps->GrantTypes->find('list', limit: 200)->all();
        $responseTypes = $this->Rps->ResponseTypes->find('list', limit: 200)->all();
        $scopes = $this->Rps->Scopes->find('list', limit: 200)->all();
        $tokenEndpointAuthMethods = $this->Rps->TokenEndpointAuthMethods->find('list', limit: 200)->all();
        $users = $this->Rps->Users->find('list', limit: 200)->all();
        $this->set(compact('rp', 'resources', 'allowedAuthMethods', 'federations', 'grantTypes', 'responseTypes', 'scopes', 'tokenEndpointAuthMethods', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rp id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rp = $this->Rps->get($id);
        if ($this->Rps->delete($rp)) {
            $this->Flash->success(__('The rp has been deleted.'));
        } else {
            $this->Flash->error(__('The rp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
