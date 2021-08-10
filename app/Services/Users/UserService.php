<?php

namespace App\Services\Users;

use Illuminate\Http\Request;
use App\Contracts\Dao\Users\UserDaoInterface;
use App\Contracts\Services\Users\UserServiceInterface;

class UserService implements UserServiceInterface
{
    /**
     * The user dao instance.
     */
    private $userDao;

    /**
     * Constructor
     *
     * @param UserDaoInterface $userDao
     * @return void
     */
    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
    }

    public function getUserList()
    {
        return $this->userDao->getUserList();
    }

    public function store($request)
    {
        return $this->userDao->store($request);
    }

    public function show($id)
    {
        return $this->userDao->show($id);
    }

    public function editConfirm($request, $id)
    {
        return $this->userDao->editConfirm($request, $id);
    }

    public function update($request, $user)
    {
        return $this->userDao->update($request, $user);
    }

    public function delete($id)
    {
        return $this->userDao->delete($id);
    }

    public function search($request)
    {
        return $this->userDao->search($request);
    }

    public function passwordUpdate($request, $id)
    {
        return $this->userDao->passwordUpdate($request, $id);
    }
}