<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configurations;

use Ixudra\Curl\Facades\Curl;

class ConfigController extends Controller
{
    const URL_REQUEST_API_CODE = "https://auth.mercadolibre.com.ar/authorization?response_type=code&client_id=%d";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.configs.index');
    }

    public function notification()
    {
        return view('admin.configs.notification');
    }

    public function saveAppCode(Request $request)
    {
        $data = $request->request->all();

        $config = Configurations::where('user_id', $request->user()->id)->get()->first();
        $config->app_id = $data['app_id'];
        $config->save();

        flash("Chave da aplicação adicionada com sucesso.")->success()->important();

        $url = sprintf(self::URL_REQUEST_API_CODE, \Auth::user()->configurations->app_id);

        return redirect($url);
    }

    public function requestApiAccessCode(Request $request)
    {

        dd($request->request->all());

        /*
        $response = Curl::to(sprintf(self::URL_REQUEST_API_CODE, \Auth::user()->configurations->app_id))->get();

        if(!$response) {
           flash("A Chave da aplicação esta errada.")->warning();
           return redirect()->route('notification');
        }
        */

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
