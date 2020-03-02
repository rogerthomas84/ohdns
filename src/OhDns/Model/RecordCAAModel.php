<?php
namespace OhDns\Model;

/**
 * Class RecordCAAModel
 * @package OhDns\Model
 */
class RecordCAAModel extends AbstractDnsRecordModel
{
    /**
     * @var int|null
     */
    protected $flags = null;

    /**
     * @var string|null
     */
    protected $tag = null;

    /**
     * @var string|null
     */
    protected $value = null;

    /**
     * A flags byte which implements an extensible signaling system for future
     * use. As of 2018, only the issuer critical flag has been defined, which
     * instructs certificate authorities that they must understand the
     * corresponding property tag before issuing a certificate. This flag
     * allows the protocol to be extended in the future with mandatory
     * extensions, similar to critical extensions in X.509 certificates.
     *
     * @return string|null
     */
    public function getFlags()
    {
        return $this->flags;
    }

    /**
     * Get the tag value. Possible values include:
     *      issue -     This property authorizes the holder of the domain
     *                  specified in associated property value to issue
     *                  certificates for the domain for which the property
     *                  is published.
     *      issuewild - This property acts like issue but only authorizes the
     *                  issuance of wildcard certificates, and takes precedence
     *                  over the issue property for wildcard certificate
     *                  requests.
     *      iodef -     This property specifies a method for certificate
     *                  authorities to report invalid certificate requests to
     *                  the domain name holder using the Incident Object
     *                  Description Exchange Format. As of 2018, not all
     *                  certificate authorities support this tag, so there is
     *                  no guarantee that all certificate issuances will be
     *                  reported.
     *
     * @return string|null
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * The value associated with the chosen property tag.
     *
     * @return string|null
     */
    public function getValue()
    {
        return $this->value;
    }
}
