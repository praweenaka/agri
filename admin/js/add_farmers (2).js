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
    document.getElementById('contact').value = "";
    document.getElementById('address').value = "";

    document.getElementById('msg_box').innerHTML = "";

    getdt();
}

function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "add_farmers_data.php";
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
            idno = "F/0000" + idno;
        } else if (idno.length === 2) {
            idno = "F/000" + idno;
        } else if (idno.length === 3) {
            idno = "F/00" + idno;
        } else if (idno.length === 4) {
            idno = "F/0" + idno;
        } else if (idno.length === 5) {
            idno = "F/" + idno;
        }

        document.getElementById("code").value = idno;


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

    var url = "add_farmers_data.php";
    url = url + "?Command=" + "fam_save";

    url = url + "&code=" + document.getElementById('code').value;
    url = url + "&name=" + document.getElementById('name').value;
    url = url + "&contact=" + document.getElementById('contact').value;
    url = url + "&address=" + document.getElementById('address').value;
    url = url + "&uniq=" + document.getElementById('uniq').value;


    xmlHttp.onreadystatechange = fam_save1;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function fam_save1() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "Save") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Save</span></div>";
            setTimeout("location.reload(true);", 500);

        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }

}