<?php
namespace OhDns\Model;

/**
 * Class RecordOthersModel
 * @package OhDns\Model
 */
class RecordOthersModel extends AbstractDnsRecordModel
{
    /**
     * For any records that haven't been explicitly created in this library
     * this model serves as the catchall fallback.
     *
     * @param string $key
     * @return string|int|array|null
     */
    public function getKey($key)
    {
        if (isset($this->{$key})) {
            return $this->{$key};
        }
        if (array_key_exists($key, $this->unmappedFields)) {
            return $this->unmappedFields[$key];
        }

        return null;
    }
}
