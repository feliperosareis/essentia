<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index() {
        $customers = Customer::all();
        return view('dashboard', compact('customers'));
    }

    public function addCustomer() {
        return view('add_customer');
    }

    public function editCustomer($id) {
        $customer = Customer::find($id);
        return view('edit_customer', compact('customer'));
    }

    public function saveCustomer(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'phone' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        
        $image = $request->file('photo');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
 
        $customer->photo = $imageName;

        Customer::create($customer->toArray());

        return redirect()->route('dashboard')->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function updateCustomer(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $customer = Customer::find($request->id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        
        $image = $request->file('photo');
        if ($image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $customer->photo = $imageName;
        }

        $customer->save();

        return redirect()->route('dashboard')->with('success', 'Cliente atualizado com sucesso!');
    }

    public function deleteCustomer(Request $request) {
        $customers = Customer::all();
        $customer = $customers->findOrFail($request->id);

        $customer->delete();
        return redirect()->route('dashboard');
    }
}
