<?php
namespace App\Repositories;
use App\Repositories\BaseRepository;
use App\User;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository extends BaseRepository
{
    protected $user;
    /**
     * UserRepository constructor.
     */
    public function __construct()
	{
        $this->user=new User();
    }
    /**
     * @return array of all users
     */
    public function getAllUsers()
    {
        return $this->getAllItems($this->user);
    }

    public function postAddUser($data,$user)
    {
        $user->fill(['name'=>$data->name]);
        $user->fill(['role_id'=>$data->role_id]);
        $user->fill(['email'=>$data->email]);
        $user->fill(['created_by'=>Auth::user()->id]);
        $user->fill(['password'=>bcrypt($data->password)]);
        $user->save();
        return $user;
    }
    public function getUserById($userId)
    {
        return $this->getItemById($userId,$this->user);
    }

    public function updateUser($userId,$data)
    {
        $user=User::find($userId);
        $user->fill(['name'=>$data->name]);
        $user->fill(['email'=>$data->email]);
        $user->save();
        return $user;
    }

    public function deleteUserById($userId)
    {
        $this->deleteItemById($userId,$this->user);
    }
   
}