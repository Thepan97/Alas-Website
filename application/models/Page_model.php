<?php
class Page_model extends CI_Model {

   public function email_exists($email) {
      
    $this->db->where('email', $email);

    $query = $this->db->get('users');

    return $query->num_rows() > 0;
}
   public function insert_user($data) {
      // echo"<pre>";
      // print_r($data);
      // die;
      
    return $this->db->insert('users', $data);
}
	// Controller function example
public function getCoursesByParent($parent_id)
{
    $sql = "
        SELECT 
            c.id AS category_id,
            c.name AS category_name,
            co.id AS course_id,
            co.title AS course_title,
            co.price AS course_price
        FROM category c
        LEFT JOIN course co ON co.sub_category_id = c.id
        WHERE c.parent = ?
        ORDER BY c.id, co.id
    ";

    $query = $this->db->query($sql, [$parent_id]);
    
    $result = $query->result_array();

    $data = [];
    foreach ($result as $row) {
        $cat_id   = $row['category_id'];
        $cat_name = $row['category_name'];

        if (!isset($data[$cat_id])) {
            $data[$cat_id] = [
                'title'   => $cat_name,
                'courses' => []
            ];
        }

        if (!empty($row['course_id'])) {
            $data[$cat_id]['courses'][] = [
                'id'    => $row['course_id'],
                'title' => $row['course_title'],
                'price' => $row['course_price'],
            ];
        }
    }

    return $data;
}




}
?>
