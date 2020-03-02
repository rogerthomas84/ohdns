<?php
namespace OhDns\Model;

/**
 * Class RecordCNAMEModel
 * @package OhDns\Model
 */
class RecordCNAMEModel extends AbstractDnsRecordModel
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
