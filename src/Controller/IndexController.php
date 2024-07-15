<?php

namespace App\Controller;

use App\Bus\CommandBus;
use App\Domain\Foo\Foo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{

    public function __construct(private CommandBus $commandBus)
    {
    }

    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        dump('pre');
        $this->commandBus->dispatch(new Foo());
        dump('post');

        return new Response('<html><body></body></html>');
    }
}
