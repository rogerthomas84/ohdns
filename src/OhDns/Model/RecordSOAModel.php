<?php
namespace OhDns\Model;

/**
 * Class RecordSOAModel
 * @package OhDns\Model
 */
class RecordSOAModel extends AbstractDnsRecordModel
{
    /**
     * @var string|null
     */
    protected $mName = null;

    /**
     * @var string|null
     */
    protected $rName = null;

    /**
     * @var int|null
     */
    protected $serial = null;

    /**
     * @var int|null
     */
    protected $refresh = null;

    /**
     * @var int|null
     */
    protected $retry = null;

    /**
     * @var int|null
     */
    protected $expire = null;

    /**
     * @var int|null
     */
    protected $minimumTtl = null;

    /**
     * @var array
     */
    protected $fieldToFieldMap = [
        'mname' => 'mName',
        'rname' => 'rName',
        'minimum-ttl' => 'minimumTtl'
    ];

    /**
     * Get the primary master name server for this zone
     *
     * @return string|null
     */
    public function getMName()
    {
        return $this->mName;
    }

    /**
     * Email address of the administrator responsible for this zone. (As usual,
     * the email address is encoded as a name. The part of the email address
     * before the @ becomes the first label of the name; the domain name after
     * the @ becomes the rest of the name. In zone-file format, dots in labels
     * are escaped with backslashes; thus the email address
     * john.doe@example.com would be represented in a zone file as
     * john\.doe.example.com.)
     *
     * @return string|null
     */
    public function getRName()
    {
        return $this->rName;
    }

    /**
     * Serial number for this zone. If a secondary name server slaved to this
     * one observes an increase in this number, the slave will assume that the
     * zone has been updated and initiate a zone transfer.
     * @return int|null
     */
    public function getSerial()
    {
        return $this->serial;
    }

    /**
     * Get number of seconds after which secondary name servers should query
     * the master for the SOA record, to detect zone changes.
     *
     * @return int|null
     */
    public function getRefresh()
    {
        return $this->refresh;
    }

    /**
     * Get the number of seconds after which secondary name servers should
     * retry to request the serial number from the master if the master
     * does not respond. It must be less than Refresh.
     *
     * @return int|null
     */
    public function getRetry()
    {
        return $this->retry;
    }

    /**
     * Get the number of seconds after which secondary name servers should stop
     * answering request for this zone if the master does not respond. This
     * value must be bigger than the sum of Refresh and Retry.
     *
     * @return int|null
     */
    public function getExpire()
    {
        return $this->expire;
    }

    /**
     * Time to live for purposes of negative caching. Recommendation for small
     * and stable zones:[4] 172800 seconds (2 days). Originally this field had
     * the meaning of a minimum TTL value for resource records in this zone;
     * it was changed to its current meaning by RFC 2308
     *
     * @return int|null
     */
    public function getMinimumTtl()
    {
        return $this->minimumTtl;
    }
}
