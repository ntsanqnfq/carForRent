<?php
namespace Sang\CarForRent\Validation;
use Sang\CarForRent\Bootstrap\Validation;

class LoginValidation extends Validation
{
    public string $username;
    public string $password;

    public function __construct()
    {
    }

    public function rules(): array
    {
        return [
            'username' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED],
        ];
    }
}