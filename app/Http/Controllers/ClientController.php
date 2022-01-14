<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\{ClientContact, User, Client};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
class ClientController extends Controller
{
    public function createClient(Request $request)
    {
        if ($request->has('submit')){
            $request->validate([
                'name'           => ['required', 'string', 'max:255'],
                'password'       => ['required', 'string', 'min:8'],
                'email'          => ['required', 'email', 'unique:users,email'],
                'address'        => ['required', 'string', 'max:255'],
                'post_code'      => ['required', 'string', 'max:12'],
                'contact_number' => ['required', 'string', 'max:14'],
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Client::create([
            'user_id'        => $user->id,
            'address'        => $request->address,
            'post_code'      => $request->post_code,
            'contact_number' => $request->contact_number
        ]);
    }
        $page_title = "Fictitious Limited - Create a Client";
        return view('admin.pages.create-a-client', compact(['page_title']));
    }

    public function viewClientPage()
    {
        $page_title = "Fictitious Limited - View Client";
        return view('admin.pages.view-client', compact(['page_title']));
    }

    public function viewClients($date)
    {
        if($date == 0) {
            $date = Carbon::now();
        }
        $clients = Client::with('user:id,name,email')
                            ->select('id', 'post_code', 'contact_number', 'updated_at', 'user_id')
                            ->where('updated_at', '<', $date)
                            ->orderBy('updated_at', 'DESC')
                            ->limit(20)
                            ->get();
        return json_encode($clients);
    }

    public function manageClient($id, Request $request)
    {
        if($request->has('submit')){
            $user = Client::where('id', '=', $id)->with('user')->first();
            if($request->has('name') && $request->name != null){
                $request->validate([
                   'name' => ['required', 'string', 'max:255']
                ]);
                $user->user()->first()->update(['name' => $request->name]);
                $user->user()->first()->updated_at = Carbon::now();
            }
            if($request->has('email') && $request->email != null){
                $request->validate([
                   'email' => ['required', 'string', 'email', 'unique:users,email']
                ]);
                $user->user()->first()->update(['email' => $request->email]);
                $user->user()->first()->updated_at = Carbon::now();
            }
            if($request->has('password')  && $request->password != null){
                $request->validate([
                    'password' => ['required', 'string', 'min:8']
                ]);
                $user->user()->first()->update(['password' => Hash::make($request->password)]);
                $user->user()->first()->updated_at = Carbon::now();
            }
            if($request->has('address') && $request->address != null){
                $request->validate([
                    'address' => ['required', 'string', 'max:255']
                ]);
                $user->update(['address' => $request->address]);
                $user->updated_at = Carbon::now();
            }
            if($request->has('post_code') && $request->post_code != null){
                $request->validate([
                    'address' => ['required', 'string', 'max:255']
                ]);
                $user->update(['post_code' => $request->post_code]);
                $user->updated_at = Carbon::now();
            }
            if($request->has('contact_number') && $request->contact_number != null){
                $request->validate([
                    'contact_number' => ['required', 'string', 'max:14']
                ]);
                $user->update(['contact_number' => $request->contact_number]);
                $user->updated_at = Carbon::now();
            }
            $user->save();
        }
        if($request->has('delete')) {
            $client = Client::where('id', '=', $id)->first();
            if ($client) {
                $user = User::where('id', '=', $client->user_id)->first();
                $client->delete();
                $user->delete();
                return redirect()->route('view-clients');
            }
        }
        $client = Client::where('id', '=', $id)->with('user')->first();
        $page_title = "Fictitious Limited - Manage Client";
        return view('admin.pages.manage-client', compact(['page_title', 'client']));
    }

    public function viewClient($id)
    {
        $clients = ClientContact::where('client_id', '=', $id)
            ->distinct()
            ->get();
        $page_title = "Fictitious Limited - View Client";

        return view('admin.pages.view-specific-client', compact(['page_title', 'clients']));
    }
}
