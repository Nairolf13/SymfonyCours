<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Comment;
use App\Entity\Conference;
use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
       $url = $routeBuilder->setController(ConferenceCrudController::class)->generateUrl();

       return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Guestbook');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('Back to the website', 'fas fa-home', 'homepage');
        yield MenuItem::linkToCrud('Conferences', 'fas fa-map-marker-alt', Conference::class);
        yield MenuItem::linkToCrud('Comments', 'fas fa-comments', Comment::class);
        yield MenuItem::linkToCrud('Products', 'fa-solid fa-window-minimize', Product::class);
        yield MenuItem::linkToCrud('Category', 'fa-solid fa-bars', Category::class);
    }
}
