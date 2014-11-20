<?php

namespace Is\MiniShopBundle\Controller;

use Is\MiniShopBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class IndexController extends Controller
{
    /**
     * @Template()
     * @Route("/")
     * @Method({"GET"})
     */
    public function indexAction()
    {
        $stores = $this->getDoctrine()->getManager()->getRepository('IsMiniShopBundle:Store')->findAll();
        var_dump('h');
        return ['stores' => $stores];
    }
}
