function showDiv(id, element) {
    document.getElementById(id).style.display = element.value == 1 ? 'none' : 'block';
    document.getElementById('hiddenDiv2').style.display = element.value == 2 ? 'none' : 'block';
}

function showEvent(str) {
    var xhttp;  
    if (str == "") {
      document.getElementById("txtHint").innerHTML = "";
      return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "http://localhost/rest/events/list/" + str, true);
    xhttp.send();
      // 197000000002
}