<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;


class ClientController extends Controller
{

    function listeClients()
    {
        return response()->json(Client::all());
    }
	
}