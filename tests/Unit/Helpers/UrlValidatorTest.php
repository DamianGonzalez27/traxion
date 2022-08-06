<?php

namespace Tests\Unit\Helpers;

use PHPUnit\Framework\TestCase;
use App\Helpers\UrlValidator;

class UrlValidatorTest extends TestCase
{
    
    /**
     * Función para validar una cadena de caracteres inexistente
     *
     * @return void
     */
    public function testValidateRandomString()
    {
        $this->assertFalse(UrlValidator::validateUrl('lkjhkljhbo'));
    }

    public function testCalidateSuccessUrl() 
    {
        $this->assertTrue(UrlValidator::validateUrl('https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg'));
    }
}
