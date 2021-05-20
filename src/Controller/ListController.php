<?php

    namespace App\Controller;

    use FOS\RestBundle\Controller\AbstractFOSRestController;
    use FOS\RestBundle\Controller\Annotations as Rest;

    class ListController extends AbstractFOSRestController
    {
        /**
         * @Rest\Get("/api/list")
         */
        public function getListAction()
        {
            return $this->json([
                'message' => 'uma lista'
            ]);
        }
    }
