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
	<a href="profil-entreprise.php" class="list-group-item  ">
		Dashboard
	</a>
	<a href="articles-mis-en-ligne.php" class="list-group-item  ">Articles en ligne</a>
	<a href="gestion-de-prestations.php" class="list-group-item ">Prestations en ligne</a>
	<div class="list-group-item notif"><a href="messagerie-entreprise.php">Messagerie</a><div class="circle" id="messageCount"></div></div>

	<div class="list-group-item notif"><a href="notifications-entreprise.php">Notifications</a><div id="count" class="circle"></div></div>
	<a href="cotisations-annuel.php" class="list-group-item ">Cotisations annuel</a>



	<a href="edit-profil-entreprise.php" class="list-group-item ">Edit profil</a>
    <a href="../config/deconnexion.php" class="list-group-item  ">Deconnexion</a>
</div>

<script src="../JS/notificationCount.js"></script>
