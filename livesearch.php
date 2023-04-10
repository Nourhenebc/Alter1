<?php
include("config.php");

if (isset($_POST['input'])) {
    $input = $_POST['input'];
    $query = "SELECT * FROM privilege WHERE Type LIKE '{$input}%' OR id LIKE '{$input}%' OR file LIKE '{$input}%' OR description LIKE '{$input}%' ";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {
        ?>
        <div class="u-table u-table-responsive u-table-1">
                <section id="ok">
                <table class="u-table-entity u-table-entity-1">
                  <colgroup>
                    <col width="19.7%">
                    <col width="20.2%">
                    <col width="18.3%">
                    <col width="19.8%">
                    <col width="22.000000000000004%">
                  </colgroup>
                  
                  <thead class="u-align-center u-grey-10 u-table-header u-table-header-1">
                    <tr style="height: 86px;">
                      <th class="u-border-2 u-border-palette-1-light-1 u-palette-2-light-1 u-table-cell u-table-cell-1">&nbsp;Id</th>
                      <th class="u-border-2 u-border-palette-1-light-1 u-palette-2-base u-table-cell u-table-cell-2">Type</th>
                      <th class="u-border-2 u-border-palette-1-light-1 u-palette-2-base u-table-cell u-table-cell-3">file</th>
                      <th  class="u-border-2 u-border-palette-1-light-1 u-palette-1-base u-table-cell u-table-cell-4">Description</th>
                      <th  class="u-border-2 u-border-palette-1-light-1 u-palette-1-base u-table-cell u-table-cell-4">Update</th>


                                      </tr>
                  </thead>
            <tbody>
            <tbody class="u-align-center u-grey-90 u-table-alt-grey-80 u-table-body u-table-body-1">
                  <?php
         while($row = mysqli_fetch_assoc($result))  {
            $id = $row['id'];
            $file = $row['file'];
            $type = $row['Type'];
            $description = $row['description'];
        ?>
            
                    <tr style="height: 77px;">
                    
                      <td name="id2" class="u-border-2 u-border-grey-75 u-table-cell u-table-cell-6"> <?= $id; ?> </td>
                      <td class="u-border-2 u-border-grey-75 u-table-cell u-table-cell-7"><?= $type; ?>  </td>
                      <td class="u-border-2 u-border-grey-75 u-table-cell u-table-cell-8"><?php echo ($file); ?></td>    
                      <td class="u-border-2 u-border-grey-75 u-table-cell u-table-cell-8"><?php echo ($description); ?></td>                
                      <td action="supp.php"class="u-border-2 u-border-grey-75 u-table-cell u-table-cell-10"> <a href="supp.php?pk=<?= $description;?>" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-palette-2-base u-radius-20 u-btn-1">Update</a></td>


                    </tr>
                    <?php } ?>
              
                  </tbody>
                </table>
                <?php } else {
        echo "NO DATA FOUND";
    }
}
?>
                </section>
              </div>
              
            </div>
            <div class="settings">
              
            </div>
          </div>
        
          
    </div> 
                



