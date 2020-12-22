<?php

namespace App\Http\Controllers;

use App\Address;
use App\Company;
use App\Person;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index($id)
    {
        $company = Company::findOrFail($id);

        $rows = $company->addresses;

        $active = 'addresses';

        return view(
            'address.index',
            compact('rows', 'active', 'company')
        );
    }

    public function create($id)
    {
        $company = Company::findOrFail($id);

        $edit = 0;

        $action = route('companies.addresses.store', $company->id);

        $active = 'addresses';

        return view(
            'address.edit',
            compact('edit', 'active', 'action', 'company')
        );
    }

    public function store(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $data = $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric'
        ]);

        $data['company_id'] = $company->id;

        Address::create($data);

        return redirect()->route('companies.addresses.index', $company->id);
    }

    public function show($id)
    {
        //
    }

    public function edit($c_id, $id)
    {
        $company = Company::findOrFail($c_id);

        $row = Address::findOrFail($id);

        $edit = 1;

        $action = route('companies.addresses.update', [$company->id, $row->id]);

        $active = 'addresses';

        return view(
            'address.edit',
            compact('edit', 'active', 'action', 'company', 'row')
        );
    }

    public function update(Request $request, $c_id, $id)
    {
        $data = $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric'
        ]);

        $company = Company::findOrFail($c_id);

        $row = Address::findOrFail($id);

        $row->update($data);

        return redirect()->route('companies.addresses.index', $company->id);
    }

    public function destroy($c_id, $id)
    {
        $company = Company::findOrFail($c_id);

        $row = Address::where('company_id', $company->id)
            ->where('id', $id)->firstOrFail();

        $row->delete();

        return redirect()->route('companies.addresses.index', $company->id);
    }
}
