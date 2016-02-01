<?php
/*
 * iDimensionz/{sendgrid-webapi-v3}
 * CustomFieldDto.php
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

class ListDto
{
    /**
     * @var string $id
     */
    private $id;
    /**
     * @var string $name
     */
    private $name;
    /**
     * @var string $recipient_count
     */
    private $recipient_count;

    /**
     * @param array $profile
     */
    public function __construct($row = [])
    {
        if (isset($row['id']))              $this->setId($row['id']);
        if (isset($row['name']))            $this->setName($row['name']);
        if (isset($row['recipient_count'])) $this->setRecipientCount($row['recipient_count']);
        
        // Mark all fields as unmodified.
        $this->setUpdatedFields([]);
    }


    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
        //$this->addUpdatedField('id', $id);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
        $this->addUpdatedField('name', $name);
    }
    
    /**
     * @return int
     */
    public function getRecipientCount()
    {
        return $this->recipient_count;
    }
    /**
     * @param int $recipient_count
     */
    public function setRecipientCount($recipient_count)
    {
        $this->recipient_count = $recipient_count;
        //$this->addUpdatedField('recipient_count', $recipient_count);
    }
    

    /**
     * @return array
     */
    public function getCustomFields()
    {
        return $this->custom_fields;
    }
    /**
     * @param array $custom_fields
     */
    public function setCustomFields($custom_fields)
    {
        $this->custom_fields = $custom_fields;
        //$this->addUpdatedField('custom_fields', $custom_fields);
    }


    /**
     * @return array
     */
    public function getUpdatedFields()
    {
        return $this->updatedFields;
    }

    /**
     * @param array $updatedFields
     */
    public function setUpdatedFields($updatedFields)
    {
        $this->updatedFields = $updatedFields;
    }

    /**
     * @param $field
     * @param $value
     */
    public function addUpdatedField($field, $value)
    {
        $this->updatedFields[$field] = $value;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $output = [];
        $output['id'] = $this->getId();
        $output['name'] = $this->getName();
        $output['recipient_count'] = $this->getRecipientCount();

        return $output;
    }
}
 