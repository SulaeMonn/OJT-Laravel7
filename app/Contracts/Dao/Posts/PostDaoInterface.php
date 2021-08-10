<?php

namespace App\Contracts\Dao\Posts;
use Illuminate\Http\Request;

interface PostDaoInterface 
{
    public function getPostList();

    public function store($request);

    public function editConfirm($request, $id);

    public function update($request, $post);

    public function delete($post);

    public function search($request);
}