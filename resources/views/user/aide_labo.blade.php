@extends('layouts.layout-labo')

@section('content')
<div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
</div>
<style>
.info-box {
    box-shadow: 0px 3px 13px 3px #00000014;
}

.box {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: none;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0px 3px 13px 3px #00000014;

}

</style>

<section class="content-header" id="01">
    <h1>
        Docs
      <small>labshare</small>
    </h1>
    <ol class="breadcrumb">
       
      <li class="active"><i class="fa fa-dashboard"> </i> Menu</li>
      <li><a href="#"> Docs </a></li>
  
    </ol>
  </section>
  <section class="content">
    
    <div class="box box-solid" style="padding-left:40px;">
      
          <header class="content-header container-fluid" >
              <div class="row">
                  <div class="col-lg-8">
                      <h1 class="content-max-width">Documentation </h1>
                      <hr>
                  </div>
                  
              </div>
          </header>
     

      <div class="row">
        <br>
        <div class=" col-md-3">
           <div   class="help-block"></div>
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li class="active"><a href="#01">Labshare</a></li>
                  <li><a href="#02">Caractéristiques</a></li>
                  <li><a href="#03"> Page d’accueil </a></li>
                  <li><a href="#04"> Liste annonces </a></li>
                  <li><a href="#05"> Liste de mes annonces </a></li>
                  <li><a href="#06"> Ajouter une annonce </a></li>
                  <li><a href="#07"> Magasin </a></li>
                  <li><a href="#08"> Discussion </a></li>
                </ul>
              </div>
        </div>
        <div class="col-md-8">
            <section class="content-max-width">
                <section id="installation">
                  <div >

                 
                    <h3>Qu'est-ce que LabShare ?</h3>
<p>
  « LabShare » est un site intranet privé utilisé par les chefs de labos de département chimie  et qui utilise les mêmes protocoles qu'Internet (TCP, IP, HTTP, SMTP, IMAP, etc.). Cette utilisation n'est pas nécessairement locale, un intranet pouvant s'étendre à travers le WAN.
</p>
<p>
  Ce site facilite l’échange des produits entre les laboratoires de département chimie de la Faculté des sciences de Monastir.
</p>
<p>
  Il admet un administrateur qui est en charge de gérer le site tout en donnant l’autorisation d’utilisation de site aux différents chefs de département de chimie en l’ajoutant comme des membres. L’administrateur a le droit de supprimer ou modifier les comptes des membres.
</p>
<p>
  Le chef de laboratoire qui veut offrir un produit doit soumettre une annonce pour ceux qui l’en ont besoin (simple ou avec changement par autre produit), ainsi il peut supprimer ses offres et demander des produits. 
</p>
<p>
  En cas où l’une des chefs ne trouve pas le produit qu’il a besoin parmi les offres publiées il peut laisser une annonce aux autres.
</p>
<p>
  Tous les utilisateurs de ce site peuvent consulter les nouvelles actualités ainsi qu’ils peuvent chercher les produits.
</p>
<br><hr><br>
</div>

<div id="02">
<h3>Caractéristiques</h3>




  

  <h4>Jolies URL :</h4>
  <p> <a>http://www.departement-chimie-fsm.ml</a></p>
 <h4>Fiabilité :</h4> 
 <p>L’application doit fonctionner de façon cohérente sans erreurs et doit être satisfaisante.</p>
  <h4> La convivialité :</h4>
 <p>  L'application doit offrir une interface conviviale et ergonomique, exploitable par l'utilisateur en envisageant toutes les interactions possibles à l'écran du support tenu.</p>
 <h4> La confidentialité :</h4>
  <p> Vu que les données manipulées par notre application sont confidentielles, nous devons garantir une sécurité optimale. Ainsi, les droits d’accès au système doivent être bien définis, afin d’assurer la sécurité des données.</p>
  
  <br><hr><br>
</div>

<div id="03">
  <h3> Page d’accueil :</h3>
<p>
    Cette interface représente la page principale de notre site qui s’affiche à n’importe quel visiteur, seuls les membres de site peuvent se connecter et accéder aux services fournis par l’application ainsi qu’ils peuvent contacter l’admin. 
</p>
<div class="thumbnail">
<img src="{{ asset("img/1.png") }}" class="img-responsive" >
</div>

<br><hr><br>
</div>



