<?php namespace Upstream\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TwitchOauthController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function oauthCallback()
    {
        // We use some object wrappers to abstract and simplify the CURL calls

        // First retrieve the access token from twitch
        $tokenRequest = new TwitchTokenRequest($this->input->get("code"));
        $tokenResponse = $tokenRequest->perform();
        $accessRoken = $tokenResponse->getAccessToken();

        // Next get the user associated with this access token
        $userRequest = new TwitchUserRequest($accessToken);
        $user = $userRequest->perform();

        $followRequest = new Twitch_User_Request($accessToken, $user->name);
        $followResponse = $followRequest->perform();

        // Now we pass the token to a static function that associates the session with this user.
        // If the user has never logged in before we create a new user entry on our side and log them in,
        // if the user exists we update their access token and log them in.

        return redirect(url(''));
    }
}
