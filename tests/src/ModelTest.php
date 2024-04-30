<?php

declare(strict_types=1);

namespace Cycle\Tests;

use Cycle\App\Entity\User;
use PHPUnit\Framework\Attributes\Test;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

final class ModelTest extends DatabaseTestCase
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[Test]
    public function it_finds_one_entity(): void
    {
        $user = User::findOne(['id' => 1]);
        $this->assertNotNull($user);
        $this->assertSame('Antony', $user->name);

        $user = User::findOne(['name' => 'John']);
        $this->assertNotNull($user);
        $this->assertSame(2, $user->id);
    }
}