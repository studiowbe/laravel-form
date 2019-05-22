<?php

namespace Studiow\Form\Contracts;

use Studiow\Form\Support\Control;
use Studiow\Form\Support\Label;

interface FormControl extends Field
{
    public function label(?string $newLabel = null): Label;

    public function control(): Control;
}
