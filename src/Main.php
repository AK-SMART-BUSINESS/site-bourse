<?php
namespace App;
//use Libs\panel\MngArticles;

/**
 * Class définissant les actions de l'application
 * Pour définir une nouvelle action:
 *  - Ajouter une méthode avec pour nom l'action appelée dans l'url
 *  - Inclure le fichier à appelé concernat l'action ainsi que le template si défini
 */
class Main
{
  private $action;
  private $params;

  function __construct($action, $url_params)
  {
    $this->action   = $action;
    $this->params = $url_params;
  }
  /**
   * Affiche le message d'erreur défini dans l'exception
   */
  private function error($msg)
  {
    ob_start();
      echo "$msg";
    $err_msg = ob_get_clean();
    require "f/404.phtml";
    exit();
  }
  /**
   * Affiche le dashbord
   */
  public function accueil()
  {
    ob_start();
    require "tpl/accueil.phtml";
      $output = ob_get_clean();
    require "tpl/template.phtml";
  }

  public function historique()
  {
    ob_start();
    require "tpl/historique.phtml";
      $output = ob_get_clean();
    require "tpl/template.phtml";
  }
  public function presentation()
  {
    ob_start();
    require "tpl/presentation.phtml";
      $output = ob_get_clean();
    require "tpl/template.phtml";
  }
  public function organisation()
  {
    ob_start();
    require "tpl/organisation.phtml";
      $output = ob_get_clean();
    require "tpl/template.phtml";
  }
  public function organigramme()
  {
    ob_start();
    require "tpl/organigramme.phtml";
      $output = ob_get_clean();
    require "tpl/template.phtml";
  }
  public function missions()
  {
    ob_start();
    require "tpl/mission.phtml";
      $output = ob_get_clean();
    require "tpl/template.phtml";
  }
  public function partenaires()
  {
    ob_start();
    require "tpl/partenaires.phtml";
      $output = ob_get_clean();
    require "tpl/template.phtml";
  }
  public function annuaire()
  {
    ob_start();
    require "tpl/annuaire.phtml";
      $output = ob_get_clean();
    require "tpl/template.phtml";
  }
  public function contact()
  {
    ob_start();
    require "tpl/contact.phtml";
      $output = ob_get_clean();
    require "tpl/template.phtml";
  }
  public function directeur()
  {
    ob_start();
    require "tpl/mot-du-directeur.phtml";
      $output = ob_get_clean();
    require "tpl/template.phtml";
  }
  public function article(){
      if (count($this->getParams())){
          $id_article = (int) $this->getParams()[1];
          if ($id_article > 0){
              $mngArticle = new \Libs\panel\MngArticles();
              $article = $mngArticle->getArticle($id_article);

              ob_start();
              require "tpl/article.phtml";
              $output = ob_get_clean();
              require "tpl/template.phtml";
          }else{
              throw new \Exception("Error ! Invalid parameter.");
          }
      }else{
          throw new \Exception("Error ! Invalid parameter");
      }
  }
  public function actualites(){
      $mngArticle = new \Libs\panel\MngArticles();
      $articles = $mngArticle->getActualities();

      ob_start();
      require "tpl/list-articles.phtml";
      $output = ob_get_clean();
      require "tpl/template.phtml";
  }
  public function communiques(){
      $mngPage = new \Libs\panel\MngPageArticle();
      $page = $mngPage->getPargeArticleByPage("communiques");

      ob_start();
      require "tpl/communique.phtml";
      $output = ob_get_clean();
      require "tpl/template.phtml";
  }
  public function documentation(){
      $mngPage = new \Libs\panel\MngPageArticle();
      $page = $mngPage->getPargeArticleByPage("documentation");

      ob_start();
      require "tpl/documentation.phtml";
      $output = ob_get_clean();
      require "tpl/template.phtml";
  }
  public function faq(){
      $mngPage = new \Libs\panel\MngPageArticle();
      $page = $mngPage->getPargeArticleByPage("faq");

      ob_start();
      require "tpl/faq.phtml";
      $output = ob_get_clean();
      require "tpl/template.phtml";
  }
  public function informations(){
      $mngPage = new \Libs\panel\MngPageArticle();
      $page = $mngPage->getPargeArticleByPage("informations");

      ob_start();
      require "tpl/informations.phtml";
      $output = ob_get_clean();
      require "tpl/template.phtml";
  }
  public function lien_utile(){
      $mngPage = new \Libs\panel\MngPageArticle();
      $page = $mngPage->getPargeArticleByPage("lien_utile");

      ob_start();
      require "tpl/lien-utile.phtml";
      $output = ob_get_clean();
      require "tpl/template.phtml";
  }
  public function guide_etudiant_boursier(){
      $mngPage = new \Libs\panel\MngPageArticle();
      $page = $mngPage->getPargeArticleByPage("guide_etudiant_boursier");

      ob_start();
      require "tpl/guide.phtml";
      $output = ob_get_clean();
      require "tpl/template.phtml";
  }
  public function droit_et_recours(){
      $mngPage = new \Libs\panel\MngPageArticle();
      $page = $mngPage->getPargeArticleByPage("droit_et_recours");

      ob_start();
      require "tpl/droit-et-recours.phtml";
      $output = ob_get_clean();
      require "tpl/template.phtml";
  }
  public function ci_appel_candidature(){
      $mngPage = new \Libs\panel\MngPageArticle();
      $page = $mngPage->getPargeArticleByPage("ci_appel_candidature");

      ob_start();
      require "tpl/ci-appel.phtml";
      $output = ob_get_clean();
      require "tpl/template.phtml";
  }
  public function ci_condition_eligibilite(){
      $mngPage = new \Libs\panel\MngPageArticle();
      $page = $mngPage->getPargeArticleByPage("ci_condition_eligibilite");

      ob_start();
      require "tpl/ci-condition.phtml";
      $output = ob_get_clean();
      require "tpl/template.phtml";
  }
  public function et_appel_candidature(){
      $mngPage = new \Libs\panel\MngPageArticle();
      $page = $mngPage->getPargeArticleByPage("et_appel_candidature");

      ob_start();
      require "tpl/et-appel.phtml";
      $output = ob_get_clean();
      require "tpl/template.phtml";
  }
  public function et_condition_eligibilite(){
      $mngPage = new \Libs\panel\MngPageArticle();
      $page = $mngPage->getPargeArticleByPage("et_condition_eligibilite");

      ob_start();
      require "tpl/et-condition.phtml";
      $output = ob_get_clean();
      require "tpl/template.phtml";
  }
  /**
   * Déconnecte l'utilisateur de l'application
   */
  /*public function logout()
  {
    \App\Session::killSession("uid");
    session_destroy();
    header('location: '.URL);
  }*/
  /*--------------------------------------------------------*/
  #########             ADMIN PANEL              ############
  /*--------------------------------------------------------*/
    public function dash()
    {
        ob_start();
        require "pg/dashbord.phtml";
        $output = ob_get_clean();
        require "tpl.phtml";
    }
    public function page_articles()
    {
        ob_start();
        require "pg/page-articles.phtml";
        $output = ob_get_clean();
        require "tpl.phtml";
    }

    public function articles()
    {
        ob_start();
        require "pg/articles.phtml";
        $output = ob_get_clean();
        require "tpl.phtml";
    }

    public function flash_info()
    {
        ob_start();
        require "pg/flash-info.phtml";
        $output = ob_get_clean();
        require "tpl.phtml";
    }

    public function account()
    {
        ob_start();
        require "pg/compte.phtml";
        $output = ob_get_clean();
        require "tpl.phtml";
    }

    public function edit_article()
    {
        ob_start();
        require "pg/edit-article.phtml";
        $output = ob_get_clean();
        require "tpl.phtml";
    }

    public function editpageart()
    {
        ob_start();
        require "pg/edit-page-article.phtml";
        $output = ob_get_clean();
        require "tpl.phtml";
    }

    public function signout()
    {
        \App\Session::killSession("uid");
        session_destroy();
        header('location: '.URL);
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }


}
