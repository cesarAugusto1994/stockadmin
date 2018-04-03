<?php

namespace App\Helpers;

class Helper
{
    public static function getRegistros($classe)
    {
        $key = str_slug($classe);

        $itens = session()->get($key);

        if(!$itens) {

          $itens = $classe::all();

          session()->put($key, $itens);
        }

        return session()->get($key);
    }

    public static function clearCache($nome)
    {
        session()->forget('consulta-'.str_slug($nome));
    }
}
