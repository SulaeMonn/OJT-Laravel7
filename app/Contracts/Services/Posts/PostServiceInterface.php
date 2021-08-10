<?php

namespace App\Contracts\Services\Posts;

use Illuminate\Http\Request;

interface PostServiceInterface 
{
    public function getPostList();

    public function store($request);

    public function editConfirm($request, $id);

    public function update($request, $post);

    public function delete($post);

    public function search($request);
}