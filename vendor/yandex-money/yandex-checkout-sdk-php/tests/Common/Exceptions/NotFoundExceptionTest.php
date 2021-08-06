<?php

namespace Tests\YandexCheckout\Common\Exceptions;

use YandexCheckout\Common\Exceptions\NotFoundException;

class NotFoundExceptionTest extends AbstractApiRequestExceptionTest
{
    public function getTestInstance($message = '', $code = 0, $responseHeaders = array(), $responseBody = null)
    {
        return new NotFoundException($responseHeaders, $responseBody);
    }

    public function expectedHttpCode()
    {
        return NotFoundException::HTTP_CODE;
    }
}
