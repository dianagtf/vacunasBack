<?php
/**
 * Created by PhpStorm.
 * User: Diana
 * Date: 29/06/2018
 * Time: 10:09
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * RegistroVacunas
 *
 * @ORM\Table(name="registrovacunas")
 * @ORM\Entity
 */

class RegistroVacunas implements \JsonSerializable
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * RegistroVacunas Users
     *
     * @var Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *     @ORM\JoinColumn(
     *          name                 = "user_id",
     *          referencedColumnName = "id",
     *          onDelete             = "cascade"
     *     )
     * })
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="age", type="string")
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="edad", type="string")
     */
    private $edad;

    /**
     * @var string
     *
     * @ORM\Column(name="vacuna1", type="string")
     */
    private $vacuna1;

    /**
     * @var string
     *
     * @ORM\Column(name="vacuna2", type="string")
     */
    private $vacuna2;

    /**
     * @var string
     *
     * @ORM\Column(name="vacuna3", type="string")
     */
    private $vacuna3;

    /**
     * @var string
     *
     * @ORM\Column(name="vacuna4", type="string")
     */
    private $vacuna4;

    /**
     * @var string
     *
     * @ORM\Column(name="vacuna5", type="string")
     */
    private $vacuna5;

    /**
     * @var string
     *
     * @ORM\Column(name="vacuna6", type="string")
     */
    private $vacuna6;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isVacunated1", type="boolean")
     */
    private $isVacunated1;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isVacunated2", type="boolean")
     */
    private $isVacunated2;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isVacunated3", type="boolean")
     */
    private $isVacunated3;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isVacunated4", type="boolean")
     */
    private $isVacunated4;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isVacunated5", type="boolean")
     */
    private $isVacunated5;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isVacunated6", type="boolean")
     */
    private $isVacunated6;

    /**
     * @var string
     *
     * @ORM\Column(name="dateVacuna1", type="text", nullable=false)
     */
    private $dateVacuna1;

    /**
     * @var string
     *
     * @ORM\Column(name="dateVacuna2", type="text", nullable=false)
     */
    private $dateVacuna2;

    /**
     * @var string
     *
     * @ORM\Column(name="dateVacuna3", type="text", nullable=false)
     */
    private $dateVacuna3;

    /**
     * @var string
     *
     * @ORM\Column(name="dateVacuna4", type="text", nullable=false)
     */
    private $dateVacuna4;

    /**
     * @var string
     *
     * @ORM\Column(name="dateVacuna5", type="text", nullable=false)
     */
    private $dateVacuna5;

    /**
     * @var string
     *
     * @ORM\Column(name="dateVacuna6", type="text", nullable=false)
     */
    private $dateVacuna6;

    /**
     * Vacunas constructor.
     * @param string $name
     * @param string $age
     * @param string $edad
     * @param string $vacuna1
     * @param string $vacuna2
     * @param string $vacuna3
     * @param string $vacuna4
     * @param string $vacuna5
     * @param string $vacuna6
     * @param boolean $isVacunated1
     * @param boolean $isVacunated2
     * @param boolean $isVacunated3
     * @param boolean $isVacunated4
     * @param boolean $isVacunated5
     * @param boolean $isVacunated6
     * @param string $dateVacuna1
     * @param string $dateVacuna2
     * @param string $dateVacuna3
     * @param string $dateVacuna4
     * @param string $dateVacuna5
     * @param string $dateVacuna6
     */
    public function __construct(string $name, string $age, string $edad, string $vacuna1, string $vacuna2, string $vacuna3,
                                string $vacuna4, string $vacuna5, string $vacuna6, bool $isVacunated1,
                                bool $isVacunated2, bool $isVacunated3, bool $isVacunated4, bool $isVacunated5,
                                bool $isVacunated6, string $dateVacuna1, string $dateVacuna2, string $dateVacuna3,
                                string $dateVacuna4, string $dateVacuna5, string $dateVacuna6)
    {
        $this->name = $name;
        $this->age = $age;
        $this->edad = $edad;
        $this->vacuna1 = $vacuna1;
        $this->vacuna2 = $vacuna2;
        $this->vacuna3 = $vacuna2;
        $this->vacuna4 = $vacuna4;
        $this->vacuna5 = $vacuna5;
        $this->vacuna6 = $vacuna6;
        $this->isVacunated1 = $isVacunated1;
        $this->isVacunated2 = $isVacunated2;
        $this->isVacunated3 = $isVacunated3;
        $this->isVacunated4 = $isVacunated4;
        $this->isVacunated5 = $isVacunated5;
        $this->isVacunated6 = $isVacunated6;
        $this->dateVacuna1 = $dateVacuna1;
        $this->dateVacuna2 = $dateVacuna2;
        $this->dateVacuna3 = $dateVacuna3;
        $this->dateVacuna4 = $dateVacuna4;
        $this->dateVacuna5 = $dateVacuna5;
        $this->dateVacuna6 = $dateVacuna6;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Users
     */
    public function getUser(): Users
    {
        return new Users(1, '', '', '','', '', 1);
    }

    /**
     * @param Users $user
     */
    public function setUser(Users $user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAge(): string
    {
        return $this->age;
    }

    /**
     * @param string $age
     */
    public function setAge(string $age)
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getEdad(): string
    {
        return $this->edad;
    }

    /**
     * @param string $edad
     */
    public function setEdad(string $edad)
    {
        $this->edad = $edad;
    }

    /**
     * @return string
     */
    public function getVacuna1(): string
    {
        return $this->vacuna1;
    }

    /**
     * @param string $vacuna1
     */
    public function setVacuna1(string $vacuna1)
    {
        $this->vacuna1 = $vacuna1;
    }

    /**
     * @return string
     */
    public function getVacuna2(): string
    {
        return $this->vacuna2;
    }

    /**
     * @param string $vacuna2
     */
    public function setVacuna2(string $vacuna2)
    {
        $this->vacuna2 = $vacuna2;
    }

    /**
     * @return string
     */
    public function getVacuna3(): string
    {
        return $this->vacuna3;
    }

    /**
     * @param string $vacuna3
     */
    public function setVacuna3(string $vacuna3)
    {
        $this->vacuna3 = $vacuna3;
    }

    /**
     * @return string
     */
    public function getVacuna4(): string
    {
        return $this->vacuna4;
    }

    /**
     * @param string $vacuna4
     */
    public function setVacuna4(string $vacuna4)
    {
        $this->vacuna4 = $vacuna4;
    }

    /**
     * @return string
     */
    public function getVacuna5(): string
    {
        return $this->vacuna5;
    }

    /**
     * @param string $vacuna5
     */
    public function setVacuna5(string $vacuna5)
    {
        $this->vacuna5 = $vacuna5;
    }

    /**
     * @return string
     */
    public function getVacuna6(): string
    {
        return $this->vacuna6;
    }

    /**
     * @param string $vacuna6
     */
    public function setVacuna6(string $vacuna6)
    {
        $this->vacuna6 = $vacuna6;
    }

    /**
     * @return bool
     */
    public function isVacunated1(): bool
    {
        return $this->isVacunated1;
    }

    /**
     * @param bool $isVacunated1
     */
    public function setIsVacunated1(bool $isVacunated1)
    {
        $this->isVacunated1 = $isVacunated1;
    }

    /**
     * @return bool
     */
    public function isVacunated2(): bool
    {
        return $this->isVacunated2;
    }

    /**
     * @param bool $isVacunated2
     */
    public function setIsVacunated2(bool $isVacunated2)
    {
        $this->isVacunated2 = $isVacunated2;
    }

    /**
     * @return bool
     */
    public function isVacunated3(): bool
    {
        return $this->isVacunated3;
    }

    /**
     * @param bool $isVacunated3
     */
    public function setIsVacunated3(bool $isVacunated3)
    {
        $this->isVacunated3 = $isVacunated3;
    }

    /**
     * @return bool
     */
    public function isVacunated4(): bool
    {
        return $this->isVacunated4;
    }

    /**
     * @param bool $isVacunated4
     */
    public function setIsVacunated4(bool $isVacunated4)
    {
        $this->isVacunated4 = $isVacunated4;
    }

    /**
     * @return bool
     */
    public function isVacunated5(): bool
    {
        return $this->isVacunated5;
    }

    /**
     * @param bool $isVacunated5
     */
    public function setIsVacunated5(bool $isVacunated5)
    {
        $this->isVacunated5 = $isVacunated5;
    }

    /**
     * @return bool
     */
    public function isVacunated6(): bool
    {
        return $this->isVacunated6;
    }

    /**
     * @param bool $isVacunated6
     */
    public function setIsVacunated6(bool $isVacunated6)
    {
        $this->isVacunated6 = $isVacunated6;
    }

    /**
     * @return string
     */
    public function getDateVacuna1(): string
    {
        return $this->dateVacuna1;
    }

    /**
     * @param string $dateVacuna1
     */
    public function setDateVacuna1(string $dateVacuna1)
    {
        $this->dateVacuna1 = $dateVacuna1;
    }

    /**
     * @return string
     */
    public function getDateVacuna2(): string
    {
        return $this->dateVacuna2;
    }

    /**
     * @param string $dateVacuna2
     */
    public function setDateVacuna2(string $dateVacuna2)
    {
        $this->dateVacuna2 = $dateVacuna2;
    }

    /**
     * @return string
     */
    public function getDateVacuna3(): string
    {
        return $this->dateVacuna3;
    }

    /**
     * @param string $dateVacuna3
     */
    public function setDateVacuna3(string $dateVacuna3)
    {
        $this->dateVacuna3 = $dateVacuna3;
    }

    /**
     * @return string
     */
    public function getDateVacuna4(): string
    {
        return $this->dateVacuna4;
    }

    /**
     * @param string $dateVacuna4
     */
    public function setDateVacuna4(string $dateVacuna4)
    {
        $this->dateVacuna4 = $dateVacuna4;
    }

    /**
     * @return string
     */
    public function getDateVacuna5(): string
    {
        return $this->dateVacuna5;
    }

    /**
     * @param string $dateVacuna5
     */
    public function setDateVacuna5(string $dateVacuna5)
    {
        $this->dateVacuna5 = $dateVacuna5;
    }

    /**
     * @return string
     */
    public function getDateVacuna6(): string
    {
        return $this->dateVacuna6;
    }

    /**
     * @param string $dateVacuna6
     */
    public function setDateVacuna6(string $dateVacuna6)
    {
        $this->dateVacuna6 = $dateVacuna6;
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
            'user' => $this->getUser(),
            'name' => $this->getName(),
            'age' => $this->getAge(),
            'edad' => $this->getEdad(),
            'vacuna1' => $this->getVacuna1(),
            'vacuna2' => $this->getVacuna2(),
            'vacuna3' => $this->getVacuna3(),
            'vacuna4' => $this->getVacuna4(),
            'vacuna5' => $this->getVacuna5(),
            'vacuna6' => $this->getVacuna6(),
            'isVacunated1' => $this->isVacunated1(),
            'isVacunated2' => $this->isVacunated2(),
            'isVacunated3' => $this->isVacunated3(),
            'isVacunated4' => $this->isVacunated4(),
            'isVacunated5' => $this->isVacunated5(),
            'isVacunated6' => $this->isVacunated6(),
            'dateVacuna1' => $this->getDateVacuna1(),
            'dateVacuna2' => $this->getDateVacuna2(),
            'dateVacuna3' => $this->getDateVacuna3(),
            'dateVacuna4' => $this->getDateVacuna4(),
            'dateVacuna5' => $this->getDateVacuna5(),
            'dateVacuna6' => $this->getDateVacuna6(),
        ];
        return $array;
    }

}