<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function searchRecords(Request $request)
    {
        $clients = [];
        $contacts = [];
        if($request->has('submit')){
            $clients = DB::table('clients')
                ->join('users', 'users.id', '=', 'clients.user_id')
                ->select('clients.id', 'users.name')
                ->where('users.name', 'LIKE', '%'.$request->search.'%')
                ->limit(10)
                ->get();
            $contacts = DB::table('contacts')
                ->join('users', 'users.id', '=', 'contacts.user_id')
                ->select('contacts.id', 'users.name')
                ->where('users.name', 'LIKE', '%'.$request->search.'%')
                ->limit(10)
                ->get();
        }
        $page_title = "Fictitious Limited - Search Users";
        return view('admin.pages.search-users', compact(['page_title', 'clients', 'contacts']));
    }
}
