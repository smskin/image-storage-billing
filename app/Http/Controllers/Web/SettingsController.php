<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return View
     * @throws AuthorizationException
     */
    final public function index(): View
    {
        $user = auth()->user();
        $this->authorize('view',$user);

        return view('settings.account',[
            'user'=>$user
        ]);
    }

    /**
     * @return View
     * @throws AuthorizationException
     */
    final public function billing(): View
    {
        $user = auth()->user();
        $this->authorize('view',$user);

        return view('settings.billing');
    }

    /**
     * @return View
     * @throws AuthorizationException
     */
    final public function security(): View
    {
        $user = auth()->user();
        $this->authorize('view',$user);

        return view('settings.security',[
            'user'=>auth()->user()
        ]);
    }
}
