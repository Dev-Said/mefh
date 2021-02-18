<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFaqRequest;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Faq::all();
        // $faqs = Faq::all();
        // return view('faqs.list', ['faqs' => $faqs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faqs.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFaqRequest $request)
    {
        $validated = $request->validated();

        $faq = new Faq;
        $faq->question = Arr::get($validated, 'question');
        $faq->reponse = Arr::get($validated, 'reponse');

        $faq->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        return $faq;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('faqs.edit', ['faq' => $faq]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFaqRequest $request, Faq $faq)
    {
        $validated = $request->validated();

        $faq->question = Arr::get($validated, 'question');
        $faq->reponse = Arr::get($validated, 'reponse');

        $faq->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        return back();
    }
}
