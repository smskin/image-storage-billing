<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    final public function index(): Renderable
    {
        return view('welcome');
    }
}
