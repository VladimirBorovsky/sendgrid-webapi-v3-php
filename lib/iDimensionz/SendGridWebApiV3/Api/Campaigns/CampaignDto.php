<?php
/*
 * iDimensionz/{sendgrid-webapi-v3}
 * CampaignDto.php
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

class CampaignDto
{
    const STATUS_DRAFT = 'Draft';
    const STATUS_SENT = 'Sent';

    /**
     * @var int $id
     */
    private $id;
    /**
     * @var string $title
     */
    private $title;
    /**
     * @var string $subject
     */
    private $subject;
    /**
     * @var int $sender_id
     */
    private $sender_id;
    /**
     * @var array $list_ids
     */
    private $list_ids;
    /**
     * @var array $segment_ids
     */
    private $segment_ids;
    /**
     * @var array $categories
     */
    private $categories;
    /**
     * @var int suppression_group_id
     */
    private $suppression_group_id;
    /**
     * @var string $custom_unsubscribe_url
     */
    private $custom_unsubscribe_url;
    /**
     * @var string $ip_pool
     */
    private $ip_pool;
    /**
     * @var string $html_content
     */
    private $html_content;
    /**
     * @var string $plain_content
     */
    private $plain_content;
    /**
     * @var string $status
     */
    private $status;

    /**
     * @var array Fields that have been updated.
     */
    private $updatedFields;

    /**
     * @param array $campaign
     */
    public function __construct($campaign = [])
    {
        if (isset($campaign['id']))                     $this->setId($campaign['id']);
        if (isset($campaign['title']))                  $this->setTitle($campaign['title']);
        if (isset($campaign['subject']))                $this->setSubject($campaign['subject']);
        if (isset($campaign['sender_id']))              $this->setSenderId($campaign['sender_id']);
        if (isset($campaign['list_ids']))               $this->setListIds($campaign['list_ids']);
        if (isset($campaign['segment_ids']))            $this->setSegmentIds($campaign['segment_ids']);
        if (isset($campaign['categories']))             $this->setCategories($campaign['categories']);
        if (isset($campaign['suppression_group_id']))   $this->setSuppressionGroupId($campaign['suppression_group_id']);
        if (isset($campaign['custom_unsubscribe_url'])) $this->setCustomUnsubscribeUrl($campaign['custom_unsubscribe_url']);
        if (isset($campaign['ip_pool']))                $this->setIpPool($campaign['ip_pool']);
        if (isset($campaign['html_content']))           $this->setHtmlContent($campaign['html_content']);
        if (isset($campaign['plain_content']))          $this->setPlainContent($campaign['plain_content']);
        if (isset($campaign['status']))                 $this->setStatus($campaign['status']);
        // Mark all fields as unmodified.
        $this->setUpdatedFields([]);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
        //$this->addUpdatedField('id', $id);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
        $this->addUpdatedField('title', $title);
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        $this->addUpdatedField('subject', $subject);
    }

    /**
     * @return int
     */
    public function getSenderId()
    {
        return $this->sender_id;
    }

    /**
     * @param int $sender_id
     */
    public function setSenderId($sender_id)
    {
        $this->sender_id = $sender_id;
        $this->addUpdatedField('sender_id', $sender_id);
    }

    /**
     * @return array
     */
    public function getListIds()
    {
        return $this->list_ids;
    }

    /**
     * @param array $list_ids
     */
    public function setListIds($list_ids)
    {
        $this->list_ids = $list_ids;
        $this->addUpdatedField('list_ids', $list_ids);
    }

    /**
     * @return array
     */
    public function getSegmentIds()
    {
        return $this->segment_ids;
    }

    /**
     * @param array $segment_ids
     */
    public function setSegmentIds($segment_ids)
    {
        $this->segment_ids = $segment_ids;
        $this->addUpdatedField('segment_ids', $segment_ids);
    }

    /**
     * @return array
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param array $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
        $this->addUpdatedField('categories', $categories);
    }

    /**
     * @return int
     */
    public function getSuppressionGroupId()
    {
        return $this->suppression_group_id;
    }

    /**
     * @param int $suppression_group_id
     */
    public function setSuppressionGroupId($suppression_group_id)
    {
        $this->suppression_group_id = $suppression_group_id;
        $this->addUpdatedField('suppression_group_id', $suppression_group_id);
    }

    /**
     * @return string
     */
    public function getCustomUnsubscribeUrl()
    {
        return $this->custom_unsubscribe_url;
    }

    /**
     * @param string $custom_unsubscribe_url
     */
    public function setCustomUnsubscribeUrl($custom_unsubscribe_url)
    {
        $this->custom_unsubscribe_url = $custom_unsubscribe_url;
        $this->addUpdatedField('custom_unsubscribe_url', $custom_unsubscribe_url);
    }

    /**
     * @return string
     */
    public function getIpPool()
    {
        return $this->ip_pool;
    }

    /**
     * @param string $ip_pool
     */
    public function setIpPool($ip_pool)
    {
        $this->ip_pool = $ip_pool;
        $this->addUpdatedField('ip_pool', $ip_pool);
    }

    /**
     * @return string
     */
    public function getHtmlContent()
    {
        return $this->html_content;
    }

    /**
     * @param string $html_content
     */
    public function setHtmlContent($html_content)
    {
        $this->html_content = $html_content;
        $this->addUpdatedField('html_content', $html_content);
    }
    
    /**
     * @return string
     */
    public function getPlainContent()
    {
        return $this->plain_content;
    }

    /**
     * @param string $plain_content
     */
    public function setPlainContent($plain_content)
    {
        $this->plain_content = $plain_content;
        $this->addUpdatedField('plain_content', $plain_content);
    }
    
    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
        //$this->addUpdatedField('status', $status);
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
        $output['title'] = $this->getTitle();
        $output['subject'] = $this->getSubject();
        $output['sender_id'] = $this->getSenderId();
        $output['list_ids'] = $this->getListIds();
        $output['segment_ids'] = $this->getSegmentIds();
        $output['categories'] = $this->getCategories();
        $output['suppression_group_id'] = $this->getSuppressionGroupId();
        $output['custom_unsubscribe_url'] = $this->getCustomUnsubscribeUrl();
        $output['ip_pool'] = $this->getIpPool();
        $output['html_content'] = $this->getHtmlContent();
        $output['plain_content'] = $this->getPlainContent();
        $output['status'] = $this->getStatus();

        return $output;
    }
}
 