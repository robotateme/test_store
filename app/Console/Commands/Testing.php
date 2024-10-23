<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use JetBrains\PhpStorm\NoReturn;
use Source\Domain\ValueObjects\OrderNumberValue;

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
    #[NoReturn] public function handle(): void
    {
        report(new \Exception('Test'));
    }
}
