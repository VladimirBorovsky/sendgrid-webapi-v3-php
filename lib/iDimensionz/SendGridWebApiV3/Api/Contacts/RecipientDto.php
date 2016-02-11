<?php
/*
 * iDimensionz/{sendgrid-webapi-v3}
 * RecipientDto.php
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

class RecipientDto
{
    /**
     * @var string $id
     */
    private $id;
    /**
     * @var string $email
     */
    private $email;
    /**
     * @var string $first_name
     */
    private $first_name;
    /**
     * @var string $first_name
     */
    private $last_name;
    /**
     * @var array $custom_fields
     */
    private $custom_fields;
    
    /**
     * @var int $created_at
     */
    private $created_at;
    /**
     * @var int $updated_at
     */
    private $updated_at;
    
    /**
     * @var array $last_clicked
     */
    private $last_clicked;
    /**
     * @var array $last_emailed
     */
    private $last_emailed;
    /**
     * @var array $last_opened
     */
    private $last_opened;
    
    /**
     * @var array Fields that have been updated.
     */
    private $updatedFields;

    /**
     * @param array $profile
     */
    public function __construct($recipient = [])
    {
        if (isset($recipient['email']))         $this->setEmail($recipient['email']);
        if (isset($recipient['first_name']))    $this->setFirstName($recipient['first_name']);
        if (isset($recipient['last_name']))     $this->setLastName($recipient['last_name']);
        $customFields = [];
        if (isset($recipient['custom_fields']) && is_array($recipient['custom_fields'])) {
            foreach ($recipient['custom_fields'] as $name=>$value) {
                if (is_array($value)) {
                    if (isset($value['name']) && isset($value['value'])) {
                        $customFields[$value['name']] = $value['value'];
                    }
                } else {
                    $customFields[$name] = $value;
                }
            }
        }
        $this->setCustomFields($customFields);

        if (isset($recipient['id']))            $this->setId($recipient['id']);
        if (isset($recipient['created_at']))    $this->setCreatedAt($recipient['created_at']);
        if (isset($recipient['updated_at']))    $this->setUpdatedAt($recipient['updated_at']);
        if (isset($recipient['last_clicked']))  $this->setLastClicked($recipient['last_clicked']);
        if (isset($recipient['last_emailed']))  $this->setLastEmailed($recipient['last_emailed']);
        if (isset($recipient['last_opened']))   $this->setLastOpened($recipient['last_opened']);

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
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
        $this->addUpdatedField('email', $email);
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }
    /**
     * @param string $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
        $this->addUpdatedField('first_name', $first_name);
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }
    /**
     * @param string $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
        $this->addUpdatedField('last_name', $last_name);
    }

    /**
     * @return int Unix Timestamp
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }
    /**
     * @param int $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
        //$this->addUpdatedField('created_at', $created_at);
    }
    
    /**
     * @return int Unix Timestamp
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
    /**
     * @param int $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
        //$this->addUpdatedField('updated_at', $updated_at);
    }

    /**
     * @return string
     */
    public function getLastClicked()
    {
        return $this->last_clicked;
    }
    /**
     * @param string $last_clicked
     */
    public function setLastClicked($last_clicked)
    {
        $this->last_clicked = $last_clicked;
        //$this->addUpdatedField('last_clicked', $last_clicked);
    }
    
    /**
     * @return string
     */
    public function getLastEmailed()
    {
        return $this->last_emailed;
    }
    /**
     * @param string $last_emailed
     */
    public function setLastEmailed($last_emailed)
    {
        $this->last_emailed = $last_emailed;
        //$this->addUpdatedField('last_emailed', $last_emailed);
    }
    
    /**
     * @return string
     */
    public function getLastOpened()
    {
        return $this->last_opened;
    }
    /**
     * @param string $last_opened
     */
    public function setLastOpened($last_opened)
    {
        $this->last_opened = $last_opened;
        //$this->addUpdatedField('last_opened', $last_opened);
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
        $this->addUpdatedField('custom_fields', $custom_fields);
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
        $output['email'] = $this->getEmail();
        $output['first_name'] = $this->getFirstName();
        $output['last_name'] = $this->getLastName();
        $output['custom_fields'] = $this->getCustomFields();
        $output['created_at'] = $this->getCreatedAt();
        $output['updated_at'] = $this->getUpdatedAt();
        $output['last_clicked'] = $this->getLastClicked();
        $output['last_emailed'] = $this->getLastEmailed();
        $output['last_opened'] = $this->getLastOpened();

        return $output;
    }
}
 