<?
if (isset($_GET['searching']) and $_GET['searching'] === "") {
    echo "<script>location.href = \"/search?searching=everything\"</script>";
}
?>
