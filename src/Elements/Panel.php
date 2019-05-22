<?php

namespace Studiow\Form\Elements;

use Studiow\Form\Contracts\Field;
use Studiow\Form\Support\Behaviour\CollectsFields;
use Studiow\Form\Support\Behaviour\HasAttributes;

class Panel implements Field
{
    use CollectsFields, HasAttributes;

    private $id;
    private $title;
    private $description;

    public function __construct(string $id, array $fields = [])
    {
        $this->id = $id;
        array_map([$this, 'addField'], $fields);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function title(string $title)
    {
        $this->title = $title;

        return $this;
    }

    public function description(string $description)
    {
        $this->description = $description;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getView(): string
    {
        return $this->view ?? 'form::panel';
    }

    protected function getViewData(): array
    {
        return ['panel' => $this];
    }

    public function render(array $options = []): string
    {
        return view($this->getView(), $this->getViewData())->with($options);
    }

    /**
     * @param string $id
     * @param array  $fields
     *
     * @return static
     */
    public static function create(string $id, array $fields = [])
    {
        return new static($id, $fields);
    }
}
