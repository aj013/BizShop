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
     * @Route("/add", name=".add" , methods={"POST","HEAD"})
     */
    public function add(Request $request)
    {

        $product = new Product();
        $product->setName($request->get('prod_name'));
        $product->setDescription($request->get('prod_desc'));
        $product->setPrice($request->get('prod_price'));
        $product->setQuantity($request->get('prod_qty'));


        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();
        $this->addFlash('success', 'succesfully added ' . $product->getName());


        return $this->redirect('product.index');
    }
}
