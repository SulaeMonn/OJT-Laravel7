<?php

namespace App\Services\Posts;

use Illuminate\Http\Request;
use App\Contracts\Dao\Posts\PostDaoInterface;
use App\Contracts\Services\Posts\PostServiceInterface;

class PostService implements PostServiceInterface
{
    /**
     * The post dao instance.
     */
    private $postDao;

    /**
     * Constructor
     *
     * @param PostDaoInterface $postDao
     * @return void
     */
    public function __construct(PostDaoInterface $postDao)
    {
        $this->postDao = $postDao;
    }

    /**
     * Go post lists function.
     *
     * @return void
     */
    public function getPostList()
    {
        return $this->postDao->getPostList();
    }

    public function store($request)
    {
        return $this->postDao->store($request);
    }

    public function editConfirm($request, $id)
    {
        return $this->postDao->editConfirm($request, $id);
    }

    public function update($request, $post)
    {
        return $this->postDao->update($request, $post);
    }

    public function delete($post)
    {
        return $this->postDao->delete($post);
    }

    public function search($request)
    {
        return $this->postDao->search($request);
    }

}