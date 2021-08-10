<?php

namespace App\Contracts\Dao\Users;
use Illuminate\Http\Request;

interface UserDaoInterface 
{

  public function getUserList();

  public function store($request);

  public function show($id);

  public function editConfirm($request, $id);

  public function update($request, $user);

  public function delete($id);

  public function search($request);

  public function passwordUpdate($request, $id);
}