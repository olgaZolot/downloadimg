<?php 
if($_POST){
	if(empty($_POST['g-recaptcha-response'])){
		echo '<span class="errorform">Капча не верна!</span>';
		return;
	}
	$message = '';
	if($_POST['name']){
		$message .= "Имя: ".$_POST['name'];
	}
	if($_POST['company']){
		$message .= "\nКомпания: ".$_POST['company'];
	}
	if($_POST['phone']){
		$message .= "\nТелефон: ".$_POST['phone'];
	}
	if($_POST['email']){
		$message .= "\nE-mail: ".$_POST['email'];
	}
	
	if(isset($_POST['option']) and !empty($_POST['option'])){
		foreach($_POST['option'] as $option){
			$message .= "\n".$option;
		}
	}
	$to  = $_POST['emailto'];
	$subject = "Заявка со СпецТракСервис"; 
	
	mail($to, $subject, $message); 
	if($_POST['productname']){
		echo '<span class="okform">Спасибо за проявленный интерес к '.$_POST['productname'].'!<br>Наши специалисты свяжутся с Вами в течении одного рабочего дня.</span>';
	}else{
		echo '<span class="okform">Сообщение отправлено!<br>Наши специалисты свяжутся с Вами в течении одного рабочего дня.</span>';
	}	
	return;
}
?>