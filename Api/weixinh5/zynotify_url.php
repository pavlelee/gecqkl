<?php
/**
 * 微信支付通知地址
 *
 */
//
//$a=header("location: http://www.zgllsj.com/index.php/Index/Payment/h5_notifys");
//$_GET['_URL_']= Array(0=>'index',1=>'payment',2=>'h5_notifys');
//print_r($_GET);
//echo $_SERVER['SERVER_NAME'];
//require_once(dirname(__FILE__).'/../../index.php');
//header('location:../../index.php/index/payment/h5_notifys');

		header('Content-type:text/html; Charset=utf-8');		
		$testxml  = file_get_contents("php://input");
        $jsonxml = json_encode(simplexml_load_string($testxml, 'SimpleXMLElement', LIBXML_NOCDATA));
        $result = json_decode($jsonxml, true);//转成数组
        file_put_contents('1.txt',json_encode($result));
        if($result){
	        $onumber = $result['out_trade_no'];
	        
	        $mysql_server_name='39.106.45.147:3306'; //改成自己的mysql数据库服务器
			 
			$mysql_username='root'; //改成自己的mysql数据库用户名
			 
			$mysql_password='1qaz@WSX1@3'; //改成自己的mysql数据库密码
			 
			$mysql_database='gec'; //改成自己的mysql数据库名
			
			$conn=mysqli_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ;
        file_put_contents('1.txt',json_encode(mysql_error()));
			mysqli_query($conn,"set names 'utf8'"); //数据库输出编码
	 
			mysqli_select_db($conn,$mysql_database); //打开数据库
			
			//$sql = "update `ds_orders` set paymethod = 1 , status = 1 where onumber = ".$onumber;
			
			//修改订单状态
	 		mysqli_query($conn,"update `ds_jhorder` set paymethod = 1 , status = 1 where jho_number = ".$onumber);
	 		
			mysqli_close($conn); //关闭 MySQL连接
            return sprintf("<xml><return_code><![CDATA[SUCCESS]]></return_code><return_msg><![CDATA[OK]]></return_msg></xml>");
        }
		
		


?>