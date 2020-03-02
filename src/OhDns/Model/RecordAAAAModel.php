<?php
namespace OhDns\Model;

/**
 * Class RecordAAAAModel
 * @package OhDns\Model
 */
class RecordAAAAModel extends AbstractDnsRecordModel
{
    /**
     * @var string|null
     */
    protected $ipVSix = null;

    /**
     * @var array
     */
    protected $fieldToFieldMap = [
        'ipv6' => 'ipVSix'
    ];

    /**
     * The IP address for the record, for example 81.82.83.84
     *
     * @return string|null
     */
    public function getIpVSix()
    {
        return $this->ipVSix;
    }
}
