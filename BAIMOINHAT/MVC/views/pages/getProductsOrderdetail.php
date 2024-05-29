<?php
            //kiem tra xam form da dc gui di hay chua
            if($_SERVER['REQUEST_METHOD']=="POST"){
                //xu ly du lieu formo day

                //gan gia tri cho action sau khi xu ly form
                $newAction= "";
            }else{
                //gia tri action ban dau
                $newAction = "displayProductsOrderdetail";
            }
?>
<form method="post" action="<?php echo $newAction; ?>">
    <label for="" class="form-label">Select Orderdetail</label>
                <div class="mb-3">
                    <label for="" class="form-label">input CID</label>
                    <input
                        type="text"
                        class="form-control"
                        name="selectOrderdetail"
                        id=""
                        placeholder=""/>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="btSearch">
                        Search
                    </button>
                </div>     
                
                <div class="mb-3">
                    <label for="" class="form-label">input OID</label>
                    <input
                        type="text"
                        class="form-control"
                        name="selectOrderdetail"
                        id=""
                        placeholder=""/>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="btSearch">
                        Print
                    </button>
                </div>  
            </form>

            <?php

if (isset($data["Products"])) {
    $row = mysqli_fetch_array($data["Products"]); 
    echo "<h3 style='text-align: center;'> Invoice </h3>"; 
    echo "<div style='display: flex; justify-content: space-between;'>"; 
    echo "<label>Customer Name: ". $row["cname"] . "</label> <br>"; 
    echo "<label>Address: ". $row["address"] . "</label> <br>"; 
    echo "</div>"; 
    echo "<label>Order Date: " . $row["ordate"] . "</label>";
    // hiển thị kết quả
    echo "<table>";
    echo "<tbody>";

    echo "<thead>";
    echo "<tr>";

    $fieldNames = $data["Products"]->fetch_fields();

    foreach ($fieldNames as $field) {
        echo "<th class=\"text-center\">" . strtoupper($field->name) . "</th>";
    }

    echo "</tr>";
    echo "</thead>";

    while ($row = mysqli_fetch_array($data["Products"])) {

        
        // Lấy từng hàng dữ liệu của view "viewOrderCustomer"
        echo "<tr>"; // Bắt đầu một hàng mới trong bảng
        echo "<td class=\"text-left\">" . $row["pid"] . "</td>"; // Hiển thị mã khách hàng
        echo "<td class=\"text-left\">" . $row["pname"] . "</td>"; // Hiển thị tên sản phẩm
        echo "<td class=\"text-left\">" . $row["company"] . "</td>"; // Hiển thị công ty sản xuất
        echo "<td class=\"text-left\">" . $row["quantity"] . "</td>"; // Hiển thị số lượng sản phẩm
        echo "<td class=\"text-left\">" . $row["unit_price"] . "</td>"; // Hiển thị đơn giá sản phẩm
        echo "<td class=\"text-left\">" . $row["total"] . "</td>"; // Hiển thị tổng giá trị của mỗi mục trong chi tiết đơn hàng

        echo "</tr>"; // Kết thúc hàng trong bảng
    }

    echo "</tbody>"; // Đóng phần thân của bảng
    echo "</table>"; // Đóng bảng
}
?>