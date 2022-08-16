<?php
namespace app\index\controller;

use PHPMailer\PHPMailer\PHPMailer;

use think\Controller;

// 引用接参数
use think\Request;

// 引入redis配置类
use think\facade\Cache;

class Mail
{
     //服务器配置,一般是默认配置
    private $CharSet ="UTF-8";                     //设定邮件编码
    private $SMTPDebug = 0;                        // 调试模式输出
    private $isSMTP = true;                        // 使用SMTP
    private $Host = 'smtp.163.com';                // SMTP服务器
    private $SMTPAuth = true;                      // 允许 SMTP 认证
    private $Username = 'superfrogfrog@163.com';                // SMTP 用户名  即邮箱的用户名
    private $Password = 'WJNNJKGXRDNSCFEP';             // SMTP 密码  部分邮箱是授权码(例如163邮箱)
    private $SMTPSecure = 'ssl';                    // 允许 TLS 或者ssl协议
    private $Port = 465;                            // 服务器端口 25 或者465 具体要看邮箱服务器支持
    //修改成自己的邮箱
    private $From = 'superfrogfrog@163.com';           		//发件人邮箱
    private $FromName = '超级呱呱呱';                   //发件人的用户昵称


    //邮件对象
    private $mail;

    //一般只有用户名和密码还有端口会变动,所以这三个参数可以创建对象动态指定，也可以直接写死
    public function __construct($Username = '', $Password = '', $Port = ''){
        if(!empty($Username)){
            $this->Username = $Username;
        }
        if(!empty($Password)){
            $this->Password = $Password;
        }
        if(!empty($Port)){
            $this->Port = $Port;
        }

        //为true表示启用异常
        $mail =  new PHPMailer(true);
        //服务器配置
        $mail->CharSet = $this->CharSet;                     //设定邮件编码
        $mail->SMTPDebug = $this->SMTPDebug;                 // 调试模式输出
        if($this->isSMTP === true){
            $mail->isSMTP();                                 // 使用SMTP
        }
        $mail->Host = $this->Host;                           // SMTP服务器
        $mail->SMTPAuth = $this->SMTPAuth;                   // 允许 SMTP 认证
        $mail->Username = $this->Username;                   // SMTP 用户名  即邮箱的用户名
        $mail->Password = $this->Password;                   // SMTP 密码  部分邮箱是授权码(例如163邮箱)
        $mail->SMTPSecure = $this->SMTPSecure;               // 允许 TLS 或者ssl协议
        $mail->Port = $this->Port;                           // 服务器端口 25 或者465 具体要看邮箱服务器支持
        $mail->setFrom($this->From, $this->FromName);        //发件人

        $this->mail = $mail;
    }

