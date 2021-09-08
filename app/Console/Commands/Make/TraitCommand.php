<?php

namespace App\Console\Commands\Make;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Facades\File;

class TraitCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:trait';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Traits';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Traits';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/traits.stub';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the trait file'],
        ];
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Http\\Traits';
    }

    /**
     * Calls the right parent method depending on laravel version.
     * Adds support for Laravel v5.4.
     *
     * @return void
     */
    protected function handleParentMethodCall()
    {
        if (!is_callable('parent::handle')) {
            return parent::fire();
        }

        return parent::handle();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->handleParentMethodCall();
    }
}
