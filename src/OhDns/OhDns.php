<?php
namespace OhDns;

use OhDns\Model\DnsRecordsModel;
use OhDns\Model\RecordAAAAModel;
use OhDns\Model\RecordAModel;
use OhDns\Model\RecordCAAModel;
use OhDns\Model\RecordCNAMEModel;
use OhDns\Model\RecordMXModel;
use OhDns\Model\RecordNSModel;
use OhDns\Model\RecordOthersModel;
use OhDns\Model\RecordSOAModel;
use OhDns\Model\RecordTXTModel;

/**
 * Class OhDnsService
 * @package OhDns
 */
class OhDns
{
    /**
     * Instance of this class
     *
     * @var OhDns
     */
    protected static $_instance = null;

    /**
     * @var DnsRecordsModel[]
     */
    protected $dnsAll = [];

    /**
     * @var DnsRecordsModel[]
     */
    protected $dnsMX = [];

    /**
     * @var DnsRecordsModel[]
     */
    protected $dnsNS = [];

    /**
     * @var DnsRecordsModel[]
     */
    protected $dnsA = [];

    /**
     * @var DnsRecordsModel[]
     */
    protected $dnsAAAA = [];

    /**
     * @var DnsRecordsModel[]
     */
    protected $dnsSOA = [];

    /**
     * @var DnsRecordsModel[]
     */
    protected $dnsTXT = [];

    /**
     * @var DnsRecordsModel[]
     */
    protected $dnsCNAME = [];

    /**
     * @var DnsRecordsModel[]
     */
    protected $dnsCAA = [];

    /**
     * Get the MX records for the domain.
     *
     * @param string $domain
     * @return RecordMXModel[]|false
     */
    public function getMXRecords($domain)
    {
        if (array_key_exists($domain, $this->dnsMX)) {
            $record = $this->dnsMX[$domain];
        } elseif (array_key_exists($domain, $this->dnsAll)) {
            $record = $this->dnsAll[$domain];
        } else {
            $record = $this->getRecord($domain, DNS_MX);
        }
        if ($record instanceof DnsRecordsModel) {
            if ($record->hasMX()) {
                $this->dnsMX[$domain] = $record;
                return $record->getMX();
            }
        }
        return false;
    }

    /**
     * Get the A records for the domain.
     *
     * @param string $domain
     * @return RecordAModel[]|false
     */
    public function getARecords($domain)
    {
        if (array_key_exists($domain, $this->dnsA)) {
            $record = $this->dnsA[$domain];
        } elseif (array_key_exists($domain, $this->dnsAll)) {
            $record = $this->dnsAll[$domain];
        } else {
            $record = $this->getRecord($domain, DNS_A);
        }
        if ($record instanceof DnsRecordsModel) {
            if ($record->hasA()) {
                $this->dnsA[$domain] = $record;
                return $record->getA();
            }
        }
        return false;
    }

    /**
     * Get the AAAA records for the domain.
     *
     * @param string $domain
     * @return RecordAAAAModel[]|false
     */
    public function getAAAARecords($domain)
    {
        if (array_key_exists($domain, $this->dnsAAAA)) {
            $record = $this->dnsAAAA[$domain];
        } elseif (array_key_exists($domain, $this->dnsAll)) {
            $record = $this->dnsAll[$domain];
        } else {
            $record = $this->getRecord($domain, DNS_AAAA);
        }
        if ($record instanceof DnsRecordsModel) {
            if ($record->hasAAAA()) {
                $this->dnsAAAA[$domain] = $record;
                return $record->getAAAA();
            }
        }
        return false;
    }

    /**
     * Get the NS records for the domain.
     *
     * @param string $domain
     * @return RecordNSModel[]|false
     */
    public function getNSRecords($domain)
    {
        if (array_key_exists($domain, $this->dnsNS)) {
            $record = $this->dnsNS[$domain];
        } elseif (array_key_exists($domain, $this->dnsAll)) {
            $record = $this->dnsAll[$domain];
        } else {
            $record = $this->getRecord($domain, DNS_NS);
        }
        if ($record instanceof DnsRecordsModel) {
            if ($record->hasNS()) {
                $this->dnsNS[$domain] = $record;
                return $record->getNS();
            }
        }
        return false;
    }

    /**
     * Get the SOA records for the domain.
     *
     * @param string $domain
     * @return RecordSOAModel[]|false
     */
    public function getSOARecords($domain)
    {
        if (array_key_exists($domain, $this->dnsSOA)) {
            $record = $this->dnsSOA[$domain];
        } elseif (array_key_exists($domain, $this->dnsAll)) {
            $record = $this->dnsAll[$domain];
        } else {
            $record = $this->getRecord($domain, DNS_SOA);
        }
        if ($record instanceof DnsRecordsModel) {
            if ($record->hasSOA()) {
                $this->dnsSOA[$domain] = $record;
                return $record->getSOA();
            }
        }
        return false;
    }

