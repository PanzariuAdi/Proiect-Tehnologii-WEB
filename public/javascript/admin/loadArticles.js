loadArticles = async () => {
    try {   
        var res = [];
        var query = 
            `query {
                articles {
                    article_id
                    title
                    description
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
          .then (data => res = data.data.articles)
          
          return res;
    } catch(err) {
        console.log(err);
    }
}

var myPromise = loadArticles().then(function(result) {
    window.location = "http://localhost/proiect-mvc/admin/admin_see_articles.php?data=" + result;
})
loadArticles = async () => {
    try {   
        var res = [];
        var query = 
            `query {
                articles {
                    article_id
                    title
                    description
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
          .then (data => res = data.data.articles)
          
          return res;
    } catch(err) {
        console.log(err);
    }
}

var myPromise = loadArticles().then(function(result) {
    window.location = "http://localhost/proiect-mvc/admin/admin_see_articles.php?data=" + result;
})
