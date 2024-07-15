<?php

namespace App\Controller;

use App\Domain\Foo\Foo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{

    public function __construct(private MessageBusInterface $messageBus)
    {
    }

    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        dump('pre');
        $this->messageBus->dispatch(new Foo());
        dump('post');

        return new Response('<html><body></body></html>');
    }
}
