<?php
namespace OhDns\Model;

use DtoInflator\DtoInflatorAbstract;

/**
 * Class AbstractDnsRecordModel
 * @package OhDns\Model
 */
abstract class AbstractDnsRecordModel extends DtoInflatorAbstract
{
    /**
     * @var string|null
     */
    protected $host = null;

    /**
     * @var string|null
     */
    protected $class = null;

    /**
     * @var int|null
     */
    protected $ttl = null;

    /**
     * @var string|null
     */
    protected $type = null;

    /**
     * The host name, for example 'example.com'
     *
     * @return string|null
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * The class of the record, for example 'IN'
     *
     * @return string|null
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * The TTL for the record, for example 3600
     *
     * @return int|null
     */
    public function getTtl()
    {
        return $this->ttl;
    }

    /**
     * The type of the record, for example 'A', 'AAAA', 'MX', 'NS', etc...
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }
}
