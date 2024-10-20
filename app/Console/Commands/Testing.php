<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use JetBrains\PhpStorm\NoReturn;
use Src\Domain\Actions\User\UserLoginAction;
use Src\Infrastructure\Assemblers\User\UserLoginDtoAssembler;

class Testing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:testing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    #[NoReturn] public function handle(UserLoginAction $action): void
    {
        $userLoginDto = UserLoginDtoAssembler::fromArray([
            'email' => 'test@example.com', 'password' => 'password'
        ]);

        dd($action->handle($userLoginDto));
//        dd(PasswordHash::passwordHashVerify('password', PasswordHash::hashPasswordBcrypt('password')));
    }
}
