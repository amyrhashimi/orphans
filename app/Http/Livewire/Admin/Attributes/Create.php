<?php

namespace App\Http\Livewire\Admin\Attributes;

use App\Models\Attribute;
use Livewire\Component;

class Create extends Component
{
    public $title;
    public $persian;
    public $editable;
    public $status;

    public function render()
    {
        return view('livewire.admin.attributes.create')->layout('layouts.master');
    }

    public function rules(){
        return [
            'title' => 'required|between:2,90',
            'persian' => 'required|between:2,90',
            'editable' => 'required|boolean',
            'status' => 'nullable'
        ];
    }

    public function save(){
        $this->validate();

        Attribute::create([
            'name' => $this->title,
            'value' => $this->persian,
            'editable' => $this->editable,
            'status' => $this->status
        ]);

        return redirect()->route('attributes')->with('success', 'ویژگی با موفقیت ذخیره شد.');
    }

    public function comeBack() {
        redirect()->route('attributes');
    }
}
