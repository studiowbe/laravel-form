<?php

namespace Studiow\Form\Support\Behaviour;

use Studiow\Form\Contracts\Field;

trait CollectsFields
{
    protected $fields = [];

    public function addField(Field $field)
    {
        $this->fields[$field->getId()] = $field;

        return $this;
    }

    public function hasField(string $id): bool
    {
        return array_key_exists($id, $this->fields);
    }

    public function field(string $id): ?Field
    {
        return $this->hasField($id) ? $this->fields[$id] : null;
    }

    public function fields(): array
    {
        return $this->fields;
    }
}
