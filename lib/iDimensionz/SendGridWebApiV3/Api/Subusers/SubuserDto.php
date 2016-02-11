<?php
/*
 * iDimensionz/{sendgrid-webapi-v3}
 * SubuserDto.php
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

class SubuserDto
{
    /**
     * @var string $username
     */
    private $username;
    /**
     * @var string $email
     */
    private $email;
    /**
     * @var string $password
     */
    private $password;
    /**
     * @var array $ips
     */
    private $ips;


    /**
     * @var array Fields that have been updated.
     */
    private $updatedFields;

    /**
     * @param array $profile
     */
    public function __construct($subuser = [])
    {
        if (isset($subuser['username']))    $this->setUsername($subuser['username']);
        if (isset($subuser['email']))       $this->setEmail($subuser['email']);
        if (isset($subuser['password']))    $this->setPassword($subuser['password']);
        if (isset($subuser['ips']))         $this->setIps($subuser['ips']);
        // Mark all fields as unmodified.
        $this->setUpdatedFields([]);
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
        $this->addUpdatedField('username', $username);
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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
        $this->addUpdatedField('password', $password);
    }

    /**
     * @return string
     */
    public function getIps()
    {
        return $this->ips;
    }

    /**
     * @param array $ips
     */
    public function setIps($ips)
    {
        $this->ips = $ips;
        $this->addUpdatedField('ips', $ips);
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
        $output['username'] = $this->getUsername();
        $output['email'] = $this->getEmail();
        $output['password'] = $this->getPassword();
        $output['ips'] = $this->getIps();

        return $output;
    }
}
 