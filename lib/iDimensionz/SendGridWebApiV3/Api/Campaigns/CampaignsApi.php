<?php
/*
 * iDimensionz/{sendgrid-webapi-v3}
 * CampaignsApi.php
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

namespace iDimensionz\SendGridWebApiV3\Api\Campaigns;

use iDimensionz\SendGridWebApiV3\Api\SendGridApiEndpointAbstract;
use iDimensionz\SendGridWebApiV3\SendGridRequest;

class CampaignsApi extends SendGridApiEndpointAbstract
{
    const ENDPOINT = 'campaigns';

    /**
     * @param SendGridRequest $sendGridRequest
     */
    public function __construct(SendGridRequest $sendGridRequest)
    {
        parent::__construct($sendGridRequest, self::ENDPOINT);
    }

    /**
     * @return CampaignDto[]
     */
    public function getAllCampaigns()
    {
        $result = $this->get('', ['decode_content'=>false]);
        $campaignsData = array();
        if ($result) {
            if (is_string($result)) {
                $result = json_decode($result);
            }
            if (is_array($result) && count($result) && isset($result['result'])) {
                $campaignsData = $result['result'];
            }
            if (is_object($result) && isset($result->result)) {
                $campaignsData = $result->result;
            }
        }
        
        $campaignsDto = [];
        if ($campaignsData) {
            foreach ($campaignsData as $campaignData) {
                $campaignsDto[] = new CampaignDto($campaignData);
            }
        }
        
        return $campaignsDto;
    }

    /**
     * @param CampaignDto
     * @return CampaignDto
     * @throws \InvalidArgumentException
     */
    public function createCampaign(CampaignDto $campaignDto)
    {
        $campaignData = $campaignDto->getUpdatedFields();
        $result = $this->post('', $campaignData);
        //$templateDto = new TemplateDto($templateData);
var_dump($result); exit();
        return $result;
    }

    /**
     * @param string $templateId UUID of template to retrieve
     * @return TemplateDto
     */
    public function getTemplate($templateId)
    {
        $templateData = $this->get("/{$templateId}");
        $templateDto = new TemplateDto($templateData);

        return $templateDto;
    }

    /**
     * @param string $templateId UUID of template to update
     * @param string $newName
     * @return TemplateDto
     */
    public function updateTemplate($templateId, $newName)
    {
        if (TemplateDto::MAX_LENGTH_NAME < strlen($newName)) {
            throw new \InvalidArgumentException('Name must be ' . TemplateDto::MAX_LENGTH_NAME . ' characters or less');
        }
        $options = ['name' => $newName];
        $templateData = $this->patch("/{$templateId}", $options);
        $templateDto = new TemplateDto($templateData);

        return $templateDto;
    }

    /**
     * @param string $templateId UUID of the template to delete
     * @return bool  Returns true if the template was deleted. False otherwise.
     */
    public function deleteTemplate($templateId)
    {
        $this->delete("/{$templateId}");
        return (bool)(204 == $this->getLastSendGridResponse()->getStatusCode());
    }
}
 