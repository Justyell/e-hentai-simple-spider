# 一个抓取E站的php破脚本

转了一圈我大github站发现貌似没有一个用php写的，随手就写了个破脚本抓取e站图片，算是给广大绅士造个福。

该脚本并考虑性能，只是随手写来玩玩，也是用最简单的正则匹配的方式单进程抓取图片（注意，只支持抓取图片）。

![](https://img3.doubanio.com/view/thing_review/l/public/2189725.webp)

那么要怎么用呢？

1. 复制项目；

2. 配置php环境，基本上5.3版本以上的都没问题；

3. 确认你的代理是可用的，并且是使用1080端口，如果是用其它端口的同学或者没有使用代理的请自行修改curl.php里面的代理代码；

4. 在项目根目录下，运行php main.php {你看上的绅士页面} 页面可参考以下链接：

   [https://e-hentai.org/g/1562871/73b9fb41de/](https://e-hentai.org/g/1562871/73b9fb41de/)

   爬取的图片会保存在项目根目录。

最后祝各位绅士享受生活→_→不要太过操劳。。。