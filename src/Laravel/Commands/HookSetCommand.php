<?php

namespace SergiX44\Nutgram\Laravel\Commands;

use Illuminate\Console\Command;
use SergiX44\Nutgram\Nutgram;

class HookSetCommand extends Command
{
    protected $signature = 'nutgram:hook:set {url} {--ip=} {--max-connections=50}';

    protected $description = 'Set the bot webhook';

    public function handle(): int
    {
        $url = $this->argument('url');

        app(Nutgram::class)->setWebhook($url, array_filter([
            'ip' => $this->option('ip'),
            'max-connections' => (int) $this->option('max-connections')
        ]));

        $this->info("Bot webhook set with url: $url");

        return 0;
    }
}
