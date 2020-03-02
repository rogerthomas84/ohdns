<?php
namespace OhDns\Model;

/**
 * Class RecordTXTModel
 * @package OhDns\Model
 */
class RecordTXTModel extends AbstractDnsRecordModel
{
    /**
     * @var string|null
     */
    protected $txt = null;

    /**
     * @var string[]
     */
    protected $entries = [];

    /**
     * Get the txt value of the record
     *
     * @return string|null
     */
    public function getTxt()
    {
        return $this->txt;
    }

    /**
     * Get the entries of the txt record
     *
     * @return string[]
     */
    public function getEntries()
    {
        return $this->entries;
    }
}
