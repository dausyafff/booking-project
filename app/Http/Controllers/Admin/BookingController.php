<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;


class BookingController extends Controller
{
    public function index()
    {
        return 'ADMIN: semua booking';
    }


    public function approve()
    {
        return 'ADMIN: approve booking';
    }


    public function decline()
    {
        return 'ADMIN: decline booking';
    }
}
