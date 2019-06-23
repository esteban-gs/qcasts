<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Company;
use App\Mail\WelcomeNewUserMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $companies = Company::all();
        $customer = new Customer();

        return view('customers.create', compact('companies', 'customer'));
    }

    public function store()
    {
        $customer = Customer::create($this->validateRequest());

        Mail::to($customer->email)->send(new WelcomeNewUserMail());

        //Register to newsletter
        dump('Registered to newsleter');

        //Slack message to Admin
        dump('Slack Message Here');

        //return redirect('customers');
    }

    public function show(Customer $customer)
    {
        //route-model binding replaces code below
        //$customer = Customer::where('id', $customer)->firstOrFail();

        return view('customers.show', compact('customer'));
        //dd($customer);
    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();

        return view('customers.edit', compact('customer', 'companies'));
    }

    public function  update(Customer $customer)
    {
        $customer->update($this->validateRequest());

        redirect('customers/' . $customer->id);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect('customers');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:5|email',
            'active' => 'required',
            'company_id' => 'required'
        ]);
    }
}
