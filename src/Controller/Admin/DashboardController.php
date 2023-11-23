<?php

namespace App\Controller\Admin;


use App\Entity\Cars;
use App\Entity\User;
use App\Entity\Brand;

use App\Entity\Header;
use App\Entity\Models;
use App\Entity\Garages;
use App\Entity\Services;
use App\Entity\Schedules;
use App\Entity\Testimonials;
use App\Controller\Admin\UserCrudController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{

    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
        ){
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response{
        $url = $this->adminUrlGenerator
            ->setController(UserCrudController::class)
            ->generateUrl();
            return $this->redirect($url);
    }


    public function configureDashboard(): Dashboard{
        return Dashboard::new()
            ->setTitle('Administration');
            //->setFaviconPath('/assets/img/Logo.webp');
            //->renderContentMaximized();
    }


    public function configureMenuItems(): iterable{
        yield MenuItem::linkToDashboard('Accueil', 'fa fa-home');
        yield MenuItem::section('Annonces');
        yield MenuItem::linkToCrud('Gérer les modeles', 'fa-solid fa-pen', Models::class);
        yield MenuItem::linkToCrud('Gérer les voitures', 'fa-solid fa-car', Cars::class);

        yield MenuItem::linkToCrud('Gérer les marques', 'fa-solid fa-image', Brand::class);
        yield MenuItem::linkToCrud('Gérer les avis clients', 'fa-solid fa-star', Testimonials::class);

        //if ($this->isGranted('ROLE_ADMIN')) {
        yield MenuItem::section('Section Admin');
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Gérer les horaires', 'fas fa-clock', Schedules::class);
        yield MenuItem::linkToCrud('Gérer les garages', 'fas fa-city', Garages::class);
        yield MenuItem::linkToCrud('Gérer les services', 'fa-solid fa-handshake', Services::class);
        yield MenuItem::linkToCrud('Headers', 'fas fa-desktop', Header::class);
        //}
    }
}
