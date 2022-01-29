<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Table extends Component
{
    public $title;
    public $headers;
    public $rows;

    public function mount($content)
    {
        $this->title = $content['title'];
        $this->headers = $content['headers'];
        $this->rows = $content['rows'];
    }

    public function render()
    {
        return view('livewire.components.table');
    }
}
