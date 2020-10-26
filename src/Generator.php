<?php declare(strict_types=1);

namespace tiFy\Components\Wpsalt;

use Laminas\Math\Rand;

class Generator
{
    /**
     * List of characters to be used in the salt generation
     *
     * @var string $chars
     */
    private $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!#$%&()*+,-./:;<=>?@[]^_`{|}~';

    /**
     * Generates 64 character salt string
     *
     * @return string
     */
    public function salt(): string
    {
        return Rand::getString(64, $this->chars);
    }
}
