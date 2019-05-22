<?php

namespace Studiow\Form\Support;

use Illuminate\Support\Collection;
use Studiow\Form\Support\Behaviour\HasAttributes;

class Wrapper
{
    use HasAttributes;

    public function __construct(array $attributes = [])
    {
        $this->attributes = new Collection($attributes);
    }
}
