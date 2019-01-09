<?php

namespace Developmint\NetlifyBuildHook;

use GuzzleHttp\Client;

class NetlifyBuildHook
{
    /** @var \GuzzleHttp\Client */
    protected $client;
    protected $id;
    protected $branch;
    protected $title;
    const BASE_URL = 'https://api.netlify.com/build_hooks/';

    /**
     * @param \GuzzleHttp\Client $client HTTP Client that'll trigger the hook
     * @param string $id string Hook identifier
     * @param string? $branch The branch that should be used for the build
     * @param string? $title The title for the deploy message on Netlify
     */
    public function __construct(Client $client, string $id, $title = null, $branch = null)
    {
        $this->client = $client;
        $this->id = $id;
        $this->title = $title;
        $this->branch = $branch;
    }

    public function trigger() : void
    {
        $this->client->post(self::BASE_URL . $this->id, [
            "query" => [
                'trigger_branch' => $this->branch,
                'trigger_title' => $this->title
            ]
        ]);
    }
}