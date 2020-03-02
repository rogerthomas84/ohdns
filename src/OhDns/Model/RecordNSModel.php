<?php
namespace OhDns\Model;

/**
 * Class RecordNSModel
 * @package OhDns\Model
 */
class RecordNSModel extends AbstractDnsRecordModel
{
    /**
     * @var string|null
     */
    protected $target = null;

    /**
     * The target for the record, for example 'joe.example.com'
     *
     * @return string|null
     */
    public function getTarget()
    {
        return $this->target;
    }
}
