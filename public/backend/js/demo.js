$(document).ready(function() {
    $('#test').isiaFormRepeater({
        addButton: '<div class="repeat-add-wrapper"><a data-repeat-add-btn class="repeat-add pure-button pure-button-primary" href="#">Ajouter</a></div>',
        removeButton: '<a data-repeat-remove-btn class="repeat-remove pure-button pure-button-primary" href="#">Supprimer</a>'
    });
    $('#test2').isiaFormRepeater();
});