<?php  include  "../Formulaires/header.php"; 

$users=getUsers();

?>
<main>
    <section>
        <h1>Gestion users</h1>

        <table class="table table-striped">

        <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Utilisateur</th>
                <th scope="col">Email</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Rol</th>
                <th scope="col" class="bg-transparent">Action</th>
                </tr>
                </thead>
            <tbody>

            
                <?php foreach ($users as $user) { ?>

                <tr>
                    
                    <th scope="row"><?php echo $user['id_user'];?></th>
                    <td><?php echo $user['user_name'];?></td>
                    <td><?php echo $user['email'];?></td>
                    <td><?php echo $user['prenom'];?></td>
                    <td><?php echo $user['nom'];?></td>
                    <td><?php echo $user['name'];?></td>
                    <td class="row bg-transparent">
                    <div class="col-4">
                    <div class="col-4">
                    <a href="modifierUsers.php?id=<?php echo $user['id'];?>" class="btn btn-block btn-success"><i class="bi bi-pencil-square"></i></a> 
                    <div class="col-2"></div>
                        <div class="col-4 ">
                            
                            <a href="effacerUsers.php?id=<?php echo $user['id_user'];?>" class="btn btn-block btn-danger"><i class="bi bi-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
              <?php } ?>
            </tbody> 
        </table>
   </section>
</main>