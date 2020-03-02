<?php
namespace OhDns\Model;

use DtoInflator\DtoInflatorAbstract;

/**
 * Class DnsRecordsModel
 * @package OhDns\Model
 */
class DnsRecordsModel extends DtoInflatorAbstract
{
    /**
     * @var string
     */
    protected $domain = null;

    /**
     * @var RecordMXModel[]
     */
    protected $mx = [];

    /**
     * @var RecordAModel[]
     */
    protected $a = [];

    /**
     * @var RecordAAAAModel[]
     */
    protected $aaaa = [];

    /**
     * @var RecordNSModel[]
     */
    protected $ns = [];

    /**
     * @var RecordSOAModel[]
     */
    protected $soa = [];

    /**
     * @var RecordTXTModel[]
     */
    protected $txt = [];

    /**
     * @var RecordCNAMEModel[]
     */
    protected $cname = [];

    /**
     * @var RecordCAAModel[]
     */
    protected $caa = [];

    /**
     * @var RecordOthersModel[]
     */
    protected $others = [];

    /**
     * @var array
     */
    protected $keyToClassMap = [
        'mx' => RecordMXModel::class . '[]',
        'a' => RecordAModel::class . '[]',
        'aaaa' => RecordAAAAModel::class . '[]',
        'ns' => RecordNSModel::class . '[]',
        'soa' => RecordSOAModel::class . '[]',
        'txt' => RecordTXTModel::class . '[]',
        'cname' => RecordCNAMEModel::class . '[]',
        'caa' => RecordCAAModel::class . '[]',
        'others' => RecordOthersModel::class . '[]'
    ];

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @return bool
     */
    public function hasMX()
    {
        return count($this->getMX()) > 0;
    }

    /**
     * @return RecordMXModel[]
     */
    public function getMX()
    {
        return $this->mx;
    }

    /**
     * @return bool
     */
    public function hasA()
    {
        return count($this->getA()) > 0;
    }

    /**
     * @return RecordAModel[]
     */
    public function getA()
    {
        return $this->a;
    }

    /**
     * @return bool
     */
    public function hasAAAA()
    {
        return count($this->getAAAA()) > 0;
    }

    /**
     * @return RecordAAAAModel[]
     */
    public function getAAAA()
    {
        return $this->aaaa;
    }

    /**
     * @return bool
     */
    public function hasNS()
    {
        return count($this->getNS()) > 0;
    }

    /**
     * @return RecordNSModel[]
     */
    public function getNS()
    {
        return $this->ns;
    }

    /**
     * @return bool
     */
    public function hasSOA()
    {
        return count($this->getSOA()) > 0;
    }

    /**
     * @return RecordSOAModel[]
     */
    public function getSOA()
    {
        return $this->soa;
    }

    /**
     * @return bool
     */
    public function hasTXT()
    {
        return count($this->getTXT()) > 0;
    }

    /**
     * @return RecordTXTModel[]
     */
    public function getTXT()
    {
        return $this->txt;
    }

    /**
     * @return bool
     */
    public function hasCNAME()
    {
        return count($this->getCNAME()) > 0;
    }

    /**
     * @return RecordCNAMEModel[]
     */
    public function getCNAME()
    {
        return $this->cname;
    }

    /**
     * @return bool
     */
    public function hasCAA()
    {
        return count($this->getCAA()) > 0;
    }

    /**
     * @return RecordCAAModel[]
     */
    public function getCAA()
    {
        return $this->caa;
    }

    /**
     * @return bool
     */
    public function hasOtherRecords()
    {
        return count($this->getOtherRecords()) > 0;
    }

    /**
     * @return RecordOthersModel[]
     */
    public function getOtherRecords()
    {
        return $this->others;
    }
}
