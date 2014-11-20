<?php

namespace Is\MiniShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('IsMiniShopBundle:Default:index.html.twig', array('name' => $name));
    }
}
