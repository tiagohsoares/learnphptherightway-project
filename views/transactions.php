<!DOCTYPE html>
<html>
    <head>
        <title>transações</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            tfoot tr th {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($transactions)):?>
                    <?php foreach($transactions as $key => $transação):?>
                        <tr>
                            <td><?= $transação[0]?></td>
                            <td><?= $transação[1]?></td>
                            <td><?= $transação[2]?></td>
                            <td><?= $transação[3]?></td>
                        </tr>
                <?php endforeach?>
            <?php endif?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td</td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td></td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
