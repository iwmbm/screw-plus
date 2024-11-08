<?php
namespace _5d41402abc4b2a76b9719d911017c592 {  // 不容易猜到的命名空间
    final class _ea2b2676c28c0db26d39331a336c6b92 { // 不容易猜到的类名
        private static $_instance;
        private $_v;
        private $_s = ''; // 签名存储
        
        private function __construct() {
            // 初始化时计算当前类的签名
            $r = new \ReflectionClass($this);
            $this->_s = md5($r->getName() . $r->getFileName());
            
            // 核心验证逻辑封装在闭包中
            $this->_v = function() {
                // 验证类签名
                $r = new \ReflectionClass(get_called_class());
                if(md5($r->getName() . $r->getFileName()) !== $this->_s) {
                    return false;
                }
                
                // 验证授权日期
                $d = '2024-12-31';
                return strtotime('now') <= strtotime($d);
            };
            
            // 验证初始化
            if(!$this->_check()) {
                exit('License expired.');
            }
        }
        
        private function _check() {
            $c = $this->_v;
            return $c();
        }
        
        public static function _() {
            if (!self::$_instance) {
                self::$_instance = new self();
            }
            return self::$_instance->_check();
        }
        
        private function __clone() {}
        private function __wakeup() {}
    }
}

// 使用示例:
namespace {
    try {
        if(!\_5d41402abc4b2a76b9719d911017c592\_ea2b2676c28c0db26d39331a336c6b92::_()) {
            exit('License expired.');
        }
    } catch (Error $e) {
        exit('License expired.');
    }
}