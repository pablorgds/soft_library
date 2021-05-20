<?php

    namespace App\Controller;

    use App\Entity\User;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

    class RegistrationController extends AbstractController
    {
        /**
         * @Route("/register", name="register", methods={"POST"})
         */
        public function register(Request $request, UserPasswordEncoderInterface $encoder)
        {
            $password = $request->get('password');
            $email = $request->get('email');
            $user = new User();
            $user->setPassword($encoder->encodePassword($user, $password));
            $user->setEmail($email);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->json([
                'user' => $user->getEmail()
            ]);
        }
    }
