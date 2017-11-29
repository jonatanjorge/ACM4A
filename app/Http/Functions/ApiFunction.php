<?php namespace App\Http\Functions;

class ApiFunction{

    protected $urlBase;
    protected $header;
    protected $curl;
    protected $httpResult;
    protected $httpCode;

    public function __construct()
    {
        $apiKey = env("API_KEY", "");
        $this->urlBase = env("URL_BASE","");
        $this->header = [
            "Content-Type: application/json",
            "acm4a-key: ". $apiKey
        ];

    }


    public function call($url = '', $method = "GET", Array $body = []){

        //abrir la conexion
        $this->init($url);

        // definimos el método de la consulta
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, $method);

        // si el body tiene algún parámetro para mandar
        if(count($body) > 0){
            // pasamos a curl los parametros en json
            curl_setopt($this->curl,CURLOPT_POSTFIELDS, json_encode($body));
        }


        // Ejecuto
        // guardo la respuesta
        $this->httpResult = $this->exec();

        // guardo el codigo de status http
        $this->httpCode = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
    }

    public function getHttpCode(){
        return $this->httpCode;
    }

    public function getResult(){
        return json_decode($this->httpResult);
    }

    protected function init($url){
        $this->curl = curl_init();

        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->header);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
    }

    protected function exec(){
        return curl_exec($this->curl);
    }

    protected function close(){
        curl_close($this->curl);

    }
}