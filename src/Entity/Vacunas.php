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


}
