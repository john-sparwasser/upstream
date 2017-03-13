<?php

namespace Upstream\Twitch;

use GuzzleHttp\Client;

abstract class TwitchRequest
{
    private $client;
    static $REDIRECT_URI = 'oauth_callback';

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.twitch.tv/',
        ]);
    }

    protected function getRedirectUrl()
    {
        return url(self::REDIRECT_URI);
    }

    abstract protected function perform();

}
