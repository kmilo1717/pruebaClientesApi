<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    use HasFactory;

    public $api_key = null;
    public $token = 'TOKEN_PROV';
    public $nit = '555555001';
    public $date = '2019-07-30';
    //protected $user_email ='info@tooeasyenglish.com';

    public function __construct(){
        $this->api_key = $this->getToken();
    }

    public function getToken(){
        return self::sendRequest('GenerarToken/'.$this->nit.'/'.$this->token, []);
    }

    private static function sendRequest($calledFunction, $data,$method='GET'){

        $request_url = 'https://tablas.sispro.gov.co/WSSUMMIPRESNOPBS/api/'.$calledFunction;
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_URL,$request_url);
        curl_setopt($curl,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
        curl_setopt($curl,CURLOPT_CUSTOMREQUEST,$method);
        curl_setopt($curl,CURLOPT_HTTPHEADER,["content-type: application/json"]);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
        if($method=="POST" || $method=="PATCH"){
            curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($data));
        }
        $response = curl_exec($curl);
        $err = curl_error($curl);
        $code = curl_getinfo($curl)['http_code'];
        curl_close($curl);
        
        //Log::info('Zoom response: '.var_export($response,true));
        if ($err || ($code!=201 && $code!=200 && $code!=204)) {
            return false;
        }

        return json_decode($response);
    }

    public function getXFecha(){
        return self::sendRequest('DireccionamientoXFecha/'.$this->nit.'/'.$this->api_key.'/'.$this->date, []);
    }
 
}
