<?php

namespace App\Http\Livewire\Admin\Attributes;

use App\Models\Attribute;
use Livewire\Component;

class Edit extends Component
{
    public Attribute $attribute;
    public $title;
    public $persian;
    public $editable;

    public function mount()
    {
        $this->title = $this->attribute->name;
        $this->persian = $this->attribute->value;
        $this->editable = $this->attribute->editable;
    }

    public function render()
    {
        return view('livewire.admin.attributes.edit')->layout('layouts.master');
    }

    public function rules(){
        return [
            'title' => 'required|between:2,90',
            'persian' => 'required|between:2,90',
            'editable' => 'required|boolean'
        ];
    }

    public function save(){
        $this->validate();

        $this->attribute->update([
            'name' => $this->title,
            'value' => $this->persian,
            'editable' => $this->editable
        ]);

        return redirect()->route('attributes')->with('success', 'ویژگی با موفقیت ویرایش شد.');
    }

    public function comeBack() {
        redirect()->route('attributes');
    }
}
