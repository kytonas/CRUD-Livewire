<?php

namespace App\Livewire\Post;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function destroy($postId)
    {
        $post = Post::findOrFail($postId);

        if($post) {
            $post->delete();
        }

        session()->flash('message', 'Data berhasil dihapus');
        return redirect()->route('post.index');
    }
    public function render()
    {
        return view('livewire.post.index', [
            'posts' => Post::latest()->paginate(5)
        ]);
    }
}
