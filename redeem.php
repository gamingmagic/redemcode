<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $myPromoCode = isset($_POST['promocode']) ? $_POST['promocode'] : false;
    $contents = file_get_contents('/path/to/file.txt');
    $promoCodes = explode("\n", $contents);

    // Check if the promo code is present in the file
    if ($myPromoCode && in_array($myPromoCode, $promoCodes)) {

        // Find the corresponding key
        $key = array_search($myPromoCode, $promoCodes);

        // Remove the code
        unset($promoCodes[$key]);

        // Write coes back to file
        $contents = implode("\n", $promoCodes);
        file_put_contents('/path/to/file.txt', $contents);

    } else {
        die("Promotion code doesn't exist");
    }

}
?>
<form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
    <input type="text" name="promocode" />
    <button type="submit">Redeem</button>
</form>
