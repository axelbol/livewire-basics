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

    protected $rules = [
        'title' => ['required', 'min:4'],
        'slug' => 'required',
        'message' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        $this->validate();
        Post::create([
            'title' => $this->title,
            'slug' => $this->slug,
            'message' => $this->message,
        ]);

        // $this->resetForm();
        $this->reset();

        session()->flash('message', 'Post saved succesfully!');
    }

    private function resetForm()
    {
        $this->title = '';
        $this->slug = '';
        $this->message = '';
    }
}
