<?php  include VIEWS.'inc/header.php'; ?>

<form action="traitement.php" method="post">
<p>

    <strong>Nom<span style="color: #ff0000;">*</span> :</strong>
        <label for="nom"> </label> <input id="nom" name="nom" size="28" type="text" />

    <strong>Prénom :</strong> <label for="prenom">
        </label> <input id="prenom" name="prenom" size="27" type="text" /> <br /><br />

    <strong>Mail <span style="color: #ff0000;">*</span> : </strong><br />
        <label for="mail"> </label><input id="mail" name="mail" size="81" type="text" />

</p>

<p>Pour quelle raison nous contactez-vous ?</p>

<label for="motif"></label>
    <select id="motif" name="motif">
        <option value="reglement">Demande de renseignement</option> 
        <option value="enquete_commerciales">Réclamation</option>
        <option value="enquete_civile">Livraison</option> 
        <option value="recouvrement">Autre</option> 
    </select>

<p>Message <span style="color: #ff0000;">*</span> :</p>
<p>
    <label for="message"></label>
    <textarea id="message" cols="52" rows="7" name="message"></textarea>

</p>

    <input type="reset" value="Effacer" />

    <input type="submit" value="Envoyer" />

<p> </p>
</form>

<?php  include VIEWS.'inc/footer.php'; ?>