    /**
     * Get the TXT records for the domain.
     *
     * @param string $domain
     * @return RecordTXTModel[]|false
     */
    public function getTXTRecords($domain)
    {
        if (array_key_exists($domain, $this->dnsTXT)) {
            $record = $this->dnsTXT[$domain];
        } elseif (array_key_exists($domain, $this->dnsAll)) {
            $record = $this->dnsAll[$domain];
        } else {
            $record = $this->getRecord($domain, DNS_TXT);
        }
        if ($record instanceof DnsRecordsModel) {
            if ($record->hasTXT()) {
                $this->dnsTXT[$domain] = $record;
                return $record->getTXT();
            }
        }
        return false;
    }

    /**
     * Get the CNAME records for the domain.
     *
     * @param string $domain
     * @return RecordCNAMEModel[]|false
     */
    public function getCNAMERecords($domain)
    {
        if (array_key_exists($domain, $this->dnsCNAME)) {
            $record = $this->dnsCNAME[$domain];
        } elseif (array_key_exists($domain, $this->dnsAll)) {
            $record = $this->dnsAll[$domain];
        } else {
            $record = $this->getRecord($domain, DNS_CNAME);
        }
        if ($record instanceof DnsRecordsModel) {
            if ($record->hasCNAME()) {
                $this->dnsCNAME[$domain] = $record;
                return $record->getCNAME();
            }
        }
        return false;
    }

    /**
     * Get the CAA records for the domain.
     *
     * @param string $domain
     * @return RecordCAAModel[]|false
     */
    public function getCAARecords($domain)
    {
        if (array_key_exists($domain, $this->dnsCAA)) {
            $record = $this->dnsCAA[$domain];
        } elseif (array_key_exists($domain, $this->dnsAll)) {
            $record = $this->dnsAll[$domain];
        } else {
            $record = $this->getRecord($domain, DNS_CAA);
        }
        if ($record instanceof DnsRecordsModel) {
            if ($record->hasCAA()) {
                $this->dnsCAA[$domain] = $record;
                return $record->getCAA();
            }
        }
        return false;
    }

    /**
     * Fetch the model holding all of the DNS records.
     *
     * @param string $domain
     * @return DnsRecordsModel|false
     */
    public function getAllRecords($domain)
    {
        return $this->getRecord($domain, DNS_ALL);
    }

    /**
     * Get the record.
     *
     * @param string $domain
     * @param int $recordType
     * @return DnsRecordsModel|false
     */
    public function getRecord($domain, $recordType = DNS_ALL)
    {
        if ($domain !== $this->validateDomain($domain)) {
            return false;
        }
        if ($recordType === DNS_ALL) {
            if (array_key_exists($domain, $this->dnsAll)) {
                return $this->dnsAll[$domain];
            }
        }

        $records = dns_get_record($domain, $recordType);
        if (empty($records)) {
            return false;
        }
        return $this->inflate($domain, $records, $recordType);
    }

    protected function inflate($domain, $records, $recordType)
    {
        $data = [
            'domain' => $domain,
            'mx' => [],
            'a' => [],
            'aaaa' => [],
            'ns' => [],
            'soa' => [],
            'txt' => [],
            'cname' => [],
            'caa' => [],
            'others' => []
        ];
        foreach ($records as $record) {
            if ($record['type'] === 'MX') {
                $data['mx'][] = $record;
            } elseif ($record['type'] === 'A') {
                $data['a'][] = $record;
            } elseif ($record['type'] === 'NS') {
                $data['ns'][] = $record;
            } elseif ($record['type'] === 'AAAA') {
                $data['aaaa'][] = $record;
            } elseif ($record['type'] === 'SOA') {
                $data['soa'][] = $record;
            } elseif ($record['type'] === 'TXT') {
                $data['txt'][] = $record;
            } elseif ($record['type'] === 'CNAME') {
                $data['cname'][] = $record;
            } elseif ($record['type'] === 'CAA') {
                $data['caa'][] = $record;
            } else {
                $data['others'][] = $record;
            }
        }

        $inflate = DnsRecordsModel::inflateSingleArray(
            $data
        );
        if ($recordType === DNS_ALL) {
            $this->dnsAll[$domain] = $inflate;
        }
        return $inflate;
    }

    /**
     * @param string $domain
     * @return mixed
     */
    protected function validateDomain($domain)
    {
        $length = strlen($domain);
        if (ctype_alnum(str_replace(':', '', $domain)) === true && $length >= 39 && $length <= 45) {
            // ipv6 address
            return $domain;
        }
        if (ctype_digit(str_replace('.', '', $domain)) === true && strlen($domain) < 16) {
            // ipv4 address
            return $domain;
        }
        return $domain;
    }

    /**
     * Retrieve an instance of this object
     *
     * @return OhDns
     */
    public static function getInstance()
    {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
}
