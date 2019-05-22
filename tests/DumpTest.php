<?php

namespace Studiow\Form\Test;

use Collective\Html\HtmlServiceProvider;
use Orchestra\Testbench\TestCase;
use Studiow\Form\Elements\Button;
use Studiow\Form\Elements\Date;
use Studiow\Form\Elements\Email;
use Studiow\Form\Elements\Hidden;
use Studiow\Form\Elements\Number;
use Studiow\Form\Elements\Text;
use Studiow\Form\Form;
use Studiow\Form\FormServiceProvider;

class DumpTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            HtmlServiceProvider::class,
            FormServiceProvider::class,
        ];
    }

    public function testDump()
    {
        app('view')->addLocation(__DIR__.'/../views');

        $form = new Form(
            [
                new Text('name', 'Name'),
               // Hidden::create('a', 'b') ,

                Email::create('email', 'E-mail')->value('test'),

            ], [
            new Button('save', 'Save'),
        ]);

        echo $form->set('class', 'form')->render();
    }
}
