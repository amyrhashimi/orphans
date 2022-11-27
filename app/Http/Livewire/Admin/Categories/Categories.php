<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;
    public $paginate = 10;
    public $search;
    public $queryString = ['paginate', 'search'];
    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        $categories = Category::latest();

        if($this->search !== null){
            $categories = $categories->where('value', 'like', '%' . $this->search . '%');
        }
        $categories = $categories->paginate($this->paginate);

        return view('livewire.admin.categories.categories', compact('categories'))->layout('layouts.master');
    }

    public function new() {
        return redirect()->route('categories.create');
    }

    public function edit($id)
    {
        return redirect()->route('categories.edit', $id);
    }

    public function destroy($category)
    {
        // delete category
    }
}