    /**
     * 发送邮件
     * @param array $sendAddress 收件人地址数组， 如果为单值数组则只写入收件地址，如果为键值数组则还写入收件人名称
     * @param array $Attachment 附件数组，如果为单值数组则为添加附件，如果为键值数组则添加附件并且重命名
     * @param bool $isHtml 是否以html文档格式发送
     * @param string $Subject 邮件主题
     * @param string $Body 邮件内容，如果以html格式可以写入html
     * @param string $AltBody 如果为单值数组则只写入收件地址，如果为键值数组则还写入收件人名称
     * @param array $CC 抄送地址数组， 如果为单值数组则只写入收件地址，如果为键值数组则还写入收件人名称
     * @param array $BCC 密送地址数组，如果为单值数组则只写入收件地址，如果为键值数组则还写入收件人名称
     * @return bool 是否发送成功
     */
    public function sendEMail($sendAddress = [],$Subject  = '', $Body = '', $AltBody = '', $Attachment = [] ,$isHtml = true,$CC = [], $BCC = []){
        try {
            //必填参数校验
            if(empty($sendAddress) || empty($Subject) || empty($Body)){
                return false;
            }
            //收件人
            foreach ($sendAddress as $key => $value) {
                if (is_int($key)) {
                    // 处理单值
                    $this->mail->addAddress($value);
                } else {
                    // 处理键值
                    $this->mail->addAddress($value, $key);
                }
            }
            //附件
            if(!empty($Attachment)){
                foreach ($Attachment as $key => $value) {
                    if (is_int($key)) {
                        // 处理单值
                        $this->mail->addAttachment($value);
                    } else {
                        // 处理键值
                        $this->mail->addAttachment($value, $key);
                    }
                }
            }
            //抄送
            if(!empty($CC)){
                //抄送不为空
                foreach ($CC as $key => $value) {
                    if (is_int($key)) {
                        // 处理单值
                        $this->mail->addCC($value);
                    } else {
                        // 处理键值
                        $this->mail->addCC($value, $key);
                    }
                }
            }
            //密送
            if(!empty($BCC)){
                //密送不为空
                foreach ($BCC as $key => $value) {
                    if (is_int($key)) {
                        // 处理单值
                        $this->mail->addBCC($value);
                    } else {
                        // 处理键值
                        $this->mail->addBCC($value, $key);
                    }
                }
            }

            //回复的时候回复给哪个邮箱 建议和发件人一致
            $this->mail->addReplyTo($this->From, $this->FromName);

            //Content
            // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
            $this->mail->isHTML($isHtml);
            //邮件主题
            $this->mail->Subject = $Subject;
            //邮件内容
            $this->mail->Body    = $Body;
            //如果邮件客户端不支持HTML则显示此内容
            $this->mail->AltBody = $AltBody;

            //发送
            $this->mail->send();
            
            return true;
        } catch (\Exception $e) {
            // echo '邮件发送失败: ', $this->mail->ErrorInfo;
            return false;
            
        }
    }
	
	public function send($mail,$code){
		$res = $this->sendEMail([$mail], '注册验证码[请勿回复]', '您的验证码是<br><h1>'.$code.'</h1><br/><div style="text-align=`right`">超级呱呱呱</div>' . date('Y-m-d H:i:s'),'如果邮件客户端不支持HTML则显示此内容');
		return($res);
	}
	
	public function get_code(Request $request){
	    
	    $email = $request -> get('email');
	    
	   // 如果缓存里面已经有该邮箱 则不能继续发送
	    if(Cache::store('redis')->get($email)){
	        return json_encode(array('code' => '0' , 'msg' => '请求过于繁忙' ),JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
	    }
	    
	    $pattern = '1234567890ABCDEFGHIJKLOMNOPQRSTUVWXYZ';
	    
	    $key = "";
	    
	    for ($i=0;$i<6;$i++) 
        { 
            $key .= $pattern{mt_rand(0,35)}; //生成php随机数 
        } 
	    
	    $code = $key;
	    
	    
	    
	    $email = $request -> get('email');
	    
	   // 设置该邮箱60s后过期  60s内不能重复发送
	    $write = Cache::store('redis')->set($email,$code,60);
	    
	   // 写入缓存成功
	    if($write){
	        
	        $send = $this -> send($email,$code);
	        
	        if($send){
	            return json_encode(array('code' => '200' , 'msg' => '发送邮件成功' ),JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
	        }else{
	             return json_encode(array('code' => '0' , 'msg' => '发送邮件失败' ),JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
	        }
	        
	   // 写入缓存失败
	    }else{
	           
	    }
	    
	    
	}
	
	public function verification(Request $request){
	    $email = $request->get('email');
	    $code = $request->get('code');
	    
	    if($code == Cache::store('redis')->get($email)){
	        Cache::store('redis')->del($email);
	        return json_encode(array('code' => '200' , 'msg' => '邮箱验证正确' ),JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
	    }else{
	        
	        return json_encode(array('code' => '0' , 'msg' => '邮箱验证错误' ),JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
	    }
	} 
	
    public function read(Request $request){
        $email = $request->get('email');
        echo Cache::store('redis')->get($email);
    }
}
