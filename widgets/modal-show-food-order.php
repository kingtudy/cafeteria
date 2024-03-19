<div class="modal fade" id="viewOrderList-<?php echo $row["id_order"]; ?>" tabindex="-1" role="dialog" aria-labelledby="viewOrderList" aria-hidden="true">
    <div class="modal-dialog show-food-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewFoodList">Tabel cu mancaruri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="desc-content">
                    <?php
                    //Scos din baza toate mancarurile
                    $query_food = "select id_food, name, type, price, id_menu, description from food where id_food in (select id_food from order_food where id_order=(".$row['id_order']."));";
                    $food_data = mysqli_query($link, $query_food);
                    if(mysqli_num_rows($food_data) > 0) { ?>
                        <table style="table-layout: fixed;" class="table table-bordered table-hover table-mancare">
                            <thead>
                            <tr>
                                <th style="text-align: center; font-size: 20px;">NUME</th>
                                <th style="text-align: center; font-size: 20px;">TIP</th>
                                <th style="text-align: center; font-size: 20px;">PRET</th>
                                <th style="text-align: center; font-size: 20px;">DESCRIERE</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (mysqli_num_rows($food_data) > 0) {
                                while($row_modal = mysqli_fetch_array($food_data)) { //cu asta iau fiecare linie in parte si salvez informatia in variabila $row ?>
                                    <tr>
                                        <td><?php echo $row_modal["name"]; ?></td>
                                        <td><?php echo $row_modal["type"]; ?></td>
                                        <td><?php echo $row_modal["price"]; ?></td>
                                        <td><?php echo $row_modal["description"]; ?></td>
                                    </tr>
                                <?php   }
                            } ?>
                            </tbody>
                        </table>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>