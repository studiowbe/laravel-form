<?php

namespace Studiow\Form\Elements;

use Studiow\Form\Contracts\FormControl as FormControlInterface;
use Studiow\Form\Support\Control;
use Studiow\Form\Support\Label;
use Studiow\Form\Support\Wrapper;

abstract class FormControl implements FormControlInterface
{
    private $id;
    private $label;
    private $control;
    private $wrapper;

    private $value;
    protected $view;

    public function __construct(string $id, string $label)
    {
        $this->id = $id;
        $this->label = new Label($this, $label);
        $this->control = new Control($this);
        $this->wrapper = new Wrapper(['class' => 'form-'.$this->type()]);
    }

    private function type(): string
    {
        $classname = get_called_class();

        return strtolower(substr($classname, strrpos($classname, '\\') + 1));
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function value($value)
    {
        $this->value = $value;

        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function label(?string $newLabel = null): Label
    {
        if (! is_null($newLabel)) {
            $this->label->setLabel($newLabel);
        }

        return $this->label;
    }

    public function control(): Control
    {
        return $this->control;
    }

    public function wrapper(): Wrapper
    {
        return $this->wrapper;
    }

    protected function getViewData(): array
    {
        return [
            'id' => $this->getId(),
            'control_id' => $this->getId(),
            'value' => $this->getValue(),
            'label' => $this->label()->getLabel(),
            'control_attr' => $this->control()->attributes(),
            'label_attr' => $this->label()->attributes(),
            'wrapper_attr' => $this->wrapper()->attributes(),
        ];
    }

    protected function getView(): string
    {
        return $this->view ?? 'form::field.'.$this->type();
    }

    public function readonly(bool $isReadonly = true)
    {
        $this->control()->set('readonly', $isReadonly);

        return $this;
    }

    public function render(array $options = []): string
    {
        return view($this->getView(), $this->getViewData())->with($options);
    }

    /**
     * @param string $id
     * @param string $label
     *
     * @return static
     */
    public static function create(string $id, string $label)
    {
        return new static($id, $label);
    }
}
