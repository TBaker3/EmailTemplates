<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplate;
use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('email-templates.index', [
            'emailTemplates' => EmailTemplate::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('email-templates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'html' => $request->builder_html,
            'json' => $request->builder_json,
        ]);

        try{
            $template = EmailTemplate::create($request->all());
            return redirect()->route('email-templates.edit',$template);
        }catch(\Illuminate\Database\QueryException $e){
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(EmailTemplate $emailTemplate)
    {
        return view('email-templates.show', [
            'emailTemplate' => $emailTemplate,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmailTemplate $emailTemplate)
    {
        return view('email-templates.edit', [
            'emailTemplate' => $emailTemplate,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmailTemplate $emailTemplate)
    {

        $request->merge([
            'html' => $request->builder_html,
            'json' => $request->builder_json,
        ]);

        try{
            $emailTemplate->update($request->all());
            return redirect()->route('email-templates.edit',$emailTemplate);
        }catch(\Illuminate\Database\QueryException $e){
            return back()->withErrors(['name' => 'Email template with this name already exists.']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmailTemplate $emailTemplate)
    {
        //
    }
}
