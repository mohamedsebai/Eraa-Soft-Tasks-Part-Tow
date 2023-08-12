<?php 

class Auth extends DBConnect{

    
    public function insertData($username, $email, $password, $profile_img){
        global $db;
        $q = "INSERT INTO users(username, email, password, profile_img) VALUES(?,?,?,?)";
        $stmt = $db->connect()->prepare($q);
        return $stmt->execute([ $username, $email, $password, $profile_img]);
    }

    public function register($username, $email, $password_hashed, $new_img_name){
        if($this->insertData($username, $email, $password_hashed, $new_img_name)){
            return true;
        }else{
            return false;
        }
    }

    function getSingleUserData($email){
        global $db;
        $q = "SELECT * FROM users WHERE email = ?";
        $stmt = $db->connect()->prepare($q);
        $stmt->execute([$email]);
        $fetchedData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        if($count > 0){
        $data = $fetchedData[0];
        }else{
        $data = $fetchedData;
        }
        $userData = [
        'data' => $data,
        'count' => $count
        ];
        return $userData;
    }

    public function login($email,$password){
        $count = $this->getSingleUserData($email)['count'];
        if($count > 0){
            $userData = $this->getSingleUserData($email)['data'];
            if($userData['email'] == $email){
                if(password_verify($password, $userData['password'])){
                    $_SESSION['role_user']         = 'role_user';
                    $_SESSION['role_user_email']   = $userData['email'];
                    $_SESSION['role_user_user_id'] = $userData['id'];
                    $_SESSION['role_user_img']     = $userData['profile_img'];
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return false;
        }
    }


}