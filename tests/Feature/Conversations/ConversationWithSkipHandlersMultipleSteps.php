<?php

namespace SergiX44\Nutgram\Tests\Feature\Conversations;

use SergiX44\Nutgram\Conversations\Conversation;
use SergiX44\Nutgram\Nutgram;

class ConversationWithSkipHandlersMultipleSteps extends Conversation
{
    public function start(Nutgram $bot)
    {
        $bot->setData('test', $bot->getData('test', 0) + 1);
        $this->setSkipHandlers(true)->next('second');
    }

    public function second(Nutgram $bot)
    {
        $bot->setData('test', $bot->getData('test', 0) + 1);
        $this->end();
    }
}
