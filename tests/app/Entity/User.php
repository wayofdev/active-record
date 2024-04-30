<?php

declare(strict_types=1);

namespace Cycle\App\Entity;

use Cycle\ActiveRecord\Model;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;

#[Entity(table: 'user')]
class User extends Model
{
    #[Column(type: 'bigInteger', primary: true, typecast: 'int')]
    public int $id;

    #[Column(type: 'string')]
    public string $name;

    #[BelongsTo(target: Identity::class, innerKey: 'id', outerKey: 'id', cascade: true, load: 'eager')]
    public Identity $identity;

    public function __construct(string $name, ?Identity $identity = null)
    {
        $this->name = $name;
        $this->identity = $identity ?? new Identity();
    }
}