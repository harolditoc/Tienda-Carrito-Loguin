<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleIngreso
 *
 * @ORM\Table(name="detalle_ingreso", indexes={@ORM\Index(name="articulo_idarticulo", columns={"articulo_idarticulo"}), @ORM\Index(name="ingreso_idingreso", columns={"ingreso_idingreso"})})
 * @ORM\Entity
 */
class DetalleIngreso
{
    /**
     * @var int
     *
     * @ORM\Column(name="iddetalle_ingreso", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iddetalleIngreso;

    /**
     * @var int
     *
     * @ORM\Column(name="cantidad", type="integer", nullable=false)
     */
    private $cantidad = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="precio", type="decimal", precision=11, scale=2, nullable=false, options={"default"="0.00"})
     */
    private $precio = '0.00';

    /**
     * @var \Articulo
     *
     * @ORM\ManyToOne(targetEntity="Articulo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="articulo_idarticulo", referencedColumnName="idarticulo")
     * })
     */
    private $articuloIdarticulo;

    /**
     * @var \Ingreso
     *
     * @ORM\ManyToOne(targetEntity="Ingreso")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ingreso_idingreso", referencedColumnName="idingreso")
     * })
     */
    private $ingresoIdingreso;

    public function getIddetalleIngreso(): ?int
    {
        return $this->iddetalleIngreso;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getPrecio(): ?string
    {
        return $this->precio;
    }

    public function setPrecio(string $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getArticuloIdarticulo(): ?Articulo
    {
        return $this->articuloIdarticulo;
    }

    public function setArticuloIdarticulo(?Articulo $articuloIdarticulo): self
    {
        $this->articuloIdarticulo = $articuloIdarticulo;

        return $this;
    }

    public function getIngresoIdingreso(): ?Ingreso
    {
        return $this->ingresoIdingreso;
    }

    public function setIngresoIdingreso(?Ingreso $ingresoIdingreso): self
    {
        $this->ingresoIdingreso = $ingresoIdingreso;

        return $this;
    }


}
