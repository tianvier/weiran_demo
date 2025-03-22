# 说明

本项目是基于 Laravel 10.x 的模块化开发框架, 项目为了便于管理分为 框架, 核心, 管理, 组件, 使用 composer 进行模块化安装

- 项目文档 : https://weiran.tech

## 介绍

使用本项目可以快速的完成项目业务逻辑的开发, 其中包含

- RBAC权限管理
- 完整的后台管理框架
- 用户管理
- 接口验签
- 接口开发工具
- 快速表单生成

项目是在公司内部的业务逻辑的基础之上剥离出来, 并且应用在公司快速开发的项目中, 内涵丰富的功能，可满足日常 80% 的开发需求

## 安装

**初始化项目并启动服务**

```
# Install
$ composer create-project weiran/project weiran_v1 '^1.0.0-dev'

# Create Database 
> mysql -u root -p
> create database weiran_project_v1 charset=utf8mb4;

# Migrate to Database
$ php artisan migrate

   INFO  Preparing database.  

  Creating migration table ................................................. 21ms DONE

   INFO  Running migrations.  

  2018_02_27_144933_create_pam_account_table ............................... 20ms DONE
  2018_02_27_144935_create_pam_permission_role_table ....................... 16ms DONE
  2018_02_27_144935_create_pam_permission_table ............................ 35ms DONE
  2018_02_27_144935_create_pam_role_table .................................. 11ms DONE
  2018_02_27_144936_create_pam_role_account_table .......................... 34ms DONE
  2018_02_27_144938_create_sys_config_table ................................ 39ms DONE
  2018_03_12_213504_create_pam_log_table ................................... 11ms DONE
  2018_07_09_164941_alter_pam_log_add_field_parent_id ...................... 20ms DONE
  2018_12_24_105815_create_sys_failed_jobs_table ........................... 17ms DONE
  2021_04_27_183109_create_pam_ban_table ................................... 28ms DONE
  2021_04_27_183141_create_pam_token_table ................................. 25ms DONE
  2021_06_29_233109_alt_pam_ban_add_account_type ........................... 17ms DONE
  2022_12_08_113154_alter_pam_account_table_add_uem_index .................. 34ms DONE
  2023_02_24_102135_alter_pam_account_table_add_note_field ................. 21ms DONE
  2023_04_12_154447_alt_sys_config_table_add_key_index ..................... 10ms DONE
  2024_04_08_174443_add_uuid_to_sys_failed_jobs_table ...................... 26ms DONE

# Start service server
$ cd weiran_v1
$ php artisan serve

  INFO  Server running on [http://127.0.0.1:8000].  
  Press Ctrl+C to stop the server
```

**创建 test 模块**

```
# 快速创建模块
$ php artisan weiran:make test -Q
```

> 因为默认框架中不包含 `/` 主页访问, 所以访问主页会报 404 错误码

```
# test web request
$ curl http://127.0.0.1:8000/test

# test api request
Test Web Request Success
$ curl http://127.0.0.1:8000/api/test
Test Api Request Success

# test backend request
$ curl 127.0.0.1:8000/mgr-page/test
> 302 response
> to login url ...
```

## 安装数据库及用户

**创建数据库**

在初始化数据库之前需要先创建一个空数据库, 数据库类型为 `utf8mb4_general_ci`, 可以保证 emoji 类型的数据正常存储, 这里我定义名字为
`weiran_project_v1`

在 `.env` 文件中配置账号和密码

```
# Database Config
# ------------------------------------
DB_HOST=127.0.0.1
DB_DATABASE=weiran_project_v1
DB_USERNAME=root
DB_PASSWORD=null
```

**执行 migrate**

```
$ php artisan weiran:migrate
Migration table created successfully.
Migrating: 2018_02_27_144933_create_pam_account_table
Migrated:  2018_02_27_144933_create_pam_account_table (0.05 seconds)
...
```

**执行安装**

```
$ php artisan system:install
Start Install Weiran Framework!
Init UserRole Ing...
Init Role success
Install User Roles Success
Init Rbac Permission...
(weiran.core.PermissionCommand) Import permission Success! 
Init Rbac Permission Success
```

**创建用户**

创建管理员

```
$ php artisan system:user create_user

 Please input passport!:
 > weiran_root

 Please input password!:
 > weiran_root

 Please input role name!:
 > root

User v4_admin created
```


## 登录

**登录后台**

http://127.0.0.1:8000/mgr-page

![](./resources/docs/images/mgr-login.jpg)


## 反馈

[Github Issues](https://github.com/weiran-tech/project/issues)
