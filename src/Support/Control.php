<?php

namespace Studiow\Form\Support;

use Illuminate\Support\Collection;
use Studiow\Form\Contracts\HasId;
use Studiow\Form\Support\Behaviour\HasAttributes;

class Control
{
    use HasAttributes;

    public function __construct(HasId $field, array $attributes = [])
    {
        $this->field = $field;
        $this->attributes = new Collection($attributes);
    }
}
