$(function () {
    getArticles("#liste");
});

var mngPageArticle = {
    getArticles: function (tagId) {
        $(tagId).html('<span class="uk-text-primary" uk-spinner="ratio: 2"></span>');
        $.get("jsn/get-article-page-liste.php", function (res) {
            //console.log(res);
            var out = '';
            if(res.success) {
                out = '<table class="uk-table uk-table-expand uk-table-divider uk-table-small">';
                out += '<thead><tr>';
                out += '<th>#</th>';
                out += '<th>Page</th>';
                out += '<th>Contenu</th>';
                out += '<th>Date d\'édition</th>';
                out += '<th>Etat</th>';
                out += '<th></th></tr></thead><tbody>';
                for (var i = 0; i<res.donnees.length; i++){
                    var tr = '<tr>'
                        tr += '<td>'+(i + 1)+'</td>'
                        tr += '<td class="uk-text-primary">'+res.donnees[i].page+'</td>'
                        tr += '<td>'+res.donnees[i].contenu.substring(0, 100)+'</td>'
                        tr += '<td>'+res.donnees[i].dateEdition+'</td>'
                        tr += '<td>'+res.donnees[i].etat.toUpperCase()+'</td>'
                        tr += '<td><a href="" uk-icon="icon: pencil" uk-tooltip="title: Modifier"></a><a href="" class="uk-text-danger" uk-icon="icon: trash" uk-tooltip="title: Supprimer"></a></td>'
                        tr += '</tr>';
                    out += tr;
                }
                out += '</tbody></table>';
            }else {
                out = '<p class="uk-alert uk-alert-warning" uk-alert>Vous n\'avez pas d\'article enregistré.</p>';
            }
            $(tagId).html(out);
        });
    },
    addPageArticle: function (article) {
        //console.log(article);
        $.post("jsn/add-article.php", article, function (res) {
            //console.log(res);
            if (res.success){
                UIkit.notification({
                    message: '<b>Succès !</b>'+res.msg,
                    status: 'primary',
                    pos: 'top-right',
                    timeout: 3000
                });
                window.setTimeout(function () {
                    window.location.reload();
                }, 3000);
            }else {
                UIkit.notification({
                    message: '<b>Erreur !</b>'+res.msg,
                    status: 'danger',
                    pos: 'top-right',
                    timeout: 3000
                });
            }
        });
    },
    editPageArticle: function (e_article) {
        //console.log(e_article);
        $.post("jsn/edit-page-article.php", e_article, function (res) {
            console.log(res);
            if (res.success){
                UIkit.notification({
                    message: '<b>Succès !</b>'+res.msg,
                    status: 'primary',
                    pos: 'top-right',
                    timeout: 3000
                });
                window.setTimeout(function () {
                    window.location.reload();
                }, 3000);
            }else {
                UIkit.notification({
                    message: '<b>Erreur !</b> '+res.msg,
                    status: 'danger',
                    pos: 'top-right',
                    timeout: 3000
                });
            }
        });
    },
};

var pageArticleFrm = {
    submitFrm: function (frmId) {
        $(frmId).submit(function (f) {
            f.preventDefault();
            var data = {
                page: $("#page").val(),
                etat: $("#etat").val(),
                contenu: $("#contenu").val()
            };

            var err_tab = [];

            if (data.page == ""){
                err_tab.push("Veuillez sélectionner la page");
            }
            if (data.contenu == ""){
                err_tab.push("Veuillez saisir le contenu de la page");
            }

            if (err_tab.length > 0){
                var ul = '<ul>';
                for (var i = 0; i < err_tab.length; i++){
                    var li = '<li>'+err_tab[i]+'</li>';
                    ul += li;
                }
                ul += '</ul>';
                UIkit.notification({
                    message: '<b>Erreur !</b>'+ul,
                    status: 'warning',
                    pos: 'top-right',
                    timeout: 5000
                });
            }else{
                mngPageArticle.addPageArticle(data);
            }
        })
    },
    clearFrmData: function () {
        $("#page").val("");
        $("#etat").val("publié");
         $("#contenu").val("");
    }
};

