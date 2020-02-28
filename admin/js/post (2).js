function GetXmlHttpObject() {
    var xmlHttp = null;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        // Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}

function keyset(key, e) {

    if (e.keyCode == 13) {
        document.getElementById(key).focus();
    }
}

function got_focus(key) {
    document.getElementById(key).style.backgroundColor = "#000066";

}

function lost_focus(key) {
    document.getElementById(key).style.backgroundColor = "#000000";

}

function newent() {


    document.getElementById('code').value = "";
    document.getElementById('name').value = "";
    document.getElementById('category').value = "Select Category";
    document.getElementById('descrip').value = "";

    document.getElementById('file').innerHTML = "";
    document.getElementById('blah').src = "";
    document.getElementById('msg_box').innerHTML = "";

    getdt();
}

function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "post_data.php";
    url = url + "?Command=" + "getdt";
    url = url + "&ls=" + "new";

    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}



function assign_dt() {

    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");


        var idno = XMLAddress1[0].childNodes[0].nodeValue;

        if (idno.length === 1) {
            idno = "P/0000" + idno;
        } else if (idno.length === 2) {
            idno = "P/000" + idno;
        } else if (idno.length === 3) {
            idno = "P/00" + idno;
        } else if (idno.length === 4) {
            idno = "P/0" + idno;
        } else if (idno.length === 5) {
            idno = "P/" + idno;
        }

        document.form1.code.value = idno;


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("uniq");
        document.getElementById("uniq").value = XMLAddress1[0].childNodes[0].nodeValue;

    }
}



function save_inv() {


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    if (document.getElementById('code').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Code Not Entered</span></div>";
        return false;
    }
    if (document.getElementById('name').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Name Not Entered</span></div>";
        return false;
    }
    if (document.getElementById('category').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Category Not Selected</span></div>";
        return false;
    }
    if (document.getElementById('descrip').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Description Entered</span></div>";
        return false;
    }

    var files = $('#file')[0].files;
    var size = files.length;
    if (size == 0) {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Image Not Enterd</span></div>";
        return false;
    }


    for (var i = 0, f; f = files[i]; i++) {
        var name = document.getElementById('file');
        var alpha = name.files[i];
        console.log(alpha.name);
        var data = new FormData();

        data.append('Command', "save_inv");

        var code = document.getElementById('code').value;
        var uniq = document.getElementById('uniq').value;
        var name1 = document.getElementById('name').value;
        var category = document.getElementById('category').value;
        var descrip = document.getElementById('descrip').value;
        data.append('code', code);
        data.append('uniq', uniq);
        data.append('name', name1);
        data.append('category', category);
        data.append('descrip', descrip);


        data.append('file', alpha);
        $.ajax({
            url: 'post_data.php',
            data: data,
            processData: false,
            contentType: false,
            type: 'POST',
//
//            success: function (msg) {
//
////                if (msg == "Saved") {
//                document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Saved</span></div>";
//                setTimeout("location.reload(true);", 500);
////                } else {
////                    document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + msg + "</span></div>";
////                }
//            }
        });
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Saved</span></div>";
        setTimeout("location.reload(true);", 500);


    }
}

