<?php

namespace App\Contracts\Services\Users;

use Illuminate\Http\Request;

interface UserServiceInterface 
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