<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/style-raport.css">
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/raport.css">
</head>
<header>
    <?php include APP_ROOT . '/views/inc/navbar.php'; ?>
</header>  

<body>
    <div class="container-content">
    <h1><a id="table-of-contents" ></a>Table of Contents</h1>
<ul>
<li><a href="#revision-history">Revision History</a></li>
<li><a href="#1-introduction">Introduction</a>
<ul>
<li>1.1 <a href="#11-purpose">Purpose</a></li>
<li>1.2 <a href="#12-document-conventions">Document Conventions</a></li>
<li>1.3 <a href="#13-intended-audience-and-reading-suggestions">Intended Audience and Reading Suggestions</a></li>
<li>1.4 <a href="#14-product-scope">Product Scope</a></li>
<li>1.5 <a href="#15-references">References</a></li>
</ul>
</li>
<li><a href="#overall-description">Overall Description</a>
<ul>
<li>2.1 <a href="#21-product-perspective">Product Perspective</a></li>
<li>2.2 <a href="#22-product-functions">Product Functions</a></li>
<li>2.3 <a href="#23-user-classes-and-characteristics">User Classes and Characteristics</a></li>
<li>2.4 <a href="#24-operating-environment">Operating Environment</a></li>
<li>2.5 <a href="#25-design-and-implementation-constraints">Design and Implementation Constraints</a></li>
<li>2.6 <a href="#26-user-documentation">User Documentation</a></li>
<li>2.7 <a href="#27-assumptions-and-dependencies">Assumptions and Dependencies</a></li>
</ul>
</li>
<li><a href="#external-interface-requirements">External Interface Requirements</a>
<ul>
<li>3.1 <a href="#31-user-interfaces">User Interfaces</a></li>
<li>3.2 <a href="#32-hardware-interfaces">Hardware Interfaces</a></li>
<li>3.3 <a href="#33-software-interfaces">Software Interfaces</a></li>
<li>3.4 <a href="#34-communications-interfaces">Communications Interfaces</a></li>
</ul>
</li>
<li><a href="#system-features">System Features</a>
<ul>
<li>4.1 <a href="#41-Search-bar">Search-bar</a></li>
<li>4.2 <a href="#42-Admin-page">Admin-page</a></li>
<li>4.3 <a href="#43-Statistics">Statistics</a></li>
<li>4.4 <a href="#44-Interactive-Maps">Interactive-Maps</a></li>
<li>4.5 <a href="#45-HomePage">HomePage</a></li>
</ul>
</li>
<li><a href="#other-nonfunctional-requirements">Other Nonfunctional Requirements</a>
<ul>
<li>5.1 <a href="#51-performance-requirements">Performance Requirements</a></li>
<li>5.2 <a href="#52-safety-requirements">Safety Requirements</a></li>
<li>5.3 <a href="#53-security-requirements">Security Requirements</a></li>
<li>5.4 <a href="#54-software-quality-attributes">Software Quality Attributes</a></li>
</ul>
</li>
<li><a href="#credits">Credits</a></li>
</ul>
<h2><a id="revision-history" ></a>Revision History</h2>

<h2><a id="1-introduction" > </a>1. Introduction</h2>
<h3><a id="11-purpose" ></a>1.1 Purpose</h3>
<p>The purpose of the website is to offer information about terrorism attacks around the world. This version implements the interface,
advanced statistics customizable by how many filter does the user wants, maps that show on a world map the density of terrorism attack and an advanced search,
starting with a list of all events, and then the user can choose to see details about an event by clicking on "more".</p>

