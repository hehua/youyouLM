<?php  
	Header("Content-type: image/PNG");  
    session_start(); 
    //准备好随机数发生器种子   
    srand((double)microtime()*1000000);  
    //准备图片的相关参数    
    $im = imagecreate(50,20);  
    $black = ImageColorAllocate($im, 0,0,0);  //RGB黑色标识符  
    $white = ImageColorAllocate($im, 255,255,255); //RGB白色标识符  
    $gray = ImageColorAllocate($im, 200,200,200); //RGB灰色标识符  
    //开始作图      
    imagefill($im,0,0,$gray);  
    while(($randval=rand()%10000)<1000);  
    {  
       $_SESSION["ValidationNum"] = $randval;  
        //将四位整数验证码绘入图片   
        imagestring($im, 5,5 , 3, $randval, $black);  
    }  
    //加入干扰象素     
    for($i=0;$i<200;$i++){  
        $randcolor = ImageColorallocate($im,rand(0,255),rand(0,255),rand(0,255));  
        imagesetpixel($im, rand()%70 , rand()%30 , $randcolor);  
    }  
    //输出验证图片  
    ImagePNG($im);  
    //销毁图像标识符  
    ImageDestroy($im);
    return  $randval;
//header("content-type:image/png");  
////定义header，声明图片文件，最好是png，无版权之扰;  
////生成新的四位整数验证码  
//session_start();//开启session;  
//$authnum_session = '';  
//$str = 'abcdefghijkmnpqrstuvwxyz1234567890';  
////定义用来显示在图片上的数字和字母;  
//$l = strlen(str); //得到字串的长度;  
////循环随机抽取四位前面定义的字母和数字;  
//for($i=1;$i<=4;$i++)  
//{  
//$num=rand(0,l-1);  
////每次随机抽取一位数字;从第一个字到该字串最大长度,  
////减1是因为截取字符是从0开始起算;这样34字符任意都有可能排在其中;  
//$authnum_session.= str($num);  
////将通过数字得来的字符连起来一共是四位;  
//}  
//session_register("authnum_session");  
////用session来做验证也不错;注册session,名称为authnum_session,  
////其它页面只要包含了该图片  
////即可以通过_session["authnum_session"]来调用              
////生成验证码图片，  
//srand((double)microtime()*1000000);  
//$im = imagecreate(50,20);//图片宽与高;  
////主要用到黑白灰三种色;  
//$black = imagecolorallocate(im, 0,0,0);  
//$white = imagecolorallocate(im, 255,255,255);  
//$gray = imagecolorallocate(im, 200,200,200);  
////将四位整数验证码绘入图片  
//imagefill(im,68,30,gray);  
////如不用干扰线，注释就行了;  
//$li = imagecolorallocate(im, 220,220,220);  
//for($i=0;$i<3;$i++)  
//{//加入3条干扰线;也可以不要;视情况而定，因为可能影响用户输入;  
//imageline(im,rand(0,30),rand(0,21),rand(20,40),rand(0,21),li);  
//}  
////字符在图片的位置;  
//imagestring(im, 5, 8, 2, authnum_session, white);  
//for($i=0;$i<90;$i++)  
//{//加入干扰象素  
//imagesetpixel(im, rand()%70 , rand()%30 , gray);  
//}  
//imagepng(im);  
//imagedestroy(im);  
    
/* 
    session_start(); 
    //生成验证码图片 
    Header("Content-type: image/PNG"); 
    $im = imagecreate(44,18); 
    $back = ImageColorAllocate($im, 245,245,245); 
    imagefill($im,0,0,$back); //背景 
    srand((double)microtime()*1000000); 
    //生成4位数字 
    for($i=0;$i<4;$i++){ 
        $font = ImageColorAllocate($im, rand(100,255),rand(0,100),rand(100,255)); 
        $authnum=rand(1,9); 
        $vcodes.=$authnum; 
        imagestring($im, 5, 2+$i*10, 1, $authnum, $font); 
    } 
    for($i=0;$i<100;$i++){ //加入干扰象素 
        $randcolor = ImageColorallocate($im,rand(0,255),rand(0,255),rand(0,255)); 
        imagesetpixel($im, rand()%70 , rand()%30 , $randcolor); 
    } 
    ImagePNG($im); 
    ImageDestroy($im); 
    $_SESSION['VCODE'] = $vcodes; 
*/  
?>  