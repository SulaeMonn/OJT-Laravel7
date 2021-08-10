<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Gate;
use App\Contracts\Services\Users\UserServiceInterface;

class UserController extends Controller
{

    private $userServiceInterface;


    public function __construct(UserServiceInterface $userServiceInterface)
    {
        $this->userServiceInterface = $userServiceInterface;
    }

    public function index()
    {
        if(Gate::allows('Admin')){
            $users = $this->userServiceInterface->getUserList();
            return view('users.index',compact('users'));
        }
    }

    public function create()
    {
        return view('users.create');
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'type' => ['required'],
            'phone' => ['required'],
            'dob' => ['required'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $imagePath = $request->file('profile');
        $imageName = $imagePath->getClientOriginalName();

        $path = $request->file('profile')->storeAs('uploads', $imageName, 'public');

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $password_confirmation = $request->password_confirmation;
        $type = $request->type;
        $phone = $request->phone;
        $dob = $request->dob;
        $address = $request->address;
        $profile = $imageName;

        return view('users.confirm',compact('name','email','password','password_confirmation','type','phone','dob','address','profile'));
    }

    public function store(Request $request)
    {
        $users = $this->userServiceInterface->store($request);

        return redirect()->route('users.index')->with('success','User created successfully.');
    }

    public function show($id)
    {
        $user = $this->userServiceInterface->show($id);
        return view('users.show',compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    public function editConfirm(Request $request, $id)
    { 
        $user = $this->userServiceInterface->editConfirm($request, $id);
        return view('users.editConfirm',compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user = $this->userServiceInterface->update($request, $user);
        return redirect()->route('users.index')
                        ->with('success','Product updated successfully');
    }

    public function destroy($id)
    {   
        $user = $this->userServiceInterface->delete($id);
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

    public function search(Request $request){
        $users = $this->userServiceInterface->search($request);
        // Return the search view with the results compacted
        return view('users.index', compact('users'));
        
    }

    public function changePassword($id)
    {
        $user = User::find($id);
        return view('users.changePassword',compact('user'));
    } 

    public function passwordUpdate(Request $request, $id)
    {
          $user = $this->userServiceInterface->passwordUpdate($request, $id);
          return redirect()->route('users.edit',$user->id)
                            ->with('success', 'Password successfully changed!');
    }
}
