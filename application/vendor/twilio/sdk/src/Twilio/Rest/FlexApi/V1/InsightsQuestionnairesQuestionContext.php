<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\FlexApi\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class InsightsQuestionnairesQuestionContext extends InstanceContext {
    /**
     * Initialize the InsightsQuestionnairesQuestionContext
     *
     * @param Version $version Version that contains the resource
     * @param string $questionId Unique Question ID
     */
    public function __construct(Version $version, $questionId) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['questionId' => $questionId, ];

        $this->uri = '/Insights/QM/Questions/' . \rawurlencode($questionId) . '';
    }

    /**
     * Update the InsightsQuestionnairesQuestionInstance
     *
     * @param string $question The question.
     * @param string $description The question description.
     * @param string $answerSetId The answer_set for question.
     * @param bool $allowNa Flag to enable NA for answer.
     * @param array|Options $options Optional Arguments
     * @return InsightsQuestionnairesQuestionInstance Updated
     *                                                InsightsQuestionnairesQuestionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(string $question, string $description, string $answerSetId, bool $allowNa, array $options = []): InsightsQuestionnairesQuestionInstance {
        $options = new Values($options);

        $data = Values::of([
            'Question' => $question,
            'Description' => $description,
            'AnswerSetId' => $answerSetId,
            'AllowNa' => Serialize::booleanToString($allowNa),
            'CategoryId' => $options['categoryId'],
        ]);
        $headers = Values::of(['Token' => $options['token'], ]);

        $payload = $this->version->update('POST', $this->uri, [], $data, $headers);

        return new InsightsQuestionnairesQuestionInstance(
            $this->version,
            $payload,
            $this->solution['questionId']
        );
    }

    /**
     * Delete the InsightsQuestionnairesQuestionInstance
     *
     * @param array|Options $options Optional Arguments
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(array $options = []): bool {
        $options = new Values($options);

        $headers = Values::of(['Token' => $options['token'], ]);

        return $this->version->delete('DELETE', $this->uri, [], [], $headers);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.FlexApi.V1.InsightsQuestionnairesQuestionContext ' . \implode(' ', $context) . ']';
    }
}