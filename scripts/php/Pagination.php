<?

function setPagination($items, $current_page = 1, $link)
{
    $pages = ($items / 21) + 1;
    $previous = $current_page - 1;
    $next = $current_page + 1;
    echo "<div style='text-align: center'>";
    echo "<div class='pagination'>";

    if ($previous !== 0) {
        echo "<a href='$link&page=$previous'>&laquo;</a>";
    }

    for ($i = 1; $i < $pages; ++$i) {
        createPaginationItem($i, $current_page, $link);
    }

    if ($next < $pages) {
        echo "<a href='$link&page=$next'>&raquo;</a>";
    }
    echo "</div>";
    echo "</div>";

}


function createPaginationItem($page, $current_page, $link)
{
    if ($page == $current_page) {
        echo "<a class='active' href='$link&page=$page'>$page</a>";
    } else {
        echo "<a href='$link&page=$page'>$page</a>";
    }
}

?>