<h3><a id="12-document-conventions" ></a>1.2 Document Conventions</h3>
<p>For this project, all the pages use the same style and all the pages contain the same navigation bar located  at the top of the screen</p>
<h3><a id="13-intended-audience-and-reading-suggestions" ></a>1.3 Intended Audience and Reading Suggestions</h3>
<p>This application is intended for all types of users. An user should start reading the home page, then he can move on to statistics,maps and specific attacks. Furthermore, if an user is interested he can create an account which can be managed in the admin section.</p>
<h3><a id="14-product-scope" ></a>1.4 Product Scope</h3>
<!-- <p>Firstly, the home page contains articles which contain recent news about the terrorist attacks. Those evens can be published by the website administrators.</p>
<p>Secondly, the admin page gives acces to administrators to manage their accounts without using code. They will be able to view and change data about the website.</p> -->
<p>This software is a tool intended for worldwide terrorist data visualization. The main objective of this app is to make people aware of the worlwide terrorism. Our goal is to deliver a good quality data representations and statistics regarding the terrorist events.</p>
<h3><a id="15-references" ></a>1.5 References</h3>
<p>The library for representing charts is <a href="https://www.chartjs.org/" target = "_blank"> Chart.js</a>.</p>
<p>Map visualization <a href="https://plotly.com/javascript/" target = "_blank"> Plotly</a>.</p>
<p>Weapon details <a href="https://en.wikipedia.org/wiki/" target = "_blank"> wikipedia</a>.</p>
<p>The server uses <a href = "https://graphql.org/" target = "_blank">graphql</a>, <a href="https://www.apollographql.com/docs/apollo-server/" target = "_blank">Apollo</a> and <a href="https://www.apollographql.com/docs/federation/" target = "_blank">Apollo Federation</a></p>
<p>Svg export <a href="https://github.com/gliffy/canvas2svg" target = "_blank"> canvas2svg</a>.</p>
<h2><a id="overall-description" ></a>Overall Description</h2>
<h3><a id="21-product-perspective" ></a>2.1 Product Perspective</h3>
<p>The website is a new, self-contained product.</p>
<div class="centered">
    <img src="<?php echo URL_ROOT; ?>/images/c1.png" width="1000" height="auto">
</div>

<div class="centered">
    <img src="<?php echo URL_ROOT; ?>/images/C2.png" width="1000" height="auto">
</div>
<div class="centered">
    <img src="<?php echo URL_ROOT; ?>/images/c3-part1.png" width="1000" height="auto">
</div>
<div class="centered">
    <img src="<?php echo URL_ROOT; ?>/images/c3-part2.png" width="1000" height="auto">
</div>

<h3><a id="22-product-functions" ></a>2.2 Product Functions</h3>
<p>
    <ul >
        <li>Advanced Search: browse and view data about a specific attack</li>
        <li>Statistics: view, create and export customizable charts</li>
        <li>Maps: a map containing all the terrorist attacks recorded in the database</li>
        <li>Admin: Add, update and delete data from database</li>
        <li>User: manage user data</li>
    </ul>
</p>
<h3><a id="23-user-classes-and-characteristics" ></a>2.3 User Classes and Characteristics</h3>
<p>We will have 2 main type of user classes:</p>
<ul>
    <li>Regular users will be able to view data, articles, maps and statistics and export charts(.CSV,.WebP,.SVG formats).</li>
    <li>Administrator will be able to view data, delete, modify and add new data in the database. Data consists in articles and terrorist attacks.</li>
</ul>
<h3><a id="24-operating-environment" ></a>2.4 Operating Environment</h3>
<p>The app will run on any desktop, laptop, tablet and smartphone on any OS that supports a browser.</p>
<h3><a id="25-design-and-implementation-constraints" ></a>2.5 Design and Implementation Constraints</h3>
<p>In the developement of the application we will not use frameworks and will only use open source libraries.</p>
<p>Due the database dimensions, we couldn't host it on any website. This resulted in locally hosting the database and the project overall.</p>
<p>Filter data(e.g. all the cities in the database) are brought to the front-end and stored in the session, and then reused, to avoid waiting for long periods of time when browsing the website. This might result in heavt memory usage</p>
<h3><a id="26-user-documentation" ></a>2.6 User Documentation</h3>
<h4>Admin module</h4>
<p>An administrator can login if he has an account, or register. In both cases, if he will write wrong the username or the password, or at register,
the password don't match, ther server will semnalate the problem and show him what the problem exactly is.
After the administrator is logged in, he can add, update and delete events and articles. <br>
For adding an event or article, the administrator needs to go in the left half of page and select "Add event" or "Add article". For adding a new event, the user can 
write an id. In this database, the eventid, which is not unique, is constructed of year, month, day and numbers choosen by the author of the post. All the inputs that are left empty by the user will be added in
database as a "" for String columns and 0 for numeric. The first input, which is the eventid, can be choose<br>
For updating an event or an article, administrator must know it's ID, which can be find by going on "See events" or "See all articles". All the empty inputs will pe updated
in the database with "" for String columns and 0 for numeric columns.
For deleting an event or an article, the administrator needs only the id, which can be find by going on "See events" or "See all articles".
</p>
<div class="centered">
<img src="<?php echo URL_ROOT; ?>/images/adminpage.png" alt="Admin page" width="1000" height="auto">
</div>

