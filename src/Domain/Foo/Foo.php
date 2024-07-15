<?php

declare(strict_types=1);

namespace App\Domain\Foo;


use App\Bus\CommandInterface;

final class Foo implements CommandInterface
{
    public function __construct()
    {
    }
}