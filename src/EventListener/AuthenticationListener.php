<?php

    namespace App\EventListener;

    use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
    use Symfony\Component\HttpFoundation\Cookie;

    class AuthenticationListener
    {
        private $secure = false;
        private $tokenTtl;

        public function __construct($tokenTtl)
        {
            $this->tokenTtl = $tokenTtl;
        }

        public function onSuccess(AuthenticationSuccessEvent $successEvent)
        {
            $response = $successEvent->getResponse();
            $data = $successEvent->getData();

            $token = $data['token'];

            $response->headers->setCookie(
                new Cookie('BEARER', $token,
                    (new \DateTime())
                        ->add(new \DateInterval('PT' . $this->tokenTtl . 'S'))
                ), '/', null, $this->secure
            );
        }
    }