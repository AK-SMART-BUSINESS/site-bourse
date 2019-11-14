<?php

namespace Libs\panel;


use Libs\Common;
use Libs\I\panel\PageArticleInt;

class MngPageArticle extends Common implements PageArticleInt
{
    public function addPargeArticle(PageArticle $article)
    {
        $article_data = array($article->getPage(),$article->getContenu(),$article->getEtat(),$_SESSION['uid']);
        $sql = "INSERT INTO article_pages
                SET page=?, contenu=?, dateEdition=NOW(), etat=?, panel_users_id=?";
        try{
            $req = $this->db->prepare($sql);
            if ($req->execute($article_data)){
                return true;
            }
        }catch (\PDOException $pe){
            $this->setMsgErr($pe->getMessage());
            return false;
        }
    }

    public function getPargeArticle()
    {
        $sql = "SELECT a.*, u.nomcomplet
                FROM article_pages a 
                INNER JOIN panel_users u 
                  ON u.id=a.panel_users_id";
        try{
            $req = $this->db->prepare($sql);
            $req->execute();
            $res = $req->fetchAll();
            $req->closeCursor();
            return $res;
        }catch (\Exception $e){
            $this->setMsgErr($e->getMessage());
            return false;
        }
    }

    public function getPargeArticleByPage($page)
    {
        $sql = "SELECT a.*, u.nomcomplet
                FROM article_pages a 
                INNER JOIN panel_users u 
                  ON u.id=a.panel_users_id 
                WHERE page=?";
        try{
            if ($page != ""){
                $req = $this->db->prepare($sql);
                $req->execute(array($page));
                $res = $req->fetch();
                $req->closeCursor();
                return $res;
            }else{
                throw new \Exception("Error ! Invalid parameter [page].");
            }
        }catch (\Exception $e){
            $this->setMsgErr($e->getMessage());
            return false;
        }
    }

    public function getPargeArticleById($page)
    {
        $page = intval($page);
        $sql = "SELECT a.*, u.nomcomplet
                FROM article_pages a 
                INNER JOIN panel_users u 
                  ON u.id=a.panel_users_id 
                WHERE a.idarticle_pages=?";
        try{
            if ($page > 0){
                $req = $this->db->prepare($sql);
                $req->execute(array($page));
                $res = $req->fetch();
                $req->closeCursor();
                return $res;
            }else{
                throw new \Exception("Error ! Invalid parameter [page].");
            }
        }catch (\Exception $e){
            $this->setMsgErr($e->getMessage());
            return false;
        }
    }

    public function editPageArticle($article, $etat, $id_article)
    {
        $article_data = array($article, $etat, intval($id_article));
        $sql = "UPDATE article_pages
                SET contenu=?, etat=? WHERE idarticle_pages=?";
        try{
            $req = $this->db->prepare($sql);
            if ($req->execute($article_data)){
                return true;
            }
        }catch (\PDOException $pe){
            $this->setMsgErr($pe->getMessage());
            return false;
        }
    }
    public function updatePageArticle(PageArticle $article, $id_article)
    {
        $article_data = array($article->getPage(),$article->getContenu(),$article->getEtat(),intval($id_article));
        $sql = "UPDATE article_pages
                SET page=?, contenu=?, etat=? WHERE idarticle_pages=?";
        try{
            $req = $this->db->prepare($sql);
            if ($req->execute($article_data)){
                return true;
            }
        }catch (\PDOException $pe){
            $this->setMsgErr($pe->getMessage());
            return false;
        }
    }

    public function enabledArticle($id_article)
    {
        $article_data = array(intval($id_article));
        $sql = "UPDATE article_pages
                SET etat='publié' WHERE idarticle_pages=?";
        try{
            $req = $this->db->prepare($sql);
            if ($req->execute($article_data)){
                return true;
            }
        }catch (\PDOException $pe){
            $this->setMsgErr($pe->getMessage());
            return false;
        }
    }

    public function disabledArticle($id_article)
    {
        $article_data = array(intval($id_article));
        $sql = "UPDATE article_pages
                SET etat='non publié' WHERE idarticle_pages=?";
        try{
            $req = $this->db->prepare($sql);
            if ($req->execute($article_data)){
                return true;
            }
        }catch (\PDOException $pe){
            $this->setMsgErr($pe->getMessage());
            return false;
        }
    }

    public function deletePargeArticle($idarticle_page)
    {
        $idarticle_page_data = array(intval($idarticle_page));

        $sql = 'DELETE FROM article_pages WHERE idarticle_pages=?';
        try{
            $req = $this->db->prepare($sql);
            if ($req->execute($idarticle_page_data)){
                return true;
            }
        }catch (\PDOException $pe){
            $this->setMsgErr($pe->getMessage());
            return false;
        }

    }

    public function teste()
    {
        return "ok";
    }
}