<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index($id)
    {
        $company = Company::findOrFail($id);

        $rows = $company->people;

        $active = 'companies';

        return view(
            'person.index',
            compact('rows', 'active')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        $edit = 0;

        $action = route('companies.store');

        $active = 'companies';

        return view(
            'company.edit',
            compact('edit', 'active', 'action')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:200',
            'link' => 'required|max:200'
        ]);

        Company::create($data);

        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return mixed
     */
    public function edit($id)
    {
        $row = Company::findOrFail($id);

        $edit = 1;

        $action = route('companies.update', $row->id);

        $active = 'companies';

        return view(
            'company.edit',
            compact('row', 'edit', 'active', 'action')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|max:200',
            'link' => 'required|max:200'
        ]);

        $row = Company::findOrFail($id);

        $row->update($data);

        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return mixed
     */
    public function destroy($id)
    {
        $row = Company::find($id);

        $row->delete();

        return redirect()->route('companies.index');
    }
}
