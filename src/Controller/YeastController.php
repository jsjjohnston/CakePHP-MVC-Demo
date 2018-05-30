<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Log\Log;

/**
 * Yeast Controller
 *
 * @property \App\Model\Table\YeastTable $Yeast
 *
 * @method \App\Model\Entity\Yeast[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class YeastController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $yeast = $this->paginate($this->Yeast);

        $this->set(compact('yeast'));
    }

    /**
     * View method
     *
     * @param string|null $id Yeast id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $yeast = $this->Yeast->get($id, [
            'contain' => ['Recipe']
        ]);

        $this->set('yeast', $yeast);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $yeast = $this->Yeast->newEntity();
        if ($this->request->is('post')) {
            $yeast = $this->Yeast->patchEntity($yeast, $this->request->getData());
            if ($this->Yeast->save($yeast)) {
                $this->Flash->success(__('The yeast has been saved.'));
                Log::write('info', $yeast . ' Has been saved');
                return $this->redirect(['action' => 'index']);
            }
            Log::write('error', $yeast . ' could not be saved. Please, try again');
            $this->Flash->error(__('The yeast could not be saved. Please, try again.'));
        }
        $this->set(compact('yeast', 'recipe'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Yeast id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $yeast = $this->Yeast->get($id, [
            'contain' => ['Recipe']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $yeast = $this->Yeast->patchEntity($yeast, $this->request->getData());
            if ($this->Yeast->save($yeast)) {
                $this->Flash->success(__('The yeast has been saved.'));
                Log::write('info', $yeast . ' Has been saved');
                return $this->redirect(['action' => 'index']);
            }
            Log::write('error', $yeast . ' could not be saved. Please, try again');
            $this->Flash->error(__('The yeast could not be saved. Please, try again.'));
        }
        $this->set(compact('yeast', 'recipe'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Yeast id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $yeast = $this->Yeast->get($id);
        if ($this->Yeast->delete($yeast)) {
            Log::write('info', $yeast . ' Has been deleted');
            $this->Flash->success(__('The yeast has been deleted.'));
        } else {
            Log::write('error', $yeast . ' could not be deleted. Please, try again');
            $this->Flash->error(__('The yeast could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
