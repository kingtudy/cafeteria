<div class="modal fade" id="viewFoodList-<?php echo $row["id_menu"]; ?>" tabindex="-1" role="dialog" aria-labelledby="viewFoodList" aria-hidden="true">
    <div class="modal-dialog show-food-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewFoodList">Food table</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="desc-content">
                    <?php
                    $query_food = "select id_food, name, type, price, id_menu, description from food where id_food in (select id_food from food_on_the_menu where id_menu=(" . $row['id_menu'] . "));";
                    $food_data = mysqli_query($link, $query_food);
                    if(mysqli_num_rows($food_data) > 0) { ?>
                        <table class="table table-bordered table-hover table-mancare">
                            <thead>
                            <tr>
                                <th class="col-md-2" style="text-align: center; font-size: 20px;">NAME</th>
                                <th class="col-md-2" style="text-align: center; font-size: 20px;">TYPE</th>
                                <th class="col-md-2" style="text-align: center; font-size: 20px;">PRICE</th>
                                <th class="col-md-6" style="text-align: center; font-size: 20px;">DESCRIPTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (mysqli_num_rows($food_data) > 0) {
                                while($row_modal = mysqli_fetch_array($food_data)) { ?>
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