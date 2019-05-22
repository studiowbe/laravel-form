<?php

namespace Studiow\Form\Elements;

use Collective\Html\FormFacade;
use Studiow\Form\Contracts\Field;

class Hidden implements Field
{
    private $id;
    private $value;

    public function __construct(string $id, string $value = null)
    {
        $this->id = $id;
        $this->value = $value;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function render(array $options = []): string
    {
        return sprintf('<input type="hidden" name="%s" value="%s">',$this->id, $this->value);
    }

    public static function create(string $id, string $value = null)
    {
        return new static($id, $value);
    }
}
