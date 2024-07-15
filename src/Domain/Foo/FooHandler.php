<?php

declare(strict_types=1);

namespace App\Domain\Foo;

use App\Bus\CommandBus;
use App\Bus\CommandHandlerInterface;
use App\Bus\EventBus;
use App\Domain\Bar\Bar;
use App\Domain\MyException;
use Doctrine\DBAL\Connection;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\MessageBusInterface;

final class FooHandler implements CommandHandlerInterface
{
    public function __construct(
        private Connection $connection,
        private EventBus   $eventBus,
    )
    {
    }

    public function __invoke(Foo $foo): void
    {
        $this->connection->executeQuery('SELECT @@VERSION');

        try {
            $this->eventBus->dispatch(new Bar());
        } catch (MyException $e) {
        }
    }
}