<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Result</title>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    <link rel="stylesheet" href="/view/style/resultFormStyle.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.js"></script>

</head>

<body>
<div class="result">
    <div class="result__body" id="htmlContent">
        <h1 class="result__title">Вы выбрали:</h1>
        <?php
        echo "<table class='result__table' id='tbl_exporttable_to_xls'>";
        echo "
            <thead>
            <tr>
                    <th><h1 class='result__label'>Позиция</h1></th>
                    <th><h1 class='result__label'>Стоимость</h1></th>
                </tr>
            </thead>
            <tbody>
        ";
        $sum = 0;
        foreach ($_POST as $item) {
            $obj = json_decode($item);
            $sum += $obj->cost;
            echo '<tr>';
            echo "<td><p class='result__label'>$obj->name</p></td>";
            echo "<td><p class='result__label'>$obj->cost р.</p></td>";
            echo '</tr>';
        }
        echo "<tr class='result__tr--invisible'><td class='result__td--invisible'><p class='result__label'> Сумма: $sum р.</p></td></tr>";
        $now = new DateTime('now', new DateTimeZone('Europe/Moscow'));
        $textNow = $now->format("j F Y");
        echo "<tr class='result__tr--invisible'><td class='result__td--invisible'><p class='result__label'> Дата: $textNow </p></td></tr>";
        echo "</tbody></table>";
        ?>
    </div>
    <div class="result__buttons-container">
        <button  class="result__button" onclick="ExportToExcel('xlsx')">Сохранить в excel</button>
        <button  class="result__button" onclick="generatePDF()">Сохранить в PDF</button>
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

    function generatePDF() {
        const element = document.getElementById('htmlContent');
        html2pdf()
            .from(element)
            .save();
    }
</script>


</body>
</html>