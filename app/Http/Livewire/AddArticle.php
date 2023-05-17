<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddArticle extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $link;
    public $image;

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'image' => 'image|max:1024',
    ];

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
        $this->validate();
        $article = new Article();
        $article->title = $this->title;
        $article->description = $this->description;
        $article->link = $this->link;
        $imageName = time() . '.' . $this->image->extension();
        $this->image->storeAs('articles', $imageName);
        $article->image = $imageName;
        $article->save();
        session()->flash('success', 'Article saved successfully');
    }

}
