<?php

namespace App\Http\Controllers;
use App\Repositories\ContactsRepository;
use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * @var $contactRepository
     */
    protected $contactRepository;
    protected $contact;

    public function __construct()
    {
        $this->contactRepository=new ContactsRepository();
        $this->contact=new Contact();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts=$this->contactRepository->getAllContacts();
        return view('backend.contacts.all_contacts',compact('contacts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexFront()
    {
        return view('front.contacts.all_contacts');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $this->validate($request ,[
            
            'name'                 =>'required|max:150',
            'phone'                =>'required|max:400|unique:contacts',
            'email'                =>'max:255|unique:contacts',
            'address'              =>'max:400',
            'message'              =>'required'            
            ]);
        */    
        $this->contactRepository->postAddContact($request->all());
        return redirect()->route('getFrontHome')->with(['message'=>'Data Sent Successfully !']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($contactId)
    {
        $this->contactRepository->deleteContactById($contactId);
        return redirect()->route('getAllContacts');
    }
}
