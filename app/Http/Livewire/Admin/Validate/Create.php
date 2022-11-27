<?php

namespace App\Http\Livewire\Admin\Validate;

use App\Models\Validation;
use Livewire\Component;

class Create extends Component
{
    public $title;
    public $value;

    public function render()
    {
        return view('livewire.admin.validate.create')->layout('layouts.master');
    }

    public function rules(){
        return [
            'title' => 'required',
            'value' => 'required'
        ];
    }
    public function updated($name) {
        $this->validateOnly($name);
    }

    public function save()
    {
        $this->validate();

        Validation::create([
            'title' => $this->title ,
            'value' => $this->value
        ]);

        return redirect()->route('validate')->with('success', 'اعتبارسنجی شما با موفقیت ذخیره شد.');

    }

    public function comeBack()
    {
        return redirect()->route('validate');
    }
}
