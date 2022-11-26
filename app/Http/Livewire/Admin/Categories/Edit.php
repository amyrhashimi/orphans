<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class Edit extends Component
{
    public Category $category;
    public $attribute_id;
    public $value;

    public function mount()
    {
        $this->attribute_id = $this->category->attribute_id;
        $this->value = $this->category->value;
    }

    public function updated($name){
        $this->validateOnly($name);
    }

    public function rules() {
        return [
            'attribute_id' => 'required|exists:attributes,id',
            'value' => 'required|between:2,90'
        ];
    }

    public function render()
    {
        return view('livewire.admin.categories.edit')->layout('layouts.master');
    }

    public function save(){
        $this->validate();

        $this->category->update([
            'attribute_id' => $this->attribute_id,
            'value' => $this->value
        ]);

        return redirect()->route('categories')->with('success', 'دسته بندی با موفقیت ویرایش شد.');
    }

    public function comeBack() {
        redirect()->route('categories');
    }
}
