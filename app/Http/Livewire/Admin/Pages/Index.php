<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Page;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $paginate = 10;
    public $search;
    public $queryString = ['paginate', 'search'];
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $pages = Page::latest();

        if($this->search !== null){
            $pages = $pages->where('name', 'like', '%' . $this->search . '%');
        }
        $pages = $pages->paginate($this->paginate);

        return view('livewire.admin.pages.index', compact('pages'))->layout('layouts.master');
    }

    public function new()
    {
        return redirect()->route('page.create');
    }
}
