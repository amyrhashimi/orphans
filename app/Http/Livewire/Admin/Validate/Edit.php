<?php

namespace App\Http\Livewire\Admin\Validate;

use App\Models\Validation;
use Livewire\Component;

class Edit extends Component
{
    public Validation $validate;
    public $title;
    public $value;

    public function mount()
    {
        $this->title = $this->validate->title;
        $this->value = $this->validate->value;
    }

    public function render()
    {
        return view('livewire.admin.validate.edit')->layout('layouts.master');
    }

    public function rules() {
        return [
            'title' => 'required',
            'value' => 'required',
        ];
    }

    public function updated($name) {
        $this->validateOnly($name);
    }

    public function comeBack()
    {
        return redirect()->route('validate');
    }

    public function save()
    {
        $this->validate();

        $this->validate->update([
            'title' => $this->title ,
            'value' => $this->value
        ]);

        return redirect()->route('validate')->with('success', 'اعتبارسنجی با موفقیت تغییر کرد.');
    }
}
