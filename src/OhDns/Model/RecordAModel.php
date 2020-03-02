<?php
namespace OhDns\Model;

/**
 * Class RecordAModel
 * @package OhDns\Model
 */
class RecordAModel extends AbstractDnsRecordModel
{
    /**
     * @var string|null
     */
    protected $ip = null;

    /**
     * The IP address for the record, for example 81.82.83.84
     *
     * @return string|null
     */
    public function getIp()
    {
        return $this->ip;
    }
}
