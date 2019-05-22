<?php

namespace Studiow\Form\Elements;

use Collective\Html\FormFacade;
use Illuminate\Support\Collection;
use Studiow\Form\Contracts\HasId;
use Studiow\Form\Contracts\Renderable;
use Studiow\Form\Support\Behaviour\HasAttributes;

class Button implements HasId, Renderable
{
    use HasAttributes;
    private $id;
    private $label;

    public function __construct(string $id, string $label, array $attributes = [])
    {
        $this->id = $id;
        $this->label = $label;
        $this->attributes = new Collection($attributes);

        $this->set('type', $this->get('type', 'submit'));
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function label(string $label)
    {
        $this->label = $label;

        return $this;
    }

    public function primary(bool $isPrimary = true)
    {
        if ($isPrimary) {
            $this->addClass('btn-primary');
        } else {
            $this->removeClass('btn-primary');
        }

        return $this;
    }

    public function submit(bool $isSubmit = true)
    {
        $this->set('type', $isSubmit ? 'submit' : 'button');

        return $this;
    }

    public function render(array $options = []): string
    {
        return FormFacade::button($this->label, $this->attributes());
    }

    public static function create(string $id, string $label, array $attributes = [])
    {
        return new static($id, $label, $attributes);
    }
}
