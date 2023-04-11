<!-- 
Responsive HTML Table With Pure CSS - Web Design/UI Design

Code written by:
👨🏻‍⚕️ Coding Design (Jeet Saru)

> You can do whatever you want with the code. However if you love my content, you can **SUBSCRIBED** my YouTube Channel.

🌎link: www.youtube.com/codingdesign 
 -->
 <?php
include '../Controller/PrivilegeC.php';

$pc = new PrivilegeC();

$liste = $pc->listePrivilege();
?>
<!DOCTYPE html>
<html lang="en" title="Coding design">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Responsive HTML Table With Pure CSS - Web Design/UI Design</title>
    <link rel="stylesheet" href="style1.css">
    <style>
        input[type="submit"], a {
	display: inline-block;
	padding: 10px 20px;
	background-color: #333;
	color: #fff;
	border: none;
	border-radius: 5px;
	font-size: 16px;
	cursor: pointer;
	margin-right: 10px;
	position: relative;
	animation: move 2s ease-in-out infinite, color-change 2s ease-in-out infinite;
}



@keyframes color-change {
	50% { background-color: #00CED1; }
	50% { background-color: #B22222 }
	
}
        </style>
</head>

<body>
    <main class="table">
        <section class="table__header">
        <h1><a href="privilege.php"> << Previous </a></h1>
            <h1>Privilege Data </h1>
            

            <div class="input-group">
                <input type="search" id="live_search1"  placeholder="Search Data...">
                <div id="searchresult"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#live_search1").keyup(function() {
            var input = $(this).val();
            if(input != "") {  
                $.ajax({
                    url: "livesearch 1.php",
                    method:"POST",
                    data: {input:input},
                    success: function(data) {
                        $("#searchresult").html(data); 
                        $(".table__body").hide(); // hide the table body
                    }
                });
            } else {
                $("#searchresult").html(""); // clear the search result
                $(".table__body").show(); // show the table body
            }
        });
    });
</script>
                <img src="images/search.png" alt="">
            </div>
            <div class="export__file">
                <label for="export-file" class="export__file-btn" title="Export File"></label>
                <input type="checkbox" id="export-file">
                <div class="export__file-options">
                    <label>Export As &nbsp; &#10140;</label>
                    <label for="export-file" id="toPDF">PDF <img src="images/pdf.png" alt=""></label>
                    <label for="export-file" id="toJSON">JSON <img src="images/json.png" alt=""></label>
                    <label for="export-file" id="toCSV">CSV <img src="images/csv.png" alt=""></label>
                    <label for="export-file" id="toEXCEL">EXCEL <img src="images/excel.png" alt=""></label>
                </div>
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Type <span class="icon-arrow">&UpArrow;</span></th>
                        <th> File <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Description  <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Update <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Delete <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                <?php
           foreach ($liste as $p) {
                  ?>
                  <form action="edit.php" method="POST">
                    <tr style="height: 77px;">
                    
                      <td class="u-border-2 u-border-grey-75 u-table-cell u-table-cell-6"> <?= $p['id']; ?> </td>
                      <td class="u-border-2 u-border-grey-75 u-table-cell u-table-cell-7"><?= $p['Type']; ?>  </td>
                      <td class="u-border-2 u-border-grey-75 u-table-cell u-table-cell-8"><?php echo ($p['file']); ?></td>                     
                      <td class="u-border-2 u-border-grey-75 u-table-cell u-table-cell-8"><?php echo ($p['description']); ?></td>  
                      

                      <td action="edit.php"class="u-border-2 u-border-grey-75 u-table-cell u-table-cell-10"> <a href="edit.php?pk6=<?= $p['id'];?>" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-palette-2-base u-radius-20 u-btn-1">Edit</a></td>
                      <td action="supp.php"class="u-border-2 u-border-grey-75 u-table-cell u-table-cell-10"> <a href="supp.php?pk=<?= $p['id'];?>" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-palette-2-base u-radius-20 u-btn-1">Delete</a></td>

                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>