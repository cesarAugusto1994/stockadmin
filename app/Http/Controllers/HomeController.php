<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\AlterarSenha;
use Mail;
use Ixudra\Curl\Facades\Curl;

use App\Helpers\User as UserHelper;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$user = auth()->user();
        //Mail::to($user)->send(new AlterarSenha($user));

        UserHelper::setUserInformations();

        $ACCESS_TOKEN = "APP_USR-2744848600091984-032520-deb883b493166e9fcc9b99c5b62117c9-118688227";

        $itens = "'https://api.mercadolibre.com/items";

        $produto = 'https://api.mercadolibre.com/items/MLA600190449';

        #APP_USR-2744848600091984-032520-deb883b493166e9fcc9b99c5b62117c9-118688227

        $site = "https://api.mercadolibre.com/sites/MLB/search?seller_id=118688227&access_token=$ACCESS_TOKEN";

        $minhainformacoes = "https://api.mercadolibre.com/users/me?access_token=$ACCESS_TOKEN";

        #$response = Curl::to($site)->get();

        #$data = json_decode($response, true);

        #dd($data);



        return view('home');
    }
}
