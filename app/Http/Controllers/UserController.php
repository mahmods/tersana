<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
	protected $userRepository;
    /**
     * @var User
     */
    protected $user;
    public function __construct()
    {
    	$this->userRepository=new UserRepository();
    	$this->user=new User();
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users=$this->userRepository->getAllUsers();
        return view('backend.users.all_users',compact('users'));
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.users.add_user');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:70',
            'email'=>'required|email|unique:users',
            'password'=>'required',
        ]);
        $this->userRepository->postAddUser($request,$this->user);
        return redirect()->route('getAllUsers');
    }

    /**
     * @param $userId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($userId)
    {
        $user=$this->userRepository->getUserById($userId);
        return view('backend.users.user',compact('user'));
    }

    /**
     * @param $userId
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($userId, Request $request)
    {
        $this->userRepository->updateUser($userId,$request);
        return redirect()->route('getAllUsers');
    }

    /**
     * @param $userId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($userId)
    {
        $this->userRepository->deleteUserById($userId);
        return redirect()->route('getAllUsers');
    }
}