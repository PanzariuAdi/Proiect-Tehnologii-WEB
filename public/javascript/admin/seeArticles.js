var itemsPerPage = 5;

loadAttacks = async (inf, ext) => {
    try {   
        var res = [];
        var query = 
            `query {
                attacks (inf: ${inf}, ext: ${ext}){
                    id
                    iyear
                    imonth
                    iday
                    country_txt
                    region_txt
                    provstate
                    city
                    latitude
                    longitude
                    summary
                    attacktype1_txt
                    targtype1_txt
                    target
                    weaptype1_txt
                }
            }`;

        await fetch('http://localhost:4000/', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({query})
        }).then (r => r.json())
        .then (data => res = data.data.attacks)
        
        return res;
    } catch(err) {
        console.log(err);
    }
}

loadAttack = async (id) => {
    try {   
        var res = [];
        var query = 
            `query {
                attackById (id: ${id}){
                    id
                    iyear
                    imonth
                    iday
                    country_txt
                    region_txt
                    provstate
                    city
                    latitude
                    longitude
                    summary
                    attacktype1_txt
                    targtype1_txt
                    target
                    weaptype1_txt
                }
            }`;

        await fetch('http://localhost:4000/', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({query})
        }).then (r => r.json())
        .then (data => res = data.data.attacks)
        
        return res;
    } catch(err) {
        console.log(err);
    }
}


function goLeft(page) {
    var leftLimit = (itemsPerPage * page) + 1
    var numberAttacks = 5;
    showAttacks(leftLimit, numberAttacks);
}

function goRight(page) {
    var leftLimit = (itemsPerPage * page) + 1
    var numberAttacks = 5;
    showAttacks(leftLimit, numberAttacks);
}


function showAttacks(p1, p2) {

    var myPromise = loadAttacks(p1, p2).then(function(result) {
        var jsondata;
        var data = JSON.stringify(result);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "http://localhost/proiect-mvc/admin/attacks_redirect", !0);
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.send(data);
        
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                jsondata = JSON.parse(xhr.responseText);
                // console.log(jsondata);
            }
        }
    })
}

function showAttack(id) {
    alert("IOANE IOANE");
    var myPromise = loadAttacks(id).then(function (result) {
        var jsondata;
        var data = JSON.stringify(result);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "http://localhost/proiect-mvc/admin/attacks_redirect", !0);
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.send(data);
        
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                jsondata = JSON.parse(xhr.responseText);
                // console.log(jsondata);
            }
        }
    })
}