function clearFrmData() {
    $("#page").val("");
    $("#etat").val("publié");
    $("#contenu").val("");
}
function getArticles(tagId) {
    $(tagId).html('<span class="uk-text-primary" uk-spinner="ratio: 2"></span>');
    $.get("jsn/get-article-page-liste.php", function (res) {
        //console.log(res);
        var out = '';
        if(res.success) {
            out = '<table class="uk-table uk-table-expand uk-table-divider uk-table-small">';
            out += '<thead><tr>';
            out += '<th>#</th>';
            out += '<th>Page</th>';
            out += '<th>Contenu</th>';
            out += '<th>Date d\'édition</th>';
            out += '<th>Etat</th>';
            out += '<th></th></tr></thead><tbody>';
            for (var i = 0; i<res.donnees.length; i++){
                var publink = (res.donnees[i].etat=="publié") ? ' <a href="javascript:void(0);" onclick="disabledArticle('+res.donnees[i].idarticle_pages+');return false;" class="uk-text-warning" uk-icon="icon:close" uk-tooltip="title:Cliquez pour annuler la publication de cet article"></a>' : ' <a href="javascript:void(0);" onclick="enabledArticle('+res.donnees[i].idarticle_pages+');return false;" class="uk-text-success" uk-icon="icon:link" uk-tooltip="title:Cliquez pour publié cet article"></a>'
                var tr = '<tr>';
                tr += '<td>'+(i + 1)+'</td>'
                tr += '<td class="uk-text-primary">'+res.donnees[i].page+'</td>'
                tr += '<td>'+res.donnees[i].contenu.substring(0, 100)+'</td>'
                tr += '<td>'+res.donnees[i].dateEdition+'</td>'
                tr += '<td>'+res.donnees[i].etat.toUpperCase()+publink+'</td>'
                tr += '<td><a href="editpageart/'+res.donnees[i].idarticle_pages+'" uk-icon="icon: pencil" uk-tooltip="title: Modifier"></a><a href="javascript:void(0);" onclick="deletePagesArticle('+res.donnees[i].idarticle_pages+');" class="uk-text-danger" uk-icon="icon: trash" uk-tooltip="title: Supprimer"></a></td>'
                tr += '</tr>';
                out += tr;
            }
            out += '</tbody></table>';
        }else {
            out = '<p class="uk-alert uk-alert-warning" uk-alert>Vous n\'avez pas d\'article enregistré.</p>';
        }
        $(tagId).html(out);
    });
}

$("#frmAddPageArticle").submit(function (f) {
    f.preventDefault();
    var data = {
        page: $("#page").val(),
        etat: $("#etat").val(),
        contenu: $("#contenu").val()
    };

    var err_tab = [];

    if (data.page == ""){
        err_tab.push("Veuillez sélectionner la page");
    }
    if (data.contenu == ""){
        err_tab.push("Veuillez saisir le contenu de la page");
    }

    if (err_tab.length > 0){
        var ul = '<ul>';
        for (var i = 0; i < err_tab.length; i++){
            var li = '<li>'+err_tab[i]+'</li>';
            ul += li;
        }
        ul += '</ul>';
        UIkit.notification({
            message: '<b>Erreur !</b>'+ul,
            status: 'warning',
            pos: 'top-right',
            timeout: 5000
        });
    }else{
        mngPageArticle.addPageArticle(data);
    }
});

$("#frmEditPageArticle").submit(function (f) {
    f.preventDefault();
    var data = {
        id: $("#article").val(),
        page: $("#page").val(),
        etat: $("#etat").val(),
        contenu: $("#contenu").val()
    };

    var err_tab = [];

    if (data.page == ""){
        err_tab.push("Veuillez sélectionner la page");
    }
    if (data.contenu == ""){
        err_tab.push("Veuillez saisir le contenu de la page");
    }

    if (err_tab.length > 0){
        var ul = '<ul>';
        for (var i = 0; i < err_tab.length; i++){
            var li = '<li>'+err_tab[i]+'</li>';
            ul += li;
        }
        ul += '</ul>';
        UIkit.notification({
            message: '<b>Erreur !</b>'+ul,
            status: 'warning',
            pos: 'top-right',
            timeout: 5000
        });
    }else{
        //mngPageArticle.editPageArticle(data);
        $("this").submit();
    }
});
function deletePagesArticle(arg) {
    if (confirm('Vous êtes sur le point de supprimer cet article.\n\nPour continuer, cliquez sur "OK')){
        $.get("jsn/delete-pages-articles.php?a="+arg, function (res) {
            console.log(res);
            if (res.success){
                UIkit.notification({
                    message: '<b>Succès !</b>'+res.msg,
                    status: 'primary',
                    pos: 'top-right',
                    timeout: 5000
                });
                getArticles("#liste");
            }else {
                UIkit.notification({
                    message: '<b>Erreur ! </b>'+res.msg,
                    status: 'danger',
                    pos: 'top-right',
                    timeout: 5000
                });
            }
        });
    }
}

function disabledArticle(arg) {
    if (confirm('Vous allez annuler la publication de cet article.\n\nPour continuer, cliquez sur "OK"')){
        $.get("jsn/pub-page-article.php?a="+arg+'&ds=true', function (res) {
            console.log(res);
            if (res.success){
                UIkit.notification({
                    message: '<b>Succès !</b>'+res.msg,
                    status: 'primary',
                    pos: 'top-right',
                    timeout: 5000
                });
                getArticles("#liste");
            }else {
                UIkit.notification({
                    message: '<b>Erreur ! </b>'+res.msg,
                    status: 'danger',
                    pos: 'top-right',
                    timeout: 5000
                });
            }
        });

    }
}

function enabledArticle(arg) {
    if (confirm('Vous allez publié cet article.\n\nPour continuer, cliquez sur "OK')){
        $.get("jsn/pub-page-article.php?a="+arg+'&en=true', function (res) {
            console.log(res);
            if (res.success){
                UIkit.notification({
                    message: '<b>Succès !</b>'+res.msg,
                    status: 'primary',
                    pos: 'top-right',
                    timeout: 5000
                });
                getArticles("#liste");
            }else {
                UIkit.notification({
                    message: '<b>Erreur ! </b>'+res.msg,
                    status: 'danger',
                    pos: 'top-right',
                    timeout: 5000
                });
            }
        });

    }
}