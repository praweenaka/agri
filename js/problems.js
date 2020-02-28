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


function save_inv() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
    if (document.getElementById('name').value == "") {
        document.getElementById('name').placeholder = "Please Enter Name...";
        return false;
    }

    var url = "problems_data.php";
    url = url + "?Command=" + "problems";
    url = url + "&name=" + document.getElementById('name').value;
    url = url + "&email=" + document.getElementById('email').value;
    url = url + "&descrip=" + document.getElementById('descrip').value;
    url = url + "&uniq=" + document.getElementById('uniq').value;

    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function assign_dt() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
//            alert(xmlHttp.responseText);
        //  location.href = "canteen.php";
        document.getElementById('name').value = "";
        document.getElementById('email').value = "";
        document.getElementById('descrip').value = "";
        document.getElementById('name').focus();

        load();
    }
}
function reply(cdata) {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
   

    var url = "problems_data.php";
    url = url + "?Command=" + "sub_comment";

    var subcom = "comm" + cdata;

    url = url + '&subcom=' + document.getElementById(subcom).value;
    url = url + "&cmnt=" + cdata;

    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);


}

function farmersearch() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "problems_data.php";
    url = url + "?Command=" + "getdata";
    url = url + "&name=" + document.getElementById('widgetSearch').value;

    xmlHttp.onreadystatechange = assign_dtt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function assign_dtt() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("getdata");
        document.getElementById('searchdiv').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;
    }
}

function load() {
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "problems_data.php";
    url = url + "?Command=" + "load";
//    url = url + "&ls=" + "new";

    xmlHttp.onreadystatechange = assign_load;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function assign_load() {
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        document.getElementById('itemdetails').innerHTML = xmlHttp.responseText;

    }
}

