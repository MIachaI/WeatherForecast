<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 01.06.17
 * Time: 22:25
 */

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WeatherController extends Controller
{
    /**
     * @Route("/weather")
     */

    public function showAction()
    {
        $user_city = $_GET['city'];
        $api_url = "http://api.openweathermap.org/data/2.5/weather?q=". $user_city . ",pl&appid=ee13ce11b5ce9bc77e5e7c8856232a34";
        // $api_url = "http://api.openweathermap.org/data/2.5/weather?q=warsaw,pl&appid=ee13ce11b5ce9bc77e5e7c8856232a34";
        $weather_data = file_get_contents($api_url);
        $json = json_decode($weather_data, TRUE);
        $dlugosc_geograficzna = $json['coord']['lon'];
        $szerokosc_geograficzna = $json['coord']['lat'];
        $temp = $json['main']['temp'];
        $pressure = $json['main']['pressure'];
        $wilgotnosc = $json['main']['humidity'];

        return $this->render('default/weather.html', [
            'pogoda' => $weather_data,
            'dlugosc' => $dlugosc_geograficzna,
            'szerokosc' => $szerokosc_geograficzna,
            'temperatura' => $temp,
            'cisnienie' => $pressure,
            'wilgotnosc' => $wilgotnosc,
            'miasto' => $user_city
        ]);


    }


}