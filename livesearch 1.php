<link rel="stylesheet" href="style1.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<?php
include("config.php");
include '../Controller/PrivilegeC.php';

$pc = new PrivilegeC();

$liste = $pc->listePrivilege();
if (isset($_POST['input'])) {
    $input = $_POST['input'];
    $query = "SELECT * FROM privilege WHERE Type LIKE '{$input}%' OR id LIKE '{$input}%' OR file LIKE '{$input}%' OR description LIKE '{$input}%' ";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {
        ?>
        <div class="table table-bordered table-striped mt-4 ">
        <section >

                <section id="ok">
                <table >
                <br></br>                 <br></br> 
                <br></br> <br></br>                 <br></br> 
                <br></br> <br></br>                 <br></br> 
                <br></br> <br></br>                 <br></br> 
                <br></br> 

                  
                  <thead class="u-align-center u-grey-10 u-table-header u-table-header-1">
                  
                  <th> Id  <span class="icon-arrow">&UpArrow;</span></th>

                  <th> Type <span class="icon-arrow">&UpArrow;</span></th>
                        <th> File <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Description<span class="icon-arrow">&UpArrow;</span></th>
                        <th> Delete   <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Update <span class="icon-arrow">&UpArrow;</span></th>


                                      </tr>
                  </thead>
    </table> 
       <table>
            <tbody >
            <?php
           foreach ($liste as $p) {
                  ?>
                  <?php
         while($row = mysqli_fetch_assoc($result))  {
            $id = $row['id'];
            $file = $row['file'];
            $type = $row['Type'];
            $description = $row['description'];
        ?>   
             <tr> 
         </tr>
                    <tr style="height: 77px;">
                    
                      <td name="id2" class="u-border-2 u-border-grey-75 u-table-cell u-table-cell-6"> <?= $id; ?> </td>
                      <td class="u-border-2 u-border-grey-75 u-table-cell u-table-cell-7"><?= $type; ?>  </td>
                      <td class="u-border-2 u-border-grey-75 u-table-cell u-table-cell-8"><?php echo ($file); ?></td>    
                      <td class="u-border-2 u-border-grey-75 u-table-cell u-table-cell-8"><?php echo ($description); ?></td>                
                      <td action="edit.php"class="u-border-2 u-border-grey-75 u-table-cell u-table-cell-10"> <a href="edit.php?pk6=<?= $p['id'];?>" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-palette-2-base u-radius-20 u-btn-1">Edit</a></td>
                      <td action="supp.php"class="u-border-2 u-border-grey-75 u-table-cell u-table-cell-10"> <a href="supp.php?pk=<?= $description;?>" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-palette-2-base u-radius-20 u-btn-1">Delete </a></td>



                    </tr>
                    <?php } ?>
              
                  </tbody>
                </table>
                <?php }} else {
        echo "NO DATA FOUND";
    }
}
?>
                </section>
              </div>
              
            </div>
        


