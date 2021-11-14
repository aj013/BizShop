<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProductType;
/**
 * @Route("/product", name="product")
 */
class ProductController extends AbstractController
{
    /**
     * @Route("/", name=".index")
     */
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    /**
     * @Route("/create", name=".create")
     * 
     */
    public function create(): Response
    {

        $form = $this->createForm(ProductType::class);
        return $this->render('product/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/add", name=".add")
     * 
     */
    public function add(Request $request)
    {
        $product = new Product();
        $em = $this->getrDoctrine->getManager();
        
        return $this->render('product/create.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
}
