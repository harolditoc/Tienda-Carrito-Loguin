<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleVenta
 *
 * @ORM\Table(name="detalle_venta", indexes={@ORM\Index(name="venta_idvent", columns={"venta_idventa"}), @ORM\Index(name="articulo_idartic", columns={"articulo_idarticulo"})})
 * @ORM\Entity
 */
class DetalleVenta
{
    /**
     * @var int
     *
     * @ORM\Column(name="iddetalle_venta", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iddetalleVenta;

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
     * @var string
     *
     * @ORM\Column(name="descuento", type="decimal", precision=11, scale=2, nullable=false, options={"default"="0.00"})
     */
    private $descuento = '0.00';

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
     * @var \Venta
     *
     * @ORM\ManyToOne(targetEntity="Venta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="venta_idventa", referencedColumnName="idventa")
     * })
     */
    private $ventaIdventa;

    public function getIddetalleVenta(): ?int
    {
        return $this->iddetalleVenta;
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

    public function getDescuento(): ?string
    {
        return $this->descuento;
    }

    public function setDescuento(string $descuento): self
    {
        $this->descuento = $descuento;

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

    public function getVentaIdventa(): ?Venta
    {
        return $this->ventaIdventa;
    }

    public function setVentaIdventa(?Venta $ventaIdventa): self
    {
        $this->ventaIdventa = $ventaIdventa;

        return $this;
    }


}
