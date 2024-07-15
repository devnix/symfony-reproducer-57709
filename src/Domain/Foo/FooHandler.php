<?php

declare(strict_types=1);

namespace App\Domain\Foo;

use App\Domain\Bar\Bar;
use App\Domain\MyException;
use Doctrine\DBAL\Connection;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsMessageHandler]
final class FooHandler
{
    public function __construct(
        private Connection $connection,
        private MessageBusInterface $messageBus,
    )
    {
    }

    public function __invoke(Foo $foo): void
    {
        $this->connection->executeQuery('SELECT @@VERSION');

        try {
            $this->messageBus->dispatch(new Bar());
        } catch (MyException $e) {
        }
    }
}