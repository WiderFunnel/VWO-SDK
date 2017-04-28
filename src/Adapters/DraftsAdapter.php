<?php

namespace WiderFunnel\Adapters;

use WiderFunnel\Items\Draft;

/**
 * Class DraftsAdapter
 * @package WiderFunnel
 */
class DraftsAdapter extends AdapterAbstract
{
    /**
     * @param $draftId
     * @return static
     */
    public function find()
    {

        $response = $this->client->get("accounts/{$this->getAccountId()}/drafts/{$this->getResourceId()}");

        return Draft::createFromJson($response->getBody()->getContents());
    }

    /**
     * @param array $attributes
     * @return static
     */
    public function update(array $attributes)
    {

        $response = $this->client->patch("accounts/{$this->getAccountId()}/drafts/{$this->getResourceId()}", $attributes);

        return Draft::createFromJson($response->getBody()->getContents());
    }

    /**
     * @return static
     */
    public function delete()
    {
        $response = $this->client->delete("accounts/{$this->getAccountId()}/drafts/{$this->getResourceId()}");

        return $this->booleanResponse($response);
    }
}