<?php

namespace Vine;

use Guzzle\Http\Client;
use Guzzle\Http\Message\Request;
use Guzzle\Http\Exception\HttpException;

class Vine
{
    const BASE_URL = 'https://api.vineapp.com';

    protected $client;

    public function __construct($baseUrl = null)
    {
        if (is_null($baseUrl)) $baseUrl = self::BASE_URL;

        $this->client = new Client($baseUrl);
    }

    /**
     * @return \Guzzle\Http\Message\Response
     * @throws VineException
     */
    protected function makeRequest(Request $request)
    {
        try {
            $response = $this->client->send($request);
        } catch (HttpException $e) {
            throw new VineException('Error making request', null, $e);
        }

        return $response;
    }

    /**
     * Get the current most popular vines
     * @param int $page
     * @return array
     * @throws VineException
     */
    public function popularTimeline($page=0)
    {
        $request = $this->client->get('/timelines/popular');
        $response = $this->makeRequest($request);

        return $response->json();
    }

    /**
     * Get vines from a user
     * @param int $userId
     * @param int $page
     * @return array
     * @throws VineException
     */
    public function userTimeline($userId, $page=0)
    {
        $request = $this->client->get("/timelines/users/$userId");
        $response = $this->makeRequest($request);

        return $response->json();
    }

    /**
     * Get vines for a tag
     * @param string $tag
     * @param int $page
     * @return array
     * @throws VineException
     */
    public function tagTimeline($tag, $page=0)
    {
        $request = $this->client->get("/timelines/tags/$tag");
        $response = $this->makeRequest($request);

        return $response->json();
    }

    /**
     * Get a specific post
     * @param int $postId
     * @return array
     */
    public function get($postId)
    {
        $request = $this->client->get("/timelines/posts/$postId");
        $response = $this->makeRequest($request);

        return $response->json();
    }
}
