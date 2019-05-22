<?php

namespace Studiow\Form;

use Collective\Html\FormFacade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Studiow\Form\Contracts\Renderable;
use Studiow\Form\Support\Behaviour\CollectsButtons;
use Studiow\Form\Support\Behaviour\CollectsFields;
use Studiow\Form\Support\Behaviour\HasAttributes;

class Form implements Renderable
{
    use CollectsFields, CollectsButtons, HasAttributes;

    private $model;
    protected $view;

    public function __construct(array $fields = [], array $buttons = [], array $attributes = [])
    {
        array_map([$this, 'addField'], $fields);
        array_map([$this, 'addButton'], $buttons);
        $this->attributes = new Collection($attributes);
    }

    public function bind(?Model $model = null)
    {
        $this->model = $model;

        return $this;
    }

    public function open(): string
    {
        if (! is_null($this->model)) {
            return FormFacade::model($this->model, $this->attributes());
        }

        return FormFacade::open($this->attributes());
    }

    public function close()
    {
        return FormFacade::close();
    }

    public function getView(): string
    {
        return $this->view ?? 'form::form';
    }

    protected function getViewData(): array
    {
        return ['form' => $this];
    }

    public function render(array $options = []): string
    {
        return view($this->getView(), $this->getViewData())->with($options);
    }
}
