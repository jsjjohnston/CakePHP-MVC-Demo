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

            $recipe->user_id = $this->Auth->user('id');
            if ($this->Recipe->save($recipe)) {
                $this->Flash->success(__('The recipe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recipe could not be saved. Please, try again.'));
        }
        $users = $this->Recipe->Users->find('list', ['limit' => 200]);
        $hops = $this->Recipe->Hops->find('list', ['limit' => 200]);
        $malt = $this->Recipe->Malt->find('list', ['limit' => 200]);
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

        $style = $this->Recipe->Style->find('list', ['keyField' => 'id', 'valueField' => 'style_name']);
        $yeast = $this->Recipe->Yeast->find('list', ['keyField' => 'id', 'valueField' => 'yeast_name']);
        $this->set(compact('recipe','style', 'yeast'));
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
}
