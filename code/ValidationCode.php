<?php  
	Header("Content-type: image/PNG");  
    session_start(); 
    //׼�������������������   
    srand((double)microtime()*1000000);  
    //׼��ͼƬ����ز���    
    $im = imagecreate(50,20);  
    $black = ImageColorAllocate($im, 0,0,0);  //RGB��ɫ��ʶ��  
    $white = ImageColorAllocate($im, 255,255,255); //RGB��ɫ��ʶ��  
    $gray = ImageColorAllocate($im, 200,200,200); //RGB��ɫ��ʶ��  
    //��ʼ��ͼ      
    imagefill($im,0,0,$gray);  
    while(($randval=rand()%10000)<1000);  
    {  
       $_SESSION["ValidationNum"] = $randval;  
        //����λ������֤�����ͼƬ   
        imagestring($im, 5,5 , 3, $randval, $black);  
    }  
    //�����������     
    for($i=0;$i<200;$i++){  
        $randcolor = ImageColorallocate($im,rand(0,255),rand(0,255),rand(0,255));  
        imagesetpixel($im, rand()%70 , rand()%30 , $randcolor);  
    }  
    //�����֤ͼƬ  
    ImagePNG($im);  
    //����ͼ���ʶ��  
    ImageDestroy($im);
    return  $randval;
//header("content-type:image/png");  
////����header������ͼƬ�ļ��������png���ް�Ȩ֮��;  
////�����µ���λ������֤��  
//session_start();//����session;  
//$authnum_session = '';  
//$str = 'abcdefghijkmnpqrstuvwxyz1234567890';  
////����������ʾ��ͼƬ�ϵ����ֺ���ĸ;  
//$l = strlen(str); //�õ��ִ��ĳ���;  
////ѭ�������ȡ��λǰ�涨�����ĸ������;  
//for($i=1;$i<=4;$i++)  
//{  
//$num=rand(0,l-1);  
////ÿ�������ȡһλ����;�ӵ�һ���ֵ����ִ���󳤶�,  
////��1����Ϊ��ȡ�ַ��Ǵ�0��ʼ����;����34�ַ����ⶼ�п�����������;  
//$authnum_session.= str($num);  
////��ͨ�����ֵ������ַ�������һ������λ;  
//}  
//session_register("authnum_session");  
////��session������֤Ҳ����;ע��session,����Ϊauthnum_session,  
////����ҳ��ֻҪ�����˸�ͼƬ  
////������ͨ��_session["authnum_session"]������              
////������֤��ͼƬ��  
//srand((double)microtime()*1000000);  
//$im = imagecreate(50,20);//ͼƬ�����;  
////��Ҫ�õ��ڰ׻�����ɫ;  
//$black = imagecolorallocate(im, 0,0,0);  
//$white = imagecolorallocate(im, 255,255,255);  
//$gray = imagecolorallocate(im, 200,200,200);  
////����λ������֤�����ͼƬ  
//imagefill(im,68,30,gray);  
////�粻�ø����ߣ�ע�;�����;  
//$li = imagecolorallocate(im, 220,220,220);  
//for($i=0;$i<3;$i++)  
//{//����3��������;Ҳ���Բ�Ҫ;�������������Ϊ����Ӱ���û�����;  
//imageline(im,rand(0,30),rand(0,21),rand(20,40),rand(0,21),li);  
//}  
////�ַ���ͼƬ��λ��;  
//imagestring(im, 5, 8, 2, authnum_session, white);  
//for($i=0;$i<90;$i++)  
//{//�����������  
//imagesetpixel(im, rand()%70 , rand()%30 , gray);  
//}  
//imagepng(im);  
//imagedestroy(im);  
    
/* 
    session_start(); 
    //������֤��ͼƬ 
    Header("Content-type: image/PNG"); 
    $im = imagecreate(44,18); 
    $back = ImageColorAllocate($im, 245,245,245); 
    imagefill($im,0,0,$back); //���� 
    srand((double)microtime()*1000000); 
    //����4λ���� 
    for($i=0;$i<4;$i++){ 
        $font = ImageColorAllocate($im, rand(100,255),rand(0,100),rand(100,255)); 
        $authnum=rand(1,9); 
        $vcodes.=$authnum; 
        imagestring($im, 5, 2+$i*10, 1, $authnum, $font); 
    } 
    for($i=0;$i<100;$i++){ //����������� 
        $randcolor = ImageColorallocate($im,rand(0,255),rand(0,255),rand(0,255)); 
        imagesetpixel($im, rand()%70 , rand()%30 , $randcolor); 
    } 
    ImagePNG($im); 
    ImageDestroy($im); 
    $_SESSION['VCODE'] = $vcodes; 
*/  
?>  