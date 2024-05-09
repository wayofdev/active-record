<?php

declare(strict_types=1);

namespace Cycle\ActiveRecord\Query;

use Cycle\ActiveRecord\Facade;
use Cycle\ORM\ORMInterface;
use Cycle\ORM\Select;

/**
 * @template-covariant TEntity of object
 *
 * @extends Select<TEntity>
 */
class ActiveQuery extends Select
{
    protected ORMInterface $orm;

    /**
     * @param class-string<TEntity> $class
     */
    final public function __construct(protected string $class)
    {
        $this->orm = Facade::getOrm();

        parent::__construct($this->orm, $class);
    }
}
