<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dialogflow/v2/audio_config.proto

namespace Google\Cloud\Dialogflow\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Instructs the speech recognizer how to process the audio content.
 *
 * Generated from protobuf message <code>google.cloud.dialogflow.v2.InputAudioConfig</code>
 */
class InputAudioConfig extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. Audio encoding of the audio content to process.
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.AudioEncoding audio_encoding = 1;</code>
     */
    private $audio_encoding = 0;
    /**
     * Required. Sample rate (in Hertz) of the audio content sent in the query.
     * Refer to
     * [Cloud Speech API
     * documentation](https://cloud.google.com/speech-to-text/docs/basics) for
     * more details.
     *
     * Generated from protobuf field <code>int32 sample_rate_hertz = 2;</code>
     */
    private $sample_rate_hertz = 0;
    /**
     * Required. The language of the supplied audio. Dialogflow does not do
     * translations. See [Language
     * Support](https://cloud.google.com/dialogflow/docs/reference/language)
     * for a list of the currently supported language codes. Note that queries in
     * the same session do not necessarily need to specify the same language.
     *
     * Generated from protobuf field <code>string language_code = 3;</code>
     */
    private $language_code = '';
    /**
     * If `true`, Dialogflow returns [SpeechWordInfo][google.cloud.dialogflow.v2.SpeechWordInfo] in
     * [StreamingRecognitionResult][google.cloud.dialogflow.v2.StreamingRecognitionResult] with information about the recognized speech
     * words, e.g. start and end time offsets. If false or unspecified, Speech
     * doesn't return any word-level information.
     *
     * Generated from protobuf field <code>bool enable_word_info = 13;</code>
     */
    private $enable_word_info = false;
    /**
     * A list of strings containing words and phrases that the speech
     * recognizer should recognize with higher likelihood.
     * See [the Cloud Speech
     * documentation](https://cloud.google.com/speech-to-text/docs/basics#phrase-hints)
     * for more details.
     * This field is deprecated. Please use [speech_contexts]() instead. If you
     * specify both [phrase_hints]() and [speech_contexts](), Dialogflow will
     * treat the [phrase_hints]() as a single additional [SpeechContext]().
     *
     * Generated from protobuf field <code>repeated string phrase_hints = 4 [deprecated = true];</code>
     * @deprecated
     */
    private $phrase_hints;
    /**
     * Context information to assist speech recognition.
     * See [the Cloud Speech
     * documentation](https://cloud.google.com/speech-to-text/docs/basics#phrase-hints)
     * for more details.
     *
     * Generated from protobuf field <code>repeated .google.cloud.dialogflow.v2.SpeechContext speech_contexts = 11;</code>
     */
    private $speech_contexts;
    /**
     * Which Speech model to select for the given request. Select the
     * model best suited to your domain to get best results. If a model is not
     * explicitly specified, then we auto-select a model based on the parameters
     * in the InputAudioConfig.
     * If enhanced speech model is enabled for the agent and an enhanced
     * version of the specified model for the language does not exist, then the
     * speech is recognized using the standard version of the specified model.
     * Refer to
     * [Cloud Speech API
     * documentation](https://cloud.google.com/speech-to-text/docs/basics#select-model)
     * for more details.
     *
     * Generated from protobuf field <code>string model = 7;</code>
     */
    private $model = '';
    /**
     * Which variant of the [Speech model][google.cloud.dialogflow.v2.InputAudioConfig.model] to use.
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.SpeechModelVariant model_variant = 10;</code>
     */
    private $model_variant = 0;
    /**
     * If `false` (default), recognition does not cease until the
     * client closes the stream.
     * If `true`, the recognizer will detect a single spoken utterance in input
     * audio. Recognition ceases when it detects the audio's voice has
     * stopped or paused. In this case, once a detected intent is received, the
     * client should close the stream and start a new request with a new stream as
     * needed.
     * Note: This setting is relevant only for streaming methods.
     * Note: When specified, InputAudioConfig.single_utterance takes precedence
     * over StreamingDetectIntentRequest.single_utterance.
     *
     * Generated from protobuf field <code>bool single_utterance = 8;</code>
     */
    private $single_utterance = false;
    /**
     * Only used in [Participants.AnalyzeContent][google.cloud.dialogflow.v2.Participants.AnalyzeContent] and
     * [Participants.StreamingAnalyzeContent][google.cloud.dialogflow.v2.Participants.StreamingAnalyzeContent].
     * If `false` and recognition doesn't return any result, trigger
     * `NO_SPEECH_RECOGNIZED` event to Dialogflow agent.
     *
     * Generated from protobuf field <code>bool disable_no_speech_recognized_event = 14;</code>
     */
    private $disable_no_speech_recognized_event = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $audio_encoding
     *           Required. Audio encoding of the audio content to process.
     *     @type int $sample_rate_hertz
     *           Required. Sample rate (in Hertz) of the audio content sent in the query.
     *           Refer to
     *           [Cloud Speech API
     *           documentation](https://cloud.google.com/speech-to-text/docs/basics) for
     *           more details.
     *     @type string $language_code
     *           Required. The language of the supplied audio. Dialogflow does not do
     *           translations. See [Language
     *           Support](https://cloud.google.com/dialogflow/docs/reference/language)
     *           for a list of the currently supported language codes. Note that queries in
     *           the same session do not necessarily need to specify the same language.
     *     @type bool $enable_word_info
     *           If `true`, Dialogflow returns [SpeechWordInfo][google.cloud.dialogflow.v2.SpeechWordInfo] in
     *           [StreamingRecognitionResult][google.cloud.dialogflow.v2.StreamingRecognitionResult] with information about the recognized speech
     *           words, e.g. start and end time offsets. If false or unspecified, Speech
     *           doesn't return any word-level information.
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $phrase_hints
     *           A list of strings containing words and phrases that the speech
     *           recognizer should recognize with higher likelihood.
     *           See [the Cloud Speech
     *           documentation](https://cloud.google.com/speech-to-text/docs/basics#phrase-hints)
     *           for more details.
     *           This field is deprecated. Please use [speech_contexts]() instead. If you
     *           specify both [phrase_hints]() and [speech_contexts](), Dialogflow will
     *           treat the [phrase_hints]() as a single additional [SpeechContext]().
     *     @type \Google\Cloud\Dialogflow\V2\SpeechContext[]|\Google\Protobuf\Internal\RepeatedField $speech_contexts
     *           Context information to assist speech recognition.
     *           See [the Cloud Speech
     *           documentation](https://cloud.google.com/speech-to-text/docs/basics#phrase-hints)
     *           for more details.
     *     @type string $model
     *           Which Speech model to select for the given request. Select the
     *           model best suited to your domain to get best results. If a model is not
     *           explicitly specified, then we auto-select a model based on the parameters
     *           in the InputAudioConfig.
     *           If enhanced speech model is enabled for the agent and an enhanced
     *           version of the specified model for the language does not exist, then the
     *           speech is recognized using the standard version of the specified model.
     *           Refer to
     *           [Cloud Speech API
     *           documentation](https://cloud.google.com/speech-to-text/docs/basics#select-model)
     *           for more details.
     *     @type int $model_variant
     *           Which variant of the [Speech model][google.cloud.dialogflow.v2.InputAudioConfig.model] to use.
     *     @type bool $single_utterance
     *           If `false` (default), recognition does not cease until the
     *           client closes the stream.
     *           If `true`, the recognizer will detect a single spoken utterance in input
     *           audio. Recognition ceases when it detects the audio's voice has
     *           stopped or paused. In this case, once a detected intent is received, the
     *           client should close the stream and start a new request with a new stream as
     *           needed.
     *           Note: This setting is relevant only for streaming methods.
     *           Note: When specified, InputAudioConfig.single_utterance takes precedence
     *           over StreamingDetectIntentRequest.single_utterance.
     *     @type bool $disable_no_speech_recognized_event
     *           Only used in [Participants.AnalyzeContent][google.cloud.dialogflow.v2.Participants.AnalyzeContent] and
     *           [Participants.StreamingAnalyzeContent][google.cloud.dialogflow.v2.Participants.StreamingAnalyzeContent].
     *           If `false` and recognition doesn't return any result, trigger
     *           `NO_SPEECH_RECOGNIZED` event to Dialogflow agent.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Dialogflow\V2\AudioConfig::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. Audio encoding of the audio content to process.
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.AudioEncoding audio_encoding = 1;</code>
     * @return int
     */
    public function getAudioEncoding()
    {
        return $this->audio_encoding;
    }

    /**
     * Required. Audio encoding of the audio content to process.
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.AudioEncoding audio_encoding = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setAudioEncoding($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Dialogflow\V2\AudioEncoding::class);
        $this->audio_encoding = $var;

        return $this;
    }

    /**
     * Required. Sample rate (in Hertz) of the audio content sent in the query.
     * Refer to
     * [Cloud Speech API
     * documentation](https://cloud.google.com/speech-to-text/docs/basics) for
     * more details.
     *
     * Generated from protobuf field <code>int32 sample_rate_hertz = 2;</code>
     * @return int
     */
    public function getSampleRateHertz()
    {
        return $this->sample_rate_hertz;
    }

    /**
     * Required. Sample rate (in Hertz) of the audio content sent in the query.
     * Refer to
     * [Cloud Speech API
     * documentation](https://cloud.google.com/speech-to-text/docs/basics) for
     * more details.
     *
     * Generated from protobuf field <code>int32 sample_rate_hertz = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setSampleRateHertz($var)
    {
        GPBUtil::checkInt32($var);
        $this->sample_rate_hertz = $var;

        return $this;
    }

    /**
     * Required. The language of the supplied audio. Dialogflow does not do
     * translations. See [Language
     * Support](https://cloud.google.com/dialogflow/docs/reference/language)
     * for a list of the currently supported language codes. Note that queries in
     * the same session do not necessarily need to specify the same language.
     *
     * Generated from protobuf field <code>string language_code = 3;</code>
     * @return string
     */
    public function getLanguageCode()
    {
        return $this->language_code;
    }

    /**
     * Required. The language of the supplied audio. Dialogflow does not do
     * translations. See [Language
     * Support](https://cloud.google.com/dialogflow/docs/reference/language)
     * for a list of the currently supported language codes. Note that queries in
     * the same session do not necessarily need to specify the same language.
     *
     * Generated from protobuf field <code>string language_code = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setLanguageCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->language_code = $var;

        return $this;
    }

    /**
     * If `true`, Dialogflow returns [SpeechWordInfo][google.cloud.dialogflow.v2.SpeechWordInfo] in
     * [StreamingRecognitionResult][google.cloud.dialogflow.v2.StreamingRecognitionResult] with information about the recognized speech
     * words, e.g. start and end time offsets. If false or unspecified, Speech
     * doesn't return any word-level information.
     *
     * Generated from protobuf field <code>bool enable_word_info = 13;</code>
     * @return bool
     */
    public function getEnableWordInfo()
    {
        return $this->enable_word_info;
    }

    /**
     * If `true`, Dialogflow returns [SpeechWordInfo][google.cloud.dialogflow.v2.SpeechWordInfo] in
     * [StreamingRecognitionResult][google.cloud.dialogflow.v2.StreamingRecognitionResult] with information about the recognized speech
     * words, e.g. start and end time offsets. If false or unspecified, Speech
     * doesn't return any word-level information.
     *
     * Generated from protobuf field <code>bool enable_word_info = 13;</code>
     * @param bool $var
     * @return $this
     */
    public function setEnableWordInfo($var)
    {
        GPBUtil::checkBool($var);
        $this->enable_word_info = $var;

        return $this;
    }

    /**
     * A list of strings containing words and phrases that the speech
     * recognizer should recognize with higher likelihood.
     * See [the Cloud Speech
     * documentation](https://cloud.google.com/speech-to-text/docs/basics#phrase-hints)
     * for more details.
     * This field is deprecated. Please use [speech_contexts]() instead. If you
     * specify both [phrase_hints]() and [speech_contexts](), Dialogflow will
     * treat the [phrase_hints]() as a single additional [SpeechContext]().
     *
     * Generated from protobuf field <code>repeated string phrase_hints = 4 [deprecated = true];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     * @deprecated
     */
    public function getPhraseHints()
    {
        @trigger_error('phrase_hints is deprecated.', E_USER_DEPRECATED);
        return $this->phrase_hints;
    }

    /**
     * A list of strings containing words and phrases that the speech
     * recognizer should recognize with higher likelihood.
     * See [the Cloud Speech
     * documentation](https://cloud.google.com/speech-to-text/docs/basics#phrase-hints)
     * for more details.
     * This field is deprecated. Please use [speech_contexts]() instead. If you
     * specify both [phrase_hints]() and [speech_contexts](), Dialogflow will
     * treat the [phrase_hints]() as a single additional [SpeechContext]().
     *
     * Generated from protobuf field <code>repeated string phrase_hints = 4 [deprecated = true];</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     * @deprecated
     */
    public function setPhraseHints($var)
    {
        @trigger_error('phrase_hints is deprecated.', E_USER_DEPRECATED);
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->phrase_hints = $arr;

        return $this;
    }

    /**
     * Context information to assist speech recognition.
     * See [the Cloud Speech
     * documentation](https://cloud.google.com/speech-to-text/docs/basics#phrase-hints)
     * for more details.
     *
     * Generated from protobuf field <code>repeated .google.cloud.dialogflow.v2.SpeechContext speech_contexts = 11;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getSpeechContexts()
    {
        return $this->speech_contexts;
    }

    /**
     * Context information to assist speech recognition.
     * See [the Cloud Speech
     * documentation](https://cloud.google.com/speech-to-text/docs/basics#phrase-hints)
     * for more details.
     *
     * Generated from protobuf field <code>repeated .google.cloud.dialogflow.v2.SpeechContext speech_contexts = 11;</code>
     * @param \Google\Cloud\Dialogflow\V2\SpeechContext[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setSpeechContexts($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Dialogflow\V2\SpeechContext::class);
        $this->speech_contexts = $arr;

        return $this;
    }

    /**
     * Which Speech model to select for the given request. Select the
     * model best suited to your domain to get best results. If a model is not
     * explicitly specified, then we auto-select a model based on the parameters
     * in the InputAudioConfig.
     * If enhanced speech model is enabled for the agent and an enhanced
     * version of the specified model for the language does not exist, then the
     * speech is recognized using the standard version of the specified model.
     * Refer to
     * [Cloud Speech API
     * documentation](https://cloud.google.com/speech-to-text/docs/basics#select-model)
     * for more details.
     *
     * Generated from protobuf field <code>string model = 7;</code>
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Which Speech model to select for the given request. Select the
     * model best suited to your domain to get best results. If a model is not
     * explicitly specified, then we auto-select a model based on the parameters
     * in the InputAudioConfig.
     * If enhanced speech model is enabled for the agent and an enhanced
     * version of the specified model for the language does not exist, then the
     * speech is recognized using the standard version of the specified model.
     * Refer to
     * [Cloud Speech API
     * documentation](https://cloud.google.com/speech-to-text/docs/basics#select-model)
     * for more details.
     *
     * Generated from protobuf field <code>string model = 7;</code>
     * @param string $var
     * @return $this
     */
    public function setModel($var)
    {
        GPBUtil::checkString($var, True);
        $this->model = $var;

        return $this;
    }

    /**
     * Which variant of the [Speech model][google.cloud.dialogflow.v2.InputAudioConfig.model] to use.
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.SpeechModelVariant model_variant = 10;</code>
     * @return int
     */
    public function getModelVariant()
    {
        return $this->model_variant;
    }

    /**
     * Which variant of the [Speech model][google.cloud.dialogflow.v2.InputAudioConfig.model] to use.
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.SpeechModelVariant model_variant = 10;</code>
     * @param int $var
     * @return $this
     */
    public function setModelVariant($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Dialogflow\V2\SpeechModelVariant::class);
        $this->model_variant = $var;

        return $this;
    }

    /**
     * If `false` (default), recognition does not cease until the
     * client closes the stream.
     * If `true`, the recognizer will detect a single spoken utterance in input
     * audio. Recognition ceases when it detects the audio's voice has
     * stopped or paused. In this case, once a detected intent is received, the
     * client should close the stream and start a new request with a new stream as
     * needed.
     * Note: This setting is relevant only for streaming methods.
     * Note: When specified, InputAudioConfig.single_utterance takes precedence
     * over StreamingDetectIntentRequest.single_utterance.
     *
     * Generated from protobuf field <code>bool single_utterance = 8;</code>
     * @return bool
     */
    public function getSingleUtterance()
    {
        return $this->single_utterance;
    }

    /**
     * If `false` (default), recognition does not cease until the
     * client closes the stream.
     * If `true`, the recognizer will detect a single spoken utterance in input
     * audio. Recognition ceases when it detects the audio's voice has
     * stopped or paused. In this case, once a detected intent is received, the
     * client should close the stream and start a new request with a new stream as
     * needed.
     * Note: This setting is relevant only for streaming methods.
     * Note: When specified, InputAudioConfig.single_utterance takes precedence
     * over StreamingDetectIntentRequest.single_utterance.
     *
     * Generated from protobuf field <code>bool single_utterance = 8;</code>
     * @param bool $var
     * @return $this
     */
    public function setSingleUtterance($var)
    {
        GPBUtil::checkBool($var);
        $this->single_utterance = $var;

        return $this;
    }

    /**
     * Only used in [Participants.AnalyzeContent][google.cloud.dialogflow.v2.Participants.AnalyzeContent] and
     * [Participants.StreamingAnalyzeContent][google.cloud.dialogflow.v2.Participants.StreamingAnalyzeContent].
     * If `false` and recognition doesn't return any result, trigger
     * `NO_SPEECH_RECOGNIZED` event to Dialogflow agent.
     *
     * Generated from protobuf field <code>bool disable_no_speech_recognized_event = 14;</code>
     * @return bool
     */
    public function getDisableNoSpeechRecognizedEvent()
    {
        return $this->disable_no_speech_recognized_event;
    }

    /**
     * Only used in [Participants.AnalyzeContent][google.cloud.dialogflow.v2.Participants.AnalyzeContent] and
     * [Participants.StreamingAnalyzeContent][google.cloud.dialogflow.v2.Participants.StreamingAnalyzeContent].
     * If `false` and recognition doesn't return any result, trigger
     * `NO_SPEECH_RECOGNIZED` event to Dialogflow agent.
     *
     * Generated from protobuf field <code>bool disable_no_speech_recognized_event = 14;</code>
     * @param bool $var
     * @return $this
     */
    public function setDisableNoSpeechRecognizedEvent($var)
    {
        GPBUtil::checkBool($var);
        $this->disable_no_speech_recognized_event = $var;

        return $this;
    }

}

