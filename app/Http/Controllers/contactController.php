<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeContactRequest;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\DB\getQueryLog;
use Illuminate\Container\Attributes\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as FacadesDB;

class contactController extends Controller
{
    public function index(Request $request){
        
        $companies=auth::user()->companies()->get();
        $query=auth::user()->contacts()->latest();
        if($trash=request()->query('trash')){
                
            $query->onlyTrashed();
        }
        $contacts=$query->where(function($query) {
                if($companyId=request()->query("company_id")){
                    $query->where("company_id",$companyId);
                }
        } )->where(function($query) {
            if($search = request()->query("search")){
                $query->where("first_name","like","%".$search."%");
                $query->orWhere('last_name','LIKE','%'.$search.'%');
                
            }
       
         })->simplePaginate(10);
        return view("conta.allcontacts",["contacts"=> $contacts,'companies'=>$companies,'trash'=>request()->query('trash')]);

    }

public function welcome(){
    return view('layouts.final_banda');
}
public function show($id){
    $contact=Contact::findOrFail( $id );
    return view("conta.show")->with('contact',$contact);
}
public function create(){ 
    return view('conta.create',['companies'=>Company::all()]);
}
public function store( storeContactRequest $request){
    // request()->validate([
    //     'first_name'=>'required|string|max:5',
    //     'last_name'=>'required|string|max:5',
    //     'phone'=>'nullable',
    //     'adress'=>'nullable',
    //     'company_id'=>'required|exists:companies,id',

    // ]);
    $first_name = $request->input('first_name');
    $last_name = $request->input('last_name');
    $phone= $request->input('phone');
    $address = $request->input('address');
    $company_id = $request->input('company_id');
    $user_id = Auth::id();
    $contact=Contact::create([
        'first_name' =>$first_name,
        'last_name' =>$last_name,
        'phone' =>$phone,
        'user_id' => $user_id,
        'adress' =>$address,
        'company_id' =>$company_id]);
    
   return redirect()->route('contacts')->with('message',"contact added succesfully!!");
    
}
public function edit($id){
    $contact=Contact::findOrFail( $id );
    return view("conta.edit",["contact"=> $contact]);
}
public function update($id,storeContactRequest $request){
    $first_name = $request->input('first_name');
    $last_name = $request->input('last_name');
    $phone= $request->input('phone');
    $address = $request->input('address');
    $company_id = $request->input('company_id');
    $contact=Contact::findOrFail( $id );
    $contact->update([
        'first_name' =>$first_name,
        'last_name' =>$last_name,
        'phone' =>$phone,
        'adress' =>$address,
        'company_id' =>$company_id]);
    return redirect()->route('contacts')->with('message',$contact['first_name'] . " 's contact is updated succesfully!");
}
public function destroy($id){
    $contact=Contact::findOrFail( $id );
    $contact->delete();
    return redirect()->route('contacts')
    ->with('message', $contact['first_name'] . ' contact is in the trash!')
    ->with('undoRoute', route('restore', $id));
}
public function forceDelete($id){
    $contact = Contact::onlyTrashed()->findOrFail($id);
    $contact->forceDelete();
    
   return redirect()->route('contacts')
   ->with("message",$contact["first_name"] ." contact is forced to be deleted!! ");

}
public function restore($id){
    $contact = Contact::withTrashed()->findOrFail($id);
    $contact->restore();

   return redirect()->route('contacts')
   ->with("message",$contact["first_name"] ." contact is restored succesfully!! ");
}
}
