<?php

require("models/ShortViewInfo.php");
require("models/ItemFullInfo.php");

class Database
{
    public $connection;


    function __construct()
    {
        $host = 'localhost'; // адрес сервера
        $database = 'archery_shop'; // имя базы данных
        $user = 'root'; // имя пользователя
        $password = 'root'; // пароль

        $connection = mysqli_connect($host, $user, $password, $database) or die(mysqli_error($connection));

        $this->connection = $connection;
    }


    public function getCategories()
    {
        $query = "select distinct type.category_name, type.category from type";

        $result = mysqli_query($this->connection, $query) or die(mysqli_error($this->connection));
        $categories = [];
        if ($result) {
            for ($i = 0; $i < mysqli_num_rows($result); ++$i) {
                $row = mysqli_fetch_row($result);
                $categories[$row[0]] = $row[1];
            }
        }

        return $categories;
    }


    public function getTypes($category)
    {
        $query = "select distinct type.type_name, type.type from type where type.category_code = (select distinct type.category_code from type where type.category = '$category')";

        $result = mysqli_query($this->connection, $query) or die(mysqli_error($this->connection));
        $types = array();
        if ($result) {
            for ($i = 0; $i < mysqli_num_rows($result); ++$i) {
                $row = mysqli_fetch_row($result);
                $types[$row[0]] = $row[1];
            }
        }
        return $types;
    }


    public function getShortListViewBySearch($searching, $page = 1)
    {

        $query = "select goods.id_good, goods.name, goods.price, goods.image 
        from goods 
        where goods.name like '%$searching%' 
        or goods.code_manufacturer like (select manufacturer.code_manufacturer from manufacturer where manufacturer.manufacturer like '%$searching%') 
        or goods.price like '$searching'
        or goods.code_type in (select distinct type.type_code from type where type.type like '$searching%')";

        return $this->executeQuery($query, $page);
    }


    public function getManufacturer($code_manufacturer)
    {
        $query = "select manufacturer.manufacturer
        from manufacturer
        where manufacturer.code_manufacturer = '$code_manufacturer'";

        $result = mysqli_query($this->connection, $query) or die(mysqli_error($this->connection));

        if ($result) {
            $row = mysqli_fetch_row($result);
            return $row[0];
        }
    }


    public function getShortListViewByManufacturer($code_manufacturer, $page = 1)
    {

        $query = "select goods.id_good, goods.name, goods.price, goods.image 
        from goods 
        where goods.code_manufacturer = '$code_manufacturer'";

        return $this->executeQuery($query, $page);
    }


    public function getFullItemInfo($id)
    {
        $query = "select goods.name, goods.price, goods.description, goods.image, manufacturer.manufacturer, manufacturer.code_manufacturer, type.category, type.category_name, type.type, type.type_name, goods.id_good 
        from goods, manufacturer, type 
        where goods.id_good = '$id' and goods.code_manufacturer = manufacturer.code_manufacturer and goods.code_type = type.type_code";

        $result = mysqli_query($this->connection, $query) or die(mysqli_error($this->connection));

        if ($result) {
            $row = mysqli_fetch_row($result);
            return new ItemFullInfo($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10]);
        }
        return null;
    }


    function executeQuery($query, $page)
    {
        $offset = 21 * ($page - 1);
        $result = mysqli_query($this->connection, $query) or die(mysqli_error($this->connection));

        $shortListObjects = array();
        ShortViewInfo::setCount(mysqli_num_rows($result));

        $query .= " limit 21 offset $offset";
        $result = mysqli_query($this->connection, $query) or die(mysqli_error($this->connection));

        if ($result) {
            for ($i = 0; $i < mysqli_num_rows($result); ++$i) {
                $row = mysqli_fetch_row($result);
                $shortListObjects[$i] = new ShortViewInfo($row[0], $row[1], $row[2], $row[3]);
            }
        }
        return $shortListObjects;
    }


    public function getRandom()
    {

        $query = "select goods.id_good from goods order by rand()";

        $result = mysqli_query($this->connection, $query) or die(mysqli_error($this->connection));

        if ($result) {
            $row = mysqli_fetch_row($result);
            return $row[0];
        }

        return 1;
    }


    public function getShortListView($category_name, $type_name, $page = 1)
    {
        $query = "select goods.id_good, goods.name, goods.price, goods.image 
        from goods 
        where code_category = (select distinct type.category_code from type where type.category_name = '$category_name' )";

        if ($type_name != null) {
            $query .= "and code_type = (select distinct type.type_code from type where type.type_name = '$type_name') ";
        }


        return $this->executeQuery($query, $page);
    }


    public function getNews()
    {

        $query = "select news.news_title, news.news, news.date, news.image_news
        from news";

        $news = array();

        $result = mysqli_query($this->connection, $query) or die(mysqli_error($this->connection));
        if ($result) {
            for ($i = 0; $i < mysqli_num_rows($result); ++$i) {
                $row = mysqli_fetch_row($result);
                $news[$i] = new News($row[0], $row[1], $row[2], $row[3]);
            }
            return $news;
        }
    }


    public function getGoodById($id)
    {
        $query = "select goods.id_good, goods.name, goods.price, goods.image 
        from goods 
        where goods.id_good='$id'";


        $result = mysqli_query($this->connection, $query) or die(mysqli_error($this->connection));

        if ($result) {
            for ($i = 0; $i < mysqli_num_rows($result); ++$i) {
                $row = mysqli_fetch_row($result);
                return new ShortViewInfo($row[0], $row[1], $row[2], $row[3]);
            }
        }
        return null;
    }
}