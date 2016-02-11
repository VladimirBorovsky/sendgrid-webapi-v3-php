<?php
/*
 * iDimensionz/{sendgrid-webapi-v3}
 * CategoriesApi.php
 *  
 * The MIT License (MIT)
 * 
 * Copyright (c) 2016
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

namespace iDimensionz\SendGridWebApiV3\Api\Categories;

use iDimensionz\SendGridWebApiV3\Api\SendGridApiEndpointAbstract;
use iDimensionz\SendGridWebApiV3\SendGridRequest;

class CategoriesApi extends SendGridApiEndpointAbstract
{
    const ENDPOINT = 'categories';

    /**
     * @param SendGridRequest $sendGridRequest
     */
    public function __construct(SendGridRequest $sendGridRequest)
    {
        parent::__construct($sendGridRequest, self::ENDPOINT);
    }

    /**
     * @param string|array $categories  Array of strings, The categories to get statistics for, up to 10
     * @param string $start_date  Date formatted as YYYY-MM-DD, The starting date of the statistics to retrieve
     * @param string $end_date  Date formatted as YYYY-MM-DD, The end date of the statistics to retrieve, Defaults to today
     * @param string $aggregated_by  Must be day|week|month, How to group the statistics
     * @return array
     * @throws \InvalidArgumentException
     */
    public function getStats($categories, $start_date, $end_date=null, $aggregated_by='day')
    {
        $command = 'stats';
        $sign = '?';
        if ($categories && is_string($categories)) {
            $command .= $sign . 'categories='.urlencode($categories);
            $sign = '&';
        }
        if ($categories && is_array($categories)) {
            foreach ($categories as $category) {
                if ($category) {
                    $command .= $sign . 'categories='.urlencode($category);
                    $sign = '&';
                }
            }
        }
        if ($start_date) {
            $command .= $sign . 'start_date='.$start_date;
            $sign = '&';
        }
        if ($end_date) {
            $command .= $sign . 'end_date='.$end_date;
            $sign = '&';
        }
        if ($aggregated_by) {
            $command .= $sign . 'aggregated_by='.$aggregated_by;
        }
        
        $result = $this->get($command);
        if (is_string($result)) {
            $result = json_decode($result);
        }
        
        /*if (is_array($result) && count($result)) {
            foreach ($result as $i=>$row) {
                if (isset($row['stats']) && isset($row['stats'][0])) {
                    $row = array_merge($row, $row['stats'][0]);
                }
                if (isset($row['metrics'])) {
                    $row = array_merge($row, $row['metrics']);
                }
                $result[$i] = $row;
            }
        }*/

        $statsDtos = [];
        if ($result) {
            foreach ($result as $row) {
                $statsDtos[] = new StatsDto($row);
            }
        }

        return $statsDtos;
    }

}
 