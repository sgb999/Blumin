<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\{ClientContact, User, Contact, Client};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
class ContactController extends Controller
{
    public function createContact(Request $request)
    {
        if ($request->has('submit')){
            $request->validate([
                'name'          => ['required', 'string', 'max:255'],
                'email'         => ['required', 'string', 'email', 'unique:users,email'],
                'password'      => ['required', 'string', 'min:8'],
                'job_role'      => ['required', 'string', 'max:255'],
                'phone_number'  => ['required', 'string', 'max:14'],
                'client'        => ['required', 'integer']
            ]);

            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password)
            ]);

            $contact = Contact::create([
                'user_id'        => $user->id,
                'job_role'      => $request->job_role,
                'phone_number' => $request->phone_number
            ]);

            ClientContact::create([
                'client_id' => $request->client,
                'contact_id' => $contact->id
                ]);
        }
        $clients = Client::with('user')->get();
        $page_title = "Fictitious Limited - Create a Contact";
        return view('admin.pages.create-a-contact', compact(['page_title', 'clients']));
    }

    public function viewContactPage()
    {
        $page_title = "Fictitious Limited - View Contact";
        return view('admin.pages.view-contact', compact(['page_title']));
    }
    public function viewContacts($date)
    {
        if($date == 0) {
            $date = Carbon::now();
        }
        $contacts = Contact::with(['user:id,name,email'])
                            ->select('id', 'job_role', 'phone_number', 'updated_at', 'user_id')
                            ->where('updated_at', '<', $date)
                            ->orderBy('updated_at', 'DESC')
                            ->limit(20)
                            ->get();

        return json_encode($contacts);
    }

    public function manageContact($id, Request $request)
    {
        if($request->has('submit')){
            $user = Contact::where('id', '=', $id)->with('user')->first();
            if($request->has('name') && $request->name != null){
                $request->validate([
                'name' => ['required', 'string', 'max:255']
               ]);
                $user->user()->first()->update(['name' => $request->name]);
            }
            if($request->has('email') && $request->email != null){
                $request->validate([
                    'email' => ['required', 'string', 'email', 'unique:users,email']
                ]);
                $user->user()->first()->update(['email' => $request->email]);
            }
            if($request->has('password')  && $request->password != null){
                $request->validate([
                   'password' => ['required', 'string', 'min:8']
                ]);
                $user->user()->first()->update(['password' => Hash::make($request->password)]);
            }
            if($request->has('job_role') && $request->job_role != null){
                $request->validate([
                    'job_role' => ['required', 'string', 'max:255']
                ]);
                $user->update(['job_role' => $request->job_role]);
            }
            if($request->has('phone_number') && $request->phone_number != null){
                $request->validate([
                   'phone_number' => ['required', 'string', 'max:14']
                ]);
                $user->update(['phone_number' => $request->phone_number]);
            }
        }
        if($request->has('delete')) {
            $contact = Contact::where('id', '=', $id)->first();
            if ($contact) {
                $user = User::where('id', '=', $contact->user_id)->first();
                $contact->delete();
                $user->delete();
                return redirect()->route('view-contacts');
            }
        }
        $contact = Contact::where('id', '=', $id)->first();
        $clientContact = ClientContact::where('contact_id', '=', $id)
            ->distinct() // only needed due to fake data
            ->first();
        $clients = Client::all();
        $page_title = "Fictitious Limited - Manage Contact";
        return view('admin.pages.manage-contact', compact(['page_title', 'contact', 'clientContact', 'clients']));
    }
    public function viewContact($id)
    {
        $contact = Contact::where('id', '=', $id)->first();
        $page_title = "Fictitious Limited - Manage Contact";

        return view('admin.pages.view-specific-contact', compact(['page_title', 'contact']));
    }
}
