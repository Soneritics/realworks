<?php
/*
 * The MIT License
 *
 * Copyright 2016 Jordi Jolink.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
namespace Realworks\ZippedContent;

use Realworks\Exceptions\ZipExtensionRequired;
use Realworks\File\File;

/**
 * Class ZippedContent
 *
 * @package Realworks\ZippedContent
 * @author Jordi Jolink <mail@jordijolink.nl>
 */
class ZippedContent extends File
{
    /**
     * ZippedContent constructor.
     * Checks if the ZIP extension is installed.
     * @param string $filename
     * @throws ZipExtensionRequired
     */
    public function __construct($filename)
    {
        if (!extension_loaded('zip')) {
            throw new ZipExtensionRequired('The ZIP extension is required but not found on this system.');
        }

        parent::__construct($filename);
    }
}
