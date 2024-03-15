<?php require_once 'header.php'; ?>
    <body>
<div class="divider"></div>
<div class="container">
    <?php require_once 'menu.php';?>
    <h3>Product List</h3>

</div>
<div class="container">
    <div class="table-responsive">
        <table id="sitePress" class="table table-striped table-bordered table-hover table-condensed display">
            <thead>
            <tr class="info">
                <th> Product Name</th>
                <th> Description</th>
                <th> Image</th>
                <th> Featured</th>
                <th> </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach( $productList as $info ):?>
                <tr>
                    <td><?php echo $info['product_name'];?></td>
                    <td><?php echo $info['description'];?></td>
                    <td><?php echo $info['image'];?></td>
                    <td>
                        <input type="checkbox" name="isfeatured" <?php echo $info['is_featured'] == 1 ? 'checked' : '';?> value="1" />
                    </td>
                    <td><a href="/edit/<?php echo $info['id']; ?>">Edit</a> | <a href="/delete/<?php echo $info['id']; ?>">Delete</a></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once 'footer.php'; ?>