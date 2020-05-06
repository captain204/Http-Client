<?php 
namespace App\Traits;
use GuzzleHttp\Client;

trait ConsumesExternalServices
{
    /**
     * Send a request to any service
     * [Make request description]
     * @return stdClass/string
    */
    public function makeRequest($method, $requestUrl, $queryParams=[], 
    $formsParams=[], $headers=[])
    {
        $client = new Client([
            'base_uri'=>$this->baseUri,
        ]);
        if(method_exists($this, 'resolveAuthorization')){
            $this->resolveAuthorization($queryParams,$formsParams,$formsParams);
        }
        $response = $client->request($method, $requestUrl,[
            'query' => $queryParams,
            'form_param'=> $formsParams,
            'headers'=>$headers
        ]);

        $response = $response->getBody()->getContents();

        if(method_exists($this,'decodeResponse')){
            $this->decodeResponse($response);
        }

        if(method_exists($this, 'checkIfErrorResponse')){
            $this->checkIfErrorResponse($response);
        }

        return $response;

    }



}

?>