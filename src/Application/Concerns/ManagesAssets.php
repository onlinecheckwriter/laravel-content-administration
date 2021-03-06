<?php

namespace Fjord\Application\Concerns;

trait ManagesAssets
{
    /**
     * Included css files..
     *
     * @var array
     */
    protected $styles = [];

    /**
     * Included scripts.
     *
     * @var array
     */
    protected $scripts = [];

    /**
     * Add script to the application.
     *
     * @param  string $src
     * @return $this
     */
    public function script($src)
    {
        if (in_array($src, $this->scripts)) {
            return;
        }

        $this->scripts[] = $src;

        return $this;
    }

    /**
     * Add css file to the application.
     *
     * @param  string $path
     * @return $this
     */
    public function style($path)
    {
        if (in_array($path, $this->styles)) {
            return;
        }

        $this->styles[] = $path;

        return $this;
    }

    /**
     * Get styles.
     *
     * @return array
     */
    public function getStyles()
    {
        return $this->styles;
    }

    /**
     * Get scripts.
     *
     * @return array
     */
    public function getScripts()
    {
        return $this->scripts;
    }
}