<h4>Statistics</h4>
<p>The user can create different statistics by using the settings tab which can be triggered on and off using the settings button. In the settings tab, the user will be able to choose the data used for the chart by  using the filters and then create the chart by pressing the submit button.</p>
<p>The user can select the type of chart he wants to create and the axis of the chart(e.g. xaxis:cities, yaxis:no. of attacks). Furthermore, he will be able to filter the content: selectable content(the user is able to select which values are used for the statistics, e.g. only the cities:Romania and Bulgaria), bounded countent(select an interval for the values, e.g. use only attacks that had atleast 100  wounded and at most 150 wounded), and boolean content(use the attacks that verify a criterion, e.g. only the successful attacks).The user can also select how much data to be desplayed(for example first 10 statistics or only last 15).</p>
<p>Lastly, the charts can be exported by pressing the export button located at the botton of the settings tab.</p>
<h4>Advanced Search</h4>
<p>The advanced search behaves similarily with the statistics, meaning: it also contains filters(for selectable content and boolean content), however once the user hits
 the submit button, the page will print a set of attacks from which the user can click on the more button to learn more. In the more page, the user will be able to also
  view data about the weapons used in the attack and many other things. If there is specified weapon, the user can see details about it by clicking on the weapon text.</p>

<h4>Maps</h4>
<p>There is only one map which displays all the attacks and where they took place. There is no user interaction.</p>
<h3><a id="27-assumptions-and-dependencies" ></a>2.7 Assumptions and Dependencies</h3>
<p>Due to the large ammount of data, we had to host the app locally, therefore, the app can only be used locally.</p>
<h2><a id="external-interface-requirements">External Interface Requirements</a></h2>
<h3><a id="31-user-interfaces" ></a>3.1 User Interfaces</h3>
<p>Navigation bar located on every page which will contain buttons with links to the other functionalities: statistics, advanced search, maps, admin and the report.</p>
<p>Using the search-bar tool located in the navigation bar, the user will be able to search for a specific attacks using different filters. </p>
<p>Statstics settings button where the user will be able to select different characteristics of the chart or the type of the chart.</p>
<p>Search input in the admin page will allow searching for settings faster. For example, if the user wants to add an event to the database, he can go to the "Add event" link on the left side of the mainframe, or to type "add event" in the search input.</p>
<h3><a id="32-hardware-interfaces" ></a>3.2 Hardware Interfaces</h3>
<p> The app is responsive and can be accesed and operated from PC, laptop, smartphone and tablet.</p>
<h3><a id="33-software-interfaces" ></a>3.3 Software Interfaces</h3>
<ul>
    <li>MySql(phpMyAdmin) - the database used to store all terrorism attacks. (~183.000 attacks);</li>
    <li>GraphQl - web service for adding, updating and deleting information from the database;</li>
    <li>Apollo - setting up a server to listen for queries;</li>
    <li>Apollo Federation - oragnizing all the apollo servers into microservices that will be called at the same port;</li>
    <li>Chart.js - creating and updating interactive graphs for the statistics;</li>
    <li>Plotly - creating interactive maps;</li>
    <li>canvas2svg- creating a svg representation of a chart.js chart.</li>
</ul>
<h3><a id="34-communications-interfaces" ></a>3.4 Communications Interfaces</h3>
<p>Being a web application we use http for data visualization and FTP for file transfer. We created a web service for comunicating with 
terrorism database.</p>
<p>FILTER_SANITIZE_STRING - Strip tags, strip or encode special characters before process them to database in the User controller. <br>
SQL INJECTION - Use SQL Parameters for protection on the User controller <br>
</p>

<h2><a id="system-features" ></a>System Features</h2>
<h3><a id="41-Search-bar" ></a>4.1 Advanced Search</h3>
<p>
    4.1.1 Located in the navbar, the user will be able to list all the attacks according to some criteria.<br>
    Those criteria include:<br>
    <ul>
        <li>selectable content: the user will be able to select and search for the fields he wishes to use(country, region, city, motive, state, gang, attack type, target natality, weapon type, weapon subtype, loss extent, year and month)</li>
        <li>boolean content: the user will be able to select if he only wants the attacks which ended with a suicide, ended with success or failed, extended for more than 24 hours or if the attackers asked for ransom. </li>
    </ul>

</p>
<h3><a id="42-Admin-page" ></a>4.2 Admin-page</h3>
<ul>
<li> 4.2.1 Accesible only after an user logges in, it allows a person that does not know SQL to INSERT, UPDATE and DELETE events and articles in the database by typing
data they want to add/update/delete and press a button to perform operation.

