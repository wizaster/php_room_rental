<?php

class Transaction
{

    private $id;
    private $dateTransaction;
    private $tarif;
    private $prix;
    private $totalTaxes;
    private $tps;
    private $tvq;
    private $statutPaiement;
    private $methodePaiement;
    private $contrainte;
    private $locationId;

    /**
     * Transaction constructor.
     * @param $tarif
     * @param $prix
     * @param $methodePaiement
     * @param $contrainte
     * @param $locationId
     */
    public function __construct($tarif, $prix, $methodePaiement, $contrainte = "", $locationId)
    {
        $this->tarif = $tarif;
        $this->prix = $prix;
        $this->methodePaiement = $methodePaiement;
        $this->contrainte = $contrainte;
        $this->locationId = $locationId;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDateTransaction()
    {
        return $this->dateTransaction;
    }

    /**
     * @param mixed $dateTransaction
     */
    public function setDateTransaction($dateTransaction)
    {
        $this->dateTransaction = $dateTransaction;
    }

    /**
     * @return mixed
     */
    public function getTarif()
    {
        return $this->tarif;
    }

    /**
     * @param mixed $tarif
     */
    public function setTarif($tarif)
    {
        $this->tarif = $tarif;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getTotalTaxes()
    {
        return $this->totalTaxes;
    }

    /**
     * @param mixed $totalTaxes
     */
    public function setTotalTaxes($totalTaxes)
    {
        $this->totalTaxes = $totalTaxes;
    }

    /**
     * @return mixed
     */
    public function getTps()
    {
        return $this->tps;
    }

    /**
     * @param mixed $tps
     */
    public function setTps($tps)
    {
        $this->tps = $tps;
    }

    /**
     * @return mixed
     */
    public function getTvq()
    {
        return $this->tvq;
    }

    /**
     * @param mixed $tvq
     */
    public function setTvq($tvq)
    {
        $this->tvq = $tvq;
    }

    /**
     * @return mixed
     */
    public function getStatutPaiement()
    {
        return $this->statutPaiement;
    }

    /**
     * @param mixed $statutPaiement
     */
    public function setStatutPaiement($statutPaiement)
    {
        $this->statutPaiement = $statutPaiement;
    }

    /**
     * @return mixed
     */
    public function getMethodePaiement()
    {
        return $this->methodePaiement;
    }

    /**
     * @param mixed $methodePaiement
     */
    public function setMethodePaiement($methodePaiement)
    {
        $this->methodePaiement = $methodePaiement;
    }

    /**
     * @return mixed
     */
    public function getContrainte()
    {
        return $this->contrainte;
    }

    /**
     * @param mixed $contrainte
     */
    public function setContrainte($contrainte)
    {
        $this->contrainte = $contrainte;
    }

    /**
     * @return mixed
     */
    public function getLocationId()
    {
        return $this->locationId;
    }


}