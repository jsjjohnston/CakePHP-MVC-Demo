<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Log\Log;

/**
 * Malt Controller
 *
 * @property \App\Model\Table\MaltTable $Malt
 *
 * @method \App\Model\Entity\Malt[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MaltController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $malt = $this->paginate($this->Malt);

        $this->set(compact('malt'));
    }

    /**
     * View method
     *
     * @param string|null $id Malt id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $malt = $this->Malt->get($id, [
            'contain' => ['Recipe']
        ]);

        $this->set('malt', $malt);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $malt = $this->Malt->newEntity();
        if ($this->request->is('post')) {
            $malt = $this->Malt->patchEntity($malt, $this->request->getData());
            if ($this->Malt->save($malt)) {
                $this->Flash->success(__('The malt has been saved.'));
                Log::write('info', $malt . ' Has been saved');
                return $this->redirect(['action' => 'index']);
            }
            Log::write('error', $malt . ' could not be saved. Please, try again.');
            $this->Flash->error(__('The malt could not be saved. Please, try again.'));
        }
        $recipe = $this->Malt->Recipe->find('list', ['limit' => 200]);
        $this->set(compact('malt', 'recipe'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Malt id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $malt = $this->Malt->get($id, [
            'contain' => ['Recipe']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $malt = $this->Malt->patchEntity($malt, $this->request->getData());
            if ($this->Malt->save($malt)) {
                $this->Flash->success(__('The malt has been saved.'));
                Log::write('info', $malt . ' Has been saved');
                return $this->redirect(['action' => 'index']);
            }
            Log::write('error', $malt . ' could not be saved. Please, try again.');
            $this->Flash->error(__('The malt could not be saved. Please, try again.'));
        }
        $recipe = $this->Malt->Recipe->find('list', ['limit' => 200]);
        $this->set(compact('malt', 'type'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Malt id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $malt = $this->Malt->get($id);
        if ($this->Malt->delete($malt)) {
            Log::write('info', $malt . ' Has been saved');
            $this->Flash->success(__('The malt has been deleted.'));
        } else {
            Log::write('error', $malt . ' could not be deleted. Please, try again');
            $this->Flash->error(__('The malt could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
