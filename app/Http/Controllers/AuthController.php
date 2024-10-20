<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use Auth;
use Illuminate\Http\RedirectResponse;
use Source\Domain\Actions\Exceptions\NotFoundException;
use Source\Domain\Actions\User\Contracts\UserLoginActionInterface;
use Source\Domain\Actions\User\UserLoginAction;
use Source\Domain\Dto\User\Response\UserLoginResultDto;
use Source\Infrastructure\Assemblers\User\UserLoginDtoAssembler;

class AuthController extends Controller
{
    /**
     * @param  UserLoginRequest  $request
     * @param  UserLoginAction  $userLoginAction
     * @return RedirectResponse
     */
    public function login(UserLoginRequest $request, UserLoginActionInterface $userLoginAction): RedirectResponse
    {
        $userLoginDto = UserLoginDtoAssembler::fromArray($request->validated());
        try {
            $userLoginResultDto = $userLoginAction->handle($userLoginDto);
            /** @var UserLoginResultDto $userLoginResultDto */
            if ($userLoginResultDto->success) {
                Auth::loginUsingId($userLoginResultDto->userId);
                return redirect('/')->with('auth.success', 'You have successfully logged in to the site');
            }
        } catch (NotFoundException) {
            return redirect('login')->with('auth.fail', 'User not found!');
        }

        return redirect('login')->with('auth.fail', "Incorrect login or password!");
    }
}
