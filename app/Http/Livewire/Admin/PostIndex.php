<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $keySearch = '%'.$this->search.'%';
        $posts = Post::where('user_id', auth()->user()->id)
                    ->where('name','LIKE',$keySearch)
                    ->latest('id')
                    ->paginate();
        return view('livewire.admin.post-index', compact('posts'));
    }
}
