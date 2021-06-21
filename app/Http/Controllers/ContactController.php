<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function AllContacto(){
        $contacts = Contact::latest()->paginate(10);
        return view('admin.contacto.index',compact('contacts'));
    }

    public function AddContacto(){
        return view('admin.contacto.create');
    }

    public function StoreContacto(Request $request){
        Contact::insert([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('contacto')->with('success','Contacto insertado correctamente');
    }

    public function EditContacto($id){
        $contacts = Contact::findOrFail($id);
        return view('admin.contacto.edit',compact('contacts'));
    }

    public function UpdateContacto(Request $request, $id)
    {
        $update = Contact::findOrFail($id)->update([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return Redirect()->route('contacto')->with('success','Contacto actualizado correctamente');
    }

    public function ContactForm(Request $request){
        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('contact')->with('success','Mensaje enviado correctamente');
    }


    public function MessageContact(){

        $messages = ContactForm::all();

        return view('admin.contacto.message',compact('messages'));
    }


    public function DeleteMessage($id){
         ContactForm::findOrFail($id)->delete();
        return Redirect()->back()->with('success','Mensaje Eliminado correctamente');
    }

}
