<style>
.notif{
	display:flex;
	justify-content: space-between;
}
.circle {
	color:red;
	border: 1px lightgrey solid;
	border-radius: 50%;
	height: 30px;
	width: 30px;
	text-align: center;
	background-color: lightgrey;
	
}
.notif a {
	text-decoration: none; 
	color: grey;

}
.notif a:hover{
	color: grey;
}

</style>

<div class="list-group">
	<a href="UserAccount.php" class="list-group-item list-group-item-action ">
		Dashboard
	</a>
	<a href="artic.php" class="list-group-item list-group-item-action">Articles</a>
	<a href="#" class="list-group-item list-group-item-action">Prestations</a>
	<a href="messagerie.php" class="list-group-item list-group-item-action">Messagerie</a>
	<div class="list-group-item list-group-item-action notif"><a href="notifications.php">Notifications</a><div id="count" class="circle"></div></div>
	<a href="page_panier.php" class="list-group-item list-group-item-action">Acceder a mon panier</a>
	<a href="historique-des-achats.php" class="list-group-item list-group-item-action">Hisorique des achats</a>
	<a href="consulter-ma-carte.php" class="list-group-item list-group-item-action">Consulter ma carte</a>


	<a href="edit-profil.php" class="list-group-item list-group-item-action">Edit profil</a>
    <a href="../config/deconnexion.php" class="list-group-item list-group-item-action ">Deconnexion</a>
</div>

<script src="../JS/notificationCount.js"></script>
