<?php

namespace Zhiyi\Plus\Support;

use Zhiyi\Plus\Models\File;
use Zhiyi\Plus\Contracts\File\UrlGenerator as FileUrlGeneratorContract;

abstract class FileUrlGenerator implements FileUrlGeneratorContract
{
    /**
     * The app of generator abstracts.
     *
     * @var array
     */
    private static $generators = [];

    /**
     * File data model.
     *
     * @var \Zhiyi\Plus\Models\File
     */
    protected $file;

    /**
     * Register a file URL generator abstract.
     *
     * @param string $name
     * @param string $abstract
     * @return void
     * @author Seven Du <shiweidu@outlook.com>
     */
    public static function registerGenerator(string $name, string $abstract)
    {
        static::$generators[$name] = $abstract;
    }

    /**
     * Get a generator abstract.
     *
     * @param string|null $name
     * @return array|string
     * @author Seven Du <shiweidu@outlook.com>
     */
    public static function getGeneratorAbstract(string $name = '')
    {
        if (! $name) {
            return static::$generator;
        }

        if (($abstract = static::$generators[$name] ?? false) !== false) {
            return $abstract;
        }

        return $name;
    }

    /**
     * Get file data model.
     *
     * @return \Zhiyi\Plus\Models\File
     * @author Seven Du <shiweidu@outlook.com>
     */
    protected function getFile(): File
    {
        return $file;
    }

    /**
     * Set file data model.
     *
     * @param \Zhiyi\Plus\Models\File $file
     * @author Seven Du <shiweidu@outlook.com>
     */
    protected function setFile(File $file)
    {
        $this->file = $file;

        return $this;
    }
}