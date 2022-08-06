<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UrlControllerTest extends TestCase
{

    /**
     * Valida si es correcta la url y el método pero no se envían parámetros
     *
     * @return void
     */
    public function testUrlWhitoutParamsPost() 
    {
        $response = $this->postJson('/api/url');

        $response->assertStatus(401)
                ->assertJson([
                    'message' => 'Ocurrio un error', 
                    'data' => [
                        'The url field is required.'
                    ]
                ]);
    }

    /**
     * En caso de que los parámetros de la API esten, pero no sea una url existente
     *
     * @return void
     */
    public function testUrlNotExistPost() 
    {
        $response = $this->postJson('/api/url', ['url' => 'Sally']);
 
        $response->assertStatus(401)
            ->assertJson([
                'message' => 'Url inexistente',
            ]);
    }

    /**
     * Función para validar una petición exitosa
     * 
     * @return void
     */
    public function testUrlSuccessPost()
    {
        $response = $this->postJson('/api/url', [
            'url' => 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg'
        ]);

        $response->assertStatus(200);
    }


    /**
     * Función para validar la correcta creación de una url
     *
     * @return void
     */
    public function testUrlGetSuccessPost()
    {

        $url = 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg';

        $response = $this->postJson('/api/url', [
            'url' => $url
        ]);

        $getResponse = $this->get($response->decodeResponseJson()['urlEncoded']);

        $getResponse->assertStatus(200)
            ->assertJson([
                'message' => 'Ok',
                'originalUrl' => $url
            ]);
    }

    /**
     * Función para validar una url con un hash inexistente
     *
     * @return void
     */
    public function testUrlWhitHashUnexist()
    {
        $getResponse = $this->get('/api/url/hash');

        $getResponse->assertStatus(404)->assertJson([
            'message' => 'Resource not found'
        ]);
    }
}
