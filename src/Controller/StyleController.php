<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Log\Log;

/**
 * Style Controller
 *
 * @property \App\Model\Table\StyleTable $Style
 *
 * @method \App\Model\Entity\Style[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StyleController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $style = $this->paginate($this->Style);

        $this->set(compact('style'));
    }

    /**
     * View method
     *
     * @param string|null $id Style id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $style = $this->Style->get($id, [
            'contain' => ['Recipe']
        ]);

        $this->set('style', $style);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $style = $this->Style->newEntity();
        if ($this->request->is('post')) {
            $style = $this->Style->patchEntity($style, $this->request->getData());
            if ($this->Style->save($style)) {
                $this->Flash->success(__('The style has been saved.'));
                Log::write('info', $style . ' Has been saved');
                return $this->redirect(['action' => 'index']);
            }
            Log::write('error', $style . ' could not be saved. Please, try again.');
            $this->Flash->error(__('The style could not be saved. Please, try again.'));
        }
        $type = $this->Style->find('list', ['limit' => 200]);
        $this->set(compact('style', 'type'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Style id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $style = $this->Style->get($id, [
            'contain' => ['Recipe']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $style = $this->Style->patchEntity($style, $this->request->getData());
            if ($this->Style->save($style)) {
                $this->Flash->success(__('The style has been saved.'));
                Log::write('info', $style . ' Has been saved');
                return $this->redirect(['action' => 'index']);
            }
            Log::write('error', $style . ' could not be saved. Please, try again.');
            $this->Flash->error(__('The style could not be saved. Please, try again.'));
        }
        $recipe = $this->Style->Recipe->find('list', ['limit' => 200]);
        $this->set(compact('style', 'recipe'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Style id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $style = $this->Style->get($id);
        if ($this->Style->delete($style)) {
            Log::write('info', $style . ' Has been deleted');
            $this->Flash->success(__('The style has been deleted.'));
        } else {
            Log::write('info', $style . ' could not be deleted. Please, try again.');
            $this->Flash->error(__('The style could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
