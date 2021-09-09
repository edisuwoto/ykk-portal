<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;

class PageContent extends Component
{
    public $readyToLoad = FALSE;

    public $showFlashMessage = FALSE;

    public $flashMessages = [];

    public $content;

    public function loadPage()
    {
        $this->readyToLoad = TRUE;
    }
    
    public function receiveFlashMessage($type, $messages)
    {
        session()->flash($type, $messages);
    }

    public function clearFlashMessage()
    {
        $this->showFlashMessage = FALSE;
        $this->flashMessages    = [];
    }

    protected function generateMessages()
    {
        $sessions = ['success', 'warning', 'failed', 'info'];
        $colors   = ['green', 'yellow', 'red', 'blue'];

        foreach ($sessions as $key => $session) {
            if (session()->has($session)) {
                $this->showFlashMessage = TRUE;
                $this->flashMessages[] = [
                    'show'      => 'true',
                    'messages'  => session($session),
                    'color'     => $colors[$key],
                ];
            }
        }
    }

    public function render()
    {
        $this->generateMessages();

        return view('livewire.layouts.page-content');
    }
}
