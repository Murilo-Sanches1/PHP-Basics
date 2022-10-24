<?php 

	$email = $title = $ingredients = '';
	$errors = array('email' => '', 'title' => '', 'ingredients' => '');

	if(isset($_POST['submit'])){
		
		// check email
		if(empty($_POST['email'])){
			$errors['email'] = 'Um email é obrigatório';
		} else{
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'Email precisa ser válido';
			}
		}

		// check title
		if(empty($_POST['title'])){
			$errors['title'] = 'Um título é obrigatório';
		} else{
			$title = $_POST['title'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
				$errors['title'] = 'Títulos devem conter apenas letras e espaços';
			}
		}

		// check ingredients
		if(empty($_POST['ingredients'])){
			$errors['ingredients'] = 'Pelo menos um ingrediente é obrigatório';
		} else{
			$ingredients = $_POST['ingredients'];
			if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
				$errors['ingredients'] = 'Ingredientes devem ser separados por vírgula';
			}
		}

	} // end POST check

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Adicionar Pizza</h4>
		<form class="white" action="add.php" method="POST">
			<label>Seu EMAIL</label>
			<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
			<div class="red-text"><?php echo $errors['email']; ?></div>
			<label>Título da pizza</label>
			<input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
			<div class="red-text"><?php echo $errors['title']; ?></div>
			<label>Ingredientes (separados por vírgula)</label>
			<input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
			<div class="red-text"><?php echo $errors['ingredients']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>