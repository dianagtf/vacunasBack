<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class Users implements \JsonSerializable
{

    // ...
    /**
     * @OneToMany(targetEntity="VacunaUser", mappedBy="id")
     */

    /**
     * @var int
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="text", length=65535, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="text", length=65535, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="text", length=65535, nullable=false)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="text", length=65535, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="text", length=65535, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="passwordRepeat", type="text", length=65535, nullable=false)
     */
    private $passwordRepeat;

    /**
     * @var int
     *
     * @ORM\Column(name="numChildren", type="integer", nullable=false)
     */
    private $numChildren;

    /**
     * @var string
     *
     * @ORM\Column(name="childrenBirthday", type="text", nullable=false)
     */
    private $childrenBirthday;

    /**
     * Users constructor.
     * @param int $id
     * @param string $username
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $password
     * @param string $passwordRepeat
     * @param int $numChildren
     * @param string $childrenBirthday
     */
    public function __construct(int $id, string $username, string $firstName, string $lastName, string $email,
                                string $password, string $passwordRepeat, int $numChildren, string $childrenBirthday)
    {
        $this->id = $id;
        $this->username = $username;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
        $this->numChildren = $numChildren;
        $this->childrenBirthday = $childrenBirthday;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPasswordRepeat(): string
    {
        return $this->passwordRepeat;
    }

    /**
     * @param string $passwordRepeat
     */
    public function setPasswordRepeat(string $passwordRepeat)
    {
        $this->passwordRepeat = $passwordRepeat;
    }

    /**
     * @return int
     */
    public function getNumChildren(): int
    {
        return $this->numChildren;
    }

    /**
     * @param int $numChildren
     */
    public function setNumChildren(int $numChildren)
    {
        $this->numChildren = $numChildren;
    }

    /**
     * @return string
     */
    public function getChildrenBirthday(): string
    {
        return $this->childrenBirthday;
    }

    /**
     * @param string $childrenBirthday
     */
    public function setChildrenBirthday(string $childrenBirthday)
    {
        $this->childrenBirthday = $childrenBirthday;
    }


    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        $array = [
            'id' => $this->getId(),
            'username' => $this->getUsername(),
            'firstName' => $this->getFirstName(),
            'lastName' => $this->getLastName(),
            'email' => $this->getEmail(),
            'password' => $this->getPassword(),
            'passwordRepeat' => $this->getPasswordRepeat(),
            'numChildren' => $this->getNumChildren(),
            'childrenBirthday' => $this->getChildrenBirthday()
        ];
        return $array;
    }
}