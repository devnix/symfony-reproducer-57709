<?php

declare(strict_types=1);

namespace App\Domain\Bar;

use App\Bus\EventInterface;

final class Bar implements EventInterface
{
    public function __construct()
    {
    }
}