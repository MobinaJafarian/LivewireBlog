<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Illuminate\Support\Str;
use Livewire\Component;

class AddArticle extends Component
{
    public $title;
    public $description;
    public $link;
    public function render()
    {
        return view('livewire.add-article');
    }

    public function generateLink()
    {
        $this->link = Str::slug($this->title);
    }

    public function addArticle()
    {
        $article  = new Article();
        $article->title = $this->title;
        $article->description = $this->description;
        $article->link = $this->link;
        $article->save();
        session()->flash('success', 'Article saved successfully');
    }
     
}
