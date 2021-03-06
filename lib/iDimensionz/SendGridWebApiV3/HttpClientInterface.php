<?php
/*
 * iDimensionz/{sendgrid-webapi-v3}
 * HttpClientInterface.php
 *  
 * The MIT License (MIT)
 * 
 * Copyright (c) 2015 iDimensionz
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
*/

namespace iDimensionz\SendGridWebApiV3;

/**
 * Basic HTTP commands that any HTTP client must implement.
 * Interface HttpClientInterface
 * @package iDimensionz\SendGridWebApiV3
 */
interface HttpClientInterface
{
    public function __construct(array $config = []);

    /**
     * @param null $url
     * @param array $options
     * @return HttpResponseInterface
     */
    public function get($url = null, $options = []);

    /**
     * @param null $url
     * @param array $options
     * @return HttpResponseInterface
     */
    public function head($url = null, array $options = []);

    /**
     * @param null $url
     * @param array $options
     * @return HttpResponseInterface
     */
    public function delete($url = null, array $options = []);

    /**
     * @param null $url
     * @param array $options
     * @return HttpResponseInterface
     */
    public function put($url = null, array $options = []);

    /**
     * @param null $url
     * @param array $options
     * @return HttpResponseInterface
     */
    public function patch($url = null, array $options = []);

    /**
     * @param null $url
     * @param array $options
     * @return HttpResponseInterface
     */
    public function post($url = null, array $options = []);

    /**
     * @param null $url
     * @param array $options
     * @return HttpResponseInterface
     */
    public function options($url = null, array $options = []);

    /**
     * @param array $headers
     */
    public function setDefaultHeaders(array $headers);
}
 