<?php

namespace Studiow\Form\Contracts;

interface Renderable
{
    public function render(array $options = []): string;
}
