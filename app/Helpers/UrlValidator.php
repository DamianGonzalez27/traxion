<?php 

namespace App\Helpers;

class UrlValidator 
{
    /**
     * Funcion para validar si es url real
     *
     * @param [type] $url
     * @return void
     */
    public static function validateUrl($url) {
        if( empty( $url ) ){
            return false;
        }
        $ch = curl_init( $url );
        curl_setopt( $ch, CURLOPT_TIMEOUT, 5 );
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 5 );
        curl_setopt( $ch, CURLOPT_NOBODY, true );
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $data = curl_exec( $ch );
        $httpcode = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
        curl_close( $ch );
        $accepted_response = array( 200, 301, 302 );
        if( in_array( $httpcode, $accepted_response ) ) {
            return true;
        } else {
            return false;
        }
    }
        
}