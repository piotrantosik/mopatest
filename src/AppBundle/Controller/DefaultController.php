<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\Type\NestedFormType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/app/mopa", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(new NestedFormType());
        $form->handleRequest($request);

        dump($request->request->all());
        //die;

        return $this->render('default/index.html.twig', ['form' => $form->createView()]);
    }
}
