<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostCreate extends Component
{
    public $title;
    public $slug;
    public $message;

    public function render()
    {
        return view('livewire.post-create');
    }

    public function submitForm()
    {
        Post::create([
            'title' => $this->title,
            'slug' => $this->slug,
            'message' => $this->message,
        ]);

        $this->reset();
    }

    private function resetForm()
    {
        $this->title = '';
        $this->slug = '';
        $this->message = '';
    }
}
