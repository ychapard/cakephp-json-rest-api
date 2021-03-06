<?php

// file:   ControllerWithCrudOperationsTrait.php
// date:   2016-01-16
// author: Michael Leßnau <michael.lessnau@gmail.com>

namespace Jra\Test\Dummy\Controller;

use Cake\Controller\Controller;
use Jra\Controller\Traits\CrudOperationsTrait;

class ControllerWithCrudOperationsTrait extends Controller
{
    use CrudOperationsTrait;

    /**
     * JSON REST API options.
     *
     * @var array
     */
    public $jraOptions = [
        'table' => 'Users'
    ];
}
