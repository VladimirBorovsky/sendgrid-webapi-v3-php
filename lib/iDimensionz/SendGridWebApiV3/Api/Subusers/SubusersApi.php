<?php
/*
 * iDimensionz/{sendgrid-webapi-v3}
 * SubuserApi.php
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

namespace iDimensionz\SendGridWebApiV3\Api\Subusers;

use iDimensionz\SendGridWebApiV3\Api\SendGridApiEndpointAbstract;
use iDimensionz\SendGridWebApiV3\SendGridRequest;

class SubusersApi extends SendGridApiEndpointAbstract
{
    const ENDPOINT = 'subusers';

    /**
     * @param SendGridRequest $sendGridRequest
     */
    public function __construct(SendGridRequest $sendGridRequest)
    {
        parent::__construct($sendGridRequest, self::ENDPOINT);
    }

    
    /**
     * @return 
     */
    public function getAllSubusers()
    {
        $result = $this->get('');
        var_dump($result); eixt();
        
        /*$templatesData = $result['templates'];
        $templateDtos = [];
        foreach ($templatesData as $templateData) {
            $templateDtos[] = new TemplateDto($templateData);
        }

        return $templateDtos;*/
    }

    /**
     * @param SubuserDto
     * @return SubuserDto
     * @throws \InvalidArgumentException
     */
    public function createSubuser(SubuserDto $subuserDto)
    {
        $subuserData = $subuserDto->getUpdatedFields();
        $result = $this->post('', $subuserData);
        //$templateDto = new TemplateDto($templateData);
var_dump($result); exit();
        return $result;
    }
    
    /**
     * @return 
     */
    public function getSubuser($subuserId)
    {
        $subuserData = $this->get("/{$subuserId}");
        $userProfileDto = new UserProfileDto($subuserData);
        return $userProfileDto;
    }

}
 