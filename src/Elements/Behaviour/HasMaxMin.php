<?php

namespace Studiow\Form\Elements\Behaviour;

trait HasMaxMin
{
    public function min($minValue)
    {
        $this->control()->set('max', $minValue);
    }

    public function max($maxValue)
    {
        $this->control()->set('max', $maxValue);
    }
}
