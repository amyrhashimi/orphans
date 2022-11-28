<?php

namespace App\Http\Livewire\Admin\Attributes;

use App\Models\Attribute;
use App\Models\Category;
use Livewire\Component;

class Edit extends Component
{
    public Attribute $attribute;
    public $title;
    public $persian;
    public $editable;
    public $status;

    public $category;

    public function mount()
    {
        $this->title = $this->attribute->name;
        $this->persian = $this->attribute->value;
        $this->editable = $this->attribute->editable;
        $this->status = $this->attribute->status;

        $this->category = Category::where('attribute_id', $this->attribute->id)->get();

        dd( $this->category );
    }


    public function render()
    {
        return view('livewire.admin.attributes.edit')->layout('layouts.master');
    }

    public function rules(){
        return [
            'title' => 'required|between:2,90',
            'persian' => 'required|between:2,90',
            'editable' => 'required|boolean',
            'status' => 'nullable',

            'category.*.value' => 'required',
            'validate_children.*' => 'required',
            'validate_mother.*' => 'required',
        ];
    }

    public function add() {
        $this->category->push( new Category() );
    }

    public function remove($id) {
        $this->category->forget( $id );
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
