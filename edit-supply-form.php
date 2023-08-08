<?php include "theme/header.php";
include "sys.php";
$query_supply = 'select id_supply, name, qty, supplier, notes from supply where id_supply=('.$_REQUEST["id"].');'; //Imi ia din link variabila ID
$supply_data = mysqli_query($link, $query_supply);
$row = mysqli_fetch_array($supply_data); ?>

<div class="container-fluid background-img">
    <div class="container login-container">
        <form class="edit-form" action="edit-supply-query.php?id=<?php echo $row[" method="post">
            <div class="row-question">
                <div class="food-modal-field">
                    <div class="form-group">
                        <label for="supplyTitle">Nume</label>
                        <input type="text" class="form-control" id="supplyName" placeholder="Introduceti nume" value="<?php echo $row['name']; ?>" autofocus="" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="supplyTitle">Cantitate</label>
                        <input type="text" class="form-control" id="supplyTitle" placeholder="Introduceti cantitate" value="<?php echo $row['qty']; ?>" autofocus="" name="qty" required>
                    </div>
                    <div class="form-group">
                        <label for="supplyTitle">Furnizor</label>
                        <input type="text" class="form-control" id="supplyTitle" placeholder="Introduceti furnizor" value="<?php echo $row['supplier']; ?>" autofocus="" name="supplier" required>
                    </div>
                    <label for="supplyTitle">Notite</label>
                    <textarea class="form-control summernote" style="display: block;" name="notes"><?php echo $row['notes']; ?></textarea>
                    <button type="submit" class="btn btn-primary btn-edit">Salveaza modificarile</button>
                </div>
            </div>
        </form>
    </div>
</div>
