<?php

namespace Studiow\Form\Elements;

class Select extends FormControl
{
    private $options = [];

    protected $view = 'form::field.select';
    protected $wrapper_class = 'form-select';

    public function __construct(string $id, string $label, array $options = [])
    {
        parent::__construct($id, $label);
        $this->options($options);
    }

    public function options(array $options)
    {
        $this->options = $options;

        return $this;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    protected function getViewData(): array
    {
        $data = parent::getViewData();
        $data['options'] = $this->options;

        return $data;
    }

    public static function create(string $id, string $label, array $options = [])
    {
        return new static($id, $label, $options);
    }
}
