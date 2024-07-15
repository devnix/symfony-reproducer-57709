<?php

declare(strict_types=1);

namespace App\Domain\Bar;

use App\Bus\EventHandlerInterface;
use App\Domain\MyException;
use Doctrine\DBAL\Connection;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

final class BarHandler implements EventHandlerInterface
{
    public function __construct(
        private Connection $connection,
    )
    {
    }

    public function __invoke(Bar $bar)
    {
        dump($this->connection->executeQuery('SELECT @@VERSION')->fetchAllAssociative());
        throw new MyException();
    }
}