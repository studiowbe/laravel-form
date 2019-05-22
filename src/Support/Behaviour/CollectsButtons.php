<?php

namespace Studiow\Form\Support\Behaviour;

use Studiow\Form\Elements\Button;

trait CollectsButtons
{
    protected $buttons = [];

    public function addButton(Button $button)
    {
        $this->buttons[$button->getId()] = $button;

        return $this;
    }

    public function hasButton(string $id): bool
    {
        return array_key_exists($id, $this->buttons);
    }

    public function button(string $id): ?Button
    {
        return $this->hasButton($id) ? $this->buttons[$id] : null;
    }

    public function buttons(): array
    {
        return $this->buttons;
    }
}
