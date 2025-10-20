<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Projetos Controller
 *
 * @property \App\Model\Table\ProjetosTable $Projetos
 */
class ProjetosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $baseQuery = $this->Projetos->find()
            ->contain(['Funcoes.Usuarios', 'Categorias']);

        // Caso haja filtro por categoria
        if (!empty($categoriaId)) {
            $baseQuery = $baseQuery->matching('Categorias', function ($q) use ($categoriaId) {
                return $q->where(['Categorias.id' => $categoriaId]);
            });
        }

        // Cria cópias separadas da query base
        $queryAtivos = clone $baseQuery;
        $queryConcluidos = clone $baseQuery;
        $queryPrincipal = clone $baseQuery;

        $projetosAtivos = $queryAtivos->where(['Projetos.status' => 2])->count();
        $projetosConcluidos = $queryConcluidos->where(['Projetos.status' => 1])->count();

        $alunosAtivos = $this->Projetos->Funcoes->Usuarios->find()->count();

        $projetos = $this->paginate($queryPrincipal);

        foreach ($projetos as $projeto) {
            $projeto->orientador = null;
            foreach ($projeto->funcoes as $funcao) {
                if (strcasecmp($funcao->nome, 'Orientador') === 0 && !empty($funcao->usuarios)) {
                    $projeto->orientador = $funcao->usuarios[0]->nome;
                    break;
                }
            }
        }

        $this->set(compact('projetos', 'projetosAtivos', 'projetosConcluidos', 'alunosAtivos'));
    }


    /**
     * View method
     *
     * @param string|null $id Projeto id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projeto = $this->Projetos->get($id, contain: ['Documentos', 'Imagens', 'Funcoes.Usuarios', 'Categorias']);
        $projeto->orientador = null;
        foreach ($projeto->funcoes as $funcao) {
            if (strcasecmp($funcao->nome, 'Orientador') === 0) {
                $projeto->orientador = $funcao->usuarios[0]->nome;
                break;
            }
        }

        $this->set(compact('projeto'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projeto = $this->Projetos->newEmptyEntity();
        if ($this->request->is('post')) {
            $projeto = $this->Projetos->patchEntity($projeto, $this->request->getData());
            if ($this->Projetos->save($projeto)) {
                $this->Flash->success(__('The projeto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The projeto could not be saved. Please, try again.'));
        }
        $this->set(compact('projeto'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Projeto id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projeto = $this->Projetos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projeto = $this->Projetos->patchEntity($projeto, $this->request->getData());
            if ($this->Projetos->save($projeto)) {
                $this->Flash->success(__('The projeto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The projeto could not be saved. Please, try again.'));
        }
        $this->set(compact('projeto'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Projeto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projeto = $this->Projetos->get($id);
        if ($this->Projetos->delete($projeto)) {
            $this->Flash->success(__('The projeto has been deleted.'));
        } else {
            $this->Flash->error(__('The projeto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
