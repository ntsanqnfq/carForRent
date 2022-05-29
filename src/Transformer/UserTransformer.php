<?php

namespace Sang\CarForRent\Transformer;

use Sang\CarForRent\Model\ModelInterface;

class UserTransformer implements TransformerInterface
{
    private ?string $username;
    private ?string $password;

    public function formArray(array $params): UserTransformer
    {
        $this->username = $params['username'] ?? null;
        $this->password = $params['password'] ?? null;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param  string|null $username
     * @return $this
     */
    public function setUsername(?string $username): UserTransformer
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param  string|null $password
     * @return $this
     */
    public function setPassword(?string $password): UserTransformer
    {
        $this->password = $password;
        return $this;
    }

    public function transform(ModelInterface $model): array
    {
        // TODO: Implement transform() method.
    }
}
