<?	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//recieve a language of main app to apply it here
		$language = strip_tags(trim($_POST['language']));
		//starting joomla app!
		define('_JEXEC', 1);
		define('JPATH_BASE', $_SERVER["DOCUMENT_ROOT"]);
		require_once (JPATH_BASE . '/includes/defines.php');
		require_once (JPATH_BASE . '/includes/framework.php');
		$app = JFactory::getApplication('site');
		
		//load language constants
		$lang = JFactory::getLanguage();
		$lang->setLanguage($language);
		$lang->load('mod_subscriber');
	
		// Get Post Data
		$name = strip_tags(trim($_POST['name']));
		$recipient = strip_tags(trim($_POST['recipient']));
		$email = strip_tags(trim($_POST['email']));
		$subject = strip_tags(trim($_POST['subject']));
		$writingToFileEnable = strip_tags(trim($_POST['writingToFileEnable']));
		$successMessage = strip_tags(trim($_POST['successMessage']));
		
		
		// Validation
		if(empty($name) || empty($email)){
			// Send Error
			echo JText::_('MOD_SUBSCRIBER_NAME_FIELD_PLACEHOLDER');
			exit;
		}
		
		//Build Email
		$message = "Name: $name\n";
		$message .= "Email: $email\n";
		$headers = "From: $name <$email>";
		
		//writing user data to a csv file
		if($writingToFileEnable == '1'){
			$user_CSV[0] = array($name, $email);
			$fp = fopen('../subscribers_list.csv', 'a');
			foreach ( $user_CSV as $line ) {
				fputcsv($fp, array_values($line), ';');
			}
			fclose($fp);
		}
		
		
		
		if(mail($recipient,$subject,$message,$headers)){
			echo $successMessage;
		}else{
			echo JText::_('MOD_SUBSCRIBER_THERE_WAS_A_PROBLEM');
			
		}
	}else{
		echo JText::_('MOD_SUBSCRIBER_THERE_WAS_A_PROBLEM');
	}
