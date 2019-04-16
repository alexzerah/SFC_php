<?php require 'layout/header.php';?>
<?php
require 'lib/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    isset($_POST['name']) ? $name = $_POST['name'] : $name = '';
    isset($_POST['breed']) ? $breed = $_POST['breed'] : $breed = '';
    isset($_POST['weight']) ? $weight = $_POST['weight'] : $weight = '';
    isset($_POST['bio']) ? $bio = $_POST['bio'] : $bio = '';

    $pets = get_pets();
    $newPet = [
        'name' => $name,
        'breed' => $breed,
        'weight' => $weight,
        'bio' => $bio,
        'age' => '',
        'image' => '',
    ];
    $pets[] = $newPet;
    save_pets($pets);
    header('Location:/');
    die;
}
?>

<div class="container">
    <div class="row">
        <div class="col-xs-6">
            <h1>Add your Pet!</h1>

            <form action="/pets_new.php" method="post">
                <div class="form-group">
                    <label for="pet-name" class="control-label">Pet Name</label>
                    <input type="text" name="name" id="pet-name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pet-breed" class="control-label">Breed</label>
                    <input type="text" name="breed" id="pet-breed" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pet-weight" class="control-label">Weight (lbs)</label>
                    <input type="number" name="weight" id="pet-weight" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pet-bio" class="control-label">Pet Bio</label>
                    <textarea name="bio" id="pet-bio" class="form-control"></textarea>
                </div>

                <button class="btn btn-primary">
                    <span class="glyphicon glyphicon-heart">Add</span>
                </button>
            </form>
        </div>
    </div>
</div>


<?php require 'layout/footer.php'; ?>
