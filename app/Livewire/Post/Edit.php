<?php

namespace App\Livewire\Post;

use Livewire\Component;
use App\Models\Post;

class Edit extends Component
{
    public $postId;
    public $title;
    public $content;

    public function mount($id)
    {
        $post = Post::findOrFail($id);

        if($post) {
            $this->postId = $post->id;
            $this->title = $post->title;
            $this->content = $post->content;
        }
    }

    public function update()
    {
        $this -> validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        if($this -> postId) {
            $post = Post::findOrFail($this->postId);

            if($post) {
                $post->update([
                    'title' => $this -> title,
                    'content' => $this -> content,
                ]);
            }
        }

        session()->flash('message', 'Data berhasil diubah');

        return redirect()->route('post.index');
    }
    public function render()
    {
        return view('livewire.post.edit');
    }
}
