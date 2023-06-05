<?php
namespace App\Helpers\Mpesa;
class Config {
    public function getBearerToken(): string
    {
        $public_key = env('MPESA_PUBLIC_KEY');
        $api_key = env('MPESA_API_KEY');

        $key = "-----BEGIN PUBLIC KEY-----\n";
        $key .= wordwrap($public_key, 60, "\n", true);
        $key .= "\n-----END PUBLIC KEY-----";
        $pk = openssl_get_publickey($key);
        openssl_public_encrypt($api_key, $token, $pk, OPENSSL_PKCS1_PADDING);

        return 'Bearer ' . base64_encode($token);
    }

    

    public function getApiHost(): String{
        $api_host = env('MPESA_API_HOST');
        return $api_host;
    }

    public function getOrigin(): String{
        $origin = env('MPESA_ORIGIN');
        return $origin;
    }

    
    public function getProviderCode(): String{
        $service_provider_code = env('MPESA_SERVICE_PROVIDER_CODE');
        return $service_provider_code;
    }
}
