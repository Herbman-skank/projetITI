<body>

<!-- Création de la barre de navigation responsive -->
<div class="navbar navbar-inverse">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
             </a>
             <a class="brand" href="#">Mangez-moi</a>
                <div class="nav-collapse collapse navbar-inverse-collapse">
                    <ul class="nav">
                      <li class="active"><a href="{jurl 'projetITI~index@classic'}">Accueil</a></li>
                      <li><a href="{jurl 'projetITI~afficher_commande@classic'}">Commande</a></li>
                      <li><a href="#">Contact</a></li>
                    </ul>
                </div>
          </div>
    </div>
</div>
    
  <!-- Mise en place du carousel -->
  <div class="container">
    <div class="row-fluid">
               <div id="myCarousel" class="carousel slide">
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                  <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                  <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                    
                     {foreach $IMAGES as $COURANTIMAGE}
                         <div class="item">
                            <img src="{$PATH.$COURANTIMAGE->Emplacement}" alt="">
                            <div class="carousel-caption">
                              <h4>First Thumbnail label</h4>
                              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            </div>
                          </div>
                      {/foreach}
                      
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
              </div>
    </div>
  </div>


                      
 <script type="text/javascript">
   {literal}
     $('.carousel').carousel('next');
         
     $('.carousel').carousel({

        interval: 4000
  
      })
   {/literal}
  </script>
 <!--test de génération d'url pour afficher des images -->
 

 </body>
