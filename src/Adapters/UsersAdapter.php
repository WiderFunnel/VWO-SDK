<?php

namespace WiderFunnel\Adapters;

use WiderFunnel\Items\User;

/**
 * Class UsersAdapter
 * @package WiderFunnel
 */
class UsersAdapter extends AdapterAbstract
{
    /**
     * @return static
     */
    public function find()
    {
        $response = $this->client->get("accounts/{$this->getAccountId()}/users/{$this->getResourceId()}");

        return User::createFromJson($response->getBody()->getContents());
    }

    /**
     * @param array $attributes
     * @return static
     */
    public function update(array $attributes)
    {
        $response = $this->client->patch("accounts/{$this->getAccountId()}/users/{$this->getResourceId()}", $attributes);

        return User::createFromJson($response->getBody()->getContents());
    }

    /**
     * @return static
     */
    public function delete()
    {
        $response = $this->client->delete("accounts/{$this->getAccountId()}/users/{$this->getResourceId()}");

        return $this->booleanResponse($response);
    }
}