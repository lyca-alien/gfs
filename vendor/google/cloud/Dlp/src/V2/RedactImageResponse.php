<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/privacy/dlp/v2/dlp.proto

namespace Google\Cloud\Dlp\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Results of redacting an image.
 *
 * Generated from protobuf message <code>google.privacy.dlp.v2.RedactImageResponse</code>
 */
class RedactImageResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * The redacted image. The type will be the same as the original image.
     *
     * Generated from protobuf field <code>bytes redacted_image = 1;</code>
     */
    private $redacted_image = '';
    /**
     * If an image was being inspected and the InspectConfig's include_quote was
     * set to true, then this field will include all text, if any, that was found
     * in the image.
     *
     * Generated from protobuf field <code>string extracted_text = 2;</code>
     */
    private $extracted_text = '';
    /**
     * The findings. Populated when include_findings in the request is true.
     *
     * Generated from protobuf field <code>.google.privacy.dlp.v2.InspectResult inspect_result = 3;</code>
     */
    private $inspect_result = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $redacted_image
     *           The redacted image. The type will be the same as the original image.
     *     @type string $extracted_text
     *           If an image was being inspected and the InspectConfig's include_quote was
     *           set to true, then this field will include all text, if any, that was found
     *           in the image.
     *     @type \Google\Cloud\Dlp\V2\InspectResult $inspect_result
     *           The findings. Populated when include_findings in the request is true.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Privacy\Dlp\V2\Dlp::initOnce();
        parent::__construct($data);
    }

    /**
     * The redacted image. The type will be the same as the original image.
     *
     * Generated from protobuf field <code>bytes redacted_image = 1;</code>
     * @return string
     */
    public function getRedactedImage()
    {
        return $this->redacted_image;
    }

    /**
     * The redacted image. The type will be the same as the original image.
     *
     * Generated from protobuf field <code>bytes redacted_image = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setRedactedImage($var)
    {
        GPBUtil::checkString($var, False);
        $this->redacted_image = $var;

        return $this;
    }

    /**
     * If an image was being inspected and the InspectConfig's include_quote was
     * set to true, then this field will include all text, if any, that was found
     * in the image.
     *
     * Generated from protobuf field <code>string extracted_text = 2;</code>
     * @return string
     */
    public function getExtractedText()
    {
        return $this->extracted_text;
    }

    /**
     * If an image was being inspected and the InspectConfig's include_quote was
     * set to true, then this field will include all text, if any, that was found
     * in the image.
     *
     * Generated from protobuf field <code>string extracted_text = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setExtractedText($var)
    {
        GPBUtil::checkString($var, True);
        $this->extracted_text = $var;

        return $this;
    }

    /**
     * The findings. Populated when include_findings in the request is true.
     *
     * Generated from protobuf field <code>.google.privacy.dlp.v2.InspectResult inspect_result = 3;</code>
     * @return \Google\Cloud\Dlp\V2\InspectResult|null
     */
    public function getInspectResult()
    {
        return $this->inspect_result;
    }

    public function hasInspectResult()
    {
        return isset($this->inspect_result);
    }

    public function clearInspectResult()
    {
        unset($this->inspect_result);
    }

    /**
     * The findings. Populated when include_findings in the request is true.
     *
     * Generated from protobuf field <code>.google.privacy.dlp.v2.InspectResult inspect_result = 3;</code>
     * @param \Google\Cloud\Dlp\V2\InspectResult $var
     * @return $this
     */
    public function setInspectResult($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dlp\V2\InspectResult::class);
        $this->inspect_result = $var;

        return $this;
    }

}

