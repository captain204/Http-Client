<?php

namespace App\Service;
use App\Traits\ConsumesExternalServices;

class MarketService
{
    
    use ConsumesExternalServices;
    /*
    * The URL to send the request
    * string
    */

    protected $base_uri;

    public function __constructor()
    {
        $this->base_uri = config('services.market.base_uri');
    }

    /**
     * Resolve the elements to send when authorizing a request 
    *  @return void
    */
    public function resolveAuthorization(&$queryparams, &$formsparams, &$headers)
    {


    }
    public function decodeResponse()
    {


    }
    public function checkIfErrorResponse()
    {


    }
    





}

?>