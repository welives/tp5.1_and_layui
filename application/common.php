<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-07 20:56:34
 * @LastEditTime: 2021-02-15 02:42:24
 * @Description:
 */
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function mailTo($to, $title, $content)
{
  $mail = new PHPMailer(true);
  try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // SMTP 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
    $mail->isSMTP();                                            // 使用 SMTP 鉴权方式发送邮件
    $mail->SMTPAuth   = true;                                   // SMTP 需要鉴权 这个必须是true
    $mail->CharSet    = PHPMailer::CHARSET_UTF8;                // 设置发送的邮件的编码
    $mail->Host       = 'smtp.163.com';                         // SMTP 服务器
    $mail->Username   = 'welives@163.com';                      // SMTP 登录的账号
    $mail->Password   = 'ZSYIKNOEXXKMCUPA';                     // SMTP 登录的密码 使用生成的授权码
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // 设置使用 SSL 加密方式登录鉴权
    $mail->Port       = 465;                                    // 设置 SSL 连接 SMTP 服务器的远程服务器端口号

    //Recipients
    $mail->setFrom('welives@163.com', '摸鱼');                   // 设置发件人邮箱地址
    $mail->addAddress($to);                                     // 设置收件人邮箱地址

    // Content
    $mail->isHTML(true);                                        // 邮件正文是否为 HTML 编码
    $mail->Subject = $title;                                    // 添加该邮件的主题
    $mail->Body    = $content;                                  // 添加邮件正文

    return $mail->send();
  } catch (Exception $e) {
    exception($mail->ErrorInfo);
  }
}
