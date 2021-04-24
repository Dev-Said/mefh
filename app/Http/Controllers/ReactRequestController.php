<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Ressource;
use App\Models\Certificat;
use Illuminate\Http\Request;

class ReactRequestController extends Controller
{
    // renvoi le certificat, la ressource et/ou la faq d'une formation donnée
    // s'il y en a. Sinon renvoi hide pour cacher les liens où il n'y a rien
    public function getLiens($idFormation)
    {
        $liens = Array( ["certificat" => "", "ressource" => "", "faq" => ""] );

        $certificat = Certificat::where('formation_id', '=', $idFormation)
            ->get();

        if ($certificat->isEmpty()) {
            $liens["certificat"] = 'hide';
        } else {
            $liens["certificat"] = $certificat;
        }

        $ressource = Ressource::where('formation_id', '=', $idFormation)
            ->get();

        if ($ressource->isEmpty()) {
            $liens["ressource"] = 'hide';
        } else {
            $liens["ressource"] = $ressource;
        }

        $faq = Faq::where('formation_id', '=', $idFormation)
            ->get();

        if ($faq->isEmpty()) {
            $liens["faq"] = 'hide';
        } else {
            $liens["faq"] = $faq;
        }

        return $liens;


    }
}
