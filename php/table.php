<?php

/*Inizia tabella html. INPUT array degli header colonne*/

function table_start($head){
        echo "<table border=\"1\">";
        echo "<tr>";
        foreach ($head as $field)
                echo"<th> $field </th>";
        echo "</tr>";
};


/*Stampa un array come riga di tabella html*/

function table_row($row){
        echo "<tr>";
        echo "<td><input type=\"radio\" name=\"select\" value=\"$row[0]\"/></td>";
        foreach ($row as $field)
                
                if ($field){
                        echo "<td>$field</td>";}
                else
                        echo "<td>####</td>";
        echo "</tr>";
};


/*chiudere una table*/

function table_end(){
        echo "</table>";
};
