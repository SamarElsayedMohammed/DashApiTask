<?php

namespace App\Http\Controllers;

use DataTables;
// use Yajra\DataTables\DataTables;
use App\Traits\ResponseDash;
use Illuminate\Http\Request;
// use Yajra\DataTables\DataTables;
use App\Interfaces\PostInterface;
use App\DataTables\PostsDataTable;

class PostsController extends Controller
{
    use ResponseDash;
    protected $postInteface;


    public function __construct(PostInterface $postInteface)
    {
        $this->postInteface = $postInteface;
        $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:post-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:post-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:post-delete', ['only' => ['destroy']]);

    }
    public function index(PostsDataTable $dataTable)
    {
        try {
            return $dataTable->with($this->postInteface->getAll())->render('dashboard.home');
        } catch (\Throwable $th) {
            return $this->error('something go to wrong try later', 'admin.home');

        }
    }
}
