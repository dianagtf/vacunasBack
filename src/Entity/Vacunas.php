<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Vacunas
 *
 * @ORM\Table(name="vacunas")
 * @ORM\Entity
 */
class Vacunas
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
     * @ORM\Column(name="nombre", type="text", length=65535, nullable=false)
     */
    private $nombre;

    /**
     * @var int
     *
     * @ORM\Column(name="edadMeses", type="integer", nullable=false)
     */
    private $edadmeses;

    /**
     * @var string
     *
     * @ORM\Column(name="condiciones", type="string", length=50, nullable=false)
     */
    private $condiciones;

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
     * @return int
     */
    public function getEdadmeses(): int
    {
        return $this->edadmeses;
    }

    /**
     * @param int $edadmeses
     */
    public function setEdadmeses(int $edadmeses)
    {
        $this->edadmeses = $edadmeses;
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


}
