<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Module title
     *
     * @var string
     */
    protected $title;

    /**
     * Module route
     *
     * @var string
     */
    protected $route;

    /**
     * Module view
     *
     * @var string
     */
    protected $view;

    /**
     * Module path
     *
     * @var string
     */
    protected $path;

    /**
     * Module access
     *
     * @var string
     */
    protected $access;
}
