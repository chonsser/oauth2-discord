<?php
namespace Discord\OAuth2\Client\Provider\Enum;

/**
 * Enum ErrorCode
 * https://discordapp.com/developers/docs/topics/response-codes#json-error-codes
 *
 * @package Discord\Client\OAuth2\Provider\Enum
 * @author Dominik Szymański <toja@chonsser.me>
 */
class ErrorCode
{
    const
        /**
         * Unknown account
         */
        UNKNOWN_ACCOUNT = 10001,

        /**
         * Unknown application
         */
        UNKNOWN_APPLICATION = 10002,

        /**
         * Unknown channel
         */
        UNKNOWN_CHANNEL = 10003,

        /**
         * Unknown guild
         */
        UNKNOWN_GUILD = 10004,

        /**
         * Unknown integration
         */
        UNKNOWN_INTEGRATION = 10005,

        /**
         * Unknown invite
         */
        UNKNOWN_INVITE = 10006,

        /**
         * Unknown member
         */
        UNKNOWN_MEMBER = 10007,

        /**
         * Unknown message
         */
        UNKNOWN_MESSAGE = 10008,

        /**
         * Unknown overwrite
         */
        UNKNOWN_OVERWRITE = 10009,

        /**
         * Unknown provider
         */
        UNKNOWN_PROVIDER = 10010,

        /**
         * Unknown role
         */
        UNKNOWN_ROLE = 10011,

        /**
         * Unknown token
         */
        UNKNOWN_TOKEN = 10012,

        /**
         * Unknown user
         */
        UNKNOWN_ = 10013,

        /**
         * Unknown Emoji
         */
        UNKNOWN_EMOJI = 10014,

        /**
         * Bots cannot use this endpoint
         */
        NON_BOTS_ONLY = 20001,

        /**
         * Only bots can use this endpoint
         */
        BOTS_ONLY = 20002,

        /**
         * Maximum number of guilds reached (100)
         */
        MAX_GUILDS = 30001,

        /**
         * Maximum number of friends reached (1000)
         */
        MAX_FRIENDS = 30002,

        /**
         * Maximum number of pins reached (50)
         */
        MAX_PINS = 30003,

        /**
         * Maximum number of guild roles reached (250)
         */
        MAX_GUILD_ROLES = 30005,

        /**
         * Too many reactions
         */
        TOO_MANY_REACTIONS = 30010,

        /**
         * Unauthorized
         */
        UNAUTHORIZED = 40001,

        /**
         * Missing access
         */
        MISSING_ACCESS = 50001,

        /**
         * Invalid account type
         */
        INVALID_ACCOUNT_TYPE = 50002,

        /**
         * Cannot execute action on a DM channel
         */
        ACTION_ON_DM = 50003,

        /**
         * Embed disabled
         */
        EMBED_DISABLED = 50004,

        /**
         * Cannot edit a message authored by another user
         */
        CANNOT_EDIT_MESSAGE = 50005,

        /**
         * Cannot send an empty message
         */
        EMPTY_MESSAGE = 50006,

        /**
         * Cannot send messages to this user
         */
        CANNOT_SEND_MESSAGE_USER = 50007,

        /**
         * Cannot send messages in a voice channel
         */
        CANNOT_SEND_MESSAGE_VOICE_CHANNEL = 50008,

        /**
         * Channel verification level is too high
         */
        VERIFICATION_LEVEL_TOO_HIGH = 50009,

        /**
         * OAuth2 application does not have a bot
         */
        OAUTH2_NO_BOT = 50010,

        /**
         * OAuth2 application limit reached
         */
        OAUTH2_LIMIT = 50011,

        /**
         * Invalid OAuth state
         */
        OAUTH2_INVALID_STATE = 50012,

        /**
         * Missing permissions
         */
        MISSING_PERMISSIONS = 50013,

        /**
         * Invalid authentication token
         */
        INVALID_AUTH_TOKEN = 50014,

        /**
         * Note is too long
         */
        NOTE_TOO_LONG = 50015,

        /**
         *  Provided too few or too many messages to delete.
         *  Must provide at least 2 and fewer than 100 messages to delete.
         */
        INVALID_MESSAGES_DELETE = 50016,

        /**
         * A message can only be pinned to the channel it was sent in
         */
        MESSAGE_PIN_INVALID_CHANNEL = 50019,

        /**
         * A message provided was too old to bulk delete
         */
        MESSAGE_TOO_OLD = 50034,

        /**
         * You cannot accept an invite to a guild the application's bot is not in
         *                                      * Missing in the official docs
         */
        MISSING_BOT = 50036,

        /**
         * Reactions blocked
         */
        REACION_BLOCKED = 90001;
}
