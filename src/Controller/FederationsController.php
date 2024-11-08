<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Federations Controller
 *
 * @property \App\Model\Table\FederationsTable $Federations
 */
class FederationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Federations->find();
        $federations = $this->paginate($query);

        $this->set(compact('federations'));
    }

    /**
     * View method
     *
     * @param string|null $id Federation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $federation = $this->Federations->get($id, contain: ['Rps']);
        $this->set(compact('federation'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $federation = $this->Federations->newEmptyEntity();
        if ($this->request->is('post')) {
            $federation = $this->Federations->patchEntity($federation, $this->request->getData());
            if ($this->Federations->save($federation)) {
                $this->Flash->success(__('The federation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The federation could not be saved. Please, try again.'));
        }
        $rps = $this->Federations->Rps->find('list', limit: 200)->all();
        $this->set(compact('federation', 'rps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Federation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $federation = $this->Federations->get($id, contain: ['Rps']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $federation = $this->Federations->patchEntity($federation, $this->request->getData());
            if ($this->Federations->save($federation)) {
                $this->Flash->success(__('The federation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The federation could not be saved. Please, try again.'));
        }
        $rps = $this->Federations->Rps->find('list', limit: 200)->all();
        $this->set(compact('federation', 'rps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Federation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $federation = $this->Federations->get($id);
        if ($this->Federations->delete($federation)) {
            $this->Flash->success(__('The federation has been deleted.'));
        } else {
            $this->Flash->error(__('The federation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
