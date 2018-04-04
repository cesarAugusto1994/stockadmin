<?php

namespace App\Helpers;

use Ixudra\Curl\Facades\Curl;
use App\Models\{ UserInformations, UserIdentification, UserInternalTags, UserPhone, UserAddress, Configurations };
use App\Mail\Usuario\Cadastro as CadastroMail;
use Auth;

class User
{

    public static function setUserInformations()
    {
        $configs = Configurations::where('user_id', \Auth::user()->id)->get()->first();

        if(!$configs->access_token) {
            return;
        }

        $user = Helper::getRegistros(UserPhone::class);

        if($user->isNotEmpty()) {
            return;
        }

        ##$ACCESS_TOKEN = "APP_USR-7942076642174757-032409-1c3f83ba6174ff8030f1886020de51cf-118688227";

        // Instantiate serializer with configurations.
        $serializer = \JMS\Serializer\SerializerBuilder::create()
           ->addMetadataDir(__DIR__ . '/../../vendor/zephia/mercadolibre/resources/config/serializer')
           ->build();

        // Instantiate client.
        $client = new \Zephia\MercadoLibre\Client\MercadoLibreClient(
            [],
            $serializer
        );

        $response = $client->setAccessToken($configs->access_token)->userShowMe();

        $informations = new UserInformations();
        $informations->user_id = $response->id;
        $informations->nickname = $response->nickname;
        $informations->registration_date = $response->registration_date;
        $informations->first_name = $response->first_name;
        $informations->last_name = $response->last_name;
        $informations->country_id = $response->country_id;
        $informations->email = $response->email;
        $informations->user_type = $response->user_type;
        $informations->logo = $response->logo;
        $informations->points = $response->points;
        $informations->site_id = $response->site_id;
        $informations->permalink = $response->permalink;
        $informations->seller_experience = $response->seller_experience;
        $informations->secure_email = $response->secure_email;
        $informations->save();

        $identification = new UserIdentification();
        $identification->user_id = $informations->id;
        $identification->number = $response->identification->number;
        $identification->type = $response->identification->type;
        $identification->save();

        $address = new UserAddress();
        $address->user_id = $informations->id;
        $address->address = $response->address->address;
        $address->city = $response->address->city;
        $address->state = $response->address->state;
        $address->zip_code = $response->address->zip_code;
        $address->save();

        $address = new UserPhone();
        $address->user_id = $informations->id;
        $address->area_code = $response->phone->area_code;
        $address->extension = $response->phone->extension;
        $address->number = $response->phone->number;
        $address->verified = $response->phone->verified;
        $address->save();


        $user = UserInformations::where('user_id', $response->id)->first();

        $to = [
          Auth::user()->name => Auth::user()->email,
        ];

        \Mail::to($to)->send(new CadastroMail($user));

        flash("Olá " . $user->first_name . ", sejá bem vindo ao StockAdmin, para controle dos seus produtos no Mercado Livre.")->success()->important();
    }

}
