<?php

namespace Studiow\Form\Elements;

use DateTimeInterface;

class Date extends FormControl
{
    public function max(?DateTimeInterface $maxValue = null)
    {
        $this->control()->set(
            'max', is_null($maxValue) ? null : $maxValue->format('Y-m-d')
        );

        return $this;
    }

    public function min(?DateTimeInterface $minValue = null)
    {
        $this->control()->set(
            'min', is_null($minValue) ? null : $minValue->format('Y-m-d')
        );

        return $this;
    }
}
