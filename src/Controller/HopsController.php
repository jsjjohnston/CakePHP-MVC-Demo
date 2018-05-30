<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Log\Log;

/**
 * Hops Controller
 *
 * @property \App\Model\Table\HopsTable $Hops
 *
 * @method \App\Model\Entity\Hop[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HopsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $hops = $this->paginate($this->Hops);

        $this->set(compact('hops'));
    }

    /**
     * View method
     *
     * @param string|null $id Hop id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hop = $this->Hops->get($id, [
            'contain' => ['Recipe']
        ]);

        $this->set('hop', $hop);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hop = $this->Hops->newEntity();
        if ($this->request->is('post')) {
            $hop = $this->Hops->patchEntity($hop, $this->request->getData());
            if ($this->Hops->save($hop)) {
                $this->Flash->success(__('The hop has been saved.'));
                Log::write('info', $hop . ' Has been saved');
                return $this->redirect(['action' => 'index']);
            }
            Log::write('error', $hop . ' The hop could not be saved. Please, try again.');
            $this->Flash->error(__('The hop could not be saved. Please, try again.'));
        }
        $recipe = $this->Hops->Recipe->find('list', ['limit' => 200]);
        $this->set(compact('hop', 'recipe'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Hop id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hop = $this->Hops->get($id, [
            'contain' => ['Recipe']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hop = $this->Hops->patchEntity($hop, $this->request->getData());
            if ($this->Hops->save($hop)) {
                $this->Flash->success(__('The hop has been saved.'));
                Log::write('info', $hop . ' Has been saved');
                return $this->redirect(['action' => 'index']);
            }
            Log::write('error', $hop . ' The hop could not be saved. Please, try again.');
            $this->Flash->error(__('The hop could not be saved. Please, try again.'));
        }
        $recipe = $this->Hops->Recipe->find('list', ['limit' => 200]);
        $this->set(compact('hop', 'recipe'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Hop id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hop = $this->Hops->get($id);
        if ($this->Hops->delete($hop)) {
            Log::write('info', $hop . ' The hop has been deleted.');
            $this->Flash->success(__('The hop has been deleted.'));
        } else {
            Log::write('error', $hop . ' The hop could not be deleted. Please, try again.');
            $this->Flash->error(__('The hop could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
