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
        var jsondata;
        var data = JSON.stringify(result);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "http://localhost/proiect-mvc/admin/articles_redirect", !0);
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.send(data);
        
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                jsondata = JSON.parse(xhr.responseText);
                // console.log(jsondata);
            }
        }
    })
</script>

<body>
    <div class="mainframe">
        <div class="header">
        <img src="<?php echo URL_ROOT; ?>/images/admin.png" width="100" height="100">
            <input class="right headerInput" type="submit" value="submit">
            <input class="right headerInput" type="search" name="mainsearch" id="mainsearch" placeholder="Search faster">
        </div>

        <?php include APP_ROOT . '/views/inc/admin_navbar.php' ?>
        <?php include APP_ROOT . '/views/inc/admin_sidebar.php' ?>

        <?php
            session_start();
        ?>

        <div class="main">
            <div class="adder">

                <?php if(isset($_SESSION['articles'])) {
                    $articles = $_SESSION['articles'];
                } ?>

                <table class="tablemain full" id="articleTable">
                    <?php foreach($articles as $article) : ?>
                    <tr>
                        <th>ID</th>
                        <td><?php echo $article['article_id']; ?></td>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <td><?php echo $article['title']; ?></td>
                    </tr>

                    <tr>
                        <th>Description</th>
                        <td><?php echo $article['description']; ?></td>
                    </tr>

                    <tr><th><th></th></th></tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>

    </div>
</body> 
</html>