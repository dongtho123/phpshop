<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class blog
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insert_blogs($data,$files){

			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;
            if($name=="" ||  $product_desc=="" ){
				$alert = "<span class='success'> Không Được Để Trống</span>";
				return $alert;
			}else{
				move_uploaded_file($file_temp,$uploaded_image);
				$query = "INSERT INTO tbl_blogs(name,product_desc,image) VALUES('$name','$product_desc','$unique_image')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Insert Product Successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Insert Product Not Success</span>";
					return $alert;
				}
				
			}
			
		}
		public function show_blogs(){
			$query = "SELECT * FROM tbl_blogs order by id desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function del_blog($id){
			$query = "DELETE FROM tbl_blogs where id = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'> Deleted Successfully</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Deleted Not Success</span>";
				return $alert;
			}
			
		}

		public function update_blog($data,$files,$id){

			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
			//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');

			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			// $file_current = strtolower(current($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;


			if($name=="" ||  $product_desc=="" ){
				$alert = "<span class='success'> Không Được Để Trống</span>";
				return $alert;
			}else{
				if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					if ($file_size > 8388608) {

		    		 $alert = "<span class='success'>Image Size should be less then 2MB!</span>";
					return $alert;
				    } 
					elseif (in_array($file_ext, $permited) === false) 
					{
				     // echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";	
				    $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
					return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);
					$query = "UPDATE tbl_blogs SET
					name = '$name',
					 
					image = '$unique_image',
					product_desc = '$product_desc'
					WHERE id = '$id'";
					
				}else{
					//Nếu người dùng không chọn ảnh
					$query = "UPDATE tbl_blogs SET

                    name = '$name',
					 
					 image = '$unique_image',
					 product_desc = '$product_desc'
					 WHERE id = '$id'";
					
					
					
				}
				$result = $this->db->update($query);
					if($result){
						$alert = "<span class='success'> Updated Successfully</span>";
						return $alert;
					}else{
						$alert = "<span class='error'> Updated Not Success</span>";
						return $alert;
					}
				
			}

		}
		public function getblogbyId($id){
			$query = "SELECT * FROM tbl_blogs where id = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function getall_blogs(){
			$query = "SELECT * FROM tbl_blogs";
			$result = $this->db->select($query);
			return $result;
		} 
		public function get_details($id){
			$query = "SELECT * FROM tbl_blogs where id = '$id'";

			$result = $this->db->select($query);
			return $result;
		}
	}
?>