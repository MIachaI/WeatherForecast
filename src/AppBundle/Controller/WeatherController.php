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
        $api_longterm_url = "http://api.openweathermap.org/data/2.5/forecast/daily?q=". $user_city.",pl&cnt=10&appid=ee13ce11b5ce9bc77e5e7c8856232a34";
        // $api_url = "http://api.openweathermap.org/data/2.5/weather?q=warsaw,pl&appid=ee13ce11b5ce9bc77e5e7c8856232a34";
        $weather_data = file_get_contents($api_url);
        $longterm_weather_data = file_get_contents($api_longterm_url);
        $json = json_decode($weather_data, TRUE);
        $longterm_json = json_decode($longterm_weather_data, true);
        $geoLongitude = $json['coord']['lon'];
        $geoLatitude = $json['coord']['lat'];
        $temperature = $json['main']['temp'];
        $pressure = $json['main']['pressure'];
        $humidity = $json['main']['humidity'];
        $windSpeed = $json['wind']['speed'];
        $clouds = $json['clouds']['all'];

        $longterm_temperature0 = $longterm_json['list']['0']['temp']['day'];
        $longterm_pressure0 = $longterm_json['list']['0']['pressure'];
//        $longterm_rain0 = $longterm_json['list']['0']['rain'];
        $longterm_icon0 = $longterm_json['list']['0']['weather']['0']['icon'];

        $longterm_temperature1 = $longterm_json['list']['1']['temp']['day'];
        $longterm_pressure1 = $longterm_json['list']['1']['pressure'];
//        $longterm_rain1 = $longterm_json['list']['1']['rain'];
        $longterm_icon1 = $longterm_json['list']['1']['weather']['0']['icon'];

        $longterm_temperature2 = $longterm_json['list']['2']['temp']['day'];
        $longterm_pressure2 = $longterm_json['list']['2']['pressure'];
     //   $longterm_rain2 = $longterm_json['list']['2']['rain'];
        $longterm_icon2 = $longterm_json['list']['2']['weather']['0']['icon'];

        $longterm_temperature3 = $longterm_json['list']['3']['temp']['day'];
        $longterm_pressure3 = $longterm_json['list']['3']['pressure'];
       // $longterm_rain3 = $longterm_json['list']['3']['rain'];
        $longterm_icon3 = $longterm_json['list']['3']['weather']['0']['icon'];

        $longterm_temperature4 = $longterm_json['list']['4']['temp']['day'];
        $longterm_pressure4 = $longterm_json['list']['4']['pressure'];
   //     $longterm_rain4 = $longterm_json['list']['4']['rain'];
        $longterm_icon4 = $longterm_json['list']['4']['weather']['0']['icon'];

        $longterm_temperature5 = $longterm_json['list']['5']['temp']['day'];
        $longterm_pressure5 = $longterm_json['list']['5']['pressure'];
     //   $longterm_rain5 = $longterm_json['list']['5']['rain'];
        $longterm_icon5 = $longterm_json['list']['5']['weather']['0']['icon'];

        $longterm_temperature6 = $longterm_json['list']['6']['temp']['day'];
        $longterm_pressure6 = $longterm_json['list']['6']['pressure'];
//        $longterm_rain6 = $longterm_json['list']['6']['rain'];
        $longterm_icon6 = $longterm_json['list']['6']['weather']['0']['icon'];

        $longterm_temperature7 = $longterm_json['list']['7']['temp']['day'];
        $longterm_pressure7 = $longterm_json['list']['7']['pressure'];
  //      $longterm_rain7 = $longterm_json['list']['7']['rain'];
        $longterm_icon7 = $longterm_json['list']['7']['weather']['0']['icon'];

        $longterm_temperature8 = $longterm_json['list']['8']['temp']['day'];
        $longterm_pressure8 = $longterm_json['list']['8']['pressure'];
    //    $longterm_rain8 = $longterm_json['list']['8']['rain'];
        $longterm_icon8 = $longterm_json['list']['8']['weather']['0']['icon'];

        $longterm_temperature9 = $longterm_json['list']['9']['temp']['day'];
        $longterm_pressure9 = $longterm_json['list']['9']['pressure'];
      //  $longterm_rain9 = $longterm_json['list']['9']['rain'];
        $longterm_icon9 = $longterm_json['list']['9']['weather']['0']['icon'];


        return $this->render('default/weather.html', [
            'weather' => $weather_data,
            'longitude' => $geoLongitude,
            'latitude' => $geoLatitude,
            'temperature' => $temperature,
            'pressure' => $pressure,
            'humidity' => $humidity,
            'usersCity' => $user_city,
            'windSpeed' =>$windSpeed,
            'clouds' => $clouds,
            'longterm_temperature0' => $longterm_temperature0,
            'longterm_pressure0' => $longterm_pressure0,
            //'longterm_rain0' => $longterm_rain0,
            'longterm_icon0' => $longterm_icon0,
            'longterm_temperature1' => $longterm_temperature1,
            'longterm_pressure1' => $longterm_pressure1,
          //  'longterm_rain1' => $longterm_rain1,
            'longterm_icon1' => $longterm_icon1,
            'longterm_temperature2' => $longterm_temperature2,
            'longterm_pressure2' => $longterm_pressure2,
        //    'longterm_rain2' => $longterm_rain2,
            'longterm_icon2' => $longterm_icon2,
            'longterm_temperature3' => $longterm_temperature3,
            'longterm_pressure3' => $longterm_pressure3,
      //      'longterm_rain3' => $longterm_rain3,
            'longterm_icon3' => $longterm_icon3,
            'longterm_temperature4' => $longterm_temperature4,
            'longterm_pressure4' => $longterm_pressure4,
    //        'longterm_rain4' => $longterm_rain4,
            'longterm_icon4' => $longterm_icon4,
            'longterm_temperature5' => $longterm_temperature5,
            'longterm_pressure5' => $longterm_pressure5,
  //          'longterm_rain5' => $longterm_rain5,
            'longterm_icon5' => $longterm_icon5,
            'longterm_temperature6' => $longterm_temperature6,
            'longterm_pressure6' => $longterm_pressure6,
//            'longterm_rain6' => $longterm_rain6,
            'longterm_icon6' => $longterm_icon6,
            'longterm_temperature7' => $longterm_temperature7,
            'longterm_pressure7' => $longterm_pressure7,
            //'longterm_rain7' => $longterm_rain7,
            'longterm_icon7' => $longterm_icon7,
            'longterm_temperature8' => $longterm_temperature8,
            'longterm_pressure8' => $longterm_pressure8,
          //  'longterm_rain8' => $longterm_rain8,
            'longterm_icon8' => $longterm_icon8,
            'longterm_temperature9' => $longterm_temperature9,
            'longterm_pressure9' => $longterm_pressure9,
        //    'longterm_rain9' => $longterm_rain9,
        'longterm_icon9' => $longterm_icon9
        ]);


    }


}