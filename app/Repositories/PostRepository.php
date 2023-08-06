<?php
namespace App\Repositories;

use App\Interfaces\PostInterface;
use App\Models\Post;

class PostRepository implements PostInterface
{
    public function getAll($withPagination = false, $perPage = 20)
    {
        try {
            if ($withPagination == false)
                $posts = Post::all();
            else {
                $posts = Post::paginate($perPage);
            }

            return $posts;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function getById($id)
    {
        try {
            $post = Post::find($id);
            return $post;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function create($data)
    {
        try {
            $post = Post::insert($data);
            return $post;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function update($data, $id)
    {
        try {
            $post = $this->getById($id)->update($data);
            return $post;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function delete($id)
    {
        try {
            $post = $this->getById($id)->delete();
            return $post;
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }
}