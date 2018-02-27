<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ClientRepository;
use App\Client;

class ClientController extends Controller
{
    protected $clientRepository;
    /**
     * @var User
     */
    protected $client;
    public function __construct()
    {
        $this->clientRepository=new clientRepository();
        $this->client=new Client();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients=$this->clientRepository->getAllClients();
        return view('backend.clients.all_clients',compact('clients'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexFront()
    {
        $clients=$this->clientRepository->getAllClients();
        return view('front.clients.all_clients',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.clients.add_client');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request ,[
            'name'              =>'required|max:150',
            'phone'              =>'required|max:255|unique:clients',
            'email'              =>'max:255|unique:clients',
            'logo'              =>'image|mimes:jpeg,jpg,png,gif|required|max:5120',
            
            ]);
        $this->clientRepository->postAddClient($request,$this->client);
        return redirect()->route('getAllClients');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($clientId)
    {
        $client=$this->clientRepository->getClientById($clientId);
        return view('backend.clients.client',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $clientId)
    {
        $this->clientRepository->updateClientById($clientId,$request);
        return redirect()->route('getAllClients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($clientId)
    {
        $this->clientRepository->deleteClientById($clientId);
        return redirect()->route('getAllClients');
    }
}
