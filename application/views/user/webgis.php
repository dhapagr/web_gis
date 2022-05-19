<section id="cta" class="ctalogin">
</section>


    <!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>La culture à Nantes</title>
       
        <meta content="culture, Nantes, musée, bibliothèque, médiathèque, ludothèque,
              salle de spectacle, théâtre, concert, cinéma, exposition, 
              école culturelle, école de musique, monument">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="<?php echo base_url("assets"); ?>/user/map/normalize.min.css">
        <link rel="stylesheet" href="<?php echo base_url("assets"); ?>/user/map/main.css">

        <script src="<?php echo base_url("assets"); ?>/user/map/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        
        <!-- Include Leaflet CSS & JavaScript -->
        <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.1/leaflet.css" />
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.1/leaflet.ie.css" />
        <![endif]-->
        <script src="http://cdn.leafletjs.com/leaflet-0.7.1/leaflet.js"></script>
        <!--script src="js/vendor/leaflet-src.js"></script-->
    </head>
     
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="main wrapper clearfix">

            <div id="map" class="leaflet-container"></div>
            
        </div> <!-- #main -->

        <!-- Placeholder used by the leaflet.infopane.js plugin -->
        <div id="infopane">
            <h2>La culture à Nantes</h2>
            <p>
                Cette carte montre les équipements publics culturels de 
                l'agglomération nantaise publiés sur la 
                <a href="http://data.nantes.fr/" target="_blank">plate-forme Open Data</a> 
                de Nantes Métropole, données vérifiées et complétées par mes soins.
            </p>
            <p>Cette page utilise :</p>
            <ul>
                <li>l'incontournable librairie <a href="http://leafletjs.com/" target="_blank">Leaflet</a></li>
                <li>le superbe fonds de carte <a href="http://openstreetmap.fr/" target="_blank">OpenStreetMap</a></li>
                <li>les symboles de <a href="http://mapicons.nicolasmollet.com/" target="_blank">Maps Icons Collection</a></li>
                <li><a href="http://kiro.me/projects/fuse.html" target="_blank">Fuse.js</a> pour la recherche floue côté client</li>
            </ul>
            <p>Le panneau de recherche est un plugin Leaflet que j'ai développé autour de Fuse.js, 
                il est disponible sur mon compte <a href="https://github.com/naomap/leaflet-fusesearch" target="_blank">GitHub</a>.</p>
            <p>Site créé et maintenu par Antoine Riche de 
                <a href="http://cartocite.fr" target="_blank">Carto'CITÉ</a>.
            </p>
        </div>
        
        <!--div class="footer-container">
            <footer class="wrapper">
                <h3>footer</h3>
            </footer>
        </div-->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.js"><\/script>')</script>

         <!-- Include Fuse.js for fuzzy search : http://kiro.me/projects/fuse.html -->
        <script src="<?php echo base_url("assets"); ?>/user/map/vendor/fuse.js"></script>
        <script src="<?php echo base_url("assets"); ?>/user/map/leaflet.fusesearch.js"></script>
        <link rel="stylesheet" href="<?php echo base_url("assets"); ?>/user/map/leaflet.fusesearch.css" />

        <!-- Include Info pane -->
        <script src="<?php echo base_url("assets"); ?>/user/map/leaflet.infopane.js"></script>
        <link rel="stylesheet" href="<?php echo base_url("assets"); ?>/user/map/leaflet.infopane.css" />

        <script src="<?php echo base_url("assets"); ?>/user/map/main.js"></script>

        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
              m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
              })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
              ga('create', 'UA-47906656-1', 'naomap.fr');
              ga('send', 'pageview');
        </script>

    </body>
</html>
