$("#info").hide();

$(function () {
    isConnexted();
});

function isConnexted() {
    $.get("jsn/check-connexion.php", function (res) {
        if (res.success){
            window.location.replace("dash");
        }
    })
}

$("#frmLog").submit(function (f) {
    f.preventDefault();
    $("#info").fadeOut();
    var data = {
        email: $("#log").val(),
        passe: $("#pwd").val()
    };

    var err = [];

    if (data.login == ""){
        err.push("Entrez votre identifiant");
    }
    if (data.passe == ""){
        err.push("Entrez votre mot de passe");
    }

    if (err.length > 0){
        let ul = '<ul class="">';
        for (let i = 0; i < err.length; i++){
            let li = '<li>'+err[i]+'</li>';
            ul += li;
        }
        ul += '</ul>';
        $("#info").html(ul);
        $("#info").fadeIn();
    }else{
        $.post("jsn/log.php", data, function (res) {
            //console.log(res);
            if (res.success){
                $("#info").removeClass("uk-alert-warning").addClass("uk-alert-success");
                $("#panelFrmContainer").fadeOut();
                $("#info").html(res.msg);
                $("#info").fadeIn();
                window.setTimeout(function () {
                    window.location.replace("dash");
                }, 3000);
            }else {
                $("#info").html(res.msg);
                $("#info").fadeIn();
                console.log(res.donnees);
            }
        });
    }
});
