<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_8D93D649E7927C74", columns={"email"})})
 * @ORM\Entity
 */
class User implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=180, nullable=false)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var int|null
     *
     * @ORM\Column(name="connection", type="integer", nullable=true)
     */
    private $connection;

    /**
     * @var int|null
     *
     * @ORM\Column(name="connectionAllowed", type="integer", nullable=true, options={"default"="1"})
     */
    private $connectionallowed = '1';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="actif", type="boolean", nullable=true)
     */
    private $actif = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="registred", type="boolean", nullable=false)
     */
    private $registred = '0';

    /**
     * @var json
     *
     * @ORM\Column(name="roles", type="json", nullable=false)
     */
    private $roles;

    /**
     * @var string|null
     *
     * @ORM\Column(name="macdesktop", type="string", length=100, nullable=true)
     */
    private $macdesktop;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mactablet", type="string", length=100, nullable=true)
     */
    private $mactablet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="macphone", type="string", length=100, nullable=true)
     */
    private $macphone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getConnection(): ?int
    {
        return $this->connection;
    }

    public function setConnection(?int $connection): self
    {
        $this->connection = $connection;

        return $this;
    }

    public function getConnectionallowed(): ?int
    {
        return $this->connectionallowed;
    }

    public function setConnectionallowed(?int $connectionallowed): self
    {
        $this->connectionallowed = $connectionallowed;

        return $this;
    }

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(?bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    public function getRegistred(): ?bool
    {
        return $this->registred;
    }

    public function setRegistred(bool $registred): self
    {
        $this->registred = $registred;

        return $this;
    }

    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function addRole(string $role){
        if(($index=array_search($role,$this->roles))>=0)
        array_push($this->roles,$role);
    }

    public  function removeRole(string $role){
        if(($index=array_search($role,$this->roles))>=0)
            unset($this->roles[$index]);

    }

    public function getMacdesktop(): ?string
    {
        return $this->macdesktop;
    }

    public function setMacdesktop(?string $macdesktop): self
    {
        $this->macdesktop = $macdesktop;

        return $this;
    }

    public function getMactablet(): ?string
    {
        return $this->mactablet;
    }

    public function setMactablet(?string $mactablet): self
    {
        $this->mactablet = $mactablet;

        return $this;
    }

    public function getMacphone(): ?string
    {
        return $this->macphone;
    }

    public function setMacphone(?string $macphone): self
    {
        $this->macphone = $macphone;

        return $this;
    }

    public function getMacs() : ?array {

        return [$this->macdesktop,$this->macphone,$this->mactablet];
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        // TODO: Implement getUsername() method.
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}

