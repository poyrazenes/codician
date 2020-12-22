<?php

namespace App\Http\Controllers;

use App\Company;
use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index($id)
    {
        $company = Company::findOrFail($id);

        $rows = $company->people;

        $active = 'people';

        return view(
            'person.index',
            compact('rows', 'active', 'company')
        );
    }

    public function create($id)
    {
        $company = Company::findOrFail($id);

        $edit = 0;

        $action = route('companies.persons.store', $company->id);

        $active = 'people';

        return view(
            'person.edit',
            compact('edit', 'active', 'action', 'company')
        );
    }

    public function store(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $data = $request->validate([
            'first_name' => 'required|max:200',
            'last_name' => 'required|max:200',
            'title' => 'required|max:200',
            'email' => 'required|email|max:200|unique:people',
            'phone' => 'required|numeric'
        ]);

        $data['company_id'] = $company->id;

        Person::create($data);

        return redirect()->route('companies.persons.index', $company->id);
    }

    public function show($id)
    {
        //
    }

    public function edit($c_id, $id)
    {
        $company = Company::findOrFail($c_id);

        $row = Person::findOrFail($id);

        $edit = 1;

        $action = route('companies.persons.update', [$company->id, $row->id]);

        $active = 'people';

        return view(
            'person.edit',
            compact('edit', 'active', 'action', 'company', 'row')
        );
    }

    public function update(Request $request, $c_id, $id)
    {
        $company = Company::findOrFail($c_id);

        $row = Person::findOrFail($id);

        $data = $request->validate([
            'first_name' => 'required|max:200',
            'last_name' => 'required|max:200',
            'title' => 'required|max:200',
            'email' => 'required|email|max:200|unique:people,email,' . $row->id,
            'phone' => 'required|numeric'
        ]);

        $row->update($data);

        return redirect()->route('companies.persons.index', $company->id);
    }

    public function destroy($c_id, $id)
    {
        $company = Company::findOrFail($c_id);

        $row = Person::where('company_id', $company->id)
            ->where('id', $id)->firstOrFail();

        $row->delete();

        return redirect()->route('companies.persons.index', $company->id);
    }
}
