<?php

namespace App\Http\Livewire\Admin\Attributes;

use App\Models\Attribute;
use Livewire\Component;
use Livewire\WithPagination;

class Attributes extends Component
{
    use WithPagination;
    public $paginate = 10;
    public $search;
    public $queryString = ['paginate', 'search'];
    protected $paginationTheme = 'bootstrap';

    public function render()
    {

        $attrs = Attribute::latest();

        if($this->search !== null){
            $attrs = $attrs->where('name', 'like', '%' . $this->search . '%');
        }
        $attrs = $attrs->paginate($this->paginate);

        return view('livewire.admin.attributes.attributes', compact('attrs'))->layout('layouts.master');
    }

    public function new() {
        return redirect()->route('attributes.create');
    }

    public function edit($id)
    {
        return redirect()->route('attributes.edit', $id);
    }

    public function destroy($attribute)
    {
        // delete attributes
    }
}
