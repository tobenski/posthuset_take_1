<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Forside;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index($route = '')
    {
        switch ($route) {
            case '':
                return new Forside;
                break;

            default:
                # code...
                break;
        }

    }
}
