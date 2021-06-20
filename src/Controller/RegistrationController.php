<?php

    namespace App\Controller;

    use App\Entity\User;
    use App\Repository\UserRepository;
    use FOS\RestBundle\Context\Context;
    use FOS\RestBundle\Controller\AbstractFOSRestController;
    use FOS\RestBundle\Controller\Annotations as Rest;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

    class RegistrationController extends AbstractFOSRestController
    {
        /**
         * @var UserRepository
         */
        private $userRepository;
        /**
         * @var UserPasswordEncoderInterface
         */
        private $encoder;

        public function __construct(UserRepository $userRepository, UserPasswordEncoderInterface $encoder)
        {
            $this->userRepository = $userRepository;
            $this->encoder = $encoder;
        }

        /**
         * @Route("/register", name="register")
         */
        public function register(Request $request)
        {
            $password = $request->get('password');
            $email = $request->get('email');

            $user = $this->userRepository->findOneBy([
                'email' => $email
            ]);

            if (!is_null($user)) {
                return $this->view([
                    'message' => 'Ops, esse usuário já está cadastrado!'
                ], Response::HTTP_CONFLICT);
            }

            $user = new User();
            $user->setEmail($email);
            $user->setPassword($this->encoder->encodePassword($user, $password));
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->view($user, Response::HTTP_CREATED)->setContext((new Context())->setGroups(['public']));
        }
    }
