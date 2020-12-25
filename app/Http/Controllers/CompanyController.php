<?php

namespace App\Http\Controllers;

use App\Company;
use App\Jobs\FetchCompanyWebSite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        $rows = Company::get();

        $active = 'companies';

        return view(
            'company.index',
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

        $company = Company::create($data);

        $this->dispatch(new FetchCompanyWebSite($company));

        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return mixed
     */
    public function show(Request  $request, $id)
    {
        $row = Company::findOrFail($id);

        $type = $request->input('type');

        if (!in_array($type, ['html', 'png'])) {
            $type = 'html';
        }

        $name = Str::slug($row->name);

        if (!Storage::disk('company_pages')->has("$name.$type")) {
            abort(404);
        }

        $content = Storage::disk('company_pages')->get("$name.$type");

        if ($type === 'html') {
            return $content;
        } else {
            return response()->make($content, 200)->header('Content-Type', 'image/png');
        }
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
