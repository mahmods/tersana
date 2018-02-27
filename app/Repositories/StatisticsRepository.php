<?php

namespace App\Repositories;
use App\Service;
use App\User;
use App\Client;
use App\Page;
use App\Contact;
use App\BlogCategory;
use App\Blog;
use App\Tracker;
use Auth;
use File;
class StatisticsRepository extends BaseRepository
{
    protected $service;
    protected $user;
    protected $client;
    protected $page;
    public function __construct()
    {
        $this->service=new Service();
        $this->user=new User();
        $this->client=new Client();
        $this->page=new Page();
    }

    public static function countServices()
    {
        return count(Service::all());
    }

    public static function countPages()
    {
        return count(Page::all());
    }
    public static function countContacts()
    {
        return count(Contact::all());
    }

    public static function countUsers()
    {
        return count(User::all());
    }

    public static function countClients()
    {
        return count(Client::all());
    }
    public static function countCategories()
    {
        return count(BlogCategory::all());
    }
    public static function countBlogs()
    {
        return count(Blog::all());
    }
    public static function countVisitors()
    {
        return count(Tracker::all());
    }
    public static function getLastVisitor()
    {
        return Tracker::orderBy('id','desc')->first();
    }
    public static function getAllVisits()
    {
        return Tracker::orderBy('id','desc')->get();
    }



    
}