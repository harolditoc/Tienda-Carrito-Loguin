<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Venta
 *
 * @ORM\Table(name="venta", indexes={@ORM\Index(name="persona_idperson", columns={"persona_idpersona"}), @ORM\Index(name="usuario_idusu", columns={"usuario_idusuario"})})
 * @ORM\Entity
 */
class Venta
{
    /**
     * @var int
     *
     * @ORM\Column(name="idventa", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idventa;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_comprobante", type="string", length=20, nullable=false)
     */
    private $tipoComprobante = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="serie_comprobante", type="string", length=7, nullable=true)
     */
    private $serieComprobante = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="numero_comprobante", type="string", length=10, nullable=false)
     */
    private $numeroComprobante = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_hora", type="datetime", nullable=false)
     */
    private $fechaHora;

    /**
     * @var string
     *
     * @ORM\Column(name="impuesto", type="decimal", precision=5, scale=2, nullable=false, options={"default"="0.00"})
     */
    private $impuesto = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="pago_total", type="decimal", precision=11, scale=2, nullable=false, options={"default"="0.00"})
     */
    private $pagoTotal = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=20, nullable=false)
     */
    private $estado = '0';

    /**
     * @var \Persona
     *
     * @ORM\ManyToOne(targetEntity="Persona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="persona_idpersona", referencedColumnName="idpersona")
     * })
     */
    private $personaIdpersona;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_idusuario", referencedColumnName="idusuario")
     * })
     */
    private $usuarioIdusuario;

    public function getIdventa(): ?int
    {
        return $this->idventa;
    }

    public function getTipoComprobante(): ?string
    {
        return $this->tipoComprobante;
    }

    public function setTipoComprobante(string $tipoComprobante): self
    {
        $this->tipoComprobante = $tipoComprobante;

        return $this;
    }

    public function getSerieComprobante(): ?string
    {
        return $this->serieComprobante;
    }

    public function setSerieComprobante(?string $serieComprobante): self
    {
        $this->serieComprobante = $serieComprobante;

        return $this;
    }

    public function getNumeroComprobante(): ?string
    {
        return $this->numeroComprobante;
    }

    public function setNumeroComprobante(string $numeroComprobante): self
    {
        $this->numeroComprobante = $numeroComprobante;

        return $this;
    }

    public function getFechaHora(): ?\DateTimeInterface
    {
        return $this->fechaHora;
    }

    public function setFechaHora(\DateTimeInterface $fechaHora): self
    {
        $this->fechaHora = $fechaHora;

        return $this;
    }

    public function getImpuesto(): ?string
    {
        return $this->impuesto;
    }

    public function setImpuesto(string $impuesto): self
    {
        $this->impuesto = $impuesto;

        return $this;
    }

    public function getPagoTotal(): ?string
    {
        return $this->pagoTotal;
    }

    public function setPagoTotal(string $pagoTotal): self
    {
        $this->pagoTotal = $pagoTotal;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getPersonaIdpersona(): ?Persona
    {
        return $this->personaIdpersona;
    }

    public function setPersonaIdpersona(?Persona $personaIdpersona): self
    {
        $this->personaIdpersona = $personaIdpersona;

        return $this;
    }

    public function getUsuarioIdusuario(): ?Usuario
    {
        return $this->usuarioIdusuario;
    }

    public function setUsuarioIdusuario(?Usuario $usuarioIdusuario): self
    {
        $this->usuarioIdusuario = $usuarioIdusuario;

        return $this;
    }

    public function __toString() {
        return $this->idventa;
    }

}
