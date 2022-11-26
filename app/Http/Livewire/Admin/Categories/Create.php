<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class Create extends Component
{
    public $attribute_id;
    public $value;

    public function render()
    {
        return view('livewire.admin.categories.create')->layout('layouts.master');
    }

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function rules()
    {
        return [
            'attribute_id' => 'required|exists:attributes,id',
            'value' => 'required|between:2,90'
        ];
    }

    public function save() {
        $this->validate();

        Category::create([
            'attribute_id' => $this->attribute_id,
            'value' => $this->value,
        ]);

        return redirect()->route('categories')->with('success', 'دسته بندی با موفقیت ذخیره شد.');
    }

    public function comeBack() {
        redirect()->route('categories');
    }
}
