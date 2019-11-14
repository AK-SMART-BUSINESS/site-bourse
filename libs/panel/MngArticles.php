<?php

namespace Libs\panel;


use Libs\Common;
use Libs\I\panel\ArticlesInt;

class MngArticles extends Common implements ArticlesInt
{
    public function addArticle(Article $article)
    {
        $article_data = array($article->getTitre(),$article->getContenu(),$article->getEtat(),$_SESSION['uid']);
        $sql = "INSERT INTO articles
                SET titre=?, contenu=?, dateEdition=NOW(), etat=?, panel_users_id=?";
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

    public function updateArticle(Article $article, $id_article)
    {
        $article_data = array($article->getTitre(),
            $article->getContenu(),
            $article->getEtat(), $id_article);
        $sql = "UPDATE articles
                SET titre=?, contenu=?, etat=?
                WHERE idarticles=?";
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

    public function deleteArticle($id_article)
    {
        $article_data = array(intval($id_article));

        $sql = 'DELETE FROM articles WHERE idarticles=?';
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

    public function getArticles()
    {
        $sql = "SELECT a.*, u.nomcomplet
                FROM articles a 
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

    public function getArticle($id_article)
    {
        $id = (int) $id_article;

        $sql = "SELECT a.*, u.nomcomplet
                FROM articles a 
                INNER JOIN panel_users u 
                  ON u.id=a.panel_users_id 
                WHERE a.idarticles=?";
        try{
            if ($id > 0){
                $req = $this->db->prepare($sql);
                $req->execute(array($id));
                $res = $req->fetch();
                $req->closeCursor();
                return $res;
            }else{
                throw new \Exception("Error ! Invalid parameter [id_article].");
            }
        }catch (\Exception $e){
            $this->setMsgErr($e->getMessage());
            return false;
        }
    }

    public function getFrontArticle()
    {
        $sql = "SELECT * FROM articles LIMIT 0, 3";
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

    /**
     * Active la publication d'un article
     * @param $id_article
     * @return bool
     */
    public function enabledArticle($id_article)
    {
        $article_data = array(intval($id_article));
        $sql = "UPDATE articles SET etat='publié' WHERE idarticles=?";
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
    /**
     * Désactive la publication d'un article
     * @param $id_article
     * @return bool
     */
    public function disabledArticle($id_article)
    {
        $article_data = array($id_article);
        $sql = "UPDATE articles
                SET etat='non publié'
                WHERE idarticles=?";
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

    public function getEnabledArticles()
    {
        $sql = "SELECT a.*, u.nomcomplet
                FROM articles a 
                INNER JOIN panel_users u 
                  ON u.id=a.panel_users_id
                WHERE a.idarticles='publié'";
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
    public function getDisabledArticles()
    {
        $sql = "SELECT a.*, u.nomcomplet
                FROM articles a 
                INNER JOIN panel_users u 
                  ON u.id=a.panel_users_id
                WHERE a.idarticles='non publié'";
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

    public function getLatestArticles($nbr)
    {
        $sql = 'SELECT * FROM articles WHERE etat="publié" ORDER BY idarticles DESC LIMIT 0, '.$nbr;
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

    public function getActualities()
    {
        $sql = 'SELECT * FROM articles WHERE etat="publié"';
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
}