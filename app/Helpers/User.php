<?php

namespace App\Helpers;

use Ixudra\Curl\Facades\Curl;
use App\Models\{ UserInformations, UserIdentification, UserInternalTags, UserPhone, UserAddress };

class User
{

    public static function setUserInformations()
    {
        $user = UserInformations::all();

        if($user->isNotEmpty()) {
          return;
        }

        $ACCESS_TOKEN = "APP_USR-7942076642174757-032409-1c3f83ba6174ff8030f1886020de51cf-118688227";

        $response = Curl::to("https://api.mercadolibre.com/users/me?access_token=$ACCESS_TOKEN")
        ->get();

        $data = json_decode($response, true);

        //dd(json_decode($response, true));

        $informations = new UserInformations();
        $informations->user_id = $data['id'];
        $informations->nickname = $data['nickname'];
        $informations->registration_date = new \DateTime($data['registration_date']);
        $informations->first_name = $data['first_name'];
        $informations->last_name = $data['last_name'];
        $informations->gender = $data['gender'];
        $informations->country_id = $data['country_id'];
        $informations->email = $data['email'];
        $informations->user_type = $data['user_type'];
        $informations->logo = $data['logo'];
        $informations->points = $data['points'];
        $informations->site_id = $data['site_id'];
        $informations->permalink = $data['permalink'];
        $informations->seller_experience = $data['seller_experience'];
        $informations->secure_email = $data['secure_email'];
        $informations->save();

        $identification = new UserIdentification();
        $identification->user_id = $informations->id;
        $identification->number = $data['identification']['number'];
        $identification->type = $data['identification']['type'];
        $identification->save();

        foreach($data['internal_tags'] as $item) {
          $iternalTags = new UserInternalTags();
          $iternalTags->user_id = $informations->id;
          $iternalTags->name = $item;
          $iternalTags->save();
        }

        $address = new UserAddress();
        $address->user_id = $informations->id;
        $address->address = $data['address']['address'];
        $address->city = $data['address']['city'];
        $address->state = $data['address']['state'];
        $address->zip_code = $data['address']['zip_code'];
        $address->save();

        $address = new UserPhone();
        $address->user_id = $informations->id;
        $address->area_code = $data['phone']['area_code'];
        $address->extension = $data['phone']['extension'];
        $address->number = $data['phone']['number'];
        $address->verified = $data['phone']['verified'];
        $address->save();


    }

}
