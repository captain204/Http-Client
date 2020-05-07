<?php 

namespace App\Traits;

trait AuthorizesMarketServices
{
    
    /**
     * Resolve the elements to send when authorizing a request 
    *  @return void
    */
    public function resolveAuthorization(&$queryparams, &$formsparams, &$headers)
    {
        $accessToken = $this->resolveAccessToken();
        $headers['Authorization'] = $accessToken;
                
    }

    /*
    * Resolve a valid access token 
    * @return String
    */
    
    public function resolveAccessToken()
    {
        return 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBhNWNkYTUxZGQ4MmM5NmNhMzE5MjY4OWU0ZWQ4ODA1MGMwM2I0OGE0ZTNhN2Y2ZDc0ZjY1NThmMjc3YTFmNGE4ODdiYTFmMjk0MDlkYzQ3In0.eyJhdWQiOiIyIiwianRpIjoiMGE1Y2RhNTFkZDgyYzk2Y2EzMTkyNjg5ZTRlZDg4MDUwYzAzYjQ4YTRlM2E3ZjZkNzRmNjU1OGYyNzdhMWY0YTg4N2JhMWYyOTQwOWRjNDciLCJpYXQiOjE1ODg4NDg4MzYsIm5iZiI6MTU4ODg0ODgzNiwiZXhwIjoxNjIwMzg0ODM2LCJzdWIiOiIxMzMwIiwic2NvcGVzIjpbInB1cmNoYXNlLXByb2R1Y3QiLCJtYW5hZ2UtcHJvZHVjdHMiLCJtYW5hZ2UtYWNjb3VudCIsInJlYWQtZ2VuZXJhbCJdfQ.PbxNqdcmSHVJRXLNuKpzr-2kAvvl6S35VxcmH43iycA7X-DYIVXQThKplH3PM6fHErgZjRajF30rFj9XNkINBqZjYVD2oild2ozRHw6IdHhKtCTUglOJwqa0j6EqtRzlgZujlRUL53ohIy6dzdaJdbCQoKfL6xAC2E3CtbJSAd9REUYyzrYeZ8aAtTB-Cp7hPsRg_vrqf9EKH741vJNsJZb6J5OuNK6FeHoUc3OuhAE1A4JWdTzRBD4XptkJ0SZlgR9ImCIrTqQpip6V3qu1cMsqh53bBrBEEhnYQurOloiwiF_q3ZifSfvRQ2Pev2yw_Xm5dsFXz9lrTO4NT5LNP0xXhG5WagHwafPZEufauSftgiq_CjIYhPYufnp2E3zm1A_vhZb5Tml1Wco8GmxxBkftyQ7vVsl2tgFoeqVX8rKRA30JhtswxcbMfoKbzyn7H5ZBOY6xI_0i0Cx2ytuy2921D16cB4nml8i-R8MrGug9XShWfI5rIdkzGMrLgjn4pSDTcpXyKjA3QkRY23oqdiPV69ARhwcc2psyVnFeh3HTuHoEWprefLI66AKJJGiX13BEYq4qdztkSLaFIaC-W-TZlJy6hUIVJ1Jmt7lu-Ti8dUwdvehrlY7Mh3CpvZ8nhhaq9rTIn_F5Ijf-aomV_n_4lZcc3aqyfRBzYG_XkPc
        ';

    }



}




?>