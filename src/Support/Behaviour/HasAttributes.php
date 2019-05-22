<?php

namespace Studiow\Form\Support\Behaviour;

use Illuminate\Support\Collection;

trait HasAttributes
{
    /**
     * @var Collection
     */
    private $attributes;

    protected $preventExport = [];

    protected function getPreventExport(): array
    {
        return $this->preventExport;
    }

    protected function attributesCollection(): Collection
    {
        return $this->attributes = $this->attributes ?? new Collection();
    }

    public function set($attribute, $value = null)
    {
        if (is_array($attribute)) {
            foreach ($attribute as $k => $v) {
                $this->set($k, $v);
            }
        }
        $this->attributesCollection()->offsetSet($attribute, $value);

        return $this;
    }

    public function get(string $attribute, $default = null)
    {
        return $this->attributesCollection()->get($attribute, $default);
    }

    public function remove($attribute)
    {
        if (is_array($attribute)) {
            array_map([$this, 'remove'], $attribute);
        }

        $this->attributesCollection()->offsetUnset($attribute);

        return $this;
    }

    public function attributes(): array
    {
        return $this->attributesCollection()->except($this->getPreventExport())->all();
    }

    private function getClasses(): array
    {
        return explode(' ', $this->attributesCollection()->get('class', ''));
    }

    private function setClasses(array $classnames)
    {
        $this->attributesCollection()->offsetSet('class', implode(' ', array_unique($classnames)));

        return $this;
    }

    public function addClass(string $classname)
    {
        $classes = $this->getClasses();
        $classes[] = $classname;

        return $this->setClasses($classes);
    }

    public function removeClass(string $classname)
    {
        $this->setClasses(
            array_diff($this->getClasses(), [$classname])
        );
    }
}
