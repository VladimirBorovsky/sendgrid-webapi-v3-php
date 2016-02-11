<?php
/*
 * iDimensionz/{sendgrid-webapi-v3}
 * StatsDto.php
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

class StatsDto
{
    /**
     * @var string $date
     */
    private $date;
    /**
     * @var string $name
     */
    private $name;
    /**
     * @var string $type
     */
    private $type;
    /**
     * @var string $type
     */
    private $blocks;
    /**
     * @var int $bounce_drops
     */
    private $bounce_drops;
    /**
     * @var int $bounces
     */
    private $bounces;
    
    /**
     * @var array $clicks
     */
    private $clicks;
    /**
     * @var array $deferred
     */
    private $deferred;
    /**
     * @var array $delivered
     */
    private $delivered;
    /**
     * @var array $invalid_emails
     */
    private $invalid_emails;
    /**
     * @var array $opens
     */
    private $opens;
    /**
     * @var array $processed
     */
    private $processed;
    /**
     * @var array $requests
     */
    private $requests;
    /**
     * @var array $spam_report_drops
     */
    private $spam_report_drops;
    /**
     * @var array $spam_reports
     */
    private $spam_reports;
    /**
     * @var array $unique_clicks
     */
    private $unique_clicks;
    /**
     * @var array $unique_opens
     */
    private $unique_opens;
    /**
     * @var array $unsubscribe_drops
     */
    private $unsubscribe_drops;
    /**
     * @var array $unsubscribes
     */
    private $unsubscribes;
    
    
    /**
     * @param array $profile
     */
    public function __construct($row = [])
    {
        if (isset($row['date'])) $this->setDate($row['date']);
        if (isset($row['name'])) {
            $this->setName($row['name']);
        } else if (isset($row['stats']) && isset($row['stats'][0]) && isset($row['stats'][0]['name'])) {
            $this->setName($row['stats'][0]['name']);
        }
        
        if (isset($row['type'])) {
            $this->setType($row['type']);
        } else if (isset($row['stats']) && isset($row['stats'][0]) && isset($row['stats'][0]['type'])) {
            $this->setName($row['stats'][0]['type']);
        }
        
        if (isset($row['blocks'])) {
            $this->setBlocks($row['blocks']);
        } else if (isset($row['stats']) && isset($row['stats'][0]) && isset($row['stats'][0]['metrics']) && isset($row['stats'][0]['metrics']['blocks'])) {
            $this->setBlocks($row['stats'][0]['metrics']['blocks']);
        }
        
        if (isset($row['bounce_drops'])) {
            $this->setBounceDrops($row['bounce_drops']);
        } else if (isset($row['stats']) && isset($row['stats'][0]) && isset($row['stats'][0]['metrics']) && isset($row['stats'][0]['metrics']['bounce_drops'])) {
            $this->setBounceDrops($row['stats'][0]['metrics']['bounce_drops']);
        }
                
        if (isset($row['bounces'])) {
            $this->setBounces($row['bounces']);
        } else if (isset($row['stats']) && isset($row['stats'][0]) && isset($row['stats'][0]['metrics']) && isset($row['stats'][0]['metrics']['bounces'])) {
            $this->setBounces($row['stats'][0]['metrics']['bounces']);
        }
        
        if (isset($row['clicks'])) {
            $this->setClicks($row['clicks']);
        } else if (isset($row['stats']) && isset($row['stats'][0]) && isset($row['stats'][0]['metrics']) && isset($row['stats'][0]['metrics']['clicks'])) {
            $this->setClicks($row['stats'][0]['metrics']['clicks']);
        }
        
        if (isset($row['deferred'])) {
            $this->setDeferred($row['deferred']);
        } else if (isset($row['stats']) && isset($row['stats'][0]) && isset($row['stats'][0]['metrics']) && isset($row['stats'][0]['metrics']['deferred'])) {
            $this->setDeferred($row['stats'][0]['metrics']['deferred']);
        }
        
        if (isset($row['delivered'])) {
            $this->setDelivered($row['delivered']);
        } else if (isset($row['stats']) && isset($row['stats'][0]) && isset($row['stats'][0]['metrics']) && isset($row['stats'][0]['metrics']['delivered'])) {
            $this->setDelivered($row['stats'][0]['metrics']['delivered']);
        }
        
        if (isset($row['invalid_emails'])) {
            $this->setInvalidEmails($row['invalid_emails']);
        } else if (isset($row['stats']) && isset($row['stats'][0]) && isset($row['stats'][0]['metrics']) && isset($row['stats'][0]['metrics']['invalid_emails'])) {
            $this->setInvalidEmails($row['stats'][0]['metrics']['invalid_emails']);
        }
        
        if (isset($row['opens'])) {
            $this->setOpens($row['opens']);
        } else if (isset($row['stats']) && isset($row['stats'][0]) && isset($row['stats'][0]['metrics']) && isset($row['stats'][0]['metrics']['opens'])) {
            $this->setOpens($row['stats'][0]['metrics']['opens']);
        }
        
        if (isset($row['processed'])) {
            $this->setProcessed($row['processed']);
        } else if (isset($row['stats']) && isset($row['stats'][0]) && isset($row['stats'][0]['metrics']) && isset($row['stats'][0]['metrics']['processed'])) {
            $this->setProcessed($row['stats'][0]['metrics']['processed']);
        }
        
        if (isset($row['requests'])) {
            $this->setRequests($row['requests']);
        } else if (isset($row['stats']) && isset($row['stats'][0]) && isset($row['stats'][0]['metrics']) && isset($row['stats'][0]['metrics']['requests'])) {
            $this->setRequests($row['stats'][0]['metrics']['requests']);
        }
        
        if (isset($row['spam_report_drops'])) {
            $this->setSpamReportDrops($row['spam_report_drops']);
        } else if (isset($row['stats']) && isset($row['stats'][0]) && isset($row['stats'][0]['metrics']) && isset($row['stats'][0]['metrics']['spam_report_drops'])) {
            $this->setSpamReportDrops($row['stats'][0]['metrics']['spam_report_drops']);
        }
        
        if (isset($row['spam_reports'])) {
            $this->setSpamReports($row['spam_reports']);
        } else if (isset($row['stats']) && isset($row['stats'][0]) && isset($row['stats'][0]['metrics']) && isset($row['stats'][0]['metrics']['spam_reports'])) {
            $this->setSpamReports($row['stats'][0]['metrics']['spam_reports']);
        }
        
        if (isset($row['unique_clicks'])) {
            $this->setUniqueClicks($row['unique_clicks']);
        } else if (isset($row['stats']) && isset($row['stats'][0]) && isset($row['stats'][0]['metrics']) && isset($row['stats'][0]['metrics']['unique_clicks'])) {
            $this->setUniqueClicks($row['stats'][0]['metrics']['unique_clicks']);
        }
        
        if (isset($row['unique_opens'])) {
            $this->setUniqueOpens($row['unique_opens']);
        } else if (isset($row['stats']) && isset($row['stats'][0]) && isset($row['stats'][0]['metrics']) && isset($row['stats'][0]['metrics']['unique_opens'])) {
            $this->setUniqueOpens($row['stats'][0]['metrics']['unique_opens']);
        }
        
        if (isset($row['unsubscribe_drops'])) {
            $this->setUnsubscribeDrops($row['unsubscribe_drops']);
        } else if (isset($row['stats']) && isset($row['stats'][0]) && isset($row['stats'][0]['metrics']) && isset($row['stats'][0]['metrics']['unsubscribe_drops'])) {
            $this->setUnsubscribeDrops($row['stats'][0]['metrics']['unsubscribe_drops']);
        }
        
        if (isset($row['unsubscribes'])) {
            $this->setUnsubscribes($row['unsubscribes']);
        } else if (isset($row['stats']) && isset($row['stats'][0]) && isset($row['stats'][0]['metrics']) && isset($row['stats'][0]['metrics']['unsubscribes'])) {
            $this->setUnsubscribes($row['stats'][0]['metrics']['unsubscribes']);
        }
    }


    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
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
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getBlocks()
    {
        return $this->blocks;
    }
    /**
     * @param string $blocks
     */
    public function setBlocks($blocks)
    {
        $this->blocks = $blocks;
    }

    /**
     * @return int Unix Timestamp
     */
    public function getBounceDrops()
    {
        return $this->bounce_drops;
    }
    /**
     * @param int $bounce_drops
     */
    public function setBounceDrops($bounce_drops)
    {
        $this->bounce_drops = $bounce_drops;
    }
    
    /**
     * @return int Unix Timestamp
     */
    public function getBounces()
    {
        return $this->bounces;
    }
    /**
     * @param int $bounces
     */
    public function setBounces($bounces)
    {
        $this->bounces = $bounces;
    }

    /**
     * @return string
     */
    public function getClicks()
    {
        return $this->clicks;
    }
    /**
     * @param string $clicks
     */
    public function setClicks($clicks)
    {
        $this->clicks = $clicks;
    }
    
    /**
     * @return string
     */
    public function getDeferred()
    {
        return $this->deferred;
    }
    /**
     * @param string $deferred
     */
    public function setDeferred($deferred)
    {
        $this->deferred = $deferred;
    }
    
    /**
     * @return string
     */
    public function getDelivered()
    {
        return $this->delivered;
    }
    /**
     * @param string $delivered
     */
    public function setDelivered($delivered)
    {
        $this->delivered = $delivered;
    }
    
    /**
     * @return string
     */
    public function getInvalidEmails()
    {
        return $this->invalid_emails;
    }
    /**
     * @param string $invalid_emails
     */
    public function setInvalidEmails($invalid_emails)
    {
        $this->invalid_emails = $invalid_emails;
    }

    /**
     * @return string
     */
    public function getOpens()
    {
        return $this->opens;
    }
    /**
     * @param string $opens
     */
    public function setOpens($opens)
    {
        $this->opens = $opens;
    }

    /**
     * @return string
     */
    public function getProcessed()
    {
        return $this->processed;
    }
    /**
     * @param string $processed
     */
    public function setProcessed($processed)
    {
        $this->processed = $processed;
    }
    
    /**
     * @return string
     */
    public function getRequests()
    {
        return $this->requests;
    }
    /**
     * @param string $requests
     */
    public function setRequests($requests)
    {
        $this->requests = $requests;
    }
    
    /**
     * @return string
     */
    public function getSpamReportDrops()
    {
        return $this->spam_report_drops;
    }
    /**
     * @param string $spam_report_drops
     */
    public function setSpamReportDrops($spam_report_drops)
    {
        $this->spam_report_drops = $spam_report_drops;
    }
    
    /**
     * @return string
     */
    public function getSpamReports()
    {
        return $this->spam_reports;
    }
    /**
     * @param string $spam_reports
     */
    public function setSpamReports($spam_reports)
    {
        $this->spam_reports = $spam_reports;
    }
    
    /**
     * @return string
     */
    public function getUniqueClicks()
    {
        return $this->unique_clicks;
    }
    /**
     * @param string $unique_clicks
     */
    public function setUniqueClicks($unique_clicks)
    {
        $this->unique_clicks = $unique_clicks;
    }
    
    /**
     * @return string
     */
    public function getUniqueOpens()
    {
        return $this->unique_opens;
    }
    /**
     * @param string $unique_opens
     */
    public function setUniqueOpens($unique_opens)
    {
        $this->unique_opens = $unique_opens;
    }
    
    /**
     * @return string
     */
    public function getUnsubscribeDrops()
    {
        return $this->unsubscribe_drops;
    }
    /**
     * @param string $unsubscribe_drops
     */
    public function setUnsubscribeDrops($unsubscribe_drops)
    {
        $this->unsubscribe_drops = $unsubscribe_drops;
    }
    
    /**
     * @return string
     */
    public function getUnsubscribes()
    {
        return $this->unsubscribes;
    }
    /**
     * @param string $unsubscribes
     */
    public function setUnsubscribes($unsubscribes)
    {
        $this->unsubscribes = $unsubscribes;
    }
    
    
    
    /**
     * @return array
     */
    public function toArray()
    {
        $output = [];
        $output['date'] = $this->getDate();
        $output['name'] = $this->getName();
        $output['type'] = $this->getType();
        $output['blocks'] = $this->getBlocks();
        $output['bounce_drops'] = $this->getBounceDrops();
        $output['bounces'] = $this->getBounces();
        $output['clicks'] = $this->getClicks();
        $output['deferred'] = $this->getDeferred();
        $output['delivered'] = $this->getDelivered();
        $output['invalid_emails'] = $this->getInvalidEmails();
        $output['opens'] = $this->getOpens();
        $output['processed'] = $this->getProcessed();
        $output['requests'] = $this->getRequests();
        $output['spam_report_drops'] = $this->getSpamReportDrops();
        $output['spam_reports'] = $this->getSpamReports();
        $output['unique_clicks'] = $this->getUniqueClicks();
        $output['unique_opens'] = $this->getUniqueOpens();
        $output['unsubscribe_drops'] = $this->getUnsubscribeDrops();
        $output['unsubscribes'] = $this->getUnsubscribes();

        return $output;
    }
}
 