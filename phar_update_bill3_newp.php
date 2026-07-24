<table id="itemTable" border="1" cellpadding="4">
    <tr>
        <th>Item</th>
        <th>Available</th>
        <th>Qty</th>
    </tr>

<?php
// Example dynamic rows from database
$items = [
    ['id'=>1, 'name'=>'Item A', 'stock'=>10],
    ['id'=>2, 'name'=>'Item B', 'stock'=>5],
    ['id'=>3, 'name'=>'Item C', 'stock'=>20],
];

foreach($items as $i){
?>
<tr>
    <td><?= $i['name'] ?></td>

    <td>
        <input type="number" class="avail" value="<?= $i['stock'] ?>" readonly>
    </td>

    <td>
        <input type="number" class="qty" name="qty[]" min="0">
    </td>
</tr>
<?php } ?>
</table>


<script>
document.addEventListener("input", function(e) {
    if (e.target.classList.contains("qty")) {

        let row = e.target.closest("tr");
        let available = row.querySelector(".avail").value;
        let qty = e.target.value;

        if (Number(qty) > Number(available)) {
            alert("You cannot sell more than available stock!");
            e.target.value = available; // reset to max allowable
        }
    }
});
</script>
<script>
function checkAllQty() {
    let rows = document.querySelectorAll("#itemTable tr");
    for (let r of rows) {
        let qty = r.querySelector(".qty");
        let avail = r.querySelector(".avail");
        if (qty && avail && Number(qty.value) > Number(avail.value)) {
            return false;
        }
    }
    return true;
}

document.querySelector("form").addEventListener("submit", function(e){
    if(!checkAllQty()){
        alert("Invalid quantities found!");
        e.preventDefault();
    }
});
</script>