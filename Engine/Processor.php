<?php

namespace MTDebug\Engine;

/**
 * Class Processor
 * @package MTDebug\Engine
 */
class Processor
{
    /**
     * @var array
     */
    private $requiredVariables = array(
        'callback_uuid',
        'callback_url',
        'description',
        'amount',
        'secret_key'
    );

    /**
     * @var array
     */
    private $allowedVariables = array(
        'callback_uuid',
        'callback_url',
        'description',
        'amount',
        'secret_key',
        'xdebug_session',
    );

    /**
     * @var
     */
    private $variables;

    /**
     * Processor constructor.
     */
    public function __construct()
    {
        $post = array_filter($_POST);

        if (count(array_intersect($this->requiredVariables, array_keys($post))) != count($this->requiredVariables)) {
            throw new \Exception('Requirements has not been met.');
        }

        $this->variables = array_intersect_key($post, array_flip($this->allowedVariables));
    }

    public function process()
    {
        $post = array(
            'callback_uuid' => $this->variables['callback_uuid'],
            'order_type' => '',
            'details' => '',
            'order_uuid' => '',
            'amount' => '',
            'currency' => '',
            'uid' => '',
            'status' => '',
            'custom' => json_encode(
                array(
                    'invoice' => Utilities::generateUUID(),
                    'status' => 'paid',
                    'data' => array(
                        'amount' => $this->variables['amount'],
                        'currency' => 'EUR',
                        'description' => $this->variables['description'],
                        'paid_partly' => false,
                        'status' => 'CONFIRMED',
                    ),
                    'custom_data' => array(),
                    'type' => 'MISTERTANGO',
                    'custom_type' => '',
                    'description' => $this->variables['description'],
                    'contact' => array(
                        'email' => '',
                        'contact_details' => array(),
                        'shipping_details' => array(),
                    )
                )
            ),
        );

        $post['hash'] = Utilities::encrypt(json_encode($post), $this->variables['secret_key']);

        $ch = curl_init($this->variables['callback_url']);
        if (isset($this->variables['xdebug_session'])) {
            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                array("Cookie: XDEBUG_SESSION='" . $this->variables['xdebug_session'] . "'; path=/")
            );
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
