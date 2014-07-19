<?php

namespace Bearwolf\Bundle\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BearwolfUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
