<?php

namespace App\Http\Livewire\Admin\Validate;

use App\Models\Validation;
use Livewire\Component;

class Index extends Component
{
    public $paginate = 10;
    public $search = '';
    public $queryString = ['paginate', 'search'];

    public function render()
    {
        $validations = Validation::latest();

        if($this->search !== '')
            $validations = $validations->where('title', 'like' , '%' . $this->search . '%');


        $validations = $validations->paginate();

        return view('livewire.admin.validate.index', compact('validations'))->layout('layouts.master');
    }

    public function new() {
        return redirect()->route('validate.create');
    }

    public function edit($id){
        return redirect()->route('validate.edit', $id);
    }

    public function destroy($id){
        $validate = Validation::whereId($id)->first();

        if( $validate == null OR $validate == '' )
            return redirect()->route('validate')->with('error', 'این اعتبارسنجی وجود ندارد.');


        $validate->delete();
        return redirect()->route('validate')->with('success', 'اعتبارسنجی با موفقیت حذف شد.');
    }
}
