<?php
namespace Discord\OAuth2\Client\Provider\Enum;

/**
 * Enum Scope
 * https://discordapp.com/developers/docs/topics/oauth2#oauth2-scopes
 *
 * @package Discord\Client\OAuth2\Provider\Enum
 * @author Dominik Szymański <toja@chonsser.me>
 */
final class Scope
{
    const
        BOT = 'bot',
        CONNCETIONS = 'connections',
        EMAIL = 'email',
        IDENTIFY = 'identify',
        GUILDS = 'guilds',
        INVITATIONS = 'guilds.join',
        GDM_JOIN = 'gdm.join',
        MESSAGES_READ = 'messages.read',
        RPC = 'rpc',
        RPC_API = 'rpc.api',
        RPC_NOTIFICATIONS = 'rpc.notifications.read',
        WEBHOOK_INCOMING = 'webhook.incoming',

        DEFAULT_SCOPES = [self::IDENTIFY, self::EMAIL];
}