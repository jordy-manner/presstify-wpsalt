<?php

namespace tiFy\Components\Wpsalt;

use RandomLib\Factory;

/**
 * Class Wpsalt
 *
 * @desc Extension PresstiFy de gestion l'interface d'administration de Wordpress.
 * @author Jordy Manner <jordy@milkcreation.fr>
 * @package tiFy\Components\Wpsalt
 * @version 1.0.0
 *
 * Fork du dépot original de Rob Waller
 * @see https://github.com/RobDWaller/wordpress-salts-generator
 */
class Wpsalt
{
    /**
     * Generate and return all the WordPress salts as an array.
     *
     * @return array
     */
    public function wordPressSalts(): array
    {
        $generator = new Generator(new Factory());

        $salts['AUTH_KEY'] = $generator->salt();
        $salts['SECURE_AUTH_KEY'] = $generator->salt();
        $salts['LOGGED_IN_KEY'] = $generator->salt();
        $salts['NONCE_KEY'] = $generator->salt();
        $salts['AUTH_SALT'] = $generator->salt();
        $salts['SECURE_AUTH_SALT'] = $generator->salt();
        $salts['LOGGED_IN_SALT'] = $generator->salt();
        $salts['NONCE_SALT'] = $generator->salt();

        return $salts;
    }

    /**
     * Gets an array of WordPress salts and then reduces them to a string for
     * output to the CLI. Returns them in the traditional WordPress define
     * format used in wp-config.php files.
     *
     * @return string
     */
    public function traditional(): string
    {
        $salts = $this->wordPressSalts();

        return array_reduce(array_keys($salts), function ($saltsString, $key) use ($salts) {
            $saltsString .= "define('$key', '$salts[$key]');" . PHP_EOL;

            return $saltsString;
        }, '');
    }

    /**
     * Gets an array of WordPress salts and then reduces them to a string for
     * output to the CLI. Returns them in the DotEnv format used in .env files.
     *
     * @return string
     */
    public function dotEnv(): string
    {
        $salts = $this->wordPressSalts();

        return array_reduce(array_keys($salts), function ($saltsString, $key) use ($salts) {
            $saltsString .= "$key = '$salts[$key]'" . PHP_EOL;

            return $saltsString;
        }, '');
    }
}
