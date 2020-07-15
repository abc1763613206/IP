# IP签名档Mod
做好的 [API](http://ipcounter.ihcr.top)
逛github的时候看见@xhboke的源码，又恰巧洛谷兴起了一阵计数器潮，为了更好的展（zhuang）示（bi）自己，特将源代码fork一份，添加模式2.
![这是实例](http://ipcounter.ihcr.top/?mode=2&mail=abc1763613206@163.com&str=%E5%8D%9A%E8%A7%88%E4%B9%90%E5%AD%A6%EF%BC%8C%E6%95%A2%E4%BA%8E%E6%8E%A2%E7%B4%A2%E3%80%82&qq=1817532680&gh=abc1763613206&lg=%E6%9F%90%E4%BA%BA&strsize=18)
## 调教方法
实际上都写在index.php里了

```
mode：1或不填：原作模式。2：魔改模式
lg：洛谷用户名
gh：Github用户名
qq：QQ号
mail：邮箱
str：最下方留言（strsize：大小）
```
PSD源文件也已上传，如需其他请自己更改（别忘了改坐标）。

使用前需在服务器端安装msyh.ttf字体。

因为淘宝的api访问量很大，经常挂掉，所以在index.php里加入了ip-api的api，需要切换请将淘宝api的部分注释掉，将ip-api部分的注释去掉。

## 最后

调教愉快！
诚邀dalao来写个生成器！

### 以下为原作的介绍~
# IP签名档源码
<h2>说在前面</h2>
自从论坛IP签名档开放以来，访问量达到1806287，一百八十多万，由于证书过期和懒得维护。今特开源。
<h2>演示效果</h2>
<a href="https://www.xhboke.com/wp-content/uploads/2018/05/20180526175459.png"><img src="https://www.xhboke.com/wp-content/uploads/2018/05/20180526175459.png" alt="" width="550" height="250" class="alignnone size-full wp-image-862" /></a>
<h2>原帖地址</h2>
https://www.xhboke.com/858.html
<h2>修复</h2>
<h3>6.11<h3>
$url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip; <br>
$country = $data['data']['country']; <br>
$region = $data['data']['region']; <br>
$city = $data['data']['city'];<br>

