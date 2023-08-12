<?php 

class Task extends DBConnect{

    
    public function insertData($task, $user_id){
        global $db;
        $q = "INSERT INTO tasks(task, user_id) VALUES(?,?)";
        $stmt = $db->connect()->prepare($q);
        return $stmt->execute([ $task, $user_id ]);
    }

    public function selectData($user_id){
        global $db;
        $query = "SELECT * FROM tasks WHERE user_id = ? ORDER BY id DESC";
        $stmt  = $db->connect()->prepare($query);
        $stmt->execute([$user_id]);
        $count = $stmt->rowCount();
        $row   = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $data = [
            'count' => $count,
            'row'   => $row
        ];

        return $data;
    }

    public function selectDataWithCondtion($id){
        global $db;
        $query = "SELECT * FROM tasks WHERE id = ?";
        $stmt  = $db->connect()->prepare($query);
        $stmt->execute([$id]);
        $count = $stmt->rowCount();
        $row   = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $data = [
            'count' => $count,
            'row'   => $row
        ];

        return $data;
    }

    public function updateData($task, $id){
        global $db;
        $q = "UPDATE tasks SET task = ? WHERE id = ?";
        $stmt = $db->connect()->prepare($q);
        return $stmt->execute([ $task, $id ]);
    }

    public function deleteData($task_id , $user_id){
        global $db;
        $q = "DELETE FROM tasks WHERE id = ? AND user_id = ?";
        $stmt = $db->connect()->prepare($q);
        return $stmt->execute([ $task_id , $user_id ]);
    }


}