<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="../style/indexStyle.css">
    <title>Admin fül</title>
</head>
<body>
    <?php
    echo '<div class="content">';
        $conn = new mysqli("localhost","root", "", "karfelvetel", "3306");
        if (!$conn -> errno){
            // Károsult személy
            $sqlKarosultSzemely= "SELECT * FROM karosult_szemelyek";
            $sqlKarosultSzemely = $conn -> query($sqlKarosultSzemely);
            echo "<span id="."dataTableTite".">Károsult személyek</span>";
            echo "<table class="."table-hover>"."
                    <tr>
                        <th cl-md-3>Azonosító</th>
                        <th cl-md-3>Név</th>
                        <th cl-md-3>Telefonszám</th>
                        <th cl-md-3>Email</th>
                        <th cl-md-3>Bejelentés Dátum</th>
                    </tr>";
            while($row = $sqlKarosultSzemely->fetch_assoc()){
                echo "<tr><td>".$row["azonosito"]."</td><td>".$row["nev"]."</td><td>".$row["telefonszam"]."</td><td>".$row["email"]."</td><td>".$row["bejelentes_datum"]."</td><td></tr>";
            }
                echo "</table><br>";

            //Okozó személy
            $sqlOkozoSzemely= "SELECT * FROM okozo_szemelyek";
            $sqlOkozoSzemely = $conn -> query($sqlOkozoSzemely);
            echo "<span id="."dataTableTite".">Károsult személyek</span>";
            echo "<table class="."table-hover>"."
                    <tr>
                        <th cl-md-3>Azonosító</th>
                        <th cl-md-3>Név</th>
                        <th cl-md-3>Telefonszám</th>
                        <th cl-md-3>Email</th>
                        <th cl-md-3>Kár okozás dátum</th>
                    </tr>";
            while($row = $sqlOkozoSzemely->fetch_assoc()){
                echo "<tr><td>".$row["azonosito"]."</td><td>".$row["nev"]."</td><td>".$row["telefonszam"]."</td><td>".$row["email"]."</td><td>".$row["kar_okozas_datum"]."</td><td></tr>";
            }
                echo "</table><br>";   

            //Károsult jármű
            $sqlKarosultJarmu= "SELECT * FROM karosult_jarmuvek";
            $sqlKarosultJarmu = $conn -> query($sqlKarosultJarmu);
            echo "<span id="."dataTableTite".">Károsult jármúvek</span>";
            echo "<table class="."table-hover>"."
                    <tr>
                        <th cl-md-3>Azonosító</th>
                        <th cl-md-3>Károsult személy azonosito</th>
                        <th cl-md-3>Tulaj</th>
                        <th cl-md-3>Rendszám</th>
                        <th cl-md-3>Alvázszám</th>
                        <th cl-md-3>Kategória</th>
                        <th cl-md-3>Típus</th>
                        <th cl-md-3>Szín</th>
                    </tr>";
            while($row = $sqlKarosultJarmu->fetch_assoc()){
                echo "<tr><td>".$row["azonosito"]."</td><td>".$row["karosult_szemely_azonosito"]."</td><td>".$row["tulaj"]."</td><td>".$row["rendszam"]."</td><td>".$row["alvazszam"]."</td><td>".$row["kategoria"]."</td><td>".$row["tipus"]."</td><td>".$row["szin"]."</td><td></tr>";
            }
                echo "</table><br>";
            
            //Okozó jármű
            $sqlOkozoJarmu= "SELECT * FROM okozo_jarmuvek";
            $sqlOkozoJarmu = $conn -> query($sqlOkozoJarmu);
            echo "<span id="."dataTableTite".">Okozó jármúvek</span>";
            echo "<table class="."table-hover>"."
                    <tr>
                        <th cl-md-3>Azonosító</th>
                        <th cl-md-3>Okozó személy azonosito</th>
                        <th cl-md-3>Tulaj</th>
                        <th cl-md-3>Rendszám</th>
                        <th cl-md-3>Alvázszám</th>
                        <th cl-md-3>Kategória</th>
                        <th cl-md-3>Típus</th>
                        <th cl-md-3>Szín</th>
                    </tr>";
            while($row = $sqlOkozoJarmu->fetch_assoc()){
                echo "<tr><td>".$row["azonosito"]."</td><td>".$row["okozo_szemely_azonosito"]."</td><td>".$row["tulaj"]."</td><td>".$row["rendszam"]."</td><td>".$row["alvazszam"]."</td><td>".$row["kategoria"]."</td><td>".$row["tipus"]."</td><td>".$row["szin"]."</td><td></tr>";
            }
                echo "</table><br>";
            
            //Kárszakértők
            $sqlKarszakertok= "SELECT * FROM karszakertok";
            $sqlKarszakertok = $conn -> query($sqlKarszakertok);
            echo "<span id="."dataTableTite".">Kárszakértők</span>";
            echo "<table class="."table-hover>"."
                    <tr>
                        <th cl-md-3>Azonosító</th>
                        <th cl-md-3>Név</th>
                        <th cl-md-3>Telefonszám</th>
                        <th cl-md-3>Email</th>
                        <th cl-md-3>Cég</th>
                    </tr>";
            while($row = $sqlKarszakertok->fetch_assoc()){
                echo "<tr><td>".$row["azonosito"]."</td><td>".$row["nev"]."</td><td>".$row["telefonszam"]."</td><td>".$row["email"]."</td><td>".$row["ceg"]."</td><td></tr>";
            }
                echo "</table><br>";

            //Felhasználók
            $sqlFelhasznalok= "SELECT * FROM felhasznalok";
            $sqlFelhasznalok = $conn -> query($sqlFelhasznalok);
            echo "<span id="."dataTableTite".">Felhasználók</span>";
            echo "<table class="."table-hover>"."
                    <tr>
                        <th cl-md-3>Felhasználónév</th>
                        <th cl-md-3>Jelszó</th>
                        <th cl-md-3>Email</th>
                    </tr>";
            while($row = $sqlFelhasznalok->fetch_assoc()){
                echo "<tr><td>".$row["felhasznalonev"]."</td><td>".$row["jelszo"]."</td><td>".$row["email"]."</td><td></tr>";
            }
                echo "</table><br>";
            }
            echo '</div>';
    ?>
</body>
</html>