<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * GrantTypes Controller
 *
 * @property \App\Model\Table\GrantTypesTable $GrantTypes
 */
class GrantTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function apiIndex()
    {
        $query = $this->GrantTypes->find();
        $grantTypes = $this->paginate($query);
        $this->set(['tasks'=>$grantTypes,'_serialize'=>['tasks']]);
    }

    public function index()
    {
        $query = $this->GrantTypes->find();
        $grantTypes = $this->paginate($query);

        $this->set(compact('grantTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Grant Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $grantType = $this->GrantTypes->get($id, contain: ['Rps']);
        $this->set(compact('grantType'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $grantType = $this->GrantTypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $grantType = $this->GrantTypes->patchEntity($grantType, $this->request->getData());
            if ($this->GrantTypes->save($grantType)) {
                $this->Flash->success(__('The grant type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The grant type could not be saved. Please, try again.'));
        }
        $rps = $this->GrantTypes->Rps->find('list', limit: 200)->all();
        $this->set(compact('grantType', 'rps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Grant Type id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $grantType = $this->GrantTypes->get($id, contain: ['Rps']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $grantType = $this->GrantTypes->patchEntity($grantType, $this->request->getData());
            if ($this->GrantTypes->save($grantType)) {
                $this->Flash->success(__('The grant type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The grant type could not be saved. Please, try again.'));
        }
        $rps = $this->GrantTypes->Rps->find('list', limit: 200)->all();
        $this->set(compact('grantType', 'rps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Grant Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $grantType = $this->GrantTypes->get($id);
        if ($this->GrantTypes->delete($grantType)) {
            $this->Flash->success(__('The grant type has been deleted.'));
        } else {
            $this->Flash->error(__('The grant type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
