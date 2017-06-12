<?php
namespace Discord\OAuth2\Client\Provider\Entity;

use Discord\OAuth2\Client\Provider\ValueObject\GuildName;

/**
 * Class Guild
 * @package Discord\OAuth2\Client\Provider\Entity
 * @author Dominik Szymański <toja@chonsser.me>
 */
class Guild
{
    /**
     * @var string
     *
     * "to stay on the safe place"
     *                  ~ Twitter
     */
    private $id;

    /**
     * @var GuildName
     */
    private $name;

    /**
     * @var ?string
     */
    private $icon;

    /**
     * @var bool
     */
    private $owner;

    /**
     * @var integer
     */
    private $permissions;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return $this
     */
    public function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return GuildName
     */
    public function getName(): GuildName
    {
        return $this->name;
    }

    /**
     * @param GuildName $name
     *
     * @return $this
     */
    public function setName(GuildName $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @param mixed $icon
     *
     * @return $this
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @return bool
     */
    public function isOwner(): bool
    {
        return $this->owner;
    }

    /**
     * @param bool $owner
     *
     * @return $this
     */
    public function setOwner(bool $owner)
    {
        $this->owner = $owner;
        return $this;
    }

    /**
     * @return int
     */
    public function getPermissions(): int
    {
        return $this->permissions;
    }

    /**
     * Makes bitwise operation (AND) on the permission bits
     *
     * @param int $permission
     * @return bool
     */
    public function hasPermission(int $permission): bool
    {
        if (($this->permissions & $permission) === $permission) {
            return true;
        }
        return false;
    }

    /**
     * @param int $permissions
     *
     * @return $this
     */
    public function setPermissions(int $permissions)
    {
        $this->permissions = $permissions;
        return $this;
    }
}
