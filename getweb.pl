include_once 'db.php';
                         
$database = new DB();
 
/*====================================================
 * ดึงข้อมูลที่ค้นหาเจอออกมาทั้งหมด
 ===================================================== */
$result =  $database->query("SELECT * FROM room1")->findAll();
 
// ตรวจสอบ
if(!empty($result)){
    // พบข้อมูล
    foreach ($result as $field) {
       echo '<option value="' . $field->id . '">' . $field->status . '</option>';
    }
}
 
/*====================================================
 * ดึงข้อมูลที่ค้นหาเจอออกมา 1 รายการ
 ===================================================== */
  
$result =  $database->query("SELECT * FROM room1")->find();
 
// ตรวจสอบ
if(!empty($result)){
    // พบข้อมูล
    echo '<option value="' . $result->id . '">' . $result->status . '</option>';
}
 
/*====================================================
 * เพิ่มข้อมูล
 ===================================================== */
  
$result =  $database->query("INSERT INTO room1 (id,status) VALUES (1,'room1') ")->getStatus();
 
// ตรวจสอบ
if(!empty($result)){
    // บันทึกสำเร็จ
    // ......
}else{
    // บันทึกไม่สำเร็จ
    // ......
}
 
/*====================================================
 * แก้ไขข้อมูล
 ===================================================== */
  
$result =  $database->query("UPDATE room1 SET status = 'Eakkabin Jaikeawma' WHERE id = 1 ")->getStatus();
 
// ตรวจสอบ
if(!empty($result)){
    // แก้ไขสำเร็จ
    // ......
}else{
    // แก้ไขไม่สำเร็จ
    // ......
}
 
/*====================================================
 * ลบข้อมูล
 ===================================================== */
  
$result =  $database->query("DELETE FROM room1 WHERE id = 1")->getStatus();
 
// ตรวจสอบ
if(!empty($result)){
    // ลบสำเร็จ
    // ......
}else{
    // ลบไม่สำเร็จ
    // ......
}
