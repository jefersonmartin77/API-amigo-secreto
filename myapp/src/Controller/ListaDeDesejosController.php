<?php

    namespace App\Controller;

    use App\Entity\ListaDesejo;
    use App\Entity\User;
    use App\Repository\ListaDesejoRepository;
    use App\Repository\UserRepository;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;

    class ListaDeDesejosController extends AbstractController
    {


        /**
         * @var ListaDesejoRepository
         */
        private $repository;
        /**
         * @var UserRepository
         */
        private $userRepository;

        public function __construct(ListaDesejoRepository $repository, UserRepository  $userRepository)
        {
            $this->repository = $repository;
            $this->userRepository = $userRepository;
        }


        /**
         * @Route("/api/lista-desejo/create/{id}")
         * @return JsonResponse
         */
        public function insert(Request $request, $id)
        {

            $user = $this->userRepository->find($id) ;

            $content = $request->getContent();
            $post = json_decode($content);

            $list = new ListaDesejo();
            $list->setNome($post->nome);
            $list->setOwner($user);
            $list->setDescricao($post->descricao);

            $this->repository->add($list, true);

            return $this->json($list);
        }

        /**
         * @Route("/api/lista-desejo/delete/{id}")
         * @return JsonResponse
         */
        public function delete($id)
        {
            $listaDesejo = $this->repository->find($id) ;

            $this->repository->remove($listaDesejo);
            return $this->json([
                'success' => true
            ]);

        }

        /**
         * @Route("/api/lista-desejo/list")
         * @return JsonResponse
         */
        public function list()
        {
            $all = $this->repository->findAll();
            return $this->json($all);
        }

        /**
         * @Route("/api/add-user")
         * @param UserRepository $userRepo
         * @param Request $request
         * @return JsonResponse
         */

        public function createUser(UserRepository $userRepo, Request $request)
        {

            $content = $request->getContent();
            $post = json_decode($content);
            $user = new User();
            $user->setNome($post->nome);
            $user->setUserName($post->userName);

            $user = $userRepo->add($user, true);

            return $this->json($user);

        }

    }
