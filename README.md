# serv00保活服务 php版本

`~/domains/用户名.serv00.com/`

在php根目录添加一个`accounts.json`文件，内容如下：

```json
[
  {
    "host": "xxx",
    "port": 22,
    "username": "xxxx",
    "password": "xxxx",
    "command": "",
    "exec_timer": 2
  },
  {
    "host": "xxx",
    "port": 22,
    "username": "xxxx",
    "password": "xxxx",
    "command": "",
    "exec_timer": 2
  }
]
```

command 为执行命令，可以为空，表示不执行命令,只连接ssh。

exec_timer 为执行命令的间隔时间，单位为秒


-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

下载项目：

1. 登录ssh：ssh root@xxx.xxx.xxx.xxx
2. cd ~/domains
3. git clone https://github.com/learnLi/serv00cron.git
4. 安装依赖：
    1. composer install
5. 运行脚本路由：
    1. GET /serv00/start 启动
    2. GET /serv00/stop 停止 可以使用.env 配置是否允许pc端触发停止
6. 需要让serv00支持执行exec,打开serv00->www websites -> 目标网站域名 -> manage -> 打开 GZIP compression、 Force SSL 、
   Allow PHP exec() function 按钮
7. 打开serv00->www websites -> 目标网站域名 -> manage -> Open Basedir directories
    1. 把开头这串字符 `/usr/home/用户名/domains/用户名.serv00.net/public_html:`
       改成 `/usr/home/用户名/domains/用户名.serv00.net:`，即删除/public_html即可， 然后保存
8. 复制项目到默认项目中：
    1. cp ~/domains && cp -r serv00cron/* 用户名.serv00.com/
9. 删除默认public_html:
    1. cd ~/domains/用户名.serv00.com/ && rm -r public_html && mv public public_html

配置 `.env` 文件：

```
APP_DEBUG=true # 是否开启debug

TG_CHAT_ID=xxx # tg_chat_id

TG_BOT_TOKEN=xxx # tg_bot_token

CRON_STOP=true # 是否运行pc端停止服务
```

创建 Telegram Bot

在 Telegram 中找到 @BotFather，创建一个新 Bot，并获取 API Token。

获取到你的 Chat ID 

可以通过向 Bot 发送一条消息，然后访问 https://api.telegram.org/bot<your_bot_token>/getUpdates 找到 Chat ID。
