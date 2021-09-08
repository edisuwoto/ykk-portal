<?php

namespace App\Console\Commands\Make;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Facades\File;

class LivewireDatatableCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:livewire-datatable';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new Livewire Datatable, Components, and Views with Rappasoft Presets';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/livewire-datatable.stub';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the datatable file'],
            ['model', InputArgument::OPTIONAL, 'The model of the datatable file'],
        ];
    }

    /**
     * Qualifies the class name by delegating to the right parent method.
     *
     * @param string $name
     *
     * @return string
     */
    protected function qualifyClass($name)
    {
        if (!is_callable('parent::qualifyClass')) {
            return parent::parseName($name);
        }

        return parent::qualifyClass($name);
    }

    /**
     * Ensure diretory exists.
     *
     * @param string $name
     *
     * @return string
     */
    protected function ensureDirectoryExists($path)
    {
        if (! File::isDirectory(dirname($path))) {
            File::makeDirectory(dirname($path), 0777, $recursive = true, $force = true);
        }
    }

    /**
     * Define class content and making Livewire Component
     *
     * @param string $name
     *
     * @return string
     */
    protected function classContents($namespace, $className, $model)
    {
        $stubName = 'livewire-datatable.stub';

        if(File::exists($stubPath = $this->getStub())) {
            $template = file_get_contents($stubPath);
        } else {
            $template = file_get_contents(__DIR__.DIRECTORY_SEPARATOR.$stubName);
        }

        $useModel = ($model ? 'use '.$model.';' : '');
        $queryModel = ($model ? 'return '.last(explode('\\', $model)).'::query();' : '');

        return preg_replace_array(
            ['/\[namespace\]/', '/\[class\]/', '/\[use_model\]/', '/\[query_model\]/'],
            [$namespace, $className, $useModel, $queryModel],
            $template
        );
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->qualifyClass($this->getNameInput());
        $model = $this->argument('model') ? $this->qualifyModel($this->argument('model')) : false;
        $path = $this->getPath($name);

        $parser = new \Livewire\Commands\ComponentParser(
            config('livewire.class_namespace'),
            config('livewire.view_path'),
            str_replace('App\\', '', $name),
        );

        $this->ensureDirectoryExists($parser->classPath());
        File::put($parser->classPath(), $this->classContents($parser->classNamespace(), $parser->className(), $model));

        $this->info('Livewire Datatable component created! - Location: '.$parser->classPath());
    }
}
