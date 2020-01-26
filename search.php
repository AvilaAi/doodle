<?php
include("config.php");
include("classes/SiteResultsProvider.php");
include("classes/ImageResultsProvider.php");


if (isset($_GET["term"])) {
    $term = $_GET["term"];
} else {
    exit("You must enter a term");
}

$type = isset($_GET["type"]) ? $_GET["type"] : "sites";
$page = isset($_GET["page"]) ? $_GET["page"] : 1;


?>

<!DOCTYPE html>
<html>

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Welcome to doodle</title>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
 <link rel="stylesheet" type="text/css" href="assets/css/style.css">
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<body>
 <div class="wrapper">

  <div class="header">

   <div class="headerContent">
    <div class="logoContainer">
     <a href="index.php">

      <img src="./assets/images/doodleLogo.png" alt="logoDoodle">
     </a>
    </div>

    <div class="searchContainer">
     <form action="search.php" method="GET">
      <div class="searchBarContainer">
       <input type="hidden" name="type" value=<?php echo $type; ?> />
       <input type="text" class="searchBox" name="term" value=<?php echo $term; ?> />
       <button class="searchButton">
        <img alt="svgImg"
         src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4Igp3aWR0aD0iMjQiIGhlaWdodD0iMjQiCnZpZXdCb3g9IjAgMCAxNzIgMTcyIgpzdHlsZT0iIGZpbGw6IzAwMDAwMDsiPjxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0ibm9uemVybyIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIHN0cm9rZS1saW5lY2FwPSJidXR0IiBzdHJva2UtbGluZWpvaW49Im1pdGVyIiBzdHJva2UtbWl0ZXJsaW1pdD0iMTAiIHN0cm9rZS1kYXNoYXJyYXk9IiIgc3Ryb2tlLWRhc2hvZmZzZXQ9IjAiIGZvbnQtZmFtaWx5PSJub25lIiBmb250LXdlaWdodD0ibm9uZSIgZm9udC1zaXplPSJub25lIiB0ZXh0LWFuY2hvcj0ibm9uZSIgc3R5bGU9Im1peC1ibGVuZC1tb2RlOiBub3JtYWwiPjxwYXRoIGQ9Ik0wLDE3MnYtMTcyaDE3MnYxNzJ6IiBmaWxsPSJub25lIj48L3BhdGg+PGcgZmlsbD0iIzM0OThkYiI+PHBhdGggZD0iTTk1LjA0MjMyLDEwNi41NDgxOGwxNy43NzY2OSwxNy43NzY2OWMtMi43MTU1LDUuMTc5MDQgLTIuOTk1NDQsMTAuMzMwMDggLTAuMTM5OTgsMTMuMTg1NTVsMzIuNDQ1OTcsMzIuNDQ1OTdjNC4wODcyNCw0LjA4NzI0IDEyLjk4OTU4LDEuODQ3NjUgMTkuODIwMzEsLTUuMDExMDdjNi44NTg3MiwtNi44NTg3MiA5LjA5ODMxLC0xNS43MzMwNyA1LjAxMTA3LC0xOS44MjAzMWwtMzIuNDE3OTcsLTMyLjQ0NTk3Yy0yLjg4MzQ2LC0yLjg1NTQ3IC04LjAzNDUsLTIuNTc1NTIgLTEzLjIxMzU0LDAuMTExOThsLTE3Ljc3NjY5LC0xNy43NDg2OXpNNjAuOTE2NjcsMGMtMzMuNjQ5NzQsMCAtNjAuOTE2NjcsMjcuMjY2OTMgLTYwLjkxNjY3LDYwLjkxNjY3YzAsMzMuNjQ5NzQgMjcuMjY2OTMsNjAuOTE2NjcgNjAuOTE2NjcsNjAuOTE2NjdjMzMuNjQ5NzQsMCA2MC45MTY2NywtMjcuMjY2OTIgNjAuOTE2NjcsLTYwLjkxNjY3YzAsLTMzLjY0OTc0IC0yNy4yNjY5MiwtNjAuOTE2NjcgLTYwLjkxNjY3LC02MC45MTY2N3pNNjAuOTE2NjcsMTA3LjVjLTI1LjcyNzIyLDAgLTQ2LjU4MzMzLC0yMC44NTYxMiAtNDYuNTgzMzMsLTQ2LjU4MzMzYzAsLTI1LjcyNzIyIDIwLjg1NjEyLC00Ni41ODMzMyA0Ni41ODMzMywtNDYuNTgzMzNjMjUuNzI3MjIsMCA0Ni41ODMzMywyMC44NTYxMiA0Ni41ODMzMyw0Ni41ODMzM2MwLDI1LjcyNzIyIC0yMC44NTYxMiw0Ni41ODMzMyAtNDYuNTgzMzMsNDYuNTgzMzN6Ij48L3BhdGg+PC9nPjwvZz48L3N2Zz4=">
       </button>
      </div>
     </form>
    </div>

   </div>

   <div class="tabsContainer">
    <ul class="tabList">

     <li class="<?php echo $type == 'sites' ? 'active' : '' ?>">
      <a href="<?php echo "search.php?term=$term&type=sites"; ?>">Sites</a>
     </li>
     <li class="<?php echo $type == 'images' ? 'active' : '' ?>">
      <a href="<?php echo "search.php?term=$term&type=images"; ?>">Images</a>
     </li>

    </ul>
   </div>
  </div>

  <div class="mainResultsSection">
   <?php
            if ($type == "sites") {

                $resultsProvider = new SiteResultsProvider($con);
                $pageSize = 20;
            } else {
                $resultsProvider = new ImageResultsProvider($con);
                $pageSize = 30;
            }
            $numResults = $resultsProvider->getNumResults($term);
            echo "<p class='resultsCount'>$numResults results found</p>";
            echo $resultsProvider->getResultsHtml($page, $pageSize, $term);
            ?>
  </div>

  <div class="paginationContainer">

   <div class="pageButtons">

    <div class="pageNumberContainer">
     <img src="assets/images/pageStart.png" alt="D">
    </div>

    <?php

                $numPages = ceil($numResults / $pageSize);
                $pagesToShow = 10;
                $pagesLeft = min($pagesToShow, $numPages);
                $currentPage = $page - floor($pagesToShow / 2);
                if ($currentPage < 1) {
                    $currentPage = 1;
                }
                if ($numResults == 0) {
                    echo  "<div class='pageNumberContainer'>
                <img src='assets/images/pageSelected.png'/>
                </div>
                <div class='pageNumberContainer'>
                <img src='assets/images/page.png'/>
                </div>
                ";
                }
                if ($currentPage + $pagesLeft > $numPages + 1) {
                    $currentPage = $numPages + 1 - $pagesLeft;
                }
                while ($pagesLeft != 0 && $currentPage <= $numPages) {

                    if ($currentPage == $page) {
                        echo "<div class='pageNumberContainer'>
                        <img src='assets/images/pageSelected.png'/>
                        <span class='pageNumber'>$currentPage</span>
                        </div>";
                    } else {
                        echo "<div class='pageNumberContainer'>
                        <a href='search.php?term=$term&type=$type&page=$currentPage'>
                        <img src='assets/images/page.png'/>
                        <span class='pageNumber'>$currentPage</span>
                        </a>
                        </div>";
                    }

                    $currentPage++;
                    $pagesLeft--;
                }
                ?>

    <div class="pageNumberContainer">
     <img src="assets/images/pageEnd.png" alt="dle">
    </div>

   </div>

  </div>
 </div>
 <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
 <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
 <script type="text/javascript" src="assets/js/script.js"></script>
</body>

</html>