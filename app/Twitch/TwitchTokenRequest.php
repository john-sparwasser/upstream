<?php

namespace Upstream\Twitch;



class TwitchTokenRequest extends TwitchRequest
{
    private $body;
    static $ENDPOINT = 'kraken/oauth2/token';

    public function __construct(TwitchOauthSession $oauth)
    {
        $this->body = [
            'client_id' => env('TWITCH_CLIENT_ID'),
            'client_secret' => env('TWITCH_CLIENT_SECRET'),
            'grant_type' => $oauth->getGrantType(),
            'redirect_uri' => $this->getRedirectUrl(),
            'code' => $code,
            'state' => $oauth->getUniqueToken(),
        ];
    }
}
