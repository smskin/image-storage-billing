<?php

namespace App\Http\Controllers\WebApi;

use App\DBContext\DBContextUser;
use App\Http\Controllers\Controller;
use App\Services\UserService\Service as UserService;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Session;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->middleware('auth');

        $this->userService = $userService;
    }

    /**
     * @param Request $request
     * @param DBContextUser $user
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    final public function update(Request $request, DBContextUser $user): RedirectResponse
    {
        $this->authorize('update', $user);

        $request->validate([
            'name'=>'required',
            'email'=>[
                'required',
                'email',
                Rule::unique('users','email')->ignore(auth()->user()->id)
            ]
        ]);

        $this->userService->update(
            $user,
            $request->input('name'),
            $request->input('email')
        );

        return response()->redirectTo(route('settings'));
    }

    /**
     * @param DBContextUser $user
     * @return RedirectResponse
     * @throws Exception
     */
    final public function destroy(DBContextUser $user): RedirectResponse
    {
        $this->authorize('delete', $user);

        $this->userService->delete(
            $user
        );
        return response()->redirectTo(route('home'));
    }

    /**
     * @param Request $request
     * @param DBContextUser $user
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    final public function updatePassword(Request $request, DBContextUser $user): RedirectResponse
    {
        $this->authorize('update', $user);

        $request->validate([
            'password'=>'required|confirmed'
        ]);

        $this->userService->updatePassword(
            $user,
            $request->input('password')
        );

        return response()->redirectTo(action('Web\SettingsController@security'));
    }

    /**
     * @param DBContextUser $user
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    final public function refreshToken(DBContextUser $user): RedirectResponse
    {
        $this->authorize('update', $user);

        $token = $this->userService->refreshApiToken($user);

        flashSuccess('Api token refreshed');
        Session::flash('api-token',$token);

        return response()->redirectTo(action('Web\SettingsController@security'));
    }
}