<div id="04">
 
    <h3>Listes des annonces :</h3>
    <p>
        L’interface ci-après est une interface qui est visible par tous les membres de notre application 
    </p>
    <p>
        « LabShare ». Cette interface regroupe toutes les annonces des produits qui sont ordonnées par leurs dates de publication, il contient aussi les filtres de recherche (par catégorie, par date ou par titre). Les annonces sont affichées sous forme des sujets résumés (titre + sujet), ainsi qu’à partir de cette interface les membres peuvent lire toutes les informations de cette annonce. Il existe aussi un bouton « Demander » dans chaque offre pour le demander et un bouton « Répondre » dans chaque demande pour l’accepter ou annuler.
        
    </p>
    <div class="thumbnail">
        <img src="{{ asset("img/2.png") }}" class="img-responsive" >
        </div>
        <p>
            Exemple pour demander mettez un commentaire puis cliquer sur demander
        </p>
        <div class="thumbnail">
        <img src="{{ asset("img/3.png") }}" class="img-responsive" >
        </div>
        <p>
            Exemple pour confirmer mettez un commentaire puis cliquer sur accepter
        </p>
        <div class="thumbnail">
        <img src="{{ asset("img/4.png") }}" class="img-responsive" >
        </div>

   
        <br><hr><br>
</div>

<div id="05">
    <h3>Liste de mes annonces :</h3>
    <p>
        Grâce à cette interface chaque chef de labo peut voir la liste des annonces qu’il a publiées et peut consulter aussi les réponses des autres chefs à ces annonces à travers le bouton « consulter ». Ainsi il y a un bouton « ajouter annonce » pour publier une nouvelle annonce.
       </p>
       <div class="thumbnail">
          <img src="{{ asset("img/5.png") }}" class="img-responsive" >
        </div>

        <p>
            Exemple en cliquant sur le bouton consulter on va passer à cette page vous pouvez voir le nom de labo qui veut demander votre produit, leur commentaire et la date de demande. Il y a deux boutons pour confirmer ou annuler la demande :
        </p>

        <div class="thumbnail">
            <img src="{{ asset("img/6.png") }}" class="img-responsive" >
          </div>

          <br><hr><br>
</div>

<div id="06">
  
    <h3>Ajouter une annonce :</h3>
    <p>
        Cette interface contient un formulaire à remplir pour ajouter plus de détails à propos une annonce à publier.
        </p>

        <p>
            Dans l’exemple suivant la nature d’annonce est avec changement vous devez donner le nom de votre produit et le nom de produit souhaité.
        </p>
       <div class="thumbnail">
          <img src="{{ asset("img/7.png") }}" class="img-responsive" >
        </div>

        <p>
            Dans l’exemple suivant la nature d’annonce est un don vous devez donner seulement le nom de votre produit.
           </p>

        <div class="thumbnail">
            <img src="{{ asset("img/8.png") }}" class="img-responsive" >
          </div>
          

          <br><hr><br>
</div>

<div id="07">
  
    <h3>Magasin :</h3>
    <p>
       
        Dans cette interface le chef de labo stocke tous les produits existants dans leur magasin. On trouve deux boutons un bouton « modifier » et un bouton « supprimer » devant chaque produit pour le modifier ou le supprimer, il existe aussi une zone de recherche pour faciliter au chef de labo d’effectuer une recherche a un produit.
      </p>

       
       <div class="thumbnail">
          <img src="{{ asset("img/9.png") }}" class="img-responsive" >
        </div>
<p>Pour ajouter un produit dans votre magasin il faut cliquer sur le lien ajouter un produit dans le menu à gauche. Si vous cliquez vous verrez l’interface suivant :</p>
       

        <div class="thumbnail">
            <img src="{{ asset("img/10.png") }}" class="img-responsive" >
          </div>
          <p>
              Cette interface contient un formulaire à remplir pour ajouter plus de détails à propos le produit à ajouter : sa référence, sa désignation, sa formule chimique, son unité, son quantité et sa catégorie.
          </p>
          

          <br><hr><br>
</div>

<div id="08">
  
    <h3>Discussion :</h3>
    <p>
       
        Si un chef de labo est intéressé par un autre chef de labo, il peut accéder à une discussion instantanée avec lui.
       </p>

       
       <div class="thumbnail">
          <img src="{{ asset("img/11.png") }}" class="img-responsive" >
        </div>


          <br><hr><br>
</div>







</section>
    </section>
        </div>

      </div>
     
     

    </div>
  </section>
  @endsection