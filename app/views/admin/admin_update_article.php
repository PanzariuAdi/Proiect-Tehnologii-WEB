<?php include '../php_scripts/login_redirect.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL_ROOT ?>/css/admin_style.css">
    <title>Document</title>
</head>

<script>
    loadArticle = async (id) => {
        try {
        var res = [];
        var query = `
            query {
                articleById (id: ${id})
            }
        `;

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

        var myPromise = loadArticle().then(function(result) {
            var jsondata;
            var data = JSON.stringify(result);

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "http://localhost/proiect-mvc/admin/articles_redirect", !0);
            xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            xhr.send(data);
        
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    jsondata = JSON.parse(xhr.responseText);
                    console.log(jsondata);
                }
        }
        })

    }
</script>

<body>
    <div class="mainframe">
        <div class="header">
        <img src="<?php echo URL_ROOT; ?>/images/admin.png" width="100px" height="100px">
            <input class="right headerInput" type="submit" value="submit">
            <input class="right headerInput" type="search" name="mainsearch" id="mainsearch" placeholder="Search faster">
        </div>

        <?php include APP_ROOT . '/views/inc/admin_navbar.php' ?>
        <?php include APP_ROOT . '/views/inc/admin_sidebar.php' ?>

        <div class="main">
            <!-- This is for adding a row to DB -->
            <div class="adder"> 
                <form action="<?php echo URL_ROOT; ?>/admin/update_article" method="POST">
                    <label for="id">Choose article by ID: </label><input type="number" name="article_id" id="article_id"><br><br>
                    <label for="title">Title: </label> <input type="text" name="article_title" id="article_title"><br><br>
                    <label for="description">Description: </label> <textarea name="article_description" id="article_description" cols="30" rows="10"></textarea><br><br>
                    <input type="submit" value="Update article">
                </form>
            </div>
        </div>
    </div>
</body> 
</html> 