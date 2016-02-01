<?php
/*
 * iDimensionz/{sendgrid-webapi-v3}
 * ContactsApi.php
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

namespace iDimensionz\SendGridWebApiV3\Api\Contacts;

use iDimensionz\SendGridWebApiV3\Api\SendGridApiEndpointAbstract;
use iDimensionz\SendGridWebApiV3\SendGridRequest;

class ContactsApi extends SendGridApiEndpointAbstract
{
    const ENDPOINT = 'contactdb';

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
    public function getAllRecipients($page=1, $page_size=100)
    {
        $result = $this->get('recipients?page='.$page.'&page_size='.$page_size, ['decode_content'=>false]);
        
        $recipientsData = array();
        if ($result) {
            if (is_string($result)) {
                $result = json_decode($result);
            }
            if (is_array($result) && count($result) && isset($result['recipients'])) {
                $recipientsData = $result['recipients'];
            }
            if (is_object($result) && isset($result->recipients)) {
                $recipientsData = $result->recipients;
            }
        }

        $recipientsDto = [];
        if ($recipientsData) {
            foreach ($recipientsData as $recipientData) {
                $recipientsDto[] = new RecipientDto($recipientData);
            }
        }
        
        return $recipientsDto;
    }

    /**
     * @param array RecipientsDto
     * @return array
     * @throws \InvalidArgumentException
     */
    public function createRecipients($recipientsDto)
    {
        if (!is_array($recipientsDto) && $recipientsDto instanceof RecipientDto) {
            $recipientsDto = array($recipientsDto);
        }
        $recipientsData = [];
        foreach ($recipientsDto as $recipientDto) {
            $row = $recipientDto->getUpdatedFields();
            if (isset($row['custom_fields']) && count($row['custom_fields'])) {
                foreach ($row['custom_fields'] as $k=>$v) $row[$k] = $v;
                unset($row['custom_fields']);
            }
            $recipientsData[] = $row;
        }
        $result = $this->post('recipients', $recipientsData);
        return $result;
    }
    
    /**
     * @param string $recipientId UUID of the template to delete
     * @return bool  Returns true if the template was deleted. False otherwise.
     */
    public function deleteRecipient($recipientId)
    {
        $this->delete('recipients/'.$recipientId, ['decode_content'=>false]);
        return (bool)(204 == $this->getLastSendGridResponse()->getStatusCode());
    }
    
    
    
    /**
     * @param CustomFieldDto
     * @return array
     * @throws \InvalidArgumentException
     */
    public function createCustomField($customFieldDto)
    {
        $customFieldData = $customFieldDto->getUpdatedFields();
        $customFieldData = $this->post('custom_fields', $customFieldData);
        if (is_array($customFieldData) && isset($customFieldData['id'])) {
            $customFieldDto = new \iDimensionz\SendGridWebApiV3\Api\Contacts\CustomFieldDto($customFieldData);
            return $customFieldDto;
        }
    }
    
    
    
    /**
     * @param ListDto
     * @return array
     * @throws \InvalidArgumentException
     */
    public function createList($listDto)
    {
        $listData = $listDto->getUpdatedFields();
        $listData = $this->post('lists', $listData);
        if (is_array($listData) && isset($listData['id'])) {
            $listDto = new \iDimensionz\SendGridWebApiV3\Api\Contacts\ListDto($listData);
            return $listDto;
        }
    }
    
    
    /**
     * @param int $listId
     * @param string $recipientId
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function addRecipientToList($listId, $recipientId)
    {
        $this->post('lists/'.$listId.'/recipients/'.$recipientId, []);
        return (bool)(201 == $this->getLastSendGridResponse()->getStatusCode());
    }
    
    
}
 