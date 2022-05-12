<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Result</title>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    <link rel="stylesheet" href="/view/style/resultFormStyle.css">
</head>

<body>
<div class="result">
    <h1 class="result__title">Вы выбрали:</h1>
    <div class="result__body">
        <?php
        echo "<table class='result__table' id='tbl_exporttable_to_xls'>";
        echo "
    <tr>
        <th class='result__label'>Позиция</th>
        <th class='result__label'>Стоимость</th>
    </tr>";
        $sum = 0;
        foreach ($_POST as $item) {
            $obj = json_decode($item);
            $sum += $obj->cost;
            echo '<tr>';
            echo "<td>$obj->name</td>";
            echo "<td>$obj->cost р.</td>";
            echo '</tr>';
        }
        echo "</table>";
        echo "<p>Сумма: $sum р.";
        ?>
        <button  class="result__button" onclick="ExportToExcel('xlsx')">Export table to excel</button>
    </div>
</div>


<script>
    function ExportToExcel(type, fn, dl) {
        var elt = document.getElementById('tbl_exporttable_to_xls');
        var wb = XLSX.utils.table_to_book(elt, {sheet: "sheet1"});
        return dl ?
            XLSX.write(wb, {bookType: type, bookSST: true, type: 'base64'}) :
            XLSX.writeFile(wb, fn || ('MySheetName.' + (type || 'xlsx')));
    }
</script>
</body>
</html>