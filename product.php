<?php
require("config.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cancuri</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    
    <div class="table">
        <table >
        <tr>
            <th>ID</th>
            <th>Produit</th>
            <th>Prix</th>
            <th>Contité</th>
            <th>Status</th>
        </tr>
        <?php
        $query='SELECT * FROM `produits`';
        $result=mysqli_query($connce,$query) ;
        $i=0;
        while($row=mysqli_fetch_array($result)) {
            if ($row['prix']>1000 ){
                $prix=(string)((int)($row['prix'])/1000)." DT";

            }else{
                $prix=(string)($row["prix"])." millim";
            }
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['produit']."</td>";
            echo "<td>".$prix."</td>";
            echo "<td class='conti'>".$row['conti']."</td>";
            echo "<td id='valsk".$i."'></td>";
            echo "</tr>";   
            $i++;
        }

        ?>
        </table>
    </div>
</div>
    
    </div>
    <script>
        setTimeout(() => {  
    const collection = document.getElementsByClassName("conti");
    for (let i = 0; i < collection.length; i++) {
    if(collection[i].textContent==0){
        sa="valsk"+String(i)
        console.log(sa)
        va=document.getElementById(sa)
        va.innerText="Hors stock"
        va.classList.add('nvalid');
    }else if (collection[i].textContent<10){
        sa="valsk"+String(i)
        console.log(sa)
        va=document.getElementById(sa)
        va.innerText="stock limiter"
        va.classList.add('knvalid');
    }
    else{
        sa="valsk"+String(i)
        console.log(sa)
        va=document.getElementById(sa)
        va.innerText="valable"
        va.classList.add('valid');
    }
    } }, 500);
    </script>
</body>
</html>