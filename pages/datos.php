<?php
error_reporting(E_ERROR | E_PARSE);
include("../global/conexion.php");
if (isset($_POST['division']) || isset($_POST['divisionedit']) ) {
	$division = $_POST['division'];
	$divisionedit = $_POST['divisionedit'];

	$sql = "SELECT perfil
		from perfilasignacion 
		where division='$division'";
	$result = mysqli_query($link, $sql);

	$sql2 = "SELECT perfil
		from perfilasignacion 
		where division='$divisionedit'";
	$result2 = mysqli_query($link, $sql2);
}
?>
<?php if (empty($divisionedit)) { ?>
	<select id="lista2" name="lista2" class="custom-select form-control mb-2 mr-sm-2 form-control formularioinput">
		<?php if (empty($division)) {
		?>

			<option value="">Seleccione...</option>
		<?php } ?>
		<?php foreach ($result as $opciones) : ?>
			<option value="<?php echo $opciones['perfil'] ?>"><?php echo $opciones['perfil'] ?></option>
		<?php endforeach ?>
	</select>
<?php } else { ?>
	<select id="lista4" name="lista4" class="custom-select form-control mb-2 mr-sm-2 form-control formularioinput">
		<?php if (empty($divisionedit)) {
		?>

			<option value="">Seleccione...</option>
		<?php } ?>
		<?php foreach ($result2 as $opciones2) : ?>
			<option value="<?php echo $opciones2['perfil'] ?>"><?php echo $opciones2['perfil'] ?></option>
		<?php endforeach ?>
	</select>
<?php } ?>