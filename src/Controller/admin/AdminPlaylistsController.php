<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controller\admin;

use App\Entity\Playlist;
use App\Form\PlaylistType;
use App\Repository\CategorieRepository;
use App\Repository\FormationRepository;
use App\Repository\PlaylistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Contrôleur des playlists partie admin
 *
 * @author Titi L
 */
class AdminPlaylistsController extends AbstractController {

    const TEMPLATE_PLAYLISTS = "admin/admin.playlists.html.twig";
    const ROUTE_PLAYLISTS = "admin.playlists";

    /**
     * 
     * @var PlaylistRepository
     */
    private $playlistRepository;

    /**
     * 
     * @var FormationRepository
     */
    private $formationRepository;

    /**
     * 
     * @var CategorieRepository
     */
    private $categorieRepository;

    function __construct(PlaylistRepository $playlistRepository,
            CategorieRepository $categorieRepository,
            FormationRepository $formationRespository) {
        $this->playlistRepository = $playlistRepository;
        $this->categorieRepository = $categorieRepository;
        $this->formationRepository = $formationRespository;
    }

    /**
     * @Route("/admin/playlists", name="admin.playlists")
     * @return Response
     */
    public function index(): Response {
        $playlists = $this->playlistRepository->findAllOrderByName('ASC');
        $categories = $this->categorieRepository->findAll();
        return $this->render(self::TEMPLATE_PLAYLISTS, [
                    'playlists' => $playlists,
                    'categories' => $categories
        ]);
    }

    /**
     * @Route("/admin/playlists/tri/{champ}/{ordre}/{table}", name="admin.playlists.sort")
     * @param type $champ
     * @param type $ordre
     * @param type $table
     * @return Response
     */
    public function sort($champ, $ordre, $table = ""): Response {
        if ($champ === "name") {
            $playlists = $this->playlistRepository->findAllOrderByName($ordre);
        }
        if ($champ === "number") {
            $playlists = $this->playlistRepository->findAllOrderByNumber($ordre);
        }
        $categories = $this->categorieRepository->findAll();
        return $this->render(self::TEMPLATE_PLAYLISTS, [
                    'playlists' => $playlists,
                    'categories' => $categories
        ]);
    }

    /**
     * @Route("/admin/playlists/recherche/{champ}/{table}", name="admin.playlists.findallcontain")
     * @param type $champ
     * @param Request $request
     * @param type $table
     * @return Response
     */
    public function findAllContain($champ, Request $request, $table = ""): Response {
        if ($table === "playlists") {
            if ($this->isCsrfTokenValid('filtre_' . $champ, $request->get('_token'))) {
                $valeur = $request->get("recherche");
                $playlists = $this->playlistRepository->findByContainValue($champ, $valeur, $table);
                $categories = $this->categorieRepository->findAll();
                return $this->render(self::TEMPLATE_PLAYLISTS, [
                            'playlists' => $playlists,
                            'categories' => $categories,
                            'valeur' => $valeur,
                            'table' => $table
                ]);
            }
        } else {
            $valeur = $request->get("recherche");
            $playlists = $this->playlistRepository->findByContainValue($champ, $valeur, $table);
            $categories = $this->categorieRepository->findAll();
            return $this->render(self::TEMPLATE_PLAYLISTS, [
                        'playlists' => $playlists,
                        'categories' => $categories,
                        'valeur' => $valeur,
                        'table' => $table
            ]);
        }
        return $this->redirectToRoute(self::ROUTE_PLAYLISTS);
    }

    /**
     * @Route("/admin/playlist/modif/{id}", name="admin.playlist.modif")
     * @param Playlist $playlist
     * @param Request $request
     * @return Response
     */
    public function edit(Playlist $playlist, Request $request): Response {
        $playlistFormations = $this->formationRepository->findAllForOnePlaylist($playlist);
        $formPlaylist = $this->createForm(PlaylistType::class, $playlist);

        $formPlaylist->handleRequest($request);
        if ($formPlaylist->isSubmitted() && $formPlaylist->isValid()) {
            $this->playlistRepository->add($playlist, true);
            return $this->redirectToRoute(self::ROUTE_PLAYLISTS);
        }

        return $this->render("admin/adminplaylistmodif.html.twig", [
                    'playlist' => $playlist,
                    'playlistformations' => $playlistFormations,
                    'formplaylist' => $formPlaylist->createView()
        ]);
    }

    /**
     * @Route("/admin/playlist/ajout", name="admin.playlist.ajout")
     * @param Playlist $playlist
     * @param Request $request
     * @return Response
     */
    public function ajout(Request $request): Response {
        $playlist = new Playlist();
        $formPlaylist = $this->createForm(PlaylistType::class, $playlist);

        $formPlaylist->handleRequest($request);
        if ($formPlaylist->isSubmitted() && $formPlaylist->isValid()) {
            $this->playlistRepository->add($playlist, true);
            return $this->redirectToRoute(self::ROUTE_PLAYLISTS);
        }

        return $this->render("admin/adminplaylistajout.html.twig", [
                    'playlist' => $playlist,
                    'formplaylist' => $formPlaylist->createView()
        ]);
    }

    /**
     * @Route("admin/playlist/suppr/{id}", name="admin.playlist.suppr")
     * @param Playlist $playlist
     * @return Response
     */
    public function suppr(Playlist $playlist): Response {
        $playlistFormations = $this->formationRepository->findAllForOnePlaylist($playlist);
        if (count($playlistFormations) > 0) {
            $this->addFlash('danger', 'Impossible de supprimer une playlist contenant des formations');
        } else {
            $this->playlistRepository->remove($playlist, true);
        }
            return $this->redirectToRoute(self::ROUTE_PLAYLISTS);
        }

}