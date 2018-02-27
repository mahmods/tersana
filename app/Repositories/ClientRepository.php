<?php
namespace App\Repositories;
use App\Client;
use File;
use Illuminate\Support\Facades\Auth;

/**
 * Class ClientRepository
 * @package App\Repositories
 */
class ClientRepository extends BaseRepository
{
    protected $client;
    /**
     * ClientRepository constructor.
     */
    public function __construct()
	{
        $this->client=new Client();
    }

    public function getAllClients()
    {
        return $this->getAllItems($this->client);
    }

    public function postAddClient($data,$client)
    {
        if ($data->hasFile('logo'))
        {   
            $file= $data->file('logo');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture = date('His').$filename;
            $destinationPath='public/assets/images/clients';
            $file->move($destinationPath, $picture); 
            $client->fill(['logo'=>$picture]);
        }
        $client->fill(['name'=>$data->name]);
        $client->fill(['phone'=>$data->phone]);
        $client->fill(['email'=>$data->email]);
        $client->fill(['external_link'=>$data->external_link]);
        $client->fill(['other'=>$data->other]);
        $client->fill(['active'=>$data->active]);
        $client->fill(['created_by'=>Auth::user()->id]);
        $client->save();
        return $client;

    }

    public function getClientById($clientId)
    {
        return $this->getItemById($clientId,$this->client);
    }

    public function updateClientById($clientId,$data)
    {
        $client=$this->client->find($clientId);
        if ($data->hasFile('logo'))
        {
            $photoName=$client->logo; 
            File::delete('public/assets/images/clients/'.$photoName);    
            $file= $data->file('logo');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture = date('His').$filename;
            $destinationPath='public/assets/images/clients';
            $file->move($destinationPath, $picture); 
            $client->fill(['logo'=>$picture]);
        }
        $client->fill(['name'=>$data->name]);
        $client->fill(['phone'=>$data->phone]);
        $client->fill(['email'=>$data->email]);
        $client->fill(['external_link'=>$data->external_link]);
        $client->fill(['other'=>$data->other]);
        $client->fill(['active'=>$data->active]);
        $client->fill(['updated_by'=>Auth::user()->id]);
        $client->save();
        return $client;
    }

    public function deleteClientById($clientId)
    {
        $client=$this->client->find($clientId);
        $photoName=$client->logo; 
        File::delete('public/assets/images/clients/'.$photoName);    
        $this->deleteItemById($clientId,$this->client);
    }

    static public function getClientsToView()
    {
        return Client::orderBy('client_id','desc')->where('active',1)->get();
    }

    
}