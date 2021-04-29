<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactsController extends Controller
{
    public function index(){

        $contacts  =  DB::table('contacts')
            ->join('users', 'contacts.users_id', '=', 'users.id')
            ->join('contacts_types', 'contacts.contacts_types_id', '=', 'contacts_types.id')
            ->select('contacts.*', 'users.phone','users.name','contacts_types.name_ar')
            ->get();

        return view('contacts.index',compact('contacts'));
    }

    public function indexDriver(){
        $contacts  =  DB::table('contacts')
            ->join('drivers', 'contacts.drivers_id', '=', 'drivers.id')
            ->join('contacts_types', 'contacts.contacts_types_id', '=', 'contacts_types.id')
            ->select('contacts.*', 'drivers.phone','drivers.name','contacts_types.name_ar')
            ->get();

        return view('contacts.indexDrivers',compact('contacts'));
    }

    public function updateStatus($id)
    {
        $contact = Contact::where('id', '=', $id)->first();

        if($contact->status == 'open')
        {
            $contact->status = 'closed';
            $contact->update();
            toastr()->success('تم تحديث حالة الرسالة بنجاح');
            return redirect()->route('contacts.index');

        } elseif ($contact->status == 'closed') {
            $contact->status = 'open';
            $contact->update();
            toastr()->success('تم تحديث حالة الرسالة بنجاح');
            return redirect()->route('contacts.index');
        }
    }
}
