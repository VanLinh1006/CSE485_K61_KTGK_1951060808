<?php
    require_once 'config/db.php';

    class UserModel{
        private $userID;
        private $userName;
        private $email;
        private $pass;
        public function getAllUsers(){
            $conn = $this->connectDb();
            $sql = "SELECT * FROM 1951060808_employees";
            $result = mysqli_query($conn,$sql);
            $arr_users = [];
            if(mysqli_num_rows($result) > 0){
                $arr_users = mysqli_fetch_all($result, MYSQLI_ASSOC); //Sử dụng MYSQLI_ASSOC để chỉ định lấy kết quả dạng MẢNG KẾT HỢP
            }

            return $arr_users;
        }

        public function connectDb() {
            $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
            if (!$connection) {
                die("Không thể kết nối. Lỗi: " .mysqli_connect_error());
            }
    
            return $connection;
        }
    
        public function closeDb($connection = null) {
            mysqli_close($connection);
        }
    }


?>