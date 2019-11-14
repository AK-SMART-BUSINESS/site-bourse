<?php

namespace Libs\I\panel;


use Libs\panel\Article;

interface ArticlesInt
{
    public function addArticle(Article $article);
    public function getArticles();
    public function getArticle($id_article);
    public function getFrontArticle();
    public function updateArticle(Article $article, $id_article);
    public function deleteArticle($id_article);
}