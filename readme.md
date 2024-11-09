# PHP 加密工具

## 支持版本
PHP 5.6-8.1

## 安装步骤

1. 下载并解压程序包到指定目录
2. 在 screw plus 目录中执行：
    ```bash
    php bin/phpize    # 生成扩展所需文件
    ```
    注：如果环境中没有 phpize，请从 PHP 官网下载

3. 配置编译环境：
    ```bash
    ./configure --with-php-config=[php-config路径]
    ```
    注：请使用 php-config 的绝对路径

4. 修改安全配置：
    - 打开 `php_screw_plus.h`
    - 将 `CAKEY` 修改为自定义的安全字符串

5. 编译安装：
    ```bash
    make && make install
    ```

6. 配置 PHP：
    - 将扩展路径添加到 php.ini
    - 重启 PHP 服务

## 使用说明

### 加密文件
```bash
cd tools
make
./screw [目标路径]    # 加密指定目录或文件
```

### 解密文件
```bash
./screw [目标路径] -d
```

## 授权设置

1. 编辑 `tools/php/license.php`：
    - 修改 namespace 和 class 名（建议使用难以猜测的名称）
    - 设置过期日期：`$d = '2024-12-31'`

2. 在需要加密的文件中添加授权验证代码：
    ```php
    try {
         if(!\_5d41402abc4b2a76b9719d911017c592\_ea2b2676c28c0db26d39331a336c6b92::_()) {
              exit('License expired.');
         }
    } catch (Error $e) {
         exit('License expired.');
    }
    ```

注意：请确保授权验证代码添加到所有需要加密的文件中。