<?php
namespace Aplicacao\Factories;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use Zend\Json\Json;
use Zend\Http\Client;

class MQManager implements MQManagerInterface
{
    public function __construct() {
        $this->connect();
    }

    protected function connect() {
        $connection = new AMQPStreamConnection('rabbitmq_php', 5672, 'admin', 'admin');
        $this->channel = $connection->channel();
        /* @param string $queue
        * @param bool $passive
        * @param bool $durable
        * @param bool $exclusive
        * @param bool $auto_delete
        * @param bool $nowait
        * @param array $arguments
        * @param int $ticket
        */
        $this->channel->queue_declare('hello', false, true, false, false);
        $this->channel->basic_qos(null, 1, null);
        error_log("[x] Conectou no RabbitMQ!!!");
    }

    public function publish($message) {
        $msg = new AMQPMessage($message, ['delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT]);
        /*
        * @param AMQPMessage $msg
        * @param string $exchange
        * @param string $routing_key
        * @param bool $mandatory
        * @param bool $immediate
        */
        $this->channel->basic_publish($msg, '', 'hello');
        
        error_log("[x] Sent $message");

        return true;
    }

    public function get() {
        error_log(" [*] Waiting for messages. To exit press CTRL+C\n");

        $messageBody = false;
        $message = $this->channel->basic_get('hello');
        if ($message) {
            $this->channel->basic_ack($message->delivery_info['delivery_tag']);
            $messageBody = $message->body;
        }
        error_log("[x] Mensagem ===> " . $messageBody);
        return $messageBody;
    }

    public function startReceive() {
        error_log(" [*] Waiting for messages. To exit press CTRL+C\n");

        $callback = function ($msg) {
            error_log(' [x] Mensagem recebida: ' . $msg->body . "\n");
            $this->sendExternal($msg->body);
            error_log(' [x] Mensagem externada: ' . $msg->body . "\n");
            $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
            // $msg->delivery_info['channel']->basic_cancel($msg->delivery_info['consumer_tag']);
        };

        /*
        * @param string $queue
        * @param string $consumer_tag
        * @param bool $no_local
        * @param bool $no_ack
        * @param bool $exclusive
        * @param bool $nowait
        * @param callable|null $callback
        * @param int|null $ticket
        * @param array $arguments
        */
        $this->channel->basic_consume('hello', '', false, false, false, false, $callback);

        $i = 0;
        while (count($this->channel->callbacks)) {
            $this->channel->wait();
            error_log("[x] ===> mensagem nº ".$i++);
        }
    }

    protected function sendExternal($message)
    {
        // $params = Json::decode($this->getRequest()->getContent());

        $client = new Client();
        $client->setUri('http://192.168.2.94:3000/api/receiveMessage');
        $client->setMethod('POST');
        $client->setParameterPost([
            "message"  => $message
        ]);
        // $client->setHeaders([
        //     "HeaderField1" => "Bearer 8E94745A1F033999"
        // ]);
        $response = $client->send();
        $body = json_decode($response->getBody());
        print_r($body);
    }
}