</li>
<li>
    4.2.2 It allows user to see his credentials.
</li>
</ul>

<h3><a id="43-Statistics" ></a>4.3 Statistics</h3>
<p>
    4.3.1 Statistics visualization using interactive and customizable charts.<br>
    4.3.2 Each user will be able to change the used data for charts according to some fixed criteria:<br>
    Those criteria include:<br>
    <ul>
        <li>Chart type - the type of chart that will be rendered: doughnut, radar, pie, bar, line;</li>
        <li>Xaxis - the field in the database which will be slected as the x axis for the chart: country, region, city, motive, state, gang, attack type, target natality, weapon type, weapon subtype, loss extent, year and month; </li>
        <li>Yaxis - the function used for calculating the y values for each input in the x axis for the chart: no. of attacks, no. of casualities, no. of wounded, total loss value, total ransom ammount and no. of terrorists ;</li>
        <li>Selectable content: the user will be able to select and search for the fields he wishes to use(country, region, city, motive, state, gang, attack type, target natality, weapon type, weapon subtype, loss extent, year and month);</li>
        <li>Boolean content: the user will be able to select if he only wants the attacks which ended with a suicide, ended with success or failed, extended for more than 24 hours or if the attackers asked for ransom;</li>
        <li>Bounded content: the user will be able to select the bounds for the y value for each function defined for yaxis.</li>
    </ul>
        
    4.3.3 The charts will be exportable in different formats:<br>
    <ul>
        <li>SVG - by using the canvas2svg and the chart.js 2dcontext, a svg file will be created</li>
        <li>WebP - by using the blob function</li>
        <li>CSV - by simply writing all the x keys and y values computed for the chart in a file</li>
    </ul>
</p>
<h3><a id="44-Interactive-Maps" ></a>4.4 Interactive-Maps</h3>
<p>
    4.4.1 The map is interactive, the user will be able to view the coordinates(longitude and latitude), city and country of the attack .<br>
</p> 
<h3><a id="45-HomePage" ></a>4.5 HomePage</h3>
    <p>4.5.1 In the homepage will be shown the most recent articles.</p>
    <p>4.5.2 Each article will have a link to a web with more details about the event.</p>
<h2><a id="other-nonfunctional-requirements" ></a>Other Nonfunctional Requirements</h2>
<h3><a id="51-performance-requirements" ></a>5.1 Performance Requirements</h3>
<p>The only requirement would be having enough memory to store all the data for the filters in the session once they have been brought to the front-end.</p>
<h3><a id="52-safety-requirements" ></a>5.2 Safety Requirements</h3>
<p>The administrators shouldn't share their accounts. </p>
<h3><a id="53-security-requirements" ></a>5.3 Security Requirements</h3>
<p>Only administrators that are logged in can add, update or delete in the database. They shouldn't share their username and password, since 
there is no backup system in this version.</p>
<h3><a id="54-software-quality-attributes" ></svg></a>5.4 Software Quality Attributes</h3>
<ul>
    <li>Availability - available on any device</li>
    <li>Flexibility - data can be selected in many different ways(using the filters)</li>
    <li>Performance - Not great in this version, since we brought all data in frontend and work with it. The data transfer time is really high since we work with large ammounts of data.</li>
    <li>Testability - GraphQL server can be tested without interface with predefined criteria</li>
    <li>Security - SQL Injection protection, Sanitize strings</li>
    <li>Reusability - the GraphQL server may be reused for different user interfaces</li>
    <li>Corectness - validated pages using different tools such as lighthouse or w3c markup validator</li>
</ul>

<h2><a id="credits" ></a>Credits</h2>
<ul>
    <li>Ghiuzan Emanuel-Gabriel:
        <ul>
            <li>Statistics</li>
            <li>Maps</li>
            <li>Advanced search</li>
            <li>GraphQl server - advanced search, statistics</li>
        </ul>
    </li>
    <li>Panzariu Ionut-Adrian
        <ul>
            <li>Admin module</li>
            <li>AttackPageTemplate</li>
            <li>MVC</li>
            <li>GraphQl server - admin</li>
        </ul>
    </li>

    <li>
        Cirjanu Andrei
        <ul>
            <li>Homepage - frontend</li>
            <li>Details - frontend</li>
        </ul>
    </li>
</ul>
</div>
</body>
</html>