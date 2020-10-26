// Global variables
var page = 1;
var projects = readXMLFile('./includes/xml/projects.xml').getElementsByTagName("project");

$(document).ready(function () {
    // Read the cookie and if it's defined scroll to id
    var scroll = $.cookie('scroll');
    if(scroll){
        scrollToID(scroll, 1000);
        $.removeCookie('scroll');
    }

    // Handle event onclick, setting the cookie when the href != #
    $('.nav a, .button, .button_blue').click(function (e) {
        var id = $(this).data('id');
        if(id !== undefined) {
            e.preventDefault();
            var href = $(this).attr('href');
            if(href === '#'){
                scrollToID(id, 1000);
                $.removeCookie('scroll');
            }else{
                $.cookie('scroll', id);
                scrollToID(id, 1000);
                $.removeCookie('scroll');
            }
        }
    });

    // Handle form input focusing
    $('.form_group').focusin(function (e) {
        e.preventDefault();
        var themeCookie = $.cookie('theme');
        if(themeCookie) {
            if(themeCookie === 'dark') {
                this.children[0].style.color = "#d78794";
                this.children[1].style.borderBottom = "solid 2px #d78794";
            } else {
                this.children[0].style.color = "#BF4055";
                this.children[1].style.borderBottom = "solid 2px #BF4055";
            }
        }
    });

    // Handle form input unfocusing
    $('.form_group').focusout(function (e) {
        e.preventDefault();
        var themeCookie = $.cookie('theme');
        if(themeCookie) {
            if(themeCookie === 'dark') {
                this.children[0].style.color = "#b3b3b3";
                this.children[1].style.borderBottom = "solid 2px #b3b3b3";
            } else {
                this.children[0].style.color = "#2a4b6e";
                this.children[1].style.borderBottom = "solid 2px #2a4b6e";
            }
        }
    });

    // Handle theme switching
    $('.mode-switch').click(function (e) {
        var themeCookie = $.cookie('theme');
        if(themeCookie) {
            if(themeCookie === 'light') {
                setCookie('theme', 'dark', 7);
            } else {
                setCookie('theme', 'light', 7);
            }
        }
        window.location.reload(true);
    });

    // Read and render projects data
    renderProjects();

    // Update table page to 1
    document.getElementById('table_page').value = page;

    // scrollToID function
    function scrollToID(id, speed) {
        var offSet = -1;
        var obj = $('#' + id);
        if(obj.length){
          var offs = obj.offset();
          var targetOffset = offs.top - offSet;
          $('html,body').animate({ scrollTop: targetOffset }, speed);
        }
    }
});

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function renderProjects() {
    let prs = document.getElementsByTagName('tr');
    if(prs.length > 1) {
        for(var i = 1; i <= 4; i++) {
            if(prs[1] !== undefined)
                prs[1].remove();
        }
    }
    if (projects.length == 0) return;
    else {
        var showingNEntries = 0; // How much entries are we showing on a current page?
        for (var j = (page * 4) - 4; j < page * 4; j++) {
            if(j >= projects.length) break;
            let title = projects[j].getElementsByTagName('title')[0].childNodes[0].nodeValue;
            let description = projects[j].getElementsByTagName('description')[0].childNodes[0].nodeValue;
            var technologies = projects[j].getElementsByTagName('technologies')[0];
            renderProject(
                projects[j].getElementsByTagName('title')[0].childNodes[0].nodeValue,
                projects[j].getElementsByTagName('description')[0].childNodes[0].nodeValue,
                technologies,
                projects[j].getElementsByTagName('status')[0].childNodes[0].nodeValue,
                projects[j].getElementsByTagName('moreinfo')[0]);
            showingNEntries++;
        }
        document.getElementsByClassName('status')[0].textContent = "Showing " + showingNEntries + " results out of " + projects.length + ".";
    }
}

function renderProject(title, description, technologies, status, moreinfo) {
    let tr = document.createElement("tr");
    let td = document.createElement("td");
    let projData = document.createTextNode(title);
    td.appendChild(projData);
    tr.appendChild(td);

    td = document.createElement("td");
    projData = document.createTextNode(description);
    td.appendChild(projData);
    tr.appendChild(td);

    td = document.createElement("td");
    let rawTechnologies = "";
    for(var i = 0; i < technologies.children.length; i++) {
        rawTechnologies += technologies.children[i].childNodes[0].nodeValue + ", ";
    }
    rawTechnologies = rawTechnologies.substring(0, rawTechnologies.length - 2);
    projData = document.createTextNode(rawTechnologies);
    td.appendChild(projData);
    tr.appendChild(td);

    td = document.createElement("td");
    projData = document.createTextNode(status);
    td.appendChild(projData);
    tr.appendChild(td);

    td = document.createElement("td");
    a = document.createElement('a');
    a.setAttribute("class", "highlight_blue_background");
    a.setAttribute("href", moreinfo.childNodes[0].nodeValue);
    a.setAttribute("target", "_blank");
    a.setAttribute("rel", "noopener noreferrer");
    projData = document.createTextNode(moreinfo.getAttribute('pagetitle'));
    a.appendChild(projData);
    td.appendChild(a);
    tr.appendChild(td);

    document.getElementsByTagName('tr')[document.getElementsByTagName('tr').length - 1].after(tr);

}

function readXMLFile(xmlfile) {
    var xmlDoc;

    if(typeof window.DOMParser != "undefined") {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", xmlfile, false);
        if(xmlhttp.overrideMimeType)
            xmlhttp.overrideMimeType('text/xml');
        xmlhttp.send();
        xmlDoc = xmlhttp.responseXML;
    } else {
        xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
        xmlDoc.async = "false";
        xmlDoc.load(xmlfile);
    }

    return xmlDoc;
}

function nextPage() {
    if(projects.length >= ((page) * 4) + 1) {
        page += 1;
        renderProjects();
        document.getElementById('table_page').value = page;
    }
}

function lastPage() {
    page = Math.ceil(projects.length / 4);
    renderProjects();
    document.getElementById('table_page').value = page;
}

function previousPage() {
    if(page <= 1) return;

    page--;
    renderProjects();
    document.getElementById('table_page').value = page;
}

function firstPage() {
    if(page <= 1) return;

    page = 1;
    renderProjects();
    document.getElementById('table_page').value = page;
}