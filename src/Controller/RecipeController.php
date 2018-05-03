<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Recipe Controller
 *
 * @property \App\Model\Table\RecipeTable $Recipe
 *
 * @method \App\Model\Entity\Recipe[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RecipeController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $recipe = $this->paginate($this->Recipe);

        $this->set(compact('recipe'));
    }

    /**
     * View method
     *
     * @param string|null $id Recipe id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recipe = $this->Recipe->get($id, [
            'contain' => ['Users', 'Hops', 'Malt', 'Style', 'Yeast']
        ]);

        $this->set('recipe', $recipe);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recipe = $this->Recipe->newEntity();
        if ($this->request->is('post')) {
            $recipe = $this->Recipe->patchEntity($recipe, $this->request->getData());
            if ($this->Recipe->save($recipe)) {
                $this->Flash->success(__('The recipe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recipe could not be saved. Please, try again.'));
        }
        $users = $this->Recipe->Users->find('list', ['limit' => 200]);
        $hops = $this->Recipe->Hops->find('list', ['limit' => 200]);
        $malt = $this->Recipe->Malt->find('list', ['limit' => 200]);
        $style = $this->Recipe->Style->find('list', ['limit' => 200]);
        $yeast = $this->Recipe->Yeast->find('list', ['limit' => 200]);
        $this->set(compact('recipe', 'users', 'hops', 'malt', 'style', 'yeast'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Recipe id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recipe = $this->Recipe->get($id, [
            'contain' => ['Hops', 'Malt', 'Style', 'Yeast']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recipe = $this->Recipe->patchEntity($recipe, $this->request->getData());
            if ($this->Recipe->save($recipe)) {
                $this->Flash->success(__('The recipe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recipe could not be saved. Please, try again.'));
        }
        $users = $this->Recipe->Users->find('list', ['limit' => 200]);
        $hops = $this->Recipe->Hops->find('list', ['limit' => 200]);
        $malt = $this->Recipe->Malt->find('list', ['limit' => 200]);
        $style = $this->Recipe->Style->find('list', ['limit' => 200]);
        $yeast = $this->Recipe->Yeast->find('list', ['limit' => 200]);
        $this->set(compact('recipe', 'users', 'hops', 'malt', 'style', 'yeast'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Recipe id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recipe = $this->Recipe->get($id);
        if ($this->Recipe->delete($recipe)) {
            $this->Flash->success(__('The recipe has been deleted.'));
        } else {
            $this->Flash->error(__('The recipe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    /*
        Test Function For Exerimentation
    */

    public function foobar()
    {
        $recipe = $this->Recipe->newEntity();
        $users = $this->Recipe->Users->find('all');
        $hops = $this->Recipe->Hops->find('all');
        $this->set('hops', $hops);
        $this->set('users', $users);
        $this->set('recipe', $recipe);

    }
}
