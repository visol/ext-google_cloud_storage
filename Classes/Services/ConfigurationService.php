<?php

namespace Visol\GoogleCloudStorage\Services;

/*
 * This file is part of the Visol/GoogleCloudStorage project under GPLv2 or later.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 */


/**
 * Class ConfigurationService
 */
class ConfigurationService
{
    /**
     * @var array
     */
    protected $configuration = [];

    /**
     * ConfigurationService constructor.
     */
    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * We retrieve / compute the final configuration
     */
    public function get(string $key): string
    {
        $value = (string)$this->configuration[$key];
        if (preg_match('/^%(.*)%$/', $value, $matches)) {
            $value = getenv($matches[1]);

            if ($value === false) {
                throw new \RuntimeException(sprintf('No value found for environment variable "%s"', $matches[1]), 1626948979);
            }

            $value = (string)$value;
        }
        return $value;

    }
}
