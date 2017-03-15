<?php

namespace Duti\Bundle\Core\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DutiController extends Controller
{
    public function indexAction()
    {
        return $this->render('CoreBundle:Duti:index.html.twig');
    }
}
