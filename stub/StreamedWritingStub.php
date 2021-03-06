<?php

namespace League\Flysystem\Stub;

use League\Flysystem\Adapter\Polyfill\StreamedWritingTrait;
use League\Flysystem\Config;
use League\Flysystem\Util;

class StreamedWritingStub
{
    /**
     * Stream fallback delegator.
     *
     * @param string   $path
     * @param resource $resource
     * @param Config   $config
     * @param string   $fallback
     *
     * @return mixed fallback result
     */
    protected function stream($path, $resource, Config $config, $fallback)
    {
        Util::rewindStream($resource);
        $contents = stream_get_contents($resource);
        $fallbackCall = array($this, $fallback);

        return call_user_func($fallbackCall, $path, $contents, $config);
    }

    /**
     * Write using a stream.
     *
     * @param string   $path
     * @param resource $resource
     * @param Config   $config
     *
     * @return mixed false or file metadata
     */
    public function writeStream($path, $resource, Config $config)
    {
        return $this->stream($path, $resource, $config, 'write');
    }

    /**
     * Update a file using a stream.
     *
     * @param string   $path
     * @param resource $resource
     * @param Config   $config   Config object or visibility setting
     *
     * @return mixed false of file metadata
     */
    public function updateStream($path, $resource, Config $config)
    {
        return $this->stream($path, $resource, $config, 'update');
    }

    public function write($path, $contents, Config $config)
    {
        return compact('path', 'contents');
    }

    public function update($path, $contents, Config $config)
    {
        return compact('path', 'contents');
    }
}
