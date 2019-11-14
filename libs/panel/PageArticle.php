<?php

namespace Libs\panel;


class PageArticle
{
    private $page;
    private $contenu;
    private $etat;

    /**
     * PageArticle constructor.
     * @param $page
     * @param $contenu
     * @param $etat
     */
    public function __construct($page, $contenu, $etat)
    {
        $this->page = $page;
        $this->contenu = $contenu;
        $this->etat = $etat;
    }

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param mixed $page
     */
    public function setPage($page)
    {
        $this->page = $page;
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