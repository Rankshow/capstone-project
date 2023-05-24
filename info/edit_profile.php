<?php
require '../auth/access.php';
include_once '../auth/dbconn.php';


// if (isset($_POST['edit_profile'])) {
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $occupation = htmlspecialchars($_POST['occupation']);
    $state = htmlspecialchars($_POST['state']);
	$lga = htmlspecialchars($_POST['lga']);
	$language = htmlspecialchars($_POST['language']);

	$blank = "field is empty.";

	if (empty($name)) {
		$errMsg['name'] = "Name " . $blank;
	}


	if (empty($occupation)) {
		$errMsg['occupation'] = "Occupation " . $blank;
	}
	if (empty($state)) {
		$errMsg['state'] = "State " . $blank;
	}
	if (empty($lga)) {
		$errMsg['lga'] = "Local Government " . $blank;
	}
	if (empty($language)) {
		$errMsg['language'] = "Language " . $blank;
	}

    if (empty($errMsg)) {
		try {
            $insert->bindValue(':uid', $my_user);

			$sql = "SELECT * FROM users WHERE uid = :uid";
			$stmt = $pdo->prepare($sql);

			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($stmt->rowCount() > 0) {
				echo 'found';
			} else {

				$sql = "UPDATE users SET name = :name, occupation = :occupation, state = :state, lga = :lga, language = :language WHERE uid = :uid";
				$insert =$pdo->prepare($sql);
				$insert->bindValue(':name', $name);
                $insert->bindValue(':occupation', $occupation);
                $insert->bindValue(':state', $state);
                $insert->bindValue(':lga', $lga);
                $insert->bindValue(':language', $language);

                $insert->execute();

                if ($insert->rowCount()) {
                	echo "Update succes. <br>
                	
                	";
                }

			}
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	} else {
		// echo "<script>
		// alert(' Failed'); window.location='../register.html'
		// </script>";
		// header('location: ../register.html.php');
	}

	if (isset($errMsg)) {
		foreach ($errMsg as $msg) {
				echo "$msg <br>";
				
			}
	}
// }


?>

<!DOCTYPE>
<html>
    <head>
        <title>EDit profile</title>
    </head>
    <body>
        EDIT SECTION
        <form action="" method="POST">
            <label for="Name">Enter Full Name</label><sup>*</sup><br/>
            <input type="text" placeholder="Enter Full Name" name="name" id="txt-name" class="Name" value="<?= $my_name ?>"><br/>

            <label for="">Enter your email</label><sup>*</sup><br/>
            <input type="text" placeholder="Enter email" class="Email"  name="email" id="txt-email" value="<?= $my_email ?>"><br/>

            <label for="">Phone Number</label><sup>*</sup><br/>
            <input type="number" placeholder="Phone Number" class="number" name="phone"  id="txt-phone" value="<?= $my_phone ?>" ><br/>

            <label for="">Occupation</label><sup>*</sup><br/>
            <input type="text" placeholder="occupation" class="Occupation" id="txt-occupation"  name="occupation" value="<?= $my_occupation ?>" ><br/>

            <label for="">State</label><sup>*</sup><br/>
            <input type="text" placeholder="write your state" class="state"  name="state" id="txt-state" value="<?= $my_state ?>"><br/>

            <label for="">Local Government</label><sup>*</sup><br/>
            <input type="text" placeholder="Local Government" class="Lgovt" name="lga" id="txt-lga" value="<?= $my_lga ?>"><br/>

            <label for="">Language</label><sup>*</sup><br/> 
            <input type="text" placeholder="Write your preferred language" class="lang"  name="language" id="txt-language" value="<?= $my_language ?>"><br/>

            <!-- Drop down or radio to selce between tracks -->
            <label for="">Track</label><sup>*</sup><br/>
            <input type="text" name="password" id="txt-track" value="<?= $my_track ?>"><br/>

            <input type="submit" name="edit_profile" value="Submit" />
        </form>
    </body>
</html>