<?php

namespace tiFy\Components\Wpsalt;

use RandomLib\Factory;

class Generator
{
    /**
     * @var Factory $factory
     */
    private $factory;

    /**
     * List of characters to be used in the salt generation
     *
     * @var string $chars
     */
    private $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!#$%&()*+,-./:;<=>?@[]^_`{|}~';

    /**
     * @param Factory $factory
     */
    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * Generates 64 character salt string
     *
     * @return string
     */
    public function salt(): string
    {
        return $this->factory->getMediumStrengthGenerator()
            ->generateString(64, $this->chars);
    }
}
