<?php
/**
 * Created by PhpStorm.
 * User: Diana
 * Date: 02/06/2018
 * Time: 20:27
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vacunas
 *
 * @ORM\Table(name="vacunas")
 * @ORM\Entity
 */

class Vacunas implements \JsonSerializable
{
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
     * @ORM\Column(name="nombre", type="text", length=65535, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="condiciones", type="string", length=50, nullable=false)
     */
    private $condiciones;

    /**
     * @var boolean
     *
     * @ORM\Column(name="$twoMonths", type="boolean", nullable=false)
     */
    private $twoMonths;

    /**
     * @var boolean
     *
     * @ORM\Column(name="$fourMonths", type="boolean", nullable=false)
     */
    private $fourMonths;

    /**
     * @var boolean
     *
     * @ORM\Column(name="$elevenMonths", type="boolean", nullable=false)
     */
    private $elevenMonths;

    /**
     * @var boolean
     *
     * @ORM\Column(name="$twelveMonths", type="boolean", nullable=false)
     */
    private $twelveMonths;
    /**
     * @var boolean
     *
     * @ORM\Column(name="$fifteenMonths", type="boolean", nullable=false)
     */
    private $fifteenMonths;

    /**
     * @var boolean
     *
     * @ORM\Column(name="$fourYears", type="boolean", nullable=false)
     */
    private $fourYears;

    /**
     * @var boolean
     *
     * @ORM\Column(name="$sixYears", type="boolean", nullable=false)
     */
    private $sixYears;

    /**
     * @var boolean
     *
     * @ORM\Column(name="$twelveYears", type="boolean", nullable=false)
     */
    private $twelveYears;

    /**
     * @var boolean
     *
     * @ORM\Column(name="$fourteenYears", type="boolean", nullable=false)
     */
    private $fourteenYears;


    /**
     * Vacunas constructor.
     * @param string $nombre
     * @param string $condiciones
     * @param bool $twoMonths
     * @param bool $fourMonths
     * @param bool $elevenMonths
     * @param bool $twelveMonths
     * @param bool $fifteenMonths
     * @param bool $fourYears
     * @param bool $sixYears
     * @param bool $twelveYears
     * @param bool $fourteenYears
     */
    public function __construct(string $nombre, string $condiciones, bool $twoMonths, bool $fourMonths, bool $elevenMonths, bool $twelveMonths, bool $fifteenMonths, bool $fourYears, bool $sixYears, bool $twelveYears, bool $fourteenYears)
    {
        $this->nombre = $nombre;
        $this->twoMonths = $twoMonths;
        $this->fourMonths = $fourMonths;
        $this->elevenMonths = $elevenMonths;
        $this->twelveMonths = $twelveMonths;
        $this->$fifteenMonths = $fifteenMonths;
        $this->fourYears = $fourYears;
        $this->sixYears = $sixYears;
        $this->twelveYears = $twelveYears;
        $this->fourteenYears = $fourteenYears;
        $this->condiciones = $condiciones;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getCondiciones(): string
    {
        return $this->condiciones;
    }

    /**
     * @param string $condiciones
     */
    public function setCondiciones(string $condiciones)
    {
        $this->condiciones = $condiciones;
    }


    /**
     * @return bool
     */
    public function getTwoMonths(): bool
    {
        return $this->twoMonths;
    }

    /**
     * @param bool $twoMonths
     */
    public function setTwoMonths(bool $twoMonths)
    {
        $this->twoMonths = $twoMonths;
    }

    /**
     * @return bool
     */
    public function getFourMonths(): bool
    {
        return $this->twoMonths;
    }

    /**
     * @param bool $fourMonths
     */
    public function setFourMonths(bool $fourMonths)
    {
        $this->twoMonths = $fourMonths;
    }

    /**
     * @return bool
     */
    public function isElevenMonths(): bool
    {
        return $this->elevenMonths;
    }

    /**
     * @param bool $elevenMonths
     */
    public function setElevenMonths(bool $elevenMonths)
    {
        $this->elevenMonths = $elevenMonths;
    }

    /**
     * @return bool
     */
    public function isTwelveMonths(): bool
    {
        return $this->twelveMonths;
    }

    /**
     * @param bool $twelveMonths
     */
    public function setTwelveMonths(bool $twelveMonths)
    {
        $this->twelveMonths = $twelveMonths;
    }

    /**
     * @return bool
     */
    public function isFifteenMonths(): bool
    {
        return $this->fifteenMonths;
    }

    /**
     * @param bool $fifteenMonths
     */
    public function setFifteenMonths(bool $fifteenMonths)
    {
        $this->fifteenMonths = $fifteenMonths;
    }

    /**
     * @return bool
     */
    public function isFourYears(): bool
    {
        return $this->fourYears;
    }

    /**
     * @param bool $fourYears
     */
    public function setFourYears(bool $fourYears)
    {
        $this->fourYears = $fourYears;
    }

    /**
     * @return bool
     */
    public function isSixYears(): bool
    {
        return $this->sixYears;
    }

    /**
     * @param bool $sixYears
     */
    public function setSixYears(bool $sixYears)
    {
        $this->sixYears = $sixYears;
    }

    /**
     * @return bool
     */
    public function isTwelveYears(): bool
    {
        return $this->twelveYears;
    }

    /**
     * @param bool $twelveYears
     */
    public function setTwelveYears(bool $twelveYears)
    {
        $this->twelveYears = $twelveYears;
    }

    /**
     * @return bool
     */
    public function isFourteenYears(): bool
    {
        return $this->fourteenYears;
    }

    /**
     * @param bool $fourteenYears
     */
    public function setFourteenYears(bool $fourteenYears)
    {
        $this->fourteenYears = $fourteenYears;
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
        return [
            'vacuna' => [
                'id' => $this->getId(),
                'nombre' => $this->getNombre(),
                'condiciones' => $this->getCondiciones()
            ]
        ];
    }

}