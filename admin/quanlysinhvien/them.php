
<h6 class="text-center">Thêm Sinh viên Mới</h6>

<table class="table table-hover text-center">
    <form action="quanlysinhvien/xuly.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        <thead>
            <tr>
                <th>Mã SV</th>
                <th>Họ Tên</th>
                <th>Ngày Sinh</th>
                <th>Giới Tính</th>
                <th>Địa Chỉ</th>
                <th>SĐT</th>
                <th>Mật Khẩu</th>
                <th>Ảnh</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input class="form-control form-control-sm" type="text" name="masv"></td>
                <td><input class="form-control form-control-sm" type="text" name="ten"></td>
                <td><input class="form-control form-control-sm" type="date" name="ns"></td>
                <td><input class="form-control form-control-sm" type="text" name="gt"></td>
                <td><input class="form-control form-control-sm" type="text" name="dc"></td>
                <td><input class="form-control form-control-sm" type="text" name="sdt"></td>
                <td><input class="form-control form-control-sm" type="text" name="mk"></td>
                <td><input class="form-control form-control-sm" type="file" name="anh"></td>
                <td><input class="btn-sm btn-success btn" type="submit" name="action" value="them"></td>
            </tr>
        </tbody>
    </form>
    
</table>
 <form action="quanlysinhvien/import.php" method="post" enctype="multipart/form-data" style="margin-left: 800px;" >
        <input type="file" name="excel_file" required />
        <button type="submit" name="import">Import</button>
    </form>
<br>
<hr>
