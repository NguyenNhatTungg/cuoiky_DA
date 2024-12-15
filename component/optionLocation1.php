<?php
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $location = $id ? $p->selectLocationID($id) : null;
    $tblLocation = $p->selectLocationALL();

    if ($tblLocation) {
        if (mysqli_num_rows($tblLocation) > 0) { 
            echo "<option value=''>Vui lòng địa điểm</option>";
            while ($row = mysqli_fetch_assoc($tblLocation)) {

                $selected = ($row['arrival_airport'] == $location) ? "selected" : "";

                // Hiển thị <option>
                echo "<option $selected value='" . $row['arrival_airport'] . "'>".$row['arrival_airport']."</option>";
            }
        } else {
            echo "<option value=''>Không có dữ liệu</option>";
        }
    } else {
        echo "<option value=''>Lỗi truy xuất dữ liệu</option>";
    }
?>