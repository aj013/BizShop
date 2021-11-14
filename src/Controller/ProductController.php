<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProductType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

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
    public function add(Request $request, EntityManagerInterface $emi)
    {
        $product = new Product();

        $form  = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
          
            $emi->persist($product);
            $emi->flush();
            $this->addFlash('success', 'succesfully added ' . $product->getName());
            return $this->redirectToRoute('product.index');
        } else {
            return $this->redirectToRoute('product.index');
        }
    }
}
