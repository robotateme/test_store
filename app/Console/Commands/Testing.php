<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Src\Application\Dto\User\Request\UserLoginDto;
use Src\Core\Hydrator\Exceptions\HydratorException;
use Src\Core\Hydrator\Hydrator;

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
    public function handle(): void
    {
        try {
            $dto = Hydrator::hydrate(UserLoginDto::class, ['email' => 'test@mail.ru', 'password' => '123456']);
            dd($dto);
        } catch (HydratorException $e) {
            $this->error($e->getMessage());
        }
    }
}
