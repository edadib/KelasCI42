<table>
    <thead>
        <tr>
            <th>
                Nama
            </th>
            <th>
                Keterangan
            </th>
            <th>
                Harga
            </th>
        </tr>
    </thead>
    <tbody>
    <?php if($rows) : ?>
        <?php foreach($rows as $item) : ?>
            <tr>
                <td>
                    <?php echo $item['name']??"-"; ?>
                </td>
                <td>
                    <?php echo $item['desc']??"-"; ?>
                </td>
                <td>
                    <?php echo $item['price']??"-"; ?>
                    <?php //$item->price; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif ; ?>
    </tbody>
</table>

