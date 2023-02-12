<?php
$conn = new mysqli("localhost","root", "", "karfelvetel", "3306");
if (!$conn -> errno){
    $sqlKarszakertok= "SELECT azonosito, nev, telefonszam, email, ceg FROM karszakertok";
    $queryKarszakertok = $conn -> query($sqlKarszakertok);
    echo "<span id="."dataTableTite".">Jelenleg nálunk dolgozó kárszakértők adataik</span>";
    echo "<table class="."table-hover>"."
            <tr>
                <th cl-md-3>Azonosító</th>
                <th cl-md-3>Név</th>
                <th cl-md-3>Telefonszám</th>
                <th cl-md-3>Email</th>
                
            </tr>";
    while($row = $queryKarszakertok->fetch_assoc()){
        echo "<tr><td>".$row["azonosito"]."</td><td>".$row["nev"]."</td><td>".$row["telefonszam"]."</td><td>".$row["email"]."</td><td></tr>";
    }
        echo "</table>";
    }
?>