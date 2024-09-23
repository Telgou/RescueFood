<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileCustomerController extends Controller
{
    public function show($id)
    {
            $profil_customer = User::findOrFail($id);
            return view('customer.profil', compact('profil_customer'));
    }

}