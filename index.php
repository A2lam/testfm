<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Test Aspirateur</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="container body-content">
            <h4>Exercice de simulation d'un aspirateur</h4>

            <p>La position actuelle de l'aspirateur est : <span id="pos">5, 5 (N)</span></p>

            <p>Pour indiquer une suite de déplacement <button id="instruction" class="btn btn-primary">cliquez ici</button></p>

            <?php
                for ($i = 1; $i <= 10; $i++)
                {
            ?>
                    <div class="row">
            <?php        
                        for ($j = 1; $j <= 10; $j++)
                        {
                            if ($i == 6 && $j == 5)
                            {
            ?>                    
                                <div id="<?php echo $i. "-" .$j ?>" class="col-md-1 case selected"><img id="aspirateur" src="img/N.png" alt="" /></div>
            <?php                    
                                continue;
                            }
            ?>
                            <div id="<?php echo $i. "-" .$j ?>" class="col-md-1 case"></div>
            <?php            
                        }
            ?>
                    </div>
            <?php                  
                }
            ?>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#instruction").bind('click', function(){
                    var instructions = prompt("Entrez la suite d'instruction sous la forme d'une suite des lettres G,D et A");
                    if (instructions == null){
                        alert("Vous avez cliqué sur Annuler");
                    } else {
                        for (var i = 0; i < instructions.length; i++) {
                            if ((instructions[i] !== "A") && (instructions[i] !== "G") && (instructions[i] !== "D")) {
                                alert("Caractère incorrecte trouvé dans la suite");
                            }
                        }
                        for (var i = 0; i < instructions.length; i++) {
                            execution(instructions[i]);
                        }
                    }
                });
            });

            function execution(instruction) {
                // Lorsque l'instruction est une avancée
                if (instruction === "A") {
                    // On récupère l'orientation de l'aspirateur
                    var orientation = $('img').attr('src');
                    // On avance d'une case
                    // Vers le nord
                    if (orientation.charAt(4) === "N") {
                        // Récupération de la case en cours
                        var id = $('.selected').attr('id');
                        var selecteur = '#' + id;
                        // Définission de l'ordonnée à la case du dessus
                        var newId = + id.charAt(0) - 1 + '-' + id.charAt(2);
                        var newSelecteur = '#' + newId;
                        // Déplacement
                        $(newSelecteur).html('<img id="aspirateur" src="img/N.png" alt="" />');
                        $(selecteur).empty();
                        // Maj des coordonnées affichées
                        var coord = $('#pos').text();
                        if (coord.charAt(4) !== '') {
                            $('#pos').text(coord.charAt(0) + ', ' + ( + (coord.charAt(3) + coord.charAt(4)) + 1 ) + ' (N)');
                        } else {
                            $('#pos').text(coord.charAt(0) + ', ' + ( + coord.charAt(3) + 1 ) + ' (N)');
                        }
                        // Définission des attributs de la nouvelle case selectionnée
                        $(selecteur).removeClass('selected');
                        $(newSelecteur).addClass('selected');
                    }
                    // Vers le sud
                    if (orientation.charAt(4) === "S") {
                        // Récupération de la case en cours
                        var id = $('.selected').attr('id');
                        var selecteur = '#' + id;
                        // Définission de l'ordonnée à la case du dessus
                        var newId = + id.charAt(0) + 1 + '-' + id.charAt(2);
                        var newSelecteur = '#' + newId;
                        // Déplacement
                        $(newSelecteur).html('<img id="aspirateur" src="img/S.png" alt="" />');
                        $(selecteur).empty();
                        // Maj des coordonnées affichées
                        var coord = $('#pos').text();
                        if (coord.charAt(4) !== '') {
                            $('#pos').text(coord.charAt(0) + ', ' + ( (coord.charAt(3) + coord.charAt(4)) - 1 ) + ' (S)');
                        } else {
                            $('#pos').text(coord.charAt(0) + ', ' + ( coord.charAt(3) - 1 ) + ' (S)');
                        }
                        // Définission des attributs de la nouvelle case selectionnée
                        $(selecteur).removeClass('selected');
                        $(newSelecteur).addClass('selected');
                    }
                    // Vers l'est
                    if (orientation.charAt(4) === "E") {
                        // Récupération de la case en cours
                        var id = $('.selected').attr('id');
                        var selecteur = '#' + id;
                        // Définission de l'ordonnée à la case du dessus
                        var newId = id.charAt(0) + '-' + (+ id.charAt(2) + 1);
                        var newSelecteur = '#' + newId;
                        // Déplacement
                        $(newSelecteur).html('<img id="aspirateur" src="img/E.png" alt="" />');
                        $(selecteur).empty();
                        // Maj des coordonnées affichées
                        var coord = $('#pos').text();
                        if (coord.charAt(1) !== ',') {
                            $('#pos').text(( + (coord.charAt(0) + coord.charAt(1)) + 1 ) + ', ' + coord.charAt(3) + ' (E)');
                        } else {
                            $('#pos').text(( + coord.charAt(0) + 1 ) + ', ' + coord.charAt(3) + ' (E)');
                        }
                        // Définission des attributs de la nouvelle case selectionnée
                        $(selecteur).removeClass('selected');
                        $(newSelecteur).addClass('selected');
                    }
                    // Vers l'ouest
                    if (orientation.charAt(4) === "W") {
                        // Récupération de la case en cours
                        var id = $('.selected').attr('id');
                        var selecteur = '#' + id;
                        // Définission de l'ordonnée à la case du dessus
                        var newId = id.charAt(0) + '-' + (+ id.charAt(2) - 1);
                        var newSelecteur = '#' + newId;
                        // Déplacement
                        $(newSelecteur).html('<img id="aspirateur" src="img/W.png" alt="" />');
                        $(selecteur).empty();
                        // Maj des coordonnées affichées
                        var coord = $('#pos').text();
                        if (coord.charAt(1) !== ',') {
                            $('#pos').text(( + (coord.charAt(0) + coord.charAt(1)) - 1 ) + ', ' + coord.charAt(3) + ' (W)');
                        } else {
                            $('#pos').text(( + coord.charAt(0) - 1 ) + ', ' + coord.charAt(3) + ' (W)');
                        }
                        // Définission des attributs de la nouvelle case selectionnée
                        $(selecteur).removeClass('selected');
                        $(newSelecteur).addClass('selected');
                    }
                }
                // Lorsque l'instruction est un pivot vers la droite
                if (instruction === "D") {
                    // On récupère l'orientation de l'aspirateur
                    var orientation = $('img').attr('src');
                    // On remplace l'orientation de l'aspirateur par celle donnée en instruction
                    // Si nord devient est
                    if (orientation.charAt(4) === "N") {
                        // Récupération de la case en cours
                        var id = $('.selected').attr('id');
                        var selecteur = '#' + id;
                        // Remplacement
                        $(selecteur).html('<img id="aspirateur" src="img/E.png" alt="" />')
                        // Maj des coordonnées affichées
                        var coord = $('#pos').text();
                        if (coord.charAt(4) !== '') {
                            $('#pos').text(coord.charAt(0) + ', ' + coord.charAt(3) + coord.charAt(4) + ' (E)');
                        } else {
                            $('#pos').text(coord.charAt(0) + ', ' + coord.charAt(3) + ' (E)');
                        }
                    }
                    // Si sud devient ouest
                    if (orientation.charAt(4) === "S") {
                        // Récupération de la case en cours
                        var id = $('.selected').attr('id');
                        var selecteur = '#' + id;
                        // Remplacement
                        $(selecteur).html('<img id="aspirateur" src="img/W.png" alt="" />')
                        // Maj des coordonnées affichées
                        var coord = $('#pos').text();
                        if (coord.charAt(4) !== '') {
                            $('#pos').text(coord.charAt(0) + ', ' + coord.charAt(3) + coord.charAt(4) + ' (W)');
                        } else {
                            $('#pos').text(coord.charAt(0) + ', ' + coord.charAt(3) + ' (W)');
                        }
                    }
                    // Si est devient sud
                    if (orientation.charAt(4) === "E") {
                        // Récupération de la case en cours
                        var id = $('.selected').attr('id');
                        var selecteur = '#' + id;
                        // Remplacement
                        $(selecteur).html('<img id="aspirateur" src="img/S.png" alt="" />')
                        // Maj des coordonnées affichées
                        var coord = $('#pos').text();
                        if (coord.charAt(1) % 2 !== '') {
                            $('#pos').text(coord.charAt(0) + coord.charAt(1) + ', ' + coord.charAt(4)+ ' (S)');
                        } else {
                            $('#pos').text(coord.charAt(0) + ', ' + coord.charAt(3) + ' (S)');
                        }
                    }
                    // Si ouest devient nord
                    if (orientation.charAt(4) === "W") {
                        // Récupération de la case en cours
                        var id = $('.selected').attr('id');
                        var selecteur = '#' + id;
                        // Remplacement
                        $(selecteur).html('<img id="aspirateur" src="img/N.png" alt="" />')
                        // Maj des coordonnées affichées
                        var coord = $('#pos').text();
                        if (coord.charAt(1) % 2 !== '') {
                            $('#pos').text(coord.charAt(0) + coord.charAt(1) + ', ' + coord.charAt(4) + ' (N)');
                        } else {
                            $('#pos').text(coord.charAt(0) + ', ' + coord.charAt(3) + ' (N)');
                        }
                    }
                }
                // Lorsque l'instruction est un pivot vers la gauche
                if (instruction === "G") {
                    // On récupère l'orientation de l'aspirateur
                    var orientation = $('img').attr('src');
                    // On remplace l'orientation de l'aspirateur par celle donnée en instruction
                    // Si nord devient ouest
                    if (orientation.charAt(4) === "N") {
                        // Récupération de la case en cours
                        var id = $('.selected').attr('id');
                        var selecteur = '#' + id;
                        // Remplacement
                        $(selecteur).html('<img id="aspirateur" src="img/W.png" alt="" />')
                        // Maj des coordonnées affichées
                        var coord = $('#pos').text();
                        if (coord.charAt(4) === '0') {
                            $('#pos').text(coord.charAt(0) + ', ' + coord.charAt(3) + coord.charAt(4) + ' (W)');
                        } else {
                            $('#pos').text(coord.charAt(0) + ', ' + coord.charAt(3) + ' (W)');
                        }
                    }
                    // Si sud devient est
                    if (orientation.charAt(4) === "S") {
                        // Récupération de la case en cours
                        var id = $('.selected').attr('id');
                        var selecteur = '#' + id;
                        // Remplacement
                        $(selecteur).html('<img id="aspirateur" src="img/E.png" alt="" />')
                        // Maj des coordonnées affichées
                        var coord = $('#pos').text();
                        if (coord.charAt(4) === '0') {
                            $('#pos').text(coord.charAt(0) + ', ' + coord.charAt(3) + coord.charAt(4) + ' (E)');
                        } else {
                            $('#pos').text(coord.charAt(0) + ', ' + coord.charAt(3) + ' (E)');
                        }
                    }
                    // Si est devient nord
                    if (orientation.charAt(4) === "E") {
                        // Récupération de la case en cours
                        var id = $('.selected').attr('id');
                        var selecteur = '#' + id;
                        // Remplacement
                        $(selecteur).html('<img id="aspirateur" src="img/N.png" alt="" />')
                        // Maj des coordonnées affichées
                        var coord = $('#pos').text();
                        if (coord.charAt(1) % 2 !== '') {
                            $('#pos').text(coord.charAt(0) + coord.charAt(1) + ', ' + coord.charAt(4) + ' (N)');
                        } else {
                            $('#pos').text(coord.charAt(0) + ', ' + coord.charAt(3) + ' (N)');
                        }
                    }
                    // Si ouest devient sud
                    if (orientation.charAt(4) === "W") {
                        // Récupération de la case en cours
                        var id = $('.selected').attr('id');
                        var selecteur = '#' + id;
                        // Remplacement
                        $(selecteur).html('<img id="aspirateur" src="img/S.png" alt="" />')
                        // Maj des coordonnées affichées
                        var coord = $('#pos').text();
                        if (coord.charAt(1) % 2 !== '') {
                            $('#pos').text(coord.charAt(0) + coord.charAt(1) + ', ' + coord.charAt(4) + ' (S)');
                        } else {
                            $('#pos').text(coord.charAt(0) + ', ' + coord.charAt(3) + ' (S)');
                        }
                    }
                }
            }
        </script>
    </body>
</html>