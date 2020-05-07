<?php

namespace App\Services;

use App\Traits\AuthorizesMarketServices;
use App\Traits\ConsumesExternalServices;
use App\Traits\InteractWithMarketResponses;

class MarketService
{
    
    use ConsumesExternalServices,AuthorizesMarketServices,InteractWithMarketResponses;
    
    /**
     * The URL to send the requests
     * @var string
     */
    protected $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.market.base_uri');
    }


    /**
     * Obtains the list of products from api
     * @return stdClass 
    */

    public function getProducts()
    {
       return $this->makeRequest('GET','products');

    }

    /**
     * Obtains a products from api
     * @return stdClass 
    */

    public function getProduct($id)
    {
       return $this->makeRequest('GET','products/{$id}');

    }
    
    /**
     * Obtains the list of products from api
     * @return stdClass 
    */

    public function getCategories()
    {
       return $this->makeRequest('GET','categories');

    }

    /**
     * Obtains a products from api
     * @return stdClass 
    */

    public function getCategoryProducts($id)
    {
       return $this->makeRequest('GET','categories/{$id}/products');

    }
    
    


}

?>