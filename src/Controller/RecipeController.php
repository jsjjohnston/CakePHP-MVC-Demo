<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Log\Log;

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

        $user = $this->Auth->user();
        $this->set(compact('recipe', 'user'));
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

            $recipe->user_id = $this->Auth->user('id');
            if ($this->Recipe->save($recipe)) {
                Log::write('info', $recipe['recipe_name'] . ' Has been saved');
                $this->Flash->success(__('The recipe has been saved.'));

                //return $this->redirect(['action' => 'index']);
            }
            else
            {
                Log::write('error', 'Recipe could not be saved. Please, try again.');
                $this->Flash->error(__('The recipe could not be saved. Please, try again.'));
            }
        }
        $users = $this->Recipe->Users->find('list', ['limit' => 200]);
        $hops = $this->Recipe->Hops->find('list', ['keyField' => 'id', 'valueField' => 'hop_name']);
        $malt = $this->Recipe->Malt->find('list', ['keyField' => 'id', 'valueField' => 'malt_name']);
        $style = $this->Recipe->Style->find('list', ['keyField' => 'id', 'valueField' => 'style_name']);
        $yeast = $this->Recipe->Yeast->find('list', ['keyField' => 'id', 'valueField' => 'yeast_name']);
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
            'contain' => ['Users', 'Hops', 'Malt', 'Style', 'Yeast']
        ]);

        $hops = $this->Recipe->Hops->find('list', ['keyField' => 'id', 'valueField' => 'hop_name']);
        $malt = $this->Recipe->Malt->find('list', ['keyField' => 'id', 'valueField' => 'malt_name']);
        $style = $this->Recipe->Style->find('list', ['keyField' => 'id', 'valueField' => 'style_name']);
        $yeast = $this->Recipe->Yeast->find('list', ['keyField' => 'id', 'valueField' => 'yeast_name']);
        $this->set(compact('recipe','hops', 'malt','style', 'yeast'));
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
            Log::write('info', $recipe['recipe_name'] . ' The recipe has been deleted.');
            $this->Flash->success(__('The recipe has been deleted.'));
        } else {
            Log::write('error', $recipe['recipe_name'] . ' The recipe has been deleted.');
            $this->Flash->error(__('The recipe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        if ($this->request->getParam('action') === 'add') {
            return true;
        }

        // The owner of an recipe can edit and delete it
        if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
            $recipeId = (int)$this->request->getParam('pass.0');
            if ($this->Recipe->isOwnedBy($recipeId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    public function viewMy()
    {
        $this->paginate = [
            'conditions' => ['user_id' => $this->Auth->user('id')],
            'contain' => ['Users']
        ];
        $recipe = $this->paginate($this->Recipe);

        $this->set(compact('recipe'));
    }
}
