<?php

namespace Libs\I\panel;

use Libs\panel\PageArticle;

interface PageArticleInt
{
    public function addPargeArticle(PageArticle $article);
    public function getPargeArticle();
    public function getPargeArticleByPage($page);
    public function updatePageArticle(PageArticle $article, $id_article);
    public function deletePargeArticle($id_article);
}