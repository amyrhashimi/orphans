<?php

namespace App\Http\Livewire\Admin\Attributes;

use App\Models\Attribute;
use App\Models\Category;
use Livewire\Component;

class Create extends Component
{
    public $title;
    public $persian;
    public $editable;
    public $status;

    public $category;
    public $validate_mother = [];
    public $validate_children = [];

    public function mount()
    {
        $this->category = collect([]);
    }

    public function render()
    {
        return view('livewire.admin.attributes.create')->layout('layouts.master');
    }

    public function rules(){
        return [
            'title' => 'required|between:2,90',
            'persian' => 'required|between:2,90',
            'editable' => 'required|boolean',
            'status' => 'nullable',

            'category.*.value' => 'required',
            'validate_children.*' => 'required',
            'validate_mother.*' => 'required'
        ];
    }

    public function add() {
        $this->category->push( new Category() );
    }

    public function save(){
        $this->validate();

        $attribute = Attribute::create([
            'name' => $this->title,
            'value' => $this->persian,
            'editable' => $this->editable,
            'status' => $this->status
        ]);

        if ($this->status == 0 OR $this->status == null ) {
            foreach ($this->validate_children as $value) {
                # code...
            }
        }

        if ($this->status == 1 OR $this->status == null ) {
            foreach ($this->validate_mother as $value) {
                # code...
            }
        }

        foreach ($this->category as $key => $value) {
            $value += ['attribute_id' => $attribute->id ];
            Category::create($value);
        }

        return redirect()->route('attributes')->with('success', 'ویژگی با موفقیت ذخیره شد.');
    }

    public function comeBack() {
        redirect()->route('attributes');
    }
}
