
<?php
 
 $sql="select * from baiviet where idbaiviet='$_GET[id]'";
 $baiviet=mysqli_query($conn,$sql);
 $dong=mysqli_fetch_array($baiviet);
?>

<form action="modules/baiviet/xuly.php?id=<?php echo $dong['idbaiviet'] ?>" method="post" enctype="multipart/form-data">
<div class="content-left" style="margin-bottom: 20px">

<table width="995" border="1">
  <tr>
    <td colspan="2"><div align="center">Sửa bài viết</div></td>
  </tr>
  <tr>
    <td>Tên bài viết</td>
    <td><label>
      <input type="text" name="tenbaiviet" id="tenbaiviet" size="120" value="<?php echo $dong['tenbaiviet'] ?>">
    </label></td>
  </tr>
  <tr>
    <td>Ảnh minh họa(Nhập URL)</td>
      <td><label>
              <input type="text" name="anhminhhoa" id="anhminhhoa" size="120">
              <img src="<?php echo $dong['anhminhhoa']?>" height="150" width="200">
          </label></td>
  </tr>
  <tr>
    <td>Tóm tắt</td>
    <td><label>
      <textarea style="width: 900px !important;"  name="tomtat" class="mytextarea" cols="45" rows="5" >
          <p style="color:#888888; font-size:10px"> <?php
              date_default_timezone_set("Asia/Bangkok");
              echo "Cập nhật lúc: " . date("h:i d/m/Y");
              ?> </p>
      	<?php  echo $dong['tomtat']?>
      </textarea>
    </label></td>
  </tr>
  <tr>
    <td>Nội dụng</td>
    <td><label>
      <textarea style="width: 900px !important; height: 2000px !important;"  name="noidung" class="mytextarea" cols="45" rows="5">
      	<?php echo $dong['noidung'] ?>
      </textarea>
    </label></td>
  </tr>
  <tr>
    <td>Loại tin</td>
    <td><label>
      <select name="loaitin" id="loaitin">
      <?php
	  $sql="select * from loaitin";
	 $loaitin= mysqli_query($conn,$sql);
	  while($dong_loaitin=mysqli_fetch_array($loaitin)){
		  if($dong_loaitin['idloaitin']==$dong['idloaitin']){
	  ?>
      
      <option value="<?php echo $dong_loaitin['idloaitin'] ?>" selected="selected"><?php echo $dong_loaitin['tenloaitin'] ?></option>
     <?php
	  }else{
	 ?>
     <option value="<?php echo $dong_loaitin['idloaitin'] ?>"><?php echo $dong_loaitin['tenloaitin']?></option>
     <?php
	  }
	  }
	 ?>
      </select>
    </label></td>
  </tr>
  <tr>
    <td>Trạng thái</td>
    <td><label>
      <select name="trangthai" id="trangthai">
      <?php
	  if($dong['trangthai']=='Hiển thị'){
	  ?>
        <option value="Hiển thị" selected>Hiển thị</option>
        <option value="Không hiển thị">Không hiển thị</option>
        <?php
	  }else{
		?>
         <option value="Hiển thị" >Hiển thị</option>
        <option value="Không hiển thị" selected>Không hiển thị</option>
        <?php
	  }
		?>
      </select>
    </label></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="sua" id="sua" value="Sửa">
    </div></td>
  </tr>
</table>
</div>
</form>
