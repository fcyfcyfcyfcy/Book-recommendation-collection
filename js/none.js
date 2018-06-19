/**
 * 
 * @authors Zheng Liu (995170241@qq.com)
 * @date    2018-06-14 20:19:09
 * @version $Id$
 */

// var loginFlag = 0;
var xmlHttp;

function load() { 
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert ("Browser does not support HTTP Request");
        return;
    }
    var url = "../php/none.php";
    // url=url+"?q="+str;
    // url=url+"&sid="+Math.random();
    xmlHttp.onreadystatechange = stateChanged;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

// book_id
var i = 0;
function stateChanged() { 
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == 200) {
        var jsonstr = xmlHttp.responseText;
        console.log(jsonstr);

        var user = JSON.parse(jsonstr);
        // console.log(recommend_book[0].name);

        document.getElementById("head-user-image").src = user[0].image_addr;
        document.getElementById("head-user-name").innerHTML = user[0].name;
        document.getElementById("head-user-name").href = "user-center.html";
    }
}

function GetXmlHttpObject() {
    var xmlHttp = null;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    }
    catch (e) {
        //Internet Explorer
        try {
        xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}