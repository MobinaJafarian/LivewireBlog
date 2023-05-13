<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Post;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class HomeComponent extends Component
{
    use WithFileUploads;
    

    public function render()
    {
        $articles = Article::all();
        return view('livewire.home-component', compact('articles'));
    }

}
