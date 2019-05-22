<?php

namespace Studiow\Form\Elements;

class Number extends FormControl
{
    public function max($maxValue)
    {
        $this->control()->set('max', $maxValue);

        return $this;
    }

    public function min($minValue)
    {
        $this->control()->set('min', $minValue);

        return $this;
    }

    public function step($step)
    {
        $this->control()->set('step', $step);

        return $this;
    }
}
