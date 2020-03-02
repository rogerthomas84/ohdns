<?php
namespace OhDns\Model;

/**
 * Class RecordMXModel
 * @package OhDns\Model
 */
class RecordMXModel extends AbstractDnsRecordModel
{
    /**
     * @var string|null
     */
    protected $priority = null;

    /**
     * @var string|null
     */
    protected $target = null;

    /**
     * @var array
     */
    protected $fieldToFieldMap = [
        'pri' => 'priority'
    ];

    /**
     * The priority of the record, for example 5
     *
     * @return string|null
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * The target for the record, for example 'mail.example.com'
     *
     * @return string|null
     */
    public function getTarget()
    {
        return $this->target;
    }
}
