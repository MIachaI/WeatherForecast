<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
            //$user_city = $_GET['city'];
            $api_url = "http://api.openweathermap.org/data/2.5/weather?q=Warsaw,pl&appid=ee13ce11b5ce9bc77e5e7c8856232a34";
            $weather_data = file_get_contents($api_url);
            $json = json_decode($weather_data, TRUE);
            $dlugosc_geograficzna = $json['coord']['lon'];
            $szerokosc_geograficzna = $json['coord']['lat'];
            $temp = $json['main']['temp'];
            $pressure = $json['main']['pressure'];
            $wilgotnosc = $json['main']['humidity'];
        return $this->render('default/index.html.twig', [
            'pogoda' => $weather_data,
            'dlugosc' => $dlugosc_geograficzna,
            'szerokosc' => $szerokosc_geograficzna,
            'temperatura' => $temp,
            'cisnienie' => $pressure,
            'wilgotnosc' => $wilgotnosc
        ]);
    }

}
