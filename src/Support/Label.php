<?php

namespace Studiow\Form\Support;

use Illuminate\Support\Collection;
use Studiow\Form\Contracts\HasId;
use Studiow\Form\Support\Behaviour\HasAttributes;

class Label
{
    use HasAttributes;

    private $field;
    private $label;

    public function __construct(HasId $field, string $label, array $attributes = [])
    {
        $this->field = $field;
        $this->attributes = new Collection($attributes);
        $this->setLabel($label);
    }

    public function setLabel(string $label)
    {
        $this->label = $label;

        return $this;
    }

    public function getLabel()
    {
        return $this->label;
    }
}
