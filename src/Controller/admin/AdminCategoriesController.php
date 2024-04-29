<?php

namespace App\Controller\admin;

use App\Entity\Categorie;
use App\Entity\Formation;
use App\Repository\CategorieRepository;
use App\Repository\FormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Contrôleur des catégories partie admin
 *
 * @author Titi L
 */
class AdminCategoriesController extends AbstractController {

    const TEMPLATE_CATEGORIES = "admin/admin.categories.html.twig";

    /**
     * 
     * @var CategorieRepository
     */
    private $categorieRepository;

    function __construct(CategorieRepository $categorieRepository) {
        $this->categorieRepository = $categorieRepository;
    }

    /**
     * @Route("/admin/categories", name="admin.categories")
     * @return Response
     */
    function index(): Response {
        $categories = $this->categorieRepository->findAll();
        return $this->render(self::TEMPLATE_CATEGORIES, [
                    'categories' => $categories
        ]);
    }

    /**
     * @Route("/admin/categorie/ajout", name="admin.categorie.ajout")
     * @param Request $request
     * @return Response
     */
    public function ajout(Request $request): Response {
        if ($this->isCsrfTokenValid('form_ajout_categorie', $request->get('_token'))) {
            $nomCategorie = $request->get("nom");
            $nomExistant = $this->categorieRepository->findByName($nomCategorie);
            if (empty($nomExistant)) {
                $categorie = new Categorie();
                $categorie->setName($nomCategorie);
                $this->categorieRepository->add($categorie, true);
            } else {
                $this->addFlash('danger', "Impossible d'ajouter une catégorie qui existe déjà");
            }
        }
        return $this->redirectToRoute('admin.categories');
    }

    /**
     * @Route("/admin/categorie/suppr/{id}", name="admin.categorie.suppr")
     * @param Categorie $categorie
     * @return Response
     */
    public function suppr(Categorie $categorie): Response {
        if ($categorie->getFormations()->isEmpty()) {
            $this->categorieRepository->remove($categorie, true);
        } else {
            $this->addFlash('danger', 'Impossible de supprimer une catégorie appartenant à une ou des formations');
        }
        return $this->redirectToRoute('admin.categories');
    }

}