<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Category;
use App\Models\Page;
use Livewire\Component;

class Create extends Component
{
    public $title;
    public $attribute;
    public $value;
    public $desc;

    public $values;
    public $selects = [];


    protected $rules = [
        'title' => 'required',
        'attribute' => 'required|exists:attributes,id',
        'value' => 'required|exists:categories,id',
        'desc' => 'nullable|between:3,100',
        'selects' => 'required',
    ];

    public function render()
    {
        return view('livewire.admin.pages.create')->layout('layouts.master');
    }

    public function setAttribute($event)
    {
        $this->attribute = $event;
        $this->values = Category::where('attribute_id', $event)->get();
    }

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function save()
    {
        $this->validate();

        $page = Page::create([
            'title' => $this->title,
            'attribute_id' => $this->attribute,
            'value' => $this->value,
            'desc' => $this->desc,
        ]);

        $page->attributes()->attach($this->selects);

        dd('Ok');

    }
}
