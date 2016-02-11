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
     * @param int $page
     * @param int $page_size
     * @return array
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
     * @param string $recipientId UUID of recipient to retrieve
     * @return RecipientDto
     */
    public function getRecipient($recipientId)
    {
        $recipientData = $this->get('recipients/'.$recipientId);
        $recipientDto = new RecipientDto($recipientData);
        return $recipientDto;
    }
    
    /**
     * @param array $recipientsDto
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
     * @param string $recipientId UUID of the Recipient to delete
     * @return bool  Returns true if the Recipient was deleted. False otherwise.
     */
    public function deleteRecipient($recipientId)
    {
        $this->delete('recipients/'.$recipientId, null, ['decode_content'=>false]);
        return (bool)(204 == $this->getLastSendGridResponse()->getStatusCode());
    }
    
    /**
     * @param array $recipientIds array of UUIDs of the Recipients to delete
     * @return bool  Returns true if the Recipients was deleted. False otherwise.
     */
    public function deleteRecipients($recipientIds)
    {
        $this->delete('recipients', $recipientIds, ['decode_content'=>false]);
        return (bool)(204 == $this->getLastSendGridResponse()->getStatusCode());
    }
    
    
    /**
     * @param CustomFieldDto $customFieldDto
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
     * @return array
     * @throws \InvalidArgumentException
     */
    public function getAllCustomFields()
    {
        $result = $this->get('custom_fields', ['decode_content'=>false]);

        $customFieldDtos = [];
        if (isset($result['custom_fields']) && is_array($result['custom_fields'])) {
            foreach ($result['custom_fields'] as $customFieldData) {
                $customFieldDtos[] = new CustomFieldDto($customFieldData);
            }
        }
        
        return $customFieldDtos;
    }
    
    
    /**
     * @param ListDto $listDto
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
     * @param string $listId UUID of List to retrieve
     * @return \iDimensionz\SendGridWebApiV3\Api\Contacts\ListDto
     */
    public function getList($listId)
    {
        $listData = $this->get('lists/'.$listId);
        $listDto = new ListDto($listData);
        return $listDto;
    } 
    
    /**
     * @param string $listId UUID of the List to delete
     * @return bool  Returns true if the List was deleted. False otherwise.
     */
    public function deleteList($listId)
    {
        $this->delete('lists/'.$listId, null, ['decode_content'=>false]);
        return (bool)(204 == $this->getLastSendGridResponse()->getStatusCode());
    }
    
    
    /**
     * @param string $listId
     * @param string $recipientId
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function addRecipientToList($listId, $recipientId)
    {
        $this->post('lists/'.$listId.'/recipients/'.$recipientId, []);
        return (bool)(201 == $this->getLastSendGridResponse()->getStatusCode());
    }
    
    /**
     * @param string $listId
     * @param array $recipientIds
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function addRecipientsToList($listId, $recipientIds)
    {
        $this->post('lists/'.$listId.'/recipients', $recipientIds);
        return (bool)(201 == $this->getLastSendGridResponse()->getStatusCode());
    }
    
    
    /**
     * @param string $listId
     * @param int $page
     * @param int $page_size
     * @return array
     * @throws \InvalidArgumentException
     */
    public function getRecipientsInList($listId, $page=1, $page_size=100)
    {
        $result = $this->get('lists/'.$listId.'/recipients?page_size='.$page_size.'&page='.$page);
        
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
    
}
 