<?php  
include "../models/articleModel.php" ; 
include "client.php" ;

$articles = ArticleModel::selectAll() ; 

