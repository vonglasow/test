<?php

/**
 * Hoa
 *
 *
 * @license
 *
 * New BSD License
 *
 * Copyright © 2007-2017, Hoa community. All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *     * Redistributions of source code must retain the above copyright
 *       notice, this list of conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *     * Neither the name of the Hoa nor the names of its contributors may be
 *       used to endorse or promote products derived from this software without
 *       specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS AND CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

namespace Hoa\Test\Protocol;

use atoum;
use Hoa\Protocol;

/**
 * Class \Hoa\Test\Protocol\Vfs.
 *
 * Create the `hoa://Test/Vfs/` node.
 *
 * @copyright  Copyright © 2007-2017 Hoa community
 * @license    New BSD License
 */
class Vfs extends Protocol\Node
{
    /**
     * Component's name.
     *
     * @var string
     */
    protected $_name    = 'Vfs';

    /**
     * Current opened streams.
     *
     * @var array
     */
    protected $_streams = [];



    /**
     * Queue of the component.
     *
     * @param   string  $queue    Queue of the component (generally, a filename,
     *                            with probably a query).
     * @return  mixed
     */
    public function reach($queue = null)
    {
        if (null === $queue) {
            return null;
        }

        $components = parse_url($queue);
        $path       = &$components['path'];

        if (isset($this->_streams[$path])) {
            return $this->_streams[$path];
        }

        if (!isset($components['query'])) {
            return 'atoum:/' . Protocol::NO_RESOLUTION;
        }

        parse_str($components['query'], $queries);

        if ('directory' === $queries['type']) {
            $file              = atoum\mock\streams\fs\directory::get($path);
            $file->dir_opendir = true;
        } elseif ('file' === $queries['type']) {
            $file = atoum\mock\streams\fs\file::get($path);
        } else {
            return 'atoum:/' . Protocol::NO_RESOLUTION;
        }

        $parentDirectory = dirname($path);

        if (isset($this->_streams[$parentDirectory])) {
            $this->_streams[$parentDirectory]->dir_readdir[] = $file;
        }

        foreach ($queries as $query => $value) {
            switch ($query) {
                case 'atime':
                case 'ctime':
                case 'mtime':
                    $file->getStat()[$query] = intval($value);

                    break;

                case 'permissions':
                    $value = sprintf('%04d', $value);
                    $file->setPermissions($value);

                    break;
            }
        }

        $this->_streams[$path] = $file;

        return (string) $file;
    }
}
