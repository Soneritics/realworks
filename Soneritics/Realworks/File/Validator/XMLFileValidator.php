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
namespace Realworks\File\Validator;

use Realworks\File\XMLFile;
use Realworks\File\XSDFile;
use Realworks\RoleInterface\IValidator;

/**
 * Class XMLFileValidator
 *
 * @package Realworks\File\Validator
 * @author Jordi Jolink <mail@jordijolink.nl>
 */
class XMLFileValidator implements IValidator
{
    /**
     * @var XMLFile
     */
    private $xmlFile;

    /**
     * @var XSDFile
     */
    private $xsdFile;

    /**
     * XMLFileValidator constructor.
     * @param XMLFile $xmlFile
     * @param XSDFile $xsdFile
     */
    public function __construct(XMLFile $xmlFile, XSDFile $xsdFile)
    {
        $this->xmlFile = $xmlFile;
        $this->xsdFile = $xsdFile;
    }

    /**
     * Validate the object.
     * @return boolean
     */
    public function isValid()
    {
        libxml_use_internal_errors(true);

        $feed = new \DOMDocument();
        $result = $feed->load($this->xmlFile->getFilename());
        if ($result === false) {
            return false;
        }

        return (bool)(@$feed->schemaValidate($this->xsdFile->getFilename()));
    }
}
