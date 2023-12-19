<?php include  "../Formulaires/header.php"; 

// recuperar la informacion introducidos en cada campo 
if(isset($_POST['ajouter'])){
    $streetName=$_POST['streetName'];
    $streetNb=$_POST['streetNb'];
    $city=$_POST['city'];
    $province=$_POST['province'];
    $zipCode=$_POST['zipCode'];
    $country=$_POST['country'];

    //verifica si direccion valor o cantidad estan vacias
    if(empty($streetName)||empty($streetNb)||empty($city)||empty($province)||empty($zipCode)||empty($country)){
        echo "Les champs sont vites";

    }else{        

         ajouterAdresse($streetName,$streetNb,$city,$province,$zipCode,$country);


    }
}

?>

<main>
    <section>
        <h1>Ajouter Adresse</h1>

        <form  method="post"  enctype="multipart/form-data">
       

                <div class="mb-3">
                    <label for="streetName" class="form-label">Nom de Rue</label>
                    <input type="text" name="streetName" class="form-control" >
                </div>

                <div class="mb-3">
                    <label for="streetNb" class="form-label">Numéro de rue</label>
                    <input type="text" name="streetNb" class="form-control" >
                </div>

                <div class="mb-3"> 
                <label for="city" class="form-label">Ville</label>
                <select required name="city" id="city" class="form-label">
                    <option value="Otawwa">Otawwa</option>
                    <option value="Edmonton">Edmonton</option>
                    <option value="Victoria">Victoria</option>
                    <option value="Winnipeg">Winnipeg</option>
                    <option value="Halifax">Halifax</option>
                    <option value="Toronto">Toronto</option>
                    <option value="Québec">Québec</option>
                </select>
                </div>

                <div class="mb-3"> 
                <label for="province" class="form-label">Province</label>
                <select required name="province" id="province" class="form-label">
                    <option value="Canadá">Canadá</option>
                    <option value="Alberta">Alberta</option>
                    <option value="Colombie-Britannique">Colombie-Britannique</option>
                    <option value="Manitoba">Manitoba</option>
                    <option value="Nouvelle-Écosse">Nouvelle-Écosse</option>
                    <option value="Ontario">Ontario</option>
                    <option value="Québec">Québec</option>
                </select>
                </div>

                <div class="mb-3">
                    <label for="zipCode" class="form-label">Code Postal</label>
                    <input type="text" name="zipCode" class="form-control" >
                </div>

                <div class="mb-3"> 
                <label for="country" class="form-label">Country</label>
                <select required name="country" id="country" class="form-label">
                    <option value="Canadá">Canadá</option>
                </select>
                </div>           


                 <div class="d-grid gap-2">
                <button class="boton"name='ajouter' type="submit">Enregistrer</button>
                </div>             
            
            </div>
        </Form>    
    </section>
</main>