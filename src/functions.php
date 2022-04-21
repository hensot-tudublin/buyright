<?php
$action = filter_input(INPUT_GET, 'action');


function getShoppingCart()
{
 $cartItems = [];
 $cartItems['id'] = $_POST['id']; 
 return $cartItems;
 }
function addItemToCart()
{
 $cartItems = getShoppingCart();
 $cartItems[$id];
 $_SESSION['cart'] = $cartItems;
}
?>
<?php
function removeItemFromCart($id)
{
$cartItems = getShoppingCart();
unset($cartItems[$id]);
$_SESSION['cart'] = $cartItems;
}
?>

<?php
function getQuantity($id, $cart)
{
if(isset($cart[$id])){
 return $cart[$id];
 } else {
 return 0;
 }
}
?>
<?php
function increaseCartQuantity($id)
{
 $cartItems = getShoppingCart();
$quantity = getQuantity($id, $cartItems);
$newQuantity = $quantity + 1;
 $cartItems[$id] = $newQuantity;
$_SESSION['cart'] = $cartItems;
}
?>
<?php
function reduceCartQuantity($id)
{
$cartItems = getShoppingCart();
 $quantity = getQuantity($id, $cartItems);
$newQuantity = $quantity - 1;
if($newQuantity < 1){
 unset($cartItems[$id]);
 } else {
 $cartItems[$id] = $newQuantity;
 }
$_SESSION['cart'] = $cartItems;
}
?>
<?php
function displayCart()
{

 $cartItems = getShoppingCart();
 if(!empty($cartItems)){
 require_once __DIR__ . '/../templates/cart.php';
 } else {
 require_once __DIR__ . '/../templates/emptyCart.php';
 }
}
?>


















