<?php
class User {
    private static $_instance;

    public static function instance() {
        if (!isset(self::$_instance)){
            return self::$_instance = new User;
        }
        return self::$_instance;
    }

    public function get_one() {
        $id = $_GET['id'];
        $stmt = DB::instance()->select_by_sql("SELECT * FROM `users` WHERE `id` = ?", array($id));

        if ($stmt->rowCount() === 0) {
            echo json_encode(array('Error' => 'The user requested does not exist or has been deleted'));
        } else {
            $one = $stmt->fetch();
            extract($one);
            $data = array(
                'id' => $id,
                'first name' => ucfirst(strtolower($first_name)),
                'middle name' => ucfirst(strtolower($middle_name)),
                'last name' => ucfirst(strtolower($last_name)),
                'date of birth' => $date_of_birth,
                'sex' => $sex,
                'address' => ucwords($address),
                'email' => strtolower($email),
                'contact' => $contact
            );
            echo json_encode($data);
        }
    }

    public function get_all() {
        $stmt = DB::instance()->select_by_sql("SELECT * FROM `users`", array());
        if ($stmt->rowCount() === 0) {
            echo json_encode(array('Error' => 'We currently have no registered users'));
        } else {
            $all = array();
            while ($one = $stmt->fetch()) {
                extract($one);
                $data = array(
                    'id' => $id,
                    'first name' => ucfirst(strtolower($first_name)),
                    'middle name' => ucfirst(strtolower($middle_name)),
                    'last name' => ucfirst(strtolower($last_name)),
                    'date of birth' => $date_of_birth,
                    'sex' => $sex,
                    'address' => ucwords($address),
                    'email' => strtolower($email),
                    'contact' => $contact
                );
                $all[] = $data;
            }
            echo json_encode($all);
        }
    }

    public function create() {
        $errors = array();
        $post = json_decode(file_get_contents('php://input'), true);

        $required = array('first_name', 'last_name', 'date_of_birth', 'sex', 'address', 'email', 'contact');
        foreach ($required as $key) {
            if (!isset($post[$key])) {
                $key = str_replace('_', ' ', $key);
                $errors[] = array('Error' => $key.' is required');
            }
        }

        if (count($errors) !== 0) {
            echo json_encode($errors);
        } else {
            foreach ($post as $key => $value) {
                if (trim($value) === "" && $key !== 'middle_name') {
                    $key = str_replace('_', ' ', $key);
                    $errors[] = array('Error' => $key.' cannot be empty');
                } else {
                    $$key = htmlspecialchars(trim($value));
                }
            }

            if (count($errors) !== 0) {
                echo json_encode($errors);
            } else {
                if (!DB::instance()->insert('users', array('first_name', 'middle_name', 'last_name', 'date_of_birth', 'sex', 'address', 'email', 'contact'), array($first_name, $middle_name, $last_name, $date_of_birth, $sex, $address, $email, $contact))) {
                    echo json_encode(array('Error' => 'An error occurred while signing up. Please try again later')); 
                } else {
                    echo json_encode(array('Success' => 'User created'));
                }
            }
        }

        
    }

    public function update() {
    	$errors = array();
        $post = json_decode(file_get_contents('php://input'), true);
        
        if (!isset($post['id'])) {
            echo json_encode(array('Error' => 'You must supply an ID to update your details'));
        } else {
            $id = $post['id'];
            $stmt = DB::instance()->select_by_sql("SELECT * FROM `users` WHERE `id` = ?", array($id));
            if ($stmt->rowCount() === 0) {
                echo json_encode(array('Error' => 'No user bears this ID'));
            } else {
                $details = $stmt->fetch();

                $all = array('first_name', 'middle_name', 'last_name', 'date_of_birth', 'sex', 'address', 'email', 'contact');
                foreach($all as $key) {
                	if (isset($post[$key])) {
                		$$key = htmlspecialchars(trim($post[$key]));
                		if ($$key === "" && $key !== 'middle_name') {
                			$key = str_replace('_', ' ', $key);
                    		$errors[] = array('Error' => $key.' cannot be empty');
                		}
                	} else {
                		$$key = $details[$key];
                	}
                }

                if (count($errors) !== 0) {
                	echo json_encode($errors);
                } else {
                	if (!DB::instance()->update('users', array('first_name', 'middle_name', 'last_name', 'date_of_birth', 'sex', 'address', 'email', 'contact'), array($first_name, $middle_name, $last_name, $date_of_birth, $sex, $address, $email, $contact), 'id', $id)) {
	                    echo json_encode(array('Error' => 'An error occurred while trying to update your details. Please try again later'));
	                } else {
	                    echo json_encode(array('Success' => 'User details updated successfully'));
	                }
                }
            }
        }
         
    }

    public function delete() {
        $post = json_decode(file_get_contents('php://input'));
        if (!isset($post->id)) {
            echo json_encode(array('Error' => 'You need to give an ID to delete a user'));
        } else {
            $id = htmlspecialchars(trim($post->id));
            $stmt = DB::instance()->select_by_sql("SELECT `id` FROM `users` WHERE `id` = ?", array($id));
            if ($stmt->rowCount() === 0) {
                echo json_encode(array('Error' => 'No user bears this ID'));
            } else {
                if (!DB::instance()->delete('users', 'id', $id)) {
                    echo json_encode(array('Error' => 'An error occurred while deleting the user. Please try again later'));
                } else {
                    echo json_encode(array('Success' => 'User deleted successfully'));
                }
            }
        }
    }

}