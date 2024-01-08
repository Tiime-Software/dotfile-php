<?php

declare(strict_types=1);

namespace Dotfile\Service;

use Dotfile\Exception\DotfileApiException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\Exception\HttpExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

abstract class AbstractService
{
    public function __construct(
        protected HttpClientInterface $client,
        protected SerializerInterface $serializer,
    ) {
    }

    /**
     * @throws DotfileApiException
     */
    protected function getContent(ResponseInterface $response): string
    {
        try {
            return $response->getContent();
        } catch (HttpExceptionInterface|TransportExceptionInterface $e) {
            try {
                $content = $response->getContent(false);
            } catch (HttpExceptionInterface|TransportExceptionInterface $e) {
                $content = 'Unknown error';
            }

            throw new DotfileApiException($e->getMessage().' : '.$content, $e->getCode(), $e);
        }
    }
}
