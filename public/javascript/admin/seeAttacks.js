var itemsPerPage = 5;
var myData = [];
var page = 1;

const loadAttacks = async () => {
    try {   
        var query = 
            `query {
                attacks {
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
                    target1
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
        .then (data => myData = data.data.attacks)
        // .then(console.log)
        display();

    } catch(err) {
        console.log(err);
    }
}
loadAttacks();

function display() {
    var dataToDisplay = "";
    for(var i = itemsPerPage * (page - 1); i <= itemsPerPage * page; i++) {
        var id = myData[i].id;
        var year = myData[i].iyear;
        var month = myData[i].imonth;
        var day = myData[i].iday;
        var country = myData[i].country_txt;
        var region = myData[i].region_txt;
        var provstate = myData[i].provstate;
        var city = myData[i].city;
        var latitude = myData[i].latitude;
        var longitude = myData[i].longitude;
        var sumamry = myData[i].sumamry;
        var attacktype = myData[i].attacktype1_txt;
        var targtype = myData[i].targtype1_txt;
        var target = myData[i].target1;
        var weaptype = myData[i].weaptype1_txt;
        
        dataToDisplay = dataToDisplay + `
            <table border="1px" id="detailTable">
                <tr>
                    <th>Id</th>
                    <th>Date</th>
                    <th>Country</th>
                    <th>Region</th>
                </tr>

                <tr>
                    <td>${id}</td>
                    <td>${year}/${month}/${day}</td>
                    <td>${country}</td>
                    <td>${region}</td>
                </tr>

                <tr>
                    <th>Provstate</th>
                    <th>City</th>
                    <th>Coords</th>
                    <th>Summary</th>
                </tr>

                <tr>
                    <td>${provstate}</td>
                    <td>${city}</td>
                    <td>${latitude}/${longitude}</td>
                    <td>${sumamry}</td>
                </tr>

                <tr>
                    <th>Attack type</th>
                    <th>Targ type</th>
                    <th>Target</th>
                    <th>Weapon type</th>
                </tr>

                <tr>
                    <td>${attacktype}</td>
                    <td>${targtype}</td>
                    <td>${target}</td>
                    <td>${weaptype}</td>
                </tr>
            </table>
        `;
    }
    document.getElementById("data").innerHTML = dataToDisplay;
}

window.onload = function() {
    
    var btnPrev = document.getElementById("btnPrev");
    var btnNext = document.getElementById("btnNext");

    btnNext.addEventListener("click", (e) => { 
        if(itemsPerPage * (page - 1) < myData.length - 1) {
            page++;
            display();
            scroll(0, 0);
        }
    });

    btnPrev.addEventListener("click", (e) => {
        if (page > 1) {
            page--;
            display();
            scroll(0, 0);
        }
    });
}