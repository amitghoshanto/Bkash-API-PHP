<?php

namespace App\Model;

use App\Exceptions\PkBkashException;

class Token
{


    private array $data;

    /**
     * @throws PkBkashException
     */
    public function __construct(array $data)
    {
        $this->data = $data;
        if ($this->getToken() == null){
            throw new PkBkashException($data['msg'] ?? 'Error fetching access token');
        }
    }

    /**
     * @return string|null
     */
    public function getTokenType(): ?string
    {
        return $this->data['token_type'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->data['id_token'] ?? null;
    }

    /**
     * @return int|null
     */
    public function getExpiresIn(): ?int
    {
        return $this->data['expires_in'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getRefreshToken(): ?string
    {
        return $this->data['refresh_token'] ?? null;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->data;
    }

}