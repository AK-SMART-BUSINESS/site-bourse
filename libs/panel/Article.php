<?php

namespace Libs\panel;


class Article
{
    private $titre;
    private $contenu;
    private $etat;

    /**
     * Article constructor.
     * @param $titre
     * @param $contenu
     * @param $etat
     */
    public function __construct($titre, $contenu, $etat)
    {
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->etat = $etat;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }
}