<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;
use App\Interfaces\PostInterface;
use App\DataTables\PostsDataTable;
use App\Http\Controllers\Controller;
use DataTables;

class PostsController extends Controller
{
    use ResponseAPI;
    protected $postInteface;
    //

    public function __construct(PostInterface $postInteface)
    {
        $this->postInteface = $postInteface;
    }

    public function index()
    {
        try {
            $posts = $this->postInteface->getAll(true, 20);
            return $this->success("All Posts", $posts);
        } catch (\Exception $e) {
            return $this->error("some thing wrong try later", 401);
        }
    }